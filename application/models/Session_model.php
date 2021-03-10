<?php

class Session_model extends CI_Model {

    public function __construct() {
        //parent::__construct();
    }
    
    public function verify_session() {

        if(!empty($_SESSION['email'])) {
            return true;
        } else {
            return false;
        }

    }
    public function login($session_data) {
        if(!empty($session_data)) {
            $this->session->set_userdata($session_data);
        }
    }
    
    public function get_session_id() {
        return $this->session->userdata('id');
    }

    public function verify_login($email, $password) {

        $this->db->where('email', $email);
        $query = $this->db->get('Users');
        $result = $query->result_array();

        if(!empty($result)) {
            $encrypted_password = $result[0]['password'];

            if($this->encryption->decrypt($encrypted_password) == $password) {
                return $result[0]['id'];
            }
        } else {
            return 0;
        }
    }

    public function generate_email_key($id, $verification_key) {

        $data['user_id'] = $id;
        $data['hash'] = $verification_key;

        return $this->db->insert('Verification_Keys', $data);

    }

    public function verify_email_key($verification_key) {

        if(!empty($verification_key)) {
            $this->db->where('hash', $verification_key);
            $query = $this->db->get('Verification_Keys');
            $result = $query->result_array();
            if(!empty($result)) { 
                //deletar a key do banco de dados
                return $result[0]['user_id'];
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

}