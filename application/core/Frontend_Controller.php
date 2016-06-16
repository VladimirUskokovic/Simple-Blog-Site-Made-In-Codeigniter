<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_Controller
 *
 * @author Vladimir Uskokovi
 */
class Frontend_Controller extends MY_Controller{
   
        function __construct()
        {
            parent::__construct();
            
            $this->load->model('frontend_model');
         // $this->load->model('poll_model','poll');
            $this->data['main_menu'] = $this->frontend_model->show_menu_links();
            // $this->data['poll'] = $this->poll->get_poll();
            // $this->data['poll_answers']=$this->poll->get_poll_answers();
        }
        
public function load_view($view, $vars = array())
    {
        $this->load->view('templates/header', $vars);
        $this->load->view($view, $vars);
        $this->load->view("templates/sidebar",$vars);
        $this->load->view("templates/footer",$vars);
    }

}
