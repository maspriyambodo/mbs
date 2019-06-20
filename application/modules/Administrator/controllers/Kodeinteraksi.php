<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kodeinteraksi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Kodeinteraksi');
        $this->result = $this->M_User->SelectUser();
    }

    function index() {
        $data = [
            'title' => 'Administrator | ' . $this->result[0]->uname,
            'formtitle' => 'Master data kode interaksi',
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict,
            'kodeint' => $this->M_Kodeinteraksi->index()
        ];
        $data['content'] = $this->load->view('Administrator/V_KodeInteraksi', $data, true);
        $this->load->view('template', $data);
    }

    function Edit() {
        $data = [
            'keterangan' => $this->input->post('keterangan'),
            'kode_kunjungan' => $this->input->post('kode_kunjungan')
        ];
        $this->M_Kodeinteraksi->Edit($data);
    }

}
