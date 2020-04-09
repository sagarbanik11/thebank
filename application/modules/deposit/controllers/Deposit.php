<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Deposit extends MX_Controller {
	function __construct() {
		$this->load->model('Mdl_deposit');
		if(empty($_SESSION['user_id']))
		redirect('login');
		}

	public function index()
	{
		$this->db->where('user_id',$this->session->userdata('user_id'));
		$val['acc']=$this->db->get('accounts');
		$val['title']='Homepage Php Tutorial';
		$val['file']='deposit/deposit_view';
		echo Modules::run('template/layout3',$val);
	}
	public function save()
	{		
			if($this->input->post('depo')<=10000000 && $this->input->post('depo')>=100 )
			{
			$this->db->where('user_id',$this->session->userdata('user_id'));
			$r = $this->db->get('accounts')->row();
			$data['cr'] = $r->cr + $this->input->post('depo');
			$data1['cr'] = $this->input->post('depo');
			$data1['user_id']=$this->session->userdata('user_id');
			$data1['date']=date('Y-m-d');
			$data1['descr']="Deposit";
			$data1['balance']=$r->cr  + $this->input->post('depo');

			if ($this->Mdl_deposit->add($data) && $this->Mdl_deposit->add1($data1)){
				$msg='<div class="card-panel light-green lighten-2">Transaction Successful!</div>';
				redirect('deposit/index?suc_msg='.$msg);	

   			//redirect('profile');

			} 
		}
		
			

			else
			$this->session->set_flashdata('flash_data', '<b style="color:red;">Cash transaction limit Rs. 100 -1Cr </b>');
			redirect('deposit');
		}
 
	
}

