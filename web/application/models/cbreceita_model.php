<?php
defined('BASEPATH') OR exit('Acesso direto não permitido!');

class cbreceita_model extends CI_Model {

	private $tabela = 'cbreceita';
	private	$primarykey = 'rec_codigo';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function salva($receita) {
		//verifica se existe a receita com o código informado		
		if ($receita[$this->primarykey]) {
			$res = $this->db->get_where($this->tabela, array($this->primarykey => $receita[$this->primarykey]))->row_array();
		} else {
			$res = FALSE;
		}
		if ($res) {
			//atualiza
			$this->db->where($this->primarykey, $receita[$this->primarykey]);
			if ($this->db->update($this->tabela, $receita)) {
				return "Sucesso";
			} else {
				return $this->db->error()['message'];
			}
		} else {
			//insere
			if ($this->db->insert($this->tabela, $receita)) {
				return "Sucesso";
			} else {
				return $this->db->error()['message'];
			}
		}		
		
	}
	

	

}

?>
