<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_User
 *
 * @author X45LDB
 */
class M_User extends CI_Model {

    function CheckUser($data) {
        $this->db->cache_on();
        $exec = $this->db->select('usr_adm.id, usr_adm.uname, usr_adm.usr_mail, usr_adm.hak_akses,usr_adm.nik, usr_adm.pict')
                ->from('usr_adm')
                ->where(['usr_adm.uname' => $data['uname'], 'usr_adm.pwd' => sha1($data['pwd'])])
                ->limit(1)
                ->get();
        if ($exec->num_rows() == 1) {
            return $exec->result();
        } else {
            $this->session->sess_destroy();
        }
    }

    function SelectUser() {
        $this->db->cache_on();
        $exec = $this->db->select('*')
                ->from('usr_adm')
                ->where('usr_adm.nik', $this->session->userdata('nik'))
                ->where('hak_akses', 1)
                ->or_where('hak_akses', 3)
                ->where('usr_adm.nik', $this->session->userdata('nik'))
                ->get()
                ->result();
        if ($exec == false) {
            echo '<script>alert("You do not have permission to access");</script>';
            $this->session->sess_destroy();
            redirect('Login', 'refresh');
        } else {
            return $exec;
        }
    }

    function HRIS() {
        $this->db->cache_on();
        $exec = $this->db->select('*')
                ->from('usr_adm')
                ->where('usr_adm.nik', $this->session->userdata('nik'))
                ->where('hak_akses', 2)
                ->get()
                ->result();
        if ($exec == FALSE) {
            echo '<script>alert("You do not have permission to access");</script>';
            $this->session->sess_destroy();
            redirect('Login', 'refresh');
        } else {
            return $exec;
        }
    }

    function Marketing() {
        $this->db->cache_on();
        $exec = $this->db->distinct()
                ->select('*, m_salesarea.kelurahan as lurah')
                ->from('usr_adm')
                ->join('mst_karyawan', 'usr_adm.nik = mst_karyawan.nik')
                ->join('m_salesarea', 'usr_adm.nik = m_salesarea.nik')
                ->where('usr_adm.nik', $this->session->userdata('nik'))
                ->where('hak_akses', 10)
                ->or_where('usr_adm.nik', $this->session->userdata('nik'))
                ->where('hak_akses', 3)
                ->get()
                ->result();
        if ($exec == FALSE) {
            echo '<script>alert("You do not have permission to access");</script>';
            $this->session->sess_destroy();
            redirect('Login', 'refresh');
        } else {
            return $exec;
        }
    }

}
