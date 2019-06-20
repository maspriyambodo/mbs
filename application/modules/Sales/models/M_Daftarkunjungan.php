<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Daftarkunjungan extends CI_Model {

    function index($result) {
        $exec = $this->db->distinct()
                ->select('mst_datapens.NAMAPENSIUNAN,mst_datapens.TGL_LAHIR_PENSIUNAN,mst_datapens.NAMA_PENERIMA,mst_datapens.TGL_LAHIR_PENERIMA,mst_datapens.ALM_PESERTA,mst_datapens.KELURAHAN,mst_datapens.KECAMATAN,mst_datapens.KOTA_KAB,mst_datapens.PROVINSI,mst_datapens.NOTAS')
                ->from('mst_datapens')
                ->join('lap_rencana', 'mst_datapens.NOTAS = lap_rencana.nopen', 'LEFT')
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
