<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facturas extends CI_Controller {
	public function __construct(){
        parent::__construct();
        // comprobamos session
		if (!$this->session->login) redirect('Inicio');
		// Cargamos Modelos necesarios
		$this->load->model('Factura_model');
		$this->load->model('Pisos_model');
		$this->load->model('Servicios_model');
		// Cargamos Librerias
        $this->load->library('pagination');
        // Cargamos Helpers
        $this->load->helpers('arreglos_helper');

		// $this->load->controller('Pagos');
	}

	public function index($offset=0, $ficha=FALSE, $datos_ficha=null, $result=null, $edita=FALSE)
	{
		// Empezamos con el paginador
		// Variables y Arreglos de configuracion del Paginador
		$limite = 5; 										   // Numero de registros a mostrar con 0 mostramos todos y no muestra el paginador
		$total_factu = $this->Factura_model->total_factu();    // Nos devuelve el total de registros

		$config['base_url']    = base_url().'Facturas/index/'; // La funcion que llamara el paginador
		$config['total_rows']  = $total_factu->TOTAL; 		   // Total de registros de la consulta
		$config['per_page']    = $limite;					   // Numero de registros a mostrar por pagina
		$config['uri_segment'] = 3;
		$config['num_links']   = 2;							   // Numero de links a mostrar antes y despues de la pagina actual

		// Fin de la configuracion
		// La configuracion del paginador esta en application/config/pagination.php
		// Inicializamos el paginador
		$this->pagination->initialize($config);

		// fin del paginador

		// Variables del encabezado de la vista
        $data_enc_cuerpo['lugar'] = "Facturas";
		$data_enc_cuerpo['uri'] = "Facturas";

		// Configuramos  las variables del cuerpo de la vista
		if($result===null)
		{
			$result = $this->Factura_model->get_factu($offset,$limite);
		}

		if($ficha or $edita)
		{
			$data['datos_ficha'] = $datos_ficha->row();
		}

		$data['servicios'] = $this->Servicios_model->get_servicios();
		$data['pisos']     = $this->Pisos_model->get_pisos();
		$data['consulta']  = $result;
		$data['ficha'] 	   = $ficha;
		$data['edita']	   = $edita;

		// Cargamos las Vistas
		$this->load->view('principal/header'); // Obligado
		$this->load->view('principal/enca_logo_cuerpo'); // Obligado
		$this->load->view('principal/loginmenu_cuerpo'); // Obligado
		$this->load->view('principal/enca_cuerpo', $data_enc_cuerpo); // Obligado
		$this->load->view('cuerpo_factura', $data); // Segun corresponda
		$this->load->view('principal/pie_cuerpo'); // Obligado
		$this->load->view('principal/foot'); // Obligado
	}

	public function ficha($id)
	{
		$ficha = $this->Factura_model->get_ficha($id);
		$this->index(0,TRUE, $ficha);
	}

	public function alta()
	{
        // Añadimos los factura con los datos 
		$this->Factura_model->addfactu();
		// Buscamos esa factura
		$ficha = $this->Factura_model->find_factu(strtoupper($this->input->post('numero',true))); // 
        $factura = $ficha->row();
        // En $movimientos guardamos los inquilinos que estuvieron en ese periodo
        // $movimientos = $this->Factura_model->pagos_factura('2019-09-05', '2019-11-04', 6);
        $movimientos = $this->Factura_model->pagos_factura($factura->fdes, $factura->fhas, $factura->idpiso);
        
        $data   = array();
        if ($movimientos->result()){    // Comprobamos si el piso estuvo ocupado
                                        // Si hubo usuarios en ese periodo, calculamos los pagos 
                                        // correspondientes con la funcion:
                                        // calculoDePagosPorUsuario($movimientos, $factura)
                                        // con los datos que nos devuelve generamos el arreglo
                                        // $data con cada uno de los recibos correspondientes
                                        // a cada usuario
            $pagos = $this->calculoDePagosPorUsuario($movimientos, $factura);
            $x      = 0;
            foreach($pagos['usuarios'] as $datos){
                foreach($datos as $id => $linea){
                    $data[$x][$id] = $linea;
                }
                $data[$x]['idfactura']  = $pagos['idfac'];
                $data[$x]['confac']     = $pagos['consumo_factura'];
                $data[$x]['preuni']     = $pagos['preciounitario'];
                $x++;
            }
        }else{                          // Si no tuvo usuarios, ponemos los datos del administrador
                                        // quien pagará la factura
            $data[0]['fdes']        = $factura->fdes;
            $data[0]['fhas']        = $factura->fhas;
            $data[0]['pax']         = 1;
            $data[0]['idinqui']     = 1;
            $data[0]['descuento']   = 0;
            $data[0]['importe']     = $factura->importe;
            $data[0]['idfactura']   = $factura->id;
            $data[0]['confac']      = $factura->lact - $factura->lant;
            $data[0]['preuni']      = $factura->importe / ($factura->lact - $factura->lant);

        }
        // Añadimos los datos a la tabla recpagos (Recibos de Pagos)
        $this->Factura_model->addpagos($data);
		$this->index();
	}

	public function baja($id)
	{
		$this->Factura_model->del_factu($id);
		$this->index();
	}

	public function editar($id)
	{
		// preparamos la vista para ver el formulario de edicion
		// Llamamos la funcion get_ficha() del modelo
		// function index($ficha=FALSE, $datos_ficha=null, $result=null, $edita=FALSE)

		$ficha = $this->Factura_model->get_ficha($id);
		$this->index(0,FALSE,$ficha,NULL,TRUE);
	}

	public function modificar()
	{
		// Pasamos los datos del formulario y lo mandamos al Modelo
		// una vez cargamos los datos del formulario los modificamos en la tabla
		$ficha = $this->Factura_model->edit_factu($this->input->post('id',true));
		$this->index();

	}
	public function buscar(){
		$busqueda = $this->Factura_model->find_factu($this->input->post('buscar_factura',true));
		$this->index(0,FALSE,NULL,$busqueda);
	}

    
    /**
     * calculoDePagosPorUsuario
     *
     * This calculoDePagosPorUsuario helpers
     *
     * @param   $factura      = Objeto de factura a calcular pagos
     *                          Ej: $factura->id, $factura->importe, $factura->lact etc...
     * 
     *          $movimientos  = Objeto con resultado de la consulta movimiento con los registros
     *                          de todos los movimientos de los inquilinos que han estado en el 
     *                          periodo a cobrar por la factura.
     * @return  $pagos Tipo Array() = 
     */
    public function calculoDePagosPorUsuario($movimientos, $factura)
    {
        // 
        // Creamos arreglo $movi_corte a partir de $movimientos
        // separando el movimiento de entrada con el de salida en registros independientes
        // Diferenciamos por el servicio, si es Luz, Agua o Gas y seleccionamos solo uno de ellos
        // campo $factura->idservicio 1=LUZ, 2=AGUA y 3=GAS
        //
        
    
        foreach ($movimientos->result() as $linea)
        {
            // Comprobamos el tipo de servicio a tratar segun la factura
            switch ($factura->idservicio)
            {
                case 1:
                    $servicioE = $linea->lluzE;
                    $servicioS = $linea->lluzS;
                break;
                case 2:
                    $servicioE = $linea->laguaE;
                    $servicioS = $linea->laguaS;
                break;
                case 3:
                    $servicioE = $linea->lgasE;
                    $servicioS = $linea->lgasS;
                break;
            }
    
            $movi_corte[] = array ('id'=>$linea->id, 'idinquilino'=>$linea->idinquilino, 'usuario'=>$linea->usuario, 'pax'=>$linea->pax, 'idpiso'=>$linea->idpiso, 'ocupado'=>$linea->ocupado, 'fecha'=>$linea->fechaE, 'servicio'=>$servicioE, 'entrada'=>1, 'descuento'=>$linea->descuento);
            if ($linea->fechaS){
                $movi_corte[] = array ('id'=>$linea->id, 'idinquilino'=>$linea->idinquilino, 'usuario'=>$linea->usuario, 'pax'=>$linea->pax, 'idpiso'=>$linea->idpiso, 'ocupado'=>$linea->ocupado, 'fecha'=>$linea->fechaS,  'servicio'=>$servicioS, 'entrada'=>0, 'descuento'=>$linea->descuento);
            }
        }
    
        // Oredenamos el Arreglo $movi_corte por campo fecha
        $movi_corte_ord = array();
        $movi_corte_ord = sort_tabla($movi_corte, 'fecha', true);
    
        // Creamos arreglo cortes y vamos calculando los gastos correspondientes segun periodos de los usuarios
        // que estuvieron ocupando habitacion en el periodos correspondiente de la factura
        // El arreglo $cortes lo generamos a partir del arreglo auxiliar $movi_corte
    
        $consumo_factura = $factura->lact - $factura->lant;
        $preciounitario = $factura->importe / $consumo_factura;
    
        $datos['consumo_factura']   = $consumo_factura;
        $datos['preciounitario']    = $preciounitario;
        $datos['idfac']             = $factura->id;
    
        // Esto es todo a modo de prueba
        // *************************************************************
        // imprmimimos de modo prueba
        //   echo 'Total Inquilinos: '.count($movimientos->result()); echo '<br>';
        //   echo 'Periodo: '.$factura->fdes.' - '.$factura->fhas; echo '<br>';
        //   echo 'Lectura: '.$factura->lant.' - '.$factura->lact; echo '<br>';
        //   echo 'Consumo Factura: '.$consumo_factura; echo '<br>';
        //   echo 'Servicio: '.$factura->idservicio.' '.$factura->servicio; echo '<br>';
        //   echo 'Importe: '.$factura->importe; echo '<br>';
        //   echo 'Precio Unitario: '.number_format($preciounitario,2,",","."); echo '<br>';
        //   echo '<br>';
    
        //   echo "<pre>";
    
        //   // var_dump($movi_corte); // --> se imprime la variable en crudo
        //   echo str_pad('id',12,'_').' '.str_pad('idinquilino',12,'_').' '.str_pad('usuario',12,'_').' '.str_pad('pax',12,'_').' '.str_pad('idpiso',12,'_').' '.str_pad('ocupado',12,'_').' '.str_pad('fecha',12,'_').' '.str_pad('Lectura Cont',12,'_').' '.str_pad('entrada',12,'_').' Descuento';
        //   echo '<br>';
        //   foreach ($movi_corte as $linea)
        //   {
        //       echo '<br>';
        //       echo str_pad($linea['id'],12,'_').' '.str_pad($linea['idinquilino'],12,'_').' '.str_pad($linea['usuario'],12,'_').' '.str_pad($linea['pax'],12,'_').' '.str_pad($linea['idpiso'],12,'_').' '.str_pad($linea['ocupado'],12,'_').' '.str_pad($linea['fecha'],12,'_').' '.str_pad($linea['servicio'],12,'*').' '.str_pad($linea['entrada'],12,'_').' '.$linea['descuento'];
        //       echo '<br>';
            
        //   }
        // *************************************************************
    
        // Preparamos matriz cortes
        // Para  que quede de la siguiente manera: Ordenada por fechas
        // Pedro_____ 2019-09-13
        // Rosario___ 2019-09-13
        // Alina_____ 2019-09-13
        // Halima____ 2019-10-22
        // Rosario___ 2019-11-02
    
        // echo '<br>';
    
        $x = 0;
        foreach ($movi_corte_ord as $linea)
        {
            $x++;
            if ($linea['fecha'] <= $factura->fdes)
            {
                $fper[$x]['fdes']    = $factura->fdes;
                $fper[$x]['lec_con'] = $factura->lant;
            }else{
                $fper[$x]['fdes']    = $linea['fecha'];
                $fper[$x]['lec_con'] = $linea['servicio'];
            } 
            $fper[$x]['usr']     = $linea['usuario'];
        }
    
        // Mostramos
        //  echo '<br>';
        //  echo 'Matriz: $fper';
        //  foreach ($fper as $linea)
        //  {
        //      echo '<br>';
        //      echo str_pad($linea['usr'],10,'_').' '.$linea['fdes'].' - '.$linea['lec_con'];
        //  }
        //  echo '<br>';
    
        // Una ves creada esa matriz, generamos los periodos de "corte" del periodo a facturar
        // Creamos arreglo $periodos, con los periodos y las lecturas correspondientes a los periodos
        $nper = 0;
        $fechaux = $factura->fdes;
        $lecAux  = $factura->lant;
        foreach ($fper as $linea)
        {
            if ($linea['fdes'] == $fechaux)
            {
                $periodos[$nper]['fdes'] = $linea['fdes'];
                $periodos[$nper]['lant'] = $linea['lec_con']; //*
            }else{
                $fechaux = $linea['fdes'];
                $lecAux  = $linea['lec_con']; //*
                $periodos[$nper]['fhas'] = $fechaux; // date("Y-m-d",strtotime($fechaux."- 1 days")); // fhas debe ser fdes - 1
                $periodos[$nper]['lact'] = $lecAux; //*
                $nper ++;
                $periodos[$nper]['fdes'] = $fechaux;
                $periodos[$nper]['lant'] = $lecAux; //*
            }
        }
        $periodos[$nper]['fhas'] = $factura->fhas;
        $periodos[$nper]['lact'] = $factura->lact; //*
    
        // Ejemplo de como queda $periodos
        // 2019-09-13 - 2019-10-22 Lectura: 150 .. 165
        // 2019-10-22 - 2019-11-02 Lectura: 165 .. 190
        // 2019-11-02 - 2019-12-12 Lectura: 190 .. 225
    
        // var_dump($periodos);
    
        // Mostramos
        //  echo '<br>';
        //  echo 'Matriz: $periodos';
        //  foreach ($periodos as $linea)
        //  {
        //      echo '<br>';
        //      echo 'Periodo: '.$linea['fdes'].' / '.$linea['fhas'].' - Lectura: '.$linea['lant'].' .. '.$linea['lact'];
        //  }
    
        // Ahora creamos arreglo con los periodos de cada usuario, arreglo $per_usu (periodo usuario)
        $x = 0;
        foreach ($movimientos->result() as $linea)
        {
            if ($linea->fechaE <= $factura->fdes)
            {
                $per_usu[$x]['fechaE'] = $factura->fdes;
            }else{
                $per_usu[$x]['fechaE'] = $linea->fechaE;
            }
    
            if ($linea->fechaS >= $factura->fhas)
            {
                $per_usu[$x]['fechaS'] = $factura->fhas;
            }elseif($linea->fechaS==null){
                $per_usu[$x]['fechaS'] = $factura->fhas;
            }else{
                $per_usu[$x]['fechaS'] = $linea->fechaS;
            }
                
            $per_usu[$x]['id']          = $linea->idinquilino;
            $per_usu[$x]['usu']         = $linea->usuario;
            $per_usu[$x]['pax']         = $linea->pax;
            $per_usu[$x]['descuento']   = $linea->descuento;
            $x++;
        }
    
        // Mostramos
        // echo '<br>';
        // echo '<br>';
        // echo 'Matriz: $per_usu';
        // foreach ($per_usu as $linea)
        // {
        //     echo '<br>';
        //     echo 'Periodo: '.$linea['fechaE'].' / '.$linea['fechaS'].' - Usuario: '.str_pad($linea['id'],2,' ').' - '.str_pad($linea['usu'],10,'_').' PAX: '.$linea['pax'];
        // }
        // echo '<br>';
    
        // Verificamos a que periodos pertenece cada usuario
        // private function en_rango($fechaeva, $fechaini, $fechafin)
        // echo 'Periodo: '.$linea['fdes'].' / '.$linea['fhas'] $linea['lant'].' .. '.$linea['lact'];
        // Creamos arreglo final $usuarios_periodos
        
        $PAX_per = 0;
        foreach ($periodos as $index => $per)
        {
            $cons = $per['lact']-$per['lant'];
            $impcons = $cons * $preciounitario;
            foreach ($per_usu as $usu)
            {
                if($this->en_rango($per['fdes'],$usu['fechaE'],$usu['fechaS']) || $this->en_rango($per['fhas'],$usu['fechaE'],$usu['fechaS']))
                {
                    if (($usu['fechaS']!=$per['fdes']) && ($usu['fechaE']!=$per['fhas']))
                    {
                        $PAX_per += $usu['pax'];         // En esta variable acumulamos el PAX total del periodo
                        // Datos usuarios por periodo
                        $usuario[] = array (
                            'fechaE'   => $usu['fechaE'],       // Fecha inicio periodo del usuario
                            'fechaS'   => $usu['fechaS'],       // Fecha final periodo del usuario
                            'id'       => $usu['id'],           // ID del usuario
                            'usu'      => $usu['usu'],          // Nombre corto del Usuario
                            'pax'      => $usu['pax'],          // PAX del usuario
                            'descuento'=> $usu['descuento'],    // Descuento
                        ) ;
                        
                    }
                }
            }
            // Datos globales al periodo
            $usuarios_periodo[$index]['fdes']    = $per['fdes'];  // Fecha Inicio Periodo
            $usuarios_periodo[$index]['fhas']    = $per['fhas'];  // Fecha Fin del Periodo
            $usuarios_periodo[$index]['lant']    = $per['lant'];  // Lectura anterior del contador
            $usuarios_periodo[$index]['lact']    = $per['lact'];  // Lectura Actual del contador
            $usuarios_periodo[$index]['cons']    = $cons;         // Consumo del contador 
            $usuarios_periodo[$index]['paxper']  = $PAX_per;      // El Pax total del periodo
            $usuarios_periodo[$index]['usu']     = $usuario;      // Arreglo con los Usuarios activos en este periodo
            $usuarios_periodo[$index]['impcons'] = $impcons;      // Importe total del periodo a pagar
            $PAX_per = 0;
            $usuario = null;
        }
    
        // Mostramos
        // echo '<br>';
        // echo '<br>';
        // echo 'Matriz: $usuarios_periodos';
        // foreach ($usuarios_periodo as $index => $linea)
        // {
        //     echo '<br>';
        //     echo 'Periodo: '.$linea['fdes'].' / '.$linea['fhas'].' Lectura Con: '.$linea['lant'].'-'.$linea['lact'].' = '.$linea['cons'].' PAX:'.$linea['paxper'].' Importe: '.number_format($linea['impcons'],2,",",".").' User';
        //     foreach ($linea['usu'] as $user)
        //     {
        //         echo ' ID: '.$user['id'].' '.$user['usu'].' Pax:'.$user['pax'];
        //     }
        // }
    
        // Creamos arreglo $usuarios
        // Periodo1: User ID: 10 Pedro Pax:1.0 ID: 7 Rosario Pax:1.0 ID: 9 Alina Pax:1.0
        // Periodo2: User ID: 10 Pedro Pax:1.0 ID: 7 Rosario Pax:1.0 ID: 8 Halima Pax:1.0 ID: 9 Alina Pax:1.0
        // Periodo3: User ID: 10 Pedro Pax:1.0 ID: 8 Halima Pax:1.0 ID: 9 Alina Pax:1.0
        //
        foreach ($usuarios_periodo as $index => $linea)
        {
            foreach ($linea['usu'] as $user)
            {
                $usuario[] = array (
                    'per'       => $index,              // Periodo si es 0, 1, 2, etc
                    'fdes'      => $user['fechaE'],     // Fecha inicio periodo
                    'fhas'      => $user['fechaS'],     // Fecha final periodo
                    'contador'  => $linea['cons'],      // Consumo del periodo (lact-lant)
                    'paxper'    => $linea['paxper'],    // Pax Total del periodo
                    'impper'    => $linea['impcons'],   // Importe a pagar
                    'idinqui'     => $user['id'],         // ID de usuario
                    'nick'      => $user['usu'],        // Nick
                    'paxusr'    => $user['pax'],        // Pax usuario
                    'descuento' => $user['descuento'],  // Descuento si lo tuviese
                    'impusr'    => (($linea['impcons'] / $linea['paxper']) * $user['pax'])-$user['descuento'], // Importe a pagar por el usuario
                );
    
            }
        }
    
        // Mostramos
        // echo '<br>';
        // echo '<br>';
        // echo 'Matriz: $usuario'; echo '<br>';
        // echo str_pad('Periodo',8,'_').' '.str_pad('Inicio',10,'_').'/'.str_pad('Fin',10,'_').' '.str_pad('Contador',8,'_').' '.str_pad('PAX Per',8,'_').' '.str_pad('IMP Per',8,'_').' '.str_pad('ID',4,'_').' '.str_pad('Nick',12,'_').' '.str_pad('PAX USR',8,'_').' '.str_pad('IMP USR',8,'_');
    
        // print_r($usuario);
    
        // foreach ($usuario as $linea)
        // {
        //     echo '<br>';
        //     echo str_pad($linea['per'],8,'_').' '.str_pad($linea['fdes'],10,'_').'/'.str_pad($linea['fhas'],10,'_').' '.str_pad($linea['contador'],8,'_').' '.str_pad($linea['paxper'],8,'_').' '.str_pad(number_format($linea['impper'],2),8,'_').' '.str_pad($linea['idinqui'],4,'_').' '.str_pad($linea['nick'],12,'_').' '.str_pad($linea['paxusr'],8,'_').' '.number_format($linea['impusr'],2);
        // }
    
        // Agrupamos tabla por columna nick
        $usr_group = group_by('idinqui',$usuario);
    
        // echo '<br>';echo '<br>';
        // echo 'Nro de usuarios:'.count($usr_group);
        // print_r($usr_group);
    
        // foreach ($usr_group as $index => $usr)
        // {
        //     echo '<br>';echo '<br>';
        //     echo 'Usuario: '.$index;
        //     foreach ($usr as $linea)
        //     {
        //         echo '<br>';
        //         echo str_pad($linea['per'],8,'_').' '.str_pad($linea['fdes'],10,'_').'/'.str_pad($linea['fhas'],10,'_').' '.str_pad($linea['contador'],8,'_').' '.str_pad($linea['paxper'],8,'_').' '.str_pad(number_format($linea['impper'],2),8,'_').' '.str_pad($linea['idinqui'],4,'_').' '.str_pad($linea['nick'],12,'_').' '.str_pad($linea['paxusr'],8,'_').' '.number_format($linea['impusr'],2);
        //     }
        //     echo '<br>';
        //     echo 'Total importe: '.sumar_column($usr,'impusr');
        //     echo '<br>';
        // }
    
    
        // Resultado de la tabla agrupada por usuario y periodo:
        //
        // PER      fdes        fhas        CONTADOR    PAXPER  IMPPER  idinqui   NICK       PAXUSR    IMPUSR
        // Usuario: Pedro
        // 0_______ 2019-09-13  2019-10-22  15______    3_____  20.00_  10__    Pedro____  1.0____   6.67
        // 1_______ 2019-10-22  2019-11-02  25______    4_____  33.33_  10__    Pedro____  1.0____   8.33
        // 2_______ 2019-11-02  2019-12-12  35______    3_____  46.67_  10__    Pedro____  1.0____   15.56
        // Total importe: 30.555555555556 
        //
        // Usuario: Rosario
        // 0_______ 2019-09-13  2019-10-22  15______    3_____  20.00_  7___    Rosario__  1.0____   6.67
        // 1_______ 2019-10-22  2019-11-02  25______    4_____  33.33_  7___    Rosario__  1.0____   8.33
        // Total importe: 15
        //
        // Usuario: Alina
        // 0_______ 2019-09-13  2019-10-22  15______    3_____  20.00_  9___    Alina____  1.0____   6.67
        // 1_______ 2019-10-22  2019-11-02  25______    4_____  33.33_  9___    Alina____  1.0____   8.33
        // 2_______ 2019-11-02  2019-12-12  35______    3_____  46.67_  9___    Alina____  1.0____   15.56
        // Total importe: 30.555555555556
        
    
        // Creamos $usuvista, arreglo con los datos del usuario (compactado, resumido) para la vista
        foreach ($usr_group as $index => $usr)
        {
            foreach ($usr as $linea)
            {
                $usuvista[$index]= array(
                    'fdes'      => $linea['fdes'],              // Fecha inicio periodo
                    'fhas'      => $linea['fhas'],              // Fecha final periodo
                    'pax'       => $linea['paxusr'],            // Pax
                    'idinqui'     => $linea['idinqui'],             // ID de usuario
                    'descuento' => $linea['descuento'],         // Descuento
                   // 'pagado'  => $this->Pagos_model->pagado($linea['idinqui'],$factura->id) ? true : false,
                    'importe' => sumar_column($usr,'impusr'), // Importe a pagar
                );
            }
        }
    
        // foreach ($usuvista as $linea){
        //     echo '<br>';
        //     echo $linea['user'].'  '.$linea['importe'].'  '.$linea['fdes'].' - '.$linea['fhas'].' '.$linea['pax'];
        // }
        
    
        $datos['usuarios'] = $usuvista;
    
        return $datos;
    }

	/**
	 * Esta es una funcion auxiliar para calculoDePagosPorUsuario
	 */
	public function en_rango($fechaeva, $fechaini, $fechafin)
    {
        $fecha  = strtotime($fechaeva);
        $inicio = strtotime($fechaini);
        $final  = strtotime($fechafin);

        return (($fecha >= $inicio) && ($fecha <= $final));
    }
}
?>
