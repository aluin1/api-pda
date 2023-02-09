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
		$this->load->helper('string');
		
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
		    $polygonGedungArkadia =$data_return[8] ;
		    $polygonAntamOfficeBuilding =$data_return[9] ;
		    $polygonPTPertaminaEPAsset4 =$data_return[10] ;
			//07052021 Penambahan area field Papua dan WMO
		    $polygonSorong1 =$data_return[11] ;
		    $polygonSorong2 =$data_return[12] ;
		    $polygonSorong3 =$data_return[13] ;
		    $polygonPapua1 =$data_return[14] ;
		    $polygonSorong4 =$data_return[15] ;
		    $polygonPapua2 =$data_return[16] ;
		    $polygonPapua3 =$data_return[17] ;
		    $polygonWMO =$data_return[18] ;
			$polygonSukowatidanTEJ =$data_return[19] ;
			//27052021 Penambahan area Office Field Cepu, MGS Menggung, sukowati cpa, pad a, pad b
		    $polygonOfficeCepu =$data_return[20] ;
		    $polygonMenggung =$data_return[21] ;
		    $polygonCpaSukowati =$data_return[22] ;
		    $polygonPadASukowati =$data_return[23] ;
		    $polygonPadBSukowati =$data_return[24] ;
		    $polygonCppGundih =$data_return[25] ;
		    $polygonJemursari =$data_return[26] ;
			//31052021 Penambahan area CPP Dongi, CPP Matindok, kawengan, ledok, ngelobo, tapen
		    $polygonCppDonggi =$data_return[27] ;
		    $polygonCppMatindok =$data_return[28] ;
		    $polygonKawengan =$data_return[29] ;
		    $polygonLedok =$data_return[30] ;
		    $polygonNgelobo =$data_return[31] ;
		    $polygonTapen =$data_return[32] ;
			//07062021 Penambahan area CPP Senoro
		    $polygonSenoro =$data_return[33] ;
			//18062021 Penambahan area field sukowati dan poleng
		    $polygonPalangStation =$data_return[34] ;
		    $polygonMessDireksi =$data_return[35] ;
		    $polygonGudangHandak =$data_return[36] ;
		    $polygonShoreBase =$data_return[37] ;
		 
		 
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
		$returnGedungArkadia = "";
		$returnAntamOfficeBuilding = "";
		$returnPTPertaminaEPAsset4 = "";
		//07052021 Penambahan area field Papua
		$returnSorong1 = "";
		$returnSorong2 = "";
		$returnSorong3 = "";
		$returnPapua1 = "";
		$returnSorong4 = "";
		$returnPapua2 = "";
		$returnPapua3 = "";
		$returnWMO = "";
		$returnSukowatidanTEJ = "";
		//27052021 Penambahan area field Cepu dan MGS
		$returnOfficeCepu = "";
		$returnMenggung = "";
		$returnCpaSukowati = "";
		$returnPadASukowati = "";
		$returnPadBSukowati = "";
		$returnCppGundih = "";
		$returnJemursari = "";
		$returnCppDonggi = "";
		$returnCppMatindok = "";
		$returnKawengan = "";
		$returnLedok = "";
		$returnNgelobo = "";
		$returnTapen = "";
		$returnSenoro = "";
		$returnPalangStation = "";
		$returnMessDireksi = "";
		$returnGudangHandak = "";
		$returnShoreBase = "";
		 
		$valueBalikan["PATRAJASA"] = "F";
		$valueBalikan["TALOK"] = "F";
		$valueBalikan["DIREKSIKEET"] = "F";
		$valueBalikan["WELLPADJAMBARAN"] = "F";
		$valueBalikan["REKIND"] = "F";
		$valueBalikan["GPF"] = "F";
		$valueBalikan["BLUEWAREHOUSE"] = "F";
		$valueBalikan["CENTRALWELLPAD"] = "F";
		$valueBalikan["GedungArkadia"] = "F";
		$valueBalikan["AntamOfficeBuilding"] = "F";
		$valueBalikan["PTPertaminaEPAsset4"] = "F";
		$valueBalikan["Sorong1"] = "F";
		$valueBalikan["Sorong2"] = "F";
		$valueBalikan["Sorong3"] = "F";
		$valueBalikan["Papua1"] = "F";
		$valueBalikan["Sorong4"] = "F";
		$valueBalikan["Papua2"] = "F";
		$valueBalikan["Papua3"] = "F";
		$valueBalikan["WMO"] = "F";
		$valueBalikan["SukowatidanTEJ"] = "F";
		$valueBalikan["OfficeCepu"] = "F";
		$valueBalikan["Menggung"] = "F";
		$valueBalikan["CpaSukowati"] = "F";
		$valueBalikan["PadASukowati"] = "F";
		$valueBalikan["PadBSukowati"] = "F";
		$valueBalikan["CppGundih"] = "F";
		$valueBalikan["Jemursari"] = "F";
		$valueBalikan["CppDonggi"] = "F";
		$valueBalikan["CppMatindok"] = "F";
		$valueBalikan["Kawengan"] = "F";
		$valueBalikan["Ledok"] = "F";
		$valueBalikan["Ngelobo"] = "F";
		$valueBalikan["Tapen"] = "F";
		$valueBalikan["Senoro"] = "F";
		$valueBalikan["PalangStation"] = "F";
		$valueBalikan["MessDireksi"] = "F";
		$valueBalikan["GudangHandak"] = "F";
		$valueBalikan["ShoreBase"] = "F";
		 
		
		foreach($points as $key => $point) {
			$returnPatrajasa = $pointLocation->pointInPolygon($point, $polygonPatrajasa);
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
		
		foreach($points as $key => $point) {
			$returnGedungArkadia= $pointLocation->pointInPolygon($point, $polygonGedungArkadia);
		}
		
		foreach($points as $key => $point) {
			$returnAntamOfficeBuilding= $pointLocation->pointInPolygon($point, $polygonAntamOfficeBuilding);
		}
		
		foreach($points as $key => $point) {
			$returnPTPertaminaEPAsset4= $pointLocation->pointInPolygon($point, $polygonPTPertaminaEPAsset4);
		}
		 
		foreach($points as $key => $point) {
			$returnSorong1= $pointLocation->pointInPolygon($point, $polygonSorong1);
		}
		 
		foreach($points as $key => $point) {
			$returnSorong2= $pointLocation->pointInPolygon($point, $polygonSorong2);
		}
		 
		foreach($points as $key => $point) {
			$returnSorong3= $pointLocation->pointInPolygon($point, $polygonSorong3);
		}
		 
		foreach($points as $key => $point) {
			$returnPapua1= $pointLocation->pointInPolygon($point, $polygonPapua1);
		}
		 
		foreach($points as $key => $point) {
			$returnSorong4= $pointLocation->pointInPolygon($point, $polygonSorong4);
		}
		 
		foreach($points as $key => $point) {
			$returnPapua2= $pointLocation->pointInPolygon($point, $polygonPapua2);
		}
		 
		foreach($points as $key => $point) {
			$returnPapua3= $pointLocation->pointInPolygon($point, $polygonPapua3);
		}
		 
		foreach($points as $key => $point) {
			$returnWMO= $pointLocation->pointInPolygon($point, $polygonWMO);
		}
		
		foreach($points as $key => $point) {
			$returnSukowatidanTEJ= $pointLocation->pointInPolygon($point, $polygonSukowatidanTEJ);
		}
		 
		foreach($points as $key => $point) {
			$returnOfficeCepu= $pointLocation->pointInPolygon($point, $polygonOfficeCepu);
		}
		
		foreach($points as $key => $point) {
			$returnMenggung= $pointLocation->pointInPolygon($point, $polygonMenggung);
		}
		
		foreach($points as $key => $point) {
			$returnCpaSukowati= $pointLocation->pointInPolygon($point, $polygonCpaSukowati);
		}
		
		foreach($points as $key => $point) {
			$returnPadASukowati= $pointLocation->pointInPolygon($point, $polygonPadASukowati);
		}
		
		foreach($points as $key => $point) {
			$returnPadBSukowati= $pointLocation->pointInPolygon($point, $polygonPadBSukowati);
		}
		
		foreach($points as $key => $point) {
			$returnCppGundih= $pointLocation->pointInPolygon($point, $polygonCppGundih);
		}
		
		foreach($points as $key => $point) {
			$returnJemursari= $pointLocation->pointInPolygon($point, $polygonJemursari);
		}
		
		foreach($points as $key => $point) {
			$returnCppDonggi= $pointLocation->pointInPolygon($point, $polygonCppDonggi);
		}
		
		foreach($points as $key => $point) {
			$returnCppMatindok= $pointLocation->pointInPolygon($point, $polygonCppMatindok);
		}
		
		foreach($points as $key => $point) {
			$returnKawengan= $pointLocation->pointInPolygon($point, $polygonKawengan);
		}
		
		foreach($points as $key => $point) {
			$returnLedok= $pointLocation->pointInPolygon($point, $polygonLedok);
		}
		
		foreach($points as $key => $point) {
			$returnNgelobo= $pointLocation->pointInPolygon($point, $polygonNgelobo);
		}
		
		foreach($points as $key => $point) {
			$returnTapen= $pointLocation->pointInPolygon($point, $polygonTapen);
		}
		
		foreach($points as $key => $point) {
			$returnSenoro= $pointLocation->pointInPolygon($point, $polygonSenoro);
		}
		
		foreach($points as $key => $point) {
			$returnPalangStation= $pointLocation->pointInPolygon($point, $polygonPalangStation);
		}
		
		foreach($points as $key => $point) {
			$returnMessDireksi= $pointLocation->pointInPolygon($point, $polygonMessDireksi);
		}
		
		foreach($points as $key => $point) {
			$returnGudangHandak= $pointLocation->pointInPolygon($point, $polygonGudangHandak);
		}
		
		foreach($points as $key => $point) {
			$returnShoreBase= $pointLocation->pointInPolygon($point, $polygonShoreBase);
		}
		
		if(($returnPatrajasa == "inside") || ($returnPatrajasa == "vertex"))
		{
			$valueBalikan["PATRAJASA"] = "T";
			return $valueBalikan;
		}
		
		if(($returnTALOK == "inside") || ($returnTALOK == "vertex")){
			$valueBalikan["TALOK"] = "T";
			return $valueBalikan;
		} 
		
		if(($returnDIREKSIKEET == "inside") || ($returnDIREKSIKEET == "vertex")){
			$valueBalikan["DIREKSIKEET"] = "T";
			return $valueBalikan;
		} 
		
		if(($returnWELLPADJAMBARAN == "inside") || ($returnWELLPADJAMBARAN == "vertex")){
			$valueBalikan["WELLPADJAMBARAN"] = "T";
			return $valueBalikan;
		} 
		
		if(($returnREKIND == "inside") || ($returnREKIND == "vertex")){
			$valueBalikan["REKIND"] = "T";
			return $valueBalikan;
		}
		
		if(($returnGPF == "inside") || ($returnGPF == "vertex")){
			$valueBalikan["GPF"] = "T";
			return $valueBalikan;
		} 
		
		if(($returnBLUEWAREHOUSE == "inside") || ($returnBLUEWAREHOUSE == "vertex")){
			$valueBalikan["BLUEWAREHOUSE"] = "T";
			return $valueBalikan;
		} 
		
		if(($returnCENTRALWELLPAD == "inside") || ($returnCENTRALWELLPAD == "vertex")){
			$valueBalikan["CENTRALWELLPAD"] = "T";
			return $valueBalikan;
		} 
		 
		if(($returnGedungArkadia == "inside") || ($returnGedungArkadia == "vertex")){
			$valueBalikan["GedungArkadia"] = "T";
			return $valueBalikan;
		} 
		 
		if(($returnAntamOfficeBuilding == "inside") || ($returnAntamOfficeBuilding == "vertex")){
			$valueBalikan["AntamOfficeBuilding"] = "T";
			return $valueBalikan;
		} 
		 
		if(($returnPTPertaminaEPAsset4 == "inside") || ($returnPTPertaminaEPAsset4 == "vertex")){
			$valueBalikan["PTPertaminaEPAsset4"] = "T";
			return $valueBalikan;
		} 
		
		if(($returnSorong1 == "inside") || ($returnSorong1 == "vertex")){
			$valueBalikan["Sorong1"] = "T";
			return $valueBalikan;
		} 
		
		if(($returnSorong2 == "inside") || ($returnSorong2 == "vertex")){
			$valueBalikan["Sorong2"] = "T";
			return $valueBalikan;
		} 
		
		if(($returnSorong3 == "inside") || ($returnSorong3 == "vertex")){
			$valueBalikan["Sorong3"] = "T";
			return $valueBalikan;
		} 
		
		if(($returnPapua1 == "inside") || ($returnPapua1 == "vertex")){
			$valueBalikan["Papua1"] = "T";
			return $valueBalikan;
		} 
		
		if(($returnSorong4 == "inside") || ($returnSorong4 == "vertex")){
			$valueBalikan["Sorong4"] = "T";
			return $valueBalikan;
		} 
		
		if(($returnPapua2 == "inside") || ($returnPapua2 == "vertex")){
			$valueBalikan["Papua2"] = "T";
			return $valueBalikan;
		} 
		
		if(($returnPapua3 == "inside") || ($returnPapua3 == "vertex")){
			$valueBalikan["Papua3"] = "T";
			return $valueBalikan;
		} 
		
		if(($returnWMO == "inside") || ($returnWMO == "vertex")){
			$valueBalikan["WMO"] = "T";
			return $valueBalikan;
		}
		
		if(($returnSukowatidanTEJ == "inside") || ($returnSukowatidanTEJ == "vertex")){
			$valueBalikan["SukowatidanTEJ"] = "T";
			return $valueBalikan;
		}
		
		if(($returnOfficeCepu == "inside") || ($returnOfficeCepu == "vertex")){
			$valueBalikan["OfficeCepu"] = "T";
			return $valueBalikan;
		}
		
		if(($returnMenggung == "inside") || ($returnMenggung == "vertex")){
			$valueBalikan["Menggung"] = "T";
			return $valueBalikan;
		}
		
		if(($returnCpaSukowati == "inside") || ($returnCpaSukowati == "vertex")){
			$valueBalikan["CpaSukowati"] = "T";
			return $valueBalikan;
		}
		
		if(($returnPadASukowati == "inside") || ($returnPadASukowati == "vertex")){
			$valueBalikan["PadASukowati"] = "T";
			return $valueBalikan;
		}
		
		if(($returnPadBSukowati == "inside") || ($returnPadBSukowati == "vertex")){
			$valueBalikan["PadBSukowati"] = "T";
			return $valueBalikan;
		}
		
		if(($returnCppGundih == "inside") || ($returnCppGundih == "vertex")){
			$valueBalikan["CppGundih"] = "T";
			return $valueBalikan;
		}
		
		if(($returnJemursari == "inside") || ($returnJemursari == "vertex")){
			$valueBalikan["Jemursari"] = "T";
			return $valueBalikan;
		}
		
		if(($returnCppDonggi == "inside") || ($returnCppDonggi == "vertex")){
			$valueBalikan["CppDonggi"] = "T";
			return $valueBalikan;
		}
		
		if(($returnCppMatindok == "inside") || ($returnCppMatindok == "vertex")){
			$valueBalikan["CppMatindok"] = "T";
			return $valueBalikan;
		}
		
		if(($returnKawengan == "inside") || ($returnKawengan == "vertex")){
			$valueBalikan["Kawengan"] = "T";
			return $valueBalikan;
		}
		
		if(($returnLedok == "inside") || ($returnLedok == "vertex")){
			$valueBalikan["Ledok"] = "T";
			return $valueBalikan;
		}
		
		if(($returnNgelobo == "inside") || ($returnNgelobo == "vertex")){
			$valueBalikan["Ngelobo"] = "T";
			return $valueBalikan;
		}
		
		if(($returnTapen == "inside") || ($returnTapen == "vertex")){
			$valueBalikan["Tapen"] = "T";
			return $valueBalikan;
		}
		
		if(($returnSenoro == "inside") || ($returnSenoro == "vertex")){
			$valueBalikan["Senoro"] = "T";
			return $valueBalikan;
		}
		
		if(($returnPalangStation == "inside") || ($returnPalangStation == "vertex")){
			$valueBalikan["PalangStation"] = "T";
			return $valueBalikan;
		}
		
		if(($returnMessDireksi == "inside") || ($returnMessDireksi == "vertex")){
			$valueBalikan["MessDireksi"] = "T";
			return $valueBalikan;
		}
		
		if(($returnGudangHandak == "inside") || ($returnGudangHandak == "vertex")){
			$valueBalikan["GudangHandak"] = "T";
			return $valueBalikan;
		}
		
		if(($returnShoreBase == "inside") || ($returnShoreBase == "vertex")){
			$valueBalikan["ShoreBase"] = "T";
			return $valueBalikan;
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
							
							if($absenLokasi["PATRAJASA"] == "T" || $absenLokasi["TALOK"] == "T" || $absenLokasi["DIREKSIKEET"] == "T"|| $absenLokasi["WELLPADJAMBARAN"] == "T"|| $absenLokasi["REKIND"] == "T"|| $absenLokasi["GPF"] == "T"|| $absenLokasi["BLUEWAREHOUSE"] == "T"|| $absenLokasi["CENTRALWELLPAD"] == "T"|| $absenLokasi["GedungArkadia"] == "T"|| $absenLokasi["AntamOfficeBuilding"] == "T"|| $absenLokasi["PTPertaminaEPAsset4"] == "T"|| $absenLokasi["Sorong1"] == "T"|| $absenLokasi["Sorong2"] == "T"|| $absenLokasi["Sorong3"] == "T"|| $absenLokasi["Papua1"] == "T"|| $absenLokasi["Sorong4"] == "T"|| $absenLokasi["Papua2"] == "T"|| $absenLokasi["Papua3"] == "T"|| $absenLokasi["WMO"] == "T"|| $absenLokasi["SukowatidanTEJ"] == "T"|| $absenLokasi["OfficeCepu"] == "T"|| $absenLokasi["Menggung"] == "T"|| $absenLokasi["CpaSukowati"] == "T"|| $absenLokasi["PadASukowati"] == "T"|| $absenLokasi["PadBSukowati"] == "T"|| $absenLokasi["CppGundih"] == "T"|| $absenLokasi["Jemursari"] == "T"|| $absenLokasi["CppDonggi"] == "T"|| $absenLokasi["CppMatindok"] == "T"|| $absenLokasi["Kawengan"] == "T"|| $absenLokasi["Ledok"] == "T"|| $absenLokasi["Ngelobo"] == "T"|| $absenLokasi["Tapen"] == "T"|| $absenLokasi["Senoro"] == "T"|| $absenLokasi["PalangStation"] == "T"|| $absenLokasi["MessDireksi"] == "T"|| $absenLokasi["GudangHandak"] == "T"|| $absenLokasi["ShoreBase"] == "T")
							{
								
								$message = array('status' => true, 'kondisi' => 'DALAMKANTORFIT' ,'message' => '<b style="font-size:13px;text-transform: uppercase;">Absen Masuk dalam area<br> dengan cek kondisi</b><br> Silakan lanjutkan Absen');
								return $this->response($message, REST_Controller::HTTP_OK);
								 
							} 
							
							else
							{
								
								
								$message = array('status' => true, 'kondisi' => 'LUARKANTORFIT' ,'message' => '<b style="font-size:13px;text-transform: uppercase;">Memproses pengajuan absen Masuk  di luar kantor</b><br> Silakan melakukan Selfie!');
								return $this->response($message, REST_Controller::HTTP_OK);
							} 
							 
							return;
							
							 
							
						}
						elseif ( $check_attend->num_rows() > 0) {
							
							
							
							$pointDevice = array($this->input->post('latitude')." ".$this->input->post('longitude'));
							$absenLokasi = $this->checklocation($pointDevice);
							
							if($absenLokasi["PATRAJASA"] == "T" || $absenLokasi["TALOK"] == "T" || $absenLokasi["DIREKSIKEET"] == "T"|| $absenLokasi["WELLPADJAMBARAN"] == "T"|| $absenLokasi["REKIND"] == "T"|| $absenLokasi["GPF"] == "T"|| $absenLokasi["BLUEWAREHOUSE"] == "T"|| $absenLokasi["CENTRALWELLPAD"] == "T"|| $absenLokasi["GedungArkadia"] == "T"|| $absenLokasi["AntamOfficeBuilding"] == "T"|| $absenLokasi["PTPertaminaEPAsset4"] == "T"|| $absenLokasi["Sorong1"] == "T"|| $absenLokasi["Sorong2"] == "T"|| $absenLokasi["Sorong3"] == "T"|| $absenLokasi["Papua1"] == "T"|| $absenLokasi["Sorong4"] == "T"|| $absenLokasi["Papua2"] == "T"|| $absenLokasi["Papua3"] == "T"|| $absenLokasi["WMO"] == "T"|| $absenLokasi["SukowatidanTEJ"] == "T"|| $absenLokasi["OfficeCepu"] == "T"|| $absenLokasi["Menggung"] == "T"|| $absenLokasi["CpaSukowati"] == "T"|| $absenLokasi["PadASukowati"] == "T"|| $absenLokasi["PadBSukowati"] == "T"|| $absenLokasi["CppGundih"] == "T"|| $absenLokasi["Jemursari"] == "T"|| $absenLokasi["CppDonggi"] == "T"|| $absenLokasi["CppMatindok"] == "T"|| $absenLokasi["Kawengan"] == "T"|| $absenLokasi["Ledok"] == "T"|| $absenLokasi["Ngelobo"] == "T"|| $absenLokasi["Tapen"] == "T"|| $absenLokasi["Senoro"] == "T"|| $absenLokasi["PalangStation"] == "T"|| $absenLokasi["MessDireksi"] == "T"|| $absenLokasi["GudangHandak"] == "T"|| $absenLokasi["ShoreBase"] == "T")
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
												 'message' => '<b style="font-size:13px;text-transform: uppercase;">Absen '.$text.' dalam area<br> dengan cek kondisi</b><br> Silakan melakukan Selfie!');
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
												 'message' => '<b style="font-size:13px;text-transform: uppercase;">Absen Pulang Luar area<br> dengan cek kondisi</b><br> Silakan melakukan Selfie!');
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
							
							if($absenLokasi["PATRAJASA"] == "T" || $absenLokasi["TALOK"] == "T" || $absenLokasi["DIREKSIKEET"] == "T"|| $absenLokasi["WELLPADJAMBARAN"] == "T"|| $absenLokasi["REKIND"] == "T"|| $absenLokasi["GPF"] == "T"|| $absenLokasi["BLUEWAREHOUSE"] == "T"|| $absenLokasi["CENTRALWELLPAD"] == "T"|| $absenLokasi["GedungArkadia"] == "T"|| $absenLokasi["AntamOfficeBuilding"] == "T"|| $absenLokasi["PTPertaminaEPAsset4"] == "T"|| $absenLokasi["Sorong1"] == "T"|| $absenLokasi["Sorong2"] == "T"|| $absenLokasi["Sorong3"] == "T"|| $absenLokasi["Papua1"] == "T"|| $absenLokasi["Sorong4"] == "T"|| $absenLokasi["Papua2"] == "T"|| $absenLokasi["Papua3"] == "T"|| $absenLokasi["WMO"] == "T"|| $absenLokasi["SukowatidanTEJ"] == "T"|| $absenLokasi["OfficeCepu"] == "T"|| $absenLokasi["Menggung"] == "T"|| $absenLokasi["CpaSukowati"] == "T"|| $absenLokasi["PadASukowati"] == "T"|| $absenLokasi["PadBSukowati"] == "T"|| $absenLokasi["CppGundih"] == "T"|| $absenLokasi["Jemursari"] == "T"|| $absenLokasi["CppDonggi"] == "T"|| $absenLokasi["CppMatindok"] == "T"|| $absenLokasi["Kawengan"] == "T"|| $absenLokasi["Ledok"] == "T"|| $absenLokasi["Ngelobo"] == "T"|| $absenLokasi["Tapen"] == "T"|| $absenLokasi["Senoro"] == "T"|| $absenLokasi["PalangStation"] == "T"|| $absenLokasi["MessDireksi"] == "T"|| $absenLokasi["GudangHandak"] == "T"|| $absenLokasi["ShoreBase"] == "T")
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
						else if($absenLokasi2["GedungArkadia"] == "T")
						{
							$idLocation = 10;
						}
						else if($absenLokasi2["AntamOfficeBuilding"] == "T")
						{
							$idLocation = 11;
						}
						else if($absenLokasi2["PTPertaminaEPAsset4"] == "T")
						{
							$idLocation = 12;
						}
						else if($absenLokasi2["Sorong1"] == "T")
						{
							$idLocation = 13;
						}
						else if($absenLokasi2["Sorong2"] == "T")
						{
							$idLocation = 14;
						}
						else if($absenLokasi2["Sorong3"] == "T")
						{
							$idLocation = 15;
						}
						else if($absenLokasi2["Papua1"] == "T")
						{
							$idLocation = 16;
						}
						else if($absenLokasi2["Sorong4"] == "T")
						{
							$idLocation = 17;
						}
						else if($absenLokasi2["Papua2"] == "T")
						{
							$idLocation = 18;
						}
						else if($absenLokasi2["Papua3"] == "T")
						{
							$idLocation = 19;
						}
						else if($absenLokasi2["WMO"] == "T")
						{
							$idLocation = 20;
						}
						else if($absenLokasi2["SukowatidanTEJ"] == "T")
						{
							$idLocation = 21;							
						}
						else if($absenLokasi2["OfficeCepu"] == "T")
						{
							$idLocation = 22;							
						}
						else if($absenLokasi2["Menggung"] == "T")
						{
							$idLocation = 23;							
						}
						else if($absenLokasi2["CpaSukowati"] == "T")
						{
							$idLocation = 24;							
						}
						else if($absenLokasi2["PadASukowati"] == "T")
						{
							$idLocation = 25;							
						}
						else if($absenLokasi2["PadBSukowati"] == "T")
						{
							$idLocation = 26;							
						}
						else if($absenLokasi2["CppGundih"] == "T")
						{
							$idLocation = 27;							
						}
						else if($absenLokasi2["Jemursari"] == "T")
						{
							$idLocation = 28;							
						}
						else if($absenLokasi2["CppDonggi"] == "T")
						{
							$idLocation = 29;							
						}
						else if($absenLokasi2["CppMatindok"] == "T")
						{
							$idLocation = 30;							
						}
						else if($absenLokasi2["Kawengan"] == "T")
						{
							$idLocation = 31;							
						}
						else if($absenLokasi2["Ledok"] == "T")
						{
							$idLocation = 32;							
						}
						else if($absenLokasi2["Ngelobo"] == "T")
						{
							$idLocation = 33;							
						}
						else if($absenLokasi2["Tapen"] == "T")
						{
							$idLocation = 34;							
						}
						else if($absenLokasi2["Senoro"] == "T")
						{
							$idLocation = 35;							
						}
						else if($absenLokasi2["PalangStation"] == "T")
						{
							$idLocation = 36;							
						}
						else if($absenLokasi2["MessDireksi"] == "T")
						{
							$idLocation = 37;							
						}
						else if($absenLokasi2["GudangHandak"] == "T")
						{
							$idLocation = 38;							
						}
						else if($absenLokasi2["ShoreBase"] == "T")
						{
							$idLocation = 39;							
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
								
								
								$message = array('status' => true, 'kondisi' => 'LUARKANTORNONFIT' ,'message' => '<b style="font-size:13px;text-transform: uppercase;">Memproses pengajuan absen Masuk  di luar kantor</b><br> Silakan melakukan Selfie!');
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
							
							if($absenLokasi["PATRAJASA"] == "T" || $absenLokasi["TALOK"] == "T" || $absenLokasi["DIREKSIKEET"] == "T"|| $absenLokasi["WELLPADJAMBARAN"] == "T"|| $absenLokasi["REKIND"] == "T"|| $absenLokasi["GPF"] == "T"|| $absenLokasi["BLUEWAREHOUSE"] == "T"|| $absenLokasi["CENTRALWELLPAD"] == "T"|| $absenLokasi["GedungArkadia"] == "T"|| $absenLokasi["AntamOfficeBuilding"] == "T"|| $absenLokasi["PTPertaminaEPAsset4"] == "T"|| $absenLokasi["Sorong1"] == "T"|| $absenLokasi["Sorong2"] == "T"|| $absenLokasi["Sorong3"] == "T"|| $absenLokasi["Papua1"] == "T"|| $absenLokasi["Sorong4"] == "T"|| $absenLokasi["Papua2"] == "T"|| $absenLokasi["Papua3"] == "T"|| $absenLokasi["WMO"] == "T"|| $absenLokasi["SukowatidanTEJ"] == "T"|| $absenLokasi["OfficeCepu"] == "T"|| $absenLokasi["Menggung"] == "T"|| $absenLokasi["CpaSukowati"] == "T"|| $absenLokasi["PadASukowati"] == "T"|| $absenLokasi["PadBSukowati"] == "T"|| $absenLokasi["CppGundih"] == "T"|| $absenLokasi["Jemursari"] == "T"|| $absenLokasi["CppDonggi"] == "T"|| $absenLokasi["CppMatindok"] == "T"|| $absenLokasi["Kawengan"] == "T"|| $absenLokasi["Ledok"] == "T"|| $absenLokasi["Ngelobo"] == "T"|| $absenLokasi["Tapen"] == "T"|| $absenLokasi["Senoro"] == "T"|| $absenLokasi["PalangStation"] == "T"|| $absenLokasi["MessDireksi"] == "T"|| $absenLokasi["GudangHandak"] == "T"|| $absenLokasi["ShoreBase"] == "T")
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
						else if($absenLokasi2["GedungArkadia"] == "T")
						{
							$idLocation = 10;
						}
						else if($absenLokasi2["AntamOfficeBuilding"] == "T")
						{
							$idLocation = 11;
						}
						else if($absenLokasi2["PTPertaminaEPAsset4"] == "T")
						{
							$idLocation = 12;
						}
						else if($absenLokasi2["Sorong1"] == "T")
						{
							$idLocation = 13;
						}
						else if($absenLokasi2["Sorong2"] == "T")
						{
							$idLocation = 14;
						}
						else if($absenLokasi2["Sorong3"] == "T")
						{
							$idLocation = 15;
						}
						else if($absenLokasi2["Papua1"] == "T")
						{
							$idLocation = 16;
						}
						else if($absenLokasi2["Sorong4"] == "T")
						{
							$idLocation = 17;
						}
						else if($absenLokasi2["Papua2"] == "T")
						{
							$idLocation = 18;
						}
						else if($absenLokasi2["Papua3"] == "T")
						{
							$idLocation = 19;
						}
						else if($absenLokasi2["WMO"] == "T")
						{
							$idLocation = 20;
						}
						else if($absenLokasi2["SukowatidanTEJ"] == "T")
						{
							$idLocation = 21;
						}
						else if($absenLokasi2["OfficeCepu"] == "T")
						{
							$idLocation = 22;
						}
						else if($absenLokasi2["Menggung"] == "T")
						{
							$idLocation = 23;
						}
						else if($absenLokasi2["CpaSukowati"] == "T")
						{
							$idLocation = 24;
						}
						else if($absenLokasi2["PadASukowati"] == "T")
						{
							$idLocation = 25;
						}
						else if($absenLokasi2["PadBSukowati"] == "T")
						{
							$idLocation = 26;
						}
						else if($absenLokasi2["CppGundih"] == "T")
						{
							$idLocation = 27;							
						}
						else if($absenLokasi2["Jemursari"] == "T")
						{
							$idLocation = 28;							
						}
						else if($absenLokasi2["CppDonggi"] == "T")
						{
							$idLocation = 29;							
						}
						else if($absenLokasi2["CppMatindok"] == "T")
						{
							$idLocation = 30;							
						}
						else if($absenLokasi2["Kawengan"] == "T")
						{
							$idLocation = 31;							
						}
						else if($absenLokasi2["Ledok"] == "T")
						{
							$idLocation = 32;							
						}
						else if($absenLokasi2["Ngelobo"] == "T")
						{
							$idLocation = 33;							
						}
						else if($absenLokasi2["Tapen"] == "T")
						{
							$idLocation = 34;							
						}
						else if($absenLokasi2["Senoro"] == "T")
						{
							$idLocation = 35;							
						}
						else if($absenLokasi2["PalangStation"] == "T")
						{
							$idLocation = 36;							
						}
						else if($absenLokasi2["MessDireksi"] == "T")
						{
							$idLocation = 37;							
						}
						else if($absenLokasi2["GudangHandak"] == "T")
						{
							$idLocation = 38;							
						}
						else if($absenLokasi2["ShoreBase"] == "T")
						{
							$idLocation = 39;							
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
						else if($absenLokasi2["GedungArkadia"] == "T")
						{
							$idLocation = 10;
						}
						else if($absenLokasi2["AntamOfficeBuilding"] == "T")
						{
							$idLocation = 11;
						}
						else if($absenLokasi2["PTPertaminaEPAsset4"] == "T")
						{
							$idLocation = 12;
						}
						else if($absenLokasi2["Sorong1"] == "T")
						{
							$idLocation = 13;
						}
						else if($absenLokasi2["Sorong2"] == "T")
						{
							$idLocation = 14;
						}
						else if($absenLokasi2["Sorong3"] == "T")
						{
							$idLocation = 15;
						}
						else if($absenLokasi2["Papua1"] == "T")
						{
							$idLocation = 16;
						}
						else if($absenLokasi2["Sorong4"] == "T")
						{
							$idLocation = 17;
						}
						else if($absenLokasi2["Papua2"] == "T")
						{
							$idLocation = 18;
						}
						else if($absenLokasi2["Papua3"] == "T")
						{
							$idLocation = 19;
						}
						else if($absenLokasi2["WMO"] == "T")
						{
							$idLocation = 20;
						}
						else if($absenLokasi2["SukowatidanTEJ"] == "T")
						{
							$idLocation = 21;
						}
						else if($absenLokasi2["OfficeCepu"] == "T")
						{
							$idLocation = 22;
						}
						else if($absenLokasi2["Menggung"] == "T")
						{
							$idLocation = 23;
						}
						else if($absenLokasi2["CpaSukowati"] == "T")
						{
							$idLocation = 24;
						}
						else if($absenLokasi2["PadASukowati"] == "T")
						{
							$idLocation = 25;
						}
						else if($absenLokasi2["PadBSukowati"] == "T")
						{
							$idLocation = 26;
						}
						else if($absenLokasi2["CppGundih"] == "T")
						{
							$idLocation = 27;							
						}
						else if($absenLokasi2["Jemursari"] == "T")
						{
							$idLocation = 28;							
						}
						else if($absenLokasi2["CppDonggi"] == "T")
						{
							$idLocation = 29;							
						}
						else if($absenLokasi2["CppMatindok"] == "T")
						{
							$idLocation = 30;							
						}
						else if($absenLokasi2["Kawengan"] == "T")
						{
							$idLocation = 31;							
						}
						else if($absenLokasi2["Ledok"] == "T")
						{
							$idLocation = 32;							
						}
						else if($absenLokasi2["Ngelobo"] == "T")
						{
							$idLocation = 33;							
						}
						else if($absenLokasi2["Tapen"] == "T")
						{
							$idLocation = 34;							
						}
						else if($absenLokasi2["Senoro"] == "T")
						{
							$idLocation = 35;							
						}
						else if($absenLokasi2["PalangStation"] == "T")
						{
							$idLocation = 36;							
						}
						else if($absenLokasi2["MessDireksi"] == "T")
						{
							$idLocation = 37;							
						}
						else if($absenLokasi2["GudangHandak"] == "T")
						{
							$idLocation = 38;							
						}
						else if($absenLokasi2["ShoreBase"] == "T")
						{
							$idLocation = 39;							
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
											//$pos_id_atasan = $row->Nopek;
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
						else if($absenLokasi2["GedungArkadia"] == "T")
						{
							$idLocation = 10;
						}
						else if($absenLokasi2["AntamOfficeBuilding"] == "T")
						{
							$idLocation = 11;
						}
						else if($absenLokasi2["PTPertaminaEPAsset4"] == "T")
						{
							$idLocation = 12;
						}
						else if($absenLokasi2["Sorong1"] == "T")
						{
							$idLocation = 13;
						}
						else if($absenLokasi2["Sorong2"] == "T")
						{
							$idLocation = 14;
						}
						else if($absenLokasi2["Sorong3"] == "T")
						{
							$idLocation = 15;
						}
						else if($absenLokasi2["Papua1"] == "T")
						{
							$idLocation = 16;
						}
						else if($absenLokasi2["Sorong4"] == "T")
						{
							$idLocation = 17;
						}
						else if($absenLokasi2["Papua2"] == "T")
						{
							$idLocation = 18;
						}
						else if($absenLokasi2["Papua3"] == "T")
						{
							$idLocation = 19;
						}
						else if($absenLokasi2["WMO"] == "T")
						{
							$idLocation = 20;
						}
						else if($absenLokasi2["SukowatidanTEJ"] == "T")
						{
							$idLocation = 21;
						}
						else if($absenLokasi2["OfficeCepu"] == "T")
						{
							$idLocation = 22;
						}
						else if($absenLokasi2["Menggung"] == "T")
						{
							$idLocation = 23;
						}
						else if($absenLokasi2["CpaSukowati"] == "T")
						{
							$idLocation = 24;
						}
						else if($absenLokasi2["PadASukowati"] == "T")
						{
							$idLocation = 25;
						}
						else if($absenLokasi2["PadBSukowati"] == "T")
						{
							$idLocation = 26;
						}
						else if($absenLokasi2["CppGundih"] == "T")
						{
							$idLocation = 27;							
						}
						else if($absenLokasi2["Jemursari"] == "T")
						{
							$idLocation = 28;							
						}
						else if($absenLokasi2["CppDonggi"] == "T")
						{
							$idLocation = 29;							
						}
						else if($absenLokasi2["CppMatindok"] == "T")
						{
							$idLocation = 30;							
						}
						else if($absenLokasi2["Kawengan"] == "T")
						{
							$idLocation = 31;							
						}
						else if($absenLokasi2["Ledok"] == "T")
						{
							$idLocation = 32;							
						}
						else if($absenLokasi2["Ngelobo"] == "T")
						{
							$idLocation = 33;							
						}
						else if($absenLokasi2["Tapen"] == "T")
						{
							$idLocation = 34;							
						}
						else if($absenLokasi2["Senoro"] == "T")
						{
							$idLocation = 35;							
						}
						else if($absenLokasi2["PalangStation"] == "T")
						{
							$idLocation = 36;							
						}
						else if($absenLokasi2["MessDireksi"] == "T")
						{
							$idLocation = 37;							
						}
						else if($absenLokasi2["GudangHandak"] == "T")
						{
							$idLocation = 38;							
						}
						else if($absenLokasi2["ShoreBase"] == "T")
						{
							$idLocation = 39;							
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
											//$pos_id_atasan = $row->Nopek;
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
									"administrative_area_level_1"  => $row->administrative_area_level_1,
									"StatusWR"  => $row->StatusWR,
									"PhotoMasuk"  => $row->PhotoMasuk,
									"PhotoKeluar"  => $row->PhotoKeluar,
									"StatusFitNote"  => $row->StatusFitNote,
									"StatusFitNote_Lain"  => $row->StatusFitNote_Lain 
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
	        						  "idLocation" => $row->idLocation ,
	        						  "StatusWR" => $row->StatusWR 
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
	        						  "idLocation" => $row->idLocation ,
	        						  "StatusWR" => $row->StatusWR 
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
		//$nopek = $_POST["nopek"];
		$random=random_string('alnum', 17);
		date_default_timezone_set('Asia/Jakarta');
				$get_date = date("Y-m-d");
		$resultLocationFile = $this->Attendance_model->getlokasi();
						  foreach ($resultLocationFile->result() as $apilok) {
						  $ApiKeyLoc=$apilok->FITUR_KEYVALUE; 
             
							  }
	define('UPLOAD_DIR', $ApiKeyLoc);
	
	
	$nmfile=$random.'-'.$get_date.'-'.time() . '.jpg';
	
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
		$this->form_validation->set_rules('nopek', 'Nopek', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('date', 'date', 'trim|required|max_length[20]');
        if ($this->form_validation->run() == FALSE){
            // form validation error
            $message = array('status' => false,
             				 'message' => $this->form_validation->error_array());
            return $this->response($message, 400);
        }else{	
        	 
        		$username = $this->input->post('username');
        		 
        		$delete = $this->Attendance_model->deleteabsen( $this->input->post('nopek', TRUE), $this->input->post('date', TRUE));
        		$deleteapp = $this->Attendance_model->deleteabsenapp( $this->input->post('nopek', TRUE), $this->input->post('date', TRUE));
        		$deletewo = $this->Attendance_model->deletewo( $this->input->post('nopek', TRUE), $this->input->post('date', TRUE));
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
	
	
	
	public function  info_get()
	{ 
       
        
		 $dtInfo = $this->Attendance_model->getinfo()->result();
		 foreach ($dtInfo  as $row) {
		 			$data_return[] = [
	        						"UrlImage" =>  $row->UrlImage 
	        					];		

		 }								
			  $message = array('dataINFO' => $data_return );
					return $this->response($message, REST_Controller::HTTP_OK);	
		
	}
	
	
public function add_dataTambahan_post()
	{
		
		// XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]'); 
		$this->form_validation->set_rules('phonenumber', 'Phone Number', 'trim|max_length[20]');
		$this->form_validation->set_rules('statvaksin', 'Status Vaksin', 'trim|max_length[10]');
		$this->form_validation->set_rules('statcovid', 'Status Covid', 'trim|max_length[10]');
		$this->form_validation->set_rules('goldarah', 'Golongan Darah', 'trim|max_length[10]');
		$this->form_validation->set_rules('rhesus', 'Rhesus', 'trim|max_length[50]');
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
									 
							
						$dataCovid = [
							 "nopek" => $token_valid->data->EMPLOYEE_NOPEK,
							 "PhoneNumber" => $this->input->post('phonenumber'),
							"IsVaccine" => $this->input->post('statvaksin') ,
							"IsCovid" => $this->input->post('statcovid') ,
							"BloodType" =>  $this->input->post('goldarah') ,
							"Rhesus" =>  $this->input->post('rhesus') ,
							"LastUpdatedDate" =>  $get_fulldate
						];
						
						
					 $absen_approve = $this->Attendance_model->set_data_tambahan($token_valid->data->EMPLOYEE_NOPEK, $dataCovid);					    
									   
								 
								$message = array('status' => true,
														 'message' => '<b style="font-size:13px;text-transform: uppercase;">Data Status Covid Berhasil ditambah!</b> ');
										return $this->response($message, REST_Controller::HTTP_OK);
							
							 
							
					 
				 
			}
        }
	}
	
	
 public function dataTambahan_detail_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[50]'); 
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
				$get_dataTm = $this->Attendance_model->datatambahancheck($token_valid->data->EMPLOYEE_NOPEK);
				 
	        			 if ($get_dataTm->num_rows() > 0) {
				 
					foreach ($get_dataTm->result() as $row) {
						$nopek=$row->nopek;
								 
									 $data_return[] = [
	        						"Id" =>  $row->Id,
	        						"nopek" =>  $row->nopek,
	        						"PhoneNumber" => $row->PhoneNumber,
	        						"IsVaccine" => $row->IsVaccine,
	        						"IsCovid" => $row->IsCovid,
	        						  "BloodType" =>  $row->BloodType,
	        						  "Rhesus" =>   $row->Rhesus
	        					];
					}
		           		 	$message = array('data' => $data_return);
		            		return $this->response($message, REST_Controller::HTTP_OK);	
		        		 }
						 else{
				           $data_return[] = [
	        						"Id" =>  "",
	        						"nopek" =>"",
	        						"PhoneNumber" => "",
	        						"IsVaccine" => "",
	        						"IsCovid" => "",
	        						  "BloodType" => "",
	        						  "Rhesus" =>   ""
	        					];
		           		 	$message = array('data' => $data_return);
		            		return $this->response($message, REST_Controller::HTTP_OK);	
							 
						 }
					 
				 	
			}	
		}
	}
	
	public function  lokasi_info_get()
	{ 
       
        
		 $dtapikey = $this->Attendance_model->getlokasiinfo()->result();
		 foreach ($dtapikey  as $row) {
		 			$data_return[] = [
	        						"FITUR_KEYVALUE" =>  $row->FITUR_KEYVALUE 
	        					];		

		 }								
			  $message = array('dataAPIKEY' => $data_return );
					return $this->response($message, REST_Controller::HTTP_OK);	
		
	}
	
	
	
 public function datavaksin_detail_post()
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
			 
			 
	        		$get_vaksinAll = $this->Attendance_model->vaksincheck($token_valid->data->EMPLOYEE_NOPEK);
	        		 
	        			 if ($get_vaksinAll->num_rows() > 0) {
							
	        				foreach ($get_vaksinAll->result() as $row) {
							 
									$data_return[] = [
	        						"Id" =>  $row->Id,
	        						"nopek" =>  $row->nopek,
	        						"VaccineNo" =>  $row->VaccineNo,
	        						"Location" => $row->Location,
	        						"VaccineDate" => $row->VaccineDate
	        					];
									
								 
	        				}
	        				 
		           		 	$message = array('data' => $data_return);
		            		return $this->response($message, REST_Controller::HTTP_OK);	
		        		 }else{
							  $data_return[] = [
	        						"Id" => "",
	        						"nopek" => "",
	        						"VaccineNo" =>  "",
	        						"Location" => "",
	        						"VaccineDate" => ""
	        					];
		           		 	$message = array('data' => $data_return);
		            		return $this->response($message, REST_Controller::HTTP_OK);	
							 
						 }
					 
				 	
			}	
		}
	}
	
	
	
public function add_vaksin_post()
	{
		
		// XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]'); 
		$this->form_validation->set_rules('vakke', 'Tahan Vaksin', 'trim|max_length[1000]');
		$this->form_validation->set_rules('vaklokasi', 'Lokasi Vaksin', 'trim|required|max_length[1000]');
		$this->form_validation->set_rules('vakdate', 'Tanggal Vaksin', 'trim|required|max_length[1000]');
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
									
									 
							
						$datavaksin = [
							"nopek" => $token_valid->data->EMPLOYEE_NOPEK,
							"VaccineNo" => $this->input->post('vakke'),
							"Location" => $this->input->post('vaklokasi') ,
							"VaccineDate" => $this->input->post('vakdate') ,
							"LastUpdatedDate" =>  $get_date
						];
						
						
					 $absen_approve = $this->Attendance_model->set_vaksin($datavaksin);
								    
									  
    				 
								 
								$message = array('status' => true,
														 'message' => '<b style="font-size:13px;text-transform: uppercase;">Data Vaksin Berhasil ditambah!</b> ');
										return $this->response($message, REST_Controller::HTTP_OK);
							
							 
							
					 
				 
			}
        }
	}
	
	
	
	
	
	
	
	
public function add_kuis_post()
	{
		
		// XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]'); 
		$this->form_validation->set_rules('keluhankesehatan', 'Keluhan Kesehatan', 'trim|max_length[20]');
		$this->form_validation->set_rules('gejala', 'Demam Batuk Lainnya', 'trim|max_length[1000]');
		$this->form_validation->set_rules('statuskuis', 'Status isian', 'trim|max_length[10]');
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
									 
							
						$dataCovid = [
							"nopek" => $token_valid->data->EMPLOYEE_NOPEK,
							"KeluhanKesehatanHariSebelumnya" => $this->input->post('keluhankesehatan'),
							"DemamBatukLainnya" => $this->input->post('gejala') ,
							"TanggalPengisian" => $get_date ,
							"Status" =>  $this->input->post('statuskuis')
						];
						
						
					 $absen_approve = $this->Attendance_model->set_data_kuis($token_valid->data->EMPLOYEE_NOPEK,$get_date, $dataCovid);					    
									   
								 
								$message = array('status' => true,
														 'message' => '<b style="font-size:13px;text-transform: uppercase;">Data kuis 1 Berhasil ditambah!</b> ');
										return $this->response($message, REST_Controller::HTTP_OK);
							
							 
							
					 
				 
			}
        }
	}
	
	
	
 public function datakuis_detail_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[50]');  
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
				$get_dataTm = $this->Attendance_model->kuischeck($token_valid->data->EMPLOYEE_NOPEK,$get_date);
				 
	        			 if ($get_dataTm->num_rows() > 0) {
				 
					foreach ($get_dataTm->result() as $row) {
						$nopek=$row->nopek;
								 
									 $data_return[] = [
	        						"Id" =>  $row->Id,
	        						"nopek" =>  $row->nopek,
	        						"KeluhanKesehatanHariSebelumnya" => $row->KeluhanKesehatanHariSebelumnya,
	        						"DemamBatukLainnya" => $row->DemamBatukLainnya
	        					];
					}
		           		 	$message = array('data' => $data_return);
		            		return $this->response($message, REST_Controller::HTTP_OK);	
		        		 }
						 else{
				           $data_return[] = [
	        						"Id" => "",
	        						"nopek" => "",
	        						"KeluhanKesehatanHariSebelumnya" => "",
	        						"DemamBatukLainnya" => ""
	        					];
		           		 	$message = array('data' => $data_return);
		            		return $this->response($message, REST_Controller::HTTP_OK);	
							 
						 }
					 
				 	
			}	
		}
	}
	
	
	
	
	public function add_kuis2_post()
	{
		
		// XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[100]'); 
		$this->form_validation->set_rules('sistemkerja', 'Sistem Kerja', 'trim|required|max_length[100]'); 
		$this->form_validation->set_rules('lokasikerja', 'Lokasi Kerja', 'trim|max_length[100]');
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
									 
							
						$dataCovid = [
							"nopek" => $token_valid->data->EMPLOYEE_NOPEK,
							"SistemKerja" => $this->input->post('sistemkerja'),
							"LokasiKerja" => $this->input->post('lokasikerja') ,
							"TanggalPengisian" => $get_date 
						];
						
						
					 $absen_approve = $this->Attendance_model->set_data_kuis($token_valid->data->EMPLOYEE_NOPEK,$get_date, $dataCovid);					    
									   
								 
								$message = array('status' => true,
														 'message' => '<b style="font-size:13px;text-transform: uppercase;">Data kuis 2 Berhasil ditambah!</b> ');
										return $this->response($message, REST_Controller::HTTP_OK);
							
							 
							
					 
				 
			}
        }
	}
	
	
	public function add_kuis2_1_post()
	{
		
		// XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[100]'); 
		$this->form_validation->set_rules('isolasimandiri', 'Isolasi Mandiri', 'trim|max_length[10]');
		$this->form_validation->set_rules('alasanisolasimandiri', 'Alasan Isolasi Mandiri', 'trim|max_length[1000]');
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
									 
							
						$dataCovid = [
							"nopek" => $token_valid->data->EMPLOYEE_NOPEK,
							"IsolasiMandiri" => $this->input->post('isolasimandiri') ,
							"TanggalPengisian" => $get_date ,
							"AlasanIsolasiMandiri" =>  $this->input->post('alasanisolasimandiri')
						];
						
						
					 $absen_approve = $this->Attendance_model->set_data_kuis($token_valid->data->EMPLOYEE_NOPEK,$get_date, $dataCovid);					    
									   
								 
								$message = array('status' => true,
														 'message' => '<b style="font-size:13px;text-transform: uppercase;">Data kuis 2 Berhasil ditambah!</b> ');
										return $this->response($message, REST_Controller::HTTP_OK);
							
							 
							
					 
				 
			}
        }
	}
	
	
	
	
 public function datakuis2_detail_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[50]');  
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
				$get_dataTm = $this->Attendance_model->kuischeck($token_valid->data->EMPLOYEE_NOPEK,$get_date);
				 
	        			 if ($get_dataTm->num_rows() > 0) {
				 
					foreach ($get_dataTm->result() as $row) {
						$nopek=$row->nopek;
								 
									 $data_return[] = [
	        						"Id" =>  $row->Id,
	        						"nopek" =>  $row->nopek,
	        						"SistemKerja" => $row->SistemKerja,
	        						"LokasiKerja" => $row->LokasiKerja,
	        						"IsolasiMandiri" => $row->IsolasiMandiri,
	        						"AlasanIsolasiMandiri" => $row->AlasanIsolasiMandiri,
	        						"KonsultasiDokter" => $row->KonsultasiDokter,	
									"HariKeBerapaIsoman" => $row->HariKeBerapaIsoman,	
									"DimanaIsoman" =>  $row->DimanaIsoman,	
									"SuhuTubuh" =>  $row->SuhuTubuh,	
									"KeluhanPekerja" =>   $row->KeluhanPekerja,	
									"ObatYangDiminum" =>   $row->ObatYangDiminum,	
									"KendalaIsoman" =>   $row->KendalaIsoman,	
									"KerabatSerumahIsoman" =>   $row->KerabatSerumahIsoman,	
									"KeluhanKesehatanPekerja" =>   $row->KeluhanKesehatanPekerja,	
									"ApakahDalamPerawatan" =>   $row->ApakahDalamPerawatan,	
									"DemamBatukLainnyaSaatIni" =>   $row->DemamBatukLainnyaSaatIni,	
									"KondisiSaatIni" =>   $row->KondisiSaatIni,	
									"KontakEratDenganPasienCovid" =>   $row->KontakEratDenganPasienCovid,	
									"KerabatSerumahKeluhanKesehatan" =>   $row->KerabatSerumahKeluhanKesehatan,	
									"KondisiDalamBekerja" =>   $row->KondisiDalamBekerja
									
									
	        					];
					}
		           		 	$message = array('data' => $data_return);
		            		return $this->response($message, REST_Controller::HTTP_OK);	
		        		 }
						 else{
				           $data_return[] = [
	        						"Id" => "",
	        						"nopek" => "",
	        						"SistemKerja" => "",
	        						"LokasiKerja" => "",
	        						"IsolasiMandiri" => "",
	        						"AlasanIsolasiMandiri" => "",
	        						"KonsultasiDokter" => "",	
									"HariKeBerapaIsoman" => "",		
									"DimanaIsoman" =>  "",		
									"SuhuTubuh" =>  "",	
									"KeluhanPekerja" =>   "",	
									"ObatYangDiminum" =>  "",		
									"KendalaIsoman" =>   "",	
									"KeluhanKesehatanPekerja" =>  "",	
									"ApakahDalamPerawatan" =>  "",	
									"DemamBatukLainnyaSaatIni" =>   "",
									"KondisiSaatIni" =>  "",	
									"KontakEratDenganPasienCovid" =>   "",
									"KerabatSerumahKeluhanKesehatan" =>    "",
									"KondisiDalamBekerja" =>  ""
	        					];
		           		 	$message = array('data' => $data_return);
		            		return $this->response($message, REST_Controller::HTTP_OK);	
							 
						 }
					 
				 	
			}	
		}
	}
	
	
 public function datadoktor_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[50]');  
		$this->form_validation->set_rules('zone', 'ZONA', 'trim|required|max_length[100]'); 
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
				$get_dataDok = $this->Attendance_model->doktorcheck($this->input->post('zone') );
				 
	        			 if ($get_dataDok->num_rows() > 0) {
				 
					foreach ($get_dataDok->result() as $row) { 
								 
									 $data_return[] = [
	        						"FieldZone" =>  $row->FieldZone,
	        						"NamaDokter" =>  $row->NamaDokter,
	        						"NomorTelepon" =>  $row->NomorTelepon 
	        					];
					}
		           		 	$message = array('data' => $data_return);
		            		return $this->response($message, REST_Controller::HTTP_OK);	
		        		 }
						 else{
							 $get_dataDok2 = $this->Attendance_model->doktornonzonacheck();
				          foreach ($get_dataDok2->result() as $row) { 
								 
									 $data_return[] = [
	        						"FieldZone" =>  $row->FieldZone,
	        						"NamaDokter" =>  $row->NamaDokter,
	        						"NomorTelepon" =>  $row->NomorTelepon 
	        					];
					}
		           		 	$message = array('data' => $data_return);
		            		return $this->response($message, REST_Controller::HTTP_OK);	
							 
						 }
					 
				 	
			}	
		}
	}
	
	
	public function add_kuis3_post()
	{
		
		// XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[100]'); 
		$this->form_validation->set_rules('KonsultasiDokter', 'Sistem Kerja', 'trim|required|max_length[10]'); 
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
									 
							
						$dataCovid = [
							"nopek" => $token_valid->data->EMPLOYEE_NOPEK,
							"KonsultasiDokter" => $this->input->post('KonsultasiDokter')
						];
						
						
					 $absen_approve = $this->Attendance_model->set_data_kuis($token_valid->data->EMPLOYEE_NOPEK,$get_date, $dataCovid);					    
									   
								 
								$message = array('status' => true,
														 'message' => '<b style="font-size:13px;text-transform: uppercase;">Data kuis 3 Berhasil ditambah!</b> ');
										return $this->response($message, REST_Controller::HTTP_OK);
							
							 
							
					 
				 
			}
        }
	}
	
	
	public function add_kuis4_post()
	{
		
		// XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[100]'); 
		$this->form_validation->set_rules('HariKeBerapaIsoman', 'Hari Ke Berapa Isoman', 'trim|required|max_length[20]'); 
		$this->form_validation->set_rules('DimanaIsoman', 'Dimana Isoman', 'trim|max_length[50]');
		$this->form_validation->set_rules('SuhuTubuh', 'Suhu Tubuh', 'trim|max_length[100]');
		$this->form_validation->set_rules('KeluhanPekerja', 'Keluhan Pekerja', 'trim|max_length[1000]');
		$this->form_validation->set_rules('ObatYangDiminum', 'Obat Yang Diminum', 'trim|max_length[1000]');
		$this->form_validation->set_rules('KendalaIsoman', 'Alasan Isolasi Mandiri', 'trim|max_length[10]');
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
									 
							
						$dataCovid = [
							"nopek" => $token_valid->data->EMPLOYEE_NOPEK,
							"HariKeBerapaIsoman" => $this->input->post('HariKeBerapaIsoman'),
							"DimanaIsoman" => $this->input->post('DimanaIsoman') ,
							"SuhuTubuh" => $this->input->post('SuhuTubuh') ,
							"KeluhanPekerja" =>  $this->input->post('KeluhanPekerja'),
							"ObatYangDiminum" =>  $this->input->post('ObatYangDiminum'),
							"KendalaIsoman" =>  $this->input->post('KendalaIsoman')
						];
						
						
					 $absen_approve = $this->Attendance_model->set_data_kuis($token_valid->data->EMPLOYEE_NOPEK,$get_date, $dataCovid);					    
									   
								 
								$message = array('status' => true,
														 'message' => '<b style="font-size:13px;text-transform: uppercase;">Data kuis 4 Berhasil ditambah!</b> ');
										return $this->response($message, REST_Controller::HTTP_OK);
							
							 
							
					 
				 
			}
        }
	}
	
	
	
	
	
public function add_isolasi_post()
	{
		
		// XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]'); 
		$this->form_validation->set_rules('id', 'Id Kuis', 'trim|max_length[1000]');
		$this->form_validation->set_rules('nama', 'Nama Keluarga isolasi', 'trim|max_length[1000]');
		$this->form_validation->set_rules('keluhan', 'Keluhan isolasi', 'trim|required|max_length[1000]');
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
									
									 
							
						$datavaksin = [
							"Id_KuesionerAbsen" => $this->input->post('id'),
							"RelativesName" => $this->input->post('nama'),
							"Note" => $this->input->post('keluhan') ,
							"TypeData" =>"isolasi_mandiri" ,
							"LastUpdatedDate" =>  $get_date
						];
						
						
					 $absen_approve = $this->Attendance_model->set_isolasi($datavaksin);
								    
									  
    				 
								 
								$message = array('status' => true,
														 'message' => '<b style="font-size:13px;text-transform: uppercase;">Data Isolasi Mandiri Keluarga/Kerabat Berhasil ditambah!</b> ');
										return $this->response($message, REST_Controller::HTTP_OK);
							
							 
							
					 
				 
			}
        }
	}
	
	
	
	public function add_kuis5_post()
	{
		
		// XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[100]'); 
		$this->form_validation->set_rules('KerabatSerumahIsoman', 'Kerabat Serumah Isoman', 'trim|required|max_length[20]'); 
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
									 
							
						$dataCovid = [
							"nopek" => $token_valid->data->EMPLOYEE_NOPEK,
							"KerabatSerumahIsoman" => $this->input->post('KerabatSerumahIsoman')
						];
						
						
					 $absen_approve = $this->Attendance_model->set_data_kuis($token_valid->data->EMPLOYEE_NOPEK,$get_date, $dataCovid);					    
									   
								 
								$message = array('status' => true,
														 'message' => '<b style="font-size:13px;text-transform: uppercase;">Data kuis 5 Berhasil ditambah!</b> ');
										return $this->response($message, REST_Controller::HTTP_OK);
							
							 
							
					 
				 
			}
        }
	}
	
	
	
	public function delete_all_insom_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('id', 'Id Absen' ,'trim|required|max_length[1000]');
		$this->form_validation->set_rules('typedata', 'Type Data','trim|required|max_length[1000]' );
        if ($this->form_validation->run() == FALSE){
            // form validation error
            $message = array('status' => false,
             				 'message' => $this->form_validation->error_array());
            return $this->response($message, 400);
        }else{	
        	  
        		 
        		$delete = $this->Attendance_model->delete_all_insom( $this->input->post('id', TRUE),$this->input->post('typedata', TRUE));
        		  
				if ($delete > 0) {
		            $message = array('status' => true,
		             				 'message' => 'Data Isolasi Mandiri berhasil dihapus');
		            return $this->response($message, REST_Controller::HTTP_OK);	
				}else{
		            $message = array('status' => false,
		             				 'message' => 'Data Isolasi Mandiri gagal dihapus');
		            return $this->response($message, REST_Controller::HTTP_OK);	
				}
        	 
        }
	}
	
	
	
	
	
	public function add_kuis6_post()
	{
		
		// XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[100]'); 
		$this->form_validation->set_rules('KeluhanKesehatanPekerja', 'Keluhan Kesehatan Pekerja', 'trim|required|max_length[20]'); 
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
									 
							
						$dataCovid = [
							"nopek" => $token_valid->data->EMPLOYEE_NOPEK,
							"KeluhanKesehatanPekerja" => $this->input->post('KeluhanKesehatanPekerja')
						];
						
						
					 $absen_approve = $this->Attendance_model->set_data_kuis($token_valid->data->EMPLOYEE_NOPEK,$get_date, $dataCovid);					    
									   
								 
								$message = array('status' => true,
														 'message' => '<b style="font-size:13px;text-transform: uppercase;">Data kuis 6 Berhasil ditambah!</b> ');
										return $this->response($message, REST_Controller::HTTP_OK);
							
							 
							
					 
				 
			}
        }
	}
	
	
	
	public function add_kuis7_post()
	{
		
		// XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[100]'); 
		$this->form_validation->set_rules('ApakahDalamPerawatan', 'Apakah Dalam Perawatan', 'trim|required|max_length[10]'); 
		$this->form_validation->set_rules('DemamBatukLainnyaSaatIni', 'Demam Batuk Lainnya Saat Ini', 'trim|max_length[10]');
		$this->form_validation->set_rules('KondisiSaatIni', 'Kondisi Saat Ini', 'trim|max_length[1000]'); 
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
									 
							
						$dataCovid = [
							"nopek" => $token_valid->data->EMPLOYEE_NOPEK,
							"ApakahDalamPerawatan" => $this->input->post('ApakahDalamPerawatan'),
							"DemamBatukLainnyaSaatIni" => $this->input->post('DemamBatukLainnyaSaatIni') ,
							"KondisiSaatIni" => $this->input->post('KondisiSaatIni') 
						];
						
						
					 $absen_approve = $this->Attendance_model->set_data_kuis($token_valid->data->EMPLOYEE_NOPEK,$get_date, $dataCovid);					    
									   
								 
								$message = array('status' => true,
														 'message' => '<b style="font-size:13px;text-transform: uppercase;">Data kuis 7 Berhasil ditambah!</b> ');
										return $this->response($message, REST_Controller::HTTP_OK);
							
							 
							
					 
				 
			}
        }
	}
	
	
	
	public function add_kuis8_post()
	{
		
		// XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[100]'); 
		$this->form_validation->set_rules('KontakEratDenganPasienCovid', 'Kontak Erat Dengan Pasien Covid', 'trim|required|max_length[10]'); 
		$this->form_validation->set_rules('KerabatSerumahKeluhanKesehatan', 'Kerabat Serumah Keluhan Kesehatan', 'trim|max_length[10]');
		$this->form_validation->set_rules('Status', 'Status', 'trim|required|max_length[10]'); 
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
									 
							
						$dataCovid = [
							"nopek" => $token_valid->data->EMPLOYEE_NOPEK,
							"KontakEratDenganPasienCovid" => $this->input->post('KontakEratDenganPasienCovid'),
							"KerabatSerumahKeluhanKesehatan" => $this->input->post('KerabatSerumahKeluhanKesehatan') ,
							"Status" => $this->input->post('Status') 
						];
						
						
					 $absen_approve = $this->Attendance_model->set_data_kuis($token_valid->data->EMPLOYEE_NOPEK,$get_date, $dataCovid);					    
									   
								 
								$message = array('status' => true,
														 'message' => '<b style="font-size:13px;text-transform: uppercase;">Data kuis 8 Berhasil ditambah!</b> ');
										return $this->response($message, REST_Controller::HTTP_OK);
							
							 
							
					 
				 
			}
        }
	}
	
	
	
	public function add_kuis9_post()
	{
		
		// XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[100]'); 
		$this->form_validation->set_rules('KondisiDalamBekerja', 'Kondisi Dalam Bekerja', 'trim|required|max_length[1000]'); 
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
									 
							
						$dataCovid = [
							"nopek" => $token_valid->data->EMPLOYEE_NOPEK,
							"KondisiDalamBekerja" => $this->input->post('KondisiDalamBekerja'),
							"Status" => "1" 
						];
						
						
					 $absen_approve = $this->Attendance_model->set_data_kuis($token_valid->data->EMPLOYEE_NOPEK,$get_date, $dataCovid);					    
									   
								 
								$message = array('status' => true,
														 'message' => '<b style="font-size:13px;text-transform: uppercase;">Terimakasih sudah melengkapi data Kuesioner Absen!</b> ');
										return $this->response($message, REST_Controller::HTTP_OK);
							
							 
							
					 
				 
			}
        }
	}
	
	
	
	
 public function datalokasikerja_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[50]');  
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
				$get_dataLok = $this->Attendance_model->datalokasicheck();
				  
				 
					foreach ($get_dataLok->result() as $row) { 
								 
									 $data_return[] = [
	        						"Name_Location" =>  $row->Name_Location,
	        						"LocId" =>  $row->LocId
	        					];
					}
		           		 	$message = array('data' => $data_return);
		            		return $this->response($message, REST_Controller::HTTP_OK);	
		        		  
						  
					 
				 	
			}	
		}
	}
	
	
	// tambahan
	
 public function dataisolasi_detail_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[50]'); 
		$this->form_validation->set_rules('id', 'Id Absen', 'trim|required|max_length[50]'); 
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
			 
			 
	        		$get_vaksinAll = $this->Attendance_model->isolasicheck($this->input->post('id'));
	        		 
	        			 if ($get_vaksinAll->num_rows() > 0) {
							
	        				foreach ($get_vaksinAll->result() as $row) {
							 
									$data_return[] = [
	        						"Id" =>  $row->Id,
	        						"RelativesName" =>  $row->RelativesName,
	        						"Note" =>  $row->Note,
	        						"TypeData" => $row->TypeData
	        					];
									
								 
	        				}
	        				 
		           		 	$message = array('data' => $data_return);
		            		return $this->response($message, REST_Controller::HTTP_OK);	
		        		 }else{
							  $data_return[] = [
	        						"Id" =>  "",
	        						"RelativesName" =>  "",
	        						"Note" =>   "",
	        						"TypeData" =>  ""
	        					];
		           		 	$message = array('data' => $data_return);
		            		return $this->response($message, REST_Controller::HTTP_OK);	
							 
						 }
					 
				 	
			}	
		}
	}
	
	
	
	
public function add_phonekel_post()
	{
		
		// XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]'); 
		$this->form_validation->set_rules('id', 'Id Kuis', 'trim|max_length[1000]');
		$this->form_validation->set_rules('nama', 'Nama Keluarga ', 'trim|max_length[1000]');
		$this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|max_length[1000]');
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
									
									 
							
						$dataPhone = [
							"Id_KuesionerAbsen" => $this->input->post('id'),
							"RelativesName" => $this->input->post('nama'),
							"PhoneNumber" => $this->input->post('phone') ,
							"TypeData" =>"phone_keluarga" ,
							"LastUpdatedDate" =>  $get_date
						];
						
						
					 $absen_approve = $this->Attendance_model->set_isolasi($dataPhone);
								    
									  
    				 
								 
								$message = array('status' => true,
														 'message' => '<b style="font-size:13px;text-transform: uppercase;">Data Nama dan No. Telepon Keluarga Berhasil ditambah!</b> ');
										return $this->response($message, REST_Controller::HTTP_OK);
							
							 
							
					 
				 
			}
        }
	}
	
	
	
	public function dataphone_detail_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[50]'); 
		$this->form_validation->set_rules('id', 'Id Absen', 'trim|required|max_length[50]'); 
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
			 
			 
	        		$get_vaksinAll = $this->Attendance_model->phonecheck($this->input->post('id'));
	        		 
	        			 if ($get_vaksinAll->num_rows() > 0) {
							
	        				foreach ($get_vaksinAll->result() as $row) {
							 
									$data_return[] = [
	        						"Id" =>  $row->Id,
	        						"RelativesName" =>  $row->RelativesName,
	        						"PhoneNumber" =>  $row->PhoneNumber,
	        						"TypeData" => $row->TypeData
	        					];
									
								 
	        				}
	        				 
		           		 	$message = array('data' => $data_return);
		            		return $this->response($message, REST_Controller::HTTP_OK);	
		        		 }else{
							  $data_return[] = [
	        						"Id" =>  "",
	        						"RelativesName" =>  "",
	        						"PhoneNumber" =>   "",
	        						"TypeData" =>  ""
	        					];
		           		 	$message = array('data' => $data_return);
		            		return $this->response($message, REST_Controller::HTTP_OK);	
							 
						 }
					 
				 	
			}	
		}
	}
	
	
public function add_keluhankel_post()
	{
		
		// XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]'); 
		$this->form_validation->set_rules('id', 'Id Kuis', 'trim|max_length[1000]');
		$this->form_validation->set_rules('nama', 'Nama Keluarga ', 'trim|max_length[1000]');
		$this->form_validation->set_rules('keluhan', 'Keluhan Kesehatan', 'trim|required|max_length[1000]');
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
									
									 
							
						$dataPhone = [
							"Id_KuesionerAbsen" => $this->input->post('id'),
							"RelativesName" => $this->input->post('nama'),
							"Note" => $this->input->post('keluhan') ,
							"TypeData" =>"keluhan_keluarga" ,
							"LastUpdatedDate" =>  $get_date
						];
						
						
					 $absen_approve = $this->Attendance_model->set_isolasi($dataPhone);
								    
									  
    				 
								 
								$message = array('status' => true,
														 'message' => '<b style="font-size:13px;text-transform: uppercase;">Data Nama dan Keluhan kesehatan Keluarga Berhasil ditambah!</b> ');
										return $this->response($message, REST_Controller::HTTP_OK);
							
							 
							
					 
				 
			}
        }
	}
	
	
	
	public function datakeluhankel_detail_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[50]'); 
		$this->form_validation->set_rules('id', 'Id Absen', 'trim|required|max_length[50]'); 
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
			 
			 
	        		$get_vaksinAll = $this->Attendance_model->keluhankelcheck($this->input->post('id'));
	        		 
	        			 if ($get_vaksinAll->num_rows() > 0) {
							
	        				foreach ($get_vaksinAll->result() as $row) {
							 
									$data_return[] = [
	        						"Id" =>  $row->Id,
	        						"RelativesName" =>  $row->RelativesName,
	        						"Note" =>  $row->Note,
	        						"TypeData" => $row->TypeData
	        					];
									
								 
	        				}
	        				 
		           		 	$message = array('data' => $data_return);
		            		return $this->response($message, REST_Controller::HTTP_OK);	
		        		 }else{
							  $data_return[] = [
	        						"Id" =>  "",
	        						"RelativesName" =>  "",
	        						"Note" =>   "",
	        						"TypeData" =>  ""
	        					];
		           		 	$message = array('data' => $data_return);
		            		return $this->response($message, REST_Controller::HTTP_OK);	
							 
						 }
					 
				 	
			}	
		}
	}
	
	
	
		public function delete_all_keluhan_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('id', 'Id Absen' ,'trim|required|max_length[1000]');
		$this->form_validation->set_rules('typedata', 'Type Data','trim|required|max_length[1000]' );
        if ($this->form_validation->run() == FALSE){
            // form validation error
            $message = array('status' => false,
             				 'message' => $this->form_validation->error_array());
            return $this->response($message, 400);
        }else{	
        	  
        		 
        		$delete = $this->Attendance_model->delete_all_insom( $this->input->post('id', TRUE),$this->input->post('typedata', TRUE));
        		  
				if ($delete > 0) {
		            $message = array('status' => true,
		             				 'message' => 'Data Keluhan berhasil dihapus');
		            return $this->response($message, REST_Controller::HTTP_OK);	
				}else{
		            $message = array('status' => false,
		             				 'message' => 'Data Keluhan berhasil dihapus');
		            return $this->response($message, REST_Controller::HTTP_OK);	
				}
        	 
        }
	}
	
	
	
	public function cekbelumabsen_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[50]');
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
			 $get_full_date = date("Y-m-d H:i:s"); 
			 $kemarin = date('Y-m-d', strtotime("-1 day", strtotime(date("Y-m-d"))));
			// echo 'tanggal kemarin '.$kemarin;
	        		$get_absenkemarin = $this->Attendance_model->checkBelumAbsen($token_valid->data->EMPLOYEE_NOPEK,$kemarin);
	        		 
	        			 if ($get_absenkemarin->num_rows() > 0) {
							
	        				foreach ($get_absenkemarin->result() as $row) {
							 
									$data_return[] = [
	        						"Id" =>  $row->Id 
	        					];
									
								 
	        				}
	        				 
		           		 	$message = array('data' => $data_return);
		            		return $this->response($message, REST_Controller::HTTP_OK);	
		        		 }else{
							  $data_return[] = [
	        						"Id" =>  "" 
	        					];
		           		 	$message = array('data' => $data_return);
		            		return $this->response($message, REST_Controller::HTTP_OK);	
							 
						 }
					 
				 	
			}	
		}
	}
	
	
	
	public function cekkuesioner_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[50]');
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
			 $get_full_date = date("Y-m-d H:i:s"); 
			 //$kemarin = date('Y-m-d', strtotime("-1 day", strtotime(date("Y-m-d"))));
			// echo 'tanggal kemarin '.$kemarin;
	        		$get_kelengkapanIsian = $this->Attendance_model->checkKuesioner($token_valid->data->EMPLOYEE_NOPEK,$get_date);
	        		 
	        			 if ($get_kelengkapanIsian->num_rows() > 0) {
							
	        				foreach ($get_kelengkapanIsian->result() as $row) {
							 
									$data_return[] = [
	        						"Id" =>  $row->Id 
	        					];
									
								 
	        				}
	        				 
		           		 	$message = array('data' => $data_return);
		            		return $this->response($message, REST_Controller::HTTP_OK);	
		        		 }else{
							  $data_return[] = [
	        						"Id" =>  "" 
	        					];
		           		 	$message = array('data' => $data_return);
		            		return $this->response($message, REST_Controller::HTTP_OK);	
							 
						 }
					 
				 	
			}	
		}
	}
	
	
	
	
	
	public function cekabsenreject_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('id', 'Id Absen', 'trim|required|max_length[50]');
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
			 $get_full_date = date("Y-m-d H:i:s"); 
			 //$kemarin = date('Y-m-d', strtotime("-1 day", strtotime(date("Y-m-d"))));
			// echo 'tanggal kemarin '.$kemarin;
	        		$get_AbsenReject = $this->Attendance_model->checAbsenReject($this->input->post('id'));
	        		 
	        			 if ($get_AbsenReject->num_rows() > 0) {
							
	        				foreach ($get_AbsenReject->result() as $row) {
							 
									$data_return[] = [
	        						"ID" =>  $row->ID ,
	        						"Jam_absen" =>  $row->Jam_absen ,
	        						"Jam_keluar" =>  $row->Jam_keluar,
	        						"Note" =>  $row->Note,
	        						"Note_approve" =>  $row->Note_approve,
	        						"date_attend" =>  $row->date_attend
	        					];
									
								 
	        				}
	        				 
		           		 	$message = array('data' => $data_return);
		            		return $this->response($message, REST_Controller::HTTP_OK);	
		        		 }else{
							  $data_return[] = [
	        						"Id" => "" ,
	        						"Jam_absen" => "" ,
	        						"Jam_keluar" =>  "" ,
	        						"Note" =>  "" ,
	        						"Note_approve" =>  "" ,
	        						"date_attend" => ""
	        					];
		           		 	$message = array('data' => $data_return);
		            		return $this->response($message, REST_Controller::HTTP_OK);	
							 
						 }
					 
				 	
			}	
		}
	}
	
	
	
	public function edit_absenreject_post()
	{
		
		// XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]'); 
		$this->form_validation->set_rules('id', 'Id Absen', 'trim|max_length[1000]');
		$this->form_validation->set_rules('jammasuk', 'jammasuk', 'trim|max_length[10]');
		$this->form_validation->set_rules('jamkeluar', 'jamkeluar', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('sistemkerja', 'sistemkerja', 'trim|required|max_length[1000]');
		$this->form_validation->set_rules('note', 'note', 'trim|required|max_length[1000]');
		$this->form_validation->set_rules('date_attend', 'date_attend', 'trim|required|max_length[1000]');
		$this->form_validation->set_rules('foto', 'date_attend', 'trim|required|max_length[1000]');
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
									
									 
							
						
						$dataabsenapprove = [
							"Jam_absen" => $this->input->post('jammasuk'),
							"Jam_keluar" => $this->input->post('jamkeluar') ,
							"Note" => $this->input->post('sistemkerja') ,
							"Note_approve" =>  $this->input->post('note') ,
							"Status" => "P"
						];
						
						
						 $dataabsen = [
						 	"time_come" => $this->input->post('jammasuk'),
						 	"time_return" =>  $this->input->post('jamkeluar') ,
						 	"note" => $this->input->post('sistemkerja') ,
						 	"PhotoMasuk" =>  $this->input->post('foto')  
						  ];
						
						
					 $absen_approve = $this->Attendance_model->updateabsenapprove( $this->input->post('id'),  $dataabsenapprove);
					  $absen_update = $this->Attendance_model->updateabsen($token_valid->data->EMPLOYEE_NOPEK, $this->input->post('date_attend'), $dataabsen);
						
						 
								    
									  
    				 
								 
								$message = array('status' => true,
														 'message' => '<b style="font-size:13px;text-transform: uppercase;">Absen Reject Berhasil di Update!</b> ');
										return $this->response($message, REST_Controller::HTTP_OK);
							
							 
							
					 
				 
			}
        }
	}
	
	
	
	
	public function delete_wr_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation 
		$this->form_validation->set_rules('id', 'id', 'trim|required|max_length[1000]');
        if ($this->form_validation->run() == FALSE){
            // form validation error
            $message = array('status' => false,
             				 'message' => $this->form_validation->error_array());
            return $this->response($message, 400);
        }else{	
        	  
        		 
        		$delete = $this->Attendance_model->deletewr( $this->input->post('id', TRUE));
        		  
				if ($delete > 0) {
		            $message = array('status' => true,
		             				 'message' => 'Data Working Report berhasil dihapus');
		            return $this->response($message, REST_Controller::HTTP_OK);	
				}else{
		            $message = array('status' => false,
		             				 'message' => 'Data Working Report gagal dihapus');
		            return $this->response($message, REST_Controller::HTTP_OK);	
				}
        	 
        }
	}
	
	
	
	
	
	public function delete_isolasi_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation 
		$this->form_validation->set_rules('id', 'id', 'trim|required|max_length[1000]');
        if ($this->form_validation->run() == FALSE){
            // form validation error
            $message = array('status' => false,
             				 'message' => $this->form_validation->error_array());
            return $this->response($message, 400);
        }else{	
        	  
        		 
        		$delete = $this->Attendance_model->deleteisolasi( $this->input->post('id', TRUE));
        		  
				if ($delete > 0) {
		            $message = array('status' => true,
		             				 'message' => 'Data Isolasi Mandiri berhasil dihapus');
		            return $this->response($message, REST_Controller::HTTP_OK);	
				}else{
		            $message = array('status' => false,
		             				 'message' => 'Data Isolasi Mandiri gagal dihapus');
		            return $this->response($message, REST_Controller::HTTP_OK);	
				}
        	 
        }
	}
	
	
	
	
	
	public function delete_keluhan_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation 
		$this->form_validation->set_rules('id', 'id', 'trim|required|max_length[1000]');
        if ($this->form_validation->run() == FALSE){
            // form validation error
            $message = array('status' => false,
             				 'message' => $this->form_validation->error_array());
            return $this->response($message, 400);
        }else{	
        	  
        		 
        		$delete = $this->Attendance_model->deletekeluhan( $this->input->post('id', TRUE));
        		  
				if ($delete > 0) {
		            $message = array('status' => true,
		             				 'message' => 'Data Keluhan berhasil dihapus');
		            return $this->response($message, REST_Controller::HTTP_OK);	
				}else{
		            $message = array('status' => false,
		             				 'message' => 'Data  Keluhan gagal dihapus');
		            return $this->response($message, REST_Controller::HTTP_OK);	
				}
        	 
        }
	}
	
	
	
	
	public function delete_phone_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation 
		$this->form_validation->set_rules('id', 'id', 'trim|required|max_length[1000]');
        if ($this->form_validation->run() == FALSE){
            // form validation error
            $message = array('status' => false,
             				 'message' => $this->form_validation->error_array());
            return $this->response($message, 400);
        }else{	
        	  
        		 
        		$delete = $this->Attendance_model->deletephone( $this->input->post('id', TRUE));
        		  
				if ($delete > 0) {
		            $message = array('status' => true,
		             				 'message' => 'Data Phone Number berhasil dihapus');
		            return $this->response($message, REST_Controller::HTTP_OK);	
				}else{
		            $message = array('status' => false,
		             				 'message' => 'Data Phone Number  gagal dihapus');
		            return $this->response($message, REST_Controller::HTTP_OK);	
				}
        	 
        }
	}
	
	
	public function delete_vaksin_post()
	{
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation 
		$this->form_validation->set_rules('id', 'id', 'trim|required|max_length[1000]');
        if ($this->form_validation->run() == FALSE){
            // form validation error
            $message = array('status' => false,
             				 'message' => $this->form_validation->error_array());
            return $this->response($message, 400);
        }else{	
        	  
        		 
        		$delete = $this->Attendance_model->deletevaksin( $this->input->post('id', TRUE));
        		  
				if ($delete > 0) {
		            $message = array('status' => true,
		             				 'message' => 'Data Vaksin berhasil dihapus');
		            return $this->response($message, REST_Controller::HTTP_OK);	
				}else{
		            $message = array('status' => false,
		             				 'message' => 'Data Vaksin gagal dihapus');
		            return $this->response($message, REST_Controller::HTTP_OK);	
				}
        	 
        }
	}
	
	
		public function  fiturkuis_get()
	{ 
       
       
		
		 
		 date_default_timezone_set('Asia/Jakarta');
						$get_full_date = date("Y-m-d H:i:s");  
		 $dtapifit = $this->Attendance_model->getfiturkuis();
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

			
		 												
			  $message = array('dataKUIS' => $data_return );
					return $this->response($message, REST_Controller::HTTP_OK);	
		
	}
	
	public function  fitur_url_aktif_get()
	{ 
       
       
		
		 
		 date_default_timezone_set('Asia/Jakarta');
						$get_full_date = date("Y-m-d H:i:s");  
		 $dtapifit = $this->Attendance_model->getfitururl();
		 if ($dtapifit->num_rows() > 0) {
		 foreach ($dtapifit->result()  as $row) {
			 
			
								 
		 			$data_return[] = [
	        						"FITUR_ACTIVE" =>  $row->FITUR_ACTIVE,
									"GET_FULL_DATE" => $get_full_date,
									"FITUR_KEYVALUE" =>  $row->FITUR_KEYVALUE
	        					];		
								
								}
								 }
								else{
									
										$data_return[] = [
	        						"FITUR_ACTIVE" =>  "",
									"GET_FULL_DATE" => $get_full_date,
									"FITUR_KEYVALUE" => ""
	        					];	
								}

			
		 												
			  $message = array('dataURL' => $data_return );
					return $this->response($message, REST_Controller::HTTP_OK);	
		
	}
	
}





?>