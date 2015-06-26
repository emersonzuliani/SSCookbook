<?php
defined('BASEPATH') OR exit('Acesso direto não permitido!');

class UnidMedida extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
	
		$this->load->model("cbunidmedida_model");
		$classificacao = $this->cbunidmedida_model->listaTodos();
	
		$dados = array("unidmedida" => $classificacao);
	
		$this->load->view("cabecalho");
		$this->load->view("unidmedida/unidmedida_grid", $dados);
		$this->load->view("rodape");
	}
	
	public function cadastro() {
		$dados = array ("und_codigo" => "",
				        "und_descricao" => "");
		$this->load->view("cabecalho");
		$this->load->view("unidmedida/unidmedida_form",$dados);
		$this->load->view("rodape");
	}
	
	public function salvar() {
		$this->load->library("form_validation");
		$this->form_validation->set_rules("und_codigo","Código", "trim|required");
		$this->form_validation->set_rules("und_descricao","Descrição", "trim|required");
		$this->form_validation->set_error_delimiters("<p class='alert alert-danger'>","</p>");
		$sucesso = $this->form_validation->run();
		$dados = array ("und_codigo" => strtoupper($this->input->post("und_codigo")), "und_descricao" => $this->input->post("und_descricao"));
	
		if($sucesso) {
			$class = array(
					"und_codigo" => strtoupper($this->input->post("und_codigo")),
					"und_descricao" => $this->input->post("und_descricao"),
			);
			$this->load->model("cbunidmedida_model");
			$res = $this->cbunidmedida_model->salva($class);
			if ($res === "Sucesso") {
				$this->session->set_flashdata('success','Unidade de Medida Salva!');
				redirect("unidmedida/unidmedida");
			} else {
				$this->session->set_flashdata('danger',$res . ' % '. $class['und_codigo']);
				$this->load->view("cabecalho");
				$this->load->view("unidmedida/unidmedida_form", $dados);
				$this->load->view("rodape");
			}
		} else {
			$this->load->view("cabecalho");
			$this->load->view("unidmedida/unidmedida_form", $dados);
			$this->load->view("rodape");
		}
	
	}
	
	public function excluir($codigo) {
		//excluir código
		$this->load->model("cbunidmedida_model");
		$res = $this->cbunidmedida_model->recupera(strtoupper($codigo));
		if ($res) {
			$this->cbunidmedida_model->excluir(strtoupper($codigo));
			$this->session->set_flashdata('success','Registro excluído: '. $codigo);
		} else {
			$this->session->set_flashdata('danger','Registro não localizado: '. $codigo);
		}
		redirect("unidmedida/unidmedida");
	}
	
	public function editar($codigo) {
		//recupera o registro
		$this->load->model("cbunidmedida_model");
		$clas = $this->cbunidmedida_model->recupera(strtoupper($codigo));
		if ($clas) {
			$dados = $clas;
			$this->load->view("cabecalho");
			$this->load->view("unidmedida/unidmedida_form", $dados);
			$this->load->view("rodape");
		} else {
			$this->session->set_flashdata('danger','Código não localizado: '. $codigo);
			redirect("unidmedida/unidmedida");
		}
	
	}
	
	
	
}

?>
