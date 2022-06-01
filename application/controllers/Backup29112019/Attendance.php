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
		//$points = array("-6.232932 106.822238");
		$pointLocation = new PointLocation();
		
		//$polygonPDSI = array("-6.205113 106.858609","-6.205027 106.858582","-6.205131 106.858227","-6.205228 106.858264", "-6.205113 106.858609");
		
		$polygonPatrajasa = array("-6.233278 106.822597", "-6.234038 106.823646", "-6.232846 106.824504", "-6.232153 106.823241", "-6.233278 106.822597");
		
		$polygonTALOK = array("-7.129696 111.742866","-7.129865 111.743373","-7.128774 111.743726","-7.128599 111.743158", "-7.129696 111.742866");
				
		$polygonDIREKSIKEET = array("-7.240105 111.719519","-7.240481 111.720430","-7.239855 111.720561","-7.239773 111.719611", "-7.240105 111.719519");
		
		$polygonWELLPADJAMBARAN = array("-7.241091 111.718236", "-7.241105 111.720071", "-7.243246 111.720032", "-7.243141 111.718124", "-7.241091 111.718236");
		
		$polygonREKIND = array("-6.260945 106.844719", "-6.260707 106.846385", "-6.259571 106.846290", "-6.259667 106.844625", "-6.260945 106.844719");
		
		//$polygonSopodel = array("-6.230586 106.822596", "-6.229903 106.823905", "-6.231247 106.824924", "-6.231317 106.822510", "-6.230586 106.822596");
		
		//$polygonMandiri = array("-6.224722 106.812963", "-6.223495 106.814760", "-6.224919 106.815886", "-6.226113 106.814143", "-6.224722 106.812963");
		
		//$polygonPge = array("-6.299653 106.832904", "-6.300271 106.832609", "-6.300901 106.833708", "-6.300255 106.833837", "-6.299653 106.832904");
		
		$returnPatrajasa = "";
		$returnTALOK = "";
		$returnDIREKSIKEET = "";
		$returnWELLPADJAMBARAN = "";
		$returnREKIND 	= "";
		//$returnSopodel = "";
		//$returnMandiri = "";
		//$returnPge = "";
		
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
			//$valueBalikan["SOPODEL"] = "F";
			//$valueBalikan["MANDIRI"] = "F";
			//$valueBalikan["PGE"] = "F";
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
		
		
		//foreach($points as $key => $point) {
		//	$returnSC = $pointLocation->pointInPolygon($point, $polygonStandardChartered);
		//}
		
		//foreach($points as $key => $point) {
		//	$returnPhe = $pointLocation->pointInPolygon($point, $polygonPhe);
		//}
		
		//foreach($points as $key => $point) {
		//	$returnElnusa = $pointLocation->pointInPolygon($point, $polygonElnusa);
		//}
		////echo "returnPDSI : ".$returnPDSI;
		////echo "returnSC : ".$returnSC;
		////echo "returnPhe : ".$returnPhe;
		////echo "returnElnusa : ".$returnElnusa;
		
		if(($returnTALOK == "inside") || ($returnTALOK == "vertex")){
			$valueBalikan["PATRAJASA"] = "F";
			$valueBalikan["TALOK"] = "T";
			$valueBalikan["DIREKSIKEET"] = "F";
			$valueBalikan["WELLPADJAMBARAN"] = "F";
			$valueBalikan["REKIND"] = "F";
			//$valueBalikan["SOPODEL"] = "F";
			//$valueBalikan["MANDIRI"] = "F";
			//$valueBalikan["PGE"] = "F";
			return $valueBalikan;
		} else {
			$valueBalikan["PATRAJASA"] = "F";
			$valueBalikan["TALOK"] = "F";
			$valueBalikan["DIREKSIKEET"] = "F";
			$valueBalikan["WELLPADJAMBARAN"] = "F";
			$valueBalikan["REKIND"] = "F";
			//$valueBalikan["SOPODEL"] = "F";
			//$valueBalikan["MANDIRI"] = "F";
			//$valueBalikan["PGE"] = "F";
		}
		
		if(($returnDIREKSIKEET == "inside") || ($returnDIREKSIKEET == "vertex")){
			$valueBalikan["PATRAJASA"] = "F";
			$valueBalikan["TALOK"] = "F";
			$valueBalikan["DIREKSIKEET"] = "T";
			$valueBalikan["WELLPADJAMBARAN"] = "F";
			$valueBalikan["REKIND"] = "F";
			//$valueBalikan["SOPODEL"] = "F";
			//$valueBalikan["MANDIRI"] = "F";
			//$valueBalikan["PGE"] = "F";
			return $valueBalikan;
		} else {
			$valueBalikan["PATRAJASA"] = "F";
			$valueBalikan["TALOK"] = "F";
			$valueBalikan["DIREKSIKEET"] = "F";
			$valueBalikan["WELLPADJAMBARAN"] = "F";
			$valueBalikan["REKIND"] = "F";
			//$valueBalikan["SOPODEL"] = "F";
			//$valueBalikan["MANDIRI"] = "F";
			//$valueBalikan["PGE"] = "F";
		}
		
		if(($returnWELLPADJAMBARAN == "inside") || ($returnWELLPADJAMBARAN == "vertex")){
			$valueBalikan["PATRAJASA"] = "F";
			$valueBalikan["TALOK"] = "F";
			$valueBalikan["DIREKSIKEET"] = "F";
			$valueBalikan["WELLPADJAMBARAN"] = "T";
			$valueBalikan["REKIND"] = "F";
			//$valueBalikan["SOPODEL"] = "F";
			//$valueBalikan["MANDIRI"] = "F";
			//$valueBalikan["PGE"] = "F";
			return $valueBalikan;
		} else {
			$valueBalikan["PATRAJASA"] = "F";
			$valueBalikan["TALOK"] = "F";
			$valueBalikan["DIREKSIKEET"] = "F";
			$valueBalikan["WELLPADJAMBARAN"] = "F";
			$valueBalikan["REKIND"] = "F";
			//$valueBalikan["SOPODEL"] = "F";
			//$valueBalikan["MANDIRI"] = "F";
			//$valueBalikan["PGE"] = "F";
		}
		
		if(($returnREKIND == "inside") || ($returnREKIND == "vertex")){
			$valueBalikan["PATRAJASA"] = "F";
			$valueBalikan["TALOK"] = "F";
			$valueBalikan["DIREKSIKEET"] = "F";
			$valueBalikan["WELLPADJAMBARAN"] = "F";
			$valueBalikan["REKIND"] = "T";
			//$valueBalikan["SOPODEL"] = "F";
			//$valueBalikan["MANDIRI"] = "F";
			//$valueBalikan["PGE"] = "F";
			return $valueBalikan;
		} else {
			$valueBalikan["PATRAJASA"] = "F";
			$valueBalikan["TALOK"] = "F";
			$valueBalikan["DIREKSIKEET"] = "F";
			$valueBalikan["WELLPADJAMBARAN"] = "F";
			$valueBalikan["REKIND"] = "F";
			//$valueBalikan["SOPODEL"] = "F";
			//$valueBalikan["MANDIRI"] = "F";
			//$valueBalikan["PGE"] = "F";
		}
		
		/*if(($returnPatrajasa == "inside") || ($returnPatrajasa == "vertex")){
			$valueBalikan["PDSI"] = "F";
			$valueBalikan["SC"] = "F";
			$valueBalikan["PHE"] = "F";
			$valueBalikan["ELNUSA"] = "F";
			$valueBalikan["PATRAJASA"] = "T";
			$valueBalikan["SOPODEL"] = "F";
			$valueBalikan["MANDIRI"] = "F";
			$valueBalikan["PGE"] = "F";
			return $valueBalikan;
		} else {
			$valueBalikan["PDSI"] = "F";
			$valueBalikan["SC"] = "F";
			$valueBalikan["PHE"] = "F";
			$valueBalikan["ELNUSA"] = "F";
			$valueBalikan["PATRAJASA"] = "F";
			$valueBalikan["SOPODEL"] = "F";
			$valueBalikan["MANDIRI"] = "F";
			$valueBalikan["PGE"] = "F";
		}
		
		if(($returnSopodel == "inside") || ($returnSopodel == "vertex")){
			$valueBalikan["PDSI"] = "F";
			$valueBalikan["SC"] = "F";
			$valueBalikan["PHE"] = "F";
			$valueBalikan["ELNUSA"] = "F";
			$valueBalikan["PATRAJASA"] = "F";
			$valueBalikan["SOPODEL"] = "T";
			$valueBalikan["MANDIRI"] = "F";
			$valueBalikan["PGE"] = "F";
			return $valueBalikan;
		} else {
			$valueBalikan["PDSI"] = "F";
			$valueBalikan["SC"] = "F";
			$valueBalikan["PHE"] = "F";
			$valueBalikan["ELNUSA"] = "F";
			$valueBalikan["PATRAJASA"] = "F";
			$valueBalikan["SOPODEL"] = "F";
			$valueBalikan["MANDIRI"] = "F";
			$valueBalikan["PGE"] = "F";
		}
		
		if(($returnMandiri == "inside") || ($returnMandiri == "vertex")){
			$valueBalikan["PDSI"] = "F";
			$valueBalikan["SC"] = "F";
			$valueBalikan["PHE"] = "F";
			$valueBalikan["ELNUSA"] = "F";
			$valueBalikan["PATRAJASA"] = "F";
			$valueBalikan["SOPODEL"] = "F";
			$valueBalikan["MANDIRI"] = "T";
			$valueBalikan["PGE"] = "F";
			return $valueBalikan;
		} else {
			$valueBalikan["PDSI"] = "F";
			$valueBalikan["SC"] = "F";
			$valueBalikan["PHE"] = "F";
			$valueBalikan["ELNUSA"] = "F";
			$valueBalikan["PATRAJASA"] = "F";
			$valueBalikan["SOPODEL"] = "F";
			$valueBalikan["MANDIRI"] = "F";
			$valueBalikan["PGE"] = "F";
		}
		
		if(($returnPge == "inside") || ($returnPge == "vertex")){
			$valueBalikan["PDSI"] = "F";
			$valueBalikan["SC"] = "F";
			$valueBalikan["PHE"] = "F";
			$valueBalikan["ELNUSA"] = "F";
			$valueBalikan["PATRAJASA"] = "F";
			$valueBalikan["SOPODEL"] = "F";
			$valueBalikan["MANDIRI"] = "F";
			$valueBalikan["PGE"] = "T";
			return $valueBalikan;
		} else {
			$valueBalikan["PDSI"] = "F";
			$valueBalikan["SC"] = "F";
			$valueBalikan["PHE"] = "F";
			$valueBalikan["ELNUSA"] = "F";
			$valueBalikan["PATRAJASA"] = "F";
			$valueBalikan["SOPODEL"] = "F";
			$valueBalikan["MANDIRI"] = "F";
			$valueBalikan["PGE"] = "F";
		}*/
		
		/*if(($returnPDSI == "inside") || ($returnPDSI = "vertex")){
			$valueBalikan["PDSI"] = true;
			return 
		} else {
			$valueBalikan["PDSI"] = false;
		}
		
		$message = array('status' => false, 'message' => $messagePDSI ." XX ". $messageSC);
	    return $this->response($message, REST_Controller::HTTP_OK);	
		*/
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
		$this->form_validation->set_rules('note', 'note', 'trim|max_length[50]');
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
        		if ($username != $token_valid->data->username) {
		            $message = array('status' => false,
		             				 'message' => 'token access is denied');
		            return $this->response($message, REST_Controller::HTTP_OK);	
        		}
				$exst = $this->Attendance_model->username_exists($token_valid->data->id);
				if ($exst === FALSE) {
		            $message = array('status' => false,
		             				 'message' => "Username not found, please check your username");
	            	return $this->response($message, REST_Controller::HTTP_OK);
				}else{
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
					if ($condition != "come" && $condition != "return" && $condition != "break" && $condition != "end_of_break") {
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
						}elseif ($condition == "break") {
							$field_cond = "time_break";
							$flag = 0;
							$text = "break";
						}elseif ($condition == "end_of_break") {
							$field_cond = "time_end_of_break";
							$flag = 0;
							$text = "end of break";
						}
						date_default_timezone_set('Asia/Jakarta');
						$get_date = date("Y-m-d");
						$get_time = date('H:i:s');

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
						else
						{
							$idLocation = 6;
						}

						$data = [
							"Id_User" => $token_valid->data->id,
							$field_cond => $get_time,
							"date_attend" => $get_date,
							"note" => $this->input->post('note', TRUE),
							"mark" => "manual attendance",
							"flag" => $flag,
							"idLocation" => $idLocation
						];
						$check_attend = $this->Attendance_model->attendcheck($token_valid->data->id, $get_date);
						//$check_attend_approval = $this->Attendance_model->pendingapprovalattendcheck($token_valid->data->id, $get_date);
						
						if ($check_attend->num_rows() < 1) {
							if ($condition == "return") {
								$message = array('status' => true, 'kondisi' => 'MANUAL' ,'message' => 'Silakan isi kolom catatan untuk absen pulang.');
								return $this->response($message, REST_Controller::HTTP_OK);
								/*$message = array('status' => false,
												 'message' => 'Absen pulang gagal karena Anda belum absen datang. ');
								return $this->response($message, REST_Controller::HTTP_OK);*/
								return;
							} else if ($condition == "break") {
								$message = array('status' => false,
													'kondisi' => "BELUMABSENDATANG",
												 'message' => 'Absen istirahat gagal karena Anda belum absen datang. ');
								return $this->response($message, REST_Controller::HTTP_OK);
								return;
							} elseif ($condition == "end_of_break") {
								$message = array('status' => false,
											'kondisi' => "BELUMABSENDATANG",
												 'message' => 'Absen istirahat gagal karena Anda belum absen datang. ');
								return $this->response($message, REST_Controller::HTTP_OK);
								return;
							}
							
							$check_attend = $this->Attendance_model->reqapprovalcheck($token_valid->data->id, $get_date, $this->input->post('condition'));			
							
							if ($check_attend->num_rows() >= 1) {
								$message = array('status' => false,
												 'message' => 'Anda telah absen sebelumnya. Menunggu approval atasan');
								return $this->response($message, REST_Controller::HTTP_OK);
							}
								
							$pointDevice = array($this->input->post('latitude')." ".$this->input->post('longitude'));
							$absenLokasi = $this->checklocation($pointDevice);
							
							
							$absenLuar = false;
							
							if($absenLokasi["PATRAJASA"] == "T" || $absenLokasi["TALOK"] == "T" || $absenLokasi["DIREKSIKEET"] == "T"|| $absenLokasi["WELLPADJAMBARAN"] == "T"|| $absenLokasi["REKIND"] == "T")
							{
								//absen di PDSI
								$check_attend = $this->Attendance_model->reqapprovalcheck($token_valid->data->id, $get_date, $this->input->post('condition'));						
								if ($check_attend->num_rows() >= 1) {
									$message = array('status' => false,
													 'message' => 'Anda telah absen sebelumnya. Menunggu approval atasan');
									return $this->response($message, REST_Controller::HTTP_OK);
								}
								
								$insert_attend = $this->Attendance_model->set_attend($data);
								if ($insert_attend > 0) {
									$message = array('status' => true,
													'kondisi' => 'OK' ,
													 'message' => "Set attendance at PEPC Head Office ".$text." successfuly");
									return $this->response($message, REST_Controller::HTTP_OK);
								}else{
									$message = array('status' => false,
													 'message' => "Cannot set attendance");
									return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
								}
							}
							//else if(($absenLokasi["SC"] == "T") || ($absenLokasi["PHE"] == "T") || ($absenLokasi["ELNUSA"] == "T") || ($absenLokasi["PDSI"] == "T") || ($absenLokasi["SOPODEL"] == "T") || ($absenLokasi["MANDIRI"] == "T") || ($absenLokasi["PGE"] == "T"))
							//{
								//absen di Luar kantor pusat PDSI
								//$absenLuar = true;
								
								//if(($absenLokasi["SC"] == "F") && ($absenLokasi["PHE"] == "F") && ($absenLokasi["ELNUSA"] && "F"))
								//{
									////for simulation and UAT only
									////$absenLuar = false;
									
									////$absenLuar = true;
								//}
							//}
							
							else
							{
							//if($absenLuar){
								//check absen
								$check_attend = $this->Attendance_model->reqapprovalcheck($token_valid->data->id, $get_date, $this->input->post('condition'));						
								if ($check_attend->num_rows() >= 1) {
									$message = array('status' => false,
													 'message' => 'Anda telah absen sebelumnya. Menunggu approval atasan.');
									return $this->response($message, REST_Controller::HTTP_OK);
								}
								
								$message = array('status' => true, 'kondisi' => 'LUARKANTOR' ,'message' => 'Memproses pengajuan absensi luar kantor. Silakan isi kolom keterangan.');
								return $this->response($message, REST_Controller::HTTP_OK);
							} 
							//else {
							//	$message = array('status' => false,
							//						 //'message' => 'Anda tidak diperkenankan untuk absen karena lokasi anda di luar kantor Graha PDSI, PHE, EP dan ELNUSA.');
							//						 'message' => 'Anda tidak diperkenankan untuk absen karena lokasi anda di luar kantor PATRA JASA, .');
							//		return $this->response($message, REST_Controller::HTTP_OK);
							//}
							return;
							
							/*USE DISTANCE
							$distance = $this->Attendance_model->getDistance( $this->input->post('latitude'), $this->input->post('longitude'), -6.2050882, 106.8561601 );
							
							if( $distance > 1 ) {
								
							} else {
								
							}*/
							
						}elseif ($check_attend->num_rows() > 0) {
							$time_come_today = "";
							foreach ($check_attend->result() as $value) {
								$time_cond = $value->$field_cond;
								$note =  $value->note;
							}
							
							if($text == 'return') {
								if($time_cond != null){
									$message = array('status' => false,
						             				 'message' => "Sudah absen pulang");
					            	return $this->response($message, 302);
								}
							}
							
							if ($time_cond == null) {
								$update_attend = $this->Attendance_model->update_attend($token_valid->data->id, $get_date, $get_time, $field_cond, $flag);
								$update_flag = $this->Attendance_model->update_flag($token_valid->data->id, $get_date, 0);
								$update_note = $this->Attendance_model->update_note($token_valid->data->id, $get_date, $this->input->post('note', TRUE));
								if ($update_attend === TRUE && $update_flag > 0 && $update_note > 0) {
						            $message = array('status' => true,
						             				 'message' => "Absen ".$text." sukses");
					            	return $this->response($message, REST_Controller::HTTP_OK);
								}else{
						            $message = array('status' => false,
						             				 'message' => "Tidak bisa absen");
					            	return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
								}
							}
							elseif($field_cond == 'time_return' && $time_cond != null){
								$update_attend = $this->Attendance_model->update_attend($token_valid->data->id, $get_date, $get_time, $field_cond, $flag);
								$update_flag = $this->Attendance_model->update_flag($token_valid->data->id, $get_date, 0);
								$update_note = $this->Attendance_model->update_note($token_valid->data->id, $get_date, $this->input->post('note', TRUE));
								if ($update_attend === TRUE && $update_flag > 0) {
						            $message = array('status' => true,
						             				 'message' => "Absen ".$text." sukses");
					            	return $this->response($message, REST_Controller::HTTP_OK);
								}else{
						            $message = array('status' => false,
						             				 'message' => "Tidak bisa absen");
					            	return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
								}
							}
							else{
					            $message = array('status' => false,
												'kondisi' => "SUDAHABSEN",
					             				 'message' => "Anda sudah absen ".$text);
				            	return $this->response($message, REST_Controller::HTTP_OK);
							}
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
		$this->form_validation->set_rules('note', 'note', 'trim|max_length[50]');
		$this->form_validation->set_rules('latitude', 'Latitude', 'trim|required|max_length[1000]');
		$this->form_validation->set_rules('longitude', 'Longitude', 'trim|required|max_length[20]');
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
        		if ($username != $token_valid->data->username) {
		            $message = array('status' => false,
		             				 'message' => 'token access is denied');
		            return $this->response($message, REST_Controller::HTTP_OK);	
        		}
				$exst = $this->Attendance_model->username_exists($token_valid->data->id);
				if ($exst === FALSE) {
		            $message = array('status' => false,
		             				 'message' => "Username not found, please check your username");
	            	return $this->response($message, REST_Controller::HTTP_OK);
				}else{
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
					if ($condition != "come" && $condition != "return" && $condition != "break" && $condition != "end_of_break" && $condition != "leave") {
			            $message = array('status' => false,
			             				 'message' => "Invalid condition");
		            	return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}else{
						$field_cond= "";
						if ($condition == "come") {
							$field_cond = "time_come"; 
							$flag = 1;
							$text = "come";
							$absenLeave = false;
						}elseif ($condition == "return") {
							$field_cond = "time_return";
							$flag = 0;
							$text = "return";
							$absenLeave = false;
						}elseif ($condition == "break") {
							$field_cond = "time_break";
							$flag = 0;
							$text = "break";
							$absenLeave = false;
						}elseif ($condition == "end_of_break") {
							$field_cond = "time_end_of_break";
							$flag = 0;
							$text = "end of break";
							$absenLeave = false;
						}elseif ($condition == "leave") {
							$field_cond = "date_attend";
							$flag = 0;
							$text = "leave";
							$absenLeave = true;
						}
						date_default_timezone_set('Asia/Jakarta');
						$get_date = date("Y-m-d");
						$get_time = date('H:i:s');
						$data = [
							"Id_User" => $token_valid->data->id,
							$field_cond => $get_time,
							"date_attend" => $get_date,
							"note" => $this->input->post('note', TRUE),
							"mark" => "manual attendance",
							"idLeave" => $this->input->post('idLeave', TRUE),
							"from" => $this->input->post('from', TRUE),
							"to" => $this->input->post('to', TRUE),
							"flag" => $flag
						];
						$check_attend = $this->Attendance_model->attendcheck($token_valid->data->id, $get_date);
						
						if ($check_attend->num_rows() < 1) {
							$check_attend = $this->Attendance_model->reqapprovalcheck($token_valid->data->id, $get_date, $this->input->post('condition'));			
							
							if ($check_attend->num_rows() >= 1) {
								$message = array('status' => false,
												 'message' => 'Anda telah absen sebelumnya. Menunggu approval atasan');
								return $this->response($message, REST_Controller::HTTP_OK);
							}
								
							$pointDevice = array($this->input->post('latitude')." ".$this->input->post('longitude'));
							$absenLokasi = $this->checklocation($pointDevice);
							
							$absenLuar = false;
							
							//if($absenLokasi["PDSI"] == "T")
							if($absenLokasi["PATRAJASA"] == "T" || $absenLokasi["TALOK"] == "T" || $absenLokasi["DIREKSIKEET"] == "T"|| $absenLokasi["WELLPADJAMBARAN"] == "T"|| $absenLokasi["REKIND"] == "T" && $absenLeave == FALSE)
							{
								//absen di Green Area
								$check_attend = $this->Attendance_model->reqapprovalcheck($token_valid->data->id, $get_date, $this->input->post('condition'));						
								if ($check_attend->num_rows() >= 1) {
									$message = array('status' => false,
													 'message' => 'Anda telah absen sebelumnya. Menunggu approval atasan');
									return $this->response($message, REST_Controller::HTTP_OK);
								}
								
								$insert_attend = $this->Attendance_model->set_attend($data);
								if ($insert_attend > 0) {
									$message = array('status' => true,
													'kondisi' => 'OK' ,
													 'message' => "Atur kehadiran di Kantor Pusat PEPC ".$text." sukses");
									return $this->response($message, REST_Controller::HTTP_OK);
								}else{
									$message = array('status' => false,
													 'message' => "Tidak bisa absen");
									return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
								}
							}
							else if($absenLeave == TRUE)
							{
								//check absen
								$check_attend = $this->Attendance_model->reqapprovalcheck($token_valid->data->id, $get_date, $this->input->post('condition'));						
								if ($check_attend->num_rows() >= 1) {
									$message = array('status' => false,
													 'message' => 'Anda telah absen sebelumnya. Menunggu approval atasan.');
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
									date_default_timezone_set('Asia/Jakarta');
									$get_date = date("Y-m-d");
									$get_time = date('H:i:s');

									$data = [
										"Id_user" => $token_valid->data->id,
										"date_attend" => $get_date,
										"Jam_absen" => $get_time,
										"POS_ID" => $pos_id_atasan,
										"Note" => $this->input->post('note', TRUE),
										"Tipe" => 'Leave',
										//"Location" => $this->input->post('longitude', TRUE)." ".$this->input->post('latitude', TRUE),
										"Status" => "P", //pending
										"idLeave" => $this->input->post('idLeave', TRUE),
										"from" => $this->input->post('from', TRUE),
										"to" => $this->input->post('to', TRUE)
									];
									$insert_approval = $this->Attendance_model->set_leave($data);
									
									if ($insert_approval > 0) {
										$message = array('status' => true,
														 'message' => "Karena anda berada diluar Area kantor, maka absen ".$text." membutuhkan approval atasan! ");
										return $this->response($message, REST_Controller::HTTP_OK);
									}else{
										$message = array('status' => false,
														 'message' => "Cannot set leave");
										return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
									}
								}
								
								$message = array('status' => "99",
					             				 'message' => "General error");
				            	return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
							}
							else /*if(($absenLokasi["SC"] == "T") || ($absenLokasi["PHE"] == "T") || ($absenLokasi["ELNUSA"] == "T") || ($absenLokasi["PATRAJASA"] == "T"))
							{
								//absen di Luar kantor pusat PDSI
								$absenLuar = true;
								
								if(($absenLokasi["SC"] == "F") && ($absenLokasi["PHE"] == "F") && ($absenLokasi["ELNUSA"] && "F")){
									//for simulation and UAT only
									//$absenLuar = false;
									
									//$absenLuar = true;
								}
							}
							
							if($absenLuar)*/
							{
								//check absen
								$check_attend = $this->Attendance_model->reqapprovalcheck($token_valid->data->id, $get_date, $this->input->post('condition'));						
								if ($check_attend->num_rows() >= 1) {
									$message = array('status' => false,
													 'message' => 'Anda telah absen sebelumnya. Menunggu approval atasan.');
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
									date_default_timezone_set('Asia/Jakarta');
									$get_date = date("Y-m-d");
									$get_time = date('H:i:s');

									$data = [
										"Id_user" => $token_valid->data->id,
										"date_attend" => $get_date,
										"Jam_absen" => $get_time,
										"POS_ID" => $pos_id_atasan,
										"Note" => $this->input->post('note', TRUE),
										"Tipe" => 'manual attendance',
										//"Location" => $this->input->post('longitude', TRUE)." ".$this->input->post('latitude', TRUE),
										"Status" => "P" //pending
									];
									$insert_approval = $this->Attendance_model->set_minta_approval($data);
									
									if ($insert_approval > 0) {
										$message = array('status' => true,
														 'message' => "Karena anda berada diluar Area kantor, maka absen ".$text." membutuhkan approval atasan! ");
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
							}
							
							/*else {
								$message = array('status' => false,
													 'message' => 'Anda tidak diperkenankan untuk absen karena lokasi di luar kantor Graha PDSI, PHE, EP dan ELNUSA.');
									return $this->response($message, REST_Controller::HTTP_OK);
							}*/
							return;
							
							/*USE DISTANCE
							$distance = $this->Attendance_model->getDistance( $this->input->post('latitude'), $this->input->post('longitude'), -6.2050882, 106.8561601 );
							
							if( $distance > 1 ) {
								
							} else {
								
							}*/
							
						}elseif ($check_attend->num_rows() > 0) {
							foreach ($check_attend->result() as $value) {
								$time_cond = $value->$field_cond;
								$note =  $value->note;
							}
							if ($time_cond == null) {
								$update_attend = $this->Attendance_model->update_attend($token_valid->data->id, $get_date, $get_time, $field_cond, $flag);
								$update_flag = $this->Attendance_model->update_flag($token_valid->data->id, $get_date, 0);
								$update_note = $this->Attendance_model->update_note($token_valid->data->id, $get_date, $this->input->post('note', TRUE));
								if ($update_attend === TRUE && $update_flag > 0 && $update_note > 0) {
						            $message = array('status' => true,
						             				 'message' => "Absen ".$text." sukses!");
					            	return $this->response($message, REST_Controller::HTTP_OK);
								}else{
						            $message = array('status' => false,
						             				 'message' => "Tidak bisa absen");
					            	return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
								}
							}
							elseif($field_cond == 'time_return' && $time_cond != null){
								$update_attend = $this->Attendance_model->update_attend($token_valid->data->id, $get_date, $get_time, $field_cond, $flag);
								$update_flag = $this->Attendance_model->update_flag($token_valid->data->id, $get_date, 0);
								$update_note = $this->Attendance_model->update_note($token_valid->data->id, $get_date, $this->input->post('note', TRUE));
								if ($update_attend === TRUE && $update_flag > 0) {
						            $message = array('status' => true,
						             				 'message' => "Absen ".$text." sukses!");
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
        		if ($token_valid->data->role != "admin") {
		            $message = array('status' => false,
		             				 'message' => 'token access is denied');
		            return $this->response($message, REST_Controller::HTTP_OK);	
        		}elseif ($token_valid->data->username != $this->input->post('username', TRUE)) {
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
	        		$get_attendanceAll = $this->Attendance_model->get_all($limit, $offset, $order_by, $sort, $search);
	        		if ($get_attendanceAll === FALSE) {
			            $message = array('status' => false,
			             				 'message' => 'cannot find data');
			            return $this->response($message, REST_Controller::HTTP_OK);
	        		}else{
	        			if ($get_attendanceAll->num_rows() > 0) {
	        				foreach ($get_attendanceAll->result() as $row) {
	        					$data_return[] = [
	        						"Id" => $row->Id_Attend,
	        						"Id_User" => $row->Id_User,
	        						"nip" => $row->nip,
	        						"username" => $row->username,
	        						"full_name" => $row->full_name,
	        						"email" => $row->email,
	        						"date_attend" => $row->date_attend,
	        						"time_come" => $row->time_come,
	        						"time_return" => $row->time_return,
	        						"time_break" => $row->time_break,
	        						"time_end_of_break" => $row->time_end_of_break,
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
		$this->form_validation->set_rules('limit', 'limit', 'trim|max_length[3]');
		$this->form_validation->set_rules('page', 'Page', 'trim|max_length[3]');
		$this->form_validation->set_rules('search', 'Search', 'trim|max_length[300]');
		$this->form_validation->set_rules('order_by', 'Order by', 'trim|max_length[20]');
		$this->form_validation->set_rules('sort', 'Sort ', 'trim|max_length[20]');
		$this->form_validation->set_rules('pos_id', 'Pos ID ', 'trim|max_length[20]');
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
				/* BYPASS DULU
        		if ($token_valid->data->role != "admin") {
		            $message = array('status' => false,
		             				 'message' => 'token access is denied');
		            return $this->response($message, REST_Controller::HTTP_OK);	
        		}else
					*/
				if ($token_valid->data->username != $this->input->post('username', TRUE)) {
		            $message = array('status' => false,
		             				 'message' => 'token access is denied');
		            return $this->response($message, REST_Controller::HTTP_OK);	
        		}else{
	        		$limit = $this->input->post('limit', TRUE);
	        		$post_page = $this->input->post('page', TRUE);
	        		$order_by = $this->input->post('order_by', TRUE);
	        		$sort = $this->input->post('sort', TRUE);
	        		$search = $this->input->post('search', TRUE);
					$pos_id = $this->input->post('pos_id', TRUE);
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
					if ($pos_id == null || empty($pos_id)) {
	        			$pos_id = null;
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
	        		$get_attendanceAll = $this->Attendance_model->get_data_approval($limit, $offset, $order_by, $sort, $search, $this->input->post('username', TRUE));
	        		if ($get_attendanceAll === FALSE) {
			            $message = array('status' => false,
			             				 'message' => 'cannot find data');
			            return $this->response($message, REST_Controller::HTTP_OK);
	        		}else{
	        			if ($get_attendanceAll->num_rows() > 0) {
							
	        				foreach ($get_attendanceAll->result() as $row) {
	        					$data_return[] = [
	        						"Id" => $row->ID,
	        						"Id_User" => $row->Id_user,
									"full_name" => $row->full_name,
									"nip" => $row->nip,
	        						"Jam_absen" => $row->Jam_absen,
	        						"Status" => $row->Status,
	        						"Note" => $row->Note,
	        						"Tipe" => $row->Tipe,
	        						"date_attend" => $row->date_attend,
									"POS_ID" => $row->POS_ID,
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
        		if ($username != $token_valid->data->username) {
		            $message = array('status' => false,
		             				 'message' => 'token access is denied');
		            return $this->response($message, REST_Controller::HTTP_OK);	
        		}
				$exst = $this->Attendance_model->username_exists($token_valid->data->id);
				if ($exst === FALSE) {
		            $message = array('status' => false,
		             				 'message' => "Username not found, please check your usename");
	            	return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
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
	        		$get_attendanceAll = $this->Attendance_model->get_personal($token_valid->data->id, $from, $to, $limit, $offset, $order_by, $sort, $search);
	        		if ($get_attendanceAll === FALSE) {
			            $message = array('status' => false,
			             				 'message' => 'cannot find data');
			            return $this->response($message, REST_Controller::HTTP_OK);
	        		}else{
	        			if ($get_attendanceAll->num_rows() > 0) {
	        				foreach ($get_attendanceAll->result() as $row) {
	        					$data_return[] = [
	        						"username" => $row->username,
	        						"nip" => $row->nip,
	        						"full_name" => $row->full_name,
	        						"email" => $row->email,
	        						"date_attend" => $row->date_attend,
	        						"time_come" => $row->time_come,
	        						"time_return" => $row->time_return,
	        						"time_break" => $row->time_break,
	        						"time_end_of_break" => $row->time_end_of_break,
	        						"note" => $row->note,
	        						"mark" => $row->mark
	        					];
	        				}
	        				$total_data = $this->Attendance_model->total_row_personal($token_valid->data->id, $from, $to, $order_by, $sort, $search);
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
		           		 					 // 'next_total_page' => $next_total_page,
		           		 					 // 'before_total_page' => $before_total_page,
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
        		$delete = $this->Attendance_model->delete($this->input->post('Id', TRUE));
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
	
	public function view_approve_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('id', 'Id', 'trim|required|max_length[20]');
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
        		$viewd = $this->Attendance_model->get_data_approval_clicked($this->input->post('id', TRUE));
				
				if ($viewd->num_rows() > 0) {
					
					foreach ($viewd->result() as $row) {
						$data_return[] = [
							"Id" => $row->ID,
							"Id_User" => $row->Id_user,
							"nip" => $row->nip,
							"username" => $row->username,
							"Tipe" => $row->Tipe,
							"full_name" => $row->full_name,
							"email" => $row->email,
							"date_attend" => $row->date_attend,
							"time_come" => $row->Jam_absen,
							"note" => $row->Note
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
				}
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
        		$absen_approve = $this->Attendance_model->approve($this->input->post('id', TRUE), $this->input->post('action', TRUE), $username);
				
				if ($absen_approve) {
		            $message = array('status' => true,
		             				 'message' => 'Approve absen successfully');
		            return $this->response($message, REST_Controller::HTTP_OK);	
				}else{
		            $message = array('status' => false,
		             				 'message' => 'failed approve absen');
		            return $this->response($message, REST_Controller::HTTP_OK);	
				}
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
        		}elseif ($token_valid->data->username != $this->input->post('username', TRUE)) {
		            $message = array('status' => false,
		             				 'message' => 'token access is denied');
		            return $this->response($message, REST_Controller::HTTP_OK);	
        		}else{
			        $data['users']=array(
			            array('firstname'=>'Agung','lastname'=>'Setiawan','email'=>'ag@setiawan.com'),
			            array('firstname'=>'Hauril','lastname'=>'Maulida Nisfar','email'=>'hm@setiawan.com'),
			            array('firstname'=>'Akhtar','lastname'=>'Setiawan','email'=>'akh@setiawan.com'),
			            array('firstname'=>'Gitarja','lastname'=>'Setiawan','email'=>'git@setiawan.com')
			        );
			        return $this->generate->pdf($data);
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
}

?>