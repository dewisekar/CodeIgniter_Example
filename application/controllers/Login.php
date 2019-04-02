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
    }

	public function index()
	{
		if($this->user->logged_id())
		{
			//ini buat ke dashboard
			redirect("dashboard");
		}
		else
		{
			//field, label, rules
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			//set message validation alert
			$this->form_validation->set_message('required', 
			'<div class="col-md-6">
				<!-- Danger Alert -->
				<div class="alert alert-danger alert-dismissable" role="alert">
					<h3 class="alert-heading font-size-h4 font-w400">Error</h3>
					<p class="mb-0">{field} harus diisi!</p>
				</div>
				<!-- END Danger Alert -->
			</div>');

			//cek validasi
			if ($this->form_validation->run() == TRUE) 
			{
				$username = $this->input->post("username", TRUE);
                $password = MD5($this->input->post('password', TRUE));
    
                //checking data via model
                $checking = $this->user->check_login('users', array('username' => $username), array('password' => $password));
			
				if ($checking != FALSE) 
				{
					foreach ($checking as $apps) 
					{					
						$session_data = array(
							'user_id'   => $apps->id_user,
							'user_name' => $apps->username,
							'user_pass' => $apps->password,
						);
						//set session userdata
						$this->session->set_userdata($session_data);

						redirect('dashboard/');
					}
				}
				else
                {
                
                    $data['error'] = '<div class="col-md-6">
						<!-- Danger Alert -->
						<div class="alert alert-danger alert-dismissable" role="alert">
							<h3 class="alert-heading font-size-h4 font-w400">Error</h3>
							<p class="mb-0">Username atau Password salah!</p>
						</div>
						<!-- END Danger Alert -->
					</div>';
                    $this->load->view('login', $data);
                }
			}

			else
			{
				$this->load->view('login');
			}			
		}
	}
}