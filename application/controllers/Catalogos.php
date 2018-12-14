<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalogos extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model('Model_super');
	}
	
	public function Usuarios() {
		if ($this->input->is_ajax_request()) {
			parse_str($this->security->xss_clean($this->input->post('data')), $respuesta['post']);

			$numeropagina = $this->input->post("nropagina");
            $cantidad = $this->input->post("cantidad");
            $respuesta['post']['inicio'] = ($numeropagina - 1) * $cantidad;
            $respuesta['post']['fin'] = $cantidad;

            $this->Model_super->setTabla('tbl_cat_usuarios tcu');

            $params = array();
            $sql = 'tcu.*';

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

		if($this->session->userdata('usuarios_id')) {
			$this->load->template('catalogos/usuarios');
		} else {
			redirect('/');
		}
	}

    public function TipoUsuarios() {
        if ($this->input->is_ajax_request()) {
            parse_str($this->security->xss_clean($this->input->post('data')), $respuesta['post']);

            $numeropagina = $this->input->post("nropagina");
            $cantidad = $this->input->post("cantidad");
            $respuesta['post']['inicio'] = ($numeropagina - 1) * $cantidad;
            $respuesta['post']['fin'] = $cantidad;

            $this->Model_super->setTabla('tbl_cat_tipousuario tct');

            $params = array();
            $sql = 'tct.*';

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

        if ($this->session->userdata('usuarios_id')) {
            $this->load->template('catalogos/tipousuarios');
        } else {
            redirect('/');
        }
    }

    public function FormularioTipoUsuarios() {
        if ($this->session->userdata('usuarios_id')) {
            $this->load->template('catalogos/formularios/FormularioTipoUsuarios', $respuesta);
        } else {
            redirect('/');
        }
    }

    public function Estatus() {
        if ($this->input->is_ajax_request()) {
            parse_str($this->security->xss_clean($this->input->post('data')), $respuesta['post']);

            $numeropagina = $this->input->post("nropagina");
            $cantidad = $this->input->post("cantidad");
            $respuesta['post']['inicio'] = ($numeropagina - 1) * $cantidad;
            $respuesta['post']['fin'] = $cantidad;

            $this->Model_super->setTabla('tbl_cat_estatus tce');

            $params = array();
            $sql = 'tce.*';

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

        if ($this->session->userdata('usuarios_id')) {
            $this->load->template('catalogos/estatus');
        } else {
            redirect('/');
        }
    }

    public function FormularioEstatus($id = null) {
        $this->Model_super->setTabla('tbl_cat_estatus tce');

        $params = array();
        $sql = 'tce.*';

        $respuesta['data'] = null;
        $respuesta['id'] = $id;

        if ($id) {
            $params[] = array('campo' => 'estatus_id', 'value' => $id, 'type' => 'where');
            $respuesta['data'] = $this->Model_super->find('first', array('conditions' => $params, 'fields' => $sql));
        }

        if ($this->input->post()) {
            $data = $this->security->xss_clean($this->input->post());
            if ($id) {
                $data['estatus_id'] = $id;
            }

            //$this->Model_super->save($data);
            redirect('Catalogos/Estatus');
        }

        if ($this->session->userdata('usuarios_id')) {
            $this->load->template('catalogos/formularios/FormularioEstatus', $respuesta);
        } else {
            redirect('/');
        }
    }
}
