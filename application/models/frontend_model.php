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
class Frontend_model extends CI_Model{
   
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
    
    
}
