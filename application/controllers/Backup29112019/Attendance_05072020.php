<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/PointLocation.php';

use Restserver\Libraries\REST_Controller;
use Restserver\Libraries\PointLocation;


// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Attendance extends REST_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Attendance_model');
		$this->load->helper(array('url'));
		
		$_POST = json_decode(file_get_contents("php://input"), true);
	}

	/** 
		* User Attendance in API 
		* @method : POST
		* @url : attendance/attend
	**/
	
	
	
	
	
	//public function checklocation_post()
	public function checklocation($points)
	{
		 
					
					
		$pointLocation = new PointLocation();
		
 $dtlocation = $this->Attendance_model->getlocation();
		 foreach ($dtlocation->result() as $row) {
			  
		 $data_return[] =  array($row->LongLat1,$row->LongLat2,$row->LongLat3,$row->LongLat4,$row->LongLat5 )    ;	 	
		  
		 }
		    $polygonPatrajasa =$data_return[0] ;
		    $polygonTALOK = $data_return[1] ;
		    $polygonDIREKSIKEET =$data_return[2] ;
		    $polygonWELLPADJAMBARAN=$data_return[3] ;
		    $polygonREKIND =$data_return[4] ;
		    $polygonGPF =$data_return[5] ;
		    $polygonBLUEWAREHOUSE =$data_return[6] ;
		    $polygonCENTRALWELLPAD =$data_return[7] ;
		  
		 
		 
	//	  $polygonPatrajasa = array('-6.234116 106.823722','-6.232883 106.824551','-6.232116 106.823067','-6.233053 106.822310','-6.234116 106.823722');
		
		// $polygonTALOK = array("-7.129696 111.742866","-7.129865 111.743373","-7.128774 111.743726","-7.128599 111.743158", "-7.129696 111.742866");
				
		// $polygonDIREKSIKEET = array("-7.240105 111.719519","-7.240481 111.720430","-7.239855 111.720561","-7.239773 111.719611", "-7.240105 111.719519");
		
		// $polygonWELLPADJAMBARAN = array("-7.241091 111.718236", "-7.241105 111.720071", "-7.243246 111.720032", "-7.243141 111.718124", "-7.241091 111.718236");
		
		//  $polygonREKIND = array("-6.260945 106.844719", "-6.260707 106.846385", "-6.259571 106.846290", "-6.259667 106.844625", "-6.260945 106.844719");
		
		 
		$returnPatrajasa = "";
		$returnTALOK = "";
		$returnDIREKSIKEET = "";
		$returnWELLPADJAMBARAN = "";
		$returnREKIND 	= "";
		$returnGPF 	= "";
		$returnBLUEWAREHOUSE = "";
		$returnCENTRALWELLPAD = "";
		 
		
		foreach($points as $key => $point) {
			$returnPatrajasa = $pointLocation->pointInPolygon($point, $polygonPatrajasa);
		}
		
		if(($returnPatrajasa == "inside") || ($returnPatrajasa == "vertex"))
		{
			$valueBalikan["PATRAJASA"] = "T";
			$valueBalikan["TALOK"] = "F";
			$valueBalikan["DIREKSIKEET"] = "F";
			$valueBalikan["WELLPADJAMBARAN"] = "F";
			$valueBalikan["REKIND"] = "F";
			$valueBalikan["GPF"] = "F";
			$valueBalikan["BLUEWAREHOUSE"] = "F";
			$valueBalikan["CENTRALWELLPAD"] = "F";
		 
			return $valueBalikan;
		}
		
		foreach($points as $key => $point) {
			$returnTALOK = $pointLocation->pointInPolygon($point, $polygonTALOK);
		}
		
		foreach($points as $key => $point) {
			$returnDIREKSIKEET = $pointLocation->pointInPolygon($point, $polygonDIREKSIKEET);
		}
		
		foreach($points as $key => $point) {
			$returnWELLPADJAMBARAN = $pointLocation->pointInPolygon($point, $polygonWELLPADJAMBARAN);
		}
		
		foreach($points as $key => $point) {
			$returnREKIND = $pointLocation->pointInPolygon($point, $polygonREKIND);
		}
		
		foreach($points as $key => $point) {
			$returnGPF= $pointLocation->pointInPolygon($point, $polygonGPF);
		}
		
		foreach($points as $key => $point) {
			$returnBLUEWAREHOUSE= $pointLocation->pointInPolygon($point, $polygonBLUEWAREHOUSE);
		}
		
		foreach($points as $key => $point) {
			$returnCENTRALWELLPAD= $pointLocation->pointInPolygon($point, $polygonCENTRALWELLPAD);
		}
		 
		if(($returnTALOK == "inside") || ($returnTALOK == "vertex")){
			$valueBalikan["PATRAJASA"] = "F";
			$valueBalikan["TALOK"] = "T";
			$valueBalikan["DIREKSIKEET"] = "F";
			$valueBalikan["WELLPADJAMBARAN"] = "F";
			$valueBalikan["REKIND"] = "F";
			$valueBalikan["GPF"] = "F";
			$valueBalikan["BLUEWAREHOUSE"] = "F";
			$valueBalikan["CENTRALWELLPAD"] = "F";
			 
			return $valueBalikan;
		} else {
			$valueBalikan["PATRAJASA"] = "F";
			$valueBalikan["TALOK"] = "F";
			$valueBalikan["DIREKSIKEET"] = "F";
			$valueBalikan["WELLPADJAMBARAN"] = "F";
			$valueBalikan["REKIND"] = "F";
			$valueBalikan["GPF"] = "F";
			$valueBalikan["BLUEWAREHOUSE"] = "F";
			$valueBalikan["CENTRALWELLPAD"] = "F";
			 
		}
		
		if(($returnDIREKSIKEET == "inside") || ($returnDIREKSIKEET == "vertex")){
			$valueBalikan["PATRAJASA"] = "F";
			$valueBalikan["TALOK"] = "F";
			$valueBalikan["DIREKSIKEET"] = "T";
			$valueBalikan["WELLPADJAMBARAN"] = "F";
			$valueBalikan["REKIND"] = "F";
			$valueBalikan["GPF"] = "F";
			$valueBalikan["BLUEWAREHOUSE"] = "F";
			$valueBalikan["CENTRALWELLPAD"] = "F";
			 
			return $valueBalikan;
		} else {
			$valueBalikan["PATRAJASA"] = "F";
			$valueBalikan["TALOK"] = "F";
			$valueBalikan["DIREKSIKEET"] = "F";
			$valueBalikan["WELLPADJAMBARAN"] = "F";
			$valueBalikan["REKIND"] = "F";
			$valueBalikan["GPF"] = "F";
			$valueBalikan["BLUEWAREHOUSE"] = "F";
			$valueBalikan["CENTRALWELLPAD"] = "F";
			 
		}
		
		if(($returnWELLPADJAMBARAN == "inside") || ($returnWELLPADJAMBARAN == "vertex")){
			$valueBalikan["PATRAJASA"] = "F";
			$valueBalikan["TALOK"] = "F";
			$valueBalikan["DIREKSIKEET"] = "F";
			$valueBalikan["WELLPADJAMBARAN"] = "T";
			$valueBalikan["REKIND"] = "F";
			$valueBalikan["GPF"] = "F";
			$valueBalikan["BLUEWAREHOUSE"] = "F";
			$valueBalikan["CENTRALWELLPAD"] = "F";
			 
			return $valueBalikan;
		} else {
			$valueBalikan["PATRAJASA"] = "F";
			$valueBalikan["TALOK"] = "F";
			$valueBalikan["DIREKSIKEET"] = "F";
			$valueBalikan["WELLPADJAMBARAN"] = "F";
			$valueBalikan["REKIND"] = "F";
			$valueBalikan["GPF"] = "F";
			$valueBalikan["BLUEWAREHOUSE"] = "F";
			$valueBalikan["CENTRALWELLPAD"] = "F";
			 
		}
		
		if(($returnREKIND == "inside") || ($returnREKIND == "vertex")){
			$valueBalikan["PATRAJASA"] = "F";
			$valueBalikan["TALOK"] = "F";
			$valueBalikan["DIREKSIKEET"] = "F";
			$valueBalikan["WELLPADJAMBARAN"] = "F";
			$valueBalikan["REKIND"] = "T";
			$valueBalikan["GPF"] = "F";
			$valueBalikan["BLUEWAREHOUSE"] = "F";
			$valueBalikan["CENTRALWELLPAD"] = "F";
			 
			return $valueBalikan;
		} else {
			$valueBalikan["PATRAJASA"] = "F";
			$valueBalikan["TALOK"] = "F";
			$valueBalikan["DIREKSIKEET"] = "F";
			$valueBalikan["WELLPADJAMBARAN"] = "F";
			$valueBalikan["REKIND"] = "F";
			$valueBalikan["GPF"] = "F";
			$valueBalikan["BLUEWAREHOUSE"] = "F";
			$valueBalikan["CENTRALWELLPAD"] = "F";
			 
		}
		
		
		
		if(($returnGPF == "inside") || ($returnGPF == "vertex")){
			$valueBalikan["PATRAJASA"] = "F";
			$valueBalikan["TALOK"] = "F";
			$valueBalikan["DIREKSIKEET"] = "F";
			$valueBalikan["WELLPADJAMBARAN"] = "F";
			$valueBalikan["REKIND"] = "F";
			$valueBalikan["GPF"] = "T";
			$valueBalikan["BLUEWAREHOUSE"] = "F";
			$valueBalikan["CENTRALWELLPAD"] = "F";
			 
			return $valueBalikan;
		} else {
			$valueBalikan["PATRAJASA"] = "F";
			$valueBalikan["TALOK"] = "F";
			$valueBalikan["DIREKSIKEET"] = "F";
			$valueBalikan["WELLPADJAMBARAN"] = "F";
			$valueBalikan["REKIND"] = "F";
			$valueBalikan["GPF"] = "F";
			$valueBalikan["BLUEWAREHOUSE"] = "F";
			$valueBalikan["CENTRALWELLPAD"] = "F";
			 
		}
		 
		if(($returnBLUEWAREHOUSE == "inside") || ($returnGPF == "vertex")){
			$valueBalikan["PATRAJASA"] = "F";
			$valueBalikan["TALOK"] = "F";
			$valueBalikan["DIREKSIKEET"] = "F";
			$valueBalikan["WELLPADJAMBARAN"] = "F";
			$valueBalikan["REKIND"] = "F";
			$valueBalikan["GPF"] = "F";
			$valueBalikan["BLUEWAREHOUSE"] = "T";
			$valueBalikan["CENTRALWELLPAD"] = "F";
			 
			return $valueBalikan;
		} else {
			$valueBalikan["PATRAJASA"] = "F";
			$valueBalikan["TALOK"] = "F";
			$valueBalikan["DIREKSIKEET"] = "F";
			$valueBalikan["WELLPADJAMBARAN"] = "F";
			$valueBalikan["REKIND"] = "F";
			$valueBalikan["GPF"] = "F";
			$valueBalikan["BLUEWAREHOUSE"] = "F";
			$valueBalikan["CENTRALWELLPAD"] = "F";
			 
		}
		 
		if(($returnCENTRALWELLPAD == "inside") || ($returnGPF == "vertex")){
			$valueBalikan["PATRAJASA"] = "F";
			$valueBalikan["TALOK"] = "F";
			$valueBalikan["DIREKSIKEET"] = "F";
			$valueBalikan["WELLPADJAMBARAN"] = "F";
			$valueBalikan["REKIND"] = "F";
			$valueBalikan["GPF"] = "F";
			$valueBalikan["BLUEWAREHOUSE"] = "T";
			$valueBalikan["CENTRALWELLPAD"] = "F";
			 
			return $valueBalikan;
		} else {
			$valueBalikan["PATRAJASA"] = "F";
			$valueBalikan["TALOK"] = "F";
			$valueBalikan["DIREKSIKEET"] = "F";
			$valueBalikan["WELLPADJAMBARAN"] = "F";
			$valueBalikan["REKIND"] = "F";
			$valueBalikan["GPF"] = "F";
			$valueBalikan["BLUEWAREHOUSE"] = "F";
			$valueBalikan["CENTRALWELLPAD"] = "F";
			 
		}
		return $valueBalikan;
	}


public function validatelocation_post(){
		$pointDevice = array($this->input->post('latitude')." ".$this->input->post('longitude'));
		$absenLokasi = $this->checklocation($pointDevice);
		
		//print_r($absenLokasi);
	}
	
public function attend_post()
	{
		
		// XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('condition', 'condition', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('note', 'note', 'trim|max_length[1000]');
		//$this->form_validation->set_rules('latitude', 'Latitude', 'trim| required|max_length[1000]');
		//$this->form_validation->set_rules('longitude', 'Longitude', 'trim|required|max_length[20]');
        if ($this->form_validation->run() == FALSE){
            // form validation error
            $message = array('status' => false,
             				 'message' => $this->form_validation->error_array());
            return $this->response($message, 301);
        }else{
        	$token_valid = json_decode($this->authorization_token->validateToken());
        	if ($token_valid->status === FALSE) {
	            $message = array('status' => false,
	             				 'message' => $token_valid->message);
	            return $this->response($message, REST_Controller::HTTP_OK);	
        	}else{
        		$username = $this->input->post('username');
        		if ($username != $token_valid->data->USERNAME) {
		            $message = array('status' => false,
		             				 'message' => 'token access is denied');
		            return $this->response($message, REST_Controller::HTTP_OK);	
        		}
				 
					if ($this->input->post('condition', TRUE) == "come" && $this->input->post('note', TRUE) == null  && empty($this->input->post('note', TRUE))) {
			            $message = array('status' => false,
			             				 'message' => "Field note required");
		            	return $this->response($message, REST_Controller::HTTP_OK);
					}elseif ($this->input->post('condition', TRUE) == "return" && $this->input->post('note', TRUE) == null  && empty($this->input->post('note', TRUE))) {
			            $message = array('status' => false,
			             				 'message' => "Field note required");
		            	return $this->response($message, REST_Controller::HTTP_OK);
					}elseif ($this->input->post('note', TRUE) == null  && empty($this->input->post('latitude', TRUE)) && empty($this->input->post('longitude', TRUE))) {
			            $message = array('status' => false,
			             				 'message' => "Field latitude and longitude required");
		            	return $this->response($message, REST_Controller::HTTP_OK);
					}
					$condition = $this->input->post('condition', TRUE);
					if ($condition != "come" && $condition != "return" && $condition != "cek_kondisi"  ) {
			            $message = array('status' => false,
			             				 'message' => "Invalid condition");
		            	return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}else{
						if ($condition == "come") {
							$field_cond = "time_come"; 
							$flag = 1;
							$text = "masuk";
						}elseif ($condition == "return") {
							$field_cond = "time_return";
							$flag = 0;
							$text = "pulang";
						} elseif ($condition == "cek_kondisi") {
							$field_cond = "cek_kondisi";
							$flag = 2;
							$text = "cek kondisi";
						}  
						date_default_timezone_set('Asia/Jakarta');
						$get_date = date("Y-m-d");
						$get_time = date('H:i:s');
						// $get_datetime = date('Y-m-d H:i:s');

						// $pointDevice2 = array($this->input->post('latitude')." ".$this->input->post('longitude'));
						// $absenLokasi2 = $this->checklocation($pointDevice2);

					 
						$dtapifit = $this->Attendance_model->getfiturfitunfit() ;
						
						if ($dtapifit->num_rows() > 0) {
							
							$check_attend = $this->Attendance_model->attendcheck($token_valid->data->EMPLOYEE_NOPEK, $get_date); 
						
						if ($check_attend->num_rows() < 1) {
							if ($condition == "return") {
								 
								$message = array('status' => false,
													'kondisi' => "PULANG",
												 'message' => '<b style="font-size:13px;text-transform: uppercase;">Absen pulang gagal</b><br> karena Anda belum absen masuk. ');
								return $this->response($message, REST_Controller::HTTP_OK);
								return;
							} else if ($condition == "cek_kondisi") {
								$message = array('status' => false,
														'kondisi' => 'cek_kondisi',
												 'message' => '<b style="font-size:13px;text-transform: uppercase;">Cek Kondisi gagal </b><br>karena Anda belum absen masuk. ');
								return $this->response($message, REST_Controller::HTTP_OK);
								return;
							} 
							
							
							$pointDevice = array($this->input->post('latitude')." ".$this->input->post('longitude'));
							$absenLokasi = $this->checklocation($pointDevice);
							
							if($absenLokasi["PATRAJASA"] == "T" || $absenLokasi["TALOK"] == "T" || $absenLokasi["DIREKSIKEET"] == "T"|| $absenLokasi["WELLPADJAMBARAN"] == "T"|| $absenLokasi["REKIND"] == "T"|| $absenLokasi["GPF"] == "T"|| $absenLokasi["BLUEWAREHOUSE"] == "T"|| $absenLokasi["CENTRALWELLPAD"] == "T")
							{
								
								$message = array('status' => true, 'kondisi' => 'DALAMKANTORFIT' ,'message' => '<b style="font-size:13px;text-transform: uppercase;">Absen Masuk dalam area<br> dengan cek kondisi</b><br> Silakan isi semua kolom keterangan.');
								return $this->response($message, REST_Controller::HTTP_OK);
								 
							} 
							
							else
							{
								
								
								$message = array('status' => true, 'kondisi' => 'LUARKANTORFIT' ,'message' => '<b style="font-size:13px;text-transform: uppercase;">Memproses pengajuan absen Masuk  di luar kantor</b><br> Silakan isi kolom keterangan.');
								return $this->response($message, REST_Controller::HTTP_OK);
							} 
							 
							return;
							
							 
							
						}
						elseif ( $check_attend->num_rows() > 0) {
							
							
							
							$pointDevice = array($this->input->post('latitude')." ".$this->input->post('longitude'));
							$absenLokasi = $this->checklocation($pointDevice);
							
							if($absenLokasi["PATRAJASA"] == "T" || $absenLokasi["TALOK"] == "T" || $absenLokasi["DIREKSIKEET"] == "T"|| $absenLokasi["WELLPADJAMBARAN"] == "T"|| $absenLokasi["REKIND"] == "T"|| $absenLokasi["GPF"] == "T"|| $absenLokasi["BLUEWAREHOUSE"] == "T"|| $absenLokasi["CENTRALWELLPAD"] == "T")
							{
								foreach ($check_attend->result() as $value) {
								$time_cond = $value->time_return; 
							}
							
									if ($condition == "return") {
									if ($time_cond!=null)
									{
										$this->Attendance_model->update_attend_pulang($token_valid->data->EMPLOYEE_NOPEK, $get_date, $get_time);
									 //  $this->Attendance_model->update_attend_pulang_approval($token_valid->data->EMPLOYEE_NOPEK, $get_date, $get_time);
										$message = array('status' => true,
													 
												'message' => '<b style="font-size:13px;text-transform: uppercase;">Absen pulang berhasil</b>');
								return $this->response($message, REST_Controller::HTTP_OK);
									}										
								 else{
								$message = array('status' => true,
													'kondisi' => "DALAMPULANGFIT",
												 'message' => '<b style="font-size:13px;text-transform: uppercase;">Absen '.$text.' dalam area<br> dengan cek kondisi</b><br> Silakan isi semua kolom keterangan.');
								return $this->response($message, REST_Controller::HTTP_OK);
								 }
							} 
							
							 if ($field_cond == 'cek_kondisi') 
							{
								  
										   $message = array('status' => true,
												'kondisi' => 'edit_cek_kondisi',
														   'message' => '<b style="font-size:13px;text-transform: uppercase;">  Proses '.$text.'</b><br> Anda ingin edit kondisi kesehatan anda ? ');
										   return $this->response($message, REST_Controller::HTTP_OK);
									   
							 
							 
							}
							
							else if ($condition == "come") {
								$message = array('status' => true, 'kondisi' => 'SUDAHABSEN' ,'message' => '<b style="font-size:13px;text-transform: uppercase;">Anda Sudah Melakukan <br>Absen Masuk</b>');
								return $this->response($message, REST_Controller::HTTP_OK); 
							} 
								 
							} 
							
							else
							{
								foreach ($check_attend->result() as $value) {
								$time_cond = $value->time_return; 
							}
									if ($condition == "return") {
								 if ($time_cond!=null)
									{
										
										$this->Attendance_model->update_attend_pulang($token_valid->data->EMPLOYEE_NOPEK, $get_date, $get_time);
									   $this->Attendance_model->update_attend_pulang_approval($token_valid->data->EMPLOYEE_NOPEK, $get_date, $get_time);
										$message = array('status' => true,
										'message' => '<b style="font-size:13px;text-transform: uppercase;">Absen pulang berhasil</b>');
										return $this->response($message, REST_Controller::HTTP_OK);
										
									}else
									{
								$message = array('status' => true,
													'kondisi' => "LUARPULANGFIT",
												 'message' => '<b style="font-size:13px;text-transform: uppercase;">Absen Pulang Luar area<br> dengan cek kondisi</b><br> Silakan isi semua kolom keterangan.');
								return $this->response($message, REST_Controller::HTTP_OK);
								return;
									}
							} else if ($condition == "cek_kondisi") {
								$message = array('status' => true,
													'kondisi' => 'edit_cek_kondisi',
												  'message' => '<b style="font-size:13px;text-transform: uppercase;">  Proses '.$text.'</b><br> Anda ingin edit kondisi kesehatan anda ? ');
								return $this->response($message, REST_Controller::HTTP_OK);
								return;
							} 
							
							else if ($condition == "come") {
								$message = array('status' => true, 'kondisi' => 'SUDAHABSEN' ,'message' => '<b style="font-size:13px;text-transform: uppercase;">Anda Sudah Melakukan <br>Absen Masuk</b>');
								return $this->response($message, REST_Controller::HTTP_OK); 
							} 
							} 
							 
							return;
							
							
							
							
						}
								
						}
						
						
						else{ 
							
							
							
							
							$check_attend = $this->Attendance_model->attendcheck($token_valid->data->EMPLOYEE_NOPEK, $get_date); 
						
						if ($check_attend->num_rows() < 1) {
							if ($condition == "return") {
								 
								$message = array('status' => false,
													'kondisi' => "PULANG",
												 'message' => '<b style="font-size:13px;text-transform: uppercase;">Absen pulang gagal</b><br> karena Anda belum absen masuk. ');
								return $this->response($message, REST_Controller::HTTP_OK);
								return;
							} else if ($condition == "cek_kondisi") {
								$message = array('status' => false,
													'kondisi' => "CEKKONDISI",
												 'message' => '<b style="font-size:13px;text-transform: uppercase;">Cek Kondisi gagal </b><br>karena Anda belum absen masuk. ');
								return $this->response($message, REST_Controller::HTTP_OK);
								return;
							} 
							
							
							$pointDevice = array($this->input->post('latitude')." ".$this->input->post('longitude'));
							$absenLokasi = $this->checklocation($pointDevice);
							
							if($absenLokasi["PATRAJASA"] == "T" || $absenLokasi["TALOK"] == "T" || $absenLokasi["DIREKSIKEET"] == "T"|| $absenLokasi["WELLPADJAMBARAN"] == "T"|| $absenLokasi["REKIND"] == "T"|| $absenLokasi["GPF"] == "T"|| $absenLokasi["BLUEWAREHOUSE"] == "T"|| $absenLokasi["CENTRALWELLPAD"] == "T")
							{
								
								
						if ($condition == "come") {
							$field_cond = "time_come"; 
							$flag = 1;
							$text = "masuk";
						}elseif ($condition == "return") {
							$field_cond = "time_return";
							$flag = 0;
							$text = "pulang";
						} elseif ($condition == "cek_kondisi") {
							$field_cond = "cek_kondisi";
							$flag = 2;
							$text = "cek kondisi";
						}  
						 
						
						date_default_timezone_set('Asia/Jakarta');
						$get_date = date("Y-m-d");
						$get_time = date('H:i:s');
						$get_datetime = date('Y-m-d H:i:s');

						$pointDevice2 = array($this->input->post('latitude')." ".$this->input->post('longitude'));
						$absenLokasi2 = $this->checklocation($pointDevice2);

						if($absenLokasi2["PATRAJASA"] == "T")
						{
							$idLocation = 1;
						}
						else if($absenLokasi2["TALOK"] == "T")
						{
							$idLocation = 2;
						}
						else if($absenLokasi2["DIREKSIKEET"] == "T")
						{
							$idLocation = 3;
						}
						else if($absenLokasi2["WELLPADJAMBARAN"] == "T")
						{
							$idLocation = 4;
						}
						else if($absenLokasi2["REKIND"] == "T")
						{
							$idLocation = 5;
						}
						else if($absenLokasi2["GPF"] == "T")
						{
							$idLocation = 7;
						}
						else if($absenLokasi2["BLUEWAREHOUSE"] == "T")
						{
							$idLocation = 8;
						}
						else if($absenLokasi2["CENTRALWELLPAD"] == "T")
						{
							$idLocation = 9;
						}
						else
						{
							$idLocation = 0;
						}
						
						//Start Convert lat long to address
						
						  $lat = $this->input->post('latitude');
						  $long = $this->input->post('longitude');
						  $latlong = $lat.",".$long;
						
						  $resultApiKey = $this->Attendance_model->getfitur();
						  foreach ($resultApiKey->result() as $api) {
						  $ApiKey=$api->FITUR_KEYVALUE; 
             
							  }
						  $resultGeoCode = $this->Attendance_model->GeoCoding($latlong,$ApiKey);
						
						  $data_geo = [
							  "formatted_address" => "",
							  "country" => "",
							  "administrative_area_level_3" => "",
							  "administrative_area_level_2" => "",
							  "administrative_area_level_1" => ""
						  ];
						
						  $data_geo["formatted_address"] = $resultGeoCode["results"][0]["formatted_address"];
						  foreach($resultGeoCode["results"][0]["address_components"] as $addrComponent)
						  {
							  switch ($addrComponent["types"][0]) {
								  case "country":
									  $data_geo["country"] = $addrComponent["long_name"];
									  break;
								  case "administrative_area_level_3":
									  $data_geo["administrative_area_level_3"] = $addrComponent["long_name"];
									  break;
								  case "administrative_area_level_2":
									  $data_geo["administrative_area_level_2"] = $addrComponent["long_name"];
									  break;
								  case "administrative_area_level_1":
									  $data_geo["administrative_area_level_1"] = $addrComponent["long_name"];
									  break;
							  }
						  }
						
						//End Convert lat long to address
						
						
						$data = [
							"nopek" => $token_valid->data->EMPLOYEE_NOPEK, 
							"username" => $token_valid->data->USERNAME, 
							"email" => $token_valid->data->EMPLOYEE_EMAIL, 
							$field_cond => $get_time,
							"date_attend" => $get_date,
							"note" => "Absen Masuk Normal",
							"mark" => "Absen Normal",
							"flag" => $flag,
							"Location" => "http://maps.google.com/maps?q=".$this->input->post('latitude').",".$this->input->post('longitude')."",
							"idLocation" => $idLocation,
							  "Address" => $data_geo["formatted_address"],
							  "administrative_area_level_3" => $data_geo["administrative_area_level_3"],
							  "administrative_area_level_2" => $data_geo["administrative_area_level_2"],
							  "administrative_area_level_1" => $data_geo["administrative_area_level_1"],
							  "Country" => $data_geo["country"]
							  
							// "Address" => "sample address",
							  // "administrative_area_level_3" =>  "sample area 3",
							// "administrative_area_level_2" =>  "sample area 2",
							// "administrative_area_level_1" =>  "sample area 1",
							// "Country" =>  "sample country"
						];
						
						 
						
								
								 $insert_attend = $this->Attendance_model->set_attend($data);
								 if ($insert_attend > 0) {
										$datalogin = [
							"Id_user" => $token_valid->data->EMPLOYEE_NOPEK,
							"username" => $token_valid->data->USERNAME,
							"email" => $token_valid->data->EMPLOYEE_EMAIL,
							"Location" => "http://maps.google.com/maps?q=".$this->input->post('latitude').",".$this->input->post('longitude')."",
							"timing" => $get_date,
							"activity" => "in"
						];
									 $this->Attendance_model->set_attend_log($datalogin);
									 $message = array('status' => true,
													 'kondisi' => 'OK' ,
													  'message' => '<b style="font-size:13px;text-transform: uppercase;">Absen '.$text.' Berhasil</b><br>Absen '.$text.' dalam area Berhasil');
									 return $this->response($message, REST_Controller::HTTP_OK);
								 }else{
									 $message = array('status' => false,
													  'message' => "Cannot set attendance");
									 return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
								 }
								 
							return;
								
								
								 
							} 
							
							else
							{
								
								
								$message = array('status' => true, 'kondisi' => 'LUARKANTORNONFIT' ,'message' => '<b style="font-size:13px;text-transform: uppercase;">Memproses pengajuan absen Masuk  di luar kantor</b><br> Silakan isi kolom keterangan.');
								return $this->response($message, REST_Controller::HTTP_OK);
							} 
							 
							return;
							
							 
							
						}
						
						elseif ($check_attend->num_rows() > 0) 
						
						{
							
							if ($condition == "come") {
							$field_cond = "time_come"; 
							$flag = 1;
							$text = "masuk";
						}elseif ($condition == "return") {
							$field_cond = "time_return";
							$flag = 0;
							$text = "pulang";
						} elseif ($condition == "cek_kondisi") {
							$field_cond = "cek_kondisi";
							$flag = 2;
							$text = "cek kondisi";
						}  
						
						
							$time_come_today = "";
							foreach ($check_attend->result() as $value) {
								$time_cond = $value->$field_cond;
								$note =  $value->note;
							}
							
							$datalogout = [
							"Id_user" => $token_valid->data->EMPLOYEE_NOPEK,
							"email" => $token_valid->data->EMPLOYEE_EMAIL,
							"username" => $token_valid->data->USERNAME,
							"Location" => "http://maps.google.com/maps?q=".$this->input->post('latitude').",".$this->input->post('longitude')."",
							"timing" => $get_date,
							"activity" => "out"
						];
							$locationpeg= "http://maps.google.com/maps?q=".$this->input->post('latitude').",".$this->input->post('longitude')."";
							
							$pointDevice = array($this->input->post('latitude')." ".$this->input->post('longitude'));
							$absenLokasi = $this->checklocation($pointDevice);
							
							if($absenLokasi["PATRAJASA"] == "T" || $absenLokasi["TALOK"] == "T" || $absenLokasi["DIREKSIKEET"] == "T"|| $absenLokasi["WELLPADJAMBARAN"] == "T"|| $absenLokasi["REKIND"] == "T"|| $absenLokasi["GPF"] == "T"|| $absenLokasi["BLUEWAREHOUSE"] == "T"|| $absenLokasi["CENTRALWELLPAD"] == "T")
							{
								
									if ($condition == "return") {
										
										
								$field_cond='time_return';
								 foreach ($check_attend->result() as $value) {
								$time_cond = $value->$field_cond; 
							}
							
								 if ($time_cond != null) {
									 $this->Attendance_model->update_attend_pulang($token_valid->data->EMPLOYEE_NOPEK, $get_date, $get_time);
									 //  $this->Attendance_model->update_attend_pulang_approval($token_valid->data->EMPLOYEE_NOPEK, $get_date, $get_time);
									
								  $message = array('status' => true,
						             				  'message' => '<b style="font-size:13px;text-transform: uppercase;">Absen pulang berhasil</b>');
					            	return $this->response($message, REST_Controller::HTTP_OK);
							}
							else {
								 
								     $check_attend_log = $this->Attendance_model->set_attend_logcheck($token_valid->data->EMPLOYEE_NOPEK, $get_date);		
									 if ($check_attend_log->num_rows() < 1)
										 {
										 $this->Attendance_model->set_attend_log($datalogout);
								          }
										  
								      $update_attend = $this->Attendance_model->update_attend($token_valid->data->EMPLOYEE_NOPEK, $get_date, $get_time, $field_cond,  $locationpeg,  $this->input->post('note', TRUE));
								     $update_flag = $this->Attendance_model->update_flag($token_valid->data->EMPLOYEE_NOPEK, $get_date, 0);
								    //$update_note = $this->Attendance_model->update_note($token_valid->data->EMPLOYEE_NOPEK, $get_date, $this->input->post('note', TRUE));
								
								    if ($update_attend === TRUE) 
									{
									
									$check_attend2 = $this->Attendance_model->reqapprovalcheck2($token_valid->data->EMPLOYEE_NOPEK, $get_date );						
									if ($check_attend2->num_rows() >=1) 
										{									
									$this->Attendance_model->update_absenkeluar($token_valid->data->EMPLOYEE_NOPEK, $get_date, $get_time, $locationpeg);
									
										} 
										
						            $message = array('status' => true,
						             				 'message' => '<b style="font-size:13px;text-transform: uppercase;"> Absen '.$text.' Berhasil  </b>');
					            	return $this->response($message, REST_Controller::HTTP_OK);
								    }else{
						            $message = array('status' => false,
						             				 'message' => '<b style="font-size:13px;text-transform: uppercase;">Tidak bisa absen</b>');
					            	return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
								    }
								 
							        }  } 
							
							 
							
							else if ($condition == "come") {
								$message = array('status' => true, 'kondisi' => 'SUDAHABSEN' ,'message' => '<b style="font-size:13px;text-transform: uppercase;">Anda Sudah Melakukan <br>Absen Masuk</b>');
								return $this->response($message, REST_Controller::HTTP_OK); 
							} 
								 
							} 
							
							else
							{
								
							 if ($condition == "return") { 
								$field_cond='time_return';
								 foreach ($check_attend->result() as $value) {
								$time_cond = $value->$field_cond; 
							}
							
								 if ($time_cond != null) {
									 
									  $this->Attendance_model->update_attend_pulang($token_valid->data->EMPLOYEE_NOPEK, $get_date, $get_time);
									   $this->Attendance_model->update_attend_pulang_approval($token_valid->data->EMPLOYEE_NOPEK, $get_date, $get_time);
									
								  $message = array('status' => true,
						             				  'message' => '<b style="font-size:13px;text-transform: uppercase;">Absen pulang berhasil</b>');
					            	return $this->response($message, REST_Controller::HTTP_OK);
							}
							else {
								 
								$message = array('status' => true,
													'kondisi' => "LUARPULANGNONFIT",
												 'message' => '<b style="font-size:13px;text-transform: uppercase;">Memproses pengajuan absen Keluar  di luar kantor</b><br> Silakan isi kolom keterangan.');
								return $this->response($message, REST_Controller::HTTP_OK);
								return;
							 } 
							 
							 }
							
							 
							else if ($condition == "come") {
								$message = array('status' => true, 'kondisi' => 'SUDAHABSEN' ,'message' => '<b style="font-size:13px;text-transform: uppercase;">Anda Sudah Melakukan <br>Absen Masuk</b>');
								return $this->response($message, REST_Controller::HTTP_OK); 
							} 
							} 
							 
							return;
							
							
							
						}
						}
						
					 
					}
				 
			}
        }
	}
	


public function inoffice_attend_post()
	{
		
		// XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('condition', 'condition', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('note', 'note', 'trim|max_length[1000]');
		$this->form_validation->set_rules('note_lain', 'note lain', 'trim|max_length[1000]');
		$this->form_validation->set_rules('kondisi', 'note', 'trim|max_length[1000]');
		//$this->form_validation->set_rules('latitude', 'Latitude', 'trim| required|max_length[1000]');
		//$this->form_validation->set_rules('longitude', 'Longitude', 'trim|required|max_length[20]');
        if ($this->form_validation->run() == FALSE){
            // form validation error
            $message = array('status' => false,
             				 'message' => $this->form_validation->error_array());
            return $this->response($message, 301);
        }else{
        	$token_valid = json_decode($this->authorization_token->validateToken());
        	if ($token_valid->status === FALSE) {
	            $message = array('status' => false,
	             				 'message' => $token_valid->message);
	            return $this->response($message, REST_Controller::HTTP_OK);	
        	}else{
        		$noktp = $this->input->post('username');
        		if ($noktp != $token_valid->data->USERNAME) {
		            $message = array('status' => false,
		             				 'message' => 'token access is denied');
		            return $this->response($message, REST_Controller::HTTP_OK);	
        		}
				 
					if ($this->input->post('condition', TRUE) == "come" && $this->input->post('note', TRUE) == null  && empty($this->input->post('note', TRUE))) {
			            $message = array('status' => false,
			             				 'message' => "Field note required");
		            	return $this->response($message, REST_Controller::HTTP_OK);
					}elseif ($this->input->post('condition', TRUE) == "return" && $this->input->post('note', TRUE) == null  && empty($this->input->post('note', TRUE))) {
			            $message = array('status' => false,
			             				 'message' => "Field note required");
		            	return $this->response($message, REST_Controller::HTTP_OK);
					}elseif ($this->input->post('note', TRUE) == null  && empty($this->input->post('latitude', TRUE)) && empty($this->input->post('longitude', TRUE))) {
			            $message = array('status' => false,
			             				 'message' => "Field latitude and longitude required");
		            	return $this->response($message, REST_Controller::HTTP_OK);
					}
					$condition = $this->input->post('condition', TRUE);
					if ($condition != "come" && $condition != "return"  ) {
			            $message = array('status' => false,
			             				 'message' => "Invalid condition");
		            	return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}else{
						
							if ($condition == "come") {
							$field_cond = "time_come"; 
							$flag = 1;
							$text = "masuk";
						}elseif ($condition == "return") {
							$field_cond = "time_return";
							$flag = 0;
							$text = "pulang";
						} elseif ($condition == "cek_kondisi") {
							$field_cond = "cek_kondisi";
							$flag = 2;
							$text = "cek kondisi";
						}  
						
						date_default_timezone_set('Asia/Jakarta');
						$get_date = date("Y-m-d");
						$get_time = date('H:i:s');
						$get_datetime = date('Y-m-d H:i:s');
						
						

						$pointDevice2 = array($this->input->post('latitude')." ".$this->input->post('longitude'));
						$absenLokasi2 = $this->checklocation($pointDevice2);

						if($absenLokasi2["PATRAJASA"] == "T")
						{
							$idLocation = 1;
						}
						else if($absenLokasi2["TALOK"] == "T")
						{
							$idLocation = 2;
						}
						else if($absenLokasi2["DIREKSIKEET"] == "T")
						{
							$idLocation = 3;
						}
						else if($absenLokasi2["WELLPADJAMBARAN"] == "T")
						{
							$idLocation = 4;
						}
						else if($absenLokasi2["REKIND"] == "T")
						{
							$idLocation = 5;
						}
						else if($absenLokasi2["GPF"] == "T")
						{
							$idLocation = 7;
						}
						else if($absenLokasi2["BLUEWAREHOUSE"] == "T")
						{
							$idLocation = 8;
						}
						else if($absenLokasi2["CENTRALWELLPAD"] == "T")
						{
							$idLocation = 9;
						}
						else
						{
							$idLocation = 0;
						}
						
						//Start Convert lat long to address
						
						  $lat = $this->input->post('latitude');
						  $long = $this->input->post('longitude');
						  $latlong = $lat.",".$long;
						
						  $resultApiKey = $this->Attendance_model->getfitur();
						  foreach ($resultApiKey->result() as $api) {
						  $ApiKey=$api->FITUR_KEYVALUE; 
             
							  }
						  $resultGeoCode = $this->Attendance_model->GeoCoding($latlong,$ApiKey);
						
						  $data_geo = [
							  "formatted_address" => "",
							  "country" => "",
							  "administrative_area_level_3" => "",
							  "administrative_area_level_2" => "",
							  "administrative_area_level_1" => ""
						  ];
						
						  $data_geo["formatted_address"] = $resultGeoCode["results"][0]["formatted_address"];
						  foreach($resultGeoCode["results"][0]["address_components"] as $addrComponent)
						  {
							  switch ($addrComponent["types"][0]) {
								  case "country":
									  $data_geo["country"] = $addrComponent["long_name"];
									  break;
								  case "administrative_area_level_3":
									  $data_geo["administrative_area_level_3"] = $addrComponent["long_name"];
									  break;
								  case "administrative_area_level_2":
									  $data_geo["administrative_area_level_2"] = $addrComponent["long_name"];
									  break;
								  case "administrative_area_level_1":
									  $data_geo["administrative_area_level_1"] = $addrComponent["long_name"];
									  break;
							  }
						  }
						
						//End Convert lat long to address
						
							$locationpeg= "http://maps.google.com/maps?q=".$this->input->post('latitude').",".$this->input->post('longitude')."";
						$check_attend = $this->Attendance_model->attendcheck($token_valid->data->EMPLOYEE_NOPEK, $get_date); 
					if ($check_attend->num_rows() < 1) {	
						
						$data = [
							"nopek" => $token_valid->data->EMPLOYEE_NOPEK, 
							"username" => $token_valid->data->USERNAME, 
							"email" => $token_valid->data->EMPLOYEE_EMAIL, 
							$field_cond => $get_time,
							"date_attend" => $get_date,
							"note" => "Absen Masuk Normal Dengan Cek Kondisi",
							"mark" => "Absen Normal",
							"StatusFit" =>  $this->input->post('kondisi', TRUE),
							"StatusFitNote" =>  $this->input->post('note', TRUE),
							"StatusFitNote_Lain" =>  $this->input->post('note_lain', TRUE),
							"StatusFit_UpdateOn" => $get_datetime,
							"flag" => $flag,
							"Location" => "http://maps.google.com/maps?q=".$this->input->post('latitude').",".$this->input->post('longitude')."",
							"idLocation" => $idLocation,
							  "Address" => $data_geo["formatted_address"],
							  "administrative_area_level_3" => $data_geo["administrative_area_level_3"],
							  "administrative_area_level_2" => $data_geo["administrative_area_level_2"],
							  "administrative_area_level_1" => $data_geo["administrative_area_level_1"],
							  "Country" => $data_geo["country"]
							  
							// "Address" => "sample address",
							  // "administrative_area_level_3" =>  "sample area 3",
							// "administrative_area_level_2" =>  "sample area 2",
							// "administrative_area_level_1" =>  "sample area 1",
							// "Country" =>  "sample country"
						];
						
						 
						
								
								 $insert_attend = $this->Attendance_model->set_attend($data);
								 if ($insert_attend > 0) {
										$datalogin = [
							"Id_user" => $token_valid->data->EMPLOYEE_NOPEK,
							"username" => $token_valid->data->USERNAME,
							"email" => $token_valid->data->EMPLOYEE_EMAIL,
							"Location" => "http://maps.google.com/maps?q=".$this->input->post('latitude').",".$this->input->post('longitude')."",
							"timing" => $get_date,
							"activity" => "in"
						];
									 $this->Attendance_model->set_attend_log($datalogin);
									 $message = array('status' => true,
													 'kondisi' => 'OK' ,
													  'message' => '<b style="font-size:13px;text-transform: uppercase;">Absen '.$text.' Berhasil</b><br>Absen '.$text.' dalam area Berhasil');
									 return $this->response($message, REST_Controller::HTTP_OK);
								 }else{
									 $message = array('status' => false,
													  'message' => "Cannot set attendance");
									 return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
								 }
								 
							return;
							
						 }
						 
						 elseif ($check_attend->num_rows() > 0) {
							foreach ($check_attend->result() as $value) {
								$time_cond = $value->$field_cond;
								$note =  $value->note;
							}
							$locationpeg= "http://maps.google.com/maps?q=".$this->input->post('latitude').",".$this->input->post('longitude')."";
							$datalogout = [
							"Id_user" => $token_valid->data->EMPLOYEE_NOPEK,
							"email" => $token_valid->data->EMPLOYEE_EMAIL,
							"username" => $token_valid->data->USERNAME,
							"Location" => "http://maps.google.com/maps?q=".$this->input->post('latitude').",".$this->input->post('longitude')."",
							"timing" => $get_date,
							"activity" => "out"
						];
							if ($time_cond == null) { 
							 
									 $check_attend_log = $this->Attendance_model->set_attend_logcheck($token_valid->data->EMPLOYEE_NOPEK, $get_date);						
								
								if ($check_attend_log->num_rows() < 1) {
									
							$this->Attendance_model->set_attend_log($datalogout);
								}
								 
								 
								$update_attend = $this->Attendance_model->update_attend($token_valid->data->EMPLOYEE_NOPEK, $get_date, $get_time, $field_cond,$locationpeg, $this->input->post('note', TRUE));
								 $insert_attend = $this->Attendance_model->edit_kondisi($this->input->post('username'),$get_date,$this->input->post('kondisi'),$this->input->post('note'),$this->input->post('note_lain'));
							$update_flag = $this->Attendance_model->update_flag($token_valid->data->EMPLOYEE_NOPEK, $get_date, 0);
								$update_note = $this->Attendance_model->update_note2($token_valid->data->EMPLOYEE_NOPEK, $get_date, $this->input->post('note', TRUE), $get_time, $field_cond);
								if ($update_attend === TRUE  && $update_note > 0) {
						            $message = array('status' => true,
						             						 'message' => '<b style="font-size:13px;text-transform: uppercase;">Absen '.$text.' Berhasil</b><br>Absen '.$text.' dalam area Berhasil');
					            	
					            	return $this->response($message, REST_Controller::HTTP_OK);
								}else{
						            $message = array('status' => false,
						             				 'message' => "Tidak bisa absen");
					            	return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
								}
							}
							 
							else{
					            $message = array('status' => false,
					             				 'message' => "Anda sudah absen ".$text);
				            	return $this->response($message, REST_Controller::HTTP_OK);
							}
						}
						 
					}
				 
			}
        }
	}
	

 
public function outoffice_attend_post()
	{
		
		// XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('condition', 'condition', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('note', 'note', 'trim|max_length[1000]');
		$this->form_validation->set_rules('note_kondisi', 'note lain', 'trim|max_length[1000]');
		$this->form_validation->set_rules('note_lain', 'note lain', 'trim|max_length[1000]');
		$this->form_validation->set_rules('kondisi', 'kondisi kesehatan', 'trim|max_length[1000]');
        if ($this->form_validation->run() == FALSE){
            // form validation error
            $message = array('status' => false,
             				 'message' => $this->form_validation->error_array());
            return $this->response($message, HTTP_BAD_REQUEST);
        }else{
        	$token_valid = json_decode($this->authorization_token->validateToken());
        	if ($token_valid->status === FALSE) {
	            $message = array('status' => false,
	             				 'message' => $token_valid->message);
	            return $this->response($message, REST_Controller::HTTP_OK);	
        	}else{
        		$username = $this->input->post('username');
        		if ($username != $token_valid->data->USERNAME) {
		            $message = array('status' => false,
		             				 'message' => 'token access is denied');
		            return $this->response($message, REST_Controller::HTTP_OK);	
        		}
				 
				 
						if ($this->input->post('condition', TRUE) == "return" && $this->input->post('note', TRUE) == null  && empty($this->input->post('note', TRUE))) {
			            $message = array('status' => false,
			             				 'message' => "Field note required");
		            	return $this->response($message, REST_Controller::HTTP_OK);
					}elseif ($this->input->post('note', TRUE) == null  && empty($this->input->post('latitude', TRUE)) && empty($this->input->post('longitude', TRUE))) {
			            $message = array('status' => false,
			             				 'message' => "Field latitude and longitude required");
		            	return $this->response($message, REST_Controller::HTTP_OK);
					}
					$condition = $this->input->post('condition', TRUE);
					if ($condition != "come" && $condition != "return" && $condition != "cek_kondisi") {
			            $message = array('status' => false,
			             				 'message' => "Invalid condition");
		            	return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}else{
						$field_cond= "";
						if ($condition == "come") {
							$field_cond = "time_come"; 
							$flag = 1;
							$text = "masuk";
							$absenLeave = false;
						}elseif ($condition == "return") {
							$field_cond = "time_return";
							$flag = 0;
							$text = "pulang";
							$absenLeave = false;
						}elseif ($condition == "cek_kondisi") {
							$field_cond = "cek_kondisi";
							$flag = 0;
							$text = "cek_kondisi";
							$absenLeave = false;
						} 
						
						$pointDevice2 = array($this->input->post('latitude')." ".$this->input->post('longitude'));
						$absenLokasi2 = $this->checklocation($pointDevice2);

						if($absenLokasi2["PATRAJASA"] == "T")
						{
							$idLocation = 1;
						}
						else if($absenLokasi2["TALOK"] == "T")
						{
							$idLocation = 2;
						}
						else if($absenLokasi2["DIREKSIKEET"] == "T")
						{
							$idLocation = 3;
						}
						else if($absenLokasi2["WELLPADJAMBARAN"] == "T")
						{
							$idLocation = 4;
						}
						else if($absenLokasi2["REKIND"] == "T")
						{
							$idLocation = 5;
						}
						else if($absenLokasi2["GPF"] == "T")
						{
							$idLocation = 7;
						}
						else if($absenLokasi2["BLUEWAREHOUSE"] == "T")
						{
							$idLocation = 8;
						}
						else if($absenLokasi2["CENTRALWELLPAD"] == "T")
						{
							$idLocation = 9;
						}
						else
						{
							$idLocation = 0;
						}
						
						//Start Convert lat long to address
						
						  $lat = $this->input->post('latitude');
						  $long = $this->input->post('longitude');
						  $latlong = $lat.",".$long;
						
						  $resultApiKey = $this->Attendance_model->getfitur();
						  foreach ($resultApiKey->result() as $api) {
						  $ApiKey=$api->FITUR_KEYVALUE; 
             
							  }
						  $resultGeoCode = $this->Attendance_model->GeoCoding($latlong,$ApiKey);
						
						  $data_geo = [
							  "formatted_address" => "",
							  "country" => "",
							  "administrative_area_level_3" => "",
							  "administrative_area_level_2" => "",
							  "administrative_area_level_1" => ""
						  ];
						
						  $data_geo["formatted_address"] = $resultGeoCode["results"][0]["formatted_address"];
						  foreach($resultGeoCode["results"][0]["address_components"] as $addrComponent)
						  {
							  switch ($addrComponent["types"][0]) {
								  case "country":
									  $data_geo["country"] = $addrComponent["long_name"];
									  break;
								  case "administrative_area_level_3":
									  $data_geo["administrative_area_level_3"] = $addrComponent["long_name"];
									  break;
								  case "administrative_area_level_2":
									  $data_geo["administrative_area_level_2"] = $addrComponent["long_name"];
									  break;
								  case "administrative_area_level_1":
									  $data_geo["administrative_area_level_1"] = $addrComponent["long_name"];
									  break;
							  }
						  }
						
						//End Convert lat long to address
					 	date_default_timezone_set('Asia/Jakarta');
									$get_date = date("Y-m-d");
									$get_time = date('H:i:s');
									$get_fulldate = date('Y-m-d h:i:s');
									$fullname= $token_valid->data->EMPLOYEE_NAMA;
									$get_datetime = date('Y-m-d h:i:s');
								
									$alasan_absen=$this->input->post('note');
									if ($alasan_absen=="OFFDUTY")
									{
										$time_return=$get_time;
										
									}else{
										$time_return=null;
									}
						
						$check_attend = $this->Attendance_model->attendcheck($token_valid->data->EMPLOYEE_NOPEK, $get_date);
						
							$locationpeg= "http://maps.google.com/maps?q=".$this->input->post('latitude').",".$this->input->post('longitude')."";
						if ($check_attend->num_rows() < 1) {
							 
						  
								$get_atasan = $this->Attendance_model->get_atasan($username);
								
								if ($get_atasan === FALSE) {
									$message = array('status' => false,
													 'message' => 'Tidak ditemukan data atasan');
									return $this->response($message, REST_Controller::HTTP_OK);
								}else{
									if ($get_atasan->num_rows() > 0) {
										foreach ($get_atasan->result() as $row) {
											$pos_id_atasan = $row->POS_ID_SUPERIOR;
										}
									}
								
									$data = [
										"nopek" => $token_valid->data->EMPLOYEE_NOPEK,
										 "email" => $token_valid->data->EMPLOYEE_EMAIL,
										 "username" => $token_valid->data->USERNAME,
										"date_attend" => $get_date,
										"Jam_absen" => $get_time,
										"Jam_keluar" => $time_return,
										"POS_ID" => $pos_id_atasan,
										"Note" => $this->input->post('note', TRUE),
										"Tipe" => 'Absen Luar Area',
										"Status" => "P", //pending 
										"nama_karyawan" => $fullname,
							            "Location" => "http://maps.google.com/maps?q=".$this->input->post('latitude').",".$this->input->post('longitude')."",
										"date_action_manager" => $get_fulldate
									];
									
									$data2 = [
										"nopek" => $token_valid->data->EMPLOYEE_NOPEK,
										"email" => $token_valid->data->EMPLOYEE_EMAIL,
										"username" => $token_valid->data->USERNAME,
										$field_cond => $get_time,
										"time_return" => $time_return,
										"date_attend" => $get_date,
										"note" => $this->input->post('note', TRUE),
										"mark" => "Absen Luar Area",
										"StatusFit" =>  $this->input->post('kondisi', TRUE),
										"StatusFitNote" =>  $this->input->post('note_kondisi', TRUE),
										"StatusFitNote_Lain" =>  $this->input->post('note_lain', TRUE),
										"StatusFit_UpdateOn" => $get_datetime,
										"flag" => $flag,
										"Location" => "http://maps.google.com/maps?q=".$this->input->post('latitude').",".$this->input->post('longitude')."",
										"idLocation" => $idLocation, 
										"Address" => $data_geo["formatted_address"],
										"administrative_area_level_3" => $data_geo["administrative_area_level_3"],
										"administrative_area_level_2" => $data_geo["administrative_area_level_2"],
										"administrative_area_level_1" => $data_geo["administrative_area_level_1"],
										"Country" => $data_geo["country"],
										"PhotoMasuk" => $this->input->post('photo', TRUE)
										// "Address" => "sample address",
										// "administrative_area_level_3" =>  "sample area 3",
										// "administrative_area_level_2" =>  "sample area 2",
										// "administrative_area_level_1" =>  "sample area 1",
										// "Country" =>  "sample country"
						];
						
						
									$absen_approve = $this->Attendance_model->set_attend($data2);
									$insert_approval = $this->Attendance_model->set_minta_approval($data);
				 
									if ($absen_approve > 0) {
										$datalogin = [
							"Id_user" => $token_valid->data->EMPLOYEE_NOPEK,
							"email" => $token_valid->data->EMPLOYEE_EMAIL,
							"username" => $token_valid->data->USERNAME,
							"Location" => "http://maps.google.com/maps?q=".$this->input->post('latitude').",".$this->input->post('longitude')."",
							"timing" => $get_date,
							"activity" => "in"
						];
									$this->Attendance_model->set_attend_log($datalogin);
										$message = array('status' => true,
														'kondisi' => 'OK' ,
														 'message' => '<b style="font-size:13px;text-transform: uppercase;">Anda berada diluar Area kantor</b><br> Absen '.$text.' membutuhkan approval atasan! ');
										return $this->response($message, REST_Controller::HTTP_OK);
									}else{
										$message = array('status' => false,
														 'message' => "Tidak bisa absen");
										return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
									}
								}
								
								$message = array('status' => "99",
					             				 'message' => "General error");
				            	return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
							 
							
						 
							return;
							
							 
							
						}elseif ($check_attend->num_rows() > 0) {
							foreach ($check_attend->result() as $value) {
								$time_cond = $value->$field_cond;
								$note =  $value->note;
							}
							
							$datalogout = [
							"Id_user" => $token_valid->data->EMPLOYEE_NOPEK,
							"email" => $token_valid->data->EMPLOYEE_EMAIL,
							"username" => $token_valid->data->USERNAME,
							"Location" => "http://maps.google.com/maps?q=".$this->input->post('latitude').",".$this->input->post('longitude')."",
							"timing" => $get_date,
							"activity" => "out"
						];
						
						 	date_default_timezone_set('Asia/Jakarta');
									$get_date = date("Y-m-d");
									$get_time = date('H:i:s');
									$get_fulldate = date('Y-m-d h:i:s');
									$fullname= $token_valid->data->EMPLOYEE_NAMA;
									$get_datetime = date('Y-m-d h:i:s');
									
									
							if ($time_cond == null) { 
								$check_attend2 = $this->Attendance_model->reqapprovalcheck($token_valid->data->EMPLOYEE_NOPEK, $get_date, $this->input->post('condition'));						
								 if ($check_attend2->num_rows() >= 1) {
									 $check_attend_log = $this->Attendance_model->set_attend_logcheck($token_valid->data->EMPLOYEE_NOPEK, $get_date);						
								
								if ($check_attend_log->num_rows() < 1) {
									
							$this->Attendance_model->set_attend_log($datalogout);
								}
								  $this->Attendance_model->update_approve($token_valid->data->EMPLOYEE_NOPEK, $get_date, $get_time, $this->input->post('note', TRUE), $locationpeg);
								 $this->Attendance_model->update_note2($token_valid->data->EMPLOYEE_NOPEK, $get_date, $this->input->post('note', TRUE), $get_time, $field_cond);
								$this->Attendance_model->edit_kondisi($this->input->post('username'),$get_date,$this->input->post('kondisi'),$this->input->post('note_kondisi'),$this->input->post('note_lain'));
								$this->Attendance_model->update_foto($token_valid->data->EMPLOYEE_NOPEK,$get_date, $this->input->post('photo', TRUE));
							
								$message = array('status' => true,
		             				'message' => '<b style="font-size:13px;text-transform: uppercase;">Anda berada diluar Area kantor</b><br> Absen '.$text.' membutuhkan approval atasan! ');
		            return $this->response($message, REST_Controller::HTTP_OK);
								 }
								$update_attend = $this->Attendance_model->update_attend($token_valid->data->EMPLOYEE_NOPEK, $get_date, $get_time, $field_cond, $flag,$locationpeg);
								$update_flag = $this->Attendance_model->update_flag($token_valid->data->EMPLOYEE_NOPEK, $get_date, 0);
								$update_note = $this->Attendance_model->update_note2($token_valid->data->EMPLOYEE_NOPEK, $get_date, $this->input->post('note', TRUE), $get_time, $field_cond);
								 
								if ($update_attend === TRUE  && $update_note > 0) {
						            $message = array('status' => true,
						             				 'message' => "Absen ".$text." Berhasil!");
					            	return $this->response($message, REST_Controller::HTTP_OK);
								}else{
						            $message = array('status' => false,
						             				 'message' => "Tidak bisa absen");
					            	return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
								}
							}
							 
							else{
					            $message = array('status' => false,
					             				 'message' => "Anda sudah absen ".$text);
				            	return $this->response($message, REST_Controller::HTTP_OK);
							}
						}
					}
				 
			}
        }
	}

	
	
public function outofficenon_attend_post()
	{
		
		// XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('condition', 'condition', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('note', 'note', 'trim|max_length[1000]');
		$this->form_validation->set_rules('latitude', 'Latitude', 'trim|required|max_length[1000]');
		$this->form_validation->set_rules('longitude', 'Longitude', 'trim|required|max_length[1000]');
        if ($this->form_validation->run() == FALSE){
            // form validation error
            $message = array('status' => false,
             				 'message' => $this->form_validation->error_array());
            return $this->response($message, HTTP_BAD_REQUEST);
        }else{
        	$token_valid = json_decode($this->authorization_token->validateToken());
        	if ($token_valid->status === FALSE) {
	            $message = array('status' => false,
	             				 'message' => $token_valid->message);
	            return $this->response($message, REST_Controller::HTTP_OK);	
        	}else{
        		$username = $this->input->post('username');
        		if ($username != $token_valid->data->USERNAME) {
		            $message = array('status' => false,
		             				 'message' => 'token access is denied');
		            return $this->response($message, REST_Controller::HTTP_OK);	
        		}
				 
					
						if ($this->input->post('condition', TRUE) == "return" && $this->input->post('note', TRUE) == null  && empty($this->input->post('note', TRUE))) {
			            $message = array('status' => false,
			             				 'message' => "Field note required");
		            	return $this->response($message, REST_Controller::HTTP_OK);
					}elseif ($this->input->post('note', TRUE) == null  && empty($this->input->post('latitude', TRUE)) && empty($this->input->post('longitude', TRUE))) {
			            $message = array('status' => false,
			             				 'message' => "Field latitude and longitude required");
		            	return $this->response($message, REST_Controller::HTTP_OK);
					}
					$condition = $this->input->post('condition', TRUE);
					if ($condition != "come" && $condition != "return" && $condition != "break" && $condition != "end_of_break" && $condition != "leave") {
			            $message = array('status' => false,
			             				 'message' => "Invalid condition");
		            	return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}else{
						$field_cond= "";
						if ($condition == "come") {
							$field_cond = "time_come"; 
							$flag = 1;
							$text = "masuk";
							$absenLeave = false;
						}elseif ($condition == "return") {
							$field_cond = "time_return";
							$flag = 0;
							$text = "pulang";
							$absenLeave = false;
						 
						}elseif ($condition == "cek_kondisi") {
							$field_cond = "cek_kondisi";
							$flag = 2;
							$text = "cek_kondisi";
							$absenLeave = true;
						}
						date_default_timezone_set('Asia/Jakarta');
						$get_date = date("Y-m-d");
						$get_time = date('H:i:s');
						
						$alasan_absen=$this->input->post('note');
									if ($alasan_absen=="OFFDUTY")
									{
										$time_return=$get_time;
										
									}else{
										$time_return=null;
									}
						
						$check_attend = $this->Attendance_model->attendcheck($token_valid->data->EMPLOYEE_NOPEK, $get_date);
						
							$locationpeg= "http://maps.google.com/maps?q=".$this->input->post('latitude').",".$this->input->post('longitude')."";
						if ($check_attend->num_rows() < 1) {
							 
							$pointDevice = array($this->input->post('latitude')." ".$this->input->post('longitude'));
							$absenLokasi2 = $this->checklocation($pointDevice);
							
							 if($absenLokasi2["PATRAJASA"] == "T")
						{
							$idLocation = 1;
						}
						else if($absenLokasi2["TALOK"] == "T")
						{
							$idLocation = 2;
						}
						else if($absenLokasi2["DIREKSIKEET"] == "T")
						{
							$idLocation = 3;
						}
						else if($absenLokasi2["WELLPADJAMBARAN"] == "T")
						{
							$idLocation = 4;
						}
						else if($absenLokasi2["REKIND"] == "T")
						{
							$idLocation = 5;
						}
						else if($absenLokasi2["GPF"] == "T")
						{
							$idLocation = 7;
						}
						else if($absenLokasi2["BLUEWAREHOUSE"] == "T")
						{
							$idLocation = 8;
						}
						else if($absenLokasi2["CENTRALWELLPAD"] == "T")
						{
							$idLocation = 9;
						}
						else
						{
							$idLocation = 0;
						}
						
						//Start Convert lat long to address
						
						  $lat = $this->input->post('latitude');
						  $long = $this->input->post('longitude');
						  $latlong = $lat.",".$long;
						
						  $resultApiKey = $this->Attendance_model->getfitur();
						  foreach ($resultApiKey->result() as $api) {
						  $ApiKey=$api->FITUR_KEYVALUE; 
             
							  }
						  $resultGeoCode = $this->Attendance_model->GeoCoding($latlong,$ApiKey);
						
						  $data_geo = [
							  "formatted_address" => "",
							  "country" => "",
							  "administrative_area_level_3" => "",
							  "administrative_area_level_2" => "",
							  "administrative_area_level_1" => ""
						  ];
						
						  $data_geo["formatted_address"] = $resultGeoCode["results"][0]["formatted_address"];
						  foreach($resultGeoCode["results"][0]["address_components"] as $addrComponent)
						  {
							  switch ($addrComponent["types"][0]) {
								  case "country":
									  $data_geo["country"] = $addrComponent["long_name"];
									  break;
								  case "administrative_area_level_3":
									  $data_geo["administrative_area_level_3"] = $addrComponent["long_name"];
									  break;
								  case "administrative_area_level_2":
									  $data_geo["administrative_area_level_2"] = $addrComponent["long_name"];
									  break;
								  case "administrative_area_level_1":
									  $data_geo["administrative_area_level_1"] = $addrComponent["long_name"];
									  break;
							  }
						  }
						
						//End Convert lat long to address
						
						
								$get_atasan = $this->Attendance_model->get_atasan($username);
								
								if ($get_atasan === FALSE) {
									$message = array('status' => false,
													 'message' => 'Tidak ditemukan data atasan');
									return $this->response($message, REST_Controller::HTTP_OK);
								}else{
									if ($get_atasan->num_rows() > 0) {
										foreach ($get_atasan->result() as $row) {
											$pos_id_atasan = $row->POS_ID_SUPERIOR;
										}
									}
									date_default_timezone_set('Asia/Jakarta');
									$get_date = date("Y-m-d");
									$get_time = date('H:i:s');
									$get_fulldate = date('Y-m-d h:i:s');
									$fullname= $token_valid->data->EMPLOYEE_NAMA;

									$data = [
										"nopek" => $token_valid->data->EMPLOYEE_NOPEK,
										 "email" => $token_valid->data->EMPLOYEE_EMAIL,
										 "username" => $token_valid->data->USERNAME,
										"date_attend" => $get_date,
										"Jam_absen" => $get_time,
										"Jam_keluar" => $time_return,
										"POS_ID" => $pos_id_atasan,
										"Note" => $this->input->post('note', TRUE),
										"Tipe" => 'Absen Luar Area',
										//"Location" => $this->input->post('longitude', TRUE)." ".$this->input->post('latitude', TRUE),
										"Status" => "P", //pending 
										"nama_karyawan" => $fullname,
							            "Location" => "http://maps.google.com/maps?q=".$this->input->post('latitude').",".$this->input->post('longitude')."",
							
										"date_action_manager" => $get_fulldate
									];
									
									$data2 = [
							"nopek" => $token_valid->data->EMPLOYEE_NOPEK,
							 "email" => $token_valid->data->EMPLOYEE_EMAIL,
							 "username" => $token_valid->data->USERNAME,
							"time_come" => $get_time,
							"time_return" => $time_return,
							"date_attend" => $get_date,
							"note" => $this->input->post('note', TRUE),
							"mark" => "Absen Luar Area",
							"flag" => $flag, 
							"Location" => "http://maps.google.com/maps?q=".$this->input->post('latitude').",".$this->input->post('longitude')."",
							"idLocation" => $idLocation,
							"Address" => $data_geo["formatted_address"],
							  "administrative_area_level_3" => $data_geo["administrative_area_level_3"],
							  "administrative_area_level_2" => $data_geo["administrative_area_level_2"],
							  "administrative_area_level_1" => $data_geo["administrative_area_level_1"],
							  "Country" => $data_geo["country"],
							  "PhotoMasuk" => $this->input->post('photo', TRUE)
							  
							// "Address" => "sample address",
							  // "administrative_area_level_3" =>  "sample area 3",
							// "administrative_area_level_2" =>  "sample area 2",
							// "administrative_area_level_1" =>  "sample area 1",
							// "Country" =>  "sample country"
						];
						
						
									$absen_approve = $this->Attendance_model->set_attend($data2);
									$insert_approval = $this->Attendance_model->set_minta_approval($data);
				 
									if ($insert_approval > 0) {
										$datalogin = [
							"Id_user" => $token_valid->data->EMPLOYEE_NOPEK,
							"email" => $token_valid->data->EMPLOYEE_EMAIL,
							"username" => $token_valid->data->USERNAME,
							"Location" => "http://maps.google.com/maps?q=".$this->input->post('latitude').",".$this->input->post('longitude')."",
							"timing" => $get_date,
							"activity" => "in"
						];
									$this->Attendance_model->set_attend_log($datalogin);
										$message = array('status' => true,
														 'message' => '<b style="font-size:13px;text-transform: uppercase;">Anda berada diluar Area kantor</b><br> Absen '.$text.' membutuhkan approval atasan! ');
										return $this->response($message, REST_Controller::HTTP_OK);
									}else{
										$message = array('status' => false,
														 'message' => "Tidak bisa absen");
										return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
									}
								}
								
								$message = array('status' => "99",
					             				 'message' => "General error");
				            	return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
							 
							return;
							
							 
							
						}elseif ($check_attend->num_rows() > 0) {
							foreach ($check_attend->result() as $value) {
								$time_cond = $value->$field_cond;
								$note =  $value->note;
							}
							
							$datalogout = [
							"Id_user" => $token_valid->data->EMPLOYEE_NOPEK,
							"email" => $token_valid->data->EMPLOYEE_EMAIL,
							"username" => $token_valid->data->USERNAME,
							"Location" => "http://maps.google.com/maps?q=".$this->input->post('latitude').",".$this->input->post('longitude')."",
							"timing" => $get_date,
							"activity" => "out"
						];
							if ($time_cond == null) { 
								$check_attend2 = $this->Attendance_model->reqapprovalcheck($token_valid->data->EMPLOYEE_NOPEK, $get_date, $this->input->post('condition'));						
								 if ($check_attend2->num_rows() >= 1) {
									 $check_attend_log = $this->Attendance_model->set_attend_logcheck($token_valid->data->EMPLOYEE_NOPEK, $get_date);						
								
								if ($check_attend_log->num_rows() < 1) {
									
							$this->Attendance_model->set_attend_log($datalogout);
								}
								  $this->Attendance_model->update_approve($token_valid->data->EMPLOYEE_NOPEK, $get_date, $get_time, $this->input->post('note', TRUE), $locationpeg);
								 $this->Attendance_model->update_note2($token_valid->data->EMPLOYEE_NOPEK, $get_date, $this->input->post('note', TRUE), $get_time, $field_cond);
								$this->Attendance_model->update_foto($token_valid->data->EMPLOYEE_NOPEK,$get_date, $this->input->post('photo', TRUE));
							
								$message = array('status' => true,
		             				'message' => '<b style="font-size:13px;text-transform: uppercase;">Anda berada diluar Area kantor</b><br> Absen '.$text.' membutuhkan approval atasan! ');
		            return $this->response($message, REST_Controller::HTTP_OK);
								 }
								$update_attend = $this->Attendance_model->update_attend($token_valid->data->EMPLOYEE_NOPEK, $get_date, $get_time, $field_cond, $flag,$locationpeg);
								$update_flag = $this->Attendance_model->update_flag($token_valid->data->EMPLOYEE_NOPEK, $get_date, 0);
								$update_note = $this->Attendance_model->update_note2($token_valid->data->EMPLOYEE_NOPEK, $get_date, $this->input->post('note', TRUE), $get_time, $field_cond);
								if ($update_attend === TRUE  && $update_note > 0) {
						            $message = array('status' => true,
						             				 'message' => "Absen ".$text." Berhasil!");
					            	return $this->response($message, REST_Controller::HTTP_OK);
								}else{
						            $message = array('status' => false,
						             				 'message' => "Tidak bisa absen");
					            	return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
								}
							}
							elseif($field_cond == 'time_return' && $time_cond != null){
								$check_attend_log = $this->Attendance_model->set_attend_logcheck($token_valid->data->EMPLOYEE_NOPEK, $get_date);						
								
								if ($check_attend_log->num_rows() < 1) {
									
							$this->Attendance_model->set_attend_log($datalogout);
								}
								 
								
								$update_attend = $this->Attendance_model->update_attend($token_valid->data->EMPLOYEE_NOPEK, $get_date, $get_time, $field_cond, $flag,$locationpeg);
								$update_flag = $this->Attendance_model->update_flag($token_valid->data->EMPLOYEE_NOPEK, $get_date, 0);
								$update_note = $this->Attendance_model->update_note2($token_valid->data->EMPLOYEE_NOPEK, $get_date, $this->input->post('note', TRUE), $get_time, $field_cond);
								if ($update_attend === TRUE && $update_flag > 0) {
						            $message = array('status' => true,
						             				 'message' => "Absen ".$text." Berhasil");
					            	return $this->response($message, REST_Controller::HTTP_OK);
								}else{
						            $message = array('status' => false,
						             				 'message' => "Tidak bisa absen");
					            	return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
								}
							}
							else{
					            $message = array('status' => false,
					             				 'message' => "Anda sudah absen ".$text);
				            	return $this->response($message, REST_Controller::HTTP_OK);
							}
						}
					}
				 
			}
        }
	}


	
public function workingreport_attend_post()
	{
		
		// XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]'); 
		$this->form_validation->set_rules('wr_keg', 'Working report Kegiatan', 'trim|max_length[1000]');
		$this->form_validation->set_rules('wr_hasil', 'Working Report Hasil', 'trim|required|max_length[1000]');
		$this->form_validation->set_rules('wr_status', 'Working Report Status', 'trim|required|max_length[1000]');
        if ($this->form_validation->run() == FALSE){
            // form validation error
            $message = array('status' => false,
             				 'message' => $this->form_validation->error_array());
            return $this->response($message, HTTP_BAD_REQUEST);
        }else{
        	$token_valid = json_decode($this->authorization_token->validateToken());
        	if ($token_valid->status === FALSE) {
	            $message = array('status' => false,
	             				 'message' => $token_valid->message);
	            return $this->response($message, REST_Controller::HTTP_OK);	
        	}else{
        		$username = $this->input->post('username');
        		if ($username != $token_valid->data->USERNAME) {
		            $message = array('status' => false,
		             				 'message' => 'token access is denied');
		            return $this->response($message, REST_Controller::HTTP_OK);	
        		}
				 
				
					    
									date_default_timezone_set('Asia/Jakarta');
									$get_date = date("Y-m-d");
									$get_time = date('H:i:s');
									$get_fulldate = date('Y-m-d h:i:s');
									$fullname= $token_valid->data->EMPLOYEE_NAMA; 
									
									
						 $check_attend = $this->Attendance_model->attendcheck($token_valid->data->EMPLOYEE_NOPEK, $get_date);
						$Id='Id';
							foreach ($check_attend->result() as $value) {
								$id_absen = $value->$Id; 
							}			
							
							
						$datawr = [
							"Id_attendance" => $id_absen,
							 "nopek" => $token_valid->data->EMPLOYEE_NOPEK,
							 "date_attend" => $get_date,
							"WR_Kegiatan" => $this->input->post('wr_keg') ,
							"WR_Hasil" => $this->input->post('wr_hasil') ,
							"WR_Status" =>  $this->input->post('wr_status', TRUE) 
						];
						
						
					 $absen_approve = $this->Attendance_model->set_attend_wr($datawr);
					 $update_attend = $this->Attendance_model->update_statwr($token_valid->data->EMPLOYEE_NOPEK, $get_date);
								    
									  
					 // $this->db->insert_batch('STA_WorkingReport',  $this->input->post('data', TRUE)); // fungsi  untuk menyimpan multi array ke database
    				 
								 
								$message = array('status' => true,
														 'message' => '<b style="font-size:13px;text-transform: uppercase;">Working Report Berhasil ditambah!</b> ');
										return $this->response($message, REST_Controller::HTTP_OK);
							
							 
							
					 
				 
			}
        }
	}

	
public function attend_all_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('limit', 'limit', 'trim|max_length[3]');
		$this->form_validation->set_rules('page', 'Page', 'trim|max_length[3]');
		$this->form_validation->set_rules('search', 'Search', 'trim|max_length[300]');
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
        		 if ($token_valid->data->USERNAME != $this->input->post('username', TRUE)) {
		            $message = array('status' => false,
		             				 'message' => 'token access is denied');
		            return $this->response($message, REST_Controller::HTTP_OK);	
        		}else{
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
	        		$get_attendanceAll = $this->Attendance_model->get_all($username,$limit, $offset, $order_by, $sort, $search);
	        		if ($get_attendanceAll === FALSE) {
			            $message = array('status' => false,
			             				 'message' => 'cannot find data');
			            return $this->response($message, REST_Controller::HTTP_OK);
	        		}else{
	        			if ($get_attendanceAll->num_rows() > 0) {
	        				foreach ($get_attendanceAll->result() as $row) {
	        					$data_return[] = [
	        						"Id" => $row->Id_Attend,
	        						"nopek" => $row->nopek,
	        						// "nip" => $row->nip,
	        						"username" => $row->username,
	        						// "full_name" => $row->full_name,
	        						"email" => $row->email,
	        						"date_attend" => $row->date_attend,
	        						"time_come" => $row->time_come,
	        						"time_return" => $row->time_return,
	        						// "time_break" => $row->time_break,
	        						// "time_end_of_break" => $row->time_end_of_break,
	        						"note" => $row->note,
									"mark" => $row->mark,
									"idLeave" => $row->idLeave,
									"from" => $row->from,
									"to" => $row->to
	        					];
	        				}
	        				$total_data = $this->Attendance_model->total_row_all($order_by, $sort, $search);
	        				$total_page = $total_data/$limit;
	        				$page_now = $post_page;
	        				$next_total_page = $total_page-$page_now;
	        				$before_total_page = $page_now-1;
	        				$now_data_show = $get_attendanceAll->num_rows();
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
	
public function approval_all_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]'); 
		$this->form_validation->set_rules('posid', 'Pos ID ', 'trim|max_length[20]');
		$this->form_validation->set_rules('from', 'Date From ', 'trim|max_length[20]');
		$this->form_validation->set_rules('to', 'Date To ', 'trim|max_length[20]');
		$this->form_validation->set_rules('nama', 'Nama Karyawan ', 'trim|max_length[1000]');
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
        		$username = $this->input->post('posid');
			 $posid = $this->input->post('username');
				  if ($token_valid->data->USERNAME != $this->input->post('username', TRUE)) {
		            $message = array('status' => false,
		             				 'message' => 'token access is denied');
		            return $this->response($message, REST_Controller::HTTP_OK);	
        		}
				else{
	        		
	        		$get_attendanceAll = $this->Attendance_model->get_data_approval($this->input->post('posid', TRUE), $this->input->post('from', TRUE), $this->input->post('to', TRUE), $this->input->post('nama', TRUE));
	        		if ($get_attendanceAll === FALSE) {
			            $message = array('status' => false,
			             				 'message' => 'cannot find data');
			            return $this->response($message, REST_Controller::HTTP_OK);
	        		}else{
	        			if ($get_attendanceAll->num_rows() > 0) {
							
	        				foreach ($get_attendanceAll->result() as $row) {
	        					$data_return[] = [
	        						"Id" => $row->IDAbsen,
	        						"nopek_approve" => $row->nopek_approve,
	        						"Jam_absen" => $row->Jam_absen,
	        						"Jam_keluar" => $row->Jam_keluar,
	        						"Status" => $row->Status,
	        						"Note" => $row->Note,
	        						"Note_Approve" => $row->Note_approve,
	        						"Tipe" => $row->Tipe,
	        						"date_approve" => $row->date_approve,
									"POS_ID" => $row->POS_ID ,
									"nama_karyawan" => $row->nama_karyawan ,
									"Location" => $row->Location ,
									"Address" => $row->Address ,
									"Country" => $row->Country,
									"administrative_area_level_3"  => $row->administrative_area_level_3,
									"administrative_area_level_2"  => $row->administrative_area_level_2,
									"administrative_area_level_1"  => $row->administrative_area_level_1 ,
									"StatusWR"  => $row->StatusWR ,
									"PhotoMasuk"  => $row->PhotoMasuk ,
									"PhotoKeluar"  => $row->PhotoKeluar  
	        					];
	        				}
	        				 
		           		 	$message = array('data' => $data_return);
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

public function attend_personal_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('from', 'from', 'trim|max_length[20]');
		$this->form_validation->set_rules('to', 'to', 'trim|max_length[20]');
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
        		if ($username != $token_valid->data->USERNAME) {
		            $message = array('status' => false,
		             				 'message' => 'token access is denied');
		            return $this->response($message, REST_Controller::HTTP_OK);	
        		}
			 
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
	        		if ($from == null || empty($from)) {
	        			$from = date('Y-m-d');
	        		}
	        		if ($to == null || empty($to)) {
	        			$to = date('Y-m-d', strtotime("+1 days"));
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
	        			$post_page = $post_page;
	        			$a = $post_page-1;
	        			$offset = $limit*$a;
	        		}
	        		if ($post_page == null OR empty($post_page)) {
	        			$post_page = 1;
	        			$offset = null;
	        		}
						date_default_timezone_set('Asia/Jakarta');
				$get_date = date("Y-m-d");
			 
					 
	        		$get_attendanceAll = $this->Attendance_model->get_personal($token_valid->data->EMPLOYEE_NOPEK, $from, $to, $limit, $offset, $order_by, $sort, $search);
					 
					 $get_Wr = $this->Attendance_model->cekcountwr($token_valid->data->EMPLOYEE_NOPEK, $get_date );
					 foreach ($get_Wr->result() as $rowwr) {
						 $data_return2[] = [
						 "id"=>$rowwr->Id
						 ];
					 }
							
	        		if ($get_attendanceAll === FALSE) {
			            $message = array('status' => false,
			             				 'message' => 'cannot find data');
			            return $this->response($message, REST_Controller::HTTP_OK);
	        		}else{
	        			if ($get_attendanceAll->num_rows() > 0) {
						 
							 
	        				foreach ($get_attendanceAll->result() as $row) {
								$data_return[] = [
	        						"USERNAME" =>  $token_valid->data->USERNAME,
	        						"EMPLOYEE_NOPEK" =>  $token_valid->data->EMPLOYEE_NOPEK,
	        						"EMPLOYEE_NAMA" =>  $token_valid->data->EMPLOYEE_NAMA,
	        						"EMPLOYEE_EMAIL" => $token_valid->data->EMPLOYEE_EMAIL,
	        						"date_attend_absen" => $row->date_attend_absen,
	        						"time_come" => $row->time_come,
	        						"time_return" => $row->time_return,
	        						"note" => $row->note,
	        						"mark" => $row->mark,
	        						  "status" => $row->st_absen,
	        						  "posisi" => $row->idLocation,
	        						  "StatusFit" => $row->StatusFit,
	        						  "StatusFitNote" => $row->StatusFitNote,
	        						  "StatusFitNote_Lain" => $row->StatusFitNote_Lain, 
	        						  "StatusWR" => $row->StatusWR 
	        					];
	        				}
	        				 
		           		 	$message = array('data' => $data_return);
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


	
public function view_approve_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('nip', 'nip', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('from', 'date from', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('to', 'date to', 'trim|required|max_length[20]');
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
        		if ( $token_valid->data->USERNAME != $username) {
		            $message = array('status' => false,
		             				 'message' => 'access token denied');
		            return $this->response($message, REST_Controller::HTTP_OK);	
        		}
        		$viewda = $this->Attendance_model->get_data_approval_clicked($this->input->post('nip', TRUE),$this->input->post('from', TRUE), $this->input->post('to', TRUE));
				 	if ($viewda === FALSE) {
			            $message = array('status' => false,
			             				 'message' => 'cannot find data');
			            return $this->response($message, REST_Controller::HTTP_OK);
	        		}else{
				if ($viewda->num_rows() > 0) {
					
					foreach ($viewda->result() as $row) {
						$data_return[] = [
							"Id" => $row->ID,
							"nopek" => $row->nopek_approve, 
							//"username" => $row->username,
							"Tipe" => $row->Tipe,
							//"full_name" => $row->full_name,
							//"email" => $row->email,
							"date_attend" => $row->date_approve,
							"time_come" => $row->Jam_absen,
							"time_return" => $row->Jam_keluar,
							"status" => $row->Status ,
							"note" => $row->Note,
							"note_approve" => $row->Note_approve, 
							"ATASAN_USERNAME" =>  $token_valid->data->ATASAN_USERNAME,
							"COSTCENTERNAME" =>  $token_valid->data->COSTCENTERNAME,
							"approve_by" => $row->approve_by,
							"StatusWR" => $row->StatusWR
						];
					}
							
		            $message = array('status' => true,
		             				 'message' => 'Data tampil',
									 'data' => $data_return);
									 
		            return $this->response($message, REST_Controller::HTTP_OK);	
				}else{
		            $message = array('status' => false,
		             				 'message' => 'gagal tampil data');
		            return $this->response($message, REST_Controller::HTTP_OK);	
				}}
        	}
        }
	}
	
	public function do_approve_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('id', 'Id', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('action', 'Action', 'trim|required|max_length[1]');
		$this->form_validation->set_rules('noteapp', 'Noteapp', 'trim|required|max_length[100]');
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
        		if ( $token_valid->data->USERNAME != $username) {
		            $message = array('status' => false,
		             				 'message' => 'access token denied');
		            return $this->response($message, REST_Controller::HTTP_OK);	
        		}
        		$absen_approve = $this->Attendance_model->approve($this->input->post('id', TRUE), $this->input->post('action', TRUE), $token_valid->data->EMPLOYEE_NAMA, $this->input->post('noteapp', TRUE));
				if ($_POST["action"] === "A")
				{
					$StatusAction = "Approve ";
				}
				elseif($_POST["action"] === "R")
				{
					$StatusAction = "Reject ";
				}

				if ($absen_approve) {
		            $message = array('status' => true,
		             				 'message' => $StatusAction."Absen Berhasil");
		            return $this->response($message, REST_Controller::HTTP_OK);	
				}else{
		            $message = array('status' => false,
		             				 'message' => "Gagal ".$StatusAction." absen");
		            return $this->response($message, REST_Controller::HTTP_OK);	
				}
        	}
        }
	}
	
	
	
	public function do_approve_all_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]');
		//$this->form_validation->set_rules('id', 'Id', 'trim|required|max_length[1000]');
		$this->form_validation->set_rules('action', 'Action', 'trim|required|max_length[1]');
		$this->form_validation->set_rules('noteapp', 'Noteapp', 'trim|required|max_length[100]');
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
        		if ( $token_valid->data->USERNAME != $username) {
		            $message = array('status' => false,
		             				 'message' => 'access token denied');
		            return $this->response($message, REST_Controller::HTTP_OK);	
        		}
				
		 
 $kalimat = $this->input->post('id', TRUE);
$arr_kalimat = explode (",",$kalimat);
 
				
        	 	$absen_approve = $this->Attendance_model->approveall($arr_kalimat, $this->input->post('action', TRUE), $token_valid->data->EMPLOYEE_NAMA, $this->input->post('noteapp', TRUE));
				if ($_POST["action"] === "A")
				{
					$StatusAction = "Approve ";
				}
				elseif($_POST["action"] === "R")
				{
					$StatusAction = "Reject ";
				}

				 
		            $message = array('status' => true,
		             				 'message' => $StatusAction." Absen Berhasil");
		            return $this->response($message, REST_Controller::HTTP_OK);	
				 
        	}
        }
	}

   public function export_pdf_post()
    {
    	$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('from', 'from', 'trim|max_length[3]');
		$this->form_validation->set_rules('to', 'to', 'trim|max_length[3]');
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
        		}elseif ($token_valid->data->USERNAME != $this->input->post('username', TRUE)) {
		            $message = array('status' => false,
		             				 'message' => 'token access is denied');
		            return $this->response($message, REST_Controller::HTTP_OK);	
        		}else{
			         
        		}
			}
		}
    }

	public function get_leave_post()
	{
		$get_leavetipe = $this->Attendance_model->get_leavetype();
	    if ($get_leavetipe === FALSE) {
			$message = array('status' => false,
							  'message' => 'cannot find data');
			return $this->response($message, REST_Controller::HTTP_OK);
		}else{
			if ($get_leavetipe->num_rows() > 0) {
				foreach ($get_leavetipe->result() as $row) {
					$data_return[] = [
						"LeaveTypeID" => $row->LeaveTypeID,
						"LeaveType" => $row->LeaveType
					];
				}
				/*$total_data = $this->Attendance_model->total_row_leave();
				$total_page = $total_data/$limit;
				$page_now = $post_page;
				$next_total_page = $total_page-$page_now;
				$before_total_page = $page_now-1;
				$now_data_show = $get_leavetipe->num_rows();
				if (is_float($total_page)) {
					$total_page = floor($total_page)+1;
				}
				if (is_float($next_total_page)) {
					$next_total_page = floor($next_total_page)+1;
				}*/
					$message = array('status' => true,
									 /*'total_row' => $total_data,
									 'limit' => $limit,
									 'now_data_show' => $now_data_show,
									 'total_page' => $total_page,
									 'page_now' => (int)$post_page,*/
								   'data' => $data_return);
				return $this->response($message, REST_Controller::HTTP_OK);	
			}else{
				$message = array('status' => false,
								  'message' => 'cannot find data');
				return $this->response($message, REST_Controller::HTTP_OK);
			}
		}
	}
	
	
	
	public function doapprovekeluar_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('nopek', 'Nopek', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('date', 'date', 'trim|required|max_length[20]'); 
		$this->form_validation->set_rules('posid', 'Pos Id', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('jammasuk', 'Jam masuk', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('jamkeluar', 'Jam keluar', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('note', 'Note', 'trim|required|max_length[1000]');
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
        		if ( $token_valid->data->USERNAME != $username) {
		            $message = array('status' => false,
		             				 'message' => 'access token denied');
		            return $this->response($message, REST_Controller::HTTP_OK);	
        		}
				
				$get_atasan = $this->Attendance_model->get_atasan($username);
								
								if ($get_atasan === FALSE) {
									$message = array('status' => false,
													 'message' => 'Tidak ditemukan data atasan');
									return $this->response($message, REST_Controller::HTTP_OK);
								}else{
									if ($get_atasan->num_rows() > 0) {
										foreach ($get_atasan->result() as $row) {
											$pos_id_atasan = $row->POS_ID_SUPERIOR;
										}
									}
				
				$check_attend2 = $this->Attendance_model->reqapprovalcheck2($this->input->post('nopek', TRUE), $this->input->post('date', TRUE) );						
				 
					$fullname= $token_valid->data->EMPLOYEE_NAMA;
				 
				 if ($check_attend2->num_rows() >= 1) {
					 $absen_approveedit = $this->Attendance_model->updateapprovekeluar( $this->input->post('jammasuk', TRUE), $this->input->post('jamkeluar', TRUE), $this->input->post('nopek', TRUE), $pos_id_atasan , $this->input->post('note', TRUE), $this->input->post('date', TRUE),$fullname);
			

				if ($absen_approveedit) {
		            $message = array('status' => true,
		             				 'message' => "Request Absen Keluar Berhasil");
		            return $this->response($message, REST_Controller::HTTP_OK);	
				}else{
		            $message = array('status' => false,
		             				 'message' => "Request Absen Keluar Gagal");
		            return $this->response($message, REST_Controller::HTTP_OK);	
				}
				}
				else  {
					
				 
				 $absen_approveinsert = $this->Attendance_model->approve2( $this->input->post('jammasuk', TRUE), $this->input->post('jamkeluar', TRUE), $this->input->post('nopek', TRUE), $pos_id_atasan  , $this->input->post('note', TRUE), $this->input->post('date', TRUE),$fullname);
			

				if ($absen_approveinsert) {
		            $message = array('status' => true,
		             				 'message' => "Request Absen Keluar Berhasil");
		            return $this->response($message, REST_Controller::HTTP_OK);	
				}else{
		            $message = array('status' => false,
		             				 'message' => "Request Absen Keluar Gagal");
		            return $this->response($message, REST_Controller::HTTP_OK);	
				}
					
					
				}
							}		
								 
        		
        	}
        }
	}
	
	
	
	
	
	public function  dtlocationmobile_get()
	{ 
       
       
		 $dtlocation = $this->Attendance_model->getlocation()->result();
		 												
			  $message = array('dataLocation' => $dtlocation );
					return $this->response($message, REST_Controller::HTTP_OK);	
		
	}
	
	public function  dtlocation_get()
	{ 
       
       
		 $dtlocation = $this->Attendance_model->getlocation()->result();
		 foreach ($dtlocation as $row) {
			  
		 $data_return[] =  array($row->LongLat1,$row->LongLat2,$row->LongLat3,$row->LongLat4,$row->LongLat5 )    ;	 	
		     	
		  
		 }
		 
			  $message = array('dataLocation' => $data_return );
					return $this->response($message, REST_Controller::HTTP_OK);	
		
	}
	
	
		public function  fitur_get()
	{ 
       
        
		 $dtapikey = $this->Attendance_model->getfitur()->result();
		 foreach ($dtapikey  as $row) {
		 			$data_return[] = [
	        						"FITUR_KEYVALUE" =>  $row->FITUR_KEYVALUE 
	        					];		

		 }								
			  $message = array('dataAPIKEY' => $data_return );
					return $this->response($message, REST_Controller::HTTP_OK);	
		
	}
	
	
	
		public function  fiturfit_get()
	{ 
       
       
		
		 
		 date_default_timezone_set('Asia/Jakarta');
						$get_full_date = date("Y-m-d H:i:s");  
		 $dtapifit = $this->Attendance_model->getfiturfitunfit();
		 if ($dtapifit->num_rows() > 0) {
		 foreach ($dtapifit->result()  as $row) {
			 
			
								 
		 			$data_return[] = [
	        						"FITUR_ACTIVE" =>  $row->FITUR_ACTIVE,
									"GET_FULL_DATE" => $get_full_date
	        					];		
								
								}
								 }
								else{
									
										$data_return[] = [
	        						"FITUR_ACTIVE" =>  "",
									"GET_FULL_DATE" => $get_full_date
	        					];	
								}

			
		 												
			  $message = array('dataFIT' => $data_return );
					return $this->response($message, REST_Controller::HTTP_OK);	
		
	}
	
		public function  lokasi_upload_get()
	{ 
       
        
		 $dtapikey = $this->Attendance_model->getlokasi()->result();
		 foreach ($dtapikey  as $row) {
		 			$data_return[] = [
	        						"FITUR_KEYVALUE" =>  $row->FITUR_KEYVALUE 
	        					];		

		 }								
			  $message = array('dataAPIKEY' => $data_return );
					return $this->response($message, REST_Controller::HTTP_OK);	
		
	}
	
	public function editkondisi_post()
	{
		
		// XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'username', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('kondisi', 'kondisi', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('note_kondisi', 'note kondisi', 'trim|max_length[1000]'); 
		$this->form_validation->set_rules('note_kondisi_lain', 'note kondisi', 'trim|max_length[1000]'); 
        if ($this->form_validation->run() == FALSE){
            // form validation error
            $message = array('status' => false,
             				 'message' => $this->form_validation->error_array());
            return $this->response($message, 301);
        }else{
        	$token_valid = json_decode($this->authorization_token->validateToken());
        	if ($token_valid->status === FALSE) {
	            $message = array('status' => false,
	             				 'message' => $token_valid->message);
	            return $this->response($message, REST_Controller::HTTP_OK);	
        	}else{
        		$username = $this->input->post('username');
        		if ($username != $token_valid->data->USERNAME) {
		            $message = array('status' => false,
		             				 'message' => 'token access is denied');
		            return $this->response($message, REST_Controller::HTTP_OK);	
        		}
				 
					 
			 
						 
						
						date_default_timezone_set('Asia/Jakarta');
						$get_date = date("Y-m-d");  
								
								 $insert_attend = $this->Attendance_model->edit_kondisi($this->input->post('username'),$get_date,$this->input->post('kondisi'),$this->input->post('note_kondisi'),$this->input->post('note_kondisi_lain'));
								 if ($insert_attend > 0) {
									 
									 $message = array('status' => true,
													 'kondisi' => 'OK' ,
													  'message' => '<b style="font-size:13px;text-transform: uppercase;">Edit Kondisi Kesehatan Berhasil</b><br>Berhasil Edit Kondisi Kesehatan hari ini');
									 return $this->response($message, REST_Controller::HTTP_OK);
								 }else{
									 $message = array('status' => false,
													  'message' => "Cannot set attendance");
									 return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
								 }
								 
							return;
							
					 
				 
			}
        }
	}
	
	
	public function attend_detail_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[50]'); 
		//$this->form_validation->set_rules('date', 'Tanggal', 'trim|required|max_length[50]'); 
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
        		if ($username != $token_valid->data->USERNAME) {
		            $message = array('status' => false,
		             				 'message' => 'token access is denied');
		            return $this->response($message, REST_Controller::HTTP_OK);	
        		}
				date_default_timezone_set('Asia/Jakarta');
			 $get_date = date("Y-m-d");
	        		// $this->input->post('date')
	        		$get_attendanceAll = $this->Attendance_model->attendcheck($token_valid->data->EMPLOYEE_NOPEK,$get_date);
	        		if ($get_attendanceAll === FALSE) {
			            $message = array('status' => false,
			             				 'message' => 'cannot find data');
			            return $this->response($message, REST_Controller::HTTP_OK);
	        		}else{
	        			if ($get_attendanceAll->num_rows() > 0) {
							
							
	        				foreach ($get_attendanceAll->result() as $row) {
							  $statusfit=$row->StatusFitNote;
								if ($statusfit=='')
								{
									$data_return[] = [
	        						"Id" =>  $row->Id,
	        						"username" =>  $row->username,
	        						"date_attend" => $row->date_attend,
	        						"time_come" => $row->time_come,
	        						"time_return" => $row->time_return,
	        						  "StatusFit" => 1,
	        						  "StatusFitNote" =>  'Sehat',
	        						  "StatusFitNote_Lain" => '' ,
	        						  "note" => $row->note ,
	        						  "idLocation" => $row->idLocation 
	        					];
									
								}
								else{
	        					$data_return[] = [
								"Id" =>  $row->Id,
	        						"username" =>  $row->username,
	        						"date_attend" => $row->date_attend,
	        						"time_come" => $row->time_come,
	        						"time_return" => $row->time_return,
	        						  "StatusFit" => $row->StatusFit,
	        						  "StatusFitNote" => $row->StatusFitNote,
	        						  "StatusFitNote_Lain" => $row->StatusFitNote_Lain ,
	        						  "note" => $row->note ,
	        						  "idLocation" => $row->idLocation 
	        					];
								
								}
	        				}
	        				 
		           		 	$message = array('data' => $data_return);
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
	
	
 public function workingreport_detail_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[50]'); 
		//$this->form_validation->set_rules('date', 'Tanggal', 'trim|required|max_length[50]'); 
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
        		if ($username != $token_valid->data->USERNAME) {
		            $message = array('status' => false,
		             				 'message' => 'token access is denied');
		            return $this->response($message, REST_Controller::HTTP_OK);	
        		}
				
				
				
				date_default_timezone_set('Asia/Jakarta');
				$get_date = date("Y-m-d");
			 
			 
	        		$get_wrAll = $this->Attendance_model->workingcheck($token_valid->data->EMPLOYEE_NOPEK,$get_date);
	        		 
	        			 
							
	        				foreach ($get_wrAll->result() as $row) {
							 
									$data_return[] = [
	        						"Id" =>  $row->Id,
	        						"Id_attendance" =>  $row->Id_attendance,
	        						"nopek" => $row->nopek,
	        						"date_attend" => $row->date_attend,
	        						"WR_Kegiatan" => $row->WR_Kegiatan,
	        						  "WR_Hasil" =>  $row->WR_Hasil,
	        						  "WR_Status" =>   $row->WR_Status
	        					];
									
								 
	        				}
	        				 
		           		 	$message = array('data' => $data_return);
		            		return $this->response($message, REST_Controller::HTTP_OK);	
		        		 
					 
				 	
			}	
		}
	}
	
	
	
	 public function workingreport_pertanggal_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('nopek', 'Nopek', 'trim|required|max_length[50]'); 
		 $this->form_validation->set_rules('date', 'Tanggal', 'trim|required|max_length[50]'); 
        if ($this->form_validation->run() == FALSE){
            // form validation error
            $message = array('status' => false,
             				 'message' => $this->form_validation->error_array());
            return $this->response($message, 400);
			}else{
        		$nopek = $this->input->post('nopek'); 
				
				 
				 
			 
			 
	        		$get_wrAll = $this->Attendance_model->workingcheck($nopek,$this->input->post('date'));
	        		 
	        			 
							
	        				foreach ($get_wrAll->result() as $row) {
							 
									$data_return[] = [
	        						"Id" =>  $row->Id,
	        						"Id_attendance" =>  $row->Id_attendance,
	        						"nopek" => $row->nopek,
	        						"date_attend" => $row->date_attend,
	        						"WR_Kegiatan" => $row->WR_Kegiatan,
	        						  "WR_Hasil" =>  $row->WR_Hasil,
	        						  "WR_Status" =>   $row->WR_Status
	        					];
									
								 
	        				}
	        				 
		           		 	$message = array('data' => $data_return);
		            		return $this->response($message, REST_Controller::HTTP_OK);	
		        		 
					 
				 	
			 	
		}
	}
	
	
	
	 
	
	
	 public function upload_post()
	{
		
		
	/* Getting file name */ 
	$filename = $_FILES["file"]["name"];
	$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
	$file_ext = substr($filename, strripos($filename, '.')); // get file name
	$filesize = $_FILES["file"]["size"];
	$allowed_file_types = array('.jpg','.png','.jpeg');	
	
	
	 $resultLocationFile = $this->Attendance_model->getlokasi();
						  foreach ($resultLocationFile->result() as $apilok) {
						  $ApiKeyLoc=$apilok->FITUR_KEYVALUE; 
             
							  }
	$location = $ApiKeyLoc;
	if (in_array($file_ext,$allowed_file_types) && ($filesize < 200000))
	{	
		// Rename file
		$newfilename = $file_basename . $file_ext;
		
		if (file_exists($location . $newfilename))
		{
			// file already exists error
			echo 0;
		}
		else
		{		
			move_uploaded_file($_FILES["file"]["tmp_name"], $location  . $newfilename);
			  echo $location."".$newfilename;	
		}
	}
	
		
	}
	
	
	
	 public function upload_base64_post()
	{
		
		$img = $_POST["file"];
		$resultLocationFile = $this->Attendance_model->getlokasi();
						  foreach ($resultLocationFile->result() as $apilok) {
						  $ApiKeyLoc=$apilok->FITUR_KEYVALUE; 
             
							  }
	define('UPLOAD_DIR', $ApiKeyLoc);
	
	
	$nmfile=time() . '.jpg';
	
	#filename will be generated by timestamp 
	$file = UPLOAD_DIR .$nmfile ; 
	
	
#replace data header
$img = str_replace('data:image/jpeg;base64,', '', $img);


#replace empty space
$img = str_replace(' ', '+', $img); 
	
	#base64 decode
	$data = base64_decode($img);
	
	#save the file
	$success = file_put_contents($file,$data);
	
	#give feedback to your APP
if($success){
   $message = array('data' => $nmfile);
		            		return $this->response($message, REST_Controller::HTTP_OK);
}else{
    $message = array('data' => "Gagal Upload Foto. Coba lagi");
		            		return $this->response($message, REST_Controller::HTTP_OK);
	
		
	}
	}
	
	
	public function delete_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('date', 'date', 'trim|required|max_length[20]');
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
        		 
        		$delete = $this->Attendance_model->deleteabsen( $token_valid->data->EMPLOYEE_NOPEK, $this->input->post('date', TRUE));
        		$deleteapp = $this->Attendance_model->deleteabsenapp( $token_valid->data->EMPLOYEE_NOPEK, $this->input->post('date', TRUE));
        		$deletewo = $this->Attendance_model->deletewo( $token_valid->data->EMPLOYEE_NOPEK, $this->input->post('date', TRUE));
				if ($delete > 0) {
		            $message = array('status' => true,
		             				 'message' => 'delete Attendance successfully');
		            return $this->response($message, REST_Controller::HTTP_OK);	
				}else{
		            $message = array('status' => false,
		             				 'message' => 'failed delete Attendance');
		            return $this->response($message, REST_Controller::HTTP_OK);	
				}
        	}
        }
	}

}

?>