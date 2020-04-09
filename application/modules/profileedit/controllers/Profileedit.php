<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Profileedit extends MX_Controller {
	function __construct() {
		$this->load->model('Mdl_profileedit');
	if(empty($_SESSION['user_id']))
	redirect('login');
	}

	public function index()
	{
		$this->db->where('user_id',$this->session->userdata('user_id'));
		$val['qry']=$this->db->get('users');
		$this->db->where('user_id',$this->session->userdata('user_id'));
		$val['acc']=$this->db->get('accounts');
		$val['file']='profileedit/profileedit_view';
		echo Modules::run('template/layout3',$val);
	}
	public function save()
	{
		$this->load->helper('security');

		$this->db->where('user_id',$this->session->userdata('user_id'));
		$r = $this->db->get('accounts');
		$this->db->where('user_id',$this->session->userdata('user_id'));
		$q=$this->db->get('users');
		foreach ($q->result() as $q)
		$this->load->library('form_validation');

		{
		if($r->num_rows()==0 && $q->email==$this->input->post('email') && $q->email==$this->input->post('phone')){
			$this->form_validation->set_rules('currBal','Amount','numeric|trim|required');
			$this->form_validation->set_rules('phone','Phone Number','numeric|required|min_length[10]|trim');
			$this->form_validation->set_rules('email','Email','valid_email|required|trim');
			$this->form_validation->set_rules('address','Address','max_length[100]|required|trim');
		}
		
		elseif($q->email!==$_POST['email'] && $q->mobile!==$_POST['phone']){
			$this->form_validation->set_rules('phone','Phone Number','numeric|required|min_length[10]|trim|is_unique[users.mobile]');
			$this->form_validation->set_rules('email','Email','valid_email|required|trim|is_unique[users.email]');
			$this->form_validation->set_rules('address','Address','max_length[100]|required|trim');
		}
		elseif($q->email==$_POST['email']&& $q->mobile==$this->input->post('phone')){
			$this->form_validation->set_rules('phone','Phone Number','numeric|required|min_length[10]|trim');
			$this->form_validation->set_rules('email','Email','valid_email|required|trim');
			$this->form_validation->set_rules('address','Address','max_length[100]|required|trim');
		}
		elseif($q->email==$_POST['email'] && $q->mobile!==$this->input->post('phone')){
			$this->form_validation->set_rules('phone','Phone Number','numeric|required|min_length[10]|trim|is_unique[users.mobile]');
			$this->form_validation->set_rules('email','Email','valid_email|required|trim');
			$this->form_validation->set_rules('address','Address','max_length[100]|required|trim');
		}
		elseif($q->email!==$_POST['email'] && $q->mobile==$this->input->post('phone')){
			$this->form_validation->set_rules('phone','Phone Number','numeric|required|min_length[10]|trim');
			$this->form_validation->set_rules('email','Email','valid_email|required|trim|is_unique[users.email]');
			$this->form_validation->set_rules('address','Address','max_length[100]|required|trim');
		}
		elseif($q->email==$_POST['email']){

		$this->form_validation->set_rules('phone','Phone Number','numeric|required|min_length[10]|trim|is_unique[users.mobile]');
			$this->form_validation->set_rules('email','Email','valid_email|required|trim');
			$this->form_validation->set_rules('address','Address','max_length[100]|required|trim');
		}

		elseif($q->mobile==$this->input->post('phone')){
				$this->form_validation->set_rules('phone','Phone Number','numeric|required|min_length[10]|trim');
			$this->form_validation->set_rules('email','Email','valid_email|required|trim|is_unique[users.email]');
			$this->form_validation->set_rules('address','Address','max_length[100]|required|trim');
			}
		}
		if ($this->form_validation->run() == TRUE)
		
	    {	

			if($r->num_rows()==0 && $_POST['currBal']>=1000 )
			{
	        $data['user_id']=$this->session->userdata('user_id');
	        $data['date']=date('Y-m-d');
	        $data['title']=$_POST['accType'];
	        $data['desc']="New Account";
			$data['cr']=$_POST['currBal'];
			$data['accNo']=$_POST['accNo'];
			$data['accHolder']=$_POST['accHolder'];
			$data1['user_id']=$this->session->userdata('user_id');
			$data1['date']=date('Y-m-d');
			$data1['descr']="Opening Balance";
			$data1['cr']=$_POST['currBal'];
			$data1['balance']=$_POST['currBal'];
			$data3['mobile']=$_POST['phone'];
		    $data3['email']=$_POST['email'];
		    $data3['address']=$_POST['address'];
			$this->Mdl_profileedit->add($data);
			$this->Mdl_profileedit->add1($data1);
			$this->Mdl_profileedit->add2($data3);
			$msg='<div class="card-panel light-blue">Your profile has been successfully updated!</div>';
			redirect('profileedit/index?suc_msg='.$msg);
			//redirect('profile');
			
			}
			elseif($r->num_rows()==0 && $_POST['currBal']<1000){

				$this->session->set_flashdata('limit_data', '<b style="color:red;">Minimum openning limit is Rs.1000 </b>');
				redirect('profileedit');
				}
			
			else
			{

		    $data3['mobile']=$_POST['phone'];
		    $data3['email']=$_POST['email'];
		    $data3['address']=$_POST['address'];
			
			$this->Mdl_profileedit->add2($data3);
			$msg='<div class="card-panel light-blue">Your profile has been successfully updated!</div>';
			redirect('profileedit/index?suc_msg='.$msg);
			
			}
			
			

			
			
// 	        print_r($data);die();
	        
		}
	    else
	    {
			$this->index();
			
		}
	}
}

	
	
	

