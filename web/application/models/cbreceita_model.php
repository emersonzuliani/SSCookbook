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
	
	public function buscarReceitas($criterio) {
		$sql = "select A.*, B.cat_descricao, C.sca_descricao, D.cla_descricao 
  				from CBRECEITA A,
       				 cbcategoria B,
       				 cbsubcategoria C,
       				 cbclassificacao D       
			   WHERE A.cat_codigo = B.cat_codigo 
  				 AND A.cat_codigo = C.cat_codigo
  				 AND A.sca_codigo = C.sca_codigo
  				 AND A.cla_codigo = D.cla_codigo";
		
		foreach ($criterio as $cri) {
			$sql .= " and " . $cri;
		}	
		
		$query = $this->db->query($sql);
		$res = $query->result_array();
		
		return $res;		
	}
	
	public function recupera($id) {
		$res = ($this->db->get_where("cbreceita", array('rec_codigo' => $id))->row_array());
		if ($res) {
			return $res;
		} else {
			return FALSE;
		}
	}	
	
	public function excluir($id) {
		$this->db->where($this->primarykey, $id);
		$this->db->delete($this->tabela);
		//$sql = $this->db->get_compiled_delete($this->tabela);		
		//return $sql;
	}
	
	

}

?>
