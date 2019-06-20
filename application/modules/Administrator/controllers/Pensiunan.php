<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pensiunan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Pensiunan');
        $this->result = $this->M_User->SelectUser();
    }

    function index() {
        $data = [
            'title' => 'Administrator | ' . $this->result[0]->uname,
            'formtitle' => 'MASTER DATA PENSIUNAN',
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict,
            'value' => $this->M_Pensiunan->index()
        ];
        $data['content'] = $this->load->view('Administrator/V_Pens', $data, true);
        $this->load->view('template', $data);
    }

    function Getdata() {
        $param = ['provinsi' => str_replace('+', ' ', $this->uri->segment(4, 0)), 'kota_kab' => str_replace('+', '', $this->uri->segment(5, 0))];
        $data = [
            'title' => 'Administrator | ' . $this->result[0]->uname,
            'formtitle' => 'MASTER DATA PENSIUNAN',
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict,
            'value' => $this->M_Pensiunan->Getdata($param)
        ];
        $data['content'] = $this->load->view('Administrator/V_Pensiunan', $data, true);
        $this->load->view('template', $data);
    }

}
