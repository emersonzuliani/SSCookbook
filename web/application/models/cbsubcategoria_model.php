<?php
defined('BASEPATH') OR exit('Acesso direto não permitido!');

class cbsubcategoria_model extends CI_Model {
	private $tabela = 'cbsubcategoria';
	private	$primarykey = array('cat_codigo','sca_codigo');

	public function __construct() {
		parent::__construct();
	}

	public function listaTodos($categoria) {
		$this->db->where('cat_codigo', $categoria);
		return $this->db->get($this->tabela)->result_array();
	}

	public function salva($class) {
		//verifica se existe a classificação com o código informado
		if ($class[$this->primarykey[0]]) {
			$res = $this->db->get_where($this->tabela, array($this->primarykey[0] => $class[$this->primarykey[0]],$this->primarykey[1] => $class[$this->primarykey[1]] ))->row_array();
		} else {
			$res = FALSE;
		}
		if ($res) {
			//atualiza
			$this->db->where($this->primarykey[0], $class[$this->primarykey[0]]);
			$this->db->where($this->primarykey[1], $class[$this->primarykey[1]]);
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

	public function recupera($cat_codigo, $sca_codigo) {
		$res = ($this->db->get_where($this->tabela, array($this->primarykey[0] => $cat_codigo, $this->primarykey[1] => $sca_codigo))->row_array());
		if ($res) {
			return $res;
		} else {
			return FALSE;
		}
	}

	public function excluir($cat_codigo, $sca_codigo) {
		$this->db->where($this->primarykey[0], $cat_codigo);
		$this->db->where($this->primarykey[1], $sca_codigo);		
		$this->db->delete($this->tabela);
	}
	
	public function getOptions($categoria) {
		$this->db->where('cat_codigo', $categoria);
		$result = $this->db->get($this->tabela)->result_array();
		
		$opcsubclas = [];
		foreach ($result as $subcat) :
			$opcsubclas[$subcat['sca_codigo']] = $subcat['sca_descricao'];
		endforeach;
		
		return $opcsubclas;
	}


}


?>