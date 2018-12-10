<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function index() {
		/*if($this->session->userdata('bit_sesion')) {
			echo 'Con Sesion';
		} else {
			echo 'Sin Sesion';
		}*/
		$this->load->view('welcome_message');
	}
}
