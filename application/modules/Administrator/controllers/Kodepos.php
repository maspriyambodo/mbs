<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kodepos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Kodepos');
        $this->result = $this->M_User->SelectUser();
    }

    function index() {
        $data = [
            'title' => 'Administrator | ' . $this->result[0]->uname,
            'formtitle' => 'MASTER DATA KODEPOS',
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict
        ];
//        $this->load->view('Header', $data);
//        $this->load->view('Administrator/V_Kodepos', $data);
//        $this->load->view('Footer', $data);
        $data['content'] = $this->load->view('Administrator/V_Kodepos', $data, true);
        $this->load->view('template', $data);
    }

    function Getkdpos() {
        $this->M_Kodepos->Kodepos();
    }

}
