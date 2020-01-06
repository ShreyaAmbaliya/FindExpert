<?php
	
	class manage_review extends CI_Controller
	{
		function index($id=0)
		{
			if($this->input->post())
			{
				$review=$this->input->post('wr_title');
				$star=$this->input->post('star');
				$saveArr=array(
					'wr_title'=>$review,
					'wr_star'=>$star,
					'assign_id'=>$id
				);
				$this->db->insert('w_review',$saveArr);
				redirect('client/manage_payment/show_payment_details');
			}
			$this->load->view('client/worker_review_form');
		}
	}
?>