<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class OfficeLocation_model extends CI_Model {	

	protected 	$office_table = 'STA_OfficeLocation';
	protected	$user_table = 'STA_Users';
	/**
		* user Set Office
		* @param: {username,office_name,longtitude,latitude}
	**/
	public function set_office(array $data)
	{
		$sql = "INSERT INTO [dbo].[".$this->office_table."]
				VALUES(  
						'".$data['Id_User']."',
						'".$data['office_name']."',
						'".$data['last_edited']."',
						geography::STGeomFromText(
				        'POINT(".$data['Location'].")',4326));";
		$query = $this->db->query($sql);
		if ($query > 0) {
			return $query;
		}else{
			return FALSE;
		}
	}

	/**
		* user Edit Office
		* @param: {username,office_name,longtitude,latitude}
	**/
	public function edit_office(array $data)
	{
		$this->db->where('Id_User', $data['Id_User']);
		$this->db->delete($this->office_table);
		$set = $this->set_office($data);
		return $set;
	}

	public function get_userData($username)
	{
		$this->db->where('username',$username);
	    $query = $this->db->get($this->user_table);
	    if ($query->num_rows() > 0){
	        return $query;
	    }
	    else{
	        return FALSE;
	    }
	}

	public function username_exists($key)
	{
	    $this->db->where('username',$key);
	    $query = $this->db->get($this->user_table);
	    if ($query->num_rows() > 0){
	        return $query;
	    }
	    else{
	        return FALSE;
	    }
	}

	public function username_existsOL($key)
	{
	    $this->db->where('Id_User',$key);
	    $query = $this->db->get($this->office_table);
	    if ($query->num_rows() > 0){
	        return TRUE;
	    }
	    else{
	        return FALSE;
	    }
	}

	public function total_row_all($order_by, $sort, $search)
	{
			$this->db->select('*, Location.Lat as Lat, Location.Long as Lon');
			$this->db->join($this->user_table, $this->user_table.'.Id = '.$this->office_table.'.Id_user');
			$this->db->order_by($order_by, $sort);
			$this->db->like('username', $search, 'both');
			$this->db->or_like('office_name', $search, 'both');
			$this->db->or_like('Location.Lat', $search, 'both');
			$this->db->or_like('Location.Long', $search, 'both');
			$get_db = $this->db->get($this->office_table);
			return $get_db->num_rows();	
	}

	public function get_all($limit, $offset, $order_by, $sort, $search)
	{
		$this->db->select('*, Location.Lat as Lat, Location.Long as Lon');
		$this->db->join($this->user_table, $this->user_table.'.Id = '.$this->office_table.'.Id_user');
		$this->db->order_by($order_by, $sort);
		$this->db->like('username', $search, 'both');
		$this->db->or_like('office_name', $search, 'both');
		$this->db->or_like('Location.Lat', $search, 'both');
		$this->db->or_like('Location.Long', $search, 'both');
		$get_db = $this->db->get($this->office_table, $limit,$offset);
		if ($get_db->num_rows() > 0) {
			return $get_db;	
		}else{
			return FALSE;
		}
	}

	public function get_personal($Id_User)
	{
		$this->db->select('A.*, B.*, Location.Lat as Lat, Location.Long as Lon');
		$this->db->join($this->user_table.' as B', 'A.Id_User = B.Id', 'inner');
		$this->db->where('A.Id_User', $Id_User);
		$get_db = $this->db->get($this->office_table.' as A');
		if ($get_db->num_rows() > 0) {
			return $get_db;	
		}else{
			return FALSE;
		}
	}

	public function get_default()
	{
		$this->db->select('*, Location.Lat as Lat, Location.Long as Lon');
		$this->db->where('Id_User', 0);
		$get_db = $this->db->get($this->office_table);
		if ($get_db->num_rows() > 0) {
			return $get_db;	
		}else{
			return FALSE;
		}
	}
}
 ?>