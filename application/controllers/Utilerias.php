<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilerias extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function Sistemas() {
		if($this->session->userdata('usuarios_id')) {
			echo 1;
			//$this->load->template('utilerias/usuarios');
		} else {
			redirect('/');
		}
	}
}
