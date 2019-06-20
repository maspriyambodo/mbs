<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pencairan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Pencairan');
        $this->result = $this->M_User->Marketing();
    }

    function index() {
        $data = [
            'title' => 'MARKETING | ' . $this->result[0]->uname,
            'formtitle' => 'Form input data pencairan',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict,
            'pens' => $this->M_Pencairan->index($this->result)
        ];
        $data['content'] = $this->load->view('V_Pencairan', $data, true);
        $this->load->view('template', $data);
    }

    function Simpan() {
        $data = [
            'tgl_pencairan' => $this->input->post('tgl_pencairan'),
            'nom_tb' => number_format($this->input->post('nom_plafond'), 0),
            'nopen' => $this->input->post('notas'),
            'sysupdateuser' => $this->result[0]->nik,
            'sysupdatedate' => date("Y-m-d H:i:s")
        ];
        $this->M_Pencairan->Simpan($this->security->xss_clean($data));
    }

    function Hasil() {
        $data = [
            'title' => 'MARKETING | ' . $this->result[0]->uname,
            'formtitle' => 'Laporan hasil pencairan',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict,
            'hasilpencairan' => $this->M_Pencairan->Hasil($this->result)
        ];
        $data['content'] = $this->load->view('V_Pencairanhasil', $data, true);
        $this->load->view('template', $data);
    }

}
