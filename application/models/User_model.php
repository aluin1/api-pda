<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {	

	protected 	$users_table = 'STA_Users';
	protected 	$fungsi_table = 'MS_FUNGSI';
	protected 	$attend_table = 'STA_UsersAttendance';
	
	/**
		* LDAP
		* @param: {username,password]}
	**/
	public function tanyaLdap($param)
	{
		$link_api ="https://apps.pertamina.com/api/login/Users/loginLDAP" ;
		$param_set = json_encode($param);
		//$link = curl_init(LINK_API_LDAP."/Auth/login");
		$link = curl_init($link_api);
		curl_setopt($link, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($link, CURLOPT_POSTFIELDS, $param_set);
		curl_setopt($link, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($link, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
		));
		$contents = curl_exec($link);
		$result = json_decode($contents, true);
		
		return $result;
	}
	
	
	public function get_DBSAP($username)
	{	
		$sql = "SELECT * FROM DB_SAP.dbo.VW_EMPLOYEE_DAN_ATASAN where USERNAME = '".$username."'";
		
		$get_db = $this->db->query($sql);
		if ($get_db->num_rows() > 0) {
			return $get_db;	
		}else{
			return FALSE;
		}
	}

	public function get_menu($Id_User, $App_Name)
	{		
		$sql = "EXEC DB_USMAN.dbo.SP_ListMenu @function = '1', @UserName = '".$Id_User."', @AppName = '".$App_Name."'";
		
		$get_db = $this->db->query($sql);
		if ($get_db->num_rows() > 0) {
			return $get_db;	
		}else{
			return FALSE;
		}
	}

	public function get_UserInRoleGroup($Id_User, $App_Name)
	{		
		$sql = "EXEC DB_USMAN.dbo.SP_RoleGroup @function = '2', @UserName = '".$Id_User."', @AppName = '".$App_Name."'";
		
		$get_db = $this->db->query($sql);
		if ($get_db->num_rows() > 0) {
			return $get_db;	
		}else{
			return FALSE;
		}
	}

	public function get_UserInRole($Id_User, $App_Name)
	{		
		$sql = "EXEC DB_USMAN.dbo.SP_Role @function = '2', @UserName = '".$Id_User."', @AppName = '".$App_Name."'";
		
		$get_db = $this->db->query($sql);
		if ($get_db->num_rows() > 0) {
			return $get_db;	
		}else{
			return FALSE;
		}
	}

	public function get_Parameter($Id_User, $App_Name)
	{		
		$sql = "EXEC DB_USMAN.dbo.SP_Parameter @function = '1', @UserName = '".$Id_User."', @AppName = '".$App_Name."'";
		
		$get_db = $this->db->query($sql);
		if ($get_db->num_rows() > 0) {
			return $get_db;	
		}else{
			return FALSE;
		}
	}


	/**
		* user Registration
		* @param: {username,password,role[admin,super_admin,user]}
	**/
	public function register(array $data)
	{
		$this->db->insert($this->users_table, $data);
		return $this->db->insert_id();
	}

	/**
		* user Login
		* @param: {username,password]}
	**/
	public function login($username, $password)
	{
		$this->db->where('username',$username);
		$this->db->where('password',md5($password));
		$get_db = $this->db->get($this->users_table);
		// var_dump($get_db);die();
		if ($get_db->num_rows() >= 1) {
			return $get_db->row();
			//password validation has been handled with LDAP
			$user_pass = $get_db->row('password');
			if (md5($password) === $user_pass) {
				return $get_db->row();
			}
			return FALSE;
		}else{
			return FALSE;
		}
	}
	
	/**
		* user Login
		* @param: {username,password]}
	**/
	public function checkRole($username,$password)
	{
		$this->db->where('username',$username);
		$this->db->where('password',md5($password));
		$get_db = $this->db->get($this->users_table);
		// var_dump($get_db);die();
		if ($get_db->num_rows() >= 1) {	
			return $get_db->row();
			//password validation has been handled with LDAP
			/*$user_pass = $get_db->row('password');
			if (md5($password) === $user_pass) {
				return $get_db->row();
			}
			return FALSE;*/
		}else{
			return FALSE;
		}
	}

	/**	
		* user update login
		* @param: {username,token,last_login]}
	**/
	public function update_login($username, $token, $last_login, $platform)
	{
		$data_update = [
			'token' => $token,
			'last_login' => $last_login,
			'platform' => $platform
		];
		// return $data_update;
		$this->db->where('username', $username);
		$updating_data = $this->db->update($this->users_table, $data_update);
		// return var_dump($updating_data);
		if ($updating_data > 0) {
			// return $data_update;
			return TRUE;
		}else{
			return FALSE;
		}
	}


	/**	
		* user update login
		* @param: {username,token,last_login]}
	**/
	public function update_user(array $user_data, $username)
	{
		$this->db->where('username', $username);
		$updating_data = $this->db->update($this->users_table, $user_data);
		if ($updating_data > 0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function get_detail($Id_User, $date)
	{
		$this->db->select('*');
		$this->db->where('Id', $Id_User);
		$get_db = $this->db->get($this->users_table);
		if ($get_db->num_rows() > 0) {
			return $get_db;	
		}else{
			return FALSE;
		}
	}

	public function get_userData($username)
	{	
		$this->db->select('*');
		$this->db->where('username', $username);
		$query = $this->db->get($this->users_table);
		if ($query->num_rows() > 0) {
			return $query;
		}else{
			return FALSE;
		}
	}

	public function delete($Id)
	{
		$this->db->where('Id', $Id);
		$query = $this->db->delete($this->users_table);
		return $query;
	}

	public function total_row_all($order_by, $sort, $search)
	{
		$this->db->select('*');
		$this->db->order_by($order_by, $sort);
		$this->db->like('username', $search, 'both');
		$this->db->or_like('nip', strval($search), 'both');
		$this->db->or_like('full_name', $search, 'both');
		$this->db->or_like('nohp', $search, 'both');
		$this->db->or_like('email', $search, 'both');
		$this->db->or_like('role', $search, 'both');
		$this->db->or_like('title', $search, 'both');
		$this->db->or_like('status', $search, 'both');
		$this->db->or_like('created_at', $search, 'both');
		$this->db->or_like('last_login', $search, 'both');
		$query = $this->db->get($this->users_table);
		return $query->num_rows();	
	}

	public function get_all($limit, $offset, $order_by, $sort, $search)
	{
		$this->db->select('*');
		$this->db->order_by($order_by, $sort);
		$this->db->like('username', $search, 'both');
		$this->db->or_like('nip', strval($search), 'both');
		$this->db->or_like('full_name', $search, 'both');
		$this->db->or_like('nohp', $search, 'both');
		$this->db->or_like('email', $search, 'both');
		$this->db->or_like('role', $search, 'both');
		$this->db->or_like('title', $search, 'both');
		$this->db->or_like('status', $search, 'both');
		$this->db->or_like('created_at', $search, 'both');
		$this->db->or_like('last_login', $search, 'both');
		$get_db = $this->db->get($this->users_table, $limit,$offset);
		if ($get_db->num_rows() > 0) {
			return $get_db;	
		}else{
			return FALSE;
		}
	}

	public function alist()
	{
		$this->db->select('*');
		$this->db->order_by('full_name','ASC');
		$get_db = $this->db->get($this->users_table);
		if ($get_db->num_rows() > 0) {
			return $get_db;
		}else{
			return FALSE;
		}
	}
	
	public function flist()
	{
		$this->db->select('*');
		$this->db->order_by('CC','ASC');
		$get_db = $this->db->get($this->fungsi_table);
		if ($get_db->num_rows() > 0) {
			return $get_db;
		}else{
			return FALSE;
		}
	}

	public function get_profile($username)
	{
		$this->db->select('*');
		$this->db->where('username', $username);
		$get_db = $this->db->get($this->users_table);
		if ($get_db->num_rows() > 0) {
			return $get_db;	
		}else{
			return FALSE;
		}
	}
	
	
	public function insert_LogUsman($Id_User, $Modul, $Action, $AppName)
	{		
		$sql = "EXEC DB_USMAN.dbo.SP_Log @function = '1', @UserName = '".$Id_User."', @Modul = '".$Modul."', @Action = '".$Action."', @AppName = '".$AppName."'";
		
		$get_db = $this->db->query($sql);
		if ($get_db->num_rows() > 0) {
			return $get_db;	
		}else{
			return FALSE;
		}
	} 
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
 ?>