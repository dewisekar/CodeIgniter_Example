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

    public function export()
    {
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
        $excel = new PHPExcel();

        $excel->getProperties()->setCreator('Admin')
                 ->setLastModifiedBy('Admin')
                 ->setTitle("Data Pegawai")
                 ->setSubject("Pegawai");

        $style_col = array(
            'font' => array('bold' => true), // Set font nya jadi bold
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => '88ade8')
            )
        );

        $style_row = array(
            'alignment' => array(
              'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
              'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
              'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
              'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
              'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );
        $style_row2 = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
              'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
              'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
              'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
              'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );

        $style_row2 = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
              'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
              'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
              'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
              'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );

        $excel->getActiveSheet()->mergeCells('A1:O2');
        $excel->getActiveSheet()->setCellValue('A1','DAFTAR PEGAWAI');
        $excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_row2);

        $excel->setActiveSheetIndex(0)->setCellValue('A3', "No");
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "NIP");
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "Nama");
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "Tempat Lahir");
        $excel->setActiveSheetIndex(0)->setCellValue('E3', "Alamat"); 
        $excel->setActiveSheetIndex(0)->setCellValue('F3', "Tgl. Lahir"); 
        $excel->setActiveSheetIndex(0)->setCellValue('G3', "L/P"); 
        $excel->setActiveSheetIndex(0)->setCellValue('H3', "Gol"); 
        $excel->setActiveSheetIndex(0)->setCellValue('I3', "Eselon"); 
        $excel->setActiveSheetIndex(0)->setCellValue('J3', "Jabatan");
        $excel->setActiveSheetIndex(0)->setCellValue('K3', "Tempat Tugas");
        $excel->setActiveSheetIndex(0)->setCellValue('L3', "Agama");
        $excel->setActiveSheetIndex(0)->setCellValue('M3', "Unit Kerja");
        $excel->setActiveSheetIndex(0)->setCellValue('N3', "No. HP");
        $excel->setActiveSheetIndex(0)->setCellValue('O3', "NPWP");

        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);

        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $siswa = $this->pegawaimodel->getPegawai();
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach($siswa as $data)
        { 
            // Lakukan looping pada variabel siswa
            $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nip_pegawai);
            $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama_pegawai);
            $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->tempatlahir_pegawai);
            $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->alamat_pegawai);
            $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->tanggallahir_pegawai);
            $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->jk_pegawai);
            $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->golongan_pegawai);
            $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->eselon_pegawai);
            $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->jabatan_pegawai);
            $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->tempattugas_pegawai);
            $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->agama_pegawai);
            $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->nama_unit);
            $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->nohp_pegawai);
            $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->npwp_pegawai);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row2);
            $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
            
            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }
        // Set width kolom
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(4); 
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(13);
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(4);
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(5);
        $excel->getActiveSheet()->getColumnDimension('I')->setWidth(7);
        $excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('K')->setWidth(13);
        $excel->getActiveSheet()->getColumnDimension('L')->setWidth(9);
        $excel->getActiveSheet()->getColumnDimension('M')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('N')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('O')->setWidth(12);
        
        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("Laporan Data Siswa");
        $excel->setActiveSheetIndex(0);
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Pegawai.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }
}