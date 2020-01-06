<?php
		
class manage_account extends CI_Controller
{
	function index()
	{
		$qry=$this->db->get('category');
		$res=$qry->result_array();
		$data['cat']=$res;	

		if($this->session->userdata('worker_id'))
		{
			$id=$this->session->userdata('worker_id');

			$this->db->join('city','city.city_id=worker.city_id');
			$this->db->join('state','state.state_id=worker.state_id');
			$this->db->join('country','country.country_id=worker.country_id');
			$sql=$this->db->get_where('worker',array('worker_id'=>$id));
			$rs=$sql->row_array();
			$data['record']=$rs;

		}
		else if($this->session->userdata('client_id'))
		{
			$id=$this->session->userdata('client_id');

			$this->db->join('city','city.city_id=client.city_id');
			$this->db->join('state','state.state_id=client.state_id');
			$this->db->join('country','country.country_id=client.country_id');
			$sql=$this->db->get_where('client',array('client_id'=>$id));
			$rs=$sql->row_array();
			$data['record']=$rs;
		}
		$this->load->view('visitor/user_profile',$data);
	}

	function ajax_state()
	{  
		$country_id=$this->input->post('country');
		$state = $this->db->get_where('state',array('country_id'=>$country_id))->result_array();
		echo '<option value="">----State----</option>';
		
		foreach($state as $row){
		echo '<option value="'.$row['state_id'].'">'.$row['state_name'].'</option>';}
	}
	function ajax_city()
	{
		$state_id=$this->input->post('state');
		$city = $this->db->get_where('city',array('state_id'=>$state_id))->result_array();
		echo '<option value="">----City----</option>';
		foreach($city as $row){
		echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>';}
	}
	function edit_profile()
	{ 
		$qry=$this->db->get('category');
		$res=$qry->result_array();
		$data['cat']=$res;
		
		if($this->session->userdata('worker_id'))
		{
			$qry=$this->db->get_where('worker',array('worker_id'=>$this->session->userdata('worker_id')));
			$res=$qry->row_array();
			$data['record']=$res;
			$data['required_skills']=explode('|',$res['skills']);

			$sql=$this->db->get_where('state',array('country_id'=>$res['country_id']));
			$data['state']=$sql->result_array();

			$sql=$this->db->get_where('city',array('state_id'=>$res['state_id']));
			$data['city']=$sql->result_array();
			$country=$this->db->get('country')->result_array();
			
			$city=$this->db->get('city')->result_array();
			$data['country']=$country;
		
			$qry=$this->db->get('skill');
			$data['skills']=$qry->result_array();	
			if($this->input->post())
			{
				
				//echo '<pre>';print_r($_POST);die;
				$this->form_validation->set_rules('worker_name','Worker Name','required');
				$this->form_validation->set_rules('worker_email','Worker Email','required');
				$this->form_validation->set_rules('gender','Gender','required');
				$this->form_validation->set_rules('mobileno','Mobile Number','required');
				//$this->form_validation->set_rules('company','Company','required');
				$this->form_validation->set_rules('profession','Profession','required');
				$this->form_validation->set_rules('country_name','Country','required');
				$this->form_validation->set_rules('state_name','State','required');
				$this->form_validation->set_rules('city_name','City','required');
				//$this->form_validation->set_rules('required_skills','Skill','required');
			//$this->form_validation->set_rules('skill_name','Skill Name','required|regex_match[/^[A-Z a-z]+$/]');
			if($this->form_validation->run()==FALSE)
        	   {

        	   	 $data['required_skills'] = $this->input->post('required_skills');

                 //echo validation_errors();
        	   }
        	   else
        	   {
				$name=$this->input->post('worker_name');
				$email=$this->input->post('worker_email');
				//$password=$this->input->post('password');
				$profession=$this->input->post('profession');
				$skillArr=$this->input->post('required_skills');
				$skills=implode("|",$skillArr);
				//echo $skills;die;
				//echo '<pre>';print_r($skills);die;
				$gender=$this->input->post('gender'); 
				$mno=$this->input->post('mobileno');
				$country=$this->input->post('country_name');	
				$about=$this->input->post('about_me');			
				$state=$this->input->post('state_name');
				$city=$this->input->post('city_name');
				$saveArr=array(
					'worker_name'=>$name,
					'worker_email'=>$email,
					'profession'=>$profession,
					'gender'=>$gender,
					'mobileno'=>$mno,	
					'country_id'=>$country, 
					'state_id'=>$state,
					'city_id'=>$city,
					'about'=>$about,
					'skills'=>$skills
				);
				if(!empty($_FILES['img']['name']))
				{
					$config['upload_path'] = "upload/worker/";
					$config['allowed_types'] = "jpg|png|jpeg|gif";
					$this->load->library('upload', $config);
					if($this->upload->do_upload('img')){
					unlink('upload/worker/'.$res['image_path']);
					$file_data = $this->upload->data();
					$saveArr['image_path'] = $file_data['file_name'];
					$this->session->set_userdata('worker_name',$name);

					$this->db->where('worker_id',$this->session->userdata('worker_id'));
					$this->db->update('worker',$saveArr);
					$this->session->set_userdata('worker_img',$saveArr['image_path']);
					redirect('visitor/manage_account');
				//redirect('worker/manage_worker');
				}
				else
				{
					echo $this->upload->display_errors();
				}						
			}	
			    $this->db->where('worker_id',$this->session->userdata('worker_id'));
				$this->db->update('worker',$saveArr);
				redirect('visitor/manage_account');
				//redirect('visitor');
		}
	}
			$this->load->view('visitor/worker_profile',$data);
		}
		else if($this->session->userdata('client_id'))
		{
			//$this->load->view('visitor/client_profile',$data);
			{
				$id=$this->session->userdata('client_id');

		$qry=$this->db->get_where('client',array('client_id'=>$id));
		$res=$qry->row_array();
		$data['record']=$res;
		
		$sql=$this->db->get_where('state',array('country_id'=>$res['country_id']));
		$data['state']=$sql->result_array();

		$sql=$this->db->get_where('city',array('state_id'=>$res['state_id']));
		$data['city']=$sql->result_array();
		
		$country=$this->db->get('country')->result_array();
			
			$city=$this->db->get('city')->result_array();
			$data['country']=$country;
			
			if($this->input->post())
			{
				
			    $this->form_validation->set_rules('client_name','Client Name','required');
				$this->form_validation->set_rules('client_email','Client Email','required');
				$this->form_validation->set_rules('gender','Gender','required');
				$this->form_validation->set_rules('mobileno','Mobile Number','required');
				$this->form_validation->set_rules('company','Company','required');
				$this->form_validation->set_rules('dob','dob','required');
				$this->form_validation->set_rules('country_name','Country','required');
				$this->form_validation->set_rules('state_name','State','required');
				$this->form_validation->set_rules('city_name','City','required');
			
			if($this->form_validation->run()==FALSE)
        	   {

        	   	// $data['required_skills'] = $this->input->post('required_skills');

                 //echo validation_errors();
        	   }
        	   else
        	   {
				$name=$this->input->post('client_name');
					$email=$this->input->post('client_email');
					//$password=$this->input->post('password');
					$dob=$this->input->post('dob');
					$company=$this->input->post('company');
					$gender=$this->input->post('gender');
					$mno=$this->input->post('mobileno');
					$country=$this->input->post('country_name');	
					$about=$this->input->post('about_me');			
					$state=$this->input->post('state_name');
					$city=$this->input->post('city_name');
					$saveArr=array(
						'client_name'=>$name,
						'client_email'=>$email,
						'dob'=>$dob,
						'gender'=>$gender,
						'mobileno'=>$mno,
						'company'=>$company,
						'country_id'=>$country,
						'state_id'=>$state,
						'city_id'=>$city,
						'about'=>$about
					);
				
				if(!empty($_FILES['img']['name']))
				{
					$config['upload_path'] = "upload/client/";
						$config['allowed_types'] = "jpg|png|jpeg|gif";
						$this->load->library('upload', $config);
						if($this->upload->do_upload('img')){
						unlink('upload/client/'.$res['image_path']);
						$file_data = $this->upload->data();
						$saveArr['image_path'] = $file_data['file_name'];
						$this->db->where('client_id',$id);
						$this->db->update('client',$saveArr);
						$this->session->set_userdata('client_img',$saveArr['image_path']);
						redirect('visitor/manage_account');
					//redirect('client/manage_client');
					}
					else
					{
						echo $this->upload->display_errors();
					}						
			}	
			    $this->db->where('client_id',$id);
				$this->db->update('client',$saveArr);
					redirect('visitor/manage_account');
		}
	}
			$this->load->view('visitor/client_profile',$data);
		}
		}
	}
	function change_password($id=0)
	{
		$this->load->model('visitor/getcat_mdl');
		$data['cat']=$this->getcat_mdl->getcat();

		if($this->input->post())
		{

			//echo '<pre>';print_r($this->input->post());die;
			//echo $this->session->userdata('worker_id');die;
			if($this->session->userdata('worker_id'))
			{
				$id=$this->session->userdata('worker_id');
				$this->db->where('worker_id',$id);
				$qry=$this->db->get('worker');
				$res=$qry->row_array();
				$pass=$res['worker_password'];
				$this->load->model('visitor/login_mdl');
				
				$this->form_validation->set_rules('password','Password','required');
				$this->form_validation->set_rules('npassword','New Password','required|min_length[6]');
				$this->form_validation->set_rules('cpassword','Confirm Password','required|min_length[6]|matches[npassword]');
		        if($this->form_validation->run()==FALSE)
		        {
		        }
		        else
		        {

			    	if($this->login_mdl->currect_password($pass))
					{
						$res['worker_password']=$this->input->post('cpassword');
						
						$this->db->where('worker_id',$id);
						$sql=$this->db->update('worker',$res);

						if($sql)	
						{
							$this->session->set_flashdata('success','Change Password Successfully');
							//$this->load->view('visitor/change_password',$data);
						}			
					}
					else
					{
						$data['err']=" Doesn't Match Password";						
						//$this->load->view('visitor/change_password',$data);
				    }
			    }
				//$this->load->view('visitor/change_password',$data);
			}
			else if($this->session->userdata('client_id'))
			{

				$id = $this->session->userdata('client_id');
				$this->db->where('client_id',$id);
				$qry=$this->db->get('client');
				$res=$qry->row_array();
				$pass=$res['client_password'];
				//echo $pass;die;
				$this->load->model('visitor/login_mdl');
				
				$this->form_validation->set_rules('password','Password','required');
				$this->form_validation->set_rules('npassword','New Password','required|min_length[6]');
				$this->form_validation->set_rules('cpassword','Confirm Password','required|min_length[6]|matches[npassword]');
		        if($this->form_validation->run()==FALSE)
		        {
		        }
		        else
		        {
		        	
			    	if($this->login_mdl->currect_password($pass))
					{

							$res2['client_password']=$this->input->post('cpassword');
							
							$this->db->where('client_id',$id);
							$sql=$this->db->update('client',$res2);
							if($sql)	
							{
								$this->session->set_flashdata('success','Change Password Successfully');
								//$this->load->view('visitor/change_password',$data);
							}			
					}
					else
					{
						
						$data['err']=" Doesn't Match Password";						
						//$this->load->view('visitor/change_password',$data);
				    }
			    }
				
			}

		}
		$this->load->view('visitor/change_password',$data);
	}

}
?>

