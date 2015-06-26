<?php
defined('BASEPATH') OR exit('Acesso direto não permitido!');

class Principal extends CI_Controller {
	
	function index() {
		$this->load->view("cabecalho");
		$this->load->view("rodape");
	}
}

?>
