<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_bulanan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Lapbulanan');
        $this->result = $this->M_User->SelectUser();
    }

    function index() {
        if ($this->result[0]->hak_akses == 1) {
            $data = [
                'title' => 'REPORT SALES | ' . date("F Y"),
                'formtitle' => 'laporan bulanan sales',
                'id' => $this->result[0]->id,
                'uname' => $this->result[0]->uname,
                'usr_mail' => $this->result[0]->usr_mail,
                'hak_akses' => $this->result[0]->hak_akses,
                'pict' => $this->result[0]->pict,
                'reportmonthly' => $this->M_Lapbulanan->MReportMonthly($this->result[0]->nik)
            ];
        } else {
            $data = [
                'title' => 'REPORT SALES | ' . date("F Y"),
                'formtitle' => 'laporan bulanan sales',
                'id' => $this->result[0]->id,
                'uname' => $this->result[0]->uname,
                'usr_mail' => $this->result[0]->usr_mail,
                'hak_akses' => $this->result[0]->hak_akses,
                'pict' => $this->result[0]->pict,
                'reportmonthly' => $this->M_Lapbulanan->ReportMonthly($this->result[0]->nik)
            ];
        }
//        $this->load->view('Header', $data);
//        $this->load->view('V_Lapbulanan', $data);
//        $this->load->view('Footer', $data);
        $data['content'] = $this->load->view('V_Lapbulanan', $data, true);
        $this->load->view('template', $data);
    }

}
