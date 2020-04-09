<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Mdl_register extends MX_Controller {
    private $table;
    function __construct(){
        parent::__construct();
        $this->table='users';
    }
    
    function add($data){
        $this->db->insert($this->table,$data);
        return $this->db->insert_id();
    }
    
    
}