<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Sales extends CI_Model {

    function MDatasales() {
        $exec = $this->db->SELECT('upper(mst_karyawan.nama_karyawan) as nama_karyawan, mst_karyawan.nik, mst_karyawan.telepon1, mst_karyawan.telepon2, mst_karyawan.tgl_lahir, mst_karyawan.alamat, mst_karyawan.kelurahan, mst_karyawan.kecamatan, mst_karyawan.kota')
                ->FROM('usr_adm')
                ->join('mst_karyawan', 'usr_adm.nik = mst_karyawan.nik')
                ->WHERE(['mst_karyawan.status' => 1, 'hak_akses' => 10])
                ->get()
                ->result();
        return $exec;
    }

    function Details($nik) {
        $exec = $this->db->select('nik, nama_karyawan, jenis_kelamin, tgl_lahir, alamat, kelurahan, kecamatan, kota, kodepos, telepon1, telepon2, email, status_perkawinan, status_karyawan, tanggal_masuk, lokasi_kerja, format(mst_karyawan.penpok,0) as penpok')
                ->from('mst_karyawan')
                ->where(['nik' => $nik, 'status' => 1])
                ->get()
                ->result();
        return $exec;
    }

    function Datasales($data) {
        $exec = $this->db->select()
                ->FROM('usr_adm')
                ->join(['mst_karyawan' => 'usr_adm.nik = mst_karyawan.nik', 'norut' => 'mst_karyawan.nik = norut.nik'])
                ->WHERE('hak_akses', 10)
                ->where('norut.spv', $data)
                ->or_where('hak_akses', 3)
                ->where('norut.spv', $data)
                ->get()
                ->result();
        return $exec;
    }

    function Simpan($data) {
        $this->db->trans_start();
        $this->db->query('insert into mst_karyawan (nama_karyawan,nik,jenis_kelamin,tgl_lahir,alamat,telepon1,email,status_perkawinan,status_karyawan,tanggal_masuk,lokasi_kerja,penpok,`status`,syscreateuser,syscreatedate) values("' . $data['nama_karyawan'] . '",' . $data['nik'] . ',' . $data['jenis_kelamin'] . ',"' . $data['tgl_lahir'] . '","' . $data['alamat'] . '","' . $data['telepon1'] . '","' . $data['email'] . '","' . $data['status_perkawinan'] . '","' . $data['status_karyawan'] . '","' . $data['tanggal_masuk'] . '","' . $data['lokasi_kerja'] . '",' . $data['penpok'] . ',1,' . $this->session->userdata('id') . ',now());');
        $this->db->query('insert into m_salesarea ( nik, provinsi, kabupaten, kecamatan, kelurahan, syscreateuser,syscreatedate ) values (' . $data['nik'] . ',"' . $data['provinsi'] . '","' . $data['kabupaten'] . '","' . $data['kecamatan'] . '","' . $data['kelurahan'] . '", ' . $this->session->userdata('id') . ',now())');
        $this->db->query('insert into usr_adm ( usr_adm.nik, usr_adm.uname, usr_adm.usr_mail, usr_adm.hak_akses, usr_adm.pict ) values ( ' . $data['nik'] . ', "' . $data['nama_karyawan'] . '", "' . $data['email'] . '", 10, "assets\images\user\marketing.png" )');
        $this->db->query('insert into norut(`norut`, `nik`, `spv`) values (20, 14112018, 14112018)');
        $this->db->trans_complete();
        if ($this->db->trans_status() === false) {
            $response = array('status' => 'error', 'msg' => 'data gagal disimpan !');
        } else {
            $response = array('status' => 'success', 'msg' => 'data berhasil disimpan :)');
        }
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    function Provinsi() {
        $exec = $this->db->select('m_kodepos.provinsi')
                ->from('m_kodepos')
                ->group_by('m_kodepos.provinsi')
                ->get()
                ->result();
        return $exec;
    }

    function Kabupaten($data) {
        $exec = $this->db->select('m_kodepos.kabupaten')
                ->from('m_kodepos')
                ->where('m_kodepos.provinsi', $data)
                ->group_by('m_kodepos.kabupaten')
                ->order_by('m_kodepos.kabupaten', 'ASC')
                ->get()
                ->result();
        $a[0] = array('kabupaten' => 'PILIH KABUPATEN');
        $b = array_merge($a, $exec);
        return $b;
    }

    function Getkecamatan($data) {
        $exec = $this->db->select('m_kodepos.kecamatan')
                ->from('m_kodepos')
                ->where('m_kodepos.provinsi', $data['provinsi'])
                ->where('m_kodepos.kabupaten', $data['kabupaten'])
                ->group_by('m_kodepos.kecamatan')
                ->order_by('m_kodepos.kecamatan', 'ASC')
                ->get()
                ->result();
        $a[0] = array('kecamatan' => 'PILIH KECAMATAN');
        $b = array_merge($a, $exec);
        return $b;
    }

    function Getkelurahan($data) {
        $exec = $this->db->select('m_kodepos.kelurahan')
                ->from('m_kodepos')
                ->where(['m_kodepos.provinsi' => $data['provinsi'], 'm_kodepos.kabupaten' => $data['kabupaten'], 'm_kodepos.kecamatan' => $data['kecamatan']])
                ->group_by('m_kodepos.kelurahan')
                ->order_by('m_kodepos.kelurahan', 'ASC')
                ->get()
                ->result();
        $a[0] = array('kelurahan' => 'PILIH KELURAHAN');
        $b = array_merge($a, $exec);
        return $b;
    }

    function Getkodepos($data) {
        $exec = $this->db->select('m_kodepos.kodepos')
                ->from('m_kodepos')
                ->where(['m_kodepos.provinsi' => $data['provinsi'], 'm_kodepos.kabupaten' => $data['kabupaten'], 'm_kodepos.kecamatan' => $data['kecamatan'], 'm_kodepos.kelurahan' => $data['kelurahan']])
                ->get()
                ->result();
        return $exec;
    }

    function Hapus($id) {
        $this->db->trans_begin();
        $this->db->set('mst_karyawan.status', 2)
                ->where('nik', $id)
                ->update('mst_karyawan');
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
        }
    }

}
