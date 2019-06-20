<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_Dashboard
 *
 * @author X45LDB
 */
class M_Dashboard extends CI_Model {

    function index() {
        $exec = $this->db->select('usr_adm.nik,usr_adm.uname,mst_karyawan.lokasi_kerja')
                ->select('(select count(lap_rencana.nopen) from lap_rencana where usr_adm.nik=lap_rencana.nik and month(lap_rencana.syscreatedate) = month(curdate()) and year(lap_rencana.syscreatedate) = year(curdate())) as totri')
                ->select('(select count(lap_interaksi.nopen) from lap_interaksi where usr_adm.nik=lap_interaksi.nik and month(lap_interaksi.syscreatedate) = month(curdate()) and year(lap_interaksi.syscreatedate) = year(curdate())) as tothi')
                ->from('usr_adm')
                ->join('lap_rencana', 'usr_adm.nik = lap_rencana.nik', 'left')
                ->join('lap_interaksi', 'usr_adm.nik = lap_interaksi.nik', 'left')
                ->join('mst_karyawan', 'usr_adm.nik = mst_karyawan.nik', 'left')
                ->where('usr_adm.hak_akses', 10)
                ->group_by('usr_adm.nik')
                ->get()
                ->result();
        return $exec;
    }

}
