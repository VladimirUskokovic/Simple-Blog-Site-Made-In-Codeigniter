<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_users extends Backend_Controller
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
            $data['page_title']='Admin settings users';
            $data['users'] = $this->backend_model->get_users();
            $this->load_view("parts/admin_users",$data);
     
	}

  public function add()
  {
      $is_post = $this->input->server('REQUEST_METHOD') == 'POST';
      $this->form_validation->set_rules('tbName','Username','trim|required|min_length[5]');
      $this->form_validation->set_rules('tbPassword','Password','trim|required|min_length[8]');
      $this->form_validation->set_rules('tbEmail','Email','trim|required|valid_email');
      $data['basic_title']='Blog';
      $data['page_title']='Admin settings users';
      $data['check'] = true;
      if($is_post && $this->form_validation->run()){
            $type='users';
            $username = $this->input->post('tbName');
            $email = $this->input->post('tbEmail');
            $password = $this->input->post('tbPassword');
            $str = do_hash($password, 'md5');
            $dir_velike = "images/user_picture/";
            $ime_fajla = $_FILES['tbPicture']['name'];
            $tmp_fajla = $_FILES['tbPicture']['tmp_name'];
            $tip_fajla = $_FILES['tbPicture']['type'];
            if($this->backend_model->check_user($username)){
                $this->session->set_flashdata('poruka', 'Username already taken.');
                redirect('admin/admin_users/add');
            }
            $putanja_slike = $dir_velike.$ime_fajla;
            if($tip_fajla == "image/jpg" || $tip_fajla == "image/jpeg" || $tip_fajla == "image/png"){
            move_uploaded_file($tmp_fajla, $putanja_slike);}
            $insert = array(
                'username' => $username,
                'email' => $email,
                'password' => $str,
                'role' => 2,
                'picture' => $putanja_slike,
                'user_status' => 1
            );
            if($this->backend_model->add($insert,$type)){
             $this->session->set_flashdata('poruka', 'Successfully');
             redirect('admin/admin_users');
            }else{
            $this->session->set_flashdata('poruka', 'Error');
            redirect('admin/admin_users');
            }
            }else{
            $this->session->set_flashdata('poruka', 'Error!!!!');
            $this->load_view("parts/admin_users",$data);
      }
    }

    public function delete($id)
  {
      $type = 'users';
      $delete = array('id_user' => $id);
      if($this->backend_model->delete($delete,$type)){
         $this->session->set_flashdata('poruka', 'Successfully');
      }else{
        $this->session->set_flashdata('poruka', 'Error');
      }
      redirect('admin/admin_users');
  }

  public function edit($id)
  {
      $data['basic_title']='Blog';
      $data['page_title']='Admin settings category';
      $type='users';
      $data['oneUser'] = $this->backend_model->get($id,$type);
      $data['role'] = $this->backend_model->getRole();
      $this->load_view("parts/admin_users",$data);
  }

   public function update()
  {
      $is_post = $this->input->server('REQUEST_METHOD') == 'POST';
      $this->form_validation->set_rules('tbName','Username','trim|required|min_length[5]');
      $this->form_validation->set_rules('tbPassword','Password','trim|required|min_length[8]');
      $this->form_validation->set_rules('tbEmail','Email','trim|required|valid_email');
      $this->form_validation->set_rules('opRole','Role','required');
      $data['basic_title']='Blog';
      $data['page_title']='Admin settings users';
      if($is_post && $this->form_validation->run()){
            $type='users';
            $id = $this->input->post('tbId');
            $username = $this->input->post('tbName');
            $email = $this->input->post('tbEmail');
            $password = $this->input->post('tbPassword');
            $role = $this->input->post('opRole');
            $str = do_hash($password, 'md5');
            $fname = $this->input->post('tbFname');
            $dir_velike = "images/user_picture/";
            $ime_fajla = $_FILES['tbPicture']['name'];
            $tmp_fajla = $_FILES['tbPicture']['tmp_name'];
            $tip_fajla = $_FILES['tbPicture']['type'];
            if($fname != $username){
            if($this->backend_model->check_user($username)){
                $this->session->set_flashdata('poruka', 'Username and email already taken.');
                redirect('admin/admin_users');
            }}
            $putanja_slike = $dir_velike.$ime_fajla;
            if($tip_fajla == "image/jpg" || $tip_fajla == "image/jpeg" || $tip_fajla == "image/png"){
            move_uploaded_file($tmp_fajla, $putanja_slike);}
            $update = array(
                'username' => $username,
                'email' => $email,
                'password' => $str,
                'role' => $role,
                'picture' => $putanja_slike,
                'user_status' => 1
            );
            if($this->backend_model->update($update,$type,$id)){
             $this->session->set_flashdata('poruka', 'Successfully');
             redirect('admin/admin_users');
            }else{
            $this->session->set_flashdata('poruka', 'Error');
            redirect('admin/admin_users');
            }
            }else{
            redirect('admin/admin_users');
            }
    }
}