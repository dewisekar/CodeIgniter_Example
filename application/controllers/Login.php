<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this->load->library('form_validation');
    }

	public function index()
	{
		$this->load->view('login');
	}

	function login()
	{
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error', 'Username dan password harus terisi!' );
			redirect('login');  
		}

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
		);
		
		$cek = $this->user->logged_in("users", $where)->num_rows();

		if($cek>0)
		{
			$data_session = array (
				'nama' => $username,
				'logged_in' => TRUE
			);

			$this->session->set_userdata($data_session);

			redirect(base_url("dashboard"));
		}

		else
		{
			$this->session->set_flashdata('error', 'Username atau password salah!');  
			redirect('login');
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}


}