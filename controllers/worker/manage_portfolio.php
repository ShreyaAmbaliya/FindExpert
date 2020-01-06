<?php
	
	class manage_portfolio extends CI_Controller
	{
		function view_portfolio()
		{
			$this->db->where('worker_id',$this->session->userdata('worker_id'));
			$sql=$this->db->get('portfolio');
			$rows=$sql->result_array();
			$data['records']=$rows;
			$this->load->view('worker/portfolio_details',$data);
		}
		function view_education()
		{
			$this->db->where('worker_id',$this->session->userdata('worker_id'));
			$sql=$this->db->get('education');
			$rows=$sql->result_array();
			$data['records']=$rows;
			$this->load->view('worker/education_details',$data);
		}
		function view_experience()
		{
			$this->db->where('worker_id',$this->session->userdata('worker_id'));
			$sql=$this->db->get('experience');
			$rows=$sql->result_array();
			$data['records']=$rows;
			$this->load->view('worker/experience_details',$data);
		}
		function delete_portfolio($id=0)
		{
			$this->db->where('portfolio_id',$id);
			$qry=$this->db->get('portfolio');
			$rows=$qry->row_array();
			unlink('upload/worker/portfolio/'.$rows['image_path']);

			$this->db->where('portfolio_id',$id);
			$this->db->delete('portfolio');
			redirect('worker/manage_portfolio/view_portfolio');
		}
		function delete_education($id=0)
		{
			
			$this->db->where('education_id',$id);
			$this->db->delete('education');
			redirect('worker/manage_portfolio/view_education');
		}
		function delete_experience($id=0)
		{
			
			$this->db->where('experience_id',$id);
			$this->db->delete('experience');
			redirect('worker/manage_portfolio/view_experience');
		}
		function update_portfolio($id=0)
		{
			$data=array();
			$qry=$this->db->get_where('portfolio',array('portfolio_id'=>$id));
			$rs=$qry->num_rows();

			$res=$qry->row_array();
				$data['record']=$res;
				if($this->input->post())
				{
					$this->form_validation->set_rules('pr_description','Description','required');
					$this->form_validation->set_rules('pr_link','link','required|callback_valid_url_format');
					//$this->form_validation->set_rules('img','image','required');
					if($this->form_validation->run()==FALSE)
			        {
			            //echo validation_errors();
			        }
			        else
			        {	
						$pr_desc=$this->input->post('pr_description');
						$link=$this->input->post('pr_link');
						$wid=$this->session->userdata('worker_id');

						$saveArr=array(
							'pr_description'=>$pr_desc,
							'pr_link'=>$link,
							'worker_id'=>$wid
						);
							$config['upload_path']="upload/worker/portfolio";
							$config['allowed_types']="jpg|png|jpeg|gif";

							$this->load->library('upload',$config);
							if(!empty($_FILES['img']['name']))
							{
								$config['upload_path'] = "upload/worker/portfolio";
								$config['allowed_types'] = "jpg|png|jpeg|gif";
								$this->load->library('upload', $config);
								if($this->upload->do_upload('img'))
								{
									unlink('upload/worker/portfolio/'.$res['image_path']);
									$file_data = $this->upload->data();
									$saveArr['image_path'] = $file_data['file_name'];
									
									$this->db->where('portfolio_id',$id);
									$sql=$this->db->update('portfolio',$saveArr);
									if($sql)	
									{
										$this->session->set_flashdata('success','Successfully updated');
										redirect('worker/manage_portfolio/view_portfolio');
									}
								}
								else
								{
									echo $this->upload->display_errors();
								}
							}	
					        $this->db->where('portfolio_id',$id);
							$sql=$this->db->update('portfolio',$saveArr);
								if($sql)	
								{
									$this->session->set_flashdata('success','Successfully updated');
									redirect('worker/manage_portfolio/view_portfolio');
								}
						}
				}

		$this->load->view('worker/portfolio_form',$data);
		}
		function update_experience($id=0)
		{
			$data=array();
			$qry=$this->db->get_where('experience',array('experience_id'=>$id));
			$rs=$qry->num_rows();
			$res=$qry->row_array();
				$data['record']=$res;
				if($this->input->post())
				{
				    $this->form_validation->set_rules('position','Position','required');
				$this->form_validation->set_rules('company','Company','required');
				//$this->form_validation->set_rules('start_year','Start Year','required');
				$this->form_validation->set_rules('year','Year','required');

	                if($this->form_validation->run()==FALSE)
        	   		{
        	      	}
        	      	else
        	      	{

						if($this->input->post())
						{
					$position=$this->input->post('position');
        	   		$company=$this->input->post('company');
        	   		$summary=$this->input->post('summary');
        	   		$year=$this->input->post('year');
        	   		$wid=$this->session->userdata('worker_id');
        	   		$saveArr=array(
        	   			'position'=>$position,
        	   			'company'=>$company,
        	   			'summary'=>$summary,
        	   			'year'=>$year,
        	   			'worker_id'=>$wid
        	   		);

        	   		    $this->db->where('experience_id',$id);
						$sql=$this->db->update('experience',$saveArr);
						if($sql)	
							{
								$this->session->set_flashdata('success','Successfully updated');
								redirect('worker/manage_portfolio/view_experience');
							}
						}
        	      	}
				}
				$this->load->view('worker/experience_form',$data);
		}
		function add_experience()
		{
				if($this->input->post())
				{
				$this->form_validation->set_rules('position','Position','required');
				$this->form_validation->set_rules('company','Company','required');
				//$this->form_validation->set_rules('start_year','Start Year','required');
				$this->form_validation->set_rules('year','Year','required');

				if($this->form_validation->run()==FALSE)
	        	   {
	        	   	
	                 
	        	   }
	         	 else
        	  	 {
        	   		$position=$this->input->post('position');
        	   		$company=$this->input->post('company');
        	   		$summary=$this->input->post('summary');
        	   		$year=$this->input->post('year');
        	   		$wid=$this->session->userdata('worker_id');
        	   		$saveArr=array(
        	   			'position'=>$position,
        	   			'company'=>$company,
        	   			'summary'=>$summary,
        	   			'year'=>$year,
        	   			'worker_id'=>$wid
        	   		);
        	   		$sql=$this->db->insert('experience',$saveArr);
        	   		if($sql)	
							{
						$this->session->set_flashdata('success','Successfully Inserted');
						redirect('worker/manage_portfolio/view_experience');
							}
					
        	   }
			}

			
			$this->load->view('worker/experience_form');
		}
		function update_education($id=0)
		{
			$data=array();
			$qry=$this->db->get_where('education',array('education_id'=>$id));
			$rs=$qry->num_rows();
			
					$res=$qry->row_array();
					$data['record']=$res;
					if($this->input->post())
					{
	        	   		$degree=$this->input->post('degree');
	        	   		$university=$this->input->post('university');
	        	   		$start_year=$this->input->post('start_year');
	        	   		$end_year=$this->input->post('end_year');
	        	   		$wid=$this->session->userdata('worker_id');
	        	   		$saveArr=array(
	        	   			'degree'=>$degree,
	        	   			'university'=>$university,
	        	   			'start_year'=>$start_year,
	        	   			'end_year'=>$end_year,
	        	   			'worker_id'=>$wid
	        	   		);
						$this->db->where('education_id',$id);
						$this->db->update('education',$saveArr);
					}
		$this->load->view('worker/education_form',$data);		
		}
		function add_education()
		{
				if($this->input->post())
				{
					$this->form_validation->set_rules('degree','Degree','required');
					$this->form_validation->set_rules('university','University','required');
					$this->form_validation->set_rules('start_year','Start Year','required');
					$this->form_validation->set_rules('end_year','End Year','required|callback_max_check');

				if($this->form_validation->run()==FALSE)
	        	   {
	                 //echo validation_errors();die;
	        	   }
	        	   else
	        	   {
	        	   		$degree=$this->input->post('degree');
	        	   		$university=$this->input->post('university');
	        	   		$start_year=$this->input->post('start_year');
	        	   		$end_year=$this->input->post('end_year');
	        	   		$wid=$this->session->userdata('worker_id');
	        	   		$saveArr=array(
	        	   			'degree'=>$degree,
	        	   			'university'=>$university,
	        	   			'start_year'=>$start_year,
	        	   			'end_year'=>$end_year,
	        	   			'worker_id'=>$wid
	        	   		);
	        	   		$this->db->insert('education',$saveArr);
		        	   }
					}
							
			$this->load->view('worker/education_form');
		}

		function max_check($start)
		{
			$start=$this->input->post('start_year');
			$end=$this->input->post('end_year');
				if($start>=$end)
				{
					$this->form_validation->set_message('max_check','Fill Proper<br>(Start year must be less than End year)');
					return FALSE;
				}else{
					return TRUE;
				} 
		}
		function add_portfolio()
		{
			if($this->input->post())
				{
					$this->form_validation->set_rules('pr_description','Description','required');
					$this->form_validation->set_rules('pr_link','link','required|callback_valid_url_format');
					//$this->form_validation->set_rules('img','image','required');
					if($this->form_validation->run()==FALSE)
			        {
			            //echo validation_errors();
			        }
			        else
			        {							
						$pr_desc=$this->input->post('pr_description');
						$link=$this->input->post('pr_link');
						$wid=$this->session->userdata('worker_id');

						$data=array(
							'pr_description'=>$pr_desc,
							'pr_link'=>$link,
							'worker_id'=>$wid
						);
							$config['upload_path']="upload/worker/portfolio";
							$config['allowed_types']="jpg|png|jpeg|gif";

							$this->load->library('upload',$config);

							if($this->upload->do_upload('img'))
							{
								$file_data=$this->upload->data();
								$data['image_path']=$file_data['file_name'];

								$sql=$this->db->insert('portfolio',$data);
								if($sql)	
								{
									$this->session->set_flashdata('success','Successfully Inserted');
									redirect('worker/manage_portfolio/view_portfolio');
								}
							}
							else
							{
								$data['img_err'] = $this->upload->display_errors(); 	
							}		
					}
				}
			$this->load->view('worker/portfolio_form');
		}		
		function valid_url_format($str){
        $pattern = "|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i";
        if (!preg_match($pattern, $str)){
            $this->form_validation->set_message('valid_url_format', 'The Link you entered is not correctly formatted.');
            return FALSE;
        }
 
        return TRUE;
    }    
	}

?>