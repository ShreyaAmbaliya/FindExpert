<?php

class manage_bid extends CI_Controller
{ 
	
	function ajax_nstatus()
	{
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('worker_approve',2);
		$this->db->update('notification',array('status'=>1));

		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('bid_id!=',NULL);
		
		$this->db->update('notification',array('status'=>1));

		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('admin_approve',1);
		$this->db->update('notification',array('status'=>1));

		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('admin_approve',2);
		$this->db->update('notification',array('status'=>1));

		//echo $this->input->post('category');die;
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('worker_approve',1);
		$this->db->update('notification',array('status'=>1));
		echo ''; 
	}
	function bid_view($id=0)
	{
		$data=array();  
		/*$sql=$this->db->get_where('project',array('project_id'=>$id));
		$res=$sql->row_array();
		$data['project_title']=$res['project_title'];
		$this->db->join('worker','worker.worker_id=bid.worker_id');
		$qry=$this->db->get_where('bid',array('project_id'=>$id));
		$data['records']=$qry->result_array();*/
 		$data['project_id']=$id; 

			$sql=$this->db->get_where('project',array('project_id'=>$id));
			$rs=$sql->row_array();
			$data['record']=$rs;
 
			$qry1=$this->db->get_where('project',array('client_id'=>$this->session->userdata('client_id')));
			$rs=$qry1->result_array();
			$data['project']=$rs;
			
			$qry=$this->db->get_where('bid',array('project_id'=>$id));
			$result=$qry->result_array();
			$data['bid_status']=$result;

			$this->load->model('visitor/getcat_mdl');
			$data['cat']=$this->getcat_mdl->getcat();



			$this->db->select('bid.*,worker.worker_name');
			//$this->db->join('project_assignment','project_assignment.bid_id=bid.bid_id');
			$this->db->join('worker','worker.worker_id=bid.worker_id');
			$this->db->order_by('bid.status', '1,2,0');
			$this->db->where('bid.project_id',$id);
			$qry=$this->db->get('bid');
			$result=$qry->result_array();
			//print_r($result);die;
			$data['bids']=$result;
			//print_r($result);die;
		$this->load->view('client/bid_details',$data);
	}

		function change_status($id=0,$status=0)
		{
			$this->db->where('bid_id',$id);
			$sql=$this->db->get('bid');
			$rs=$sql->row_array();
			if($status==1)
			{
				$this->db->where('project_id',$rs['project_id']);
				$this->db->update('bid',array('status'=>2));
			}
			/*notification*/
					//$insert_id=$this->db->insert_id();
						$sql=$this->db->get_where('project',array('project_id'=>$rs['project_id']));
						$r=$sql->row_array();
						
						$dataArr=array(
							'n_txt'=>'Client Approve',
							'bid_id'=>$insert_id,
							'client_id'=>$r['client_id'],
							'client_approve'=>$status,
							'project_id'=>$r['project_id']
						);


						$this->db->insert('notification',$dataArr);
						/*notification*/
				$this->db->where('bid_id',$id);
				$this->db->update('bid',array('status'=>$status));
			//echo $this->db->last_query();die;
			redirect('client/manage_bid/bid_view/'.$rs['project_id']);
		}	
}
?>