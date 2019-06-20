<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Hotprospek extends CI_Model {

    function index($result) {
        $exec = $this->db->distinct('*')
                ->from('lap_interaksi')
                ->where('nik', $result[0]->nik)
                ->where('hp_nominal >', 1)
                ->get()
                ->result();
        return $exec;
    }

}
