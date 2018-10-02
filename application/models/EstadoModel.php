<?php
	/**
	 * 
	 */
	class EstadoModel extends CI_Model
	{
		public $idestado;
		public $nome;
		public $sigla;

		function SelecionaTodos(){
			$retorno = $this->db->get('estado',100);

			return $retorno->result();
		}
	}
?>