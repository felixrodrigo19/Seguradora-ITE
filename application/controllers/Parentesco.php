<?php 

/**
 * 
 */
class Parentesco extends CI_Controller
{
	public function index() //index() é padrão e sempre é necessaria
		{
			$this->load->model('ParentescoModel');
			
			$tabela = $this->ParentescoModel->SelecionaTodos();
			/*Enviar para o index da pasta estado do view, mas passa pelo index.php da propria view que é a nossa template*/
			$dados = array(
					'titulo'=>'Cadastro de Parentesco',
					'tabela'=>$tabela,
					'pagina'=>'parentesco/index.php' //pasta estado, dentro de view
			);

			$this->load->view('cparentesco',$dados); /*nome da view"index.php" que será chamada, que será a template com o pacote*/
		}
	
		public function Cadastrar()
		{
			$dados = array(
				'titulo'=>'Formulário de Cadastro',
				'pagina'=>'parentesco/cadastrar.php' 
			);
			$this->load->view('cparentesco',$dados);
		}

		public function Incluir()
		{
			/*Campo de validação*/
			$this->load->model('ParentescoModel');
			$this->ParentescoModel->Inserir();

			redirect('parentesco'); // redireciona para o controller
		}

		public function Alterar($codigo)
		{
			$this->load->model('ParentescoModel');

			$where = array('idparentesco'=>$codigo);
			$resultado = $this->ParentescoModel->Select_entry($where);

			$dados = array(
				'titulo'=>'Alteração de Dados',
				'pagina'=>'parentesco/alterar.php',
				'tabela'=>$resultado
			);

			$this->load->view('cparentesco', $dados);
		}

		public function SalvarAlterar()
		{
			$idparentesco = $this->input->post('idparentesco');
			$descricao = $this->input->post('descricao');
		

			$dados = array(
				'descricao'=>$descricao
				
			);

			$where = array(
				'idparentesco'=>$idparentesco
			);
			$this->load->model('ParentescoModel');

			$this->ParentescoModel->SalvarAlteracao($where, $dados);

			redirect('parentesco');
		}

		public function Deletar($codigo)
		{
			$this->load->model('ParentescoModel');

			$where = array('idparentesco'=>$codigo);
			$resultado = $this->ParentescoModel->Select_entry($where);

			$dados = array(
				'titulo'=>'Exclusão de Dados',
				'pagina'=>'parentesco/excluir.php',
				'tabela'=>$resultado
			);

			$this->load->view('cparentesco', $dados);
		}

		public function SalvarDelete()
		{
			$idparentesco = $this->input->post('idparentesco');
			
			
			

			$where = array(
				'idparentesco'=>$idparentesco
			);
			$this->load->model('ParentescoModel');

			$this->ParentescoModel->SalvarDelete($where);

			redirect('parentesco');
		}
	}
 ?>