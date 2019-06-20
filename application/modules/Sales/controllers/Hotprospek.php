<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hotprospek extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Hotprospek');
        $this->result = $this->M_User->Marketing();
    }

    function index() {
        $data = [
            'title' => 'MARKETING | ' . $this->result[0]->uname,
            'formtitle' => 'Laporan Hot Prospek',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict,
            'pens' => $this->M_Hotprospek->index($this->result)
        ];
        $data['content'] = $this->load->view('V_Hotprospek', $data, true);
        $this->load->view('template', $data);
    }

}
