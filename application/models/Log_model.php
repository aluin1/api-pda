<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_model extends CI_Model {	

	protected 	$log_table = 'STA_Log';
	protected	$user_table = 'STA_Users';
	protected	$office_table = 'STA_OfficeLocation';

	public function check_radius($radius, $latitude, $longtitude, $Id_User)
	{
		$sql = "
				declare @Longitude float = ".$longtitude.", @Latitude float = ".$latitude.";
				declare @point geography = geography::Point(@Latitude, @Longitude, 4326);
				declare @distance float = ".$radius.";
				select * from [DigitalAttendanceSystem].[dbo].[".$this->office_table."] where @point.STDistance([Location]) <= @distance and Id_User = ".$Id_User.";";
		$query = $this->db->query($sql);
		$error = $this->db->error();
		print_r($error);
		// return $query;
	    if (!empty($query->num_rows() > 0)){
			return TRUE;	
	    }
	    else{
	        return FALSE;
	    }
	}

	public function check_office($Id_User)
	{
		$this->db->select('*');
	    $this->db->where('Id_User', $Id_User);
	    $query = $this->db->get($this->office_table);
	    // return $query;
	    if ($query->num_rows() > 0) {
	    	return TRUE;
	    }else{
	    	return FALSE;
	    }
	}

	public function logging(array $data)
	{
		$sql = "INSERT INTO [dbo].[".$this->log_table."]
				VALUES(  geography::STGeomFromText(
				        'POINT(".$data['Location'].")',4326),
						'".$data['timing']."',
						'".$data['Id_User']."');";
		$exec = $this->db->query($sql);
		if ($exec > 0) {
			return $exec;
		}else{
			return FALSE;
		}
	}

	public function total_row_all($from, $to, $order_by, $sort, $search)
	{
		if ($from != null && $to != null) {
			$this->db->select('A.*, B.*');
			$this->db->join($this->user_table.' as B', 'A.Id_user = B.Id', 'inner');
			$this->db->group_start()
							->select("Location.Lat as Lat, Location.Long as Lon")
				                ->where('A.timing >=', $from)
				                ->where('A.timing <=', $to)
			                ->group_start()
				                ->or_like('B.username', $search, 'both')
				                ->or_like('B.nip', strval($search), 'both')
				                ->or_like('B.full_name', $search, 'both')
				                ->or_like('B.email', $search, 'both')
								->or_like('A.timing', $search, 'both')
								->or_like('Location.Lat', $search, 'both')
								->or_like('Location.Lat', $search, 'both')
							->group_end()
	                ->group_end();
			$this->db->order_by($order_by, $sort);
			$get_db = $this->db->get($this->log_table.' as A');
		}else{
			$this->db->select('*, Location.Lat as Lat, Location.Long as Lon');
			$this->db->join($this->user_table, $this->user_table.'.Id = '.$this->log_table.'.Id_user');
			$this->db->order_by($order_by, $sort);
			$this->db->like('username', $search, 'both');
			$this->db->or_like('nip', strval($search), 'both');
			$this->db->or_like('full_name', $search, 'both');
			$this->db->or_like('email', $search, 'both');
			$this->db->or_like('timing', $search, 'both');
			$this->db->or_like('Location.Lat', $search, 'both');
			$this->db->or_like('Location.Long', $search, 'both');
			$get_db = $this->db->get($this->log_table);
		}
		$error = $this->db->error();
		print_r($error);
		die;
		return $get_db->num_rows();	
	}

	public function get_all($from, $to, $limit, $offset, $order_by, $sort, $search)
	{
		if ($from != null && $to != null) {
			$this->db->select('A.*, B.*,' .$this->log_table.'.Id as Log');
			$this->db->join($this->user_table.' as B', 'A.Id_user = B.Id', 'inner');
			$this->db->group_start()
							->select("Location.Lat as Lat, Location.Long as Lon")
				                ->where('A.timing >=', $from)
				                ->where('A.timing <=', $to)
			                ->group_start()
				                ->or_like('B.username', $search, 'both')
				                ->or_like('B.nip', strval($search), 'both')
				                ->or_like('B.full_name', $search, 'both')
				                ->or_like('B.email', $search, 'both')
								->or_like('A.timing', $search, 'both')
								->or_like('Location.Lat', $search, 'both')
								->or_like('Location.Long', $search, 'both')
							->group_end()
	                ->group_end();
			$this->db->order_by($order_by, $sort);
			$get_db = $this->db->get($this->log_table.' as A', $limit,$offset);
		}else{
			$this->db->select('*, Location.Lat as Lat, Location.Long as Lon,' .$this->log_table.'.Id as Log');
			$this->db->join($this->user_table, $this->user_table.'.Id = '.$this->log_table.'.Id_user');
			$this->db->order_by($order_by, $sort);
			$this->db->like('username', $search, 'both');
			$this->db->like('nip', strval($search), 'both');
			$this->db->or_like('full_name', $search, 'both');
			$this->db->or_like('email', $search, 'both');
			$this->db->or_like('timing', $search, 'both');
			$this->db->or_like('Location.Lat', $search, 'both');
			$this->db->or_like('Location.Long', $search, 'both');
			$get_db = $this->db->get($this->log_table, $limit,$offset);
		}

		// return $get_db;
		// var_dump($get_db);
		if ($get_db->num_rows() > 0) {
			return $get_db;	
		}else{
			return FALSE;
		}
	}

	public function total_row_personal($Id_User, $from, $to, $order_by, $sort, $search)
	{
		$this->db->select('A.*, B.*');
		$this->db->join($this->user_table.' as B', 'A.Id_user = B.Id', 'inner');
		$this->db->group_start()
						->select("Location.Lat as Lat, Location.Long as Lon")
			                ->where('A.Id_user', $Id_User)
			                ->where('A.timing >=', $from)
			                ->where('A.timing <=', $to)
		                ->group_start()
			                ->or_like('B.username', $search, 'both')
			                ->or_like('B.nip', strval($search), 'both')
			                ->or_like('B.full_name', $search, 'both')
			                ->or_like('B.email', $search, 'both')
							->or_like('A.timing', $search, 'both')
							->or_like('Location.Lat', $search, 'both')
							->or_like('Location.Long', $search, 'both')
						->group_end()
                ->group_end();
		$this->db->order_by($order_by, $sort);
		$get_db = $this->db->get($this->log_table.' as A');
		return $get_db->num_rows();	
	}

	public function get_personal($Id_User, $from, $to, $limit, $offset, $order_by, $sort, $search)
	{
		$this->db->select('A.*, B.*');
		$this->db->join($this->user_table.' as B', 'A.Id_user = B.Id', 'inner');
		$this->db->group_start()
						->select("Location.Lat as Lat, Location.Long as Lon")
		                	->where('A.Id_user', $Id_User)
			                ->where('timing >=', $from)
			                ->where('timing <=', $to)
		                ->group_start()
			                ->or_like('B.username', $search, 'both')
			                ->or_like('B.nip', strval($search), 'both')
							->or_like('A.timing', $search, 'both')
							->or_like('B.full_name', $search, 'both')
							->or_like('B.email', $search, 'both')
							->or_like('Location.Lat', $search, 'both')
							->or_like('Location.Long', $search, 'both')
						->group_end()
                ->group_end();
		$this->db->order_by($order_by, $sort);
		$get_db = $this->db->get($this->log_table.' as A', $limit,$offset);

		// return $get_db;
		// var_dump($get_db);
		if ($get_db->num_rows() > 0) {
			return $get_db;	
		}else{
			return FALSE;
		}
	}
	
	public function username_exists($key)
	{
		$this->db->select('*');
	    $this->db->where('Id', $key);
	    $query = $this->db->get($this->user_table);
	    // return $query;
	    if ($query->num_rows() > 0){
	        return TRUE;
	    }
	    else{
	        return FALSE;
	    }
	}

	public function delete($Id)
	{
		$this->db->where('Id', $Id);
		$query = $this->db->delete($this->log_table);
		return $query;
	}

}
 ?>