<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Simulasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Simulasi');
        $this->result = $this->M_User->Marketing();
    }

    function index($NOTAS) {
        $data = [
            'title' => 'MARKETING | ' . $this->result[0]->uname,
            'formtitle' => 'penghitungan Simulasi kredit',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict,
            'Simulasi' => $this->M_Simulasi->index($NOTAS)
        ];
        $data['content'] = $this->load->view('V_Simulasi', $data, true);
        $this->load->view('template', $data);
    }

    function Simulasi2() {
        $data = [
            'title' => 'MARKETING | ' . $this->result[0]->uname,
            'formtitle' => 'penghitungan Simulasi kredit',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict,
            'Value' => $this->M_Simulasi->Simulasi2($this->result)
        ];
        $data['content'] = $this->load->view('V_Simulasi2', $data, true);
        $this->load->view('template', $data);
    }

    function Simpan() {
        $data = [
            'id' => '',
            'nik' => $this->result[0]->nik,
            'nopen' => $this->input->post('notas'),
            'pict' => $this->input->post('simulasi', FALSE)
        ];
        $simpan = $this->M_Simulasi->Simpan($data);
        if ($simpan == TRUE) {
            echo json_encode(["status" => 'success']);
            exit;
        } else {
            echo json_encode(["status" => 'error']);
            exit;
        }
    }

    function Hasil() {
        $data = [
            'title' => 'MARKETING | ' . $this->result[0]->uname,
            'formtitle' => 'Hasil Simulasi Kredit',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict,
            'hasilpencairan' => $this->M_Simulasi->Hasil($this->result)
        ];
        $data['content'] = $this->load->view('V_Simulasihasil', $data, true);
        $this->load->view('template', $data);
    }

}
