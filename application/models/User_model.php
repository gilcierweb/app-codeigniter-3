<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * User Model
 *
 * This model handles the database operations for the users table.
 *
 * @package     CodeIgniter
 * @category    Model
 * @author      Gilcierweb
 * @link        https://codeigniter.com/userguide3/database/query_builder.html
 */

class User_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function find($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('users');
		return $query->row();
	}
	public function all()
	{
		$query = $this->db->get('users');
		return $query->result();
	}

	public function users_profiles()
	{
		$this->db->select('users.*, profiles.*');
		$this->db->from('users');
		$this->db->join('profiles', 'profiles.user_id = users.id');
		$query = $this->db->get();
	
		return $query->result();
	}
	
	public function insert($data)
	{
		return $this->db->insert('users', $data);
	}
	public function update($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('users', $data);
	}
	public function delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('users');
	}
	public function by_email($email)
	{
		$this->db->where('email', $email);
		$query = $this->db->get('users');
		return $query->row();
	}
}
