<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends Frontend_Controller
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
            $this->load->model('post_model');
	}

    public function show_post($id,$name)
    {
            $data['bestVote'] = $this->home_model->bestVote();
            $data['bestCommented'] = $this->home_model->bestCommented(); 
            $data['uloga']=$this->session->userdata('role');
            $data['ulogovan'] = $this->ulogovan;
            $data['poruka'] = $this->poruke;
            $data['basic_title'] = "Blog";
            $data['page_title']= $name;
            $data['post'] = $this->post_model->show_post($id);
            $data['comments'] = $this->post_model->get_com($id);
            // $data['video'] = $this->post_model->get_video($id);
            // $data['count_picture']= $this->post_model->picture_count($id);
            $data['number_comments'] = $this->post_model->get_comm($id);
            // if($data['count_picture'] > 0){
            //     $data['picture'] = $this->post_model->get_pictures($id);    
            // }
            $data['ulogovan'] = $this->ulogovan;
            $data['poruka'] = $this->poruke;
            $this->load_view("parts/post",$data);
    }

    public function addComment()
    {
            $id_user=$this->session->userdata('id');
            $text = $this->input->post('taMessage');
            $id_post = $this->input->post('tbIdPost');
            $name = $this->input->post('tbName');
            $email = $this->input->post('tbEmail');


            $data = array(
                'text'=>$text,
                'id_user'=>$id_user,
                'id_post'=>$id_post,
                'comm_date'=> now(),
                'name'=>$name,
                'email'=>$email);
            if($text == '' && $name == '' && $email == ''){
                echo $html = "Invalid";
                return;
            }else if($row=$this->post_model->add_comm($data)){
                foreach ($row as $r){
                    if($r['id_user'] != null){
                        echo $html = '<article class="post">
                            <div class="meta">
                            <time class="published">'.date('F d, Y H:i', $r['comm_date']).'</time>
                            <a href="#" class="author disabled"><span class="name">'.$r['username'].'</span><img src="'.base_url().$r['picture'].'" alt="" /></a>
                            </div>
                            <blockquote>'.$r['text'].'</blockquote>
                            </article>';
                    }else{
                        echo $html = '<article class="post">
                            <div class="meta">
                            <time class="published">'.date('F d, Y H:i', $r['comm_date']).'</time>
                            <a href="#" class="author disabled"><span class="name">'.$r['name'].'</span><img src="'.base_url().'/images/user_picture/user.jpg" alt="" /></a>
                            </div>
                            <blockquote>'.$r['text'].'</blockquote>
                            </article>';
                    }
                }
            }
    }

    public function rateStars(){
        $id_user=$this->session->userdata('id');
        $idPost = $this->input->post('tbIdPost');

       
        if($row=$this->post_model->add_star($idPost,$id_user)){
            foreach ($row as $r ) {
                 echo $r['stars'];
            }
           
        }
        else{
            echo "invalid";
        }

    }

  
}