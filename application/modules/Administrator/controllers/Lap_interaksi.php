<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_interaksi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Lapinteraksi');
        $this->result = $this->M_User->SelectUser();
    }

    function index() {
        if ($this->result[0]->hak_akses == 1) {
            $data = [
                'title' => 'Laporan Interaksi',
                'formtitle' => 'laporan interaksi sales',
                'id' => $this->result[0]->id,
                'uname' => $this->result[0]->uname,
                'usr_mail' => $this->result[0]->usr_mail,
                'hak_akses' => $this->result[0]->hak_akses,
                'pict' => $this->result[0]->pict
            ];
        } else {
            $data = [
                'title' => 'Laporan Interaksi',
                'formtitle' => 'laporan interaksi sales',
                'id' => $this->result[0]->id,
                'uname' => $this->result[0]->uname,
                'usr_mail' => $this->result[0]->usr_mail,
                'hak_akses' => $this->result[0]->hak_akses,
                'pict' => $this->result[0]->pict,
                'marketing' => $this->M_Lapinteraksi->Lapmar($this->result[0]->pict)
            ];
        }
        $data['content'] = $this->load->view('V_Lapinteraksi', $data, true);
        $this->load->view('template', $data);
    }

    function Getreport() {
        $this->M_Lapinteraksi->Getreport();
    }

    function Getdetail($id) {
        $data = [
            'title' => 'Detail laporan marketing',
            'formtitle' => '',
            'uname' => $this->result[0]->uname,
            'hak_akses' => $this->result[0]->hak_akses,
            'usr_mail' => $this->result[0]->usr_mail,
            'id' => $this->result[0]->id,
            'pict' => $this->result[0]->pict,
            'value' => $this->M_Lapinteraksi->Getdetail($id)
        ];
        $data['content'] = $this->load->view('V_detaillapmar', $data, true);
        $this->load->view('template', $data);
    }

}
