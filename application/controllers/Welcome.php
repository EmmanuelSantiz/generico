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

	public function login() {
		if($this->input->is_ajax_request()) {
			$respuesta['post'] = $this->security->xss_clean($this->input->post());

			$user = $this->db->query("SELECT * FROM tbl_cat_usuarios WHERE char_user = '".strtolower($respuesta['post']['char_user'])."' AND char_password = SHA1(CONCAT(char_salt, SHA1(CONCAT(char_salt, SHA1('".$respuesta['post']['char_password']."')))))")->row();

            if ($user) {
            	$sessiondata = array('usuarios_id' => $user->usuarios_id);
				$this->session->set_userdata($sessiondata);
				$respuesta['data'] = TRUE;
            } else {
            	$respuesta['data'] = FALSE;
            }

			return retornoJson($respuesta);
		}
	}
}
