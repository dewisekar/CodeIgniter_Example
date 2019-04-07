<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PegawaiModel extends CI_Model 
{
    function getPegawai()
    {
        return $this->db->get('pegawaiview')->result();
    }

    function addPegawai()
    {
        $config['upload_path']          = './fotouploads/';
        $config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100000;
		$config['max_width']            = 1024;
        $config['max_height']           = 768;
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('foto'))
        {
            $data = array(
                "nip_pegawai" => $this->input->post('nip'),
                "nama_pegawai" => $this->input->post('nama'),
                "alamat_pegawai" => $this->input->post('alamat'),
                "nip_pegawai" => $this->input->post('nip'),
                "tempatlahir_pegawai" => $this->input->post('tempatlahir'),
                "tanggallahir_pegawai" => $this->input->post('tanggallahir'),
                "nip_pegawai" => $this->input->post('nip'),
                "jk_pegawai" => $this->input->post('jk'),
                "golongan_pegawai" => $this->input->post('golongan'),
                "eselon_pegawai" => $this->input->post('eselon'),
                "jabatan_pegawai" => $this->input->post('jabatan'),
                "tipe_pegawai" => $this->input->post('tipe'),
                "tempattugas_pegawai" => $this->input->post('tempattugas'),
                "agama_pegawai" => $this->input->post('agama'),
                "id_unit" => $this->input->post('unitkerja'),
                "nohp_pegawai" => $this->input->post('nohp'),
                "npwp_pegawai" => $this->input->post('npwp'),
                "foto_pegawai" => null
              );

              $this->db->insert('pegawai', $data);
        }
        else
        {
                $upload_data = $this->upload->data();
                $data = array(
                    "nip_pegawai" => $this->input->post('nip'),
                    "nama_pegawai" => $this->input->post('nama'),
                    "alamat_pegawai" => $this->input->post('alamat'),
                    "nip_pegawai" => $this->input->post('nip'),
                    "tempatlahir_pegawai" => $this->input->post('tempatlahir'),
                    "tanggallahir_pegawai" => $this->input->post('tanggallahir'),
                    "nip_pegawai" => $this->input->post('nip'),
                    "jk_pegawai" => $this->input->post('jk'),
                    "golongan_pegawai" => $this->input->post('golongan'),
                    "eselon_pegawai" => $this->input->post('eselon'),
                    "jabatan_pegawai" => $this->input->post('jabatan'),
                    "tipe_pegawai" => $this->input->post('tipe'),
                    "tempattugas_pegawai" => $this->input->post('tempattugas'),
                    "agama_pegawai" => $this->input->post('agama'),
                    "id_unit" => $this->input->post('unitkerja'),
                    "nohp_pegawai" => $this->input->post('nohp'),
                    "npwp_pegawai" => $this->input->post('npwp'),
                    "foto_pegawai" => $upload_data['file_name']
                  );     
                  $this->db->insert('pegawai', $data);       
        }     
    }

    function uploadPhoto($id)
    {
        $photo = $this->db->get_where('pegawaiview', array('id_pegawai' => $id))->result();
        if($photo[0]->foto_pegawai !=NULL)
        {
            $linkfoto = './fotouploads/'.$photo[0]->foto_pegawai;
            unlink($linkfoto);           
        }

        $config['upload_path']          = './fotouploads/';
        $config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100000;
		$config['max_width']            = 1024;
        $config['max_height']           = 768;
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload('foto'))
        {
            $this->upload->display_errors();
        }
        else
        {
            $upload_data = $this->upload->data();
            $data = array(
                "foto_pegawai" => $upload_data['file_name']
             );
             $this->db->where('id_pegawai', $id);
             $this->db->update('pegawai', $data);   
        }               
    }

    function delete_pegawai($id)
    {
        $photo = $this->db->get_where('pegawai', array('id_pegawai' => $id))->result();
        if($photo[0]->foto_pegawai !=NULL)
        {
            $linkfoto = './fotouploads/'.$photo[0]->foto_pegawai;
            unlink($linkfoto);           
        }
        $this->db->delete('pegawai', array('id_pegawai' => $id)); 
    }

}