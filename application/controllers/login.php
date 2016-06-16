<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends Frontend_Controller
{

      private $ulogovan = FALSE;
      private $poruke = "";

	    public function __construct()
      {
            parent::__construct();
            if($this->session->userdata('username')){
               $this->ulogovan = TRUE;
            }
            $this->poruke = $this->session->flashdata('poruka');
            $this->load->model('users_model');
      }
      
      public function login()
      {
            $this->load->model('users_model');    
            $is_post = $this->input->server('REQUEST_METHOD') == 'POST';
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $str = do_hash($password, 'md5');
            $url=$this->input->post('tbUrl');
            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('password','Password','required'); 
            $this->form_validation->set_message('required','Polje %s je obavezno !!!');
            if($is_post && $this->form_validation->run()){
                 
              $korisnik = $this->users_model->check_user($username,$str);
              foreach ($korisnik as $k){
                     $id = $k['id_user'];
                     $username = $k['username'];
                     $role = $k['role_name'];
                     $picture = $k['picture'];
                     $email = $k['email'];
              }
                 
            if ($korisnik){
                $korisnik_podaci = array(
                    'id' => $id,
                    'username' => $username,
                    'role' => $role,
                    'picture' => $picture,
                    'email' => $email
                );
                $this->session->set_userdata($korisnik_podaci);
                $this->session->set_flashdata('poruka', 'Uspesno ste se ulogovali !');
                redirect(base_url().$url);
            }else{
                $this->session->set_flashdata('poruka', 'Pokusaj logovanja nije uspeo !!!');
                redirect(base_url().$url);
            }
            }else{
                  $this->session->set_flashdata('poruka', 'Pokusaj logovanja nije uspeo !!!');
                  redirect(base_url().$url);  
            }
            //kod za proveru korisnika i dodelu podataka u 
            //sesiju
      }

      public function logout()
      {
          $this->session->sess_destroy();
          redirect('home');
      }

      public function register()
      {
          
          $username = $this->input->post('tbName');
          $email = $this->input->post('tbEmail');
          $password = $this->input->post('tbPassword');
          $str = do_hash($password, 'md5');
          $dir_velike = "images/user_picture/";
          $ime_fajla = $_FILES['tbPicture']['name'];
          $tmp_fajla = $_FILES['tbPicture']['tmp_name'];
          $tip_fajla = $_FILES['tbPicture']['type'];
    
            $putanja_slike = $dir_velike.$ime_fajla;
            if($tip_fajla == "image/jpg" || $tip_fajla == "image/jpeg" || $tip_fajla == "image/png"){
            move_uploaded_file($tmp_fajla, $putanja_slike);}
          $data = array(
                'username' => $username,
                'email' => $email,
                'password' => $str,
                'role' => 2,
                'picture' => $putanja_slike,
                'user_status' => 0
            );
            
            // insert form data into database
            if ($this->users_model->insertUser($data))
            {
                // send email
                
                $from_email = 'vladimiruskokovic.666@gmail.com'; //change this to yours
                $subject = 'Verify Your Email Address';
                $message = 'Dear User,<br /><br />Please click on the below activation link to verify your email address.<br /><br /> http://localhost/login/verify/' .$this->input->post('tbEmail'). '<br /><br /><br />Thanks<br />Blog Team';  
                $this->email->from($from_email, 'Blog');
                $this->email->to($this->input->post('tbEmail'));
                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->send(); 
                $this->session->set_flashdata('poruka','<div class="alert alert-success text-center">Your are successfully register on site! Please check your mail to activeted your account!</div>');
                redirect('home');
           
            }
            else
            {
                // error
                $this->session->set_flashdata('poruka','<div class="alert alert-danger text-center">Sorry! There is error verifying your Email Address!</div>');
                redirect('home');
            }
        }
    
    
    public function verify($hash=NULL)
    {
        if ($this->users_model->verifyEmailID($hash))
        {
            $this->session->set_flashdata('poruka','<div class="alert alert-success text-center">Your Email Address is successfully verified! Please login to access your account!</div>');
            redirect('home');
        }
        else
        {
            $this->session->set_flashdata('poruka','<div class="alert alert-danger text-center">Sorry! There is error verifying your Email Address!</div>');
            redirect('home');
        }
    }

    //send verification email to user's email id
    public function sendEmail($to_email)
    {
        
        
        // //configure email settings
        // $config['protocol'] = 'smtp';
        // $config['smtp_host'] = 'ssl://smtp.mydomain.com'; //smtp host name
        // $config['smtp_port'] = '465'; //smtp port number
        // $config['smtp_user'] = $from_email;
        // $config['smtp_pass'] = '********'; //$from_email password
        // $config['mailtype'] = 'html';
        // $config['charset'] = 'iso-8859-1';
        // $config['wordwrap'] = TRUE;
        // $config['newline'] = "\r\n"; //use double quotes
        // $this->email->initialize($config);
        
        //send mail
        $this->email->from($from_email, 'Blog');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
        return $this->email->send();
    }
     
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */