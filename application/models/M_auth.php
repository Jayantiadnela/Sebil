<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {


	public function pendaftaran($data)
	{
		return $this->db->insert('user', $data);
	}

	public function cariuser($email)
	{
		 return $this->db->get_where('user', ['email_user' => $email])->row_array();
	}
}
