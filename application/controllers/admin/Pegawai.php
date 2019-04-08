<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

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
        $this->load->model('unitmodel');
        $this->load->model('pegawaimodel');
        if($this->session->userdata('logged_in') !== TRUE)
        {
            redirect('login');
        }
    }

    public function index()
	{   
        $data['list_tree'] =  array($this->unitmodel->get_unit3());
        $data['counter'] = 1;
        $data['pegawai'] = $this->pegawaimodel->getPegawai();
        $this->load->view('admin/pegawai', $data);	
    }

    public function showForm()
    {
        $data['list_tree'] =  array($this->unitmodel->get_unit3());
        $arr = $this->unitmodel->get_unitx();
        $data['unit'] = array($arr);
        $this->load->view('admin/add-pegawai', $data);
    }

    public function addPegawai()
    {
        if($this->input->post('submit'))
		{
            $this->pegawaimodel->addPegawai();
            $this->session->set_flashdata('success', 'Pegawai berhasil ditambahkan!');  
			redirect('/add-pegawai');         
		}
		
    }

    public function deletePegawai($id)
    {
        if($this->input->post('submit'))
		{
			$this->pegawaimodel->delete_pegawai($id);
			$this->session->set_flashdata('success', 'Pegawai berhasil dihapus!');  
			redirect('/pegawai');
		}
    }

    public function deletePegawai2($id)
    {
        if($this->input->post('submit'))
		{
            $arr = $this->db->get_where('pegawaiview', array('id_pegawai' => $id))->result();
			$this->pegawaimodel->delete_pegawai($id);
			$this->session->set_flashdata('success', 'Pegawai berhasil dihapus!');  
			redirect('unit-pegawai/'.$arr[0]->id_unit);
		}
    }

    public function pegawaiBiro($id)
    {
        $data['pegawaibiro'] =  $this->db->get_where('pegawaiview', array('id_unit' => $id))->result();
        $data['counter'] = $this->db->get_where('pegawaiview', array('id_unit' => $id))->num_rows();
        $data['unit'] = $this->db->get_where('unit', array('id_unit' => $id))->result();
        $data['list_tree'] =  array($this->unitmodel->get_unit3());
        $this->load->view('admin/pegawai-biro', $data);
    }
}