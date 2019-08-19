<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Laprencanaharian extends CI_Model {

    function index() {
        $exec = $this->db->select('upper( mst_karyawan.nama_karyawan ) AS nama_karyawan,( SELECT time( syscreatedate) FROM lap_rencana WHERE usr_adm.nik = lap_rencana.nik AND date( syscreatedate )= date( curdate()) AND time( syscreatedate ) > "00:00:00" GROUP BY usr_adm.nik ) AS jam,( SELECT count( lap_rencana.nopen) FROM lap_rencana WHERE usr_adm.nik = lap_rencana.nik AND date( syscreatedate )= date( curdate())) AS rencana')
                ->from('usr_adm')
                ->join('mst_karyawan', 'usr_adm.nik = mst_karyawan.nik')
                ->where(['usr_adm.hak_akses' => 10, 'mst_karyawan.`status`' => 1])
                ->group_by('usr_adm.nik')
                ->order_by('usr_adm.nik')
                ->get()
                ->result();
        return $exec;
    }

}
