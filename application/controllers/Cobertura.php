<?php 

/**
 * 
 */
class Cobertura extends CI_Controller
{
	public function index() //index() é padrão e sempre é necessaria
		{
			$this->load->model('CoberturaModel');
			
			$tabela = $this->CoberturaModel->SelecionaTodos();
			/*Enviar para o index da pasta estado do view, mas passa pelo index.php da propria view que é a nossa template*/
			$dados = array(
					'titulo'=>'Cadastro de Coberturas',
					'tabela'=>$tabela,
					'pagina'=>'cobertura/index.php' //pasta estado, dentro de view
			);

			$this->load->view('ccobertura',$dados); /*nome da view"index.php" que será chamada, que será a template com o pacote*/
		}
	
		public function Cadastrar()
		{

			$dados = array(
				'titulo'=>'Formulário de Cobertura',
				'pagina'=>'cobertura/cadastrar.php' 
			);
			$this->load->view('ccobertura',$dados);
		}

		public function Incluir()
		{
			/*Campo de validação*/
			$this->form_validation->set_rules('descricao', 'Descrição', 'trim|required|regex_match[/[\p{L}]+$/i]|max_length[45]|is_unique[cobertura.descricao]');

			if( $this->form_validation->run())
			{
				$this->load->model('CoberturaModel');
				$this->CoberturaModel->Inserir();
			}
			else
			{
				$this->load->view('cobertura/cadastrar');
			}
			redirect('cobertura'); // redireciona para o controller
		}

		public function Alterar($codigo)
		{
			$this->load->model('CoberturaModel');

			$where = array('idcobertura'=>$codigo);
			$resultado = $this->CoberturaModel->Select_entry($where);

			$dados = array(
				'titulo'=>'Alteração de Dados',
				'pagina'=>'cobertura/alterar.php',
				'tabela'=>$resultado
			);

			$this->load->view('ccobertura', $dados);
		}

		public function SalvarAlterar()
		{
			$this->form_validation->set_rules('descricao', 'Descrição', 'trim|required|regex_match[/[\p{L}]+$/i]|max_length[45]|is_unique[cobertura.descricao]');

			if( $this->form_validation->run())
			{
				$idcobertura = $this->input->post('idcobertura');
				$descricao = $this->input->post('descricao');
			

				$dados = array(
					'descricao'=>$descricao
					
				);

				$where = array(
					'idcobertura'=>$idcobertura
				);
				$this->load->model('CoberturaModel');

				$this->CoberturaModel->SalvarAlteracao($where, $dados);
		}
			else
			{
				$this->load->view('cobertura/alterar');
			}
			redirect('cobertura');
		}

		public function Deletar($codigo)
		{
			$this->load->model('CoberturaModel');

			$where = array('idcobertura'=>$codigo);
			$resultado = $this->CoberturaModel->Select_entry($where);

			$dados = array(
				'titulo'=>'Exclusão de Dados',
				'pagina'=>'cobertura/excluir.php',
				'tabela'=>$resultado
			);

			$this->load->view('ccobertura', $dados);
		}

		public function SalvarDelete()
		{
			$idcobertura = $this->input->post('idcobertura');
			
			
			

			$where = array(
				'idcobertura'=>$idcobertura
			);
			$this->load->model('CoberturaModel');

			$this->CoberturaModel->SalvarDelete($where);

			redirect('cobertura');
		}
	}
 ?>