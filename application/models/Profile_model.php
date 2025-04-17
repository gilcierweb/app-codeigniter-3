<?php

defined('BASEPATH') or exit('No direct script access allowed');
class 	Profile_model extends CI_Model{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function find($user_id)
	{
		$this->db->where('id', $user_id);
		$query = $this->db->get('profiles');
		return $query->row();
	}
	public function all()
	{
		$query = $this->db->get('profiles');
		return $query->result();
	}
	public function insert($data)
	{
		return $this->db->insert('profiles', $data);
	}
	public function update($user_id, $data)
	{
		$this->db->where('id', $user_id);
		return $this->db->update('profiles', $data);
	}
	public function delete($user_id)
	{
		$this->db->where('id', $user_id);
		return $this->db->delete('profiles');
	}

}
