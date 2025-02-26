<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mPengaduan extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('pengaduan', $data);
    }
    public function select()
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('monitoring', 'pengaduan.id_monitoring = monitoring.id_monitoring', 'left');
        $this->db->join('asset', 'asset.id_asset = monitoring.id_asset', 'left');
        $this->db->join('barang', 'barang.id_barang = asset.id_barang', 'left');
        $this->db->join('user', 'user.id_user = pengaduan.id_user', 'left');
        return $this->db->get()->result();
    }
    public function edit($id)
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('monitoring', 'pengaduan.id_monitoring = monitoring.id_monitoring', 'left');
        $this->db->join('asset', 'asset.id_asset = monitoring.id_asset', 'left');
        $this->db->join('barang', 'barang.id_barang = asset.id_barang', 'left');
        $this->db->join('user', 'user.id_user = pengaduan.id_user', 'left');
        $this->db->where('id_pengaduan', $id);
        return $this->db->get()->row();
    }

    public function update($id, $data)
    {
        $this->db->where('id_pengaduan', $id);
        $this->db->update('pengaduan', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_pengaduan', $id);
        $this->db->delete('pengaduan');
    }

    //keputusan kepala desa
    public function keputusan($id, $data)
    {
        $this->db->where('id_pengaduan', $id);
        $this->db->update('pengaduan', $data);
    }
    public function asset_kep($data)
    {
        $this->db->insert('asset_kep', $data);
    }
    public function info_keputusan()
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('asset_kep', 'pengaduan.id_pengaduan = asset_kep.id_pengaduan', 'left');
        return $this->db->get()->result();
    }
}

/* End of file mRequest.php */