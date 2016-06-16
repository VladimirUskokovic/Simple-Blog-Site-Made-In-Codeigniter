<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends Frontend_Controller
{

    private $ulogovan = FALSE;
    private $poruke = "";
    
	public function __construct()
    {
            parent::__construct();
            if ($this->session->userdata('username')) {
            $this->ulogovan = TRUE;
             }
            $this->poruke = $this->session->flashdata('poruka');
            $this->load->model('home_model');
            $this->load->model('categories_model');
            $this->load->library("pagination");
    }
	public function show($id)
	{
            $data['bestVote'] = $this->home_model->bestVote();
            $data['bestCommented'] = $this->home_model->bestCommented(); 
            $data['uloga']=$this->session->userdata('role');
            $data['ulogovan'] = $this->ulogovan;
            $data['poruka'] = $this->poruke;
            $data['page_title'] = 'Categorie';
		    $data['basic_title']= 'Blog';
            $config = array();
            $config["base_url"] = base_url() . "categories/show/".$id;
            $config["total_rows"] = $this->categories_model->record_count($id);
            $config["per_page"] = 4;
            $config["uri_segment"] = 4;
            $config['display_pages'] = FALSE;
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['next_link'] = 'Next Page';
            $config['prev_link'] = 'Previous Page';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['use_page_numbers'] = FALSE;
            $config['anchor_class'] = 'class="button fit"';

            $this->pagination->initialize($config);

            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $data["results"] = $this->categories_model->post_pagination($config["per_page"], $page,$id);
            $data["links"] = $this->pagination->create_links();
                    
            $this->load_view("templates/main",$data);
     
	}
}
