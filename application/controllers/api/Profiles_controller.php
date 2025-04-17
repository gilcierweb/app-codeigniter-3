<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profiles_controller extends CI_Controller
{
	public $benchmark;
	public $hooks;
	public $config;
	public $log;
	public $utf8;
	public $uri;
	public $router;
	public $output;
	public $security;
	public $input;
	public $lang;
	public $load;
	public $form_validation;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('profile_model');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$profiles = $this->profile_model->all();

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($profiles));
	}
	public function show($id)
	{
		$profile = $this->profile_model->find($id);

		if ($profile) {
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($profile));
		} else {
			show_404();
		}
	}
	public function create()
	{
		$this->load->library('form_validation', 'input');

		$data = json_decode($this->input->raw_input_stream, true);

		if ($this->validation($data)) {
			$this->output
				->set_content_type('application/json')
				->set_status_header(201)
				->set_output(json_encode(['status' => 'success', 'Message' => "Success"]))->_display();
			exit;
		} else {
			$this->output
				->set_content_type('application/json')
				->set_status_header(400)
				->set_output(json_encode(['status' => 'error', 'Message' => "Error"]))->_display();
			exit;
		}
	}
	public function update($id)
	{
		$this->load->library('form_validation', 'input');

		$data = json_decode($this->input->raw_input_stream, true);

		if ($this->validation($data)) {
			$this->output
				->set_content_type('application/json')
				->set_status_header(200)
				->set_output(json_encode(['status' => 'success', 'Message' => "Success"]))->_display();
			exit;
		} else {
			$this->output
				->set_content_type('application/json')
				->set_status_header(400)
				->set_output(json_encode(['status' => 'error', 'Message' => "Error"]))->_display();
			exit;
		}
	}
	public function delete($id)
	{
		$this->profile_model->delete($id);

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(['status' => 'success']));
	}
	public function validation($data)
	{
		$this->form_validation->set_data($data);
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'required');

		if ($this->form_validation->run() == FALSE) {
			return false;
		} else {
			return true;
		}
	}
	
	}
