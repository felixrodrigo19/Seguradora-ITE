<?php
	/**
	 * 
	 */
	class CoberturaModel extends CI_Model
	{
		public $idcobertura;
		public $descricao;

		public function SelecionaTodos(){
			$retorno = $this->db->get('cobertura',100);

			return $retorno->result();
		}

		public function Inserir()
		{
			$campos = array(
				'descricao'=>$_POST['descricao']
			);
			$this->db->insert('cobertura',$campos);
		}

		public function Select_entry($where)
		{
			$retorno = $this->db->get_where('cobertura', $where);
			return $retorno->result();
		}

		public function SalvarAlteracao($where, $dados)
		{
			$this->db->update('cobertura', $dados, $where);

			return;
		}

		public function SalvarDelete($where)
		{

			$this->db->delete('cobertura', $where);

		return;
		}
	}
?>