<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
class Log extends REST_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Log_model');
		$this->load->model('OfficeLocation_model');
		$this->load->model('Attendance_model');
        header('Content-Type: application/json');
		$_POST = json_decode(file_get_contents("php://input"), true);
	}

	public function generate_radius($Id_User, $Lat, $Long)
	{
		if (!empty($Id_User) AND !empty($Lat) AND !empty($Long)) {
			$radiusInMeters = 500;
			$check_office = $this->Log_model->check_office($Id_User);
			if ($check_office === TRUE) {
				$Id_User = $Id_User;
			}else{
				$Id_User = 0;
			}
			$check_radius = $this->Log_model->check_radius($radiusInMeters, $Lat, $Long, $Id_User);
			if ($check_radius != FALSE) {
				return TRUE;
			}else{
				return FALSE;
			}
		}else{
            $message = array('status' => false,
             				 'message' => "error function");
            return $this->response($message, REST_Controller::HTTP_OK);	
		}
	}
	/** 
		* User Set Logging Auto API 
		* @method : POST
		* @url : log/logging
	**/
	public function logging_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('longitude', 'Longitude', 'trim|required|max_length[38]');
		$this->form_validation->set_rules('latitude', 'Latitude', 'trim|required|max_length[38]');
        if ($this->form_validation->run() == FALSE){
            // form validation error
            $message = array('status' => false,
             				 'message' => $this->form_validation->error_array());
            return $this->response($message, 400);
        }else{	
        	$token_valid = json_decode($this->authorization_token->validateToken());
        	if ($token_valid->status === FALSE) {
	            $message = array('status' => false,
	             				 'message' => $token_valid->message);
	            return $this->response($message, REST_Controller::HTTP_OK);	
        	}else{
        		$username = $this->input->post('username');
        		if ($username != $token_valid->data->username) {
		            $message = array('status' => false,
		             				 'message' => 'token access is denied');
		            return $this->response($message, REST_Controller::HTTP_OK);	
        		}
				$exst = $this->Log_model->username_exists($token_valid->data->id);
				if ($exst === FALSE) {
		            $message = array('status' => false,
		             				 'message' => "Username not found, please check your usename");
	            	return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
				}else{
					date_default_timezone_set('Asia/Jakarta');
					$get_datetime = date('Y-m-d H:i:s');
					$data = [
						"Id_User" => $token_valid->data->id,
						"Location" => $this->input->post('longitude', TRUE)." ".$this->input->post('latitude', TRUE),
						"timing" => $get_datetime
					];
					$result = $this->Log_model->logging($data);
					if ($result > 0 AND !empty($result)) {
						$long = $this->input->post('longitude', TRUE);
						$lat = $this->input->post('latitude', TRUE);
						$data_cek_attend = [
								"Id_User" => $token_valid->data->id,
								// "date_attend" => date('Y-m-d')
								"date_attend" => date('2019-03-20')
							];
						$check_radius = $this->generate_radius($token_valid->data->id, $lat, $long);
						$Id_User = $token_valid->data->id;
						$date_now = date('Y-m-d');
						if ($check_radius === TRUE) {
							$check_attend = $this->Attendance_model->attendcheck($Id_User, $date_now);
							if ($check_attend->num_rows() < 1) {
								$param_set_attend = [
									"Id_User" =>$token_valid->data->id,
									"date_attend" => date('Y-m-d'),
									"time_come" => date('H:i:s'),
									"flag" => 1
								];
								$set_attendance = $this->Attendance_model->set_attend($param_set_attend);
								if ($set_attendance > 0) {
						            $message = array('status' => true,
						             				 'message' => "Logging successfuly",
						             				 'notice' => "attendance come successfuly");
						            return $this->response($message, REST_Controller::HTTP_OK);	
								}else{
						            $message = array('status' => true,
						             				 'message' => "Logging successfuly",
						             				 'notice' => "attendance come failed");
						            return $this->response($message, REST_Controller::HTTP_OK);	
								}
							}else{
								foreach ($check_attend->result() as $value) {
									$come = $value->time_come;
									$flag = $value->flag;
								}
								print_r($flag);
								if ($come != null && $flag == 0) {
									$update_flag = $this->Attendance_model->update_flag($Id_User, $date_now, 1);
									if ($update_flag > 0) {
							            $message = array('status' => true,
							             				 'message' => "Logging successfuly",
							             				 'notice' => "Flag true");
							            return $this->response($message, REST_Controller::HTTP_OK);
									}else{
							            $message = array('status' => true,
							             				 'message' => "Logging successfuly",
							             				 'notice' => "failed update flag");
							            return $this->response($message, REST_Controller::HTTP_OK);
									}
								}else{
						            $message = array('status' => true,
						             				 'message' => "Logging successfuly");
						            return $this->response($message, REST_Controller::HTTP_OK);
								}
							}
						}else{
							$check_attend = $this->Attendance_model->attendcheck($Id_User, $date_now);
							if ($check_attend->num_rows() > 0) {
								foreach ($check_attend->result() as $value) {
									$Id_attend = $value->Id;
									$time_return = $value->time_return;
									$flag = $value->flag;
									$note = $value->note;
								}
								if ($time_return == NULL && $flag == 1 && $note == null) {
									$update_attendance = $this->Attendance_model->update_attend($Id_User, $date_now, date('H:i:s'),'time_return');
									$update_flag = $this->Attendance_model->update_flag($Id_User, $date_now, 0);
									if ($update_attendance === TRUE && $update_flag > 0) {
							            $message = array('status' => true,
							             				 'message' => "Logging successfuly",
						             				 	 'notice' => "attendance return successfuly");
							            return $this->response($message, REST_Controller::HTTP_OK);	
									}else{
							            $message = array('status' => true,
							             				 'message' => "Logging successfuly",
						             				 	 'notice' => "attendance return failed");
							            return $this->response($message, REST_Controller::HTTP_OK);	
									}
								}elseif($time_return != NULL && $flag == 1){
									$update_attendance = $this->Attendance_model->update_attend($Id_User, $date_now, date('H:i:s'),'time_return');
									$update_flag = $this->Attendance_model->update_flag($Id_User, $date_now, 0);
									if ($update_attendance === TRUE && $update_flag > 0) {
							            $message = array('status' => true,
							             				 'message' => "Logging successfuly",
							             				 'notice' => "Flag false");
							            return $this->response($message, REST_Controller::HTTP_OK);
									}else{
							            $message = array('status' => true,
							             				 'message' => "Logging successfuly",
							             				 'notice' => "failed update flag");
							            return $this->response($message, REST_Controller::HTTP_OK);
									}
								}else{
						            $message = array('status' => true,
						             				 'message' => "Logging successfuly");
						            return $this->response($message, REST_Controller::HTTP_OK);
								}
							}else{
					            $message = array('status' => true,
					             				 'message' => "Logging successfuly");
					            return $this->response($message, REST_Controller::HTTP_OK);	
							}
						}	
					}else{
			            $message = array('status' => false,
			             				 'message' => "Logging Failed");
		            	return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
				}
			}
        }
	}

	/** 
		* User Get Logging in API 
		* @method : POST
		* @url : log/get_logging
	**/
	public function get_logging_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('from', 'From date', 'trim|max_length[38]');
		$this->form_validation->set_rules('to', 'To date', 'trim|max_length[38]');
		$this->form_validation->set_rules('limit', 'limit', 'trim|max_length[3]');
		$this->form_validation->set_rules('page', 'Page', 'trim|max_length[3]');
		$this->form_validation->set_rules('search', 'Search', 'trim|max_length[50]');
		$this->form_validation->set_rules('order_by', 'Order by', 'trim|max_length[20]');
		$this->form_validation->set_rules('sort', 'Sort ', 'trim|max_length[20]');
        if ($this->form_validation->run() == FALSE){
            // form validation error
            $message = array('status' => false,
             				 'message' => $this->form_validation->error_array());
            return $this->response($message, 400);
        }else{	
        	$token_valid = json_decode($this->authorization_token->validateToken());
        	if ($token_valid->status === FALSE) {
	            $message = array('status' => false,
	             				 'message' => $token_valid->message);
	            return $this->response($message, REST_Controller::HTTP_OK);	
        	}else{
        		$username = $this->input->post('username');
        		if ($token_valid->data->role != "admin") {
		            $message = array('status' => false,
		             				 'message' => 'token access is denied');
		            return $this->response($message, REST_Controller::HTTP_OK);	
        		}elseif ($token_valid->data->username != $this->input->post('username', TRUE)) {
		            $message = array('status' => false,
		             				 'message' => 'token access is denied');
		            return $this->response($message, REST_Controller::HTTP_OK);	
        		}else{
        			$from = $this->input->post('from', TRUE);
        			$to = $this->input->post('to', TRUE);
	        		$limit = $this->input->post('limit', TRUE);
	        		$post_page = $this->input->post('page', TRUE);
	        		$order_by = $this->input->post('order_by', TRUE);
	        		$sort = $this->input->post('sort', TRUE);
	        		$search = $this->input->post('search', TRUE);
	        		if ($limit == null || empty($limit) || $limit == 0) {
	        			$limit = 20;
	        		}
	        		if ($order_by == null || empty($order_by)) {
	        			$order_by = null;
	        		}
	        		if ($sort == null || empty($sort)) {
	        			$sort = "DESC";
	        		}
	        		if ($search == null || empty($search)) {
	        			$search = null;
	        		}
	        		if ($from != null && !empty($from)) {
	        			$from = $from." 00:00:00";
	        		}
	        		if ($to != null && !empty($to)) {
	        			$to = $to." 23:59:59";
	        		}
	        		if ($post_page != null OR !empty($post_page)) {
	        			// $post_page = $post_page;
	        			$a = $post_page-1;
	        			$offset = $limit*$a;
	        		}
	        		if ($post_page == null OR empty($post_page)) {
	        			$post_page = 1;
	        			$offset = null;
	        		}
	        		$get_LogAll = $this->Log_model->get_all($from, $to, $limit, $offset, $order_by, $sort, $search);
	        		if ($get_LogAll === FALSE) {
			            $message = array('status' => false,
			             				 'message' => 'cannot find data');
			            return $this->response($message, REST_Controller::HTTP_OK);
	        		}else{
	        			if ($get_LogAll->num_rows() > 0) {
	        				foreach ($get_LogAll->result() as $row) {
	        					$data_return[] = [
	        						"Id" => $row->Log,
	        						"Id_User" => $row->Id_user,
	        						"nip" => $row->nip,
	        						"email" => $row->email,
	        						"full_name" => $row->full_name,
	        						"username" => $row->username,
	        						"timing" => $row->timing,
	        						"longitude" => $row->Lon,
	        						"latitude" => $row->Lat
	        					];
	        				}
	        				$total_data = $this->Log_model->total_row_all($from, $to, $order_by, $sort, $search);
	        				$total_page = $total_data/$limit;
	        				$page_now = $post_page;
	        				$next_total_page = $total_page-$page_now;
	        				$before_total_page = $page_now-1;
	        				$now_data_show = $get_LogAll->num_rows();
	        				if (is_float($total_page)) {
	        					$total_page = floor($total_page)+1;
	        				}
	        				if (is_float($next_total_page)) {
	        					$next_total_page = floor($next_total_page)+1;
	        				}
		           		 	$message = array('status' => true,
		           		 					 'total_row' => $total_data,
		           		 					 'limit' => $limit,
		           		 					 'now_data_show' => $now_data_show,
		           		 					 'total_page' => $total_page,
		           		 					 'page_now' => (int)$post_page,
		             				 		 'data' => $data_return);
		            		return $this->response($message, REST_Controller::HTTP_OK);	
		        		}else{
				            $message = array('status' => false,
				             				 'message' => 'cannot find data');
				            return $this->response($message, REST_Controller::HTTP_OK);
		        		}
					}
				}
			}
        }
	}

		/** 
		* User Get Logging Personal in API 
		* @method : POST
		* @url : log/get_logging_personal
	**/
	public function get_logging_personal_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('date', 'date', 'trim|max_length[38]');
		$this->form_validation->set_rules('limit', 'limit', 'trim|max_length[3]');
		$this->form_validation->set_rules('page', 'Page', 'trim|max_length[3]');
		$this->form_validation->set_rules('search', 'Search', 'trim|max_length[50]');
		$this->form_validation->set_rules('order_by', 'Order by', 'trim|max_length[20]');
		$this->form_validation->set_rules('sort', 'Sort ', 'trim|max_length[20]');
        if ($this->form_validation->run() == FALSE){
            // form validation error
            $message = array('status' => false,
             				 'message' => $this->form_validation->error_array());
            return $this->response($message, 400);
        }else{	
        	$token_valid = json_decode($this->authorization_token->validateToken());
        	if ($token_valid->status === FALSE) {
	            $message = array('status' => false,
	             				 'message' => $token_valid->message);
	            return $this->response($message, REST_Controller::HTTP_OK);	
        	}else{
        		$username = $this->input->post('username');
        		if ($token_valid->data->username != $username) {
		            $message = array('status' => false,
		             				 'message' => 'token access is denied');
		            return $this->response($message, REST_Controller::HTTP_OK);	
        		}else{
        			$Id_User = $token_valid->data->id;
        			$date = $this->input->post('date', TRUE);
	        		$limit = $this->input->post('limit', TRUE);
	        		$post_page = $this->input->post('page', TRUE);
	        		$order_by = $this->input->post('order_by', TRUE);
	        		$sort = $this->input->post('sort', TRUE);
	        		$search = $this->input->post('search', TRUE);
	        		if ($limit == null || empty($limit) || $limit == 0) {
	        			$limit = 20;
	        		}
	        		if ($date == null || empty($date)) {
	        			$date = date('Y-m-d');
	        		}
	        		if ($order_by == null || empty($order_by)) {
	        			$order_by = null;
	        		}
	        		if ($sort == null || empty($sort)) {
	        			$sort = "DESC";
	        		}
	        		if ($search == null || empty($search)) {
	        			$search = null;
	        		}
	        		if ($post_page != null OR !empty($post_page)) {
	        			// $post_page = $post_page;
	        			$a = $post_page-1;
	        			$offset = $limit*$a;
	        		}
	        		if ($post_page == null OR empty($post_page)) {
	        			$post_page = 1;
	        			$offset = null;
	        		}
	        		$from = $date." 00:00:00";
	        		$to = $date." 23:59:59";
	        		$get_LogAll = $this->Log_model->get_personal($Id_User, strval($from), strval($to), $limit, $offset, $order_by, $sort, $search);
	        		if ($get_LogAll === FALSE) {
			            $message = array('status' => false,
			             				 'message' => 'cannot find data');
			            return $this->response($message, REST_Controller::HTTP_OK);
	        		}else{
	        			if ($get_LogAll->num_rows() > 0) {
	        				foreach ($get_LogAll->result() as $row) {
	        					$data_return[] = [
	        						"Id_User" => $row->Id_user,
	        						"nip" => $row->nip,
	        						"username" => $row->username,
	        						"timing" => $row->timing,
	        						"longitude" => $row->Lon,
	        						"latitude" => $row->Lat
	        					];
	        				}
	        				$total_data = $this->Log_model->total_row_personal($Id_User, $from, $to, $order_by, $sort, $search);
	        				$total_page = $total_data/$limit;
	        				$page_now = $post_page;
	        				$next_total_page = $total_page-$page_now;
	        				$before_total_page = $page_now-1;
	        				$now_data_show = $get_LogAll->num_rows();
	        				if (is_float($total_page)) {
	        					$total_page = floor($total_page)+1;
	        				}
	        				if (is_float($next_total_page)) {
	        					$next_total_page = floor($next_total_page)+1;
	        				}
		           		 	$message = array('status' => true,
		           		 					 'total_row' => $total_data,
		           		 					 'limit' => $limit,
		           		 					 'now_data_show' => $now_data_show,
		           		 					 'total_page' => $total_page,
		           		 					 'page_now' => (int)$post_page,
		             				 		 'data' => $data_return);
		            		return $this->response($message, REST_Controller::HTTP_OK);	
		        		}else{
				            $message = array('status' => false,
				             				 'message' => 'cannot find data');
				            return $this->response($message, REST_Controller::HTTP_OK);
		        		}
					}
				}
			}
        }
	}

	public function delete_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('Id', 'Id', 'trim|required|max_length[20]');
        if ($this->form_validation->run() == FALSE){
            // form validation error
            $message = array('status' => false,
             				 'message' => $this->form_validation->error_array());
            return $this->response($message, 400);
        }else{	
        	$token_valid = json_decode($this->authorization_token->validateToken());
        	if ($token_valid->status === FALSE) {
	            $message = array('status' => false,
	             				 'message' => $token_valid->message);
	            return $this->response($message, REST_Controller::HTTP_OK);	
        	}else{
        		$username = $this->input->post('username');
        		if ($token_valid->data->role != "admin" && $token_valid->data->username != $username) {
		            $message = array('status' => false,
		             				 'message' => 'access token denied');
		            return $this->response($message, REST_Controller::HTTP_OK);	
        		}
        		$delete = $this->Log_model->delete($this->input->post('Id', TRUE));
				if ($delete > 0) {
		            $message = array('status' => true,
		             				 'message' => 'delete Log successfully');
		            return $this->response($message, REST_Controller::HTTP_OK);	
				}else{
		            $message = array('status' => false,
		             				 'message' => 'failed delete Log');
		            return $this->response($message, REST_Controller::HTTP_OK);	
				}
        	}
        }
	}
}
?>