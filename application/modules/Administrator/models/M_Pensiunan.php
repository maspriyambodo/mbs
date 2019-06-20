<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pensiunan extends CI_Model {

    function index() {
        $this->db->cache_on();
        $exec = $this->db->select('provinsi, kota_kab, count(provinsi) AS tot')
                ->from('mst_datapens')
                ->group_by('provinsi, kota_kab')
                ->order_by('provinsi')
                ->get()
                ->result();
        return $exec;
    }

    function Getdata($data) {
        $exec = $this->db->select('notas,namapensiunan,FORMAT(penpok,0) AS penpok,concat(alm_peserta," kel. ",kelurahan," kec. ",kecamatan," kab. ",kota_kab," prov. ",provinsi,", ",kodepos) as alamat,nmkanbyr')
                ->from('mst_datapens')
                ->where('provinsi', $data['provinsi'])
                ->where('kota_kab', $data['kota_kab'])
                ->get()
                ->result();
        return $exec;
    }

}
