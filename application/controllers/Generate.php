<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'third_party/PHPExcel/PHPExcel.php';  
class Generate extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('Authorization_Token');
		$this->load->model('Attendance_model');
		$this->load->helper(array('url'));
		$_POST = json_decode(file_get_contents("php://input"), true);
	}
   public function export_pdf()
    {
		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('from', 'from', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('to', 'to', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('id_user', 'id_user', 'trim|max_length[20]');
        if ($this->form_validation->run() == FALSE){
            // form validation error
            $message = array('status' => false,
             				 'message' => $this->form_validation->error_array());
            // print_r("aaa");
            $this->output
	        ->set_content_type('application/json')
	        ->set_output(json_encode($message));
        }else{	
        	$token_valid = json_decode($this->authorization_token->validateToken());
        	if ($token_valid->status === FALSE) {
	            $message = array('status' => false,
	             				 'message' => $token_valid->message);
	            print_r("A");
	            $this->output
		        ->set_content_type('application/json')
		        ->set_output(json_encode($message));
        	}else{
        		$username = $this->input->post('username');
        		if ($token_valid->data->role != "admin") {
		            $message = array('status' => false,
		             				 'message' => 'token access is denied');
		            // print_r("B");
		            $this->output
			        ->set_content_type('application/json')
			        ->set_output(json_encode($message));
        		}elseif ($token_valid->data->username != $this->input->post('username', TRUE)) {
		            $message = array('status' => false,
		             				 'message' => 'token access is denied');
		            $this->output
			        ->set_content_type('application/json')
			        ->set_output(json_encode($message));	
        		}else{
        			$from = $this->input->post('from');
        			$to = $this->input->post('to');
	        		$Id_User = $this->input->post('id_user', TRUE);
	        		$jam_masuk = date('H:i', strtotime('07:00'));
	        		$jam_pulang = date('H:i', strtotime('16:00'));
	        		if ($from == null || empty($from)) {
	        			$from = date('Y-m-d');
	        		}
	        		if ($to == null || empty($to)) {
	        			$to = date('Y-m-d', strtotime("+1 days"));
	        		}
	        		$get_attendance = $this->Attendance_model->get_data_export($Id_User, $jam_masuk, $jam_pulang, $from, $to);
	        		if ($get_attendance === FALSE) {
			            $message = array('status' => false,
			             				 'message' => 'cannot find data');
			            $this->output
				        ->set_content_type('application/json')
				        ->set_output(json_encode($message));
	        		}else{
	        			if ($get_attendance->num_rows() > 0) {
	        				foreach ($get_attendance->result() as $row) {
	        					$jam_masuk = date('H:i', strtotime($row->jam_masuk));
	        					$jam_pulang = date('H:i', strtotime($row->jam_pulang));
	        					$scan_masuk = $row->time_come;
	        					$scan_keluar = $row->time_return;
	        					$terlambat = $row->terlambat;
	        					$plg_cpt = $row->plg_cpt;
	        					$lembur = $row->lembur;
	        					$jam_kerja = $row->jam_kerja;
	        					$jml_hadir = $row->jml_hadir;
	        					if ($scan_masuk > 0) {
	        						$scan_masuk = date('H:i', strtotime($row->time_come));
	        					}
	        					if ($scan_keluar > 0) {
	        						$scan_keluar = date('H:i', strtotime($row->time_return));
	        					}
	        					if ($terlambat > 0) {
	        						$terlambat = date('H:i', strtotime($row->terlambat));
	        					}
	        					if ($plg_cpt > 0) {
	        						$plg_cpt = date('H:i', strtotime($row->plg_cpt));
	        					}
	        					if ($lembur > 0) {
	        						$lembur = date('H:i', strtotime($row->lembur));
	        					}
	        					if ($jam_kerja > 0) {
	        						$jam_kerja = date('H:i', strtotime($row->jam_kerja));
	        					}
	        					if ($jml_hadir > 0) {
	        						$jml_hadir = date('H:i', strtotime($row->jml_hadir));
	        					}
	        					$data_return[] = [
	        						"Id_User" => $row->Id_User,
	        						"username" => $row->username,
	        						"nip" => $row->nip,
	        						"full_name" => $row->full_name,
	        						"tanggal" => date('d/m/Y', strtotime($row->date_attend)),
	        						"jam_masuk" => $jam_masuk,
	        						"jam_pulang" => $jam_pulang,
	        						"scan_masuk" => $scan_masuk,
	        						"scan_keluar" => $scan_keluar,
	        						"terlambat" => $terlambat,
	        						"plg_cpt" => $plg_cpt,
	        						"lembur" => $lembur,
	        						"jam_kerja" => $jam_kerja,
	        						"jml_hadir" => $jml_hadir,
	        						"from" => date('d-m-Y', strtotime($from)),
	        						"to" => date('d-m-Y', strtotime($to))
	        					];
	        				}
	        			}
		        		if ($Id_User == null && empty($Id_User)) {
									header('Access-Control-Expose-Headers: Content-Disposition');
									header('Content-disposition: attachment; filename=filename.pdf');
									header('Content-type: application/pdf');
					        $data['users']=$data_return;
					        $msg = $this->load->view('pdf_all',  $data, true);
					        $this->pdfgenerator->generate($msg,'PEPC_Attendance_All_User_'.$from.'_to_'.$to);
		        		}else{
					        $data['users']=$data_return;
					        $msg = $this->load->view('pdf_user',  $data, true);
					        $this->pdfgenerator->generate($msg,'PEPC_Attendance_'.$row->full_name.'_'.$from.'_to_'.$to);
		        		}
	        		}
        		}
			}
		}
     }

   public function export_excel()
   {
	    
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('from', 'from', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('to', 'to', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('id_user', 'id_user', 'trim|max_length[20]');
        if ($this->form_validation->run() == FALSE){
            // form validation error
            $message = array('status' => false,
             				 'message' => $this->form_validation->error_array());
            // print_r("aaa");
            $this->output
	        ->set_content_type('application/json')
	        ->set_output(json_encode($message));
        }else{	
        	$token_valid = json_decode($this->authorization_token->validateToken());
        	if ($token_valid->status === FALSE) {
	            $message = array('status' => false,
	             				 'message' => $token_valid->message);
	            print_r("A");
	            $this->output
		        ->set_content_type('application/json')
		        ->set_output(json_encode($message));
        	}else{
        		$username = $this->input->post('username');
        		if ($token_valid->data->role != "admin") {
		            $message = array('status' => false,
		             				 'message' => 'token access is denied');
		            // print_r("B");
		            $this->output
			        ->set_content_type('application/json')
			        ->set_output(json_encode($message));
        		}elseif ($token_valid->data->username != $this->input->post('username', TRUE)) {
		            $message = array('status' => false,
		             				 'message' => 'token access is denied');
		            $this->output
			        ->set_content_type('application/json')
			        ->set_output(json_encode($message));	
        		}else{
        			$from = $this->input->post('from');
        			$to = $this->input->post('to');
	        		$Id_User = $this->input->post('id_user', TRUE);
	        		$jam_masuk = date('H:i', strtotime('07:00'));
	        		$jam_pulang = date('H:i', strtotime('16:00'));
	        		if ($from == null || empty($from)) {
	        			$from = date('Y-m-d');
	        		}
	        		if ($to == null || empty($to)) {
	        			$to = date('Y-m-d', strtotime("+1 days"));
	        		}
	        		$get_attendance = $this->Attendance_model->get_data_export($Id_User, $jam_masuk, $jam_pulang, $from, $to);
	        		if ($get_attendance === FALSE) {
			            $message = array('status' => false,
			             				 'message' => 'cannot find data');
			            $this->output
				        ->set_content_type('application/json')
				        ->set_output(json_encode($message));
	        		}else{
	        			if ($get_attendance->num_rows() > 0) {
	        				foreach ($get_attendance->result() as $row) {
	        					$jam_masuk = date('H:i', strtotime($row->jam_masuk));
	        					$jam_pulang = date('H:i', strtotime($row->jam_pulang));
	        					$scan_masuk = $row->time_come;
	        					$scan_keluar = $row->time_return;
	        					$terlambat = $row->terlambat;
	        					$plg_cpt = $row->plg_cpt;
	        					$lembur = $row->lembur;
	        					$jam_kerja = $row->jam_kerja;
	        					$jml_hadir = $row->jml_hadir;
	        					if ($scan_masuk > 0) {
	        						$scan_masuk = date('H:i', strtotime($row->time_come));
	        					}
	        					if ($scan_keluar > 0) {
	        						$scan_keluar = date('H:i', strtotime($row->time_return));
	        					}
	        					if ($terlambat > 0) {
	        						$terlambat = date('H:i', strtotime($row->terlambat));
	        					}
	        					if ($plg_cpt > 0) {
	        						$plg_cpt = date('H:i', strtotime($row->plg_cpt));
	        					}
	        					if ($lembur > 0) {
	        						$lembur = date('H:i', strtotime($row->lembur));
	        					}
	        					if ($jam_kerja > 0) {
	        						$jam_kerja = date('H:i', strtotime($row->jam_kerja));
	        					}
	        					if ($jml_hadir > 0) {
	        						$jml_hadir = date('H:i', strtotime($row->jml_hadir));
	        					}
	        					$data_return[] = [
	        						"Id_User" => $row->Id_User,
	        						"username" => $row->username,
	        						"nip" => $row->nip,
	        						"full_name" => $row->full_name,
	        						"tanggal" => date('d/m/Y', strtotime($row->date_attend)),
	        						"jam_masuk" => $jam_masuk,
	        						"jam_pulang" => $jam_pulang,
	        						"scan_masuk" => $scan_masuk,
	        						"scan_keluar" => $scan_keluar,
	        						"terlambat" => $terlambat,
	        						"plg_cpt" => $plg_cpt,
	        						"lembur" => $lembur,
	        						"jam_kerja" => $jam_kerja,
	        						"jml_hadir" => $jml_hadir,
	        						"from" => date('d-m-Y', strtotime($from)),
	        						"to" => date('d-m-Y', strtotime($to))
	        					];
	        				}
	        			}
	        		}
	        		$excel = new PHPExcel();
				    $excel->getProperties()->setCreator('Muhammad Faisal Budiman')
				                 ->setLastModifiedBy('My Notes Code')
				                 ->setTitle("Data Absen")
				                 ->setSubject("Absen")
				                 ->setDescription("Laporan Harian Detail")
				                 ->setKeywords("Data Absen");
				    $style_col = array(
				      'font' => array('bold' => true), // Set font nya jadi bold
				      'alignment' => array(
				        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
				      ),
				      'borders' => array(
				        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
				    )
				    );
				    
				    $style_row = array(
				      'alignment' => array(
				        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
				      ),
				      'borders' => array(
				        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
				      )
				    );
				    $excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN HARIAN DETAIL");
				    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
				    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
				    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); //

	        		if ($Id_User == null && empty($Id_User)) {
				    	$excel->getActiveSheet()->mergeCells('A1:M1');
					    $excel->setActiveSheetIndex(0)->setCellValue('A3', "Periode Waktu");
					    $excel->setActiveSheetIndex(0)->setCellValue('A4', "Dari ".$data_return[0]['from']." s/d ".$data_return[0]['from']); 

					    $excel->setActiveSheetIndex(0)->setCellValue('A5', "Username"); 
					    $excel->setActiveSheetIndex(0)->setCellValue('B5', "NIP"); 
					    $excel->setActiveSheetIndex(0)->setCellValue('C5', "Nama Lengkap"); 
					    $excel->setActiveSheetIndex(0)->setCellValue('D5', "Tanggal"); 
					    $excel->setActiveSheetIndex(0)->setCellValue('E5', "Jam Masuk"); 
					    $excel->setActiveSheetIndex(0)->setCellValue('F5', "Jam Pulang"); 
					    $excel->setActiveSheetIndex(0)->setCellValue('G5', "Scan Masuk"); 
					    $excel->setActiveSheetIndex(0)->setCellValue('H5', "Scan Keluar"); 
					    $excel->setActiveSheetIndex(0)->setCellValue('I5', "Terlambat"); 
					    $excel->setActiveSheetIndex(0)->setCellValue('J5', "Plng Cpt"); 
					    $excel->setActiveSheetIndex(0)->setCellValue('K5', "Lembur"); 
					    $excel->setActiveSheetIndex(0)->setCellValue('L5', "Jam Kerja"); 
					    $excel->setActiveSheetIndex(0)->setCellValue('M5', "Jml Hadir"); 

					    $excel->getActiveSheet()->getStyle('A5')->applyFromArray($style_col);
					    $excel->getActiveSheet()->getStyle('B5')->applyFromArray($style_col);
					    $excel->getActiveSheet()->getStyle('C5')->applyFromArray($style_col);
					    $excel->getActiveSheet()->getStyle('D5')->applyFromArray($style_col);
					    $excel->getActiveSheet()->getStyle('E5')->applyFromArray($style_col);
					    $excel->getActiveSheet()->getStyle('F5')->applyFromArray($style_col);
					    $excel->getActiveSheet()->getStyle('G5')->applyFromArray($style_col);
					    $excel->getActiveSheet()->getStyle('H5')->applyFromArray($style_col);
					    $excel->getActiveSheet()->getStyle('I5')->applyFromArray($style_col);
					    $excel->getActiveSheet()->getStyle('J5')->applyFromArray($style_col);
					    $excel->getActiveSheet()->getStyle('K5')->applyFromArray($style_col);
					    $excel->getActiveSheet()->getStyle('L5')->applyFromArray($style_col);
					    $excel->getActiveSheet()->getStyle('M5')->applyFromArray($style_col);
					    $numrow = 6;
					    foreach ($data_return as $value) {
					      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $value['username']);
					      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $value['nip']);
					      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $value['full_name']);
					      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $value['tanggal']);
					      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $value['jam_masuk']);
					      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $value['jam_pulang']);
					      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $value['scan_masuk']);
					      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $value['scan_keluar']);
					      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $value['terlambat']);
					      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $value['plg_cpt']);
					      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $value['lembur']);
					      $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $value['jam_kerja']);
					      $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $value['jml_hadir']);
					      
					      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
					      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
					      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
					      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
					      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
					      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
					      $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
					      $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
					      $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
					      $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
					      $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
					      $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
					      $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
					      
					      $numrow++;
					    }

					    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(15); 
					    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
					    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
					    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(13);
					    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(13);
					    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(13);
					    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(13);
					    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(13);
					    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(13);
					    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(13);
					    $excel->getActiveSheet()->getColumnDimension('K')->setWidth(13);
					    $excel->getActiveSheet()->getColumnDimension('L')->setWidth(13);
					    $excel->getActiveSheet()->getColumnDimension('M')->setWidth(13);
					    
					    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
					    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
					    $excel->getActiveSheet(0)->setTitle("Laporan Data Siswa");
							$excel->setActiveSheetIndex(0);
							header('Access-Control-Expose-Headers: Content-Disposition');
					    header("Content-type: application/octet-stream");
					    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
					    header('Content-Disposition: attachment; filename="Data Absen PEPC All User '.$data_return[0]['from'].' to '.$data_return[0]['to'].'.xlsx"'); 
						header("Pragma: no-cache");
						header("Expires: 0");
						header('Cache-Control: max-age=0');
						$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
						$write->save('php://output');
	        		}else{
				    	$excel->getActiveSheet()->mergeCells('A1:J1');
					    $excel->setActiveSheetIndex(0)->setCellValue('A3', "NIP");
					    $excel->setActiveSheetIndex(0)->setCellValue('B3', ":"); 
					    $excel->setActiveSheetIndex(0)->setCellValue('C3', $data_return[0]['nip']); 


					    $excel->setActiveSheetIndex(0)->setCellValue('A4', "Nama");
					    $excel->setActiveSheetIndex(0)->setCellValue('B4', ":"); 
					    $excel->setActiveSheetIndex(0)->setCellValue('C4', $data_return[0]['full_name']); 

					    $excel->setActiveSheetIndex(0)->setCellValue('H3', "Periode Waktu");
					    $excel->setActiveSheetIndex(0)->setCellValue('H4', "Dari ".$data_return[0]['from']." s/d ".$data_return[0]['from']); 

					    $excel->setActiveSheetIndex(0)->setCellValue('A5', "Tanggal"); 
					    $excel->setActiveSheetIndex(0)->setCellValue('B5', "Jam Masuk"); 
					    $excel->setActiveSheetIndex(0)->setCellValue('C5', "Jam Pulang"); 
					    $excel->setActiveSheetIndex(0)->setCellValue('D5', "Scan Masuk"); 
					    $excel->setActiveSheetIndex(0)->setCellValue('E5', "Scan Keluar"); 
					    $excel->setActiveSheetIndex(0)->setCellValue('F5', "Terlambat"); 
					    $excel->setActiveSheetIndex(0)->setCellValue('G5', "Plng Cpt"); 
					    $excel->setActiveSheetIndex(0)->setCellValue('H5', "Lembur"); 
					    $excel->setActiveSheetIndex(0)->setCellValue('I5', "Jam Kerja"); 
					    $excel->setActiveSheetIndex(0)->setCellValue('J5', "Jml Hadir"); 

					    $excel->getActiveSheet()->getStyle('A5')->applyFromArray($style_col);
					    $excel->getActiveSheet()->getStyle('B5')->applyFromArray($style_col);
					    $excel->getActiveSheet()->getStyle('C5')->applyFromArray($style_col);
					    $excel->getActiveSheet()->getStyle('D5')->applyFromArray($style_col);
					    $excel->getActiveSheet()->getStyle('E5')->applyFromArray($style_col);
					    $excel->getActiveSheet()->getStyle('F5')->applyFromArray($style_col);
					    $excel->getActiveSheet()->getStyle('G5')->applyFromArray($style_col);
					    $excel->getActiveSheet()->getStyle('H5')->applyFromArray($style_col);
					    $excel->getActiveSheet()->getStyle('I5')->applyFromArray($style_col);
					    $excel->getActiveSheet()->getStyle('J5')->applyFromArray($style_col);
					    $numrow = 6;
					    foreach ($data_return as $value) {
					      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $value['tanggal']);
					      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $value['jam_masuk']);
					      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $value['jam_pulang']);
					      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $value['scan_masuk']);
					      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $value['scan_keluar']);
					      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $value['terlambat']);
					      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $value['plg_cpt']);
					      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $value['lembur']);
					      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $value['jam_kerja']);
					      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $value['jml_hadir']);
					      
					      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
					      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
					      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
					      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
					      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
					      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
					      $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
					      $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
					      $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
					      $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
					      
					      $numrow++;
					    }

					    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(13); 
					    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(13);
					    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(13);
					    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(13);
					    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(13);
					    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(13);
					    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(13);
					    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(13);
					    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(13);
					    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(13);
					    
					    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
					    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
					    $excel->getActiveSheet(0)->setTitle("Laporan Data Siswa");
							$excel->setActiveSheetIndex(0);
							header('Access-Control-Expose-Headers: Content-Disposition');
					    header("Content-type: application/octet-stream");
					    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
					    header('Content-Disposition: attachment; filename="Data Absen PEPC '.$data_return[0]['full_name'].' '.$data_return[0]['from'].' to '.$data_return[0]['to'].'.xlsx"'); 
						header("Pragma: no-cache");
						header("Expires: 0");
						header('Cache-Control: max-age=0');
						$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
						$write->save('php://output');
	        		}
        		}
			}
		}
   }
}
?>