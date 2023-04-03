<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

	// main login function

	function index()
	{
		$this->login();
	}

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');

		$this->load->model('main_model');

		// Load the todo model to make it available 
		// to *all* of the controller's actions 
		$this->load->helper('url');
	}

	function login()
	{


		$this->load->view('template/header');

		$this->load->view('template/navigation1');

		$this->load->view('template/login');
	}

	public   function dashboard()

	{

		$this->load->helper('url');

		if ($this->session->userdata('balunand_id_no') == '') {

			redirect(base_url() . 'main/login');
		}

		$data['countworkorder'] = $this->main_model->countWorkorder();

		$data['countclents'] = $this->main_model->countclients();

		$data['countusers'] = $this->main_model->countusers();

		$data['pendingWorkorders'] = $this->main_model->pendingWorkorder();

		$data['pendingWorkorderDetails1'] = $this->main_model->pendingWorkorderDetails();

		//var_dump($data['pendingWorkorderDetails1']);

		$loggedInUserId = $this->session->userdata('userId');

		foreach ($data['pendingWorkorderDetails1']  as $worknumber) {
			$array['number1'] = str_replace('"', '',  $worknumber['assign_to']);
			$array['number2'] = str_replace(']', '',    $array['number1']);
			$array['number3'] = str_replace('[', '',    $array['number2']);
			$array['number4'] = explode(',',  $array['number3']);

			if (in_array($loggedInUserId, $array['number4'])) {


				$data['pendingWorkorderDetails2'][] = array(
					'workordernumber' => $worknumber['workorder_no']
				);
			}
			//  else {

			// 	$data['pendingWorkorderDetails2'][] = array(
			// 		'workordernumber' => ''
			// 	);
			// }
		}

		if (count($data['pendingWorkorderDetails1']) > 0) {
			$count = 0;

			$this->session->set_userdata('countnotify', $data['pendingWorkorders']);

			$count++;
		}

		//	var_dump($data['pendingWorkorderDetails']);

		//http://localhost/tutorial/codeigniter/main/dashboard
		$data['title'] = 'Balu & Anand, Chartered Accountants';

		if (isset($_SESSION['usertype'])) {
			$data['usertype'] = $_SESSION['usertype'];
			// echo "if";

		}

		$data['usertype'] = $_SESSION['usertype'];


		$this->load->view('template/header');

		$this->load->view('template/navigation');

		$this->load->view('template/dashboard', $data);

		$this->load->view('template/footer');
	}

	function edit_submit_index()
	{
		$this->load->helper('url');

		$action = $this->input->post['submit'];

		$data = array(
			'name' => $this->input->post('firstname'),
			'email' => $this->input->post('email'),
			'subject' => $this->input->post('subject'),
			'organization' => $this->input->post('organization'),
			'message' =>  nl2br($this->input->post('message')),
		);
		//print_r( $data );
		$this->load->model('Main_model');
		$validate = $this->Main_model->submit_index($data);

		redirect(base_url());
	}

	public function login_validation()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('balunand_id_no', 'balunand_id_no', 'required');

		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run()) {

			//true
			$balunand_id_no = $this->input->post('balunand_id_no');

			$password = md5($this->input->post('password'));

			//model function
			$this->load->model('main_model');

			if ($this->main_model->can_login($balunand_id_no, $password)) {

				$record = $this->main_model->can_login($balunand_id_no, $password);

				//var_dump($record);



				$usertype = $this->main_model->getUsersType($record);

				var_dump($usertype);



				$username = $this->main_model->getUserName($record);

				echo "username $username";

				var_dump($username);

				//return;

				$session_data = array(
					'balunand_id_no' => $balunand_id_no,
					//'student_reg_no'=> $student_reg_no,
					'usertype'     => $usertype,
					'username'     => $username,
					'userId' => $record

				);

				//var_dump($session_data);

				//return;

				//https://getbootstrap.com/docs/5.0/forms/layout/

				$_SESSION['usertype'] = $session_data['usertype'];

				// var_dump( $_SESSION['usertype']);

				//return;

				$this->session->set_userdata($session_data);

				redirect(base_url() . 'main/dashboard');

				//redirect('https://aaplweb.co.in/balunand/kriyasheela/main/dashboard');
			} else {

				$this->session->set_flashdata('error', 'Invalid balunand_id_no and Password');

				redirect(base_url() . 'main/login');
			}
		} else {

			//false
			$this->login();
		}
	}

	function enter()
	{

		if ($this->session->userdata('balunand_id_no') != '') {

			echo '<h2>Welcome - ' . $this->session->userdata('balunand_id_no') . '</h2>';

			echo '<label><a href="' . base_url() . 'main/logout">Logout</a></label>';
		} else {

			redirect(base_url() . 'main/login');
		}
	}

	function logout()
	{

		$this->session->unset_userdata('balunand_id_no');
		$this->session->unset_userdata('usertype');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('userId');

		redirect(base_url() . 'main/login');
	}
}