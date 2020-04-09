<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Mdl_closeAcc extends MX_Controller {
    private $table;
    function __construct(){
        parent::__construct();
       
        $this->table='users';
       
    }
       
    function add($data){
        $this->db->where('user_id',$this->session->userdata('user_id'));
        return $this->db->update('users', $data);
    }
    
    
    
}