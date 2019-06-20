<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Simulasi extends CI_Model {

    function index($NOTAS) {
        $ex = $this->db->distinct('*')
                ->from('mst_datapens')
                ->where('NOTAS', $NOTAS)
                ->limit(1)
                ->get()
                ->result();
        return $ex;
    }

    function Simulasi2($result) {
        $query = $this->db->distinct('*')
                ->from('mst_datapens')
                ->where(' NOT EXISTS ( SELECT * FROM lap_rencana WHERE mst_datapens.NOTAS = lap_rencana.nopen )')
                ->where('mst_datapens.PROVINSI', $result[0]->provinsi)
                ->like('mst_datapens.KOTA_KAB', $result[0]->kabupaten)
                ->where('YEAR ( CURDATE( ) ) - YEAR ( TGL_LAHIR_PENERIMA ) BETWEEN 70 AND 80 ')
                ->like('mst_datapens.NMKANBYR', 'BTPN')
                ->where('status', 1)
                ->order_by('mst_datapens.KELURAHAN')
                ->get()
                ->result();
        return $query;
    }

    function Simpan($data) {
        $this->db->insert('lap_simulasi', $data);
        return;
    }

    function Hasil($result) {
        $exec = $this->db->select('lap_interaksi.nopen,lap_interaksi.syscreatedate,lap_interaksi.pensiunan,lap_interaksi.penerima,lap_interaksi.alamat,lap_interaksi.kelurahan,lap_interaksi.kecamatan,lap_interaksi.telepon,lap_simulasi.pict')
                ->from('lap_simulasi')
                ->join('lap_interaksi', 'lap_simulasi.nopen = lap_interaksi.nopen', 'LEFT')
                ->where('lap_simulasi.nik', $result[0]->nik)
                ->group_by('lap_simulasi.nopen')
                ->order_by('lap_interaksi.syscreatedate', 'DESC')
                ->get()
                ->result();
        return $exec;
    }

}
