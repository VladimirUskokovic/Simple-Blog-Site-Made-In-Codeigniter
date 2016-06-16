<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_post extends Backend_Controller
{

      private $ulogovan = FALSE;
      private $poruke = "";
     
	public function __construct()
    {
            parent::__construct();
            if ($this->session->userdata('username')) {
            $this->ulogovan = TRUE;
             }
             $this->role = $this->session->userdata('role');
            if(!$this->ulogovan ||  $this->role != 'admin'){
                redirect('Home/Index');
            }
            $this->poruke = $this->session->flashdata('poruka');
            $this->load->library("pagination");
    }
	public function index()
	{
            $data['basic_title']='Blog';
            $data['page_title']='Admin settings post';
            $data['posts'] = $this->backend_model->get_posts();
            $this->load_view("parts/admin_post",$data);
     
	}

    public function get_comm($id)
    {
            $data['basic_title']='Blog';
            $data['page_title']='Admin settings comments';
            $config = array();
            $config["base_url"] = base_url() . "admin/admin_post/get_comm/".$id;
            $config["total_rows"] = $this->backend_model->record_count($id);
            $config["per_page"] = 5;
            $config["uri_segment"] = 5;
            $config['display_pages'] = FALSE;
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['next_link'] = 'Next Page';
            $config['prev_link'] = 'Previous Page';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['use_page_numbers'] = FALSE;
            $config['anchor_class'] = 'class="button fit"';
            $config['first_link'] = FALSE;
            $config['last_link'] = FALSE;

            $this->pagination->initialize($config);

            $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
            $data["results"] = $this->backend_model->get_comm($id,$config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();
            $this->load_view("parts/admin_comments",$data);
    }

    public function add()
  {
      $is_post = $this->input->server('REQUEST_METHOD') == 'POST';
      $this->form_validation->set_rules('tbSubject','Subject','trim|required|min_length[5]');
      $this->form_validation->set_rules('tbAbout','About','trim|required|min_length[8]');
      $this->form_validation->set_rules('taText','Text','trim|required');
      $data['categories'] = $this->backend_model->get_categories();
      $data['basic_title']='Blog';
      $data['page_title']='Admin settings post';
      $data['check'] = true;
      if($is_post && $this->form_validation->run()){
            $type='posts';
            $id_user = $this->session->userdata('id');
            $subject = $this->input->post('tbSubject');
            $about = $this->input->post('tbAbout');
            $text = $this->input->post('taText');
            $category = $this->input->post('opCat');
            $dir_velike = "images/user_picture/";
            $ime_fajla = $_FILES['tbPicture']['name'];
            $tmp_fajla = $_FILES['tbPicture']['tmp_name'];
            $tip_fajla = $_FILES['tbPicture']['type'];

            $putanja_slike = $dir_velike.$ime_fajla;
            if($tip_fajla == "image/jpg" || $tip_fajla == "image/jpeg" || $tip_fajla == "image/png"){
            move_uploaded_file($tmp_fajla, $putanja_slike);}
            $insert = array(
                'subject' => $subject,
                'about' => $about,
                'text' => $text,
                'cover' => $putanja_slike,
                'post_date' => now(),
                'id_user' => $id_user,
                'categorie' => $category,
                'post_status' => 1 
            );
            if($this->backend_model->add($insert,$type)){
             $this->session->set_flashdata('poruka', 'Successfully');
             redirect('admin/admin_post');
            }else{
            $this->session->set_flashdata('poruka', 'Error');
            redirect('admin/admin_post');
            }
            }else{
            $this->load_view("parts/admin_post",$data);
      }
    }

    public function delete($id)
    {
        $type = 'posts';
        $delete = array('id_post' => $id);
        if($this->backend_model->delete($delete,$type)){
            $this->session->set_flashdata('poruka', 'Successfully');
        }else{
        $this->session->set_flashdata('poruka', 'Error');
        }
        redirect('admin/admin_post');
    }

     public function edit($id)
    {
      $data['basic_title']='Blog';
      $data['page_title']='Admin settings post';
      $type='posts';
      $data['postEdit'] = $this->backend_model->get($id,$type);
      $data['categories'] = $this->backend_model->get_categories();
      $this->load_view("parts/admin_post",$data);
    }

    public function update()
    {
        $is_post = $this->input->server('REQUEST_METHOD') == 'POST';
        $this->form_validation->set_rules('tbSubject','Subject','trim|required|min_length[5]');
        $this->form_validation->set_rules('tbAbout','About','trim|required|min_length[8]');
        $this->form_validation->set_rules('taText','Text','trim|required');
        $data['basic_title']='Blog';
        $data['page_title']='Admin settings post';
        if($is_post && $this->form_validation->run()){
            $type='posts';
            $id = $this->input->post('tbIdPost');
            $id_user = $this->session->userdata('id');
            $subject = $this->input->post('tbSubject');
            $about = $this->input->post('tbAbout');
            $text = $this->input->post('taText');
            $category = $this->input->post('opCat');
            $dir_velike = "images/user_picture/";
            $ime_fajla = $_FILES['tbPicture']['name'];
            $tmp_fajla = $_FILES['tbPicture']['tmp_name'];
            $tip_fajla = $_FILES['tbPicture']['type'];

            $putanja_slike = $dir_velike.$ime_fajla;
            if($tip_fajla == "image/jpg" || $tip_fajla == "image/jpeg" || $tip_fajla == "image/png"){
            move_uploaded_file($tmp_fajla, $putanja_slike);}
            $update = array(
                'subject' => $subject,
                'about' => $about,
                'text' => $text,
                'cover' => $putanja_slike,
                'post_date' => now(),
                'id_user' => $id_user,
                'categorie' => $category,
                'post_status' => 1
            );
            if($this->backend_model->update($update,$type,$id)){
             $this->session->set_flashdata('poruka', 'Successfully');
             redirect('admin/admin_post');
            }else{
            $this->session->set_flashdata('poruka', 'Error');
            redirect('admin/admin_post');
            }
            }else{
            redirect('admin/admin_post');
            }
    }
    public function commentDelete($id){
        $type="comments";
        $delete = array('id_comm' => $id);
        if($this->backend_model->delete($delete,$type)){
            $this->session->set_flashdata('poruka', 'Successfully');
        }else{
        $this->session->set_flashdata('poruka', 'Error');
        }
        redirect('admin/admin_post');
    }
}