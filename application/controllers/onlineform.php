<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Onlineform extends CI_Controller
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
		$this->load->model('Onlineformmodel');
	}
	// edit_submit_index function

	function edit_submit_index()
	{
		$action = $this->input->post('submit');

		$data['resume'] = $this->input->post('resume');

		$config['upload_path'] = './uploads/';
		// Directory
		$config['allowed_types'] = 'pdf|doc|docx';
		//type of images allowed
		$config['max_size'] = '30720';
		//Max Size
		// For unique image name at a time
		$this->load->library('upload');

		$this->upload->initialize($config);
		//File Uploading library
		$this->upload->do_upload('resume');
		// input name which have to upload
		$video_upload = $this->upload->data();
		//

		$data = [
			'name' => $this->input->post('firstname'),
			'email' => $this->input->post('email'),
			'address' => $this->input->post('address'),
			'educational_qualification' => $this->input->post('qualifications'),
			'experience' => $this->input->post('experience'),
			'resume' => $video_upload['full_path'],
		];

		//print_r($data);
		$this->load->model('Onlineformmodel');
		$validate = $this->Onlineformmodel->submit_index($data);

		if ($validate) {
			redirect(base_url());
		} else {
			echo "error while inserting data";
		}
	}
}
