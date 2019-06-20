<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Daftarkunjungan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Daftarkunjungan');
        $this->result = $this->M_User->Marketing();
    }

    function index() {
        $data = [
            'title' => 'MARKETING | ' . $this->result[0]->uname,
            'formtitle' => 'daftar rencana kunjungan',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict,
            'Value' => $this->M_Daftarkunjungan->index($this->result),
            'hitung' => $this->M_Daftarkunjungan->Hitung($this->result)
        ];
        $data['content'] = $this->load->view('V_Daftarkunjungan', $data, true);
        $this->load->view('template', $data);
    }

//    function index() {
//        $hitung = $this->M_Daftarkunjungan->Hitung($this->result);
//        if ($hitung[0]->nopen >= 15) {
//            $data = array(
//                'title' => 'MARKETING | ' . $this->result[0]->uname,
//                'formtitle' => 'daftar rencana kunjungan',
//                'id' => $this->result[0]->id,
//                'uname' => $this->result[0]->uname,
//                'usr_mail' => $this->result[0]->usr_mail,
//                'hak_akses' => $this->result[0]->hak_akses,
//                'pict' => $this->result[0]->pict,
//                'Value' => $this->M_Daftarkunjungan->index($this->result)
//            );
//            $data['content'] = $this->load->view('V_Daftarkunjungan', $data, true);
//            $this->load->view('template', $data);
//        } else {
//            echo '<script>alert("Anda belum membuat daftar kunjungan hari ini");window.location.href="' . base_url('Sales/Caridata/index') . '";</script>';
//        }
//    }
}
