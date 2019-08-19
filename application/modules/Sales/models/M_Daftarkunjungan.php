<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Daftarkunjungan extends CI_Model {

    function index($result) {
        $exec = $this->db->distinct()
                ->select('mst_datapens.namapensiunan,mst_datapens.tgl_lahir_pensiunan,mst_datapens.nama_penerima,mst_datapens.tgl_lahir_penerima,mst_datapens.alm_peserta,mst_datapens.kelurahan,mst_datapens.kecamatan,mst_datapens.kota_kab,mst_datapens.provinsi,mst_datapens.notas')
                ->from('mst_datapens')
                ->join('lap_rencana', 'mst_datapens.notas = lap_rencana.nopen', 'LEFT')
                ->where('lap_rencana.nik', $result[0]->nik)
                ->where('lap_rencana.visit_status', 1)
                ->where('DATE(lap_rencana.syscreatedate)', date("Y-m-d"))
                ->get()
                ->result();
        return $exec;
    }

    function Hitung($result) {
        $exec = $this->db->select('COUNT(lap_rencana.nopen) AS nopen')
                ->from('lap_rencana')
                ->where('nik', $result[0]->nik)
                ->where('DATE(lap_rencana.syscreatedate)', date("Y-m-d"))
                ->get()
                ->result();
        return $exec;
    }

}
