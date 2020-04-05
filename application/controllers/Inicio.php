<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;

class Inicio extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//$this->load->library('Pdf');
	}

	public function index()
	{
		$data_enc_cuerpo['lugar'] = "Inicio";
		$data_enc_cuerpo['uri'] = "Inicio";

		$this->load->view('principal/header'); // Obligado
		$this->load->view('principal/enca_logo_cuerpo'); // Obligado
		$this->load->view('principal/loginmenu_cuerpo'); // Obligado
		$this->load->view('principal/enca_cuerpo',$data_enc_cuerpo); // Obligado
		$this->load->view('cuerpo_inicio'); // Segun corresponda
		$this->load->view('principal/pie_cuerpo'); // Obligado
		$this->load->view('principal/foot'); // Obligado
	}

	function pruebapdf()
	{
		$this->load->library('pdf');
		$viewdata = array('prueba' => 'hola que tal'); // <-- esto es por si tenemos que pasar parametros a la vista
		$html = $this->load->view('invoice-print', $viewdata, TRUE);
		$archivoPDF = "comprobante_pago";

		// Cargamos el contenido HTML
		$this->pdf->loadHtml($html);
		// (Optional) Setup the paper size and orientation landscape=Horisontal y portrait=vertical
		// @see \Dompdf\Adapter\CPDF::PAPER_SIZES for valid sizes
        $this->pdf->setPaper('A4', 'landscape');
		// Renderiza el HTML como PDF 
		$this->pdf->render();
		// Genere el PDF generado (1 = descargar y 0 = previsualizar) 
		$this->pdf->stream($archivoPDF,array("Attachment"=>0));

		// $this->pdfgenerator->generate($html, $archivoPDF, true, 'Letter', 'portrait');
	}
}
?>
