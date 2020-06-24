<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function novoUsuario()
    {

        $usuario = array(
            "nome" => $this->input->post("nome"),
            "email" => $this->input->post("email"),
            "senha" => md5($this->input->post("senha")),
        );

        $this->load->model("usuario_model");
        $this->usuario_model->salva($usuario);

            $this->db->select_max('id');
            $this->db->from('usuarios');
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {

                    $idNovoUsuario = $row->id;
                }
            }
    }
}


