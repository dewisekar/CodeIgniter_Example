<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailPegawai extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user');
        $this->load->model('pegawaimodel');
        $this->load->model('unitmodel');
        if($this->session->userdata('logged_in') !== TRUE)
        {
            redirect('login');
        }
    }

    public function showDetail($id)
	{   
        $data['list_tree'] =  array($this->unitmodel->get_unit3());
        $arr = $this->unitmodel->get_unitx();
        $data['unit'] = array($arr);
        $data['detpeg'] = $this->db->get_where('pegawaiview', array('id_pegawai' => $id))->result();
       	$this->load->view('admin/detail-pegawai', $data);
    }
    

    public function uploadPhoto($id)
    {
       
        if($this->input->post('submit'))
		{
            $this->pegawaimodel->uploadPhoto($id); 
            $this->session->set_flashdata('success', 'Foto berhasil diupload!');  
			redirect('/pegawai');          
		}
		
    }

    public function uploadPhoto3($id)
    {
       
        if($this->input->post('submit'))
		{
            $arr = $this->db->get_where('pegawaiview', array('id_pegawai' => $id))->result();
            $this->pegawaimodel->uploadPhoto($id); 
            $this->session->set_flashdata('success', 'Foto berhasil diupload!');  
			redirect('unit-pegawai/'.$arr[0]->id_unit);          
		}
		
    }

    public function uploadPhoto2($id)
    {
       
        if($this->input->post('submit'))
		{
            $this->pegawaimodel->uploadPhoto($id); 
            $this->session->set_flashdata('success', 'Foto berhasil diupload!');  
			redirect('/detail-pegawai/'.$id);          
		}
		
    }

    public function editPegawai($id)
    {
        if($this->input->post('submit'))
		{
            $this->pegawaimodel->edit_pegawai($id); 
            $this->session->set_flashdata('success', 'Data pegawai berhasil diubah!');  
			redirect('/detail-pegawai/'.$id);          
		}
		
    }

}