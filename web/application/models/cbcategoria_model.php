<?php
defined('BASEPATH') OR exit('Acesso direto não permitido!');

class cbcategoria_model extends CI_Model {
	private $tabela = 'cbcategoria';
	private	$primarykey = 'cat_codigo';

	public function __construct() {
		parent::__construct();
	}

	public function listaTodos() {
		return $this->db->get($this->tabela)->result_array();
	}

	public function salva($class) {
		//verifica se existe a classificação com o código informado
		if ($class[$this->primarykey]) {
			$res = $this->db->get_where($this->tabela, array($this->primarykey => $class[$this->primarykey]))->row_array();
		} else {
			$res = FALSE;
		}
		if ($res) {
			//atualiza
			$this->db->where($this->primarykey, $class[$this->primarykey]);
			if ($this->db->update($this->tabela, $class)) {
				return "Sucesso";
			} else {
				return $this->db->error()['message'];
			}
		} else {
			//insere
			if ($this->db->insert($this->tabela, $class)) {
				return "Sucesso";
			} else {
				return $this->db->error()['message'];
			}
		}
	}

	public function recupera($id) {
		$res = ($this->db->get_where($this->tabela, array($this->primarykey => $id))->row_array());
		if ($res) {
			return $res;
		} else {
			return FALSE;
		}
	}

	public function excluir($id) {
		$this->db->where($this->primarykey, $id);
		$this->db->delete($this->tabela);
	}


}


?>