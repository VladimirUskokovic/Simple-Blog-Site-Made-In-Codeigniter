<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Frontend_Controller
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
            $this->load->library("pagination");
    }
	public function index()
	{
            $data['bestVote'] = $this->home_model->bestVote();
            $data['bestCommented'] = $this->home_model->bestCommented(); 
            $data['uloga']=$this->session->userdata('role');
            $data['ulogovan'] = $this->ulogovan;
            $data['poruka'] = $this->poruke;
            $data['page_title'] = 'Home';
		    $data['basic_title']= 'Blog';
            $config = array();
            $config["base_url"] = base_url() . "home/index";
            $config["total_rows"] = $this->home_model->record_count();
            $config["per_page"] = 4;
            $config["uri_segment"] = 3;
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

            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["results"] = $this->home_model->post_pagination($config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();
                    
            $this->load_view("templates/main",$data);
     
	}

    public function show_contact()
    {
            $data['bestVote'] = $this->home_model->bestVote();
            $data['bestCommented'] = $this->home_model->bestCommented();
            $data['basic_title']= 'Blog';
            $data['page_title'] = 'Contact';
            $data['ulogovan'] = $this->ulogovan;
            $data['poruka'] = $this->poruke;
            $is_post = $this->input->server('REQUEST_METHOD') == 'POST';
            $this->load_view('templates/contact',$data);
            $this->form_validation->set_rules('tbName','Name','trim|required');
            $this->form_validation->set_rules('tbEmail','Email','trim|required|valid_email');
            $this->form_validation->set_rules('taDescription','Description','trim|required');
            if($is_post && $this->form_validation->run()){
               $this->load->library('email');
               
               $this->email->from($this->input->post('tbEmail'), $this->input->post('tbName'));
               $this->email->to('youmail@mail.com');
               
               $this->email->message($this->input->post('taDescription'));
               
               $this->email->send();
               $this->session->set_flashdata('poruka','Thank you for contacting us, we will reply soon.');
               redirect('home/show_contact');
            }
    }

    public function search()
    {
        $data['bestVote'] = $this->home_model->bestVote();
        $data['bestCommented'] = $this->home_model->bestCommented(); 
        $data['basic_title']= 'Blog';
        $data['page_title'] = 'Search result';
        $is_post = $this->input->server('REQUEST_METHOD') == 'GET';
        $data['results'] = $this->home_model->search($this->input->get('query'));
        $this->load_view("templates/main",$data);
    }
}
