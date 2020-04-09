<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends MX_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model("Mdl_login","login"); 
        if(!empty($_SESSION['user_id']))
            redirect('profile');
    }

	public function index(){
	{
		$val['file']='login/login_view';
		echo Modules::run('template/layout1',$val);
    }
    

      { 
          
        if($_POST) 
        {
            $result = $this->login->validate_user($_POST);
            if(!empty($result) && $result->status==1) {
                $data = [
                    'user_id' => $result->user_id,
                    'email' => $result->email,
                ];
 
                $this->session->set_userdata($data);
                redirect('profile');
            } else {
                $this->session->set_flashdata('flash_data', '<b style="color:red;">Username or password is wrong!</b>');
                redirect('login');
            }
        }
 
        //$this->load->view("login");
   
	}
}
	}


