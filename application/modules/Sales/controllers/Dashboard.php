<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Dashboard');
        $this->result = $this->M_User->Marketing();
    }

    function index() {
        $data = [
            'title' => 'Dashboard',
            'formtitle' => 'Dashboard Sales',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict,
            'value' => $this->M_Dashboard->Interaksi($this->result),
            'chart' => $this->M_Dashboard->Chart($this->result)
        ];
        $data['content'] = $this->load->view('V_Dashboard', $data, true);
        $this->load->view('template', $data);
    }

    function Trychart() {
        $data = [
            'title' => 'Dashboard',
            'formtitle' => '',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict
        ];
        $data['content'] = $this->load->view('V_Trychart', $data, true);
        $this->load->view('template', $data);
    }

}
