<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Statement extends MX_Controller {
	function __construct() {
		
		if(empty($_SESSION['user_id']))
		redirect('login');
		}
	

	public function index()
	{
		$this->db->where('user_id',$this->session->userdata('user_id'));
		$val['qry']=$this->db->get('users');
		$this->db->where('user_id',$this->session->userdata('user_id'));
		$val['acc']=$this->db->get('accounts');
		$this->db->where('user_id',$this->session->userdata('user_id'));
		$val['sta']=$this->db->get('statements');
		$val['title']='Homepage Php Tutorial';
		$val['file']='statement/statement_view';
		echo Modules::run('template/layout3',$val);
	}

	
}
