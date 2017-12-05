<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class EXCEL_data extends CI_Controller{
	public function __construct(){
		parent::__construct();


		if ($this->session->userdata('userid') and $this->session->userdata('pass')) {
			$this->load->model('m_aplikasi');

			require_once APPPATH."libraries/PHPExcel/Classes/PHPExcel.php";
		}else{
			redirect(base_url('login'));
		}
	}

	public function index(){
		$objPHPExcel = new PHPExcel();
		
		//set doc properti
		$objPHPExcel->getProperties()->setCreator("Faris Ruri")
									 ->setLastModifiedBy("Faris Ruri")
									 ->setTitle("Office 20017 XLSX Document")
									 ->setSubject("Office 20017 XLSX Document")
									 ->setDescription("Document for office XLSX, generated using PHP classes")
									 ->setKeywords("Office 2007 openxml php")
									 ->setCategory("Result File");

		//judul
		$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:C1');

		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1', 'DAFTAR DATA SISWA');
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);

		$objPHPExcel->setActiveSheetIndex(0)
					->calculateColumnWidths(true);

		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A3', 'NO')
					->setCellValue('B3', 'NIM')
					->setCellValue('C3', 'NAMA');

		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);

		$objPHPExcel->getActiveSheet()->getStyle('A3:C3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('A3:C3')->getFont()->setBold(true);

		//Set Border Cell
		$objPHPExcel->getActiveSheet()->getStyle('A3:C3')->applyFromArray(
			array(
				'borders' => array(
					'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN,
						'color' => array('argb' => '9E9E9E9E')
						)
					)
				)
		);

		//set Bg Cell color
		$objPHPExcel->getActiveSheet()
					->getStyle('A3:C3')
					->getFill()
					->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
					->getStartColor()
					->setARGB('2323B614');

		//mengambil semua baris (dg result())
		//di model m_aplikasi fngs daftar_mahasiswa
		$daftar_mhs = $this->m_aplikasi->daftar_mahasiswa()->result();
		$no = 1;
		$baris = 4;
		foreach ($daftar_mhs as $r) {
					$objPHPExcel->setActiveSheetIndex(0)
								->setCellValue('A'.$baris, $no)
								->setCellValue('B'.$baris, $r->nim)
								->setCellValue('B'.$baris, $r->nama);

		//set Border cell
		$objPHPExcel->getActiveSheet()->getStyle("A".$baris."C".$baris)->applyFromArray(
			array(	'border' => array(
						'allborders' => array(
							'style' => PHPExcel_Style_Border::BORDER_THIN,
							'color' =>array('rgb' => '9E9E9E9E')
							)
						)
			)
		);

		//SET BG CELL COLOR
		$objPHPExcel->getActiveSheet()
					->getStyle("A".$baris.":C".$baris)
					->getFill()
					->getFillType(PHPExcel_Style_Fill::FILL_SOLID)
					->getStartColor()
					->seRGB('FBEE03');

		$no++;
		$baris++;
		
		//rename worksheet
		$objPHPExcel->getActiveSheet()->setTittle('DAFTAR SISWA');

		$objPHPExcel->setActiveSheetIndex(0);

		header('Content-Type: application/vnd.openxml formats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachmnet;filename="DAFTAR_DATA.xlsx"');
		header('Cache-Control: max-age=0');
		header('Cache-Control: max-age=1');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Last-Modified: '.gmdate('D, d M Y H:i:s').'GMT');
		header('Cache-Control: cache, must-revalidate');
		header('Pragma: public');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'excel2007');
		$objWriter->save('php://output');

		unset($objPHPExcel, $daftar_mhs,$no,$baris,$r,$objWriter);


		}		

	}
}

 ?>