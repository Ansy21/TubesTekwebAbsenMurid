<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Murid_model extends CI_Model {

  public function tambah($data) {
    return $this->db->insert('murid', $data);
  }

  public function get_all() {
    return $this->db->get('murid')->result();
  }

}
