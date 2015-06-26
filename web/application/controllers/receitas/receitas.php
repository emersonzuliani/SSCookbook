<?php
defined('BASEPATH') OR exit('Acesso direto não permitido!');

class Receitas extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
	
		//carrega classificação
		$this->load->model("classificacao_model");
		$classificacao = $this->classificacao_model->listaTodos();
		$dados = array("classificacao" => $classificacao);
		
		//carrega categorias
		$this->load->model("cbcategoria_model");
		$categoria = $this->cbcategoria_model->listaTodos();
		$dados["categoria"] = $categoria;
		
			
		$this->load->view("cabecalho");
		$this->load->view("receitas/receitas_form", $dados);
		$this->load->view("rodape");
	}
	
	
	public function getSubCategoria($categoria){
		$this->load->model('cbsubcategoria_model');	
		$result = $this->cbsubcategoria_model->getOptions($categoria);	
		
		echo form_dropdown('sca_codigo',$result,'','id="sca_codigo" class = "form-control"');
	}	
	
	
}

?>

