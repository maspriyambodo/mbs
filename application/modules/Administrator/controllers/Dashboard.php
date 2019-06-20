<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Dashboard');
        $this->result = $this->M_User->SelectUser();
    }

    function index() {
        $data = [
            'title' => 'Dashboard | PT MBS',
            'formtitle' => 'Dashboard administrator',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict,
            'value' => $this->M_Dashboard->index()
        ];
//        $this->load->view('Header', $data);
//        $this->load->view('V_Dashboard', $data);
//        $this->load->view('Footer', $data);
        $data['content'] = $this->load->view('V_Dashboard', $data, true);
        $this->load->view('template', $data);
    }

}
