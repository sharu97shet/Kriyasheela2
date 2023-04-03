<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function index()
	{

		$this->load->view('template/header');

		$this->load->view('template/navigation1');

		$this->load->view('template/login');
		//$this->load->view('home');

		$this->load->view('template/footer');
	}
}
