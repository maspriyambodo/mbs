<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kodeinteraksi extends CI_Model {

    function index() {
        $exec = $this->db->select('*')
                ->from('mst_kodeinteraksi')
                ->get()
                ->result();
        return $exec;
    }

    function Edit($data) {
        $this->db->trans_start();
        $this->db->set('keterangan', $data['keterangan']);
        $this->db->where('kode_kunjungan', $data['kode_kunjungan']);
        $this->db->update('mst_kodeinteraksi');
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $response = array(
                'status' => 'error',
                'msg' => 'Gagal, data gagal diubah !'
            );
        } else {
            $response = array(
                'status' => 'success',
                'msg' => 'Berhasil, data berhasil diubah!'
            );
        }
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

}
