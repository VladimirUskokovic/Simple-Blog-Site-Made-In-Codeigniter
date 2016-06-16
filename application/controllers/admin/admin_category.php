<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_category extends Backend_Controller
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
      $data['page_title']='Admin settings category';
      $data['categories'] = $this->backend_model->get_categories();
      $this->load_view("parts/admin_category",$data);
  }

  public function categorie()
  {
      $is_post = $this->input->server('REQUEST_METHOD') == 'POST';
      $this->form_validation->set_rules('tbName','Name','required');
      $data['basic_title']='Blog';
      $data['page_title']='Admin settings category';
      $data['check'] = true;
      if($is_post && $this->form_validation->run()){
          $type='categorie';
          $insert = array('name' => $this->input->post('tbName'),
                          'link' => 'categorie/show/',
                          'categorie' => 1
           );
          if($this->backend_model->add($insert,$type)){
             $this->session->set_flashdata('poruka', 'Successfully');
             redirect('admin/admin_category');
          }else{
            $this->session->set_flashdata('poruka', 'Error');
            redirect('admin/admin_category');
          }
      }else{
          $this->session->set_flashdata('poruka', 'Error!!!!');
          $this->load_view("parts/admin_category",$data);
      }
      

  }

  public function delete($id)
  {
      $type = 'categorie';
      $delete = array('id' => $id);
      if($this->backend_model->delete($delete,$type)){
         $this->session->set_flashdata('poruka', 'Successfully');
      }else{
        $this->session->set_flashdata('poruka', 'Error');
      }
      redirect('admin/admin_category');
  }

  public function edit($id)
  {
      $data['basic_title']='Blog';
      $data['page_title']='Admin settings category';
      $type='categorie';
      $data['categorie'] = $this->backend_model->get($id,$type);
      $this->load_view("parts/admin_category",$data);
  }

   public function update()
  {
      $is_post = $this->input->server('REQUEST_METHOD') == 'POST';
      $this->form_validation->set_rules('tbName','Name','required');
      $data['basic_title']='Blog';
      $data['page_title']='Admin settings category';
      $type='categorie';
      if($is_post && $this->form_validation->run()){
          $id = $this->input->post('tbId');
          $update = array('name' => $this->input->post('tbName')
          );
          if($this->backend_model->update($update,$type,$id)){
             $this->session->set_flashdata('poruka', 'Successfully');
             redirect('admin/admin_category');
          }else{
            $this->session->set_flashdata('poruka', 'Error');
            redirect('admin/admin_category');
          }
      }else{
          $this->session->set_flashdata('poruka', 'Error!!!!');
          redirect('admin/admin_category/edit/'.$this->input->post('tbId'));
      }
      
     
  }
}
