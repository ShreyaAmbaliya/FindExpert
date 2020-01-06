<?php

class manage_subcategory extends CI_Controller
{
	function index()
	{ 
		
	}
	function insertdata()
	{
		if(!$this->session->userdata('user_id'))
		{
			redirect('admin/login/index');
		}
		if($this->input->post())
		{
			$this->form_validation->set_rules('cat_name','Category Name','required');
			$this->form_validation->set_rules('subcat_name','SubCategory Name','required|regex_match[/^[A-Z &-a-z]+$/]');
			if($this->form_validation->run()==FALSE)
        	   {
                 //echo validation_errors();
        	   }
        	   else
        	   {
					$name=$this->input->post('cat_name');
					$subname=$this->input->post('subcat_name');

					$data=array('subcat_name'=>$subname,'cat_id'=>$name);
					
					$sql=$this->db->insert('sub_category',$data);
					if($sql)	
					{
						$this->session->set_flashdata('success','Successfully Inserted');
						redirect('admin/manage_subcategory/insertdata');	
					}
					
				}
		}	
		$data=array();
		$this->load->model('admin/subcategory_mdl');
		$data['cat']=$this->subcategory_mdl->getcat();
		$this->load->view('admin/subcategory_form',$data);	
	}
	function viewdata($segment=0)
	{

		$data=array();
		$limit=3;

		$qry=$this->db->get('sub_category');
		$total=$qry->num_rows();

		$config['per_page']=$limit;
		$config['total_rows']=$total;
		$config['base_url']=site_url('admin/manage_subcategory/viewdata');
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
		$this->db->join('category','category.cat_id=sub_category.cat_id');
		$qry=$this->db->get('sub_category');
		$res=$qry->result_array();
		//echo '<pre>';print_r($res);die;
		$data['records']=$res;

		$this->load->view('admin/subcategory_details',$data);

	}
	function deletedata($id=0)
	{
		$qry=$this->db->get_where('sub_category',array('subcat_id'=>$id));
		$res=$qry->row_array();

		
		$this->db->where('subcat_id',$id);
		$sql=$this->db->delete('sub_category');	
		if($sql)	
		{
			$this->session->set_flashdata('success','Successfully deleted');
		//	redirect('admin/manage_subcategory/insertdata');	
		}
		//$this->load->view('tables');
		redirect('admin/manage_subcategory/viewdata');	
 
	}
	function updatedata($id=0)
	{
		$data=array();
		$qry=$this->db->get_where('sub_category',array('subcat_id'=>$id));
		$res=$qry->row_array();
		$data['record']=$res;
		
			$this->form_validation->set_rules('cat_name','Category Name','required');
			$this->form_validation->set_rules('subcat_name','SubCategory Name','required|regex_match[/^[A-Z &-a-z]+$/]');
			if($this->form_validation->run()==FALSE)
        	   {
                 //echo validation_errors();
                        						
        	   }
        	   else
        	   {
	
				if($this->input->post())
					{
						//$data['record'];
						$name=$this->input->post('subcat_name');

						$catname=$this->input->post('cat_name');
						$saveArr=array(
							'subcat_name'=>$name,
							'cat_id'=>$catname
						);	
						$this->db->where('subcat_id',$id);
						$sql=$this->db->update('sub_category',$saveArr); 
					if($sql)	
					{
						$this->session->set_flashdata('success','Successfully updated');
					//	redirect('admin/manage_subcategory/insertdata');	
					}
						redirect('admin/manage_subcategory/viewdata');

					}	
				}
			$this->load->model('admin/subcategory_mdl');
			$data['cat']=$this->subcategory_mdl->getcat();
			$this->load->view('admin/subcategory_form',$data);

	//			$this->load->view('admin/subcategory_form',$data);
			//$this->load->view('admin/category_form');
	}	
}