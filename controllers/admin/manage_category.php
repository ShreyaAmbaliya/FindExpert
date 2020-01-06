<?php

class manage_category extends CI_Controller
{
	
	function insertdata()
	{

		if(!$this->session->userdata('user_id'))
		{
			redirect('admin/login/index');
		}
		if($this->input->post())
		{
			$this->form_validation->set_rules('cat_name','Category Name','required');
			if($this->form_validation->run()==FALSE)
        	   {
                 //echo validation_errors();
        	   }
        	   else
        	   {
					$name=$this->input->post('cat_name');
					$data=array('cat_name'=>$name);
					$sql=$this->db->insert('category',$data);
					if($sql)	
					{
						$this->session->set_flashdata('success','Successfully Inserted');
						//redirect('admin/manage_admin/insertdata');	
					}
				}
		}	
		$this->load->view('admin/category_form');	
	}
	function viewdata($segment=0)
	{
		$data=array();
		$limit=3;

		$qry=$this->db->get('category');
		$total=$qry->num_rows();

		$config['per_page']=$limit;
		$config['total_rows']=$total;
		$config['base_url']=site_url('admin/manage_category/viewdata');
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
		$qry=$this->db->get('category');
		$res=$qry->result_array();
		
		$data['records']=$res;

		$this->load->view('admin/category_details',$data);
	}
	function deletedata($id=0)
	{
		$qry=$this->db->get_where('category',array('cat_id'=>$id));
		$res=$qry->row_array();

		
		$this->db->where('cat_id',$id);
		$sql=$this->db->delete('category');
			if($sql)	
					{
						$this->session->set_flashdata('success','Successfully deleted');
						//redirect('admin/manage_admin/insertdata');	
					}	
		//$this->load->view('tables');
		redirect('admin/manage_category/viewdata');	
 
	}
	function updatedata($id=0)
	{
		$data=array();
		$qry=$this->db->get_where('category',array('cat_id'=>$id));
		$res=$qry->row_array();
		$data['record']=$res;
		
		if($this->input->post())
			{
				$name=$this->input->post('cat_name');
				$saveArr=array(
					'cat_name'=>$name
				);	
				$this->db->where('cat_id',$id);
				$sql=$this->db->update('category',$saveArr); 
					if($sql)	
					{
						$this->session->set_flashdata('success','Successfully updated');
					//	redirect('admin/manage_admin/insertdata');	
					}
				redirect('admin/manage_category/viewdata');
			}	
			$this->load->view('admin/category_form',$data);
			//$this->load->view('admin/category_form');
	}	
}
?>