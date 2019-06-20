<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Usermanagement extends CI_Model {

    function index() {
        $exec = $this->db->select('usr_adm.nik,usr_adm.hak_akses,mst_karyawan.nama_karyawan')
                ->from('usr_adm')
                ->join('mst_karyawan', 'mst_karyawan on usr_adm.nik = mst_karyawan.nik', 'left')
                ->get()
                ->result();
        return $exec;
    }

    function U_Usermng($data) {
        $this->db->trans_start();
        $this->db->set('hak_akses', $data['hak_akses'])
                ->where('nik', $data['nik'])
                ->update('usr_adm');
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $response = array('status' => 'FALSE');
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
            $response = array('status' => 'TRUE');
        }
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

}
