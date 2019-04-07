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
        if($this->session->userdata('logged_in') !== TRUE)
        {
            redirect('login');
        }
    }

    public function showDetail($id)
	{   
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
}