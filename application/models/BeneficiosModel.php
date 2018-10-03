<?php
	/**
	 * 
	 */
	class BeneficiosModel extends CI_Model
	{
		public $idbeneficios;
		public $descricao;
		public $ativo;

		public function SelecionaTodos(){
			$retorno = $this->db->get('beneficios',100);

			return $retorno->result();
		}

		public function Inserir()
		{
			$campos = array(
				'descricao'=>$_POST['descricao'],
				'ativo'=>$_POST['ativo']
			);
			$this->db->insert('beneficios',$campos);
		}

		public function Select_entry($where)
		{
			$retorno = $this->db->get_where('beneficios', $where);
			return $retorno->result();
		}

		public function SalvarAlteracao($where, $dados)
		{
			$this->db->update('beneficios', $dados, $where);

			return;
		}

		public function SalvarDelete($where)
		{

			$this->db->delete('beneficios', $where);

		return;
		}
	}
?>