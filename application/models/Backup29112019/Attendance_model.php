<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance_model extends CI_Model {	

	protected 	$attend_table = 'STA_UsersAttendance';
	protected	$user_table = 'STA_Users';
	protected   $leavetype_table = 'MS_LEAVETYPE';
	protected   $approval_table = 'STA_ApprovalAbsen';
	/**
		* user attendance in
		* @param: {username,password,role[admin,super_admin,user]}
	**/
	public function set_attend(array $data)
	{
		$this->db->insert($this->attend_table, $data);
		return $this->db->insert_id();
	}

	public function update_attend($Id, $date, $time, $field)
	{
		$this->db->set($field, $time);
		$this->db->where('Id_User', $Id);
		$this->db->where('date_attend', $date);
		$updating_data = $this->db->update($this->attend_table);
		// return var_dump($updating_data);
		if ($updating_data > 0) {
			// return $data_update;
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function set_leave(array $data)
	{
		$this->db->insert($this->approval_table, $data);
		return $this->db->insert_id();
	}

	public function get_leavetype()
	{
		$this->db->select("*");
		$this->db->from($this->leavetype_table);
		$query = $this->db->get();
		return $query;		
	}

	public function total_row_leave()
	{
		$this->db->select('*');
		$this->db->from($this->leavetype_table);
		$query = $this->db->get();
		return $query->num_rows();	
	}

	public function update_note($Id_User, $date, $note)
	{
		$this->db->set('note', $note);
		$this->db->where('Id_User', $Id_User);
		$this->db->where('date_attend', $date);
		$updating_data = $this->db->update($this->attend_table);
		if ($updating_data > 0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function update_flag($Id_User, $date, $flag)
	{
		
		$this->db->set('flag', $flag);
		$this->db->where('Id_User', $Id_User);
		$this->db->where('date_attend', $date);
		$updating_data = $this->db->update($this->attend_table);
		return $updating_data;
	}
	
	
	function getDistance( $latitude1, $longitude1, $latitude2, $longitude2 ) {  
		$earth_radius = 6371;

		$dLat = deg2rad( $latitude2 - $latitude1 );  
		$dLon = deg2rad( $longitude2 - $longitude1 );  

		$a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2) * sin($dLon/2);  
		$c = 2 * asin(sqrt($a));  
		$d = $earth_radius * $c;  

		return $d;  
	}

	public function pendingapprovalattendcheck($Id, $date)
	{
		$this->db->select("*");
		$this->db->from('STA_ApprovalAbsen');
		$this->db->where('Id_User', $Id);
		$this->db->where('mark', "manual attendance");
		$this->db->where('date_attend=', $date);
		$query = $this->db->get();
		return $query;
	}

	public function attendcheck($Id, $date)
	{
		$this->db->select("*");
		$this->db->from($this->attend_table);
		$this->db->where('Id_User', $Id);
		$this->db->where('mark', "manual attendance");
		$this->db->where('date_attend=', $date);
		$query = $this->db->get();
		return $query;
		/*
		$sql = "
			select *
			from ".$this->attend_table."
			where Id_User = '".$Id."' AND mark IN ('manual attendance','come') AND date_attend=".$date;
		$query = $this->db->get($sql);
		return $query;*/
		
	}
	
	public function reqapprovalcheck($Id, $date, $Tipe)
	{
		$this->db->select("*");
		$this->db->from('STA_ApprovalAbsen');
		$this->db->where('Id_User', $Id);
		$this->db->where('date_attend=', $date);
		$this->db->where('Tipe=', $Tipe);
		$query = $this->db->get();
		return $query;
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

	public function total_row_personal($Id_User, $from, $to, $order_by, $sort, $search)
	{
		$this->db->select('A.*, B.*');
		$this->db->join($this->user_table.' as B', 'A.Id_User = B.Id', 'inner');
		$this->db->group_start()
		                ->where('A.Id_User', $Id_User)
		                ->where('A.date_attend >=', $from)
		                ->where('A.date_attend <', $to)
		                ->group_start()
			                ->or_like('B.username', $search, 'both')
			                ->or_like('B.nip', strval($search), 'both')
							->or_like('A.date_attend', $search, 'both')
							->or_like('B.full_name', $search, 'both')
							->or_like('B.email', $search, 'both')
							->or_like('A.time_come', $search, 'both')
							->or_like('A.time_return', $search, 'both')
							->or_like('A.time_end_of_break', $search, 'both')
						->group_end()
                ->group_end();
		$this->db->order_by($order_by, $sort);
		$query = $this->db->get($this->attend_table.' as A');
		return $query->num_rows();
	}

	public function total_row_all($order_by, $sort, $search)
	{
		$this->db->select('*');
		$this->db->join($this->user_table, $this->user_table.'.Id = '.$this->attend_table.'.Id_User');
		$this->db->order_by($order_by, $sort);
		$this->db->like('username', $search, 'both');
		$this->db->or_like('nip', strval($search), 'both');
		$this->db->or_like('full_name', $search, 'both');
		$this->db->or_like('email', $search, 'both');
		$this->db->or_like('date_attend', $search, 'both');
		$this->db->or_like('time_come', $search, 'both');
		$this->db->or_like('time_return', $search, 'both');
		$this->db->or_like('time_break', $search, 'both');
		$this->db->or_like('time_end_of_break', $search, 'both');
		$query = $this->db->get($this->attend_table);
		return $query->num_rows();	
	}

	public function get_all($limit, $offset, $order_by, $sort, $search)
	{
		$this->db->select('*, '.$this->attend_table.'.Id as Id_Attend');
		$this->db->join($this->user_table, $this->user_table.'.Id = '.$this->attend_table.'.Id_User');
		$this->db->order_by($order_by, $sort);
		$this->db->like('username', $search, 'both');
		$this->db->or_like('nip', strval($search), 'both');
		$this->db->or_like('full_name', $search, 'both');
		$this->db->or_like('email', $search, 'both');
		$this->db->or_like('date_attend', $search, 'both');
		$this->db->or_like('time_come', $search, 'both');
		$this->db->or_like('time_return', $search, 'both');
		$this->db->or_like('time_break', $search, 'both');
		$this->db->or_like('time_end_of_break', $search, 'both');
		$this->db->or_like('note', $search, 'both');
		$this->db->or_like('mark', $search, 'both');
		$this->db->or_like('idLeave', $search, 'both');
		$this->db->or_like('from', $search, 'both');
		$this->db->or_like('to', $search, 'both');
		$get_db = $this->db->get($this->attend_table, $limit,$offset);
		// return $get_db;
		// var_dump($get_db);die();
		if ($get_db->num_rows() > 0) {
			return $get_db;	
		}else{
			return FALSE;
		}
	}
	
	
	public function get_atasan($Id_User)
	{
		//$query = "select PJ.POS_ID as POS_ID_SUPERIOR, PJ.Nopek as PERNR from STA_Users A left join STA_PJS PJ on A.nip = PJ.Nopek where A.username = '".$Id_User."'";
		/*$query = "select POS_ID_SUPERIOR, PERNR from View_ApprovalPJS where username = '".$Id_User."' and isActive=1";
		if($query->num_rows() > 0)
		{
			$sql = $query;
		}
		else
		{
			$sql = "
			select RF.POS_ID_SUPERIOR , RF.PERNR
			from STA_Users A 
			left join MS_RF_SUPERIOR RF on A.nip = RF.PERNR
			where A.username = '".$Id_User."'
			";
		}*/
		$sql = "EXEC SP_Pjs @function = '6', @username = '".$Id_User."'";
		
		$get_db = $this->db->query($sql);
		if ($get_db->num_rows() > 0) {
			return $get_db;	
		}else{
			return FALSE;
		}
	}
	
	public function get_data_approval($limit, $offset, $order_by, $sort, $search, $username)
	{
		$sql =  "SELECT A.*, B.POS_ID, U.* ";
		$sql .= "FROM STA_ApprovalAbsen A ";
		$sql .= "INNER JOIN ( ";
		$sql .= "SELECT S.POS_ID ";
		$sql .= " FROM ";
		$sql .= "STA_Users A LEFT JOIN ";
		$sql .= " [DB_DigitalAttendanceSystem].[dbo].[MS_IT_PERSONAL_DATA] P ON A.nip = P.PERNR LEFT JOIN ";
		$sql .= " [MS_RF_SUPERIOR] S on P.ASSIGNMENT_NUMBER = S.PERNR ";
		$sql .= " where A.username = '".$username."' ";
		$sql .= " ) B ON A.POS_ID = B.POS_ID ";
		$sql .= " INNER JOIN STA_Users U ON A.Id_user = U.Id ";
		$sql .= " WHERE A.Status = 'P' AND (A.Tipe like '%".$search."%' OR A.date_attend like '%".$search."%')";
		
		/*
		$sql = "select * from STA_ApprovalAbsen A left join STA_Users U on A.Id_user = U.Id where A.Status = 'P' AND (A.Tipe like '%".$search."%' OR A.date_attend like '%".$search."%') AND A.POS_ID = '".$pos_id."'";
		*/
		$get_db = $this->db->query($sql);
		// return $get_db;
		
		if ($get_db->num_rows() > 0) {
			return $get_db;	
		}else{
			return FALSE;
		}
	}
	
	public function get_data_approval_clicked($id)
	{
		$this->db->select('* ');
		$this->db->join($this->user_table, $this->user_table.'.Id = STA_ApprovalAbsen.Id_user');
		$this->db->where("STA_ApprovalAbsen.ID", $id);
		$get_db = $this->db->get('STA_ApprovalAbsen');
		// return $get_db;
		
		if ($get_db->num_rows() > 0) {
			return $get_db;	
		}else{
			return FALSE;
		}
	}
	
	public function set_minta_approval(array $data)
	{
		$this->db->insert('STA_ApprovalAbsen', $data);
		$error = $this->db->error();
		//print_r($error);
					
		return $this->db->insert_id();
	}

	public function get_personal($Id_User, $from, $to, $limit, $offset, $order_by, $sort, $search)
	{
		$this->db->select('A.*, B.*');
		$this->db->join($this->user_table.' as B',  'A.Id_User = B.Id', 'inner');
		$this->db->group_start()
		                ->where('A.Id_User', $Id_User)
		                ->where('A.date_attend >=', $from)
						->where('A.date_attend <=', $to)
						->where('idLeave', NULL)
		                ->group_start()
			                ->or_like('B.username', $search, 'both') 
			                ->or_like('B.nip', strval($search), 'both')
							->or_like('B.full_name', $search, 'both')
							->or_like('B.email', $search, 'both')
							->or_like('A.date_attend', $search, 'both')
							->or_like('A.time_come', $search, 'both')
							->or_like('A.time_return', $search, 'both')
							->or_like('A.time_end_of_break', $search, 'both')
							->or_like('A.note', $search, 'both')
							->or_like('A.mark', $search, 'both')
							->or_like('A.idLeave', $search, 'both')
						->group_end()
                ->group_end();
		$this->db->order_by($order_by, $sort);
		$get_db = $this->db->get($this->attend_table.' as A', $limit,$offset);
		// return $get_db;
		// var_dump($get_db);die();
		if ($get_db->num_rows() > 0) {
			return $get_db;	
		}else{
			return FALSE;
		}
	}

	public function get_data_export($Id_User, $jam_masuk, $jam_pulang, $from, $to)
	{
		$sql = "
			SELECT * from dbo.whereId('".$Id_User."','".$jam_masuk."', '".$jam_pulang."', '".$from."', '".$to."');
			";
			//echo "Query : ".$sql;
			//die;
		$get_db = $this->db->query($sql);
		if ($get_db->num_rows() > 0) {
			return $get_db;	
		}else{
			return FALSE;
		}
	}

	public function delete($Id)
	{
		$this->db->where('Id', $Id);
		$query = $this->db->delete($this->attend_table);
		return $query;
	}
	
	public function approve($IdTemp, $action, $person)
	{
		//testtt
		$get_time = date('Y-m-d h:i:s');
		$this->db->set('Status', $action);
		$this->db->set('date_action_manager', $get_time);
		$this->db->set('approve_by', $person);
		$this->db->where('ID', $IdTemp);
		$updating_data = $this->db->update('STA_ApprovalAbsen');
		
		if ($updating_data > 0) {
			if($action == "A"){
				$select = $this->db->select('Id_user, date_attend, Note, Jam_absen, Tipe, Location, idLeave, from, to')
				->where('ID', $IdTemp)->get('STA_ApprovalAbsen');
				if($select->num_rows())
				{	
					foreach ($select->result() as $row) {
						$data_absensi[] = [
							"Id_User" => $row->Id_user,
							"date_attend" => $row->date_attend,
							"note" => $row->Note,
							"time_come" => $row->Jam_absen,
							"mark" => $row->Tipe,
							"Location" => $row->Location,
							"idLeave" => $row->idLeave,
							"from" => $row->from,
							"to" => $row->to
						];
					}
					
					$this->db->insert($this->attend_table, $data_absensi[0]);
					$error = $this->db->error();
					if (isset($error['message'])) {
						if ($error['code'] != "0000") {
							return false;
						} else {
							return true;	
						}
						
					}
					
					return true;
					/*if($this->db->insert_id() > 0){
						return true;
					} else {
						return false;
					}*/
				}
			} else if($action == "R"){
				//do nothing
				return true;
			}
			
		}else{
			return FALSE;
		}
	}
}
 ?>