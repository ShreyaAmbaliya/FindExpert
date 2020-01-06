<?php
	
	class home extends CI_Controller
	{
		function index()
		{
			
		if(!$this->session->userdata('user_id')){
				redirect('admin/login/index');
			}
			$sql=$this->db->get('worker');
			$data['w_count']=$sql->num_rows();
			$sql=$this->db->get('client');
			$data['c_count']=$sql->num_rows();
			$this->db->where('status',1);
			$sql=$this->db->get('project');
			$data['pa_count']=$sql->num_rows();
			$this->db->where('status',0);
			$sql=$this->db->get('project');
			$data['pending_count']=$sql->num_rows();
			
			$this->load->view('admin/dashboard',$data);
		}
	}
?>