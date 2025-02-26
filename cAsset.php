<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAsset extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('mAsset');
        $this->load->model('mKelolaData');
        $this->load->library('form_validation');
        $this->load->library('upload');
    }

    public function index()
    {
        $data = array(
            'asset' => $this->mAsset->select(),
           
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/asset/vasset', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function create()
    {
        $this->form_validation->set_rules('no', 'No Asset', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori Asset', 'required');
        $this->form_validation->set_rules('barang', 'Barang', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi Asset', 'required');
        $this->form_validation->set_rules('merk', 'Merk Asset', 'required');
        $this->form_validation->set_rules('jml', 'Jumlah Asset', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'kategori' => $this->mKelolaData->select_kategori(),
                'lokasi' => $this->mKelolaData->select_lokasi(),
                'barang' => $this->mKelolaData->select_barang()
            );
            $this->load->view('Admin/Layout/head');
            $this->load->view('Admin/Layout/aside');
            $this->load->view('Admin/asset/vCreateAsset', $data);
            $this->load->view('Admin/Layout/footer');
        } else {
            $data = array(
                'id_lokasi' => $this->input->post('lokasi'),
                'id_kategori' => $this->input->post('id'),
                'id_barang' => $this->input->post('barang'),
                'id_user' => $this->session->userdata('id'),
                'no_asset' => $this->input->post('no'),
                'merk' => $this->input->post('merk'),
                'jml_asset' => $this->input->post('jml'),
            );
            $this->mAsset->insert($data);
            $this->session->set_flashdata('success',  'Data Asset Berhasil Ditambahkan!');
            redirect('Admin/cAsset');
        }
    }
    public function edit($id)
    {
        $this->form_validation->set_rules('no', 'No Asset', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori Asset', 'required');
        $this->form_validation->set_rules('barang', 'Barang', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi Asset', 'required');
        $this->form_validation->set_rules('merk', 'Merk Asset', 'required');
        $this->form_validation->set_rules('jml', 'Jumlah Asset', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'kategori' => $this->mKelolaData->select_kategori(),
                'lokasi' => $this->mKelolaData->select_lokasi(),
                'barang' => $this->mKelolaData->select_barang(),
                'asset' => $this->mAsset->edit($id)

            );
            $this->load->view('Admin/Layout/head');
            $this->load->view('Admin/Layout/aside');
            $this->load->view('Admin/asset/vUpdateAsset', $data);
            $this->load->view('Admin/Layout/footer');
        } else {
            $data = array(
                'id_lokasi' => $this->input->post('lokasi'),
                'id_kategori' => $this->input->post('id'),
                'id_barang' => $this->input->post('barang'),
                'id_user' => $this->session->post('id'),
                'no_asset' => $this->input->post('no'),
                'merk' => $this->input->post('merk'),
                'jml_asset' => $this->input->post('jml'),
            );
            $this->mAsset->update($id, $data);
            $this->session->set_flashdata('success', 'Data Asset Berhasil Diperbaharui!');
            redirect('Admin/cAsset');
        }
    }
    public function delete($id)
    {
        $this->mAsset->delete($id);
        $this->session->set_flashdata('success', 'Data Asset Berhasil Dihapus!');
        redirect('Admin/cAsset');
    }
}

/* End of file cAsset.php */
