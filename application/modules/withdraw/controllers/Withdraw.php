<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Withdraw extends MX_Controller {
	function __construct() {
		$this->load->model('Mdl_withdraw');
		if(empty($_SESSION['user_id']))
		redirect('login');
		}

	public function index()
	{
		$this->db->where('user_id',$this->session->userdata('user_id'));
		$val['acc']=$this->db->get('accounts');
		$val['title']='Homepage Php Tutorial';
		$val['file']='withdraw/withdraw_view';
		echo Modules::run('template/layout3',$val);
	}
	public function save()
	{
			$this->db->where('user_id',$this->session->userdata('user_id'));
			$r = $this->db->get('accounts')->row();
			if($r->cr > $this->input->post('ramount') && $this->input->post('ramount')>=50)
			{
			
			$data['cr'] = $r->cr - $this->input->post('ramount');
			$data1['dr'] = $this->input->post('ramount');
			$data1['user_id']=$this->session->userdata('user_id');
			$data1['date']=date('Y-m-d');
			$data1['descr']="Withdraw";
			$data1['balance']=$r->cr  - $this->input->post('ramount');

   			//$this->db->where('user_id',$this->session->userdata('user_id'));
			  // $this->db->update('accounts', $data);
			if ($this->Mdl_withdraw->add($data) && $this->Mdl_withdraw->add1($data1)){ 
				$msg='<div class="card-panel light-green lighten-2">Transaction Successful!</div>';
				redirect('withdraw/index?suc_msg='.$msg);	
   			

			} 
		}
		
			

			elseif($r->cr < $this->input->post('ramount')){
			$this->session->set_flashdata('flash_data', '<b style="color:red;">You have Insufficient funds!</b>');
			redirect('withdraw');
		}
		
		else{
		$this->session->set_flashdata('limit_data', '<b style="color:red;">Minimum withdraw limit is Rs.50!</b>');
		redirect('withdraw');
	}
}
	
}
