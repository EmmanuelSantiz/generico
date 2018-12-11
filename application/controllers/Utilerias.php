<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilerias extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function Sistemas() {
		if($this->session->userdata('usuarios_id')) {
			$this->load->template('utilerias/sistemas');
		} else {
			redirect('/');
		}

		if ($this->input->is_ajax_request()) {
			parse_str($this->security->xss_clean($this->input->post('data')), $respuesta['post']);

			$numeropagina = $this->input->post("nropagina");
            $cantidad = $this->input->post("cantidad");
            $respuesta['post']['inicio'] = ($numeropagina - 1) * $cantidad;
            $respuesta['post']['fin'] = $cantidad;

			$this->load->model('Model_super');
            $this->Model_super->setTabla('tbl_cat_sistemas tcs');

            $params = array();
            $sql = 'tcs.*';

            $total = $this->Model_super->find('count',
            	array(
            		'conditions' => $params,
            		'fields' => $sql
            	)
            );

            $respuesta['data'] = $this->Model_super->find('all',
            	array(
            		'conditions' => $params,
            		'limit' => array(
            						$respuesta['post']['fin'],
            						$respuesta['post']['inicio']
            					),
                	'order' => array(
                					$respuesta['post']['orden']['tipo'],
                					$respuesta['post']['orden']['order']
                				),
                	'fields' => $sql,
            	)
            );

            $total_paginas = ($total < 20) ? 1 : ceil($total / 20);

            $respuesta['total_paginas'] = $total_paginas;
            $respuesta['total_registros'] = $total;

			return retornoJson($respuesta);
		}
	}
}
