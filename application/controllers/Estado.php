<?php

	/**
	 * 
	 */
	class Estado extends CI_Controller
	{
		function index() //index() é padrão e sempre é necessaria
		{
			$this->load->model('EstadoModel');
			
			$tabela = $this->EstadoModel->SelecionaTodos();
			/*Enviar para o index da pasta estado do view, mas passa pelo index.php da propria view que é a nossa template*/
			$dados = array(
								'titulo'=>'Cadastro de Estados',
								'tabela'=>$tabela,
								'pagina'=>'estado/index.php' //pasta estado, dentro de view
			);

			$this->load->view('cadastroestado',$dados); /*nome da view"index.php" que será chamada, que será a template com o pacote*/
		}
	}


?>