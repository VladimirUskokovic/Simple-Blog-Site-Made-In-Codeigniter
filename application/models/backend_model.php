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
class Backend_model extends CI_Model{
   
    public function __construct() 
    {       
        $this->load->database();
    }
    
    public function show_menu_links($id=null)
    {   
        if($id)
           {
            $this->db->select('*');
            $this->db->from('menu');
            $this->db->where('categorie',$id);
            $query = $this->db->get();
            return $query->result_array();
           }
        else{
            $this->db->select('*');
            $this->db->from('menu');
            $query = $this->db->get();
            return $query->result_array();
            }
    }

    public function get_posts()
    {
        $this->db->select('*');
        $this->db->from('post');
        $this->db->join('users','users.id_user = post.id_user');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_users()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('role','role.id_role = users.role');
        $query = $this->db->get();
        return $query->result_array();
    }

     public function get_categories()
    {
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->where('categorie',1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_comm($id,$limit,$start)
    {
        $this->db->select('*');
        $this->db->from('comments');
        $this->db->join('users','users.id_user = comments.id_user');
        $this->db->where('comments.id_post',$id);
        $this->db->limit($limit,$start);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function record_count($id)
    {
            $this->db->like('id_post',$id);
            return $this->db->count_all("comments");
    }

    public function add($data,$type)
    {
        if($type == 'categorie'){
            $this->db->insert('menu', $data);
            $id = $this->db->insert_id();
            $new = array('link' => 'categories/show/'.$id );
            return $query = $this->db->update('menu',$new);
        }
        else if($type == 'users'){
            return $query=$this->db->insert('users', $data);
        }else if($type == 'posts'){
            return $query=$this->db->insert('post', $data);
        }
    }

    public function delete($data,$type){
        if($type == 'categorie'){
            return $query=$this->db->delete('menu', $data);
        }else if($type == 'users'){
            return $query=$this->db->delete('users', $data);
        }else if($type == 'posts'){
            return $query=$this->db->delete('post', $data);
        }else if($type == 'comments'){
            return $query=$this->db->delete('comments', $data);
        }       
    }

    public function get($id,$type)
    {
        if($type == 'categorie'){
            $this->db->where('id',$id);
            return $this->db->get('menu');
        }else if($type == 'users'){
            $this->db->where('id_user',$id);
            return $this->db->get('users');
        }else if($type == 'posts'){
            $this->db->where('id_post',$id);
            return $this->db->get('post');
        }
    }
    
    public function update($data,$type,$id)
    {
        if($type == 'categorie'){
            $this->db->where('id',$id);
            return $this->db->update('menu',$data);
        }else if($type == 'users'){
            $this->db->where('id_user',$id);
            return $this->db->update('users',$data);
        }else if($type == 'posts'){
            $this->db->where('id_post',$id);
            return $this->db->update('post',$data);
        }
    }

     public function check_user($username)
    {   
            $this->db->select('*');
            $this->db->from('users');
            $this->db->join('role','role.id_role=users.role');
            $this->db->where('username',$username);
            $query = $this->db->get();
            return $query->result_array();
    }

    public function getRole()
    {
        $query = $this->db->get('role');
        return $query->result_array();
    }
    
}
