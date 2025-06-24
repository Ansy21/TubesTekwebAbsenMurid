<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi_model extends CI_Model {

    public function simpan_absen($data) {
        return $this->db->insert_batch('absensi', $data);
    }

    public function get_absen_by_date($tanggal) {
        $this->db->select('absensi.*, murid.nama_murid, murid.kelas');
        $this->db->from('absensi');
        $this->db->join('murid', 'absensi.murid_id = murid.id');
        $this->db->where('tanggal', $tanggal);
        return $this->db->get()->result();
    }

    public function rekap_per_murid($kelas = null, $tanggal = null) {
        $this->db->select('m.id, m.nama_murid, m.kelas, 
            SUM(CASE WHEN a.status = "Hadir" THEN 1 ELSE 0 END) AS hadir,
            SUM(CASE WHEN a.status = "Sakit" THEN 1 ELSE 0 END) AS sakit,
            SUM(CASE WHEN a.status = "Izin" THEN 1 ELSE 0 END) AS izin,
            SUM(CASE WHEN a.status = "Alpa" THEN 1 ELSE 0 END) AS alpa');
        $this->db->from('murid m');
        $this->db->join('absensi a', 'm.id = a.murid_id', 'left');
    
        if ($kelas) {
            $this->db->where('m.kelas', $kelas);
        }
    
        if ($tanggal) {
            $this->db->where('a.tanggal', $tanggal);
        }
    
        $this->db->group_by('m.id');
        return $this->db->get()->result();
    }
    
}
