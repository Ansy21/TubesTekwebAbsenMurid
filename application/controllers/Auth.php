<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Guru_model');
  }

  public function index() {
    $this->load->view('login');
  }

  public function login() {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $guru = $this->Guru_model->login($username, $password);

    if ($guru) {
      $this->session->set_userdata('guru', $guru);
      redirect('dashboard');
    } else {
      $this->session->set_flashdata('error', 'Username atau Password salah');
      redirect('auth');
    }
  }

  public function logout() {
    $this->session->unset_userdata('guru');
    redirect('auth');
  }
}
