<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Murid extends CI_Controller {
    private $daftar_kelas = ['1A', '1B', '1C', '1D'];
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('guru')) {
            redirect('auth');
        }
        $this->load->model('Murid_model');
    }

    public function tambah() {
        $data['kelas'] = $this->daftar_kelas;
        $this->load->view('tambah_murid', $data);
    }

    public function simpan() {
        $data = [
            'nama_murid' => $this->input->post('nama_murid'),
            'nis'        => $this->input->post('nis'),
            'kelas'      => $this->input->post('kelas')
        ];

        $this->Murid_model->tambah($data);
        $this->session->set_flashdata('sukses', 'Murid berhasil ditambahkan.');
        redirect('murid/tambah');
    }

    public function index($kelas = null) {
        if ($kelas) {
            $this->db->where('kelas', $kelas);
            $data['judul'] = "Daftar Murid Kelas $kelas";
        } else {
            $data['judul'] = "Daftar Semua Murid";
        }
        $data['murid'] = $this->db->get('murid')->result();
        $data['kelas'] = $this->daftar_kelas;
        $data['kelas_aktif'] = $kelas;
        $this->load->view('daftar_murid', $data);
    }


    public function edit($id) {
        $data['murid'] = $this->db->get_where('murid', ['id' => $id])->row();
        $data['kelas'] = $this->daftar_kelas;
        $this->load->view('edit_murid', $data);
    }

    public function update() {
        $data = [
        'nama_murid' => $this->input->post('nama_murid'),
        'nis'        => $this->input->post('nis'),
        'kelas'      => $this->input->post('kelas')
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('murid', $data);
        $this->session->set_flashdata('sukses', 'Data murid berhasil diupdate.');
        redirect('murid/index');
    }

    public function hapus($id) {
        $this->db->delete('murid', ['id' => $id]);
        $this->session->set_flashdata('sukses', 'Data murid berhasil dihapus.');
        redirect('murid/index');
    }

    public function absen_form() {
        $data['murid'] = $this->Murid_model->get_all();
        $this->load->view('absen_form', $data);
    }
    
    public function simpan_absen() {
        $tanggal = $this->input->post('tanggal');
        $absen_data = [];
    
        foreach ($this->input->post('status') as $murid_id => $status) {
            $absen_data[] = [
                'murid_id' => $murid_id,
                'tanggal'  => $tanggal,
                'status'   => $status
            ];
        }
    
        $this->load->model('Absensi_model');
        $this->Absensi_model->simpan_absen($absen_data);
        $this->session->set_flashdata('sukses', 'Absensi berhasil disimpan.');
        redirect('murid/absen_form');
    }

    public function rekap() {
        $kelas = $this->input->get('kelas');
        $tanggal = $this->input->get('tanggal');
    
        $this->load->model('Absensi_model');
        $data['rekap'] = $this->Absensi_model->rekap_per_murid($kelas, $tanggal);
        $data['kelas'] = $this->daftar_kelas;
        $data['kelas_aktif'] = $kelas;
        $data['tanggal'] = $tanggal;
    
        $this->load->view('rekap_absensi', $data);
    }
    
    
}
