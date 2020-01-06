<?php		
	class manage_bid extends CI_Controller 
	{
		function index()
		{

		}

		function view_details($id=0)
		{
        	$data['project_id']=$id;
        	$this->db->join('client','client.client_id=project.client_id'); 
			$sql=$this->db->get_where('project',array('project.project_id'=>$id));
			$rs=$sql->row_array();
			$data['records']=$rs;
			$this->load->model('visitor/getcat_mdl');
			$data['cat']=$this->getcat_mdl->getcat();
						
		//$sql=$this->db->get_where('client',array('client_id'=>$res['client_id']));
		//$cname=$sql->row_array();
		
		//$data['client_name']=$cname;

		     if($this->session->userdata('worker_id'))
		     {
		     	$sql=$this->db->get_where('bid',array('project_id'=>$id,'worker_id'=>$this->session->userdata('worker_id')));
		     	$res=$sql->result_array();
		     	$data['rows']=$res;
		       $this->load->view('visitor/project_more_details.php',$data);

	          }
	          else
	          {
	          	redirect('visitor/home/login_form'); 
	          }
		}
		function quick_bid($id=0)
		{
			$data['project_id']=$id;
			$this->db->join('client','client.client_id=project.client_id');
			$sql=$this->db->get_where('project',array('project.project_id'=>$id));
			$rs=$sql->row_array();
			$data['record']=$rs;

			$this->load->model('visitor/getcat_mdl');
			$data['cat']=$this->getcat_mdl->getcat();
			
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
								'project_id'=>$id,
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
								
								$this->session->set_flashdata('success','Successfully bid accepted');	
								$_POST=array();

								$data['project_id']=$id;
								$this->db->join('client','client.client_id=project.client_id');
								$sql=$this->db->get_where('project',array('project.project_id'=>$id));
								$rs=$sql->row_array();
								$data['record']=$rs;

								$this->load->model('visitor/getcat_mdl');
								$data['cat']=$this->getcat_mdl->getcat();
								
							}
						}
					}

					$this->load->view('visitor/bid_form',$data);
				 
		}
		function show_bid($id=0)
		{ 
			$data['project_id']=$id;

			$sql=$this->db->get_where('project',array('project_id'=>$id));
			$rs=$sql->row_array();
			$data['record']=$rs;

			$qry1=$this->db->get_where('project',array('client_id'=>$this->session->userdata('client_id')));
			$rs=$qry1->result_array();
			$data['project']=$rs;
			
			$qry=$this->db->get_where('bid',array('project_id'=>$id));
			$result=$qry->result_array();
			$data['bid_status']=$result;

			$this->load->model('visitor/getcat_mdl');
			$data['cat']=$this->getcat_mdl->getcat();
			$this->db->select('bid.*,worker.worker_name');
			$this->db->join('worker','worker.worker_id=bid.worker_id');
			$this->db->order_by('bid.status', '1,2,0');
			$qry=$this->db->get_where('bid',array('project_id'=>$id));
			$result=$qry->result_array();
			$data['bids']=$result;
			$this->load->view('visitor/client_bid_details',$data);
		}

		function change_status($id=0,$status=0)
		{

			$this->db->where('bid_id',$id);
			$sql=$this->db->get('bid');
			$rs=$sql->row_array();
			if($status==1)
			{
				$this->db->where('project_id',$rs['project_id']);
				$this->db->update('bid',array('status'=>2));
			}
				$this->db->where('bid_id',$id);
				$this->db->update('bid',array('status'=>$status));
			//echo $this->db->last_query();die;
			redirect('visitor/manage_bid/show_bid/'.$rs['project_id']);
		}	
		function view_worker_bid($id=0)
		{
			$this->load->model('visitor/getcat_mdl');
			$data['cat']=$this->getcat_mdl->getcat();

			$this->db->select('bid.*,worker.worker_name,project.project_title,client.client_name,client.client_id');
			
			$this->db->join('project','bid.project_id=project.project_id');
			$this->db->join('client','client.client_id=project.client_id');
			$this->db->join('worker','worker.worker_id=bid.worker_id');
			$this->db->order_by('bid.status', '1,2,0');
			$this->db->where('worker.worker_id',$id);
			$qry=$this->db->get('bid');
			$result=$qry->result_array();
			$data['bids']=$result;

			//echo '<pre>';print_r($data);die;
			/*$this->db->join('worker','worker.worker_id=bid.worker_id');
			$sql=$this->db->get_where('bid',array('worker.worker_id'=>$id));
			$res=$sql->result_array();
			$data['record']=$res;*/
			$this->load->view('visitor/view_bid',$data);
		}
		function worker_accept($id=0,$status=0)
		{
				if($status==1)
				{
					$this->db->where('bid_id',$id);
					$qry=$this->db->get('bid');
					$res=$qry->row_array();
					
					//$this->db->where('project_id',$res['project_id']);
					$q=$this->db->get('client');
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
				
				}
				$this->db->where('bid_id',$id);
				$this->db->update('bid',array('worker_accept'=>$status));
			
			//echo $this->db->last_query();die;
			redirect('visitor/manage_bid/view_worker_bid/'.$this->session->userdata('worker_id'));
		}	
	}
?>