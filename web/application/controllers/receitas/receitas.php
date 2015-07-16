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
	
	
	public function salvar() {
		//salvar receita
		$this->load->library("form_validation");
		$this->form_validation->set_rules("cat_codigo","Categoria", "required");
		$this->form_validation->set_rules("sca_codigo","Sub-categoria", "required");
		$this->form_validation->set_rules("cla_codigo","Classificação", "required");
		$this->form_validation->set_rules("rec_nome","Nome da Receita", "trim|required|min_length[10]");
		$this->form_validation->set_rules("rec_ingredientes","Ingredientes", "trim|required");
		$this->form_validation->set_rules("rec_tmp_preparo","Tempo de Preparao", "required|greater_than[0]");
		
		$receita = array(
				"rec_codigo" => $this->input->post("rec_codigo"),
				"cat_codigo" => $this->input->post("cat_codigo"),
				"sca_codigo" => $this->input->post("sca_codigo"),
				"cla_codigo" => $this->input->post("cla_codigo"),
				"rec_nome" => $this->input->post("rec_nome"),
				"rec_ingredientes" => $this->input->post("rec_ingredientes"),
				"rec_modopreparo" => $this->input->post("rec_modopreparo"),
				"rec_tmp_preparo" => $this->input->post("rec_tmp_preparo"),
				"rec_rendimento" => $this->input->post("rec_rendimento"),
				"rec_nivel_dificuldade" => $this->input->post("rec_nivel_dificuldade"),
				"rec_classificacao" => $this->input->post("rec_classificacao"),
				"rec_observacoes" => $this->input->post("rec_observacoes"));
				
		$this->form_validation->set_error_delimiters("<p class='alert alert-danger'>","</p>");
				
		$sucesso = $this->form_validation->run();	
		if($sucesso) {				
			$this->load->model("cbreceita_model");
			$res = $this->cbreceita_model->salva($receita);
			if ($res === "Sucesso") {
				$this->load->view("cabecalho");
				$this->load->view("receitas/receita_sucesso");
				$this->load->view("rodape");				
			} else {
				//$this->session->set_flashdata('danger',$res . ' % '. $receita['rec_codigo']);
				//$this->load->view("cabecalho");
				//$this->load->view("receitas/receitas_form");
				//$this->load->view("rodape");
				$this->mostraReceita($receita);
			}
		} else {
			//$this->load->view("cabecalho");
			//$this->load->view("receitas/receitas_form");
			//$this->load->view("rodape");
			$this->mostraReceita($receita);
		}
	}
	
	private function mostraReceita($receita) {
		//carrega classificação
		$this->load->model("classificacao_model");
		$classificacao = $this->classificacao_model->listaTodos();
		$dados = array("classificacao" => $classificacao);
		
		//carrega categorias
		$this->load->model("cbcategoria_model");
		$categoria = $this->cbcategoria_model->listaTodos();
		$dados["categoria"] = $categoria;
		
		//carrega dados
		$dados["receita"] = $receita;
		
		$this->load->view("cabecalho");
		$this->load->view("receitas/receitas_form", $dados);
		$this->load->view("rodape");
	}
	
	public function filtroReceitas() {
				
		//carrega classificação
		$this->load->model("classificacao_model");
		$classificacao = $this->classificacao_model->listaTodos();
		$dados = array("classificacao" => $classificacao);
		
		//carrega categorias
		$this->load->model("cbcategoria_model");
		$categoria = $this->cbcategoria_model->listaTodos();
		$dados["categoria"] = $categoria;
		
		//carrega página de filtro de receitas
		$this->load->view("cabecalho");
		$this->load->view("receitas/receitas_filtro", $dados);
		$this->load->view("rodape");
		
		
	}
	
	public function buscar() {
		//
		$cat_codigo = $this->input->post("cat_codigo");
		$sca_codigo = $this->input->post("sca_codigo");
		$cla_codigo = $this->input->post("cla_codigo");
		$rec_nome   = $this->input->post("rec_nome"); 

		$criterio = [];
		if ($cat_codigo > 0) {
			$criterio[] = 'a.cat_codigo = ' . $cat_codigo;
		}
		if ($cat_codigo > 0) {
			$criterio[] = 'a.sca_codigo = ' . $sca_codigo;
		}
		if ($cat_codigo >0) {
			$criterio[] = 'a.cla_codigo = ' . $cla_codigo;
		}
		if ($rec_nome <> "") {
			$criterio[] = "a.rec_nome like '".$rec_nome."%' ";
		}
		
		$this->load->model("cbreceita_model");
		$receitas = $this->cbreceita_model->buscarReceitas($criterio);
		$dados = array("receitas" => $receitas);
		
		//carrega lista de receitas
		$this->load->view("cabecalho");
		$this->load->view("receitas/receitas_lista", $dados);
		$this->load->view("rodape");
		
	}
	
	
	
	
}

?>

