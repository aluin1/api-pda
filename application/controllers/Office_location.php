<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
class Office_location extends REST_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('OfficeLocation_model');
        header('Content-Type: application/json');
		$_POST = json_decode(file_get_contents("php://input"), true);
	}

	/** 
		* Admin set Office in API 
		* @method : POST
		* @url : office_location/set_office
	**/
	public function set_office_post()
	{
		// XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('office_name', 'office_name', 'max_length[200]');
		$this->form_validation->set_rules('longitude', 'Longitude', 'trim|required|max_length[38]');
		$this->form_validation->set_rules('latitude', 'latitude', 'trim|required|max_length[38]');
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
        		if ($token_valid->data->role == "user") {
		            $message = array('status' => false,
		             				 'message' => "token access denied");
		            return $this->response($message, REST_Controller::HTTP_OK);	
        		}
				$username = $this->input->post('username', TRUE);
				$exst = $this->OfficeLocation_model->username_exists($username);
				if ($exst === FALSE) {
		            $message = array('status' => false,
		             				 'message' => "Username not found, please check your usename");
	            	return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
				}else{
					foreach ($exst->result() as $value) {
						$Id_User = $value->Id;
					}
					date_default_timezone_set('Asia/Jakarta');
					$get_datetime = date('Y-m-d H:i:s');
					$data = [
						"Id_User" => $Id_User,
						"office_name" => $this->input->post('office_name', TRUE),
						"Location" => ($this->input->post('longitude', TRUE)." ".$this->input->post('latitude', TRUE)),
						"last_edited" => $get_datetime
					];
					$result = $this->OfficeLocation_model->set_office($data);
					print_r($result);
					if ($result > 0 AND !empty($result)) {
			            $message = array('status' => true,
			             				 'message' => "Set Office successfuly");
			            return $this->response($message, REST_Controller::HTTP_OK);	
					}else{
			            $message = array('status' => false,
			             				 'message' => "Set Office Failed");
		            	return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
				}
			}
        }
	}

	public function edit_office_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('office_name', 'office_name', 'max_length[200]');
		$this->form_validation->set_rules('longitude', 'Longitude', 'trim|required|max_length[38]');
		$this->form_validation->set_rules('latitude', 'latitude', 'trim|required|max_length[38]');
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
				$username = $this->input->post('username', TRUE);
        		$get_userData = $this->OfficeLocation_model->get_userData($username);
        		if ($get_userData === FALSE) {
		            $message = array('status' => false,
		             				 'message' => "Cannot find user data");
	            	return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
        		}else{
        			foreach ($get_userData->result() as $value) {
        				$Id_User = $value->Id;
	    			}    	
					$exst = $this->OfficeLocation_model->username_existsOL($Id_User);
					if ($exst === FALSE) {
			            $message = array('status' => false,
			             				 'message' => "Username not found, please check your usename");
		            	return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}else{
						date_default_timezone_set('Asia/Jakarta');
						$get_datetime = date('Y-m-d H:i:s');
						$data = [
							"Id_User" => $Id_User,
							"office_name" => $this->input->post('office_name', TRUE),
							"Location" => $this->input->post('longitude', TRUE).' '.$this->input->post('latitude', TRUE),
							"last_edited" => $get_datetime
						];
						$result = $this->OfficeLocation_model->edit_office($data);
						if ($result > 0 AND !empty($result)) {
				            $message = array('status' => true,
				             				 'message' => "Office location successfuly edited");
				            return $this->response($message, REST_Controller::HTTP_OK);	
						}else{
				            $message = array('status' => false,
				             				 'message' => "Office Location Failed edited");
			            	return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
						}
					}
        		}
			}
        }
	}

	public function edit_office_default_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('office_name', 'office_name', 'max_length[200]');
		$this->form_validation->set_rules('longitude', 'Longitude', 'trim|required|max_length[38]');
		$this->form_validation->set_rules('latitude', 'latitude', 'trim|required|max_length[38]');
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
				date_default_timezone_set('Asia/Jakarta');
				$get_datetime = date('Y-m-d H:i:s');
				$data = [
					"Id_User" => 0,
					"office_name" => $this->input->post('office_name', TRUE),
					"Location" => $this->input->post('longitude', TRUE).' '.$this->input->post('latitude', TRUE),
					"last_edited" => $get_datetime
				];
				$result = $this->OfficeLocation_model->edit_office($data);
				if ($result > 0 AND !empty($result)) {
		            $message = array('status' => true,
		             				 'message' => "Office location successfuly edited");
		            return $this->response($message, REST_Controller::HTTP_OK);	
				}else{
		            $message = array('status' => false,
		             				 'message' => "Office Location Failed edited");
	            	return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
				}
			}
        }
	}

	public function get_office_all_post()
	{
		
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]');
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
	        		if ($post_page != null OR !empty($post_page)) {
	        			// $post_page = $post_page;
	        			$a = $post_page-1;
	        			$offset = $limit*$a;
	        		}
	        		if ($post_page == null OR empty($post_page)) {
	        			$post_page = 1;
	        			$offset = null;
	        		}
	        		$get_OfficeAll = $this->OfficeLocation_model->get_all($limit, $offset, $order_by, $sort, $search);
	        		if ($get_OfficeAll === FALSE) {
			            $message = array('status' => false,
			             				 'message' => 'cannot find data');
			            return $this->response($message, REST_Controller::HTTP_OK);
	        		}else{
	        			if ($get_OfficeAll->num_rows() > 0) {
	        				foreach ($get_OfficeAll->result() as $row) {
	        					$data_return[] = [
	        						"Id_User" => $row->Id,
	        						"username" => $row->username,
	        						"office_name" => $row->office_name,
	        						"longitude" => $row->Lon,
	        						"latitude" => $row->Lat
	        					];
	        				}
	        				$total_data = $this->OfficeLocation_model->total_row_all($order_by, $sort, $search);
	        				$total_page = $total_data/$limit;
	        				$page_now = $post_page;
	        				$next_total_page = $total_page-$page_now;
	        				$before_total_page = $page_now-1;
	        				$now_data_show = $get_OfficeAll->num_rows();
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

	public function get_office_personal_post()
	{
		
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]');
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
        		if ($username != $token_valid->data->username) {
		            $message = array('status' => false,
		             				 'message' => 'token access is denied');
		            return $this->response($message, REST_Controller::HTTP_OK);	
        		}
				$exst = $this->OfficeLocation_model->username_existsOL($token_valid->data->id);
				if ($exst === FALSE) {
		            $message = array('status' => false,
		             				 'message' => "Username not found, please check your usename");
	            	return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
				}else{
	        		$get_office = $this->OfficeLocation_model->get_personal($token_valid->data->id);
	        		if ($get_office === FALSE) {
			            $message = array('status' => false,
			             				 'message' => 'cannot find data');
			            return $this->response($message, REST_Controller::HTTP_OK);
	        		}else{
	        			if ($get_office->num_rows() > 0) {
	        				foreach ($get_office->result() as $row) {
	        					$data_return[] = [
	        						"username" => $row->username,
	        						"full_name" => $row->full_name,
	        						"office_name" => $row->office_name,
	        						"longitude" => $row->Lon,
	        						"latitude" => $row->Lat
	        					];
	        				}
		           		 	$message = array('status' => true,
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

	public function detail_office_default_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]');
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
        		$get_office = $this->OfficeLocation_model->get_default();
        		if ($get_office === FALSE) {
		            $message = array('status' => false,
		             				 'message' => 'cannot find data');
		            return $this->response($message, REST_Controller::HTTP_OK);
        		}else{
        			if ($get_office->num_rows() > 0) {
        				foreach ($get_office->result() as $row) {
        					$data_return[] = [
        						"office_name" => $row->office_name,
        						"longitude" => $row->Lon,
        						"latitude" => $row->Lat
        					];
        				}
	           		 	$message = array('status' => true,
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
?>