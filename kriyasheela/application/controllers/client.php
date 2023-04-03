<?php
defined('BASEPATH') or exit('No direct script access allowed');

class client extends CI_Controller
{

	private $error = '';

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

	function __construct()
	{
		parent::__construct();

		$this->load->model('client_model');
	}


	//index function//

	public function index()
	{

		if ($this->session->userdata('balunand_id_no') == '') {
			//echo "not logged in";      

			redirect(base_url() . 'main/login');
		} else {

			$data = '';

			$this->load->view('template/header');

			$this->load->view('template/navigation');

			$this->load->view('client_form', $data);

			$this->load->view('template/footer');
		}
	}

	function createClient()
	{

		// $this->load->model('client_model');

		$loggedInEmployee = $this->session->userdata('username');

		$loggedInUserId = $this->session->userdata('userId');

		$client_info = $this->client_model->duplicatePan($this->input->post('pan'));

		//var_dump($client_info);

		// return;

		if (count($client_info) > 0) {
			$data['error'] = 'The Pan Number is already present in database ';
			$this->session->set_flashdata('clienterror', 'The Pan Number is already present in database');

			redirect(base_url('client/index'));
		}

		if (($_SERVER['REQUEST_METHOD'] == 'POST')) {

			$clientname = $this->input->post('clientname');
			$pan = $this->input->post('pan');
			$gst = $this->input->post('gst');
			$tan = $this->input->post('tan');

			$aadhar = $this->input->post('aadhar');
			$address = $this->input->post('address');
			$person_incharge = $this->input->post('person_incharge');

			$person_to_be_contact = $this->input->post('person_to_be_contact');

			$data = array(
				'name' => $clientname,
				'PAN' => $pan,
				'gst' => $gst,
				'tan' => $tan,
				'aadhar' => $aadhar,
				'address' => $address,
				'person_incharge' => $person_incharge,
				'person_to_be_contact' => $person_to_be_contact,

			);

			//print_r($data);

			//return;

			$this->client_model->insertClient($data);

			$this->session->set_flashdata('success', 'Successfully client Created');

			redirect(base_url('client/clientList'));
		}
	}

	public function validate()
	{
		if ($this->client_model->duplicatePan($this->input->post('pan'))) {

			$this->error = 'The Pan Number is already present in database ';

			var_dump($this->error);
			return !$this->error;
		}
	}


	public function uploadClient()
	{
		$this->load->model('client_model');

		$this->load->library('csvimport');

		if (isset($_POST['submit'])) {
			//echo "yeah submitted";

			$config['allowed_types'] = 'csv';
			$config['max_size'] = '1000';
			$config['upload_path'] = './photos/';

			$this->load->library('upload', $config);

			$this->upload->initialize($config);

			if ($this->upload->do_upload('userfile')) {
				//print_r($this->upload->data());

				//	echo "one uploaded ";

				print_r($this->upload->data('file_name'));

				$file_path =  './photos/' . $this->upload->data('file_name');

				if ($this->csvimport->get_array($file_path)) {
					$csv_array = $this->csvimport->get_array($file_path);

					//print_r($csv_array);
					//					var_dump($csv_array);

					//return;

					foreach ($csv_array as $row) {

						//	var_dump($row['PAN']);

						$client_info = $this->client_model->duplicatePan($row['PAN']);
						// var_dump($client_info);

						// echo "<br>";

						//echo gettype($client_info);

						if (count($client_info) > 0) {

							//	echo "yes if";

							//return;
							foreach ($client_info as $clientrow) {

								if ($clientrow['PAN'] == $row['PAN']) {

									var_dump($clientrow['PAN']);

									echo "yes elseee if";
									//return;
								}
							}
						} else {

							echo "yeah";
							echo "<br>";

							//return;
							$insert_data = array(
								'name' => $row['name'],
								'PAN' => $row['PAN'],
								'GST' => $row['GST'],
								'tan' => $row['tan'],
								'aadhar' => $row['aadhar'],
								'address' => $row['address'],
								'person_incharge' => $row['person_incharge'],
								'person_to_be_contact' => $row['person_to_be_contact'],
							);
							$this->client_model->insert_csv($insert_data);
						}
					}
				}
			}
			$this->session->set_flashdata('success', 'Csv Data Imported Succesfully');

			redirect(base_url() . 'client/index');
		} else {
			echo "else";
			print_r($this->upload->display_errors());

			return;
		}
		$this->load->view('client_form');
	}



	public function clientList()
	{
		$this->load->model('client_model');

		$data['clientdetails'] = $this->client_model->allClients();

		foreach ($data['clientdetails'] as $client) {
			$data['clientdetailsdata'][] = array(
				'client_id ' => $client['client_id'],

				'name' => $client['name'],
				'PAN' => $client['PAN'],
				'GST' => $client['GST'],
				'tan' => $client['tan'],
				'aadhar' => $client['aadhar'],
				'address' => $client['address'],
				'person_incharge' => $client['person_incharge'],
				'person_to_be_contact' => $client['person_to_be_contact'],

			);

			//https://www.youtube.com/watch?v=LxddgOvMrwY https://www.youtube.com/watch?v=sDw9tyDbEV4  https://www.codexworld.com/codeigniter-import-csv-file-data-into-mysql-database/fgetcsv()
		}

		$this->load->view('template/header');

		$this->load->view('template/navigation');

		$this->load->view('template/footer');

		$this->load->view('view_clients', $data);
	}
}