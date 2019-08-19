<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kodepos extends CI_Model {

    function Kodepos() {
        $exec = $this->db->select('m_kodepos.kelurahan, m_kodepos.kecamatan, m_kodepos.kabupaten, m_kodepos.provinsi, m_kodepos.kodepos')->from('m_kodepos')->get()->result();
        $this->output->set_status_header(200)->set_content_type('application/json', 'utf-8')->set_output(json_encode($exec, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
        exit;
        return $exec;
    }

}
