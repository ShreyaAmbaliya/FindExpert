<?php

class manage_project extends CI_Controller
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
		if($this->input->post())
		{
			$this->form_validation->set_rules('project_title','Project title','required');
			$this->form_validation->set_rules('cat_name','Category','required');
			$this->form_validation->set_rules('min_budget','Minimum Budget','required|numeric');
			$this->form_validation->set_rules('max_budget','Maximum Budget','required|numeric|callback_max_check');
			$this->form_validation->set_rules('project_description','Project Description','required');
			$this->form_validation->set_rules('time_duration','Time Duration','required');
			$this->form_validation->set_rules('required_skills[]','Skill','required');

			//$this->form_validation->set_rules('skill_name','Skill Name','required|regex_match[/^[A-Z a-z]+$/]');
			if($this->form_validation->run()==FALSE)
        	   {
					$data['required_skills'] = $this->input->post('required_skills');
                 //echo validation_errors();
        	   }
        	   else
        	   {
					$project_title=$this->input->post('project_title');

					$cat_name=$this->input->post('cat_name');

					$min_budget=$this->input->post('min_budget');
					$max_budget=$this->input->post('max_budget');
					$project_desc=$this->input->post('project_description');
					$time_duration=$this->input->post('time_duration');
					$skillArr=$this->input->post('required_skills');
					$skills=implode("|",$skillArr);
					$client_id=$this->session->userdata('client_id');
					$currDate=date("Y-m-d");
					
					$bid_close= date('Y-m-d',strtotime($currDate.' +'.$time_duration));

					$data=array(
						'project_title'=>$project_title,
						'min_budget'=>$min_budget,
						'max_budget'=>$max_budget,
						'project_description'=>$project_desc,
						'time_duration'=>$time_duration,
						'required_skills'=>$skills,
						'bid_close'=>$bid_close,
						'client_id'=>$client_id,
						'cat_id'=>$cat_name
					);
					
					$sql=$this->db->insert('project',$data);
					if($sql)	
					{
						$this->session->set_flashdata('success','Successfully Inserted');
						redirect('client/manage_project/insertdata');	
					}
				}
		}	
		$qry=$this->db->get('skill');
		$data['skills']=$qry->result_array();
		$sql=$this->db->get('category');
		$data['cat']=$sql->result_array();
		$this->load->view('client/project_form',$data);
	}
	function max_check($min)
	{
		$min_budget=$this->input->post('min_budget');
		$max_budget=$this->input->post('max_budget');
			if($min_budget>=$max_budget)
			{
				$this->form_validation->set_message('max_check','Maximum Budget should be greater than Minimum Budget');
				return FALSE;
			}else{
				return TRUE;
			} 
	}

	function viewdata($id=0)
	{
		$data=array();

		$qry=$this->db->get('skill');
		$data['skills']=$qry->result_array();
		$this->db->join('category','category.cat_id=project.cat_id');
		$sql=$this->db->get_where('project',array('client_id'=>$this->session->userdata('client_id')));
		$res=$sql->result_array();
		$data['records']=$res;
		
		//echo '<pre>';print_r($res);die;
		$data['cat']=$res;
		$this->load->view('client/project_details',$data);
	}

	function deletedata($id=0)
	{
		$this->db->where('project_id',$id);
		$sql=$this->db->delete('project');	
		if($sql)	
		{
			$this->session->set_flashdata('success','Successfully deleted');
		//	redirect('admin/manage_subcategory/insertdata');	
		}
		//$this->load->view('tables');
		redirect('client/manage_project/viewdata');	
 
	}
	function updatedata($id=0)
	{
		$data=array();
		$sql=$this->db->get_where('project',array('project_id'=>$id));
		$res=$sql->row_array();

		$data['record']=$res;
		$data['required_skills']=explode('|',$res['required_skills']);

		$qry=$this->db->get('skill');
		$data['skills']=$qry->result_array();	
		if($this->input->post())
		{
			$this->form_validation->set_rules('project_title','Project title','required');
			$this->form_validation->set_rules('cat_name','Category','required');
			$this->form_validation->set_rules('min_budget','Minimum Budget','required|numeric');
			$this->form_validation->set_rules('max_budget','Maximum Budget','required|numeric|callback_max_check');
			$this->form_validation->set_rules('project_description','Project Description','required');
			$this->form_validation->set_rules('time_duration','Time Duration','required');
			$this->form_validation->set_rules('required_skills[]','Skill','required');

			//$this->form_validation->set_rules('skill_name','Skill Name','required|regex_match[/^[A-Z a-z]+$/]');
			if($this->form_validation->run()==FALSE)
        	   {
        	        //echo validation_errors();
        	   		$data['required_skills'] = $this->input->post('required_skills');
        	   }
        	   else
        	   {
			
				if($this->input->post())
					{
						$project_title=$this->input->post('project_title');
						$cat_name=$this->input->post('cat_name');
						$min_budget=$this->input->post('min_budget');
						$max_budget=$this->input->post('max_budget');
						$project_desc=$this->input->post('project_description');
						$time_duration=$this->input->post('time_duration');
						$skillArr=$this->input->post('required_skills');
						$skills=implode("|",$skillArr);
						$client_id=$this->session->userdata('client_id');
						$currDate=date("Y-m-d");
						
						$bid_close= date('Y-m-d',strtotime($currDate.' +'.$time_duration));

						$saveArr=array(
							'project_title'=>$project_title,
							'min_budget'=>$min_budget,
							'max_budget'=>$max_budget,
							'project_description'=>$project_desc,
							'time_duration'=>$time_duration,
							'required_skills'=>$skills,
							'bid_close'=>$bid_close,
							'client_id'=>$client_id,
							'cat_id'=>$cat_name
						);
						
						$this->db->where('project_id',$id);
						$sql=$this->db->update('project',$saveArr); 
					if($sql)	
					{
						$this->session->set_flashdata('success','Successfully updated');
					}
						redirect('client/manage_project/viewdata');
					}	
				}
		}	
		
		$sql=$this->db->get('category');
		$data['cat']=$sql->result_array();
		//echo '<pre>';print_r($data);die;
		$this->load->view('client/project_form',$data);
	}

}
?>