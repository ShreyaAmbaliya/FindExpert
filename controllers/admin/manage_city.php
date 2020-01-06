<?php

class manage_city extends CI_Controller
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
			$this->form_validation->set_rules('state_name','State Name','required');
			$this->form_validation->set_rules('city_name','City Name','required|regex_match[/^[A-Za-z]+$/]');
			if($this->form_validation->run()==FALSE)
        	   {
                 //echo validation_errors();
        	   }
        	   else
        	   {
					$name=$this->input->post('state_name');
					$subname=$this->input->post('city_name');

					$data=array('city_name'=>$subname,'state_id'=>$name);
					
					$sql=$this->db->insert('city',$data);
					if($sql)	
					{
						$this->session->set_flashdata('success','Successfully Inserted');
						redirect('admin/manage_city/insertdata');	
					}
					
				}
		}	
		$data=array();
		$this->load->model('admin/city_mdl');
		$data['cat']=$this->city_mdl->getcat();
		$this->load->view('admin/city_form',$data);	
	}
	function viewdata($segment=0)
	{

		$data=array();
			$limit=3;

		$qry=$this->db->get('city');
		$total=$qry->num_rows();

		$config['per_page']=$limit;
		$config['total_rows']=$total;
		$config['base_url']=site_url('admin/manage_city/viewdata');
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
		$this->db->join('state','state.state_id=city.state_id');
		$qry=$this->db->get('city');
		$res=$qry->result_array();
		//echo '<pre>';print_r($res);die;
		$data['records']=$res;

		$this->load->view('admin/city_details',$data);

	}
	function deletedata($id=0)
	{
		$qry=$this->db->get_where('city',array('city_id'=>$id));
		$res=$qry->row_array();

		
		$this->db->where('city_id',$id);
		$sql=$this->db->delete('city');	
		if($sql)	
		{
			$this->session->set_flashdata('success','Successfully deleted');
		//	redirect('admin/manage_subcategory/insertdata');	
		}
		//$this->load->view('tables');
		redirect('admin/manage_city/viewdata');	
 
	}
	function updatedata($id=0)
	{
		$data=array();
		$qry=$this->db->get_where('city',array('city_id'=>$id));
		$res=$qry->row_array();
		$data['record']=$res;
		
			$this->form_validation->set_rules('state_name','State Name','required');
			$this->form_validation->set_rules('city_name','SubCategory Name','required|regex_match[/^[A-Za-z]+$/]');
			if($this->form_validation->run()==FALSE)
        	   {
                 //echo validation_errors();
                        						
        	   }
        	   else
        	   {
	
				if($this->input->post())
					{
						//$data['record'];
						$name=$this->input->post('city_name');

						$statename=$this->input->post('state_name');
						$saveArr=array(
							'city_name'=>$name,
							'state_id'=>$statename
						);	
						$this->db->where('city_id',$id);
						$sql=$this->db->update('city',$saveArr); 
					if($sql)	
					{
						$this->session->set_flashdata('success','Successfully updated');
					//	redirect('admin/manage_subcategory/insertdata');	
					}
						redirect('admin/manage_city/viewdata');

					}	
				}
			$this->load->model('admin/city_mdl');
			$data['cat']=$this->city_mdl->getcat();
			$this->load->view('admin/city_form',$data);

	//			$this->load->view('admin/subcategory_form',$data);
			//$this->load->view('admin/category_form');
	}	
}