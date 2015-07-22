<?php
defined('BASEPATH') OR exit('Acesso direto não permitido!');

class ReceitaFotos extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		
		$this->load->view("cabecalho");
		$this->load->view("receitas/receitas_form", $dados);
		$this->load->view("rodape");	
		
	}
	
	public function receitaFotos($id_receita) {
		$dados = array("receita" => $id_receita);
		
		$this->load->view("cabecalho");
		$this->load->view("receitas/receitas_form", $dados);
		$this->load->view("rodape");		
		
	}
	
	
	
	
}
	
	
?>