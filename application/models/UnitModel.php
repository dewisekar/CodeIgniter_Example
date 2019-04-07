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

    function delete_unit($id)
    {
        
        $data = $this->db->get_where('unit',  array('id_parent' => $id));
        $numrows = $data->num_rows();
        $this->db->delete('unit', array('id_unit' => $id)); 
        if ($numrows > 0)
        {
            foreach($data->result() as $menu)
            {
               $this->delete_unit($menu->id_unit);
            }
        }

    }

    function get_unitx()
	{	$arr = '';
		$data = $this->db->get_where('unit',  array('id_parent' => 0))->result();
		foreach($data as $menu)
		{	
            $counter = $this->db->get_where('unit',  array('id_parent' => $menu->id_unit));
            if($counter->num_rows() < 1)
			{					
				$arr.= '<option value="'. $menu->id_unit .'">'.$menu->nama_unit.'</option>';
			}			
			else if($counter->num_rows() > 0)
			{					
				$arr.= $this->fetch_sub_menux($menu->nama_unit.' >', $menu->id_unit);	
			}		
	
		}
		return $arr;
	}

	function fetch_sub_menux($ngok, $parent)
	{	
		$arr = '';
		$data = $this->db->get_where('unit',  array('id_parent' => $parent))->result();
		foreach($data as $menu)
		{	
			$counter = $this->db->get_where('unit',  array('id_parent' => $menu->id_unit));
            if($counter->num_rows() < 1)
			{					
				$arr.= '<option value="'. $menu->id_unit .'">'.$ngok.$menu->nama_unit.'</option>';
			}			
			else if($counter->num_rows() > 0)
			{					
				$arr.= $this->fetch_sub_menux($ngok.$menu->nama_unit.' > ', $menu->id_unit);	
			}	
	
		}
		return $arr;

	
	}
}