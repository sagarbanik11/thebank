<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Mdl_profileedit extends MX_Controller {
    private $table;
    function __construct(){
        parent::__construct();
        $this->table='accounts';
       
       
    }
    
    function add($data){

        return $this->db->insert($this->table,$data);
//         return $this->db->insert_id();
    }
    function add1($data1){
        
        return $this->db->insert('statements',$data1);
//         return $this->db->insert_id();
    }
    function add2($data3){
        $this->db->where('user_id',$this->session->userdata('user_id'));
        return $this->db->update('users', $data3);
    }
    
}