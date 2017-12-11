<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EXCEL_data extends CI_Controller 
{	public function __construct()
	{	parent::__construct();	

		// cek session user. jika tidak ada session, maka redirect ke login
		if ( $this->session->userdata('userid') and $this->session->userdata('pass') )
		{	$this->load->model('m_aplikasi', 'mhs');

			require_once APPPATH."libraries/PHPExcel/Classes/PHPExcel.php";
			// atau
			//$this->load->library('PHPExcel/Classes/PHPExcel');
		} else
		{	redirect(base_url('login'));
		}	

	}

	public function index()
	{	// Create new PHPExcel object
        $objPHPExcel = new PHPExcel();
        // Set document properties
		$objPHPExcel->getProperties()->setCreator("Naufaldi Rafif")
									 ->setLastModifiedBy("Naufaldi Rafif")
									 ->setTitle("Office 2007 XLSX Document")
									 ->setSubject("Office 2007 XLSX Document")
									 ->setDescription("Document for Office 2007 XLSX, generated using PHP classes.")
									 ->setKeywords("office 2007 openxml php")
									 ->setCategory("Result file");
		
		// Judul
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

		// Set Border cell
		$objPHPExcel->getActiveSheet()->getStyle("A3:C3")->applyFromArray(
		    array(
		        'borders' => array(
		            'allborders' => array(
		                'style' => PHPExcel_Style_Border::BORDER_THIN,
		                'color' => array('argb' => '9E9E9E9E')
		            )
		        )
		    )
		);		

		// Set Background cell color
		$objPHPExcel->getActiveSheet()
				    ->getStyle('A3:C3')
				    ->getFill()
				    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
				    ->getStartColor()
				    ->setARGB('2323B614');

		// mengambil semua baris (menggunakan fungsi result()) 
		// di model m_aplikasi function daftar_mahasiswa
		$daftar_mhs = $this->mhs->daftar_mahasiswa()->result();
		$no = 1;
		$baris = 4;
		foreach ($daftar_mhs as $r)
		{	$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue('A'.$baris, $no)
		            ->setCellValue('B'.$baris, $r->nim)
		            ->setCellValue('C'.$baris, $r->nama);

		    // Set Border cell
		    $objPHPExcel->getActiveSheet()->getStyle("A".$baris.":C".$baris)->applyFromArray(
		    array(	'borders' => array(
			            'allborders' => array(
			                'style' => PHPExcel_Style_Border::BORDER_THIN,
			                'color' => array('rgb' => '9E9E9E')
			            )
			        )
			    )
			);

		    // Set Background cell color
			$objPHPExcel->getActiveSheet()
				    ->getStyle("A".$baris.":C".$baris)
				    ->getFill()
				    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
				    ->getStartColor()
				    ->setRGB('FBEE03');

		    $no++;
		    $baris++;
		}	

		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle('DAFTAR SISWA');

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="DAFTAR_DATA.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;

		// menghapus variable dari memory
		unset($objPHPExcel,$daftar_mhs,$no,$baris,$r,$objWriter);
	}
}