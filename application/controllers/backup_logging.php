public function logging_post()
	{
		// print_r($this->generate_radius("faisal", "-6.208795 106.818388"));
		// XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
		$_POST = $this->security->xss_clean($_POST);

		// Form Validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('Location', 'Location', 'trim|required|max_length[38]');
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
				$exst = $this->Log_model->username_exists($token_valid->data->id);
				if ($exst === FALSE) {
		            $message = array('status' => false,
		             				 'message' => "Username not found, please check your usename");
	            	return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
				}else{
					date_default_timezone_set('Asia/Jakarta');
					$get_datetime = date('Y-m-d H:i:s');
					$data = [
						"Id_User" => $token_valid->data->id,
						"Location" => $this->input->post('Location', TRUE),
						"timing" => $get_datetime
					];
					$result = $this->Log_model->logging($data);
					if ($result > 0 AND !empty($result)) {
						$temp_Langlot = explode(" ", $this->input->post('Location', TRUE));
						$long = $temp_Langlot[0];
						$lat = $temp_Langlot[1];
						$data_cek_attend = [
								"Id_User" => $token_valid->data->id,
								// "date_attend" => date('Y-m-d')
								"date_attend" => date('2019-03-20')
							];
						$check_radius = $this->generate_radius($token_valid->data->id, $lat, $long);
						$param_attendcheck = [
							"Id_User" => $token_valid->data->id,
							"date_attend" => date('Y-m-d')
						];
						print_r($check_radius);
						// if ($check_radius === TRUE) {
						// 	$check_attend = $this->Attendance_model->attendcheck($param_attendcheck);
						// 	if ($check_attend === FALSE) {
						// 		$param_set_attend = [
						// 			"Id_User" =>$token_valid->data->id,
						// 			"date_attend" => date('Y-m-d'),
						// 			"time_come" => date('H:i:s')
						// 		];
						// 		$set_attendance = $this->Attendance_model->set_attend($param_set_attend);
						// 		if ($set_attendance > 0) {
						//             $message = array('status' => true,
						//              				 'message' => "Logging successfuly",
						//              				 'notice' => "attendance come successfuly");
						//             return $this->response($message, REST_Controller::HTTP_OK);	
						// 		}else{
						//             $message = array('status' => true,
						//              				 'message' => "Logging successfuly",
						//              				 'notice' => "attendance come failed");
						//             return $this->response($message, REST_Controller::HTTP_OK);	
						// 		}
						// 	}else{
					 //            $message = array('status' => true,
					 //             				 'message' => "Logging successfuly");
					 //            return $this->response($message, REST_Controller::HTTP_OK);	
						// 	}
						// }else{
						// 	$check_attend = $this->Attendance_model->attendcheck($param_attendcheck);
						// 	if ($check_attend != FALSE) {
						// 		foreach ($check_attend->result() as $value) {
						// 			$Id_attend = $value->Id;
						// 			$time_return = $value->time_return;
						// 		}
						// 		if ($time_return === NULL) {
						// 			$param_update_attend = [
						// 				"Id" => $Id_attend,
						// 				"time_return" => date('H:i:s')
						// 			];
						// 			$update_attendance = $this->Attendance_model->update_attend($param_update_attend);
						// 			if ($update_attendance === TRUE) {
						// 	            $message = array('status' => true,
						// 	             				 'message' => "Logging successfuly",
						//              				 	 'notice' => "attendance return successfuly");
						// 	            return $this->response($message, REST_Controller::HTTP_OK);	
						// 			}else{
						// 	            $message = array('status' => true,
						// 	             				 'message' => "Logging successfuly",
						//              				 	 'notice' => "attendance return failed");
						// 	            return $this->response($message, REST_Controller::HTTP_OK);	
						// 			}
						// 		}else{
						//             $message = array('status' => true,
						//              				 'message' => "Logging successfuly");
						//             return $this->response($message, REST_Controller::HTTP_OK);
						// 		}
						// 	}else{
					 //            $message = array('status' => true,
					 //             				 'message' => "Logging successfuly");
					 //            return $this->response($message, REST_Controller::HTTP_OK);	
						// 	}
						// }	
					}else{
			            $message = array('status' => false,
			             				 'message' => "Logging Failed");
		            	return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}
				}
			}
        }
	}
