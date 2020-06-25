<?php
	class Publicacao_model extends CI_Model{


		public function salva($publicacao){
            $this->db->insert("publicacoes", $publicacao);
        }

		public function buscarTodas(){
			return $this->db->get("publicacao")->result_array();
		}

	}
