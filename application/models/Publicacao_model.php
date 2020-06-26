<?php
	class Publicacao_model extends CI_Model{


		public function salva($publicacao){
            $this->db->insert("publicacoes", $publicacao);
        }

		public function buscarTodas(){
			return $this->db->get("publicacoes")->result_array();
		}

		public function buscarPorId($id){
			$this->db->select('*');
			$this->db->from('publicacoes');
			$this->db->where('id = '.$id);
			$query = $this->db->get();

			return $query->result_array();
		}

		public function buscarTodasPorUsuario($id){
			$this->db->select('*');
			$this->db->from('publicacoes');
			$this->db->where('idUsuario = '.$id);
			$query = $this->db->get();

			return $query->result_array();
		}

		public function update($id, $publicacao){
			$this->db->where('id', $id);
			$this->db->update('publicacoes', $publicacao);
			
			header("Location: /teste-desenvolvimento-web/minhasPublicacoes");
		}

	}
