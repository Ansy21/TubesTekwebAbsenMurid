<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_model extends CI_Model {

  public function login($username, $password) {
    return $this->db->get_where('guru', [
      'username' => $username,
      'password' => md5($password)
    ])->row();
  }
}
