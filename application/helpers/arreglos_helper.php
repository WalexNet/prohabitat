<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Helpers arreglos_helper
 *
 * This Helpers for ...
 * 
 * @package   CodeIgniter
 * @category  Helpers
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 *
 */

// ------------------------------------------------------------------------

if (!function_exists('group_by')) {
    /**
     * Function that groups an array of associative arrays by some key.
     * 
     * @param {String} $key Property to sort by.
     * @param {Array} $data Array that stores multiple associative arrays.
     */
    function group_by($key, $data)
    {
        $result = array();

        foreach($data as $val) {
            if(array_key_exists($key, $val)){
                $result[$val[$key]][] = $val;
            }else{
                $result[""][] = $val;
            }
        }
        return $result;
    }
}


if (!function_exists('sumar_column'))
{
    /**
     * Funcion sumar_column, suma una columna de un arreglo bi-dimencional
     * @param {Array} $data, Arreglo a trabajar
     * @param {String} $column, Columna a sumar
     * 
     * Ejemplo:
     * 
     * Array
     *   (
     *       [1] => Array
     *           (
     *               [id] => 1
     *               [nombre] => Producto 1
     *               [precio] => 10
     *           )
     *   
     *       [2] => Array
     *           (
     *               [id] => 2
     *               [nombre] => Producto 2
     *               [precio] => 20
     *           )
     *   )
     * 
     * $total = sumar_column($array,'precio') => Muestra 30
     */

    function sumar_column($data, $column)
    {
        return array_sum(array_column($data, $column));
    }
}

if (!function_exists('sort_tabla'))
{
    /**
     * Esta funcion ordena una "Tabla" (Array bidemencional por la columna deseada)
     * @param {Array} $tabla, Tabla o array a ordenar
     * @param {String} $col, Columna de la tabla a ordenar (Indice del array)
     * @param {Bool} $asc, Si es True ordena de forma ascendente, por defecto es true
     * 
     * sort_tabla($tabla, 'fecha', true)
     * 
     */

     function sort_tabla($tabla, $col, $asc = true)
     {
         foreach ($tabla as $key => $fila)
         {
             $columna[$key] = $fila[$col]; // Preparamos la columna a ordenar
         }
         $sort = $asc ? SORT_ASC : SORT_DESC;
         array_multisort($columna, $sort, $tabla);
         return $tabla;
     }
}

  




// ------------------------------------------------------------------------

/* End of file Arreglos_helper.php */
/* Location: ./application/helpers/Arreglos_helper.php */