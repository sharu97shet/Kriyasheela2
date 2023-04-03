<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contactform extends CI_Controller
{


	public function __construct()
	{
		/*call CodeIgniter's default Constructor*/
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');

		/*load database libray manually*/
		$this->load->database();

		/*load Model*/
		$this->load->model('Contactform_Model');
	}

	// edit_submit_index function

	function edit_submit_index()
	{

		#log_message('debug', 'sql query fail in... ', false);

		$action = $this->input->post('submit');


		$data = array(
			'name' => $this->input->post('firstname'),
			// 'names' => $this->input->post('firstnamessss'),
			'email' => $this->input->post('email'),
			'subject' => $this->input->post('subject'),
			'organization' => $this->input->post('organization'),
			'message' =>  nl2br($this->input->post('message')),
		);


		//print_r($data);
		$this->load->model('Contactform_Model');
		$validate = $this->Contactform_Model->submit_index($data);

		if ($validate) {

			// redirect('https://aaplweb.co.in/balunand/');

			redirect(base_url());
		} else {
			echo "error while inserting data";
		}
	}
}