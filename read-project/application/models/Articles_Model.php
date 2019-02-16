<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles_Model extends CI_Model {

    public function get_all(){

        return $this->db->query('SELECT * FROM articles')->result_array();
        //return $this->db->get('articles', 10)->result_array;

    }

    public function get_all_published(){

        return $this->db->query('SELECT * FROM articles WHERE publish = 1')->result_array();
        //return $this->db->get('articles', 10)->result_array;

    }

    public function get_one($article_id){

        return $this->db->query('SELECT * FROM articles WHERE id='.$article_id)->row_array();
    }

    public function get_comments($article_id){

        return $this->db->query('SELECT * FROM comments WHERE article_id='.$article_id)->result_array();
    }


}