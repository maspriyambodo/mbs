<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Caridata extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('M_Caridata');
        $this->result = $this->M_User->Marketing();
    }

    function index() {
        $data = [
            'title' => 'Dashboard | PT MBS',
            'formtitle' => 'cari data pensiunan',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict,
            'potensi' => $this->M_Caridata->Potensi($this->result)
        ];
        $data['content'] = $this->load->view('V_Caridata', $data, true);
        $this->load->view('template', $data);
    }

    function Getdata() {
        $cari = ['provinsi' => str_replace("+", " ", $this->uri->segment(4, 0)), 'kabupaten' => str_replace("+", " ", $this->uri->segment(5, 0)), 'kecamatan' => str_replace("+", " ", $this->uri->segment(6, 0)), 'kelurahan' => str_replace("+", " ", $this->uri->segment(7, 0))];
        $data = [
            'title' => 'MARKETING | ' . $this->result[0]->uname,
            'formtitle' => 'jumlah potensi tersedia',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict,
            'value' => $this->M_Caridata->Hasil($cari)
        ];
        $data['content'] = $this->load->view('V_Caridatahasil', $data, true);
        $this->load->view('template', $data);
    }

    function Simpan() {
        $nopen = $this->input->post('notas');
        $this->M_Caridata->Simpan($nopen);
    }

}
