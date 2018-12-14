<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function index() {
		if($this->session->userdata('usuarios_id')) {
			$this->load->template('welcome_message');
		} else {
			$this->load->view('layout/template_start');
			$this->load->view('login/login');
		}
	}

	public function getExistente() {
		if ($this->input->is_ajax_request()) {
			$respuesta['post'] = $this->security->xss_clean($this->input->post());
			$respuesta['data'] = $this->db->select('*')->get_where($respuesta['post']['tabla'], array('lower('.$respuesta['post']['campo'].')' => $respuesta['post']['valor']))->row();
			return retornoJson($respuesta);
		}
	}

	public function login() {
		if($this->input->is_ajax_request()) {
			$respuesta['post'] = $this->security->xss_clean($this->input->post());

			$user = $this->db->query("SELECT * FROM tbl_cat_usuarios WHERE char_user = '".strtolower($respuesta['post']['char_user'])."' AND char_password = SHA1(CONCAT(char_salt, SHA1(CONCAT(char_salt, SHA1('".$respuesta['post']['char_password']."')))))")->row();

            if ($user) {
				$this->db->update('tbl_cat_usuarios', array('bit_conectado' => 1), array('usuarios_id' => $user->usuarios_id));

				$sessiondata = array('usuarios_id' => $user->usuarios_id);
				$this->session->set_userdata($sessiondata);

				$bitacora = array('char_url' => onToy(), 'usuario_id' => $user->usuarios_id, 'text_descripcion' => 'Inicio de Sesion', 'date_registro' => date('Y-m-d H:i:s'));
				$this->db->insert('tbl_bitacora', $bitacora);

				$respuesta['data'] = TRUE;
            } else {
            	$respuesta['data'] = FALSE;
            }

			return retornoJson($respuesta);
		}
	}

	public function logout() {
		if($this->session->userdata('usuarios_id')) {

			$bitacora = array('char_url' => onToy(), 'usuario_id' => $this->session->userdata('usuarios_id'), 'text_descripcion' => 'Cierre de sesion', 'date_registro' => date('Y-m-d H:i:s'));
			$this->db->insert('tbl_bitacora', $bitacora);

			$this->db->update('tbl_cat_usuarios', array('bit_conectado' => 0), array('usuarios_id' => $this->session->userdata('usuarios_id')));

			$array_items = array('usuarios_id');
			$this->session->unset_userdata($array_items);
			$this->session->sess_destroy();
			//removeCache();
		}

		redirect('/');
	}
}
