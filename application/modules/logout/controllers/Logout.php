<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Logout extends MX_Controller {

	public function index()
	{
		$val['file']='logout/logout_view';
		echo Modules::run('template/layout1',$val);
	}

 
    public function logout() {
		$data = $this->session->all_userdata();
        
     $this->session->unset_userdata($data);
            
    $this->session->sess_destroy();
        redirect('home');
    }
}

