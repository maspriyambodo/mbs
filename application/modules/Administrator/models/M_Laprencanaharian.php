<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Laprencanaharian extends CI_Model {

    function index() {
        $exec = $this->db->select('norut.norut, norut.nik, upper(mst_karyawan.nama_karyawan) as nama_karyawan,(select time(syscreatedate) from lap_rencana where norut.nik = lap_rencana.nik and date(syscreatedate)=date(curdate()) and time(syscreatedate) > "00:00:00" group by nik) as jam, (select count(lap_rencana.nopen) from lap_rencana where norut.nik = lap_rencana.nik and date(syscreatedate)=date(curdate())) as rencana')
                ->from('norut')
                ->join('mst_karyawan', 'norut.nik = mst_karyawan.nik')
                ->group_by('norut.nik')
                ->order_by('norut.norut')
                ->get()
                ->result();
        return $exec;
    }

}
