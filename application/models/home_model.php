<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Frontend_model
 *
 * @author Vladimir Uskokovi
 */
class Home_model extends CI_Model
{
   
    public function __construct() 
    {       
        $this->load->database();
    }
    
      public function record_count()
      {
            return $this->db->count_all("post");
      }

      public function post_pagination($limit, $start)
      {
            $query ='select *, (select count(*) from comments '
                  . 'where comments.id_post = post.id_post) as broj, (select count(*) from voting where voting.id_post = post.id_post) as stars'
                  . ' from post join users on users.id_user = post.id_user '
                  . 'order by post_date desc limit '.$limit.' OFFSET '.$start;
            $res = $this->db->query($query);
            return $res->result_array();
      }

      public function bestVote()
      {
          $query = 'select *,(select count(*) from voting where voting.id_post = post.id_post) as stars from post join users on users.id_user=post.id_user order by stars desc limit 4';
          $res = $this->db->query($query);
            return $res->result_array();
      }

      public function bestCommented()
      {
          $query = 'select *,(select count(*) from comments '
                  . 'where comments.id_post = post.id_post) as broj from post order by broj desc limit 5';
          $res = $this->db->query($query);
            return $res->result_array();
      }

      public function search($searchItem)
      {
          $query ="select *, (select count(*) from comments "
                  . "where comments.id_post = post.id_post) as broj, (select count(*) from voting where voting.id_post = post.id_post) as stars"
                  . " from post join users on users.id_user = post.id_user where post.subject like '$searchItem%' "
                  . " order by post_date desc";
            $res = $this->db->query($query);
            return $res->result_array();
      }
}

    
    

