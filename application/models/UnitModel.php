<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UnitModel extends CI_Model 
{
    function get_unit()
    {
        return $this->db->get('unit');
    }

    function add_unit()
    {
        if($this->input->post('bagian') == '0')
        {
            $data = array(
                "nama_unit" => $this->input->post('nama-unit'),
                "id_parent" => '0' 
              );
        }
        else
        {
            $data = array(
                "nama_unit" => $this->input->post('nama-unit'),
                "id_parent" => $this->input->post('bagiandari')
              );   
        }
        $this->db->insert('unit', $data);
    }
}