<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_Interaksi
 *
 * @author X45LDB
 */
class M_Interaksi extends CI_Model {

    function index($result) {
        $query = $this->db->distinct('*')
                ->from('mst_datapens')
                ->where(' NOT EXISTS ( SELECT * FROM lap_rencana WHERE mst_datapens.NOTAS = lap_rencana.nopen )')
                ->where('mst_datapens.PROVINSI', $result[0]->provinsi)
                ->like('mst_datapens.KOTA_KAB', $result[0]->kabupaten)
                ->where('YEAR ( CURDATE( ) ) - YEAR ( mst_datapens.TGL_LAHIR_PENERIMA ) BETWEEN 70 AND 80 ')
                ->like('mst_datapens.NMKANBYR', 'BTPN')
                ->where('status', 1)
                ->order_by('mst_datapens.KELURAHAN')
                ->get()
                ->result();
        return $query;
    }

    function Get_option() {
        $exec = $this->db->distinct('*')
                ->from('mst_kodeinteraksi')
                ->not_like('mst_kodeinteraksi.kode_group', 'T')
                ->get()
                ->result();
        return $exec;
    }

    function Provinsi() {
        $exec = $this->db->select('provinsi')
                ->from('m_kodepos')
                ->group_by('m_kodepos.provinsi')
                ->order_by('m_kodepos.provinsi', 'ASC')
                ->get()
                ->result();
        return $exec;
    }

    function Getkabupaten($data) {
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
                ->where('m_kodepos.provinsi', $data['provinsi'])
                ->where('m_kodepos.kabupaten', $data['kabupaten'])
                ->where('m_kodepos.kecamatan', $data['kecamatan'])
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
                ->where('m_kodepos.provinsi', $data['provinsi'])
                ->where('m_kodepos.kabupaten', $data['kabupaten'])
                ->where('m_kodepos.kecamatan', $data['kecamatan'])
                ->where('m_kodepos.kelurahan', $data['kelurahan'])
                ->get()
                ->result();
        return $exec;
    }

    function DoInteraksi($NOTAS) {
        $ex = $this->db->distinct('*')
                ->from('mst_datapens')
                ->where('mst_datapens.notas', $NOTAS)
                ->limit(1)
                ->get()
                ->result();
        return $ex;
    }

    function CheckPoto($nopen) {
        $exec = $this->db->select('COUNT(nopen) AS nopen')
                ->where('lap_pict.nopen', $nopen)
                ->where('lap_pict.tgl_input', date("Y-m-d"))
                ->from('lap_pict')
                ->get()
                ->result();
        return $exec;
    }

    function Insert($data) {
        $this->db->trans_begin();
        $this->db->set('visit_status', 2);
        $this->db->set('sysupdateuser', $data['sysupdateuser']);
        $this->db->where('lap_rencana.nopen', $data['nopen']);
        $this->db->update('lap_rencana');
        $this->db->set('mst_datapens.status', 2, FALSE);
        $this->db->where('mst_datapens.notas', $data['nopen']);
        $this->db->update('mst_datapens');
        $this->db->insert('lap_interaksi', $data);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $response = array('status' => 'ERROR', 'msg' => 'silahkan upload foto selfie');
        } else {
            $this->db->trans_commit();
            $response = array('status' => 'TRUE', 'msg' => 'data berhasil disimpan !');
        }
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    function Insertpict($picture) {
        $this->db->insert('lap_pict', $picture);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo '<script>alert("gambar gagal disimpan !");</script>';
        } else {
            $this->db->trans_commit();
            echo '<script>alert("gambar berhasil disimpan !");</script>';
        }
    }

    function Hasil($result) {
        $exec = $this->db->select('*')
                ->from('lap_interaksi')
                ->where('lap_interaksi.nik', $result[0]->nik)
                ->where('MONTH (lap_interaksi.syscreatedate) = MONTH (CURDATE())')
                ->get()
                ->result();
        return $exec;
    }

    function Detail($nopen) {
        $exec = $this->db->select('*')
                ->from('lap_interaksi')
                ->where('lap_interaksi.nopen', $nopen)
                ->get()
                ->result();
        print_r($exec);
        die;
        return $exec;
    }

    function JAN($result) {
        $exec = $this->db->distinct('*')
                ->from('lap_interaksi')
                ->where('lap_interaksi.nik', $result[0]->nik)
                ->where('YEAR (lap_interaksi.syscreatedate) = YEAR(CURDATE())')
                ->where('MONTH(lap_interaksi.syscreatedate) = 01')
                ->get()
                ->result();
        return $exec;
    }

    function FEB($result) {
        $exec = $this->db->distinct('*')
                ->from('lap_interaksi')
                ->where('lap_interaksi.nik', $result[0]->nik)
                ->where('YEAR (lap_interaksi.syscreatedate) = YEAR(CURDATE())')
                ->where('MONTH(lap_interaksi.syscreatedate) = 02')
                ->get()
                ->result();
        return $exec;
    }

    function MAR($result) {
        $exec = $this->db->distinct('*')
                ->from('lap_interaksi')
                ->where('lap_interaksi.nik', $result[0]->nik)
                ->where('YEAR (lap_interaksi.syscreatedate) = YEAR(CURDATE())')
                ->where('MONTH(lap_interaksi.syscreatedate) = 03')
                ->get()
                ->result();
        return $exec;
    }

    function APR($result) {
        $exec = $this->db->distinct('*')
                ->from('lap_interaksi')
                ->where('lap_interaksi.nik', $result[0]->nik)
                ->where('YEAR (lap_interaksi.syscreatedate) = YEAR(CURDATE())')
                ->where('MONTH(lap_interaksi.syscreatedate) = 04')
                ->get()
                ->result();
        return $exec;
    }

    function MEI($result) {
        $exec = $this->db->distinct('*')
                ->from('lap_interaksi')
                ->where('lap_interaksi.nik', $result[0]->nik)
                ->where('YEAR (lap_interaksi.syscreatedate) = YEAR(CURDATE())')
                ->where('MONTH(lap_interaksi.syscreatedate) = 05')
                ->get()
                ->result();
        return $exec;
    }

    function JUN($result) {
        $exec = $this->db->distinct('*')
                ->from('lap_interaksi')
                ->where('lap_interaksi.nik', $result[0]->nik)
                ->where('YEAR (lap_interaksi.syscreatedate) = YEAR(CURDATE())')
                ->where('MONTH(lap_interaksi.syscreatedate) = 06')
                ->get()
                ->result();
        return $exec;
    }

    function JUL($result) {
        $exec = $this->db->distinct('*')
                ->from('lap_interaksi')
                ->where('lap_interaksi.nik', $result[0]->nik)
                ->where('YEAR (lap_interaksi.syscreatedate) = YEAR(CURDATE())')
                ->where('MONTH(lap_interaksi.syscreatedate) = 07')
                ->get()
                ->result();
        return $exec;
    }

    function AGS($result) {
        $exec = $this->db->distinct('*')
                ->from('lap_interaksi')
                ->where('lap_interaksi.nik', $result[0]->nik)
                ->where('YEAR (lap_interaksi.syscreatedate) = YEAR(CURDATE())')
                ->where('MONTH(lap_interaksi.syscreatedate) = 08')
                ->get()
                ->result();
        return $exec;
    }

    function SEP($result) {
        $exec = $this->db->distinct('*')
                ->from('lap_interaksi')
                ->where('lap_interaksi.nik', $result[0]->nik)
                ->where('YEAR (lap_interaksi.syscreatedate) = YEAR(CURDATE())')
                ->where('MONTH(lap_interaksi.syscreatedate) = 09')
                ->get()
                ->result();
        return $exec;
    }

    function OKT($result) {
        $exec = $this->db->distinct('*')
                ->from('lap_interaksi')
                ->where('lap_interaksi.nik', $result[0]->nik)
                ->where('YEAR (lap_interaksi.syscreatedate) = YEAR(CURDATE())')
                ->where('MONTH(lap_interaksi.syscreatedate) = 10')
                ->get()
                ->result();
        return $exec;
    }

    function NOV($result) {
        $exec = $this->db->distinct('*')
                ->from('lap_interaksi')
                ->where('lap_interaksi.nik', $result[0]->nik)
                ->where('YEAR (lap_interaksi.syscreatedate) = YEAR(CURDATE())')
                ->where('MONTH(lap_interaksi.syscreatedate) = 11')
                ->get()
                ->result();
        return $exec;
    }

    function DES($result) {
        $exec = $this->db->distinct('*')
                ->from('lap_interaksi')
                ->where('lap_interaksi.nik', $result[0]->nik)
                ->where('YEAR (lap_interaksi.syscreatedate) = YEAR(CURDATE())')
                ->where('MONTH(lap_interaksi.syscreatedate) = 12')
                ->get()
                ->result();
        return $exec;
    }

}
