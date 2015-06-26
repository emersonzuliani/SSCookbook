<?php
defined('BASEPATH') OR exit('Acesso direto não permitido!');

class Subcategoria extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function cadastro($cat_codigo) {
		//localiza o código da categoria
		$dados = array();
		$this->load->model("cbcategoria_model");
		$categoria = $this->cbcategoria_model->recupera($cat_codigo);		
		if ($categoria) {
			$dados['categoria'] = $categoria;
		} 		
		$dados['subcategoria'] = array('cat_codigo' => $categoria['cat_codigo'] ,
				                       'sca_codigo' => 0,
									   'sca_descricao' => '');

		//recupera a lista de subcategorias
		$this->load->model("cbsubcategoria_model");
		$subcat = $this->cbsubcategoria_model->listaTodos($cat_codigo);
		$dados['listasubcat'] = $subcat;		
		
		$this->load->view("cabecalho");
		$this->load->view("categoria/subcategoria_form",$dados);
		$this->load->view("rodape");
	}

	public function salvar() {
		$this->load->library("form_validation");
		$this->form_validation->set_rules("cat_codigo","Código", "trim|required");
		$this->form_validation->set_rules("sca_descricao","Descrição", "trim|required");
		$this->form_validation->set_error_delimiters("<p class='alert alert-danger'>","</p>");
		$sucesso = $this->form_validation->run();
		
		//verifica se a categoria existe
		$dados = array();
		$this->load->model("cbcategoria_model");
		$categoria = $this->cbcategoria_model->recupera($this->input->post("cat_codigo"));
		if ($categoria) {
			$dados['categoria'] = $categoria;
		} else {
			$this->form_validation->set_message("Categoria não localizada.");
			$sucesso = FALSE;
		}	
				
		$dados['subcategoria'] = array ("cat_codigo" => $this->input->post("cat_codigo"),  
										"sca_codigo" => $this->input->post("sca_codigo"),
				        				"sca_descricao" => $this->input->post("sca_descricao"));
		$this->load->model("cbsubcategoria_model");
		if($sucesso) {
			$subcat = $dados['subcategoria'];
			$res = $this->cbsubcategoria_model->salva($subcat);
			if ($res === "Sucesso") {
				$this->session->set_flashdata('success','Sub-Categoria Salva!');
				redirect("categoria/subcategoria/cadastro/".$subcat["cat_codigo"]);
			} else {
				//recupera a lista de subcategorias
				$subcat = $this->cbsubcategoria_model->listaTodos($subcat["cat_codigo"]);
				$dados['listasubcat'] = $subcat;		
				
				$this->session->set_flashdata('danger',$res . ' % '. $subcat['cat_codigo']);
				$this->load->view("cabecalho");
				$this->load->view("categoria/subcategoria_form", $dados);
				$this->load->view("rodape");
			}
		} else {
			$subcat = $this->cbsubcategoria_model->listaTodos($this->input->post("cat_codigo"));
			$dados['listasubcat'] = $subcat;
							
			$this->load->view("cabecalho");
			$this->load->view("categoria/subcategoria_form", $dados);
			$this->load->view("rodape");
		}

	}

	public function excluir($cat_codigo, $sca_codigo) {
		//excluir código
		$this->load->model("cbsubcategoria_model");
		$res = $this->cbsubcategoria_model->recupera($cat_codigo, $sca_codigo);
		if ($res) {
			$this->cbsubcategoria_model->excluir($cat_codigo, $sca_codigo);
			$this->session->set_flashdata('success','Registro excluído: '. $sca_codigo);
		} else {
			$this->session->set_flashdata('danger','Registro não localizado: '. $sca_codigo);
		}
		redirect("categoria/subcategoria/cadastro/".$cat_codigo);
	}

	public function editar($codigo) {
		//não se aplica		
	}


}

?>
