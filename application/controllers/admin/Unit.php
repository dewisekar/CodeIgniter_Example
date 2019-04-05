<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller {

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
		if($this->session->userdata('logged_in') !== TRUE)
		{
			redirect('login');
		}
	}
	
	public function index()
	{
		$unit = $this->get_unit();
		$unit2 = $this->get_unit2();
		$data['list_drop'] = array($unit);
		$data['list_tab'] = array($unit2);
		$this->load->view('admin/unit', $data);
		
	}
	
	public function addUnit()
	{
		if($this->input->post('submit'))
		{
			$this->unitmodel->add_unit();
			$this->session->set_flashdata('success', 'Unit berhasil ditambahkan!');  
			redirect('/unit');
		}
		echo $this->input->post('submit');	
	}

	function get_unit()
	{	$arr = '';
		$data = $this->db->get_where('unit',  array('id_parent' => 0))->result();
		foreach($data as $menu)
		{	
			$arr.= '<option value="'. $menu->id_unit .'">'.$menu->nama_unit.'</option>';
			$counter = $this->db->get_where('unit',  array('id_parent' => $menu->id_unit));
			if($counter->num_rows() > 0)
			{					
				$arr.= $this->fetch_sub_menu('>', $menu->id_unit);	
			}		
	
		}
		return $arr;
	}

	function fetch_sub_menu($ngok, $parent)
	{	
		$arr = '';
		$data = $this->db->get_where('unit',  array('id_parent' => $parent))->result();
		foreach($data as $menu)
		{	
			$arr.= '<option value="'. $menu->id_unit .'">'.$ngok.$menu->nama_unit.'</option>';
			$counter = $this->db->get_where('unit',  array('id_parent' => $menu->id_unit));				
			if($counter->num_rows() > 0)
			{					
				$arr.=$this->fetch_sub_menu($ngok.'>', $menu->id_unit);	
			}		
	
		}
		return $arr;

	
	}
	
	function get_unit2()
	{	$arr = '';
		$data = $this->db->get_where('unit',  array('id_parent' => 0))->result();
		foreach($data as $menu)
		{	
			$arr.= '<tr>
			<td>'.$menu->nama_unit.'</td> 
			<td class="text-left">
				<div class="btn-group">
					<button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit">
						<i class="fa fa-pencil"></i>
					</button>
					<button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#modal-fadein'.$menu->id_unit.'">
						<i class="fa fa-times"></i>
					</button>
				</div>
			</td>
			</tr>
			<!-- Fade In Modal -->
			<div class="modal fade" id="modal-fadein'.$menu->id_unit.'" tabindex="-1" role="dialog" aria-labelledby="modal-fadein" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="block block-themed block-transparent mb-0">
							<div class="block-header bg-primary-dark">
								<h3 class="block-title">Apakah anda yakin anda ingin menghapus unit ini? </h3>
								<div class="block-options">
									<button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
										<i class="si si-close"></i>
									</button>
								</div>
							</div>
							<div class="block-content">
							<p>Semua data pegawai dan subunit dari unit ini akan ikut terhapus juga. '.$menu->nama_unit.'</p>
							
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-alt-success" data-dismiss="modal">
								<i class="fa fa-check"></i> Perfect
							</button>
						</div>
					</div>
				</div>
			</div>
			<!-- END Fade In Modal -->
			';
			$counter = $this->db->get_where('unit',  array('id_parent' => $menu->id_unit));
			if($counter->num_rows() > 0)
			{					
				$arr.= $this->fetch_sub_menu2($menu->id_unit, '>');	
			}	
		}
		
		return $arr;
	}

	function fetch_sub_menu2($parent, $ngok)
	{	
		$arr = '';
		$data = $this->db->get_where('unit',  array('id_parent' => $parent))->result();
		foreach($data as $menu)
		{	
			$arr.= '<tr>
			<td>'.$ngok.$menu->nama_unit.'</td> 
			<td class="text-left">
				<div class="btn-group">
					<button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit">
						<i class="fa fa-pencil"></i>
					</button>
					<button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#modal-fadein'.$menu->id_unit.'">
						<i class="fa fa-times"></i>
					</button>
				</div>
			</td>
			</tr>
			<!-- Fade In Modal -->
			<div class="modal fade" id="modal-fadein'.$menu->id_unit.'" tabindex="-1" role="dialog" aria-labelledby="modal-fadein" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="block block-themed block-transparent mb-0">
							<div class="block-header bg-primary-dark">
								<h3 class="block-title">Apakah anda yakin anda ingin menghapus unit ini? </h3>
								<div class="block-options">
									<button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
										<i class="si si-close"></i>
									</button>
								</div>
							</div>
							<div class="block-content">
							<p>Semua data pegawai dan subunit dari unit ini akan ikut terhapus juga. '.$menu->nama_unit.'</p>
							
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-alt-success" data-dismiss="modal">
								<i class="fa fa-check"></i> Perfect
							</button>
						</div>
					</div>
				</div>
			</div>
			<!-- END Fade In Modal -->';
			$counter = $this->db->get_where('unit',  array('id_parent' => $menu->id_unit));				
			if($counter->num_rows() > 0)
			{					
				$arr.=$this->fetch_sub_menu2($menu->id_unit, $ngok.'>');	
			}		
	
		}
		$arr.='</tr>';
		return $arr;

	
	}
}