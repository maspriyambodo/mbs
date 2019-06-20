<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Salary extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Salary');
        $this->result = $this->M_User->SelectUser();
    }

    function index() {
        if ($this->result[0]->hak_akses == 1) {
            $data = [
                'title' => 'Dashboard | PT MARSIT BANGUN SEJAHTERA',
                'formtitle' => 'laporan pendapatan sales',
                'id' => $this->result[0]->id,
                'uname' => $this->result[0]->uname,
                'usr_mail' => $this->result[0]->usr_mail,
                'hak_akses' => $this->result[0]->hak_akses,
                'pict' => $this->result[0]->pict,
                'reportmonthly' => $this->M_Salary->MReportMonthly()
            ];
        } else {
            $data = [
                'title' => 'Dashboard | PT MARSIT BANGUN SEJAHTERA',
                'formtitle' => 'laporan pendapatan sales',
                'id' => $this->result[0]->id,
                'uname' => $this->result[0]->uname,
                'usr_mail' => $this->result[0]->usr_mail,
                'hak_akses' => $this->result[0]->hak_akses,
                'pict' => $this->result[0]->pict,
                'reportmonthly' => $this->M_Salary->ReportMonthly($this->result[0]->nik)
            ];
        }
        $data['content'] = $this->load->view('Administrator/V_Salary', $data, true);
        $this->load->view('template', $data);
    }

}
