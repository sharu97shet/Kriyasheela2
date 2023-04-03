<?php
defined('BASEPATH') or exit('No direct script access allowed');

class worksheet extends CI_Controller
{


	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 
	 * config/routes.php, it's displayed at http://example.com/
	 
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html 
	 
	 */

	// function __construct()
	// {
	//   parent::__construct();

	// } 


	//index function//

	public function index()
	{

		if ($this->session->userdata('balunand_id_no') == '') {
			//echo "not logged in";      

			redirect(base_url() . 'main/login');
		} else {

			$this->load->model('worksheet_model');

			$data['workorder'] = $this->worksheet_model->getWorkOrder();

			$data['workGiven'] = $this->worksheet_model->getUsers();

			foreach ($data['workorder'] as $workId) {
				$data['workerorderno'][] = array(
					'id' => $workId['workorder_no']

				);
			}

			foreach ($data['workGiven'] as $userdetails) {
				$data['workGivenBy'][] = array(
					'username' => $userdetails['name']

				);
			}


			$this->load->view('template/header');
			$this->load->view('template/navigation');
			$this->load->view('worksheet_form', $data);
			$this->load->view('template/footer');
		}
	}

	function createWorksheet()
	{
		//echo "<h1>www</h1>";

		$this->load->model('worksheet_model');

		$loggedInEmployee = $this->session->userdata('username');

		$loggedInUserId = $this->session->userdata('userId');



		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			//echo "<h1>www</h1>";
			// $this->form_validation->set_rules('username','User Name','required');
			// $this->form_validation->set_rules('email','Email','required');
			// $this->form_validation->set_rules('password','Password','required');

			if ($this->form_validation->run() == FALSE) {
				//echo "true";

				$workorder = $this->input->post('workorder');
				$date = $this->input->post('date');
				$clientname = $this->input->post('client_name');
				$Description = $this->input->post('Description');

				//$WorkGiven = $this->input->post('WorkGiven');
				$remarks = $this->input->post('remarks');
				$Starttime = $this->input->post('start_time');

				//	var_dump($Starttime); var_dump($Starttime_in_24_hour_format); var_dump($Endtime_in_24_hour_format);

				$Endtime = $this->input->post('End_time');

				$Starttime_in_24_hour_format  = date("H:i", strtotime($Starttime));

				$Endtime_in_24_hour_format  = date("H:i", strtotime($Endtime));

				// return;


				$breaktimefrom = $this->input->post('breakfrom');
				$breaktimeto = $this->input->post('breakto');

				$data = array(
					'workorder_no' => $workorder,
					'employee_name' => $loggedInEmployee,
					'user_id' => $loggedInUserId,
					'Date' => $date,
					'work_description' => $Description,
					//'work_given_by'=>$WorkGiven,
					'remarks' => $remarks,
					'start_time' => $Starttime_in_24_hour_format,
					'end_time' => $Endtime_in_24_hour_format,
					'breaktime_from' => $breaktimefrom,
					'breaktime_to' => $breaktimeto,


				);

				//       print_r($data);

				//return;


				$this->worksheet_model->insertWorkSheet($data);
				$this->session->set_flashdata('success', 'Successfully Worksheet Created');
				redirect(base_url('worksheet/worksheetview'));
			}
		}
	}

	public function worksheetview()
	{

		$this->load->model('worksheet_model');

		$this->load->model('user_model');

		$loggedInUserId = $this->session->userdata('userId');

		$data['worksheet'] = $this->worksheet_model->getWorkSheet($loggedInUserId);

		// var_dump($data['worksheet']);


		$usertype = $this->user_model->getUsersType($loggedInUserId);

		// var_dump($usertype);


		$loggedInEmployee = $this->session->userdata('username');

		$loginbalunand_id_no = $this->session->userdata('balunand_id_no');

		//var_dump($loginstudentregno);

		$data['loginuserdetails'] = $this->worksheet_model->worksheetIndividualDataForLoginUsers($loginbalunand_id_no);

		// var_dump($data['loginuserdetails']);




		foreach ($data['loginuserdetails'] as $worksheet) {
			if ($usertype == 3) {


				$data['workesheetuloginuserdetails'][] = array(
					'userid' => $worksheet['user_id'],
					'name' => $loggedInEmployee,
					'partner_under_whom_registered' => $worksheet['partner_under_whom_registered'],
					'student_reg_no' => $worksheet['student_reg_no'],
					//'employee_id' => $worksheet['employee_id'],
					'startdate' => $worksheet['date_of_comencement_of_articleship'],
					'CompletingOn' => $worksheet['date_of_completion_of_articleship'],

				);
			} else if ($usertype == 2) {

				$data['workesheetuloginuserdetails'][] = array(
					'userid' => $worksheet['user_id'],
					'name' => $loggedInEmployee,
					'partner_under_whom_registered' => $worksheet['partner_under_whom_registered'],
					'student_reg_no' => $worksheet['student_reg_no'],
					'balunand_id_no' => $worksheet['balunand_id_no'],
					'startdate' => $worksheet['date_of_comencement_of_employment'],
					'CompletingOn' => $worksheet['date_of_completion_of_employment'],

				);
			} else {


				$data['workesheetuloginuserdetails'][] = array(
					'userid' => $worksheet['user_id'],
					'name' => $loggedInEmployee,
					'partner_under_whom_registered' => $worksheet['partner_under_whom_registered'],
					'student_reg_no' => $worksheet['student_reg_no'],
					'balunand_id_no' => $worksheet['balunand_id_no'],
					'startdate' => '',
					'CompletingOn' => '',

				);
			}
		}

		foreach ($data['worksheet'] as $worksheet) {
			$starttime = chop($worksheet['breaktime_from'], "amp");

			//echo $starttime;

			$Starttime_in_12_hour_format  = date("g:i a", strtotime($worksheet['start_time']));

			$Endtime_in_12_hour_format  = date("g:i a", strtotime($worksheet['end_time']));

			$endtime = chop($worksheet['breaktime_to'], "amp");

			$start_time = strtotime($starttime);

			$end_time = strtotime($endtime);

			$timespent = ($end_time - $start_time) / 60;

			if (!empty($data['worksheet'])) {

				//echo "www";
				$data['workesheetdata'][] = array(
					'workorder_no' => $worksheet['workorder_no'],
					'client_name' => $worksheet['client_name'],
					'date' => $worksheet['date'],
					'work_description' => $worksheet['work_description'],
					'work_given_by' => $worksheet['partner_in_charge'],
					'remarks' => $worksheet['remarks'],
					'start_time' => $Starttime_in_12_hour_format,
					'end_time' => $Endtime_in_12_hour_format,
					'spent_time' => $timespent,

				);
			}
		}

		// var_dump(	$data['workesheetdata']);  
		$this->load->view('template/header');
		$this->load->view('template/navigation');

		$this->load->view('worksheet_view', $data);
		$this->load->view('template/footer');
	}


	//// to fetch clientname 

	public function getClientName()

	{

		$postData = $this->input->post();

		//var_dump ($postData);

		$this->load->model('worksheet_model');

		$data = $this->worksheet_model->getWorkOrderClientName($postData);

		// var_dump( $data);

		echo json_encode($data);
	}


	public function timevalidation()
	{
		$postDate = $this->input->post('worksheetdate');

		$start_time = $this->input->post('start');

		$Endtime = $this->input->post('end');

		//var_dump($postDate);
		//var_dump($start_time);

		//var_dump($Endtime);

		$this->load->model('worksheet_model');

		$loggedInUserId = $this->session->userdata('userId');

		$Starttime_in_24_hour_format  = date("H:i", strtotime($start_time));

		$Endtime_in_24_hour_format  = date("H:i", strtotime($Endtime));

		//var_dump($Starttime_in_24_hour_format);//var_dump($Endtime_in_24_hour_format);

		$data = $this->worksheet_model->getWorkSheetDetails($postDate, $Starttime_in_24_hour_format, $Endtime_in_24_hour_format, $loggedInUserId);

		if (is_numeric($data)) {

			//echo "first";

			//echo "me";// $json=array('success'=>$data.' '.true);

			$json = array('success' => true);

			$message['success'] = true;
		} else if ($data == 'no data') {
			//echo "you else part";
			$json = array('success' => false);

			$message['success'] = true;
		} else {

			echo "third";
			$json = array('success' => 'else part');
		}



		echo json_encode($json['success']);
		//echo json_encode($Endtime); 

	}
}