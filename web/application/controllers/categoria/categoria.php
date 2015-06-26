<?php
defined('BASEPATH') OR exit('Acesso direto não permitido!');

class Categoria extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {

		$this->load->model("cbcategoria_model");
		$classificacao = $this->cbcategoria_model->listaTodos();

		$dados = array("categoria" => $classificacao);

		$this->load->view("cabecalho");
		$this->load->view("categoria/categoria_grid", $dados);
		$this->load->view("rodape");
	}

	public function cadastro() {
		$dados = array ("cat_codigo" => "",
				"cat_descricao" => "");
		$this->load->view("cabecalho");
		$this->load->view("categoria/categoria_form",$dados);
		$this->load->view("rodape");
	}

	public function salvar() {
		$this->load->library("form_validation");
		$this->form_validation->set_rules("cat_descricao","Descrição", "trim|required");
		$this->form_validation->set_error_delimiters("<p class='alert alert-danger'>","</p>");
		$sucesso = $this->form_validation->run();
		$dados = array ("cat_codigo" => $this->input->post("cat_codigo"), "cat_descricao" => $this->input->post("cat_descricao"));

		if($sucesso) {
			$class = array(
					"cat_codigo" => $this->input->post("cat_codigo"),
					"cat_descricao" => $this->input->post("cat_descricao"),
			);
			$this->load->model("cbcategoria_model");
			$res = $this->cbcategoria_model->salva($class);
			if ($res === "Sucesso") {
				$this->session->set_flashdata('success','Categoria Salva!');
				redirect("categoria/categoria");
			} else {
				$this->session->set_flashdata('danger',$res . ' % '. $class['cat_codigo']);
				$this->load->view("cabecalho");
				$this->load->view("categoria/categoria_form", $dados);
				$this->load->view("rodape");
			}
		} else {
			$this->load->view("cabecalho");
			$this->load->view("categoria/categoria_form", $dados);
			$this->load->view("rodape");
		}

	}

	public function excluir($codigo) {
		//excluir código
		$this->load->model("cbcategoria_model");
		$res = $this->cbcategoria_model->recupera($codigo);
		if ($res) {
			$this->cbcategoria_model->excluir($codigo);
			$this->session->set_flashdata('success','Registro excluído: '. $codigo);
		} else {
			$this->session->set_flashdata('danger','Registro não localizado: '. $codigo);
		}
		redirect("categoria/categoria");
	}

	public function editar($codigo) {
		//recupera o registro
		$this->load->model("cbcategoria_model");
		$clas = $this->cbcategoria_model->recupera(strtoupper($codigo));
		if ($clas) {
			$dados = $clas;
			$this->load->view("cabecalho");
			$this->load->view("categoria/categoria_form", $dados);
			$this->load->view("rodape");
		} else {
			$this->session->set_flashdata('danger','Código não localizado: '. $codigo);
			redirect("categoria/categoria");
		}

	}


	

}

?>
