<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PDF_data extends CI_Controller 
{	public function __construct()
	{	parent::__construct();	

		
		if ( $this->session->userdata('userid') and $this->session->userdata('pass') )
		{	$this->load->model('M_aplikasi');

			//require_once APPPATH."libraries/PHPExcel/Classes/PHPExcel.php";
			
			$this->load->library('PHPExcel/Classes/PHPExcel');
		} else
		{	redirect(base_url('login'));
		}	

	}

	public function index()
	{	$rendererName = PHPExcel_Settings::PDF_RENDERER_TCPDF;
		$rendererLibraryPath = APPPATH."libraries/tcpdf";

		
        $objPHPExcel = new PHPExcel();
        
		$objPHPExcel->getProperties()->setCreator("Iqbal Fauzi")
									 ->setLastModifiedBy("Iqbal Fauzi")
									 ->setTitle("DATA SISWA")
									 ->setSubject("DATA SISWA")
									 ->setDescription("DATA SISWA")
									 ->setKeywords("DATA SISWA")
									 ->setCategory("DATA SISWA");

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

		
		$objPHPExcel->getActiveSheet()
				    ->getStyle('A3:C3')
				    ->getFill()
				    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
				    ->getStartColor()
				    ->setARGB('2323B614');

		
		$daftar_mhs = $this->M_aplikasi->daftar_mahasiswa()->result();
		$no = 1;
		$baris = 4;
		foreach ($daftar_mhs as $r)
		{	$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue('A'.$baris, $no)
		            ->setCellValue('B'.$baris, $r->nim)
		            ->setCellValue('C'.$baris, $r->nama);

		    
			$objPHPExcel->getActiveSheet()
				    ->getStyle("A".$baris.":C".$baris)
				    ->getFill()
				    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
				    ->getStartColor()
				    ->setRGB('FBEE03');

		    $no++;
		    $baris++;
		}	

		
		$objPHPExcel->getActiveSheet()->setTitle('DAFTAR SISWA');

		$objPHPExcel->getActiveSheet()->setShowGridLines(false);

		
		$objPHPExcel->setActiveSheetIndex(0);


		if (!PHPExcel_Settings::setPdfRenderer(
				$rendererName,
				$rendererLibraryPath
			)) {
			die(
				'NOTICE: Please set the $rendererName and $rendererLibraryPath values' .
				'<br />' .
				'at the top of this script as appropriate for your directory structure'
			);
		}
		
		header('Content-Type: application/pdf');
		header('Content-Disposition: attachment;filename="DAFTAR_DATA.pdf"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
		$objWriter->save('php://output');
		exit;

		unset($objPHPExcel,$daftar_mhs,$no,$baris,$r,$objWriter);
	}
}