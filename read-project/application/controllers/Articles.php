<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends CI_Controller {

    public function __construct(){

        parent::__construct();

        $this->load->model('articles_model');

    }

    public function index(){

        

        $data['site_name'] = 'Read';
        $data['site_copyright'] = 'Copyright Livraria ABC';

        $data['articles'] = $this->articles_model->get_all_published();
        $this->load->view('header', $data);
        $this->load->view('articles', $data);
        $this->load->view('footer', $data);

    }

    public function show($id=1){

        $data['site_name'] = 'Read';
        $data['site_copyright'] = 'Copyright Livraria ABC';

        $data['article'] = $this->articles_model->get_one($id);
        $data['comments'] = $this->articles_model->get_comments($id);

        if(!$data['article']){
            show_404();
        }
        $this->load->view('header', $data);
        $this->load->view('article', $data);
        $this->load->view('footer', $data); 

    }

    public function post_comment($article_id){

        $author = $this->input->post('author');
        $comment = $this->input->post('comment');

        $today = date('Y-m-d, H:i:s');

        $comment_data = array(

            'author' => $author,
            'comment' => $comment,
            'date' => $today,
            'approved' => 1,
            'article_id' => $article_id

        );

        $this->db->insert('comments', $comment_data);

        redirect('articles/show/'.$article_id, 'refresh');



    }

        public function list(){

            $data['articles'] = $this->articles_model->get_all();

            $this->load->view('admin/header');
            $this->load->view('admin/articles_list', $data);
            $this->load->view('admin/footer');


        }

        public function new(){

            $this->load->view('admin/header');
            $this->load->view('admin/articles_new');
            $this->load->view('admin/footer');


        }

        public function insert(){

            $insert_data = array(

                'title' => $this->input->post('title'),
                'summary' => $this->input->post('summary'),
                'text' => $this->input->post('text'),
                'author' => $this->input->post('author'),
                'date' => $this->input->post('date'),
                'publish'=>$this->input->post('publish'),
                'image' => ''

            );

            $config['upload_path'] = 'assets/images/'; //caminho para a pasta de imagens
            $config['file_name'] = 'image'.time(); //usamos se quisermos renomear a imagem
            $config['allowed_types'] = 'gif|jpg|png'; //formatos permitidos

            $this->load->library('upload', $config);

            if($this->upload->do_upload('image')){

                $image = $this->upload->data('file_name');

                $insert_data['image'] = $image;

            }



            if($this->db->insert('articles', $insert_data)){

                redirect('articles/list', 'refresh');

            }


        }


        public function edit($id){

            $data['article'] = $this->articles_model->get_one($id);

            $this->load->view('admin/header');
            $this->load->view('admin/articles_edit', $data);
            $this->load->view('admin/footer');

        }

        public function update($id){

            $insert_data = array(

                'title' => $this->input->post('title'),
                'summary' => $this->input->post('summary'),
                'text' => $this->input->post('text'),
                'author' => $this->input->post('author'),
                'image' => $this->input->post('image'),
                'date' => $this->input->post('date'),
                'publish'=>$this->input->post('publish')

            );

            $this->db->where('id', $id);
            if($this->db->update('articles', $insert_data)){

                $this->session->set_flashdata('msg', 'Artigo atualizado com sucesso!');

                redirect('articles/list', 'refresh');

            }


        }

        public function delete($id){

            $this->db->where('id', $id);
            $this->db->delete('articles');

           

            redirect('articles/list', 'refresh');

        }

        public function unpublish($id){

            $data = array(

                'publish' => 0
            );

            $this->db->where('id', $id);
            if($this->db->update('articles', $data)){
                echo 'success';
            };

        }

        public function publish($id){

            $data = array(

                'publish' => 1
            );

            $this->db->where('id', $id);
            if($this->db->update('articles', $data)){
                echo 'success';
            };

        }


}
