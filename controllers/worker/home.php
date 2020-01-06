<?php
	
	class home extends CI_Controller
	{
		function index()
		{
			
		if(!$this->session->userdata('worker_id')){
				redirect('worker/login/index');
			}

			$this->db->where('worker_id',$this->session->userdata('worker_id'));
			$sql=$this->db->get('bid');
			$data['b_count']=$sql->num_rows();
			
			$this->db->where('worker_id',$this->session->userdata('worker_id'));
			$this->db->where('status',1);
			$sql=$this->db->get('bid');
			$data['pa_count']=$sql->num_rows();

			$this->db->where('worker_id',$this->session->userdata('worker_id'));
			$this->db->where('status',0);
			$sql=$this->db->get('bid');
			$data['pending_count']=$sql->num_rows();

			$this->db->where('worker_id',$this->session->userdata('worker_id'));
			$this->db->where('status',2);
			$sql=$this->db->get('bid');
			$data['disapproved_count']=$sql->num_rows();
			$this->load->view('worker/dashboard',$data);
		}
	}
?>