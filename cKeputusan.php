<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKeputusan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mPengaduan');
    }


    public function index()
    {
        $data = array(
            'pengaduan' => $this->mPengaduan->select(),
            'detail' => $this->mPengaduan->info_keputusan()
        );
        $this->load->view('Timti/Layout/head');
        $this->load->view('Timti/Layout/aside');
        $this->load->view('Timti/vKeputusan', $data);
        $this->load->view('Timti/Layout/footer');
    }
    public function keputusan($id)
    {
        $acc = $this->input->post('acc');
        $data = array(
            'status_pengaduan' => $acc
        );
        $this->mPengaduan->keputusan($id, $data);
        $this->session->set_flashdata('success', 'Anda telah berhasil memberikan keputusan!');
        redirect('Timti/cKeputusan');
    }
    public function asset_keputusan($id)
    {
        $data = array(
            'tgl_kep' => $this->input->post('tgl'),
            'nama_asset_kep' => $this->input->post('asset'),
            'id_pengaduan' => $id
        );
        $this->mPengaduan->asset_kep($data);

        $data_status = array(
            'status_pengaduan' => '2'
        );
        $this->mPengaduan->keputusan($id, $data_status);
        $this->session->set_flashdata('success', 'Anda telah berhasil menambahkan asset keputusan!');
        redirect('Timti/cKeputusan');
    }
}

/* End of file cKeputusan.php */
