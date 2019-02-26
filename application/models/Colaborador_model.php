<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colaborador_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
	}

	#MOSTRA OS COLABORADORES CADASTRADOS
	public function MostraColaborador () {
		return $this->db->get('colaborador')->result_array();
	}

	#INSERE O COLABORADOR NO BANCO DE DADOS
	public function SaveColaborador ($colaborador) {
		$this->db->insert("colaborador", $colaborador);
	}

	#ALTERA O COLABORADOR NO BANCO DE DADOS
	public function AlteraColaborador ($id, $colaborador) {
		$this->db->where('id_colab', $id);
		$this->db->update('colaborador', $colaborador);
		return TRUE;
	}

	public function RetornaIdColaborador($id) {
		return $this->db->get_where("colaborador", array ("id_colab" => $id)) -> row_array();
	}

	#EXCLUÍ O COLABORADOR NO BANCO DE DADOS
	public function DeletaColaborador ($id) {
		$this->db->where('id_colab', $id);
		$this->db->delete('colaborador');
		return TRUE;
	}

	#LOGA O COLABORADOR NO SISTEMA
	public function OpenUser($login, $pass) {
		$this->db->where('email_colab', $login);
		$this->db->or_where('login_colab', $login);
		$this->db->where('senha_colab', $pass);
		$user = $this->db->get('colaborador')->result();
		return $user;
	}

	#INSERE A PERMISSÃO DO COLABORADOR NO SISTEMA
    public function SavePermissionSystem ($permission) {
        $this->db->insert("permissao_colab", $permission);
    }

	#MOSTRA COLABORADOR NO AUTOCOMPLETE
    public function AutoCompleteColaborador ($nome) {
        $this->db->from('colaborador');
        $this->db->like('nome_colab', $nome, 'both');
        return $this->db->get()->result();
    }

    #INSERE A INDISPONIBILIDADE DO COLABORADOR NO BANCO DE DADOS
	public function SaveIndisponibilidade ($Indisponibilidades) {
		$this->db->insert("colaborador_indisponivel", $Indisponibilidades);
	}

}