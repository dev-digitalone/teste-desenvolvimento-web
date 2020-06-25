<?php
	class Usuario_model extends CI_Model{


		public function salva($usuario){
			$this->db->insert("usuarios", $usuario);
		}

		public function logarUsuario($email, $senha){
			$this->db->where("email", $email);
			$this->db->where("senha", $senha);
			$usuario = $this->db->get("usuarios")->row_array();
			return $usuario;
		}

		public function buscarTodos(){
			return $this->db->get("usuarios")->result_array();
		}

		public function verificaEmail($email){
			 $this->db->where("email", $email);
			 return $this->db->get('usuarios')->row_array();
		}

	}
