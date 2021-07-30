<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WelcomeModel extends CI_Model {
    public function login($data) {
        $this->db->select('nama, username, status');
        $this->db->from('user');
		$this->db->where($data);
        $query = $this->db->get();
        return $query;
    }
}