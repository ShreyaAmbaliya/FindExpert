<?php
	
class manage_payment extends CI_Controller
{
	function index($id=0)
	{
		//echo $id;die;
		$this->session->set_userdata('from_client','yes');
		redirect('Welcome/index/'.$id);
	}
	function show_payment_details()
	{
		/*
		$sql=$this->db->get_where('project_assignment',array('client_id'=>$this->session->userdata('client_id')));
		$res=$sql->row_array();
		
		$qry=$this->db->get_where('c_payment_history',array('assign_id'=>$res['assign_id']));
		$result=$qry->result_array(); 
		//echo '<pre>';print_r($result);die;
		$data['records']=$result;*/

		$q=$this->db->get('w_review');
		$rs=$q->result_array();
		//print_r($rs);die;
		$data['assign']=$rs;
		$this->db->select('c_payment_history.*,client.client_name');
		$this->db->join('project_assignment','project_assignment.assign_id=c_payment_history.assign_id');
		$this->db->join('client','client.client_id=project_assignment.client_id');
		$this->db->where('client.client_id',$this->session->userdata('client_id'));

		$qry=$this->db->get('c_payment_history');
		$cres=$qry->result_array();

		$data['records']=$cres;
		$this->load->view('client/payment_details',$data);
	}
}

?>