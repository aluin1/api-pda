<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/ImplementJwt.php';
use Restserver\Libraries\REST_Controller;
class Users extends REST_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Attendance_model');
        $this->objOfJwt = new ImplementJwt();
        $this->load->library('GetServer');
        header('Content-Type: application/json');
		$_POST = json_decode(file_get_contents("php://input"), true);
	}

	 
	/**
		* User Login API
		* @method : POST
		* @param : [username, password]
		* @url : users/loginLdap
	**/

	

	public function loginLDAP_post()
	{
		// XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
		$_POST = $this->security->xss_clean($_POST);
		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[250]'); 
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');
    	if ($this->form_validation->run() == FALSE)
		{
        	// form validation error
        	$message = array('status' => false,
        	 	'message' => $this->form_validation->error_array());
        	return $this->response($message, 400);
		}
		else
		{
			// login successful 
			
				$inqLdap2 = [
				"username" => $username,
				"password" => $password,
				//"method" => "validate",
				"appname" => "DOA"
			   ];
			
			   $resultLdap2 = $this->User_model->tanyaLdap($inqLdap2);
			   //$get_DataUser = $this->User_model->get_DBSAP($username);
			   $a=$resultLdap2["dataSAP"];
			    $dataLDAP=$resultLdap2["dataSAP"];
			   foreach ($dataLDAP as $cekdata) { 
				    $cekdatauser = $cekdata['EMPLOYEE_NOPEK'] ;
			   }
				date_default_timezone_set('Asia/Jakarta');
					$platform_info = "Operating System : ".$this->getserver->getos()." Browser : ".$this->getserver->getbrowser();
					$get_datetime = date('Y-m-d H:i:s'); 
				foreach ($a as $d) {
					
	  $token_data['id'] = intval($d['EMPLOYEE_NOPEK']) ;
	  // $token_data['id'] = $d['ISCHIEF'] ;
	  // $token_data['USERNAME'] = $username ;
	 $token_data['USERNAME'] = $d['USERNAME'] ;
	  $token_data['EMPLOYEE_NOPEK'] = $d['EMPLOYEE_NOPEK'] ;
	  $token_data['EMPLOYEE_NAMA'] = $d['EMPLOYEE_NAMA'] ;
	  $token_data['EMPLOYEE_POSIDI'] = $d['EMPLOYEE_POSIDI'] ;
	  $token_data['EMPLOYEE_POSTEXT'] = $d['EMPLOYEE_POSTEXT'] ;
	  $token_data['EMPLOYEE_CC'] = $d['EMPLOYEE_CC'] ;
	  $token_data['EMPLOYEE_LAYER'] = $d['EMPLOYEE_LAYER'] ;
	  $token_data['EMPLOYEESUBGROUP'] = $d['EMPLOYEESUBGROUP'] ;
	  $token_data['EMPLOYEE_EMAIL'] = $d['EMPLOYEE_EMAIL'] ;
	  $token_data['GENDER'] = $d['GENDER'] ;
	  $token_data['ISCHIEF'] = $d['ISCHIEF'] ;
	  $token_data['ATASAN_USERNAME'] = $d['ATASAN_USERNAME'] ;
	  $token_data['COSTCENTERNAME'] = $d['COSTCENTERNAME'] ;
	  $token_data['ATASAN_NOPEK'] = $d['ATASAN_NOPEK'] ;
	  $token_data['ATASAN_POSIDI'] = $d['ATASAN_POSIDI'] ;
	  $token_data['ATASAN_EMAIL'] = $d['ATASAN_EMAIL'] ;
	  $token_data['ATASAN_LAYER'] = $d['ATASAN_LAYER'] ;
	  $token_data['status'] = $d['ATASAN_EMPLOYEESUBGROUP'] ;
	  $token_data['time_login'] = $get_datetime;
					$token_data['time'] = time();
}
$modul="Login";
$action="Sukses Login";
$appname="Digital Absensi Pekerja PEPC";
 if($cekdatauser!=""){
$this->User_model->insert_LogUsman($username,$modul, $action, $appname);						
 }	
			  
				 $user_token = $this->authorization_token->GenerateToken($token_data);

					$message = array('dataLogin' => $resultLdap2, 'token'  => $user_token);
					return $this->response($message, REST_Controller::HTTP_OK);	
					
					
					  
				 			
			 
	    }
	}
	 
	 
	 }
?>