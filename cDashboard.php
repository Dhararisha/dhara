<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mDashboard');
        $this->load->model('mPengaduan');
    }

    public function index()
    {

        $data = array(
            'jml' => $this->mDashboard->total(),
            'pengaduan' => $this->mPengaduan->select()
        );
        $this->load->view('Timti/Layout/head');
        $this->load->view('Timti/Layout/aside');
        $this->load->view('Timti/vDashboard', $data);
        $this->load->view('Timti/Layout/footer');
    }
}

/* End of file cDashboard.php */
