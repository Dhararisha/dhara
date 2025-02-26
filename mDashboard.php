<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mDashboard extends CI_Model
{
    public function total()
    {
        $data['monitoring'] = $this->db->query("SELECT COUNT(id_monitoring) as jml_monitoring FROM `monitoring`;")->row();
        $data['pengaduan'] = $this->db->query("SELECT COUNT(id_pengaduan) as jml_pengaduan FROM `pengaduan` WHERE status_pengaduan='2';")->row();
        $data['asset'] = $this->db->query("SELECT COUNT(id_asset) as jml_asset FROM `asset`;")->row();
        $data['user'] = $this->db->query("SELECT COUNT(id_user) as jml_user FROM `user`;")->row();
        return $data;
    }
}

/* End of file mDashboard.php */
