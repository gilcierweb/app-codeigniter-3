<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users_controller extends CI_Controller
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
		$this->load->model('user_model');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$users = $this->user_model->all();

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($users));
	}

	public function show($id)
	{
		$user = $this->user_model->find($id);

		if ($user) {
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($user));
		} else {
			show_404();
		}
	}
	public function create()
	{
		$this->load->library('form_validation', 'input');

		$data = json_decode($this->input->raw_input_stream, true);

		// $this->user_model->insert($data);

		if ($this->validation($data)) {
			$this->output
				->set_content_type('application/json')
				->set_status_header(201)
				->set_output(json_encode(['status' => 'success', 'Message' => "Success"]))->_display();
		} else {
			$this->output
				->set_content_type('application/json')
				->set_status_header(400)
				->set_output(json_encode(['status' => 'error', 'message' => validation_errors()]))->_display();
		}
	}
	public function update($id)
	{
		$data = json_decode($this->input->raw_input_stream, true);

		$this->user_model->update($id, $data);

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(['status' => 'success']));
	}
	public function delete($id)
	{
		$this->user_model->delete($id);

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(['status' => 'success']));
	}

	function validation($data)
	{
		$this->load->library('form_validation', 'input');
		// gambiarra codeigniter 3
		$this->form_validation->set_data($data);

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

		if ($this->form_validation->run() == FALSE) {
			return false;
		} else {
			$username = $data['username'];
			$email = $data['email'];
			$password = $data['password'];

			$this->db->where('email', $email);
			$query = $this->db->get('users');

			if ($query->num_rows() > 0) {
				$this->form_validation->set_message('email', 'The {field} field must be unique.');
				$this->output->set_content_type('application/json')
					->set_status_header(400)
					->set_output(json_encode(['status' => 'error', 'message' => 'Email already exists']))->_display();
				return false;
			}

			$encrypted_password = password_hash($password, PASSWORD_BCRYPT);

			$data = array(
				'username' => $username,
				'email' => $email,
				'password' => $encrypted_password
			);

			$this->user_model->insert($data);

			return true;
		}
	}
}
