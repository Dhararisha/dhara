<?php
defined('BASEPATH') or exit('No direct script access allowed');

// maybe on this query execute, we get password by username only
// so user not get more user data
// so a query command is : SELECT password FROM user WHERE 'username' = username

class mAuth extends CI_Model
{
    public function Auth($username, $password)
    {
        $this->db->select($password);
        $this->db->from('user');
        $this->db->where('username', $username);
        return $this->db->get()->row();
    }
}

/* End of file mAuth.php */
