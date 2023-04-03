<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Workorder extends CI_Controller
{
	function workorderform()
	{
		//http://localhost/tutorial/codeigniter/main/login
		$data['title'] = 'CodeIgniter Simple Login Form With Sessions';
		if ($this->session->userdata('balunand_id_no') == '') {
			redirect(base_url() . 'main/login');
		} else {
			$this->load->model('workorder_model');
			$data['name'] = $this->workorder_model->getClientName();
			foreach ($data['name']  as $name) {
				$data['clientname'][] = array(
					//'workorder_no'=>$userdetails['workorder_no'],
					'name' => $name['name']
				);
			}
			//   var_dump($data['clientname'] );
			$data['assign_to'] = $this->workorder_model->getUsers();
			// var_dump($data['assign_to'] );
			foreach ($data['assign_to']  as $assign_to) {
				$data['assign_to'][] = array(
					'user_id' =>  $assign_to['user_id'],
					'name' =>   $assign_to['name']
				);
			}
			$data['workordernumber'] = $this->workorder_model->fetch_workorder_data();
			foreach ($data['workordernumber']  as $worknumber) {
				$workorder_no =   $worknumber['workorder_no'];
			}
			$data['workdata1'] = $workorder_no;
			$data['workdata2'] = substr($workorder_no, 4);
			// $data['workdata']
			// $a['typework']=  $currentyear.$typeofworkorder['prefix'] ;
			$data['workdata'] =  $data['workdata2'] + 1;
			var_dump($data['workdata']);
			//  type of work
			$data['typeofworkorder'] = $this->workorder_model->getTypeofWork();
			// foreach ($data['typeofworkorder']  as $typeofworkorder) {
			// 	$data['typeofworkorderdata'][] = array(
			// 		'type_of_work_id' => $typeofworkorder['type_of_work_id'],
			// 		'prefix' => $typeofworkorder['prefix']
			// 	);
			// }
			$this->load->view('template/header');
			$this->load->view('template/navigation');
			$this->load->view('workorder_form', $data);
			$this->load->view('template/footer');
		}
	}
	public function view_workorder($workidnumber = null)
	{
		if ($this->session->userdata('balunand_id_no') == '') {
			redirect(base_url() . 'main/login');
		} else {
			$this->load->model('workorder_model');
			$this->load->model('user_model');
			$loggedInUserId = $this->session->userdata('userId');
			//  echo $loggedInUserId;
			$usertype = $this->user_model->getUsersType($loggedInUserId);
			if ($workidnumber == null) {
				if ($usertype == 1) {
					$data['workorderno'] = $this->workorder_model->getWorkOrderNo();
					foreach ($data['workorderno'] as $worksheet) {
						$data['workorderdetails'][] = array(
							'workorder_no' => $worksheet['workorder_no'],
							'client_name' => $worksheet['client_name'],
							'created_on' => $worksheet['created_on'],
							'assign_to' => $worksheet['assign_to'],
							'type_of_work' => $worksheet['type_of_work'],
							'partner_in_charge' => $worksheet['partner_in_charge'],
							'start_date' => $worksheet['start_date'],
							'targetted_end_date' => $worksheet['targetted_end_date'],
							'deadline' => $worksheet['deadline'],
						);
						//return;
					}
					/// to fetch work order number
					$data['assignworkorderno'] = $this->workorder_model->getAssignToWorkOrderNo();

					//var_dump($data['assignworkorderno']);


					if (count($data['assignworkorderno']) > 0) {
						foreach ($data['assignworkorderno'] as $assignworkorderno) {
							$workid = $assignworkorderno['workorder_no'];
							// var_dump($assignworkorderno['workorder_no']);
							$array['number1'] = str_replace('"', '',  $assignworkorderno['assign_to']);
							$array['number2'] = str_replace(']', '',    $array['number1']);
							$array['number3'] = str_replace('[', '',    $array['number2']);
							$array['number4'] = explode(',',  $array['number3']);
							foreach ($array['number4'] as $assignworkordernonumber4) {
								$data['userdetails'] = $this->workorder_model->getAssignToUsers($assignworkordernonumber4);
								foreach ($data['userdetails'] as $key => $userdetails) {
									// var_dump($key);
									$data['userdetails1'][] = array(
										'name' => $userdetails['name'],
										'balunand_id_no' => $userdetails['balunand_id_no'],
										'student_reg_no' => $userdetails['student_reg_no'],
										//  'assign_to' => $userdetails['assign_to'],  
										//  'leadname'=>$userdetails['name'],
										//  'user_id'=>$userdetails['user_id']
									);
								}
							}
							$data['oneworkorderdata'][] = array(
								'workorder_no' => $assignworkorderno['workorder_no'],
								'client_name' => $assignworkorderno['client_name'],
								'created_on' => $assignworkorderno['created_on'],
								'assign_to' => $assignworkorderno['assign_to'],
								'type_of_work' => $assignworkorderno['type_of_work'],
								'partner_in_charge' => $assignworkorderno['partner_in_charge'],
								'start_date' => $assignworkorderno['start_date'],
								'targetted_end_date' => $assignworkorderno['targetted_end_date'],
								'deadline' => $assignworkorderno['deadline'],
							);
							// var_dump($data['userdetails1']);
							break;
						}
						// return;
						/// for flow of work worksheet
						$data['fetch_data'] = $this->workorder_model->fetchworkordersheetdata($workid);
						foreach ($data['fetch_data'] as $worksheet) {
							$starttime = chop($worksheet['start_time'], "amp");
							$endtime = chop($worksheet['end_time'], "amp");
							$start_time = strtotime($starttime);
							$end_time = strtotime($endtime);
							$timespent = ($end_time - $start_time) / 60;
							$data['workesheetdata'][] = array(
								'workorder_no' => $worksheet['workorder_no'],
								//'created_on' => $worksheet['created_on'],
								//'client_name' => $worksheet['client_name'],
								'name_of_employee' => $worksheet['employee_name'],
								'date' => $worksheet['date'],
								'work_description' => $worksheet['work_description'],
								'start_time' => $worksheet['start_time'],
								'end_time' => $worksheet['end_time'],
								'spent_time' => $timespent . 'minutes',
								'remarks' => $worksheet['remarks']
							);
						}
					}
					//return;
				}
				if ($usertype != 1) {
					//	echo "1";
					/// to display workorder dropdown in view file for employees/other then admins based on workorder assigned to them.
					$data['workorderno'] = $this->workorder_model->getWorkOrderNo();
					foreach ($data['workorderno'] as $worksheet) {
						$array['number1'] = str_replace('"', '',  $worksheet['assign_to']);
						$array['number2'] = str_replace(']', '',    $array['number1']);
						$array['number3'] = str_replace('[', '',    $array['number2']);
						$array['number4'] = explode(',',  $array['number3']);
						//var_dump($array['number4']);
						if (in_array($loggedInUserId, $array['number4'])) {
							$data['workorderdetails'][] = array(
								'workorder_no' => $worksheet['workorder_no'],
								'client_name' => $worksheet['client_name'],
								'created_on' => $worksheet['created_on'],
								'assign_to' => $worksheet['assign_to'],
								'type_of_work' => $worksheet['type_of_work'],
								'partner_in_charge' => $worksheet['partner_in_charge'],
								'start_date' => $worksheet['start_date'],
								'targetted_end_date' => $worksheet['targetted_end_date'],
								'deadline' => $worksheet['deadline'],
							);
						}
					}
					///// end of dropdown code
					foreach ($data['workorderno'] as $worksheet) {
						$aids = $worksheet['assign_to'];
						//  var_dump($loggedInUserId,);
						$array['number1'] = str_replace('"', '', $worksheet['assign_to']);
						$array['number2'] = str_replace(']', '', $array['number1']);
						$array['number3'] = str_replace('[', '',    $array['number2']);
						$array['number4'] = explode(',',  $array['number3']);
						//var_dump($array['number4']);
						if (in_array($loggedInUserId, $array['number4'])) {
							$worksheetworkorderno = $worksheet['workorder_no'];
							$data['fetch_data'] = $this->workorder_model->fetchworkordersheetdata($worksheetworkorderno);
							foreach ($array['number4'] as $assignworkordernonumber4) {
								//	echo $assignworkordernonumber4;
								$data['userdetails'] = $this->workorder_model->getAssignToUsers($assignworkordernonumber4);
								foreach ($data['userdetails'] as $key => $userdetails) {
									$data['userdetails1'][] = array(
										'name' => $userdetails['name'],
										'balunand_id_no' => $userdetails['balunand_id_no'],
										'student_reg_no' => $userdetails['student_reg_no'],
										//  'assign_to' => $userdetails['assign_to'],  
										//  'leadname'=>$userdetails['name'],
										//  'user_id'=>$userdetails['user_id']
									);
								}
							}
							//echo    $worksheet['workorder_no'] ;
							$data['oneworkorderdata'][] = array(
								'workorder_no' => $worksheetworkorderno,
								'client_name' => $worksheet['client_name'],
								'created_on' => $worksheet['created_on'],
								'assign_to' => $worksheet['assign_to'],
								'type_of_work' => $worksheet['type_of_work'],
								'partner_in_charge' => $worksheet['partner_in_charge'],
								'start_date' => $worksheet['start_date'],
								'targetted_end_date' => $worksheet['targetted_end_date'],
								'deadline' => $worksheet['deadline'],
							);
							break;
							// echo $worksheet['workorder_no'] ;var_dump( $data['oneworkorderdata']);
						}
					}
					foreach ($data['fetch_data'] as $worksheet) {
						$starttime = chop($worksheet['start_time'], "amp");
						$endtime = chop($worksheet['end_time'], "amp");
						$start_time = strtotime($starttime);
						$end_time = strtotime($endtime);
						$timespent = ($end_time - $start_time) / 60;
						$data['workesheetdata'][] = array(
							'workorder_no' => $worksheet['workorder_no'],
							//'created_on' => $worksheet['created_on'],
							//'client_name' => $worksheet['client_name'],
							'name_of_employee' => $worksheet['employee_name'],
							'date' => $worksheet['date'],
							'work_description' => $worksheet['work_description'],
							'start_time' => $worksheet['start_time'],
							'end_time' => $worksheet['end_time'],
							'spent_time' => $timespent . 'minutes',
							'remarks' => $worksheet['remarks']
						);
					}
				}
			} else {
				//echo "not null in url";
				if ($usertype == 1) {
					$data['workorderno'] = $this->workorder_model->getWorkOrderNo();
					/// for dropdown
					foreach ($data['workorderno'] as $worksheet) {
						$data['workorderdetails'][] = array(
							'workorder_no' => $worksheet['workorder_no'],
							'client_name' => $worksheet['client_name'],
							'created_on' => $worksheet['created_on'],
							'assign_to' => $worksheet['assign_to'],
							'type_of_work' => $worksheet['type_of_work'],
							'partner_in_charge' => $worksheet['partner_in_charge'],
							'start_date' => $worksheet['start_date'],
							'targetted_end_date' => $worksheet['targetted_end_date'],
							'deadline' => $worksheet['deadline'],
						);
					}
					//return;
					$resultsworkorder = $this->workorder_model->getOneWorkOrder($workidnumber);
					foreach ($resultsworkorder as $assignworkorderno) {
						$workid = $assignworkorderno['workorder_no'];
						$array['number1'] = str_replace('"', '',  $assignworkorderno['assign_to']);
						$array['number2'] = str_replace(']', '',    $array['number1']);
						$array['number3'] = str_replace('[', '',    $array['number2']);
						$array['number4'] = explode(',',  $array['number3']);
						foreach ($array['number4'] as $assignworkordernonumber4) {
							$data['userdetails'] = $this->workorder_model->getAssignToUsers($assignworkordernonumber4);
							foreach ($data['userdetails'] as $userdetails) {
								$data['userdetails1'][] = array(
									'name' => $userdetails['name'],
									'balunand_id_no' => $userdetails['balunand_id_no'],
									'student_reg_no' => $userdetails['student_reg_no']
									// 'assign_to' => $userdetails['assign_to'],  
									//'leadname'=>$userdetails['name'],
									//  'user_id'=>$userdetails['user_id']
								);
							}
						}
						$data['oneworkorderdata'][] = array(
							'workorder_no' => $assignworkorderno['workorder_no'],
							'client_name' => $assignworkorderno['client_name'],
							'created_on' => $assignworkorderno['created_on'],
							'assign_to' => $assignworkorderno['assign_to'],
							'type_of_work' => $assignworkorderno['type_of_work'],
							'partner_in_charge' => $assignworkorderno['partner_in_charge'],
							'start_date' => $assignworkorderno['start_date'],
							'targetted_end_date' => $assignworkorderno['targetted_end_date'],
							'deadline' => $assignworkorderno['deadline'],
						);
					}
					$data['fetch_data'] = $this->workorder_model->fetchworkordersheetdata($workidnumber);
					foreach ($data['fetch_data'] as $worksheet) {
						$starttime = chop($worksheet['start_time'], "amp");
						$endtime = chop($worksheet['end_time'], "amp");
						$start_time = strtotime($starttime);
						$end_time = strtotime($endtime);
						$timespent = ($end_time - $start_time) / 60;
						$data['workesheetdata'][] = array(
							'workorder_no' => $worksheet['workorder_no'],
							//'created_on' => $worksheet['created_on'],
							//'client_name' => $worksheet['client_name'],
							'name_of_employee' => $worksheet['employee_name'],
							'date' => $worksheet['date'],
							'work_description' => $worksheet['work_description'],
							'start_time' => $worksheet['start_time'],
							'end_time' => $worksheet['end_time'],
							'spent_time' => $timespent . 'minutes',
							'remarks' => $worksheet['remarks']
						);
					}
				}
				// <!-- ///////usertype 1 end process -->
				// var_dump($usertype);
				/// to display  workorder number in drop down 
				if ($usertype != 1) {
					//  var_dump($workidnumber);
					$data['workorderno'] = $this->workorder_model->getWorkOrderNo();
					foreach ($data['workorderno'] as $worksheet) {
						$workids = $worksheet['workorder_no'];
						$aids = $worksheet['assign_to'];
						// var_dump($aids);
						$array['number1'] = str_replace('"', '',  $worksheet['assign_to']);
						$array['number2'] = str_replace(']', '',    $array['number1']);
						$array['number3'] = str_replace('[', '',    $array['number2']);
						$array['number4'] = explode(',',  $array['number3']);
						// var_dump($array['number4']);
						// echo "<br>";
						if (in_array($loggedInUserId, $array['number4'])) {
							//echo $workids;
							$data['workorderdetails'][] = array(
								'workorder_no' => $worksheet['workorder_no'],
								'client_name' => $worksheet['client_name'],
								'created_on' => $worksheet['created_on'],
								'assign_to' => $worksheet['assign_to'],
								'type_of_work' => $worksheet['type_of_work'],
								'partner_in_charge' => $worksheet['partner_in_charge'],
								'start_date' => $worksheet['start_date'],
								'targetted_end_date' => $worksheet['targetted_end_date'],
								'deadline' => $worksheet['deadline'],
							);
						}
						//  return;
					}
					//<!-- for dropdown filter  end process -->
					$resultsworkorder = $this->workorder_model->getOneWorkOrder($workidnumber);
					foreach ($resultsworkorder as $assignworkorderno) {
						$workid = $assignworkorderno['workorder_no'];
						$array['number1'] = str_replace('"', '',  $assignworkorderno['assign_to']);
						$array['number2'] = str_replace(']', '',    $array['number1']);
						$array['number3'] = str_replace('[', '',    $array['number2']);
						$array['number4'] = explode(',',  $array['number3']);
						if (in_array($loggedInUserId, $array['number4'])) {
							foreach ($array['number4'] as $assignworkordernonumber4) {
								$data['userdetails'] = $this->workorder_model->getAssignToUsers($assignworkordernonumber4);
								foreach ($data['userdetails'] as $userdetails) {
									$data['userdetails1'][] = array(
										'name' => $userdetails['name'],
										'balunand_id_no' => $userdetails['balunand_id_no'],
										'student_reg_no' => $userdetails['student_reg_no']
										// 'assign_to' => $userdetails['assign_to'],  
										//'leadname'=>$userdetails['name'],
										//  'user_id'=>$userdetails['user_id']
									);
								}
							}
							$data['oneworkorderdata'][] = array(
								'workorder_no' => $assignworkorderno['workorder_no'],
								'client_name' => $assignworkorderno['client_name'],
								'created_on' => $assignworkorderno['created_on'],
								'assign_to' => $assignworkorderno['assign_to'],
								'type_of_work' => $assignworkorderno['type_of_work'],
								'partner_in_charge' => $assignworkorderno['partner_in_charge'],
								'start_date' => $assignworkorderno['start_date'],
								'targetted_end_date' => $assignworkorderno['targetted_end_date'],
								'deadline' => $assignworkorderno['deadline'],
							);
						}
					}
					$data['fetch_data'] = $this->workorder_model->fetchworkordersheetdata($workidnumber);
					foreach ($data['fetch_data'] as $worksheet) {
						$starttime = chop($worksheet['start_time'], "amp");
						$endtime = chop($worksheet['end_time'], "amp");
						$start_time = strtotime($starttime);
						$end_time = strtotime($endtime);
						$timespent = ($end_time - $start_time) / 60;
						$data['workesheetdata'][] = array(
							'workorder_no' => $worksheet['workorder_no'],
							//'created_on' => $worksheet['created_on'],
							//'client_name' => $worksheet['client_name'],
							'name_of_employee' => $worksheet['employee_name'],
							'date' => $worksheet['date'],
							'work_description' => $worksheet['work_description'],
							'start_time' => $worksheet['start_time'],
							'end_time' => $worksheet['end_time'],
							'spent_time' => $timespent . 'minutes',
							'remarks' => $worksheet['remarks']
						);
					}
				}
			}
			$this->load->view('template/header');
			$this->load->view('template/navigation');
			$this->load->view('view_workorder',  $data);
			$this->load->view('template/footer');
		}
	}
	public function ajaxworkorder()
	{
		$this->load->model('workorder_model');
		$postData = $this->input->post('typeofworkid');
		$getTypeofWorkPrefix = $this->workorder_model->getTypeofWorkPrefix($postData);
		$getTypeofWork = $this->workorder_model->fetch_workorder_data();
		$result[] = array(
			'workorder_no' => '1',
			'prefix' => $getTypeofWorkPrefix,
		);
		echo json_encode($result);
	}
	function registerNow()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			//$this->form_validation->set_rules('workorder_no', 'Workorder No', 'required');
			// $this->form_validation->set_rules( 'created_on', 'Created On', 'required' );
			// $this->form_validation->set_rules( 'client_name', 'Name of the Client', 'required' );
			// $this->form_validation->set_rules( 'type_of_work', 'Type of Work', 'required' );
			// $this->form_validation->set_rules( 'partner_in_charge', 'Partner in Charge', 'required' );
			// $this->form_validation->set_rules( 'start_date', 'Start Date', 'required' );
			// $this->form_validation->set_rules( 'targetted_end_date', 'Targetted End Date', 'required' );
			// $this->form_validation->set_rules( 'deadline', 'Deadline', 'required' );
			// $this->form_validation->set_rules( 'assign_to', 'Assign To', 'required' );
			// $this->form_validation->set_rules( 'remarks', 'Remarks', 'required' );
			if (
				$this->form_validation->run() == true  ||
				$this->form_validation->run() == false
			) {
				$workorder_no = $this->input->post('workorder_no');
				$created_on = $this->input->post('created_on');
				$client_name = $this->input->post('client_name');
				$type_of_work = $this->input->post('type_of_work');
				$partner_in_charge = $this->input->post('partner_in_charge');
				$start_date = $this->input->post('start_date');
				$targetted_end_date = $this->input->post('targetted_end_date');
				$deadline = $this->input->post('deadline');
				$assign_to = $this->input->post('assign_to');
				$assign_tojson = json_encode($assign_to);
				// $assign_to['assign_to'] = array();
				//   var_dump(  $assign_tojson);
				//  var_dump(  $assign_to );
				// return; 
				//
				$remarks = $this->input->post('remarks');
				$data = array(
					'workorder_no' => $workorder_no,
					'created_on' => $created_on,
					'client_name' => $client_name,
					'type_of_work' => $type_of_work,
					'partner_in_charge' => $partner_in_charge,
					'start_date' => $start_date,
					'targetted_end_date' => $targetted_end_date,
					'deadline' => $deadline,
					'assign_to' => $assign_tojson,
					//$data['assign_to'] = array();
					'remarks' => $remarks,
					'status' => 'open'
				);
				// var_dump( $data);
				$this->load->model('workorder_model');
				$this->load->model('main_model');
				$this->workorder_model->insertuser($data);




				$this->session->set_flashdata('success', 'Successfully User Created');
				redirect(base_url('workorder/view_workorder'));
			}
		}
	}
}