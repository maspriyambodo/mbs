<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_rencanaharian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Laprencanaharian');
        $this->result = $this->M_User->SelectUser();
    }

    function index() {
        $data = [
            'title' => 'REPORT MARKETING | ' . date("F Y"),
            'formtitle' => 'laporan rencana harian',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict,
            'tot' => $this->M_Laprencanaharian->index()
        ];
        $data['content'] = $this->load->view('Administrator/V_Laprencanaharian', $data, true);
        $this->load->view('template', $data);
    }

}
