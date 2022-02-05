<?php
class Client_model extends CI_Model {

    public function getClients(){
        $this->db->order_by('id');
        $this->db->where('estado', 1);
        $query = $this->db->get('client');
        return $query->result();
    }

    public function getClientsIdNombre(){
        $this->db->select("id as client_id, CONCAT(client.apellido,', ', client.nombre) AS 'apellidoNombre'");
        $this->db->order_by('id');
        $this->db->where('estado', 1);
        $query = $this->db->get('client');
        return $query->result();
    }

    public function getClientById($id){
        $this->db->where('id', $id);
        $this->db->where('estado', 1);
        $query = $this->db->get('client');
        return $query->result();
    }

    public function createClient($form_data){
        $this->db->insert('client', $form_data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function updateClient($form_data){
        $this->db->where('id', $form_data['id']);
        $this->db->update('client', $form_data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function deleteClient($id){
        $this->db->set('estado', 0);
        $this->db->where('id', $id);
        $this->db->where('estado', 1);
        $this->db->update('client');
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}