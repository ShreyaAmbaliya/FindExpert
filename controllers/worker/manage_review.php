<?php
	
	class manage_review extends CI_Controller
	{
		function index($id=0)
		{
			if($this->input->post())
			{
				$review=$this->input->post('cr_title');
				$star=$this->input->post('star');
				$saveArr=array(
					'cr_title'=>$review,
					'cr_star'=>$star,
					'assign_id'=>$id
				);
				$this->db->insert('c_review',$saveArr);
				redirect('worker/manage_payment/worker_payment');
			}
			$this->load->view('worker/client_review_form');
		}
	}
?>