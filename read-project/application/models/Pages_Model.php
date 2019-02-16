<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages_Model extends CI_Model {

    public function get_one($page_id){

        return $this->db->query('SELECT * FROM pages WHERE id='.$page_id)->row_array();

    }


}