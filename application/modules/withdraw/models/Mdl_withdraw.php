<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Mdl_withdraw extends MX_Controller {
    private $table;
    function __construct(){
        parent::__construct();
       
        $this->table='accounts';
       
    }
       
    function add($data){
        $this->db->where('user_id',$this->session->userdata('user_id'));
        return $this->db->update('accounts', $data);
    }
    function add1($data1){
        return $this->db->insert('statements',$data1);
    }
    
    
    
}