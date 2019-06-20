<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usermanagement extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Usermanagement');
        $this->result = $this->M_User->SelectUser();
    }

    function index() {
        $data = [
            'title' => 'Administrator | ' . $this->result[0]->uname,
            'formtitle' => 'master data user management',
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict,
            'usrdata' => $this->M_Usermanagement->index()
        ];
        $data['content'] = $this->load->view('Administrator/V_Usermanagement', $data, true);
        $this->load->view('template', $data);
    }

    function U_Usermng() {
        $data = [
            'nama_karyawan' => $this->input->post('nama_karyawan'),
            'nik' => $this->input->post('nik'),
            'hak_akses' => $this->input->post('hak_akses')
        ];
        $this->M_Usermanagement->U_Usermng($data);
    }

}
