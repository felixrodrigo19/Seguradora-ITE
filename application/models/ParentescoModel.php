<?php
	/**
	 * 
	 */
	class ParentescoModel extends CI_Model
	{
		public $idparentesco;
		public $descricao;

		public function SelecionaTodos(){
			$retorno = $this->db->get('parentesco',100);

			return $retorno->result();
		}

		public function Inserir()
		{
			$campos = array(
				'descricao'=>$_POST['descricao'],
			);
			$this->db->insert('parentesco',$campos);
		}

		public function Select_entry($where)
		{
			$retorno = $this->db->get_where('parentesco', $where);
			return $retorno->result();
		}

		public function SalvarAlteracao($where, $dados)
		{
			$this->db->update('parentesco', $dados, $where);

			return;
		}

		public function SalvarDelete($where)
		{

			$this->db->delete('parentesco', $where);

		return;
		}
	}
?>