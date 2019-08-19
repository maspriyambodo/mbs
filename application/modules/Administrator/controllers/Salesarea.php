<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Salesarea extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Salesarea');
        $this->result = $this->M_User->SelectUser();
    }

    function index() {
        $data = [
            'title' => 'SUPER Administrator | ' . $this->result[0]->uname,
            'formtitle' => 'data sales area',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict,
            'prov' => $this->M_Salesarea->Provinsi(),
            'kab' => $this->M_Salesarea->Kabupaten(),
            'kec' => $this->M_Salesarea->Kecamatan(),
            'kel' => $this->M_Salesarea->Kelurahan(),
            'salesarea' => $this->M_Salesarea->MSalesarea($this->result[0]->nik)
        ];
        $data['content'] = $this->load->view('V_Salesarea', $data, true);
        $this->load->view('template', $data);
    }

    function Update() {
        $data = [
            'nik' => $this->input->post('nik'),
            'provinsi' => $this->input->post('provinsi'),
            'kabupaten' => $this->input->post('kabupaten'),
            'kecamatan' => $this->input->post('kecamatan'),
            'kelurahan' => $this->input->post('kelurahan')
        ];
        $this->M_Salesarea->Update($data);
    }

    function Simpan() {
        $a = $this->input->post('nik');
        $b = $this->input->post('provinsi');
        $c = $this->input->post('kabupaten');
        $d = $this->input->post('kecamatan');
        $e = $this->input->post('kelurahan');
        if ($a == "" or $b == "" or $c == "" or $d == "" or $e == "") {
            $msg = [
                'status' => "simpanerror",
                'msg' => "Gagal, Mohon lengkapi data sales area !"
            ];
        } else {
            $data = [
                'nik' => $this->input->post('nik'),
                'provinsi' => $this->input->post('provinsi'),
                'kabupaten' => $this->input->post('kabupaten'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kelurahan' => $this->input->post('kelurahan')
            ];
            $this->M_Salesarea->Checknik($data);
        }
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($msg, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    function GetSalesArea() {
        $id = $this->input->post('id');
        $this->M_Salesarea->GetSalesArea($id);
    }

}
