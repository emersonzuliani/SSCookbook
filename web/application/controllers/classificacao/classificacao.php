<?php
defined('BASEPATH') OR exit('Acesso direto não permitido!');

class Classificacao extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		
		$this->load->model("classificacao_model");
		$classificacao = $this->classificacao_model->listaTodos();
		
		$dados = array("classificacao" => $classificacao);
						
		$this->load->view("cabecalho");
		$this->load->view("classificacao/classificacao_grid", $dados);
		$this->load->view("rodape");
	}
	
	public function cadastro() {
		$dados = array ("cla_codigo" => "",
				        "cla_descricao" => "");
		$this->load->view("cabecalho");
		$this->load->view("classificacao/classificacao_form",$dados);
		$this->load->view("rodape");		
	}
	
	public function salvar() {
		$this->load->library("form_validation");
		$this->form_validation->set_rules("cla_descricao","cla_descricao", "trim|required");
		$this->form_validation->set_error_delimiters("<p class='alert alert-danger'>","</p>");
		$sucesso = $this->form_validation->run();
		$dados = array ("cla_codigo" => $this->input->post("cla_codigo"), "cla_descricao" => $this->input->post("cla_descricao"));		
		
		if($sucesso) {
			$class = array(
					"cla_codigo" => $this->input->post("cla_codigo"),
					"cla_descricao" => $this->input->post("cla_descricao"),
			);
			$this->load->model("classificacao_model");
			$res = $this->classificacao_model->salva($class);
			if ($res === "Sucesso") {
				$this->session->set_flashdata('success','Classificação Salva!');
				redirect("classificacao/classificacao");
			} else {
				$this->session->set_flashdata('danger',$res . ' % '. $class['cla_codigo']);
				$this->load->view("cabecalho");
				$this->load->view("classificacao/classificacao_form", $dados);
				$this->load->view("rodape");
			}			
		} else {
			$this->load->view("cabecalho");
			$this->load->view("classificacao/classificacao_form", $dados);
			$this->load->view("rodape");
		}
		
	}
		
	public function excluir($codigo) {
		//excluir código
		$this->load->model("classificacao_model");
		$res = $this->classificacao_model->recupera($codigo);
		if ($res) {
			$this->classificacao_model->excluir($codigo);
			$this->session->set_flashdata('success','Registro excluído: '. $codigo);
		} else {
			$this->session->set_flashdata('danger','Registro não localizado: '. $codigo);
		}				
		redirect("classificacao/classificacao");
	}
	
	public function editar($codigo) {		
		//recupera o registro
		$this->load->model("classificacao_model");
		$clas = $this->classificacao_model->recupera($codigo);
		if ($clas) {						
			$dados = $clas;			
			$this->load->view("cabecalho");
			$this->load->view("classificacao/classificacao_form", $dados);
			$this->load->view("rodape");
		} else {
			$this->session->set_flashdata('danger','Código não localizado: '. $codigo);
			redirect("classificacao/classificacao");
		}			
		
	}
}



?>
