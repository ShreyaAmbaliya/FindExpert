<?php

class manage_state extends CI_Controller
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
			$this->form_validation->set_rules('country_name','Country Name','required');
			$this->form_validation->set_rules('state_name','State Name','required|regex_match[/^[A-Z a-z]+$/]');
			if($this->form_validation->run()==FALSE)
        	   {
                 //echo validation_errors();
        	   }
        	   else
        	   {
					$cname=$this->input->post('country_name');
					$stname=$this->input->post('state_name');

					$data=array('state_name'=>$stname,'country_id'=>$cname);
					
					$sql=$this->db->insert('state',$data);
					if($sql)	
					{
						$this->session->set_flashdata('success','Successfully Inserted');
						redirect('admin/manage_state/insertdata');	
					}
					
				}
		}	
		$data=array();
		$this->load->model('admin/state_mdl');
		$data['cat']=$this->state_mdl->getcat();
		$this->load->view('admin/state_form',$data);	
	}
	function viewdata($segment=0)
	{
		$data=array();
		$limit=3;

		$qry=$this->db->get('state');
		$total=$qry->num_rows();

		$config['per_page']=$limit;
		$config['total_rows']=$total;
		$config['base_url']=site_url('admin/manage_state/viewdata');
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
		$this->db->join('country','country.country_id=state.country_id');
		$qry=$this->db->get('state');
		$res=$qry->result_array();
		//echo '<pre>';print_r($res);die;
		$data['records']=$res;

		$this->load->view('admin/state_details',$data);

	}
	function deletedata($id=0)
	{
		$qry=$this->db->get_where('state',array('state_id'=>$id));
		$res=$qry->row_array();

		
		$this->db->where('state_id',$id);
		$sql=$this->db->delete('state');	
		if($sql)	
		{
			$this->session->set_flashdata('success','Successfully deleted');
		//	redirect('admin/manage_state/insertdata');	
		}
		//$this->load->view('tables');
		redirect('admin/manage_state/viewdata');	
 
	}
	function updatedata($id=0)
	{
		$data=array();
		$qry=$this->db->get_where('state',array('state_id'=>$id));
		$res=$qry->row_array();
		$data['record']=$res;
		
			$this->form_validation->set_rules('country_name','Country Name','required');
			$this->form_validation->set_rules('state_name','State','required|regex_match[/^[A-Z a-z]+$/]');
			if($this->form_validation->run()==FALSE)
        	   {
                 //echo validation_errors();
                        						
        	   }
        	   else
        	   {
	
				if($this->input->post())
					{
						//$data['record'];
						$name=$this->input->post('state_name');

						$catname=$this->input->post('country_name');
						$saveArr=array(
							'state_name'=>$name,
							'country_id'=>$catname
						);	
						$this->db->where('state_id',$id);
						$sql=$this->db->update('state',$saveArr); 
					if($sql)	
					{
						$this->session->set_flashdata('success','Successfully updated');
					//	redirect('admin/manage_state/insertdata');	
					}
						redirect('admin/manage_state/viewdata');

					}	
				}
			$this->load->model('admin/state_mdl');
			$data['cat']=$this->state_mdl->getcat();
			$this->load->view('admin/state_form',$data);

	//			$this->load->view('admin/state_form',$data);
			//$this->load->view('admin/category_form');
	}	
}