<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Interaksi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Interaksi');
        $this->result = $this->M_User->Marketing();
    }

    function index($NOTAS) {
        $data = [
            'title' => 'MARKETING | ' . $this->result[0]->uname,
            'formtitle' => 'Form interaksi sales',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict,
            'get_option' => $this->M_Interaksi->Get_option(),
            'provinsi' => $this->M_Interaksi->Provinsi(),
            'interaksi' => $this->M_Interaksi->DoInteraksi($NOTAS)
        ];
        $data['content'] = $this->load->view('V_Interaksi', $data, true);
        $this->load->view('template', $data);
    }

    function Getkabupaten($data) {
        //str_replace("+", " ", $data)
        $exec = $this->M_Interaksi->Getkabupaten(str_replace("+", " ", $data));
        if ($exec == true) {
            $this->output
                    ->set_status_header(200)
                    ->set_content_type('application/json', 'utf-8')
                    ->set_output(json_encode($exec, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                    ->_display();
        } else {
            $response = [
                'statusCode' => 500,
                'msg' => 'Error while load data !'
            ];
            $this->output
                    ->set_status_header($response['statusCode'])
                    ->set_content_type('application/json', 'utf-8')
                    ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                    ->_display();
        }
        exit;
    }

    function Getkecamatan() {
        $data = [
            'provinsi' => str_replace("+", " ", $this->uri->segment(4, 0)),
            'kabupaten' => str_replace("+", " ", $this->uri->segment(5, 0))
        ];
        $exec = $this->M_Interaksi->Getkecamatan($data);
        if ($exec == true) {
            $this->output
                    ->set_status_header(200)
                    ->set_content_type('application/json', 'utf-8')
                    ->set_output(json_encode($exec, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                    ->_display();
        } else {
            $response = [
                'statusCode' => 500,
                'msg' => 'Error while load data !'
            ];
            $this->output
                    ->set_status_header($response['statusCode'])
                    ->set_content_type('application/json', 'utf-8')
                    ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                    ->_display();
        }
        exit;
    }

    function Getkelurahan() {
        $data = [
            'provinsi' => str_replace("+", " ", $this->uri->segment(4, 0)),
            'kabupaten' => str_replace("+", " ", $this->uri->segment(5, 0)),
            'kecamatan' => str_replace("+", " ", $this->uri->segment(6, 0)),
        ];
        $exec = $this->M_Interaksi->Getkelurahan($data);
        if ($exec == true) {
            $this->output
                    ->set_status_header(200)
                    ->set_content_type('application/json', 'utf-8')
                    ->set_output(json_encode($exec, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                    ->_display();
        } else {
            $response = [
                'statusCode' => 500,
                'msg' => 'Error while load data !'
            ];
            $this->output
                    ->set_status_header($response['statusCode'])
                    ->set_content_type('application/json', 'utf-8')
                    ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                    ->_display();
        }
        exit;
    }

    function Getkodepos() {
        $data = [
            'provinsi' => str_replace("+", " ", $this->uri->segment(4, 0)),
            'kabupaten' => str_replace("+", " ", $this->uri->segment(5, 0)),
            'kecamatan' => str_replace("+", " ", $this->uri->segment(6, 0)),
            'kelurahan' => str_replace("+", " ", $this->uri->segment(7, 0))
        ];
        $exec = $this->M_Interaksi->Getkodepos($data);
        if ($exec == true) {
            $this->output
                    ->set_status_header(200)
                    ->set_content_type('application/json', 'utf-8')
                    ->set_output(json_encode($exec, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                    ->_display();
        } else {
            $response = [
                'statusCode' => 500,
                'msg' => 'Error while load data !'
            ];
            $this->output
                    ->set_status_header($response['statusCode'])
                    ->set_content_type('application/json', 'utf-8')
                    ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                    ->_display();
        }
        exit;
    }

    function Simpan() {
        $nopen = $this->input->post('notas');
        $cekfoto = $this->M_Interaksi->CheckPoto($nopen);
        if ($cekfoto[0]->nopen == 0) {
            $response = ['status' => 'error', 'msg' => 'data gagal disimpan, silahkan upload foto selfie'];
            $this->output
                    ->set_status_header(200)
                    ->set_content_type('application/json', 'utf-8')
                    ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                    ->_display();
            exit;
        } else {
            $data = [
                'id' => '',
                'nik' => $this->session->userdata('nik'),
                'nopen' => $this->input->post('notas'),
                'pensiunan' => $this->input->post('namapensiunan'),
                'tgl_lahir_pensiunan' => $this->input->post('tgl_lahir_pensiunan'),
                'penerima' => $this->input->post('namapenerima'),
                'tgl_lahir_penerima' => $this->input->post('tgl_lahir_penerima'),
                'alamat' => $this->input->post('alamat'),
                'alamat_baru' => $this->input->post('newadd'),
                'kelurahan' => $this->input->post('kelurahan'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kabupaten' => $this->input->post('kota_kab'),
                'provinsi' => $this->input->post('provinsi'),
                'kodepos' => $this->input->post('kodepos'),
                'telepon' => $this->input->post('telepon'),
                'kode_interaksikunj' => $this->input->post('kode_interaksikunj'),
                'keterangan' => $this->input->post('keterangan'),
                'alamat_valid' => $this->input->post('alamat_valid'),
                'bertemu_pensiunan' => $this->input->post('bertemu_pens'),
                'manfaatpens_btpn' => $this->input->post('manfaatpens_btpn'),
                'hp_status' => $this->input->post('hp_status'),
                'hp_nominal' => $this->input->post('hp_nominal'),
                'ttd' => $this->input->post('ttd', FALSE),
                'status' => 2,
                'nom_tb' => NULL,
                'tgl_pencairan' => NULL,
                'img_simulasi' => NULL,
                'syscreateuser' => $this->result[0]->nik,
                'syscreatedate' => date("Y-m-d H:i:s"),
                'sysupdateuser' => NULL,
                'sysupdatedate' => NULL,
                'sysdeleteuser' => NULL,
                'sysdeletedate' => NULL
            ];
            $this->M_Interaksi->Insert($data);
        }
    }

    public function Uploadpoto() {
        $config['upload_path'] = './assets/images/lap_marketing';
        $config['file_name'] = $this->result[0]->nama_karyawan . "_" . date("Y-m-d H_i_s");
        $config['allowed_types'] = 'gif|jpg|png';
        $config['maintain_ratio'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('userfile') == TRUE) {
            $data = $this->upload->data();
            $picture = ['id' => '', 'nik' => $this->result[0]->nik, 'nopen' => $this->uri->segment(4), 'tgl_input' => date("Y-m-d h:i:s"), 'path' => "assets/images/lap_marketing/" . $data['file_name']];
            $this->M_Interaksi->Insertpict($picture);
        } else {
            $this->output->set_header("HTTP/1.0 400 Bad Request");
            echo "Upload gambar gagal !";
        }
    }

    function Hasil() {
        $data = ['title' => 'HASIL INTERAKSI | ' . $this->result[0]->uname, 'formtitle' => 'Form interaksi sales',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict, 'hasil' => $this->M_Interaksi->Hasil($this->result), 'JAN' => $this->M_Interaksi->JAN($this->result), 'FEB' => $this->M_Interaksi->FEB($this->result), 'MAR' => $this->M_Interaksi->MAR($this->result), 'APR' => $this->M_Interaksi->APR($this->result), 'MEI' => $this->M_Interaksi->MEI($this->result), 'JUN' => $this->M_Interaksi->JUN($this->result), 'JUL' => $this->M_Interaksi->JUL($this->result), 'AGS' => $this->M_Interaksi->AGS($this->result), 'SEP' => $this->M_Interaksi->SEP($this->result), 'OKT' => $this->M_Interaksi->OKT($this->result), 'NOV' => $this->M_Interaksi->NOV($this->result), 'DES' => $this->M_Interaksi->DES($this->result)];
        $data['content'] = $this->load->view('V_Interaksihasil', $data, true);
        $this->load->view('template', $data);
    }

    function Detail($nopen) {
        $data = [
            'title' => 'Detail Interaksi',
            'formtitle' => 'Detail Hasil interaksi',
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict,
            'value' => $this->M_Interaksi->Detail($nopen)
        ];
        $data['content'] = $this->load->view('V_Interaksidetail', $data, true);
        $this->load->view('template', $data);
    }

}
