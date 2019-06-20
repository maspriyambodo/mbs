<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Salesarea extends CI_Model {

    function MSalesarea() {
        $exec = $this->db->distinct()
                ->select('m_salesarea.id,usr_adm.hak_akses, usr_adm.nik as nik,mst_karyawan.nama_karyawan,m_salesarea.provinsi,m_salesarea.kabupaten,m_salesarea.kecamatan,m_salesarea.kelurahan')
                ->from('usr_adm')
                ->join('m_salesarea', 'usr_adm.nik = m_salesarea.nik', 'left')
                ->join('mst_karyawan', 'usr_adm.nik = mst_karyawan.nik', 'left')
                ->where('usr_adm.hak_akses', 10)
                ->where('mst_karyawan.`status`', 1)
                ->or_where('usr_adm.hak_akses', 3)
                ->where('mst_karyawan.`status`', 1)
                ->get()
                ->result();
        return $exec;
    }

    function Salesarea($nik) {
        $exec = $this->db->select('*')
                ->from('m_salesarea')
                ->join('mst_karyawan', 'm_salesarea.nik = mst_karyawan.nik')
                ->join('norut', 'mst_karyawan.nik = norut.nik')
                ->where('mst_karyawan.`status`', 1)
                ->where('norut.spv', $nik)
                ->get()
                ->result();
        return $exec;
    }

    function Checknik($data) {
        $exec = $this->db->select('nik')
                ->from('m_salesarea')
                ->where('nik', $data['nik'])
                ->count_all_results();
        if ($exec > 0) {
            $msg = array(
                'status' => "error",
                'msg' => "Gagal, sales telah memiliki sales area !"
            );
        } else {
            $exec = $this->db->select('nik')
                    ->from('mst_karyawan')
                    ->where('nik', $data['nik'])
                    ->count_all_results();
            if ($exec == 0) {
                $msg = array(
                    'status' => "error",
                    'msg' => "Gagal, sales belum terdaftar pada data karyawan !"
                );
            } else {
                $this->Simpan($data);
            }
        }
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($msg, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    function Simpan($data) {
        $insert = array(
            'id' => '',
            'nik' => $data['nik'],
            'provinsi' => $data['provinsi'],
            'kabupaten' => $data['kabupaten'],
            'kecamatan' => $data['kecamatan'],
            'kelurahan' => $data['kelurahan'],
            'limit_data' => 100,
            'syscreateuser' => $this->session->userdata('nik'),
            'syscreatedate' => ''
        );
        $this->db->trans_start();
        $this->db->set('syscreateuser', $this->session->userdata('nik'));
        $this->db->insert('m_salesarea', $data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $msg = array(
                'status' => "error",
                'msg' => "Gagal, data gagal disimpan !"
            );
        } else {
            $msg = array(
                'status' => "success",
                'msg' => "Berhasil, data berhasil disimpan !"
            );
        }
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($msg, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    function Update($data) {
        $this->db->trans_start();
        $this->db->set('provinsi', $data['provinsi']);
        $this->db->set('kabupaten', $data['kabupaten']);
        $this->db->set('kecamatan', $data['kecamatan']);
        $this->db->set('kelurahan', $data['kelurahan']);
        $this->db->set('sysupdateuser', $this->session->userdata('nik'));
        $this->db->set('sysupdatedate', date("Y-m-d h:i:s"));
        $this->db->where('nik', $data['nik']);
        $this->db->update('m_salesarea');
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $msg = array(
                'status' => "error",
                'msg' => "Gagal, Perubahan gagal disimpan !"
            );
        } else {
            $msg = array(
                'status' => "succes",
                'msg' => "Berhasil, Perubahan berhasil disimpan !"
            );
        }
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($msg, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    function GetSalesArea($id) {
        $exec = $this->db->select('m_salesarea.id,m_salesarea.nik,mst_karyawan.nama_karyawan,m_salesarea.provinsi,m_salesarea.kabupaten,m_salesarea.kecamatan,m_salesarea.kelurahan')
                ->from('mst_karyawan')
                ->join('m_salesarea', 'mst_karyawan.nik = m_salesarea.nik')
                ->where('m_salesarea.id', $id)
                ->get()
                ->result();
        $data = array(
            'status' => 'success',
            'idsalesarea' => $exec[0]->id,
            'niksalesarea' => $exec[0]->nik,
            'provsalesarea' => $exec[0]->provinsi,
            'kabsalesarea' => $exec[0]->kabupaten,
            'camatsalesarea' => $exec[0]->kecamatan,
            'lurahsalesarea' => $exec[0]->kelurahan,
            'namakaryawan' => $exec[0]->nama_karyawan
        );
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    function Provinsi() {
        $exec = $this->db->DISTINCT()
                ->select('provinsi')
                ->from('m_kodepos')
                ->order_by('provinsi')
                ->get()
                ->result();
        return $exec;
    }

    function Kabupaten() {
        $exec = $this->db->DISTINCT()
                ->select('kabupaten')
                ->from('m_kodepos')
                ->order_by('kabupaten')
                ->get()
                ->result();
        return $exec;
    }

    function Kecamatan() {
        $exec = $this->db->DISTINCT()
                ->select('kecamatan')
                ->from('m_kodepos')
                ->order_by('kecamatan')
                ->get()
                ->result();
        return $exec;
    }

    function Kelurahan() {
        $exec = $this->db->DISTINCT()
                ->select('kelurahan')
                ->from('m_kodepos')
                ->order_by('kelurahan')
                ->get()
                ->result();
        return $exec;
    }

}
