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
class Post_model extends CI_Model
{
   
    public function __construct() 
    {       
          $this->load->database();
    }

    public function show_post($id)
    {
            $query ='select *,(select count(*) from voting where voting.id_post = post.id_post) as stars'
                  . ' from post join users on users.id_user = post.id_user where post.id_post ='.$id;
            $res = $this->db->query($query);
            return $res->result_array();
    }
    public function get_comm($id)
    {
            $this->db->like('id_post', $id);
            $this->db->from('comments');
            $query = $this->db->count_all_results();
            return $query;
    }
    
    public function get_video($id)
    {
            $this->db->from('video');
            $this->db->join('post','post.id_post = video.id_post');
            $this->db->where('post.id_post',$id);
            $query = $this->db->get();
            return $query->result_array();
    }

    public function picture_count($id)
    {
            $this->db->from('post');
            $this->db->join('post_picture','post_picture.id_post = post.id_post');
            $this->db->join('picture','picture.id_picture = post_picture.id_picture');
            $this->db->where('post.id_post',$id);
            return $this->db->count_all_results();
    }
    public function get_pictures($id)
    {
            $this->db->from('post');
            $this->db->join('post_picture','post_picture.id_post = post.id_post');
            $this->db->join('picture','picture.id_picture = post_picture.id_picture');
            $this->db->where('post.id_post',$id);
            $query = $this->db->get();
            return $query->result_array();
    }
    public function get_com($id)
    {
        $this->db->select('*');
        $this->db->from('comments');
        $this->db->join('users','users.id_user = comments.id_user','left');
        $this->db->where('id_post',$id);
        $this->db->order_by('comm_date','desc');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function add_comm($data){
         
        $query=$this->db->insert('comments', $data); 
        $id = $this->db->insert_id();
        $this->db->select('*');
        $this->db->from('comments');
        $this->db->join('users','users.id_user = comments.id_user','left');
        $this->db->where('id_comm',$id);
        $result = $this->db->get()->result_array();
        return $result;           
    }

    public function add_star($idPost,$id_user){
        $data = array('id_post' => $idPost, 'id_user' => $id_user );
        $query=$this->db->insert('voting', $data);
        $query ='select count(*) as stars from voting JOIN post ON voting.id_post = post.id_post
        WHERE voting.id_post ='.$idPost;
        $res = $this->db->query($query);
        return $res->result_array();
    }
}

