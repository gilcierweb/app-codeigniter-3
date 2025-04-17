<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users_controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
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
		$data = json_decode($this->input->raw_input_stream, true);

		$this->user_model->insert($data);

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(['status' => 'success']));
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
}
