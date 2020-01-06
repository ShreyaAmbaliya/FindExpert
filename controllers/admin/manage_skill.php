<?php

class manage_skill extends CI_Controller
{
	function index()
	{ 
		
	} 
	function ajax_subcat()
	{
		$cat_id=$this->input->post('category');
		$subcat = $this->db->get_where('sub_category',array('cat_id'=>$cat_id))->result_array();
		echo '<option value="">--SubCategory--</option>';
		foreach($subcat as $row){
		echo '<option value="'.$row['subcat_id'].'">'.$row['subcat_name'].'</option>';}
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
			$this->form_validation->set_rules('subcat_name','Sub Category Name','required');
			$this->form_validation->set_rules('skill_name','Skill Name','required|regex_match[/^[A-Z &-a-z]+$/]');
			if($this->form_validation->run()==FALSE)
        	   {
                 //echo validation_errors();
        	   }
        	   else
        	   {
					$skillname=$this->input->post('skill_name');
					$name=$this->input->post('cat_name');
					$subname=$this->input->post('subcat_name');

					$data=array('skill_name'=>$skillname,'subcat_id'=>$subname,'cat_id'=>$name);
					
					$sql=$this->db->insert('skill',$data);
					if($sql)	
					{
						$this->session->set_flashdata('success','Successfully Inserted');
						redirect('admin/manage_skill/insertdata');	
					}
				}
		}	
		$data=array();
		$this->load->model('admin/skill_mdl');
		$data['cat']=$this->skill_mdl->getcat();
		$data['subcat']=$this->skill_mdl->getsubcat();
		$this->load->view('admin/skill_form',$data);	
	}
	function viewdata($segment=0)
	{
		$data=array();
		$limit=3;

		$qry=$this->db->get('skill');
		$total=$qry->num_rows();

		$config['per_page']=$limit;
		$config['total_rows']=$total;
		$config['base_url']=site_url('admin/manage_skill/viewdata');
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
		$this->db->join('sub_category','sub_category.subcat_id=skill.subcat_id');
		$this->db->join('category','category.cat_id=skill.cat_id');
		$qry=$this->db->get('skill');
		$res=$qry->result_array();
		//echo '<pre>';print_r($res);die;
		$data['records']=$res;

		$this->load->view('admin/skill_details',$data);

	}
	function deletedata($id=0)
	{
		$qry=$this->db->get_where('skill',array('skill_id'=>$id));
		$res=$qry->row_array();
		$this->db->where('skill_id',$id);
		$sql=$this->db->delete('skill');	
		if($sql)	
		{
			$this->session->set_flashdata('success','Successfully deleted');
		//	redirect('admin/manage_subcategory/insertdata');	
		}
		//$this->load->view('tables');
		redirect('admin/manage_skill/viewdata');	
 
	}
	function updatedata($id=0)
	{
		$data=array();
		$qry=$this->db->get_where('skill',array('skill_id'=>$id));
		$res=$qry->row_array();
		$data['record']=$res;
		$sql=$this->db->get_where('sub_category',array('cat_id'=>$res['cat_id']));
		$data['subcat']=$sql->result_array();
		$this->form_validation->set_rules('cat_name','Category Name','required');
			$this->form_validation->set_rules('subcat_name','Sub Category Name','required');
			$this->form_validation->set_rules('skill_name','Skill Name','required|regex_match[/^[A-Z &-a-z]+$/]');
			if($this->form_validation->run()==FALSE)
        	   {
                 //echo validation_errors();
        	   }
        	   else
        	   {
				if($this->input->post())
					{
						$name=$this->input->post('skill_name');

						$catname=$this->input->post('cat_name');
						$subcat_name=$this->input->post('subcat_name');
						$saveArr=array(
							'skill_name'=>$name,
							'cat_id'=>$catname,
							'subcat_id'=>$subcat_name
						);	
						$this->db->where('skill_id',$id);
						$sql=$this->db->update('skill',$saveArr); 
					if($sql)	
					{
						$this->session->set_flashdata('success','Successfully updated');
					}
						redirect('admin/manage_skill/viewdata');
					}	
				}
			$this->load->model('admin/skill_mdl');
			$data['cat']=$this->skill_mdl->getcat();
			
			$this->load->view('admin/skill_form',$data);	
	}	
}