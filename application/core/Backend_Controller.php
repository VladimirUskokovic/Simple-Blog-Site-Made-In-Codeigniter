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
class Backend_Controller extends MY_Controller
{
   
        function __construct()
        {
            parent::__construct();
            
            $this->load->model('backend_model');
            $this->data['main_menu'] = $this->backend_model->show_menu_links();
        }
        
        public function load_view($view, $vars = array())
        {
            $this->load->view('templates/header', $vars);
            $this->load->view($view, $vars);
            $this->load->view("parts/admin_menu",$vars);
            $this->load->view('templates/footer', $vars);
        }

}
