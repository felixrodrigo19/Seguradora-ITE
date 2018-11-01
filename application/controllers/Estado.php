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

		public function Cadastrar()
		{

			$dados = array(
					'titulo'=>'Formulário de Cadastro',
					'pagina'=>'estado/cadastrar.php' 
				);
				$this->load->view('cadastroestado',$dados);
		}

		public function Incluir()
		{
			
			//is_unique[nomedatabela.nomedocampo] verifica se é unico no BD, caso não for retorna false
			$this->form_validation->set_rules('nome', 'Nome', 'trim|max_length[45]|required|regex_match[/[\p{L} ]+$/i]|is_unique[estado.nome]');
			$this->form_validation->set_rules('sigla', 'Sigla','required|is_unique[estado.sigla]');

			if( $this->form_validation->run())
			{
				$this->load->model('EstadoModel');
				$this->EstadoModel->Inserir();
				
			}
			else
			{
				$this->load->view('estado/cadastrar');
			}
			redirect('estado'); // redireciona para o controller
		}

		public function Alterar($codigo)
		{
			
				$this->load->model('EstadoModel');

				$where = array('idestado'=>$codigo);
				$resultado = $this->EstadoModel->Select_entry($where);

				$dados = array(
					'titulo'=>'Alteração de Dados',
					'pagina'=>'estado/alterar.php',
					'tabela'=>$resultado
				);

				$this->load->view('cadastroestado', $dados);
			
		}

		public function SalvarAlterar()
		{
			
			$this->form_validation->set_rules('nome', 'Nome', 'max_length[45]|required|trim|regex_match[/[\p{L} ]+$/i]|is_unique[estado.nome]');
			$this->form_validation->set_rules('sigla', 'Sigla','required|is_unique[estado.sigla]');

			if( $this->form_validation->run())
			{
				$idestado = $this->input->post('idestado');
				$nome = $this->input->post('nome');
				$sigla = $this->input->post('sigla');

				$dados = array(
								'nome'=>$nome,
								'sigla'=>$sigla
							);

				$where = array(
								'idestado'=>$idestado
							);
				$this->load->model('EstadoModel');

				$this->EstadoModel->SalvarAlteracao($where, $dados);
			}
			else
			{
				$this->load->view('estado/alterar');
			}
			redirect('estado');
		}

		public function Deletar($codigo)
		{
			$this->load->model('EstadoModel');

			$where = array('idestado'=>$codigo);
			$resultado = $this->EstadoModel->Select_entry($where);

			$dados = array(
				'titulo'=>'Exclusão de Dados',
				'pagina'=>'estado/excluir.php',
				'tabela'=>$resultado
			);

			$this->load->view('cadastroestado', $dados);
		}

		public function SalvarDelete()
		{
			$idestado = $this->input->post('idestado');
			
			$where = array(
				'idestado'=>$idestado
			);
			$this->load->model('EstadoModel');

			$this->EstadoModel->SalvarDelete($where);

			redirect('estado');
		}
	}
?>