<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Pruebas
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Daniel Walter Pérez Corvalán  <walter@walex.net>
 * @link      www.walex.net
 * @param     ...
 * @return    ...
 *
 */

class Pruebas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // 
        $this->load->view('pruebas/viewPruebaForm');
    }

    public function upload()
    {
        // Preparamos parametros del archivo a subir
        $archivo = 'archivoWal';                                // el nombre del imput/file en el form
        $config['upload_path']      = './Docus/img/';           // La carpeta donde se guardara
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = 2000;                     // Max Tamaño en Kb
        //$config['max_width']        = 1024;                   // Max ancho en px
        //$config['max_height']       = 768;                    // Max Alto en px
        $config['file_name']        = date('YMD-His') . 'img';  // El nombre que le pondremos

        $this->load->library('upload', $config);                // Cargamos la libreria y le pasamos la configuración
        echo ('<pre>');
        /**
         * El metodo do_upload se encarga de copiar el archivo al lugar deseado
         * con el nombre deseado y devuelve true si tuvo exito
         */
        //print_r($_POST['archivoWal']); echo '<br>';
        if (!$this->upload->do_upload($archivo)) {
            echo 'Error: '.$this->upload->display_errors();     // Si hubo error, mostramos el mensaje
        } else {
            print_r($this->upload->data());                     // Si todo Ok simplemente mostramos el resultado
        }
    }

    function pruebapdf()
    {
        $this->load->library('pdf');
        $viewdata   = array('prueba' => 'hola que tal'); // <-- esto es por si tenemos que pasar parametros a la vista
        $html       = $this->load->view('invoice-print', $viewdata, TRUE);
        $archivoPDF = "comprobante_pago";

        // Cargamos el contenido HTML
        $this->pdf->loadHtml($html);
        // (Optional) Setup the paper size and orientation landscape=Horisontal y portrait=vertical
        // @see \Dompdf\Adapter\CPDF::PAPER_SIZES for valid sizes
        $this->pdf->setPaper('A4', 'landscape');
        // Renderiza el HTML como PDF 
        $this->pdf->render();
        // Genere el PDF generado (1 = descargar y 0 = previsualizar) 
        $this->pdf->stream($archivoPDF, array("Attachment" => 0));
    }
}


/* End of file Pruebas.php */
/* Location: ./application/controllers/Pruebas.php */
