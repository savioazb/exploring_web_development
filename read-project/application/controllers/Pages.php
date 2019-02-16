<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct(){

        parent::__construct();

        $this->load->model('pages_model');

    }

    public function index(){
        show_404();
    }

    public function show($id){

        $data['site_name'] = 'Read';
        $data['site_copyright'] = 'Copyright Livraria ABC';

        $data['page'] = $this->pages_model->get_one($id);

        if(!$data['page']){
            show_404();
        }

        $this->load->view('header', $data);
        $this->load->view('pages', $data);
        $this->load->view('footer', $data);

    }

    public function send_comment(){

        $name = $this->input->post('name');
        $message = $this->input->post('message');
        $today = date('Y-m-d');
        
        $msg_data = array(

            'name'=> $name,
            'message'=> $message,
            'date'=> $today

        );

        if($this->db->insert('contacts', $msg_data)){

            $this->load->library('email');

            $this->email->from('info@ola.pt', 'Ola');
            $this->email->to('info@ola.pt');
            

            $this->email->subject('Email Test');
            
            $html = 'Recebeu uma nova mensagem de '.$name;
            $html .= '<br> Mensagem: '. $message;
            
            $this->email->message($html);

            //$this->email->send();

            echo 'A sua mensagem foi enviada com sucesso.';
        }else{

            echo 'Não foi possivel mandar sua mensagem.';
        }
        //redirect('pages/show/2', 'refresh');


    }



}