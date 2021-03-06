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
		$unit3 = $this->unitmodel->get_unit3();
		$data['list_drop'] = array($unit);
		$data['list_tab'] = array($unit2);
		$data['list_tree'] = array($unit3);
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

	public function deleteUnit($id)
	{
		if($this->input->post('submit'))
		{
			$this->unitmodel->delete_unit($id);
			$this->session->set_flashdata('success', 'Unit dan subunitnya berhasil dihapus!');  
			redirect('/unit');
		}
	}

	function get_unit()
	{	$arr = '';
		$data = $this->db->get_where('unit',  array('id_parent' => 0))->result();
		foreach($data as $menu)
		{	
			$pegawai = $this->db->get_where('pegawai',  array('id_unit' => $menu->id_unit));
			if($pegawai->num_rows() < 1)
			{
				$arr.= '<option value="'. $menu->id_unit .'">'.$menu->nama_unit.'</option>';
			}
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
			$pegawai = $this->db->get_where('pegawai',  array('id_unit' => $menu->id_unit));
			if($pegawai->num_rows() < 1)
			{
				$arr.= '<option value="'. $menu->id_unit .'">'.$menu->nama_unit.'</option>';
			}
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
					<button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#modal-fadein'.$menu->id_unit.'">
						<i class="fa fa-trash"></i>
					</button>
				</div>
			</td>
			</tr>
			<!-- Fade In Modal -->
			<div class="modal fade" id="modal-fadein'.$menu->id_unit.'" tabindex="-1" role="dialog" aria-labelledby="modal-fadein" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="block block-themed block-transparent mb-0">
							<div class="block-header bg-pulse-light">
								<h3 class="block-title">Apakah anda yakin anda ingin menghapus unit ini? </h3>
								<div class="block-options">
									<button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
										<i class="si si-close"></i>
									</button>
								</div>
							</div>
							<div class="block-content">
							<p>Semua data pegawai dan subunit dari unit ini akan ikut terhapus juga. </p>
							
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancel</button>
							<form action="'.base_url().'admin/unit/deleteUnit/'.$menu->id_unit.'" method="post">
								<button type="submit" name="submit" class="btn btn-alt-danger"  value="submit">
									<i class="fa fa-trash"></i> Hapus
								</button>
							</form
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
					<button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#modal-fadein'.$menu->id_unit.'">
						<i class="fa fa-trash"></i>
					</button>
				</div>
			</td>
			</tr>
			<!-- Fade In Modal -->
			<div class="modal fade" id="modal-fadein'.$menu->id_unit.'" tabindex="-1" role="dialog" aria-labelledby="modal-fadein" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="block block-themed block-transparent mb-0">
							<div class="block-header bg-pulse-light">
								<h3 class="block-title">Apakah anda yakin anda ingin menghapus unit ini? </h3>
								<div class="block-options">
									<button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
										<i class="si si-close"></i>
									</button>
								</div>
							</div>
							<div class="block-content">
							<p>Semua data pegawai dan subunit dari unit ini akan ikut terhapus juga.</p>
							
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancel</button>
							<form action="'.base_url().'admin/unit/deleteUnit/'.$menu->id_unit.'" method="post">
								<button type="submit" name="submit" class="btn btn-alt-danger" value="submit">
									<i class="fa fa-trash"></i> Hapus
								</button>
							</form
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