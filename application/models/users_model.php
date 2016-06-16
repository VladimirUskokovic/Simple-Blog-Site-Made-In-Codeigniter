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
class Users_model extends CI_Model
{
   
    public function __construct() 
    {       
        $this->load->database();
    }
    
    public function show_user($id=null)
    {   
        if($id)
           {
             $this->db->select('*');
             $this->db->from('users');
             $this->db->where('id_user',$id);
             $query = $this->db->get();
             return $query->result_array();
           }
        
    }
    public function check_user($username,$password)
    {   
            $this->db->select('*');
            $this->db->from('users');
            $this->db->join('role','role.id_role=users.role');
            $this->db->where('username',$username);
            $this->db->where('password',$password);
            $query = $this->db->get();
            return $query->result_array();
    }
           
    public function get_users()
    {
            $this->db->join('role','role.id_role=users.role');
            return $this->db->get('users');
    }

    public function get_comm($id)
    {
            $this->db->select('*');
            $this->db->from('comments');
            $this->db->join('post','post.id_post=comments.id_post');
            $this->db->where('comments.id_user',$id);
            $query = $this->db->get();
            return $query->result_array();
    }
    
    public function get_post($id)
    {
            $this->db->select('*');
            $this->db->from('post');
            $this->db->where('post.id_user',$id);
            $query = $this->db->get();
            return $query->result_array();
    }

    //insert into user table
    public function insertUser($data)
    {
        return $this->db->insert('users', $data);
    }
    
    
    
    //activate user account
    public function verifyEmailID($key)
    {
        $data = array('user_status' => 1);
        $this->db->where('email', $key);
        return $this->db->update('users', $data);
    }
}
