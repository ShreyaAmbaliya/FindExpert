<?php

class manage_portfolio extends CI_Controller
{
	
	function view_portfolio($id=0)
		{
			$this->session->set_flashdata('wid',$id);	
			$sq=$this->db->get_where('worker',array('worker_id'=>$id));
			$rows=$sq->row_array();
			$data['wrecord']=$rows;
			$qry=$this->db->get_where('portfolio',array('worker_id'=>$id));
			$rows=$qry->row_array();
			$data['precord']=$rows;
			$qry=$this->db->get_where('education',array('worker_id'=>$id));
			$rows=$qry->row_array();
			$data['edrecord']=$rows;
			$qry=$this->db->get_where('experience',array('worker_id'=>$id));
			$rows=$qry->row_array();
			$data['exrecord']=$rows;
			$this->load->view('client/portfolio_details',$data);
		}
}
?>