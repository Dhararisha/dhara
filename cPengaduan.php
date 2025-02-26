<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPengaduan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('mPengaduan');
        $this->load->model('mMonitoring');
    }

    public function index()
    {
        $data = array(
            'pengaduan' => $this->mPengaduan->select(),
            'detail' => $this->mPengaduan->info_keputusan()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/pengaduan/vpengaduan', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function create()
    {
        $this->form_validation->set_rules('asset', 'Hasil Monitoring', 'required');
        $this->form_validation->set_rules('date', 'Hasil Monitoring', 'required');
        $this->form_validation->set_rules('jml', 'Hasil Monitoring', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'monitoring' => $this->mMonitoring->select()
            );
            $this->load->view('Admin/Layout/head');
            $this->load->view('Admin/Layout/aside');
            $this->load->view('Admin/pengaduan/vcreatepengaduan', $data);
            $this->load->view('Admin/Layout/footer');
        } else {
            $data = array(
                'id_monitoring' => $this->input->post('asset'),
                'id_user' => $this->session->userdata('id'),
                'tgl_pengaduan' => $this->input->post('date'),
                'total_pengaduan' => $this->input->post('jml'),
                'status_pengaduan' => '0',
            );
            $this->mPengaduan->insert($data);
            $this->session->set_flashdata('success', 'Data Pengaduan Berhasil Diajukkan! Mohon menunggu konfirmasi dari Tim TI');
            redirect('Admin/cPengaduan');
        }
    }
    public function edit($id)
    {
        $this->form_validation->set_rules('asset', 'Hasil Monitoring', 'required');
        $this->form_validation->set_rules('date', 'Hasil Monitoring', 'required');
        $this->form_validation->set_rules('jml', 'Hasil Monitoring', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'monitoring' => $this->mMonitoring->select(),
                'pengaduan' => $this->mPengaduan->edit($id)
            );
            $this->load->view('Admin/Layout/head');
            $this->load->view('Admin/Layout/aside');
            $this->load->view('Admin/pengaduan/vUpdatePengaduan', $data);
            $this->load->view('Admin/Layout/footer');
        } else {
            $data = array(
                'id_monitoring' => $this->input->post('asset'),
                'id_user' => $this->session->userdata('id'),
                'tgl_pengaduan' => $this->input->post('date'),
                'total_pengaduan' => $this->input->post('jml'),
                'status_pengaduan' => '0',
            );
            $this->mPengaduan->update($id, $data);
            $this->session->set_flashdata('success', 'Data Pengaduan Berhasil Diperbaharui!');
            redirect('Admin/cPengaduan');
        }
    }
    public function delete($id)
    {
        $this->mPengaduan->delete($id);
        $this->session->set_flashdata('success', 'Data Pengaduan Berhasil Dihapus!');
        redirect('Admin/cPengaduan');
    }
}

/* End of file cPengaduan.php */
