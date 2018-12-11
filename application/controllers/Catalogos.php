<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalogos extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function usuarios() {
		if($this->session->userdata('usuarios_id')) {
			$this->load->template('utilerias/usuarios');
		} else {
			redirect('/');
		}
	}
}
