<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Caridata extends CI_Model {

    function Hitung($data) {
        $exec = $this->db->select('COUNT(`lap_rencana`.`nopen`) AS nopen')
                ->from('lap_rencana')
                ->where('nik', $data['nik'])
                ->where('DATE(syscreatedate)', date("Y-m-d"))
                ->get()
                ->result();
        if ($exec[0]->nopen >= 15) {
            $response = array('status' => 'error', 'msg' => 'Gagal, batas maksimal rencana kunjungan !');
            $this->output
                    ->set_status_header(200)
                    ->set_content_type('application/json', 'utf-8')
                    ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                    ->_display();
            exit;
        } else {
            $this->Checkrencana($data);
        }
        return $exec;
    }

    function Checkrencana($data) {
        $exec = $this->db->select('COUNT(lap_rencana.nopen) AS nopen')
                ->from('lap_rencana')
                ->where('lap_rencana.nopen', $data['nopen'])
                ->get()
                ->result();
        if ($exec[0]->nopen == 0) {
            $this->Simpan($data);
        } else {
            $response = array('status' => 'error', 'msg' => 'Error, data telah dikunjungi !');
            $this->output
                    ->set_status_header(200)
                    ->set_content_type('application/json', 'utf-8')
                    ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                    ->_display();
            exit;
            $this->db->set('`status`', 2);
            $this->db->where('NOTAS', '' . $data['nopen'] . '');
            $this->db->update('mst_datapens');
        }
    }

    function Simpan($data) {
        $i = 0;
        while ($i < count($data)) {
            $exec = [
                'nik' => $this->result[0]->nik,
                'nopen' => $data[$i],
                'visit_status' => 1,
                'syscreatedate' => date("Y-m-d H:i:s"),
                'syscreateuser' => $this->result[0]->nik
            ];
            $insert[] = $exec;
            $i++;
        }
        $this->db->trans_start();
        $this->db->insert_batch('lap_rencana', $insert);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo '<script>alert("Error, error while saving data !");window.location.href="' . base_url('Sales/Caridata/index') . '"</script>';
        } else {
            $this->db->trans_commit();
            echo '<script>alert("Success, data success  !");window.location.href="' . base_url('Sales/Daftarkunjungan/index') . '"</script>';
        }
    }

    function Kabupaten($value) {
        $exec = $this->db->select('*')
                ->from('m_kodepos')
                ->where('provinsi', $value[0]->provinsi)
                ->where('kabupaten', $value[0]->kabupaten)
                ->group_by('kabupaten')
                ->order_by('kabupaten')
                ->get()
                ->result();
        return $exec;
    }

    function Kecamatan($value) {
        $exec = $this->db->select('*')
                ->from('m_kodepos')
                ->where('provinsi', $value[0]->provinsi)
                ->where('kabupaten', $value[0]->kabupaten)
                ->group_by('kecamatan')
                ->order_by('kecamatan')
                ->get()
                ->result();
        return $exec;
    }

    function Potensi($value) {
        $exec = $this->db->select('mst_datapens.provinsi,mst_datapens.kota_kab,mst_datapens.kecamatan,mst_datapens.kelurahan,count(mst_datapens.notas) as lurah')
                ->from('mst_datapens')
                ->where(' NOT EXISTS ( SELECT lap_rencana.nopen FROM lap_rencana WHERE mst_datapens.notas = lap_rencana.nopen )', '', false)
                ->where('mst_datapens.provinsi', $value[0]->provinsi)
                ->where('mst_datapens.kota_kab', $value[0]->kabupaten)
                ->where('`mst_datapens`.`status`', 1)
                ->where('YEAR ( curdate( ) ) - YEAR ( mst_datapens.tgl_lahir_pensiunan ) BETWEEN 74 AND 80 ')
                ->like('mst_datapens.nmkanbyr', 'BTPN')
                ->or_where(' NOT EXISTS ( SELECT lap_rencana.nopen FROM lap_rencana WHERE mst_datapens.notas = lap_rencana.nopen )', '', false)
                ->where('mst_datapens.provinsi', $value[0]->provinsi)
                ->where('mst_datapens.kota_kab', $value[0]->kabupaten)
                ->where('`mst_datapens`.`status`', 1)
                ->where('YEAR ( curdate( ) ) - YEAR ( mst_datapens.tgl_lahir_penerima ) BETWEEN 74 AND 80 ')
                ->like('mst_datapens.nmkanbyr', 'BTPN')
                ->group_by('mst_datapens.kelurahan')
                ->order_by('lurah', 'DESC')
                ->get()
                ->result();
        return $exec;
    }

    function Hasil($cari) {
        $exec = $this->db->select('mst_datapens.kelurahan,mst_datapens.notas,mst_datapens.kecamatan,mst_datapens.kota_kab,mst_datapens.provinsi,mst_datapens.alm_peserta,mst_datapens.nama_penerima,mst_datapens.tgl_lahir_pensiunan,mst_datapens.tgl_lahir_penerima,mst_datapens.namapensiunan')
                ->from('`mst_datapens`')
                ->where(' NOT EXISTS ( SELECT lap_rencana.nopen FROM lap_rencana WHERE mst_datapens.notas = lap_rencana.nopen )')
                ->where('YEAR ( CURDATE( ) ) - YEAR ( tgl_lahir_pensiunan ) BETWEEN 74 AND 80 ')
                ->like('nmkanbyr', 'BTPN')
                ->where('`mst_datapens`.`provinsi`', $cari['provinsi'])
                ->where('`mst_datapens`.`kota_kab`', $cari['kabupaten'])
                ->where('`mst_datapens`.`kecamatan`', $cari['kecamatan'])
                ->where('`mst_datapens`.`kelurahan`', $cari['kelurahan'])
                ->where('`mst_datapens`.`status`', 1)
                ->or_where(' NOT EXISTS ( SELECT lap_rencana.nopen FROM lap_rencana WHERE mst_datapens.notas = lap_rencana.nopen )', '', false)
                ->where('YEAR ( CURDATE( ) ) - YEAR ( tgl_lahir_penerima ) BETWEEN 74 AND 80 ')
                ->like('nmkanbyr', 'BTPN')
                ->where('`mst_datapens`.`provinsi`', $cari['provinsi'])
                ->where('`mst_datapens`.`kota_kab`', $cari['kabupaten'])
                ->where('`mst_datapens`.`kecamatan`', $cari['kecamatan'])
                ->where('`mst_datapens`.`kelurahan`', $cari['kelurahan'])
                ->where('`mst_datapens`.`status`', 1)
                ->get()
                ->result();
        return $exec;
    }

}
