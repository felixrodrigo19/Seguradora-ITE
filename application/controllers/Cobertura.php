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
			$this->load->model('CoberturaModel');
			$this->CoberturaModel->Inserir();

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