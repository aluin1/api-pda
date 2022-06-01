<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance_model extends CI_Model {	

	protected 	$attend_table = 'STA_UsersAttendance';
	protected 	$wr_table = 'STA_WorkingReport';
	protected	$user_table = 'STA_Users';
	protected   $leavetype_table = 'MS_LEAVETYPE';
	protected   $approval_table = 'STA_ApprovalAbsen';
	protected	$ms_fitur = 'MS_FITUR'; 
	protected	$ms_info = 'STA_Notification'; 
	protected 	$datatambahan_table = 'STA_AdditionalInfo';
	protected 	$wr_vaksin = 'STA_VaccineInfo';
	protected 	$datakuis_table = 'STA_KuesionerAbsen';
	protected 	$ms_companydoctor = 'MS_CompanyDoctor';
	protected 	$sta_relative = 'STA_RelativesInfo';
	protected 	$MS_Location = 'MS_Location';
	
	
	/**
		* user attendance in
		* @param: {username,password,role[admin,super_admin,user]}
	**/
	
	
	public function GeoCoding($param,$apikey)
	{
		$link_api ="https://maps.googleapis.com/maps/api/geocode/json?latlng=".$param."&key=".$apikey."";
		$link = curl_init($link_api);
		curl_setopt($link, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($link, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($link, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
		));
		$contents = curl_exec($link);
		$result = json_decode($contents, true);
		
		return $result;
	}
	
	
	
	public function set_attend(array $data)
	{
		$this->db->insert($this->attend_table, $data);
		return $this->db->insert_id();
	}
	
		public function set_attend_wr(array $data)
	{
		$this->db->insert($this->wr_table, $data);
		return $this->db->insert_id();
	}
	
	public function set_data_tambahan($nopek, array $data)
	{
		//$this->db->insert($this->datatambahan_table, $data);
		//return $this->db->insert_id();
		
		$this->db->where('nopek',$nopek);
		$q = $this->db->get($this->datatambahan_table);

		if ( $q->num_rows() > 0 ) 
		{
		$this->db->where('nopek',$nopek);
		$this->db->update($this->datatambahan_table,$data);
		} else {
		$this->db->set('nopek', $nopek);
		$this->db->insert($this->datatambahan_table,$data);
		}
	}
	
	
 
	
public function set_attend_log(array $data)
	{
		$this->db->insert('STA_Log', $data);
		return $this->db->insert_id();
	}
	
	public function set_attend_logcheck($Id, $timing)
	{
		$this->db->select("*");
		$this->db->from('STA_Log');
		$this->db->where('Id_user', $Id); 
		$this->db->where('timing', $timing);
		$this->db->where('activity', 'out');
		$query = $this->db->get();
		return $query;
		/*
		$sql = "
			select *
			from ".$this->attend_table."
			where nopek = '".$Id."' AND mark IN ('manual attendance','come') AND date_attend=".$date;
		$query = $this->db->get($sql);
		return $query;*/
		
	}
	public function update_attend($Id, $date, $time, $field,$locationpeg,$note)
	{
		 
		$this->db->set('note', $note);
		$this->db->set('Location', $locationpeg);
		$this->db->set($field, $time);
		$this->db->where('nopek', $Id);
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
	
	
	public function update_foto($Id, $date, $foto)
	{
		 
		$this->db->set('PhotoKeluar', $foto);  
		$this->db->where('nopek', $Id);
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
	
	public function update_attend_pulang($Id, $date, $time)
	{
		   
		$this->db->set('time_return', $time);
		$this->db->where('nopek', $Id);
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
	public function update_attend_pulang_approval($Id, $date, $time)
	{
		   
		$this->db->set('Jam_keluar', $time);
		$this->db->where('nopek', $Id);
		$this->db->where('date_attend', $date);
		$updating_data = $this->db->update($this->approval_table);
		// return var_dump($updating_data);
		if ($updating_data > 0) {
			// return $data_update;
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function update_approve($Id, $date, $time,$note, $locationpeg)
	{
		$this->db->set('Location', $locationpeg);
		$this->db->set('Jam_keluar', $time);
		$this->db->set('Note', $note);
		$this->db->where('nopek', $Id);
		$this->db->where('date_attend', $date);
		$updating_data = $this->db->update($this->approval_table);
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

	public function update_note($nopek, $date, $note)
	{
		$this->db->set('note', $note);
		$this->db->where('nopek', $nopek);
		$this->db->where('date_attend', $date);
		$updating_data = $this->db->update($this->attend_table);
		if ($updating_data > 0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function update_note2($nopek, $date, $note, $get_time, $field_cond)
	{
		$this->db->set('note', $note);
		$this->db->set($field_cond, $get_time);
		$this->db->where('nopek', $nopek);
		$this->db->where('date_attend', $date);
		$updating_data = $this->db->update($this->attend_table);
		if ($updating_data > 0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function update_flag($nopek, $date, $flag)
	{
		
		$this->db->set('flag', $flag);
		$this->db->where('nopek', $nopek);
		$this->db->where('date_attend', $date);
		$updating_data = $this->db->update($this->attend_table);
		return $updating_data;
	}
	
	public function update_statwr($nopek, $date)
	{
		
		$this->db->set('StatusWR', 1);
		$this->db->where('nopek', $nopek);
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
		$this->db->where('nopek', $Id);
		$this->db->where('mark', "manual attendance");
		$this->db->where('date_attend=', $date);
		$query = $this->db->get();
		return $query;
	}

	public function attendcheck($Id, $date)
	{
		$this->db->select("*");
		$this->db->from($this->attend_table);
		$this->db->where('nopek', $Id);
		//$this->db->where('mark', "manual attendance");
		$this->db->where('date_attend=', $date);
		$query = $this->db->get();
		return $query;
		/*
		$sql = "
			select *
			from ".$this->attend_table."
			where nopek = '".$Id."' AND mark IN ('manual attendance','come') AND date_attend=".$date;
		$query = $this->db->get($sql);
		return $query;*/
		
	}
	
	public function workingcheck($Id, $date)
	{
		$this->db->select("*");
		$this->db->from($this->wr_table);
		$this->db->where('nopek', $Id);
		$this->db->where('date_attend=', $date);
		$query = $this->db->get();
		return $query;
		 
		
	}
	
	
	public function vaksincheck($Id)
	{
		$this->db->select("*");
		$this->db->from($this->wr_vaksin);
		$this->db->where('nopek', $Id);
		$query = $this->db->get();
		return $query;
		 
		
	}
	
	public function datatambahancheck($Id)
	{
		$this->db->select("*");
		$this->db->from($this->datatambahan_table);
		$this->db->where('nopek', $Id);
		$query = $this->db->get();
		return $query;
		 
		
	}
 
	
	
	public function reqapprovalcheck($Id, $date, $Tipe)
	{
		$this->db->select("*");
		$this->db->from($this->approval_table);
		$this->db->where('nopek', $Id);
		$this->db->where('date_attend=', $date);
		//$this->db->where('Tipe=', $Tipe);
		$query = $this->db->get();
		return $query;
	}

	
	public function username_exists($key)
	{
		$this->db->select('*');
	    $this->db->where('nip', $key);
	    $query = $this->db->get($this->user_table);
	    // return $query;
	    if ($query->num_rows() > 0){
	        return TRUE;
	    }
	    else{
	        return FALSE;
	    }
	}

	public function total_row_personal($nopek, $from, $to, $order_by, $sort, $search)
	{
		$this->db->select('A.* ');
		//$this->db->join($this->user_table.' as B', 'A.nopek = B.Id', 'inner');
		$this->db->group_start()
		                ->where('A.nopek', $nopek)
		                ->where('A.date_attend >=', $from)
		                ->where('A.date_attend <', $to)
		                ->group_start()
			              //  ->or_like('B.username', $search, 'both')
			               // ->or_like('B.nip', strval($search), 'both')
							->or_like('A.date_attend', $search, 'both')
							//->or_like('B.full_name', $search, 'both')
							//->or_like('B.email', $search, 'both')
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
		$this->db->get($this->attend_table);
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
		// return $query->num_rows();	
	}

	public function get_all($username,$limit, $offset, $order_by, $sort, $search)
	{
		$this->db->select('*, '.$this->attend_table.'.Id as Id_Attend');
		//$this->db->join($this->user_table, $this->user_table.'.nip = '.$this->attend_table.'.nopek');
		$this->db->order_by('date_attend', $sort);
		$this->db->like('username', $username, 'both');
		$get_db = $this->db->get($this->attend_table);
		// return $get_db;
		// var_dump($get_db);die();
		if ($get_db->num_rows() > 0) {
			return $get_db;	
		}else{
			return FALSE;
		}
	}
	
	
	public function get_atasan($username)
	{
		//$query = "select PJ.POS_ID as POS_ID_SUPERIOR, PJ.Nopek as PERNR from STA_Users A left join STA_PJS PJ on A.nip = PJ.Nopek where A.username = '".$nopek."'";
		/*$query = "select POS_ID_SUPERIOR, PERNR from View_ApprovalPJS where username = '".$nopek."' and isActive=1";
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
			where A.username = '".$nopek."'
			";
		}*/
		$sql = "EXEC SP_Pjs @function = '6', @username = '".$username."'";
		//  $sql = "select POS_ID_SUPERIOR, PERNR from View_ApprovalPJS where username =  '".$username."' and isActive='1'";
		 // $sql = "select Nopek from STA_PJS where recid =  '2' and isActive='1'";
		
		$get_db = $this->db->query($sql);
		if ($get_db->num_rows() > 0) {
			return $get_db;	
		}else{
			return FALSE;
		}
	}
	
	public function get_data_approval($POSID,$From,$To,$Nama)
	{
		//$sql =  "SELECT  A.nopek as nopek_approve,A.date_attend as date_approve, A.* , B.* , C.* FROM STA_ApprovalAbsen A  inner join STA_UsersAttendance B on A.date_attend=B.date_attend and A.nopek=B.nopek  left join STA_WorkingReport C on A.date_attend=C.date_attend and A.nopek=C.nopek where  A.POS_ID = '".$POSID."'  and (A.Status = 'P' or A.Status = 'R') and A.date_attend >='".$From."' and A.date_attend <='".$To."' and A.nama_karyawan LIKE '%".$Nama."%' order by A.date_attend desc  ";
		$sql =  "SELECT A.ID as IDAbsen ,A.nopek as nopek_approve,A.date_attend as date_approve, A.* , B.*  FROM STA_ApprovalAbsen A  inner join STA_UsersAttendance B on A.date_attend=B.date_attend and A.nopek=B.nopek  where  A.POS_ID = '".$POSID."'  and (A.Status = 'P' or A.Status = 'R') and A.date_attend >='".$From."' and A.date_attend <='".$To."' and A.nama_karyawan LIKE '%".$Nama."%' order by A.date_attend desc  ";
		
		/*
		$sql = "select * from STA_ApprovalAbsen A left join STA_Users U on A.nopek = U.Id where A.Status = 'P' AND (A.Tipe like '%".$search."%' OR A.date_attend like '%".$search."%') AND A.POS_ID = '".$pos_id."'";
		*/
		$get_db = $this->db->query($sql);
		// return $get_db;
		
		if ($get_db->num_rows() > 0) {
			return $get_db;	
		}else{
			return FALSE;
		}
	}
	
	public function get_data_approval_clicked($id,$from,$to)
	{
		 
		
		
		$this->db->select('  A.nopek as nopek_approve,A.date_attend as date_approve, A.*, B.* ');
	  $this->db->join($this->attend_table.' as B',  'A.nopek = B.nopek and A.date_attend = B.date_attend', 'inner');
		   $this->db->where("A.nopek =", $id);
		          $this->db->where("A.date_attend >=", $from);
		$this->db->where("A.date_attend <=", $to);
		$this->db->order_by("A.date_attend", 'desc'); 
		$get_db = $this->db->get($this->approval_table.' as A' );
		// return $get_db;
		// var_dump($get_db);die();
		 
		//return $query;
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

	public function get_personal($nopek, $from, $to, $limit, $offset, $order_by, $sort, $search)
	{
		$this->db->select(' A.date_attend as date_attend_absen , A.*,B.Status as st_absen ');
		//$this->db->select(' A.date_attend as date_attend_absen , A.*,B.Status as st_absen, C.*');
		 $this->db->join($this->approval_table.' as B',  'A.nopek = B.nopek and A.date_attend = B.date_attend', 'left');
		//  $this->db->join($this->wr_table.' as C',  'A.nopek = C.nopek and A.date_attend = C.date_attend', 'inner');
		  
		                $this->db->where('A.nopek', $nopek);
		                $this->db->where('A.date_attend >=', $from);
						$this->db->where('A.date_attend <=', $to); 
		                
		$this->db->order_by('A.date_attend', $sort);
		$get_db = $this->db->get($this->attend_table.' as A',$offset);
		// return $get_db;
		// var_dump($get_db);die();
		 
		//return $query;
		if ($get_db->num_rows() > 0) {
			return $get_db;	
		}else{
			return FALSE;
		}
	}
	
	
	 
	
	

	public function get_data_export($nopek, $jam_masuk, $jam_pulang, $from, $to)
	{
		$sql = "
			SELECT * from dbo.whereId('".$nopek."','".$jam_masuk."', '".$jam_pulang."', '".$from."', '".$to."');
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

	public function deleteabsen($nopek,$date)
	{
		$this->db->where('nopek', $nopek);
		$this->db->where('date_attend', $date);
		$query = $this->db->delete($this->attend_table);
		return $query;
	}
	
		public function deletevaksin($nopek,$novak)
	{
		$this->db->where('nopek', $nopek);
		$this->db->where('VaccineNo', $novak);
		$query = $this->db->delete($this->wr_vaksin);
		return $query;
	}
	
	public function deleteabsenapp($nopek,$date)
	{
		$this->db->where('nopek', $nopek);
		$this->db->where('date_attend', $date);
		$query = $this->db->delete($this->approval_table);
		return $query;
	}
	
	public function deletewo($nopek,$date)
	{
		$this->db->where('nopek', $nopek);
		$this->db->where('date_attend', $date);
		$query = $this->db->delete($this->wr_table);
		return $query;
	}
	
	public function approve($IdTemp, $action, $person,$noteapp)
	{
		 
		$get_time = date('Y-m-d h:i:s');
		$this->db->set('Status', $action);
		$this->db->set('Note_approve', $noteapp);
		$this->db->set('date_action_manager', $get_time);
		$this->db->set('approve_by', $person);
		$this->db->where('ID', $IdTemp);
		$updating_data = $this->db->update('STA_ApprovalAbsen');
		
	 
			return true;
		 
	}
	
	public function approveall($id, $action, $person,$noteapp)
	{
		 
		$get_time = date('Y-m-d h:i:s'); 
		
		$usersCount = count($id);
	for($i=0;$i<$usersCount;$i++) { 
	  $sql  = "UPDATE STA_ApprovalAbsen set Status='" . $action  . "', Note_approve='".$noteapp."' , date_action_manager='".$get_time."' , approve_by='".$person."' WHERE ID='" . $id[$i] . "'";
	  	 $get_db   = $this->db->query($sql  );
	  
}	
		 return $get_db  ;
	 
		 
	}
	
	
	public function approvekeluar($data)
	{
		 
			 
					 
					$this->db->insert($this->attend_table, $data);
					$error = $this->db->error();
					if (isset($error['message'])) {
						if ($error['code'] != "0000") {
							return false;
						} else {
							return true;	
						}
						
					}
					
					return true;
			 
		 
	}
	
	
public function updateapprovekeluar($jamabsen, $jamkeluar, $EMPLOYEE_NOPEK, $pos_id_atasan, $note , $date,$fullname )
	{
		
		  $get_time = date('Y-m-d h:i:s'); 
		
		 
		$this->db->set('Status', 'P');
		$this->db->set('date_action_manager', $get_time);
		$this->db->set('Jam_keluar', $jamkeluar);
		$this->db->set('Note', $note);
		$this->db->set('Tipe', 'Request Absen Keluar');
		$this->db->where('nopek', $EMPLOYEE_NOPEK);
		$this->db->where('date_attend', $date);
		$this->db->where('nama_karyawan', $fullname);
		$updating_data = $this->db->update('STA_ApprovalAbsen');
		
		if ($updating_data > 0) { 
		$this->db->set('time_return', $jamkeluar); 
		$this->db->set('note', 'Request Absen Keluar'); 
		$this->db->where('nopek', $EMPLOYEE_NOPEK);
		$this->db->where('date_attend', $date);
		$updating_data_absen = $this->db->update('STA_UsersAttendance');
		 
		 if (isset($error['message'])) {
						if ($error['code'] != "0000") {
							return false;
						} else {
							return true;	
						}
			
		}
		
					return true;
		}else{
			return FALSE;
		}
					
		 
	}
	
	public function approve2($jamabsen, $jamkeluar, $EMPLOYEE_NOPEK, $pos_id_atasan, $note , $date,$full_name )
	{
		
		  $get_time = date('Y-m-d h:i:s');
			$data[] = [
										"nopek" => $EMPLOYEE_NOPEK,
										"date_attend" => $date,
										"Jam_absen" => $jamabsen,
										"Jam_keluar" => $jamkeluar,
										"POS_ID" => $pos_id_atasan,
										"Note" => $note,
										"Tipe" => 'Request Absen Keluar',
										"date_action_manager" => $get_time,
										"Status" => "P",
										"nama_karyawan"=> $full_name,
										"Tipe"=> 'Request Absen Keluar'
									];
					 
					
				$updating_data =	$this->db->insert($this->approval_table, $data[0]);
					 
					 if ($updating_data > 0) { 
		$this->db->set('time_return', $jamkeluar); 
		$this->db->set('note', 'Request Absen Keluar'); 
		$this->db->where('nopek', $EMPLOYEE_NOPEK);
		$this->db->where('date_attend', $date);
		$updating_data_absen = $this->db->update('STA_UsersAttendance');
		 
		 if (isset($error['message'])) {
						if ($error['code'] != "0000") {
							return false;
						} else {
							return true;	
						}
			
		}
		
					return true;
		}else{
			return FALSE;
		}
					
		 
	}
	
	
		public function cekcountwr($Id, $date)
	{
		$this->db->select(" * ");
		$this->db->from($this->wr_table);
		$this->db->where('nopek', $Id);
		$this->db->where('date_attend', $date); 
		$query = $this->db->get();
		return $query;
	}
	
	public function reqapprovalcheck2($Id, $date)
	{
		$this->db->select("*");
		$this->db->from($this->approval_table);
		$this->db->where('nopek', $Id);
		$this->db->where('date_attend=', $date);
		// $this->db->where('ID=', $IdAbsen);
		$query = $this->db->get();
		return $query;
	}
	
	public function getlocation()
	{
		$this->db->select("*");
		$this->db->from('MS_Location'); 
		$query = $this->db->get();
		return $query;
	}
public function update_absenkeluar($Id, $date, $time, $locationpeg)
	{
		$this->db->set('Location', $locationpeg);
		$this->db->set('Jam_keluar', $time);
		$this->db->where('nopek', $Id);
		$this->db->where('date_attend', $date);
		$updating_data = $this->db->update($this->approval_table);
		// return var_dump($updating_data);
		if ($updating_data > 0) {
			// return $data_update;
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	
	public function getfitur()
	{
		$this->db->select("FITUR_KEYVALUE"); 
		$this->db->where('FITUR', 'MAPS');
		$this->db->where('FITUR_ACTIVE','1');
		$this->db->from($this->ms_fitur); 
		$query = $this->db->get();
		return $query;
	}
	
	public function getinfo()
	{
		$this->db->select("UrlImage"); 
		$this->db->where('Status','1');
		$this->db->from($this->ms_info); 
		$query = $this->db->get();
		return $query;
	}
	
	public function getlokasi()
	{
		$this->db->select("FITUR_KEYVALUE"); 
		$this->db->where('FITUR', 'LOCATION FOTO');
		$this->db->where('FITUR_ACTIVE','1');
		$this->db->from($this->ms_fitur); 
		$query = $this->db->get();
		return $query;
	}
	
	public function getlokasiinfo()
	{
		$this->db->select("FITUR_KEYVALUE"); 
		$this->db->where('FITUR', 'LOCATION INFO');
		$this->db->where('FITUR_ACTIVE','1');
		$this->db->from($this->ms_fitur); 
		$query = $this->db->get();
		return $query;
	}
	
	
	public function getfiturfitunfit()
	{
		$this->db->select("*"); 
		$this->db->where('FITUR', 'FIT UNFIT');
		$this->db->where('FITUR_ACTIVE','1');
		$this->db->from($this->ms_fitur); 
		$query = $this->db->get();
		return $query;
	}
	
	
	public function edit_kondisi($username, $date, $kondisi, $note_kondisi, $note_kondisi_lain)
	{
		
		 
		$this->db->set('StatusFit', $kondisi);
		$this->db->set('StatusFitNote', $note_kondisi);
		$this->db->set('StatusFitNote_Lain', $note_kondisi_lain);
		$this->db->set('StatusFit_UpdateOn', $date);
		$this->db->where('username', $username);
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
	
	public function set_vaksin(array $data)
	{
		$this->db->insert($this->wr_vaksin, $data);
		return $this->db->insert_id();
	}
	
	public function set_data_kuis($nopek,$date, array $data)
	{
		
		$this->db->where('nopek',$nopek);
		$this->db->where('TanggalPengisian',$date);
		$q = $this->db->get($this->datakuis_table);

		if ( $q->num_rows() > 0 ) 
		{
		$this->db->where('nopek',$nopek);
		$this->db->where('TanggalPengisian',$date);
		$this->db->update($this->datakuis_table,$data);
		} else {
		$this->db->set('nopek', $nopek);
		$this->db->where('TanggalPengisian',$date);
		$this->db->insert($this->datakuis_table,$data);
		}
	}
	
	public function kuischeck($Id, $date)
	{
		$this->db->select("*");
		$this->db->from($this->datakuis_table);
		$this->db->where('nopek', $Id);
		$this->db->where('TanggalPengisian',$date);
		$query = $this->db->get();
		return $query;
		 
		
	}
	
	public function doktorcheck($zone)
	{
		$this->db->select("*");
		$this->db->from($this->ms_companydoctor);
		$this->db->where('FieldZone', $zone);
		$query = $this->db->get();
		return $query;
		 
		
	}
	
	public function doktornonzonacheck()
	{
		$this->db->select("*");
		$this->db->from($this->ms_companydoctor);
		$this->db->where('FieldZone', 'Regional 4');
		$query = $this->db->get();
		return $query;
		 
		
	}
	
	public function set_isolasi(array $data)
	{
		$this->db->insert($this->sta_relative, $data);
		return $this->db->insert_id();
	}
	
	public function delete_all_insom($id,$type)
	{
		$this->db->where('Id_KuesionerAbsen', $id);
		$this->db->where('TypeData', $type);
		$query = $this->db->delete($this->sta_relative);
		return $query;
	}
	
	
		public function datalokasicheck()
	{
		$this->db->select("*");
		$this->db->from($this->MS_Location);
		$this->db->order_by("recid", 'asc'); 
		$query = $this->db->get();
		return $query;
		 
		
	}
	
	
	
		public function isolasicheck($Id)
	{
		$this->db->select("*");
		$this->db->from($this->sta_relative);
		$this->db->where('Id_KuesionerAbsen', $Id);
		$this->db->where('TypeData', "isolasi_mandiri");
		$query = $this->db->get();
		return $query;
		 
		
	}
	 
		public function phonecheck($Id)
	{
		$this->db->select("*");
		$this->db->from($this->sta_relative);
		$this->db->where('Id_KuesionerAbsen', $Id);
		$this->db->where('TypeData', "phone_keluarga");
		$query = $this->db->get();
		return $query;
		 
		
	}
	
	public function keluhankelcheck($Id)
	{
		$this->db->select("*");
		$this->db->from($this->sta_relative);
		$this->db->where('Id_KuesionerAbsen', $Id);
		$this->db->where('TypeData', "keluhan_keluarga");
		$query = $this->db->get();
		return $query;
		 
		
	}
	
	
		public function checkBelumAbsen($nopek,$date)
	{
		
		 
		$this->db->select("*");
		$this->db->from($this->attend_table);
		$this->db->where('nopek', $nopek);
		$this->db->where('date_attend', $date);
		$query = $this->db->get();
		return $query;
		 
		
	}
	
	
		public function checkKuesioner($nopek,$date)
	{
		
		 
		$this->db->select("*");
		$this->db->from($this->datakuis_table);
		$this->db->where('nopek', $nopek);
		$this->db->where('TanggalPengisian', $date);
		$this->db->where('Status', '1');
		$query = $this->db->get();
		return $query;
		 
		
	}
	
	
		public function checAbsenReject($id)
	{
		
		 
		$this->db->select("*");
		$this->db->from($this->approval_table);
		$this->db->where('ID', $id);
		$query = $this->db->get();
		return $query;
		 
		
	}
	
	
	public function updateabsenapprove($id, array $data)
	{ 
		
		 /*$this->db->where('ID',$id); 
		$q = $this->db->get($this->approval_table);

		if ( $q->num_rows() > 0 ) 
		{*/
		$this->db->where('ID',$id);
		$this->db->update($this->approval_table,$data);
		 /*} else {
		 $this->db->where('ID',$id); 
		$this->db->insert($this->approval_table,$data);
		}*/
		
		 
	}
	
	
	public function updateabsen($nopek,$date, array $data)
	{
		
		/*$this->db->where('nopek',$nopek);
		$this->db->where('date_attend',$date);
		$q = $this->db->get($this->attend_table);

		if ( $q->num_rows() > 0 ) 
		{ */
		$this->db->where('nopek',$nopek);
		$this->db->where('date_attend',$date);
		$this->db->update($this->attend_table,$data);
		/*} else {
		$this->db->where('nopek',$nopek);
		$this->db->where('date_attend',$date);
		$this->db->insert($this->attend_table,$data);
		}*/
		
		
	}
	
	public function deletewr($id)
	{ 
		$this->db->where('Id', $id);
		$query = $this->db->delete($this->wr_table);
		return $query;
	}
	
}
 ?>