<?php defined('BASEPATH') OR exit('No direct script access allowed');
class OpenAcc extends MX_Controller {
    function __construct(){
        parent::__construct();
		$this->load->model('Mdl_openacc');
			{
			if(empty($_SESSION['user_id']))
			redirect('login');
			elseif(empty($_SESSION['account_no']) || empty($_SESSION['email']))
			redirect('profile');
			}

    }

	public function index()
	{
	    $val['accNo']=$this->session->userdata('account_no');
	    $val['name']=$this->session->userdata('name'); 
		$val['title']='Homepage Php Tutorial';
		$val['file']='openAcc/openAcc_view';
		echo Modules::run('template/layout2',$val);
	}
	public function save()
	{
	    $this->load->library('form_validation');
	    $this->form_validation->set_rules('currBal','Amount','numeric|trim');
	    if ($this->form_validation->run() == TRUE && $_POST['currBal']>=1000)
	    {
	        //echo validation_errors();
	        $data['user_id']=$this->session->userdata('user_id');
	        $data['date']=date('Y-m-d');
	        $data['title']=$_POST['accType'];
	        $data['desc']="New Account";
			$data['cr']=$_POST['currBal'];
			$data['accNo']=$_POST['accNo'];
			$data['accHolder']=$this->session->userdata('name');
			$data1['user_id']=$this->session->userdata('user_id');
			$data1['date']=date('Y-m-d');
			$data1['descr']="Opening Balance";
			$data1['cr']=$_POST['currBal'];
			$data1['balance']=$_POST['currBal'];

			
			
// 	        print_r($data);die();
	        
	        if ($this->Mdl_openacc->add($data) && $this->Mdl_openacc->add1($data1)){

				$data = $this->session->all_userdata();
        
				$this->session->unset_userdata($data);
					   
			   $this->session->sess_destroy();
			   $msg='<div class="card-panel light-green lighten-2">Your account has been created successfully and is ready to login!</div>';
				redirect('login/index?suc_msg='.$msg);	
				   //redirect('login');
			}
		}
		elseif($_POST['currBal']<1000){

				$this->session->set_flashdata('limit_data', '<b style="color:red;">Minimum openning limit is Rs.1000 </b>');
				redirect('openAcc');
				}
	    	
	    else
	    {
	        $this->index(); 
	    }
	}
}
