<?php

class Users_model extends CI_Model {
    public function __construct() {
        //$this->load->database();
    }

    public function verify_session() {
        if(!empty($_SESSION['email'])) {
            return true;
        } else {
            return false;
        }
    }

    public function verify_login($email, $password) {
        $this->db->where('email', $email);
        $query = $this->db->get('Users');
        $result = $query->result_array();
        if(!empty($result)) {
            $encrypted_passoword = $result[0]['password'];
            if($this->encryption->decrypt($encrypted_passoword) == $password) {
                return true;
            }
        } else {
            return false;
        }
    }

    public function register($data) {
       return $this->db->insert('Users', $data);
    }

    public function getUsers() {
        $query = $this->db->get('Users');
        //return $query->row_array();
        return $query->result_array();
    }

    public function getUser($id) {
        $query = $this->db->get_where('Users', array('id' => $id));
        //return $query->result_array();
        return $query->row_array();
    }

    public function edit($id) {
       $data = array(
           'name' => $this->input->post('name'),
           'email' => $this->input->post('email'),
           'password' => $this->encryption->encrypt($this->input->post('pass'))
       ); 

       $where = "id = $id";

       return $this->db->query($this->db->update_string('Users', $data, $where));
    }

    public function delete($id) {
        return $this->db->delete('Users', array('id' => $id));
    }
}