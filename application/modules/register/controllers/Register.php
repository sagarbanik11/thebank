<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Register extends MX_Controller {
    function __construct(){
		parent::__construct();
		$this->load->model('mdl_register');
		{
			if(!empty($_SESSION['user_id']))
			redirect('profile');
			
			}
	}
	
	  

	public function index()
	{
		$this->db->where('user_id',$this->session->userdata('user_id'));
		$val['qry']=$this->db->get('users');
		$val['title']="Contact Us";
		$val['file']='register/register_view';
		echo Modules::run('template/layout1',$val);
	}
	public function save()
	{
		$this->load->library('form_validation'); 
		$this->form_validation->set_rules('firstName','Name','required|trim');
		$this->form_validation->set_rules('lastName','Name','required|trim');
		$this->form_validation->set_rules('phone','Phone Number','numeric|min_length[10]|trim|is_unique[users.mobile]');
		$this->form_validation->set_rules('email','Email','valid_email|required|trim|is_unique[users.email]');
		$this->form_validation->set_rules('address','Address','max_length[100]|trim');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('confirmpassword','ConfirmPassword','required|matches[password]');
		//$this->form_validation->set_rules('email', 'Email', 'callback_rolekey_exists');
		if ($this->form_validation->run() == FALSE)
		{
			
			$this->index();
		}
		else
		{
		    $data['name']=ucfirst($_POST['firstName']." ".$_POST['lastName']);
		    $data['mobile']=$_POST['phone'];
		    $data['email']=$_POST['email'];
		    $data['address']=$_POST['address'];
			$data['password']=md5($_POST['password']); 
			$data['accNo']=date('ymdhis').$this->session->userdata('user_id');
			
		    $data['type']="U";
		    
		    $id=$this->mdl_register->add($data);
		    $ses=array(
		        "name"=>$data['name'],
				"user_id"=>$id,
				"email"=>$data['email'],
			   "account_no"=>$data['accNo']
			);	
		    $this->session->set_userdata($ses);

		        redirect('openAcc'); 

		}
	}
}
