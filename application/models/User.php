<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model 
{
    function logged_in($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    function logged_id()
    {
        return $this->session->userdata('user_id');
    }
}