<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends MX_Controller {

	public function index()
	{	
		$this->db->where('user_id',$this->session->userdata('user_id'));
		$val['qry']=$this->db->get('users');
		$val['title']='Homepage Php Tutorial';
		$val['file']='home/home_view';
		echo Modules::run('template/layout1',$val);
	}
}
