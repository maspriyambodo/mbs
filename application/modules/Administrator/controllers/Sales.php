<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Sales');
        $this->load->library('ciqrcode');
        $this->result = $this->M_User->SelectUser();
    }

    function index() {
        if ($this->result[0]->hak_akses == 1) {//super administrator
            $data = [
                'title' => 'Master Data Sales',
                'formtitle' => 'data sales',
                'id' => $this->result[0]->id,
                'uname' => $this->result[0]->uname,
                'usr_mail' => $this->result[0]->usr_mail,
                'hak_akses' => $this->result[0]->hak_akses,
                'pict' => $this->result[0]->pict,
                'sales' => $this->M_Sales->MDatasales()
            ];
        } else {//level 3 administrator atau spv sales
            $data = [
                'title' => 'Master Data Sales',
                'id' => $this->result[0]->id,
                'uname' => $this->result[0]->uname,
                'usr_mail' => $this->result[0]->usr_mail,
                'hak_akses' => $this->result[0]->hak_akses,
                'pict' => $this->result[0]->pict,
                'sales' => $this->M_Sales->Datasales($this->result[0]->nik)
            ];
        }
        $data['content'] = $this->load->view('V_Sales', $data, true);
        $this->load->view('template', $data);
    }

    function Ubah($nik) {
        $data = [
            'title' => 'Ubah Data Sales',
            'formtitle' => 'ubah data sales',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict,
            'detail' => $this->M_Sales->Details($nik)
        ];
        $data['content'] = $this->load->view('V_Ubahsales', $data, true);
        $this->load->view('template', $data);
    }

    function Tambah() {
        $data = [
            'title' => 'Tambah Data Sales',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict
        ];
        $data['content'] = $this->load->view('Administrator/V_TambahSales', $data, true);
        $this->load->view('template', $data);
    }

    function Simpan() {
        $data = [
            'nama_karyawan' => $this->input->post('namatxt'),
            'nik' => $this->input->post('niktxt'),
            'jenis_kelamin' => $this->input->post('jktxt'),
            'tgl_lahir' => $this->input->post('ttltxt'),
            'alamat' => $this->input->post('almttxt'),
            'telepon1' => $this->input->post('tlptxt'),
            'email' => $this->input->post('mailtxt'),
            'status_perkawinan' => $this->input->post('stattxt'),
            'status_karyawan' => $this->input->post('kartxt'),
            'tanggal_masuk' => $this->input->post('tmttxt'),
            'lokasi_kerja' => $this->input->post('loktxt'),
            'penpok' => $this->input->post('penpoktxt'),
            'provinsi' => $this->input->post('provtxt'),
            'kabupaten' => $this->input->post('kabtxt'),
            'kecamatan' => $this->input->post('kectxt'),
            'kelurahan' => $this->input->post('keltxt')
        ];
        $this->M_Sales->Simpan($data);
    }

    function Details($NOTAS) {
        $data = [
            'title' => 'Details',
            'formtitle' => 'Detail data sales',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict,
            'sales' => $this->M_Sales->Details($NOTAS)
        ];
        $config['cacheable'] = true; //boolean, the default is true
        $config['cachedir'] = './assets/'; //string, the default is application/cache/
        $config['errorlog'] = './assets/'; //string, the default is application/logs/
        $config['imagedir'] = './assets/images/'; //direktori penyimpanan qr code
        $config['quality'] = true; //boolean, the default is true
        $config['size'] = '1024'; //interger, the default is 1024
        $config['black'] = [224, 255, 255]; // array, default is array(255,255,255)
        $config['white'] = [70, 130, 180]; // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
        $name = $data['sales'][0]->nama_karyawan;
        $nik = $data['sales'][0]->nik;
        $codeContents = 'BEGIN:VCARD' . "\n";
        $codeContents .= 'VERSION:2.1' . "\n";
        $codeContents .= 'FN:' . $name . "\n";
        $codeContents .= 'ORG:' . $nik . "\n";
        $codeContents .= 'END:VCARD';
        $image_name = $name . $nik . '.png'; //buat name dari qr code sesuai dengan nim
        $params['data'] = $codeContents; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params);
        $data['content'] = $this->load->view('V_Detailsales', $data, true);
        $this->load->view('template', $data);
    }

    function Prints($NOTAS) {
        $data = [
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict,
            'sales' => $this->M_Sales->Details($NOTAS)
        ];
        $config['cacheable'] = true; //boolean, the default is true
        $config['cachedir'] = './assets/'; //string, the default is application/cache/
        $config['errorlog'] = './assets/'; //string, the default is application/logs/
        $config['imagedir'] = './assets/images/'; //direktori penyimpanan qr code
        $config['quality'] = true; //boolean, the default is true
        $config['size'] = '1024'; //interger, the default is 1024
        $config['black'] = [224, 255, 255]; // array, default is array(255,255,255)
        $config['white'] = [70, 130, 180]; // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
        $name = $data['sales'][0]->nama_karyawan;
        $nik = $data['sales'][0]->nik;
        $codeContents = 'BEGIN:VCARD' . "\n";
        $codeContents .= 'VERSION:2.1' . "\n";
        $codeContents .= 'FN:' . $name . "\n";
        $codeContents .= 'ORG:' . $nik . "\n";
        $codeContents .= 'END:VCARD';
        $image_name = $name . $nik . '.png'; //buat name dari qr code sesuai dengan nim
        $params['data'] = $codeContents; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params);
        $mpdf = new \Mpdf\Mpdf();
        $view = $this->load->view('V_Detailsalesprint', $data, TRUE);
        $mpdf->WriteHTML($view);
        $mpdf->Output();
    }

    function Hapus() {
        $exec = $this->M_Sales->Hapus($this->input->post('nik'));
        if ($exec == true) {
            $response = ['set_status_header' => 200, 'msg' => 'Success, Data berhasil dihapus !'];
        } else {
            $response = ['set_status_header' => 400, 'msg' => 'Error, Data gagal dihapus !'];
        }
        $this->output
                ->set_status_header($response['set_status_header'], true)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

}
