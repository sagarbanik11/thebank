<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Transfer extends MX_Controller {
	function __construct() {
		$this->load->model('Mdl_transfer');
		if(empty($_SESSION['user_id']))
		redirect('login');
		}

	public function index()
	{
		$this->db->where('user_id',$this->session->userdata('user_id'));
		$val['acc']=$this->db->get('accounts');
		$val['title']='Homepage Php Tutorial';
		$val['file']='transfer/transfer_view';
		echo Modules::run('template/layout3',$val);
	}
	function delete($id){
		$this->db->where('t_id',$id);
		if($this->db->delete('accounts')){
			echo "Deleted";
		}else{
			echo "Failed";
		}
	}
	public function save() 
	{
		$this->load->library('form_validation'); 
		
		$this->form_validation->set_rules('racc',"Recipient's Account Number",'numeric|trim|is_unique[accounts.accNo]');
		

		
	
		{$this->db->where('user_id',$this->session->userdata('user_id'));
			$r = $this->db->get('accounts')->row();}
			//{$this->db->where('user_id',$this->session->userdata('user_id'));
				//$s = $this->db->get('statements')->row();}
		{$this->db->where('accNo',$this->input->post('racc'));
			$a = $this->db->get('accounts')->row();}
			//$rid=$a->user_id;
			//{$this->db->where('user_id',$rid);
				//$c = $this->db->get('statements')->row();}
			
		{$this->db->where('accNo',$this->input->post('racc'));
				$u = $this->db->get('users')->row();}


		if($r->cr > $this->input->post('ramount') && $this->form_validation->run() == false && $u->status==1 && $r->accNo !== $this->input->post('racc') && $this->input->post('ramount') > 49 )
			{
			$data = array(
				'cr' => $r->cr - $this->input->post('ramount'),
				
				);
						
				
			$data1 = array(


				'cr' => $a->cr + $this->input->post('ramount'),
					
					);
				
				$data3 = array(

					'dr' => $this->input->post('ramount'),
					'balance' => $r->cr - $this->input->post('ramount'),
					'descr'=> "Transfer",
					'ref_no'=> ucfirst("TRANSFER TO"." ".$_POST['racc']),
					'date'=>date('Y-m-d'),
					'user_id'=>$this->session->userdata('user_id')
						
						);
						
					$data4 = array(
					'cr' => $this->input->post('ramount'),
					'balance' => $a->cr + $this->input->post('ramount'),
					'descr'=> "Transfer",
					'ref_no'=> ucfirst("TRANSFER BY"." ".$r->accNo),
					'date'=>date('Y-m-d'),
					'user_id'=>$a->user_id

							
							);
							if ($this->Mdl_transfer->add($data) && ($this->Mdl_transfer->sub($data1)) && ($this->Mdl_transfer->sub1($data3)) && ($this->Mdl_transfer->sub2($data4))){
								$msg='<div class="card-panel light-green lighten-2">Transaction Successful!</div>';
								redirect('transfer/index?suc_msg='.$msg);	

						}
			
		
					
			}
	
		
			

			elseif($this->form_validation->run() == true || $u->status==0)
			{
			
			$this->session->set_flashdata('flash_data', '<b style="color:red;">Sorry No account found!</b>');
			redirect('transfer');
			}

			elseif($r->cr < $this->input->post('ramount'))
			{
			
			$this->session->set_flashdata('amount_data', '<b style="color:red;">You have Insufficient funds!</b>');
			redirect('transfer');
			}
			elseif($r->accNo == $this->input->post('racc'))
			{
			
			$this->session->set_flashdata('same_data', '<b style="color:red;">You can not transfer money in your own account</b>');
			redirect('transfer');
			}
			
			elseif($this->input->post('ramount') < 50){

			$this->session->set_flashdata('limit_data', '<b style="color:red;">Minimum transfer limit is Rs.50 </b>');
			redirect('transfer');
			}

			else
			
			redirect('transfer');
			

			
			
		
	}
	function fetch_name($acc){
		$this->db->where('accNo',$acc);
		$r=$this->db->get('accounts');
		$this->db->where('accNo',$acc);
		$q=$this->db->get('users');

		$q=$q->result();

		if($r->num_rows()>0 && $q[0]->status==1){
			$r=$r->result();
			echo $r[0]->accHolder;
		}else{
			echo "Invalid Account Number";
		}
	}
		
	
}
