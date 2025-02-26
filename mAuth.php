<?php
defined('BASEPATH') or exit('No direct script access allowed');

// ahh sorry my bad, so this function for read more data right ?, so we can use that
class mAuth extends CI_Model
{
    
    public function Auth($username) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);
        return $this->db->get()->row();
    }
 
}

/* End of file mAuth.php */
