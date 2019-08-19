<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Lapinteraksi extends CI_Model {

    function Getreport() {
        $exec = $this->db->select('DATE(lap_interaksi.syscreatedate) AS syscreatedate,mst_karyawan.nama_karyawan,lap_interaksi.nopen,UPPER(lap_interaksi.pensiunan) AS pensiunan')
                ->from('usr_adm')
                ->join('mst_karyawan', 'usr_adm.nik = mst_karyawan.nik', 'LEFT')
                ->join('lap_interaksi', 'usr_adm.nik = lap_interaksi.nik', 'LEFT')
                ->where(['usr_adm.hak_akses' => 10, 'mst_karyawan.`status`' => 1])
                ->order_by('usr_adm.nik', 'ASC')
                ->get()
                ->result();
        $this->output->set_status_header(200)->set_content_type('application/json', 'utf-8')->set_output(json_encode($exec, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
        exit;
        return $exec;
    }

    function Getdetail($id) {
        $exec = $this->db->select('lap_interaksi.id, lap_interaksi.syscreatedate, lap_interaksi.nopen, lap_interaksi.pensiunan, lap_interaksi.tgl_lahir_pensiunan, lap_interaksi.penerima, lap_interaksi.tgl_lahir_penerima, upper(concat(lap_interaksi.alamat," kel. ", lap_interaksi.kelurahan," kec. ", lap_interaksi.kecamatan,", kota ", lap_interaksi.kabupaten," ", lap_interaksi.provinsi)) as alamatpeserta, lap_interaksi.alamat_baru, lap_interaksi.telepon, lap_interaksi.keterangan, lap_interaksi.alamat_valid, lap_interaksi.bertemu_pensiunan, lap_interaksi.hp_nominal, lap_interaksi.ttd, lap_pict.path, lap_simulasi.pict')
                ->from('lap_interaksi')
                ->join('lap_pict', 'lap_interaksi.nik = lap_pict.nik', 'LEFT')
                ->join('lap_simulasi', 'lap_interaksi.nik = lap_simulasi.nik', 'LEFT')
                ->where('lap_interaksi.nopen', $id)
                ->limit(1)
                ->get()
                ->result();
        return $exec;
    }

}
