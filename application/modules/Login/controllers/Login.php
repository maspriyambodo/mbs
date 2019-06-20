<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    function index() {
        if ($this->session->userdata('nama') == "") {
            $data = array(
                'title' => 'LOGIN USER'
            );
            $this->load->view('V_Login', $data);
        } else {
            if ($this->session->userdata('hakakses') == 1) {
                redirect('Administrator/Dashboard/index', 'refresh');
            } elseif ($this->session->userdata('hakakses') == 3) {
                redirect('Sales/Dashboard/index', 'refresh');
            } elseif ($this->session->userdata('hakakses') == 10) {
                redirect('Sales/Dashboard/index', 'refresh');
            } elseif ($this->session->userdata('hakakses') == 11) {
                redirect('Telemarketing/Dashboard/index', 'refresh');
            }
        }
    }

    function Proses() {
        $data = [
            'uname' => $this->input->post('uname'),
            'pwd' => $this->input->post('nik')
        ];
        $result = $this->M_User->CheckUser($data);
        if ($result == true) {
            $response = array('statusCode' => 200, 'hakakses' => $result[0]->hak_akses);
            $session = array('id' => $result[0]->id, 'nama' => $result[0]->uname, 'mail' => $result[0]->usr_mail, 'hakakses' => $result[0]->hak_akses, 'nik' => $result[0]->nik, 'gambar' => $result[0]->pict);
            $this->session->set_userdata($session);
        } else {
            $response = array('statusCode' => 201, 'message' => 'Maaf, username dan password Anda salah. Harap periksa kembali username dan password Anda.');
        }
        $this->output
                ->set_status_header($response['statusCode'])
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

}
