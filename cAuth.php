<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAuth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mAuth');
    }


    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('vAuth');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $auth = $this->mAuth->Auth($username);
            
            if ($auth) {

                // verified password on this section
                if(password_verify($password, $auth->password)){
                    // login success
                     $array = array(
                        'id' => $auth->id_user
                    );

                    $this->session->set_userdata($array);

                    if ($auth->level_user == '1') {
                        redirect('Admin/cDashboard');
                    } else {
                        redirect('Timti/cDashboard');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Password Anda Salah');
                    redirect('cAuth');
                }
                
            } else {
                $this->session->set_flashdata('error', 'Username Anda Salah');
                redirect('cAuth');
            }
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->set_flashdata('success', 'Anda Berhasil Logout!');

        redirect('cAuth');
    }
}

/* End of file c.php */
