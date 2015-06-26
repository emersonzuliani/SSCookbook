<?php
defined('BASEPATH') OR exit('Acesso direto não permitido!');

class classificacao_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function listaTodos() {
		return $this->db->get("cbclassificacao")->result_array();
	} 
	
	public function salva($class) {
		//verifica se existe a classificaçaõ com o código informado
		if ($class['cla_codigo']) {
			$res = $this->db->get_where("cbclassificacao", array('cla_codigo' => $class['cla_codigo']))->row_array();
		} else {
			$res = FALSE;
		} 
		if ($res) {
			//atualiza
			$this->db->where("cla_codigo",$class['cla_codigo']);			
			if ($this->db->update("cbclassificacao", $class)) {
				return "Sucesso";				
			} else {
				return $this->db->error()['message'];
			}			
		} else {	
			//insere
			if ($this->db->insert("cbclassificacao", $class)) {
				return "Sucesso";
			} else {
				return $this->db->error()['message'];
			} 
		}		
	}
	
	public function recupera($id) {
		$res = ($this->db->get_where("cbclassificacao", array('cla_codigo' => $id))->row_array());
		if ($res) {
			return $res;
		} else {
			return FALSE;
		}						
	}
	
	public function excluir($id) {
		$this->db->where('cla_codigo', $id);
		$this->db->delete('cbclassificacao');		
	}
		
}

?>
