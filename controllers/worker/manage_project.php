<?php
 
class manage_project extends CI_Controller
{
	function index()
	{  
		 
	}

	function ajax_nstatus()
	{
		$this->db->where('client_approve',2);		
		$this->db->update('notification',array('status'=>1));
		$this->db->where('client_approve',1);

		$this->db->update('notification',array('status'=>1));
		echo ''; 
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
			$this->form_validation->set_rules('min_budget','Minimum Budget','required|numeric');
			$this->form_validation->set_rules('max_budget','Maximum Budget','required|numeric|callback_max_check');
			$this->form_validation->set_rules('description','Project Description','required');
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
					$min_budget=$this->input->post('min_budget');
					$max_budget=$this->input->post('max_budget');
					$project_desc=$this->input->post('description');
					$time_duration=$this->input->post('time_duration');
					$skillArr=$this->input->post('required_skills');
					$skills=implode("|",$skillArr);
					$worker_id=$this->session->userdata('worker_id');
					$currDate=date("Y-m-d");
					
					$bid_close= date('Y-m-d',strtotime($currDate.' +'.$time_duration));

					$data=array(
						'project_title'=>$project_title,
						'min_budget'=>$min_budget,
						'max_budget'=>$max_budget,
						'description'=>$project_desc,
						'time_duration'=>$time_duration,
						'required_skills'=>$skills,
						'bid_close'=>$bid_close,
						'worker_id'=>$worker_id
					);
					
					$sql=$this->db->insert('project',$data);
					if($sql)	
					{
						$this->session->set_flashdata('success','Successfully Inserted');
						redirect('worker/manage_project/insertdata');	
					}
				}
		}	
		
		$qry=$this->db->get('skill');
		$data['skills']=$qry->result_array();
		$this->load->view('worker/project_form',$data);
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
	function bid_accept($id=0)
	{
		$project_id=$id;
		if($this->input->post())
		{
			$this->form_validation->set_rules('budget','Budget','required|numeric');
			$this->form_validation->set_rules('description','Description','required');
			$this->form_validation->set_rules('time_duration','Time Duration','required');

			//$this->form_validation->set_rules('skill_name','Skill Name','required|regex_match[/^[A-Z a-z]+$/]');
			if($this->form_validation->run()==FALSE)
        	   {
                 //echo validation_errors();
        	   }
        	   else
        	   {
					$budget=$this->input->post('budget');
			
					$description=$this->input->post('description');
					$time_duration=$this->input->post('time_duration');
					$worker_id=$this->session->userdata('worker_id');
					
					$data=array(
						'budget'=>$budget,
						'description'=>$description,
						'time_duration'=>$time_duration,
						'project_id'=>$project_id,
						'worker_id'=>$worker_id
					);
					
					$sql=$this->db->insert('bid',$data);
					if($sql)	
					{
						$config['protocol']='smtp';
						$config['smtp_host']='smtp.gmail.com';
						$config['smtp_user']='findexpert15699@gmail.com';
						$config['smtp_pass']='find@2019';
						$config['smtp_port']=465;
						$config['smtp_crypto']='ssl';
						$config['newline']="\r\n";
						$config['mailtype']="html";
						$this->email->initialize($config);
						$this->email->from('findexpert15699@gmail.com','Its just Demo');
						$f=1;
						$this->email->subject('Test');
						$site_url = site_url('worker/manage_project/view_worker/'.$this->session->userdata('worker_id'));
						$random='<a href="'.$site_url.'">Show Worker Profile</a>';
						$this->email->message($random);
						$to_email=$this->session->userdata('client_email');
						$this->email->to($to_email);
						$this->email->send();
						
						/*notification*/
						$insert_id=$this->db->insert_id();
						$sql=$this->db->get_where('project',array('project_id'=>$project_id));
						$r=$sql->row_array();
						
						$dataArr=array(
							'n_txt'=>'Worker has bidded',
							'bid_id'=>$insert_id,
							'client_id'=>$r['client_id']
						);


						$this->db->insert('notification',$dataArr);
						/*end*/

							$this->session->set_flashdata('success','Successfully bid accepted');	
							//redirect('worker/manage_project/bid_accept');	
						$_POST=array();
					}
				}
		}	
		$this->load->view('worker/bid_form');
	}
	function view_worker($id=0)
	{
		$qry=$this->db->get_where('worker',array('worker_id'=>$id));
		$data['records']=$qry->row_array();
		
		$this->load->view('worker/worker_details',$data);
	}

	function view_details($id=0)
	{
		$data=array();
		$qry=$this->db->get_where('project',array('project_id'=>$id));
		$res=$qry->row_array();
		$data['record']=$res;

		$sql=$this->db->get_where('client',array('client_id'=>$res['client_id']));
		$cname=$sql->row_array();

		$data['client_name']=$cname;
		
		$sql=$this->db->get_where('bid',array('project_id'=>$id,'worker_id'=>$this->session->userdata('worker_id')));
		$res=$sql->num_rows();
		$data['nrows']=$res;
			
		
		$this->load->view('worker/project_more_details.php',$data);
	}
	function viewdata($segment=0)
	{
		$data=array();

		$limit=3;

		$qry=$this->db->get_where('project',array('project.status'=>1));
		$total=$qry->num_rows();

		$config['per_page']=$limit;
		$config['total_rows']=$total;
		$config['base_url']=site_url('worker/manage_project/viewdata');
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
		$this->db->order_by("creation_time","desc");
		$this->db->join('category','category.cat_id=project.cat_id');
		$this->db->where('client_accept',0);

		$sql=$this->db->get_where('project',array('project.status'=>1));
		$res=$sql->result_array();
		$data['records']=$res;

		

		$qry=$this->db->get('skill');
		$data['skills']=$qry->result_array();

		$this->load->view('worker/project_details',$data);
	}
	function fetch()
	{
		$output = '';
		$query = '';
		$this->load->model('worker/search_mdl');
				  $f=0;
				  if($this->input->post('query'))
				  {
				   $query = $this->input->post('query');
				   //echo $query;
				  }
				  $data = $this->search_mdl->fetch_data($query);
				
				  if($data->num_rows() > 0)
				  {
					   foreach($data->result() as $row)
					   {				  
	                      $f=1;		
	                      $rs['records']=$data->result_array();		 
	                   }
				  }
				  else
				  {	
				  	$f=0;			 
				  	//echo 'not found';
				  }
				  if($f==1)
				  {
				  		$this->load->view('worker/search_project',$rs);
				  }else
				  {
				  	echo '<br><div class="text-center" ><b style="color:red;">Not found</b></div>';
				  }
				  
	}	
     function viewbid()
     {
     	
     	$id=$this->session->userdata('worker_id');

     	/*$this->db->join('project','project.project_id=bid.project_id');
     	$this->db->join('worker','worker.worker_id=bid.worker_id');
     	$sql=$this->db->get_where('bid',array('bid.worker_id'=>$id));
     		
		$res=$sql->result_array();		
		$data['records']=$res;
		*/

			$this->db->select('bid.*,worker.worker_name,project.project_title');
			$this->db->join('project','bid.project_id=project.project_id');
			//$this->db->join('client','project.client_id,client.client_id');
			$this->db->join('worker','worker.worker_id=bid.worker_id');
			//$this->db->order_by('bid.status', '1,2,0');
			$this->db->where('worker.worker_id',$id);
			$qry=$this->db->get('bid');
			$result=$qry->result_array();
			$data['bids']=$result;

     	$this->load->view('worker/bid_details',$data);
     }

		function worker_accept($id=0,$status=0)
		{
				if($status==1)
				{
					$this->db->where('bid_id',$id);
					$qry=$this->db->get('bid');
					$res=$qry->row_array();
					
					$this->db->where('project_id',$res['project_id']);
					$q=$this->db->get('project');
					$r=$q->row_array();

					$saveArr=array(
						'bid_id'=>$id,
						'project_id'=>$res['project_id'],
						'client_id'=>$r['client_id'],
						'worker_id'=>$res['worker_id']
					);
					$this->db->insert('project_assignment',$saveArr);

					$this->db->where('project_id',$res['project_id']);
					$this->db->update('project',array('project.client_accept'=>1));
				
					/*notification*/
					//$insert_id=$this->db->insert_id();
						$sql=$this->db->get_where('project',array('project_id'=>$res['project_id']));
						$r=$sql->row_array();
						
						$dataArr=array(
							'n_txt'=>'Worker Approve',
							'bid_id'=>$insert_id,
							'client_id'=>$r['client_id'],
							'worker_approve'=>$status,
							'project_id'=>$r['project_id']
						);


						$this->db->insert('notification',$dataArr);
						/*notification*/
				}

				$this->db->where('bid_id',$id);
				$this->db->update('bid',array('worker_accept'=>$status));
			
			//echo $this->db->last_query();die;
			redirect('worker/manage_project/viewbid/'.$this->session->userdata('worker_id'));
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
		redirect('worker/manage_project/viewdata');	
 
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
			$this->form_validation->set_rules('min_budget','Minimum Budget','required|numeric');
			$this->form_validation->set_rules('max_budget','Maximum Budget','required|numeric|callback_max_check');
			$this->form_validation->set_rules('description','Project Description','required');
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
						$min_budget=$this->input->post('min_budget');
						$max_budget=$this->input->post('max_budget');
						$project_desc=$this->input->post('description');
						$time_duration=$this->input->post('time_duration');
						$skillArr=$this->input->post('required_skills');
						$skills=implode("|",$skillArr);
						$worker_id=$this->session->userdata('worker_id');
						$currDate=date("Y-m-d");
						
						$bid_close= date('Y-m-d',strtotime($currDate.' +'.$time_duration));

						$saveArr=array(
							'project_title'=>$project_title,
							'min_budget'=>$min_budget,
							'max_budget'=>$max_budget,
							'description'=>$project_desc,
							'time_duration'=>$time_duration,
							'required_skills'=>$skills,
							'bid_close'=>$bid_close,
							'worker_id'=>$worker_id
						);
						
						$this->db->where('project_id',$id);
						$sql=$this->db->update('project',$saveArr); 
					if($sql)	
					{
						$this->session->set_flashdata('success','Successfully updated');
					}
						redirect('worker/manage_project/viewdata');
					}	
				}
		}			
		//echo '<pre>';print_r($data);die;
		$this->load->view('worker/project_form',$data);
	}	
}
?>