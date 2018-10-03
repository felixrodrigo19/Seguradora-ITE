<?php 

/**
 * 
 */
class Beneficios extends CI_Controller
{
	public function index() //index() é padrão e sempre é necessaria
		{
			$this->load->model('BeneficiosModel');
			
			$tabela = $this->BeneficiosModel->SelecionaTodos();
			/*Enviar para o index da pasta estado do view, mas passa pelo index.php da propria view que é a nossa template*/
			$dados = array(
					'titulo'=>'Cadastro de Beneficios',
					'tabela'=>$tabela,
					'pagina'=>'beneficios/index.php' //pasta estado, dentro de view
			);

			$this->load->view('cbeneficio',$dados); /*nome da view"index.php" que será chamada, que será a template com o pacote*/
		}
	
		public function Cadastrar()
		{
			$dados = array(
				'titulo'=>'Formulário de Beneficio',
				'pagina'=>'beneficios/cadastrar.php' 
			);
			$this->load->view('cbeneficio',$dados);
		}

		public function Incluir()
		{
			/*Campo de validação*/
			$this->load->model('BeneficiosModel');
			$this->BeneficiosModel->Inserir();

			redirect('beneficios'); // redireciona para o controller
		}

		public function Alterar($codigo)
		{
			$this->load->model('BeneficiosModel');

			$where = array('idbeneficios'=>$codigo);
			$resultado = $this->BeneficiosModel->Select_entry($where);

			$dados = array(
				'titulo'=>'Alteração de Dados',
				'pagina'=>'beneficios/alterar.php',
				'tabela'=>$resultado
			);

			$this->load->view('cbeneficio', $dados);
		}

		public function SalvarAlterar()
		{
			$idbeneficios = $this->input->post('idbeneficios');
			$descricao = $this->input->post('descricao');
			$ativo = $this->input->post('ativo');

			$dados = array(
				'descricao'=>$descricao,
				'ativo'=>$ativo
			);

			$where = array(
				'idbeneficios'=>$idbeneficios
			);
			$this->load->model('BeneficiosModel');

			$this->BeneficiosModel->SalvarAlteracao($where, $dados);

			redirect('beneficios');
		}

		public function Deletar($codigo)
		{
			$this->load->model('BeneficiosModel');

			$where = array('idbeneficios'=>$codigo);
			$resultado = $this->BeneficiosModel->Select_entry($where);

			$dados = array(
				'titulo'=>'Exclusão de Dados',
				'pagina'=>'beneficios/excluir.php',
				'tabela'=>$resultado
			);

			$this->load->view('cbeneficio', $dados);
		}

		public function SalvarDelete()
		{
			$idbeneficios = $this->input->post('idbeneficios');
			
			
			

			$where = array(
				'idbeneficios'=>$idbeneficios
			);
			$this->load->model('BeneficiosModel');

			$this->BeneficiosModel->SalvarDelete($where);

			redirect('beneficios');
		}
	}
 ?>