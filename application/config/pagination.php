<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Aqui configuramos los estilos del paginador/navegador
$config['full_tag_open'] = '<ul class="pagination pg-primary">';
$config['full_tag_close'] = '</ul>';
    
$config['first_link'] = 'Primero';
$config['first_tag_open'] = '<li class="page-item">';
$config['first_tag_close'] = '</li>';
    
$config['last_link'] = 'Ultimo';
$config['last_tag_open'] = '<li class="page-item">';
$config['last_tag_close'] = '</li>';
    
$config['next_link'] = 'Siguiente';
$config['next_tag_open'] = '<li class="page-item">';
$config['next_tag_close'] = '</li>';

$config['prev_link'] = 'Anterior';
$config['prev_tag_open'] = '<li class="page-item">';
$config['prev_tag_close'] = '</li>';

$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
$config['cur_tag_close'] = '</a></li>';

$config['num_tag_open'] = '<li class="page-item">';
$config['num_tag_close'] = '</li>';

// Aqui añadimos y/o modificamos classes al atributo Ancla (<a></a>)
$config['attributes'] = array('class' => 'page-link');
$config['attributes']['rel'] = FALSE;

// Aqui le decimos que nos muestre o no las paginas
$config['display_pages'] = TRUE;

