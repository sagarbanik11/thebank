<?php defined('BASEPATH') OR exit('No direct script access allowed');
class CloseAcc extends MX_Controller {
	function __construct() {
		$this->load->model('Mdl_closeAcc');
		if(empty($_SESSION['user_id']))
		redirect('login');
		}

		public function index()
	{	
		$this->db->where('user_id',$this->session->userdata('user_id'));
		$val['acc']=$this->db->get('accounts');
		$val['title']='Homepage Php Tutorial';
		$val['file']='closeAcc/closeAcc_view';
		echo Modules::run('template/layout3',$val);
	}
	
		public function save()
		{
			$this->db->where('user_id',$this->session->userdata('user_id'));
			$r = $this->db->get('users')->row();
			
			$data['status'] = '0';
			if ($this->Mdl_closeAcc->add($data)){
   			redirect('logout');

			}
		
			

			else
			$this->session->set_flashdata('flash_data', '<b style="color:red;">Transaction Failed!</b>');
			redirect('deposit');
		}
 
	

}
