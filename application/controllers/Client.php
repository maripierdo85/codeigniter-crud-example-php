<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('client_model','client');
    }

    public function index()
    {
        $data = array();
        $data['clients'] = $this->client->getClients();
        $this->load->view('client/client_view', $data);
    }

    public function form($client_id = null)
    {
        $data = array();
        if($client_id){
            $data['client'] = $this->client->getClientById($client_id);
        }
        $this->load->view('client/client_form_view', $data);
    }

    public function save($id = null)
    {
        $form_data = array
        (   
            'id' => $id,
            'nombre' => $this->input->post('nombre'),
            'apellido' => $this->input->post('apellido'),
            'dni' => $this->input->post('dni'),
            'fecNacimiento' => $this->input->post('fecNacimiento'),
            'correo' => $this->input->post('correo'),
            'estado' => true
        );
        if(!$id){
            $send_form = $this->client->createClient($form_data);
        } else {
            $send_form = $this->client->updateClient($form_data);
        }

        if($send_form){
            $this->session->set_flashdata('mensagem', array('success','Cliente salvo com sucesso!'));
            redirect('client');
        }
        else
        {
            $this->session->set_flashdata('mensagem', array('danger','Ops! Dados incorretos!'));
            redirect('client/form');
        }
    }

    public function delete($id)
    {
        $delete = $this->client->deleteClient($id);
        if($delete){
            $this->session->set_flashdata('mensagem', array('success','Cliente deletado com sucesso!'));
            redirect('client');
        }
        else
        {
            $this->session->set_flashdata('mensagem', array('danger','Ops! Cliente não encontrado!'));
            redirect('client');
        }
    }
}
