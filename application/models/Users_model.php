<?php

class Users_model extends CI_Model {

    public function isEmailRegistred($mail) {
       $query = $this->db->get_where('Users', array('email' => $mail));
       return $query->row_array();
    }

    public function register($data) {
       return $this->db->insert('Users', $data);
    }

    public function getUsers() {
        $query = $this->db->get('Users');
        return $query->result_array();
    }

    public function getUser($id) {
        $query = $this->db->get_where('Users', array('id' => $id));
        return $query->row_array();
    }

    public function edit($data) {
       $where = 'id = '.$data['id'];
       return $this->db->query($this->db->update_string('Users', $data, $where));
    }

    public function delete($id) {
        return $this->db->delete('Users', array('id' => $id));
    }
}