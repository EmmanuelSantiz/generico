﻿<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Funcion para obtener la ubicacion de donde nos encontramos
* @param 
* @return clase y metodo Ej. Inicio/index.
*/
if(!function_exists('onToy')) {
	function onToy($id = null) {
		$ci =& get_instance();
    	return $ci->router->fetch_class().'/'.$ci->router->fetch_method().($id?('/'.$id):'');
	}
}

/**
 * Funcion para obtener datos del usuario logeado
* @param integer id_usuario.
* @return objeto usuario
*/
if(!function_exists('user_info')) {
	function user_info() {
		$ci =& get_instance();
		$resultado = $ci->db->get_where('tbl_cat_usuarios', array('usuario_id' => $ci->session->userdata('usuario_id')))->row();
     	if($resultado->usuario_id) {
     		return $resultado;
     	} else {
     		return null;
     	}
	}
}

/**
 * Funcion para convertir un arreglo a Json
* @param arreglo de datos
* @return JsonArray
*/
if(!function_exists('retornoJson')) {
	function retornoJson($array = array()) {
		$ci =& get_instance();
		return $ci->output->set_content_type('application/json')->set_output(json_encode($array));
	}
}

/**
 * funcion para remover acentos o espacios en blanco en cadenas
 * @param  string $str cadena a configurar
 * @return string      cadena configurada
 */
if(!function_exists('remove_accents')) {
	function remove_accents($str) {
   		$unwanted_array = array('Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y',' '=>'-', ' '=> '');
    	return strtr($str, $unwanted_array);
	}
}

/**
 * Funcion debug 
 * @param $impresion datos a imprimir
 * @return termina la ejecucion
*/
if (!function_exists('dd')) {
	function dd($impresion = ''){
		echo '<pre>';
		var_dump($impresion);
		exit();
	}
}

/**
 * Funcion para generar passwords aleatoriamente
 * @param
 * @return cadena de 10 caracteres
*/
if (!function_exists('temp_pass')) {
	function temp_pass() {
		$caracteres = "ABCDEFGHJKMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz23456789";
		$cadena = "";
		for($i=0; $i<4; $i++) {
    		$cadena .= substr($caracteres,rand(0,strlen($caracteres)),1);
		}
		return $cadena;
	}
}

if (!function_exists('base_url2')) {
	function base_url2($url = '') {
		$ci =& get_instance();
		echo base_url($ci->router->fetch_class().($url!=''?'/'.$url:''.$url));
	}
}