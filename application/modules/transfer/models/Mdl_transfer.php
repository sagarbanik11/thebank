<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Mdl_transfer extends MX_Controller { 
    private $table;
    function __construct(){
        parent::__construct();
       
        $this->table='accounts';
       
    } 
       
    function add($data){
        $this->db->where('user_id', $this->session->userdata('user_id'));
       return $this->db->update('accounts', $data);
    }
    function sub($data1){
        $this->db->where('accNo', $this->input->post('racc'));
		return $this->db->update('accounts', $data1);
    }
    function sub1($data3){
        return $this->db->insert('statements',$data3);
    }
    function sub2($data4){
        return $this->db->insert('statements',$data4);
    }
    
    
}