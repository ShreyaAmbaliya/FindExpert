<?php

class manage_worker extends CI_Controller
{
	
	function viewdata($segment=0)
	{
		$data=array();
		$limit=3;
 
		$this->session->set_flashdata('pageno',$segment);

		$qry=$this->db->get('worker');
		$total=$qry->num_rows();

		$config['per_page']=$limit;
		$config['total_rows']=$total;
		$config['base_url']=site_url('admin/manage_worker/viewdata');
		$config['full_tag_open']='<ul class="pagination">';
		$config['full_tag_close']='</ul>';
		$config['prev_tag_open'] = '<li class="paginate_button page-item previous" >';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li class="paginate_button page-item next" >';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li class="paginate_button page-item " >';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="paginate_button page-item active " ><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['prev_link'] = 'Previous';	
		$config['next_link'] = 'Next';
		$config['attributes'] = array('class' => 'page-link');

			
		$this->pagination->initialize($config);
		$data['pagination']=$this->pagination->create_links();

		$this->db->limit($limit,$segment);
		$qry=$this->db->get('worker');
		$res=$qry->result_array();
		
		$data['records']=$res;

		$this->load->view('admin/worker_details',$data);

	}

	function change_status($id=0,$status=0)
	{
		$this->db->where('worker_id',$id);
		$this->db->update('worker',array('status'=>$status));
		redirect('admin/manage_worker/viewdata/'.$this->session->flashdata('pageno'));
	}	
}
?>