<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pencairan extends CI_Model {

    function index($result) {
        $exec = $this->db->select('lap_interaksi.nopen,lap_interaksi.pensiunan')
                ->from('lap_interaksi')
                ->where('lap_interaksi.nik', $result[0]->nik)
                ->where('lap_interaksi.nom_tb', 'NOT NULL')
                ->get()
                ->result();
        return $exec;
    }

    function Simpan($data) {
        $this->db->trans_begin();
        $this->db->set($data)
                ->where('lap_interaksi.nopen', $data['nopen'])
                ->where('lap_interaksi.nik', $data['sysupdateuser'])
                ->update('lap_interaksi');
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $response = array('statusCode' => 400, 'msg' => 'Error, Data gagal disimpan !');
        } elseif ($this->db->affected_rows() == 0) {
            $this->db->trans_rollback();$response = array('statusCode' => 202, 'msg' => 'Error, Data tidak ditemukan !');
        } else {
            $this->db->trans_commit();
            $response = array('statusCode' => 200, 'msg' => 'Success, Data berhasil disimpan !');
        }
        $this->output
                ->set_status_header($response['statusCode'])
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    function Hasil($result) {
        $exec = $this->db->distinct('*')
                ->from('lap_interaksi')
                ->where('lap_interaksi.nik', $result[0]->nik)
                ->where('lap_interaksi.nom_tb >', 1)
                ->get()
                ->result();
        return $exec;
    }

}
