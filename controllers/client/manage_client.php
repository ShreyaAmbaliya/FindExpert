<?php
  
class manage_client extends CI_Controller
{
	function index()
	{
		$sql=$this->db->get('worker');
			$data['w_count']=$sql->num_rows();
			
			$this->db->where('client_id',$this->session->userdata('client_id'));
			$this->db->where('status',1);
			$sql=$this->db->get('project');
			$data['pa_count']=$sql->num_rows();

			$this->db->where('client_id',$this->session->userdata('client_id'));
			$this->db->where('status',0);
			$sql=$this->db->get('project');
			$data['pending_count']=$sql->num_rows();

			$this->db->where('client_id',$this->session->userdata('client_id'));
			$this->db->where('status',2);
			$sql=$this->db->get('project');
			$data['disapproved_count']=$sql->num_rows();
		$this->load->view('client/dashboard',$data);
	}
	
	function show_profile($id=0)
	{
		$data=array();
		$qry=$this->db->get_where('client',array('client_id'=>$id));
		$res=$qry->row_array();
		//$this->db->join('country','country.country_id=state.country_id');
		
		$data['record']=$res;

		
		$sql=$this->db->get_where('state',array('country_id'=>$res['country_id']));
		$data['state']=$sql->result_array();

		$sql=$this->db->get_where('city',array('state_id'=>$res['state_id']));
		$data['city']=$sql->result_array();
        $country=$this->db->get('country')->result_array();
			
			$city=$this->db->get('city')->result_array();
			$data['country']=$country;
			
			//print_r($data['city']);die;
			
			
			$this->load->view('client/client_show_profile',$data);
			
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
	function change_password($id=0)
	{
		$data=array();
		$this->db->where('client_id',$id);
		$qry=$this->db->get('client');
		$res=$qry->row_array();
		$pass=$res['client_password'];
		$this->load->model('client/login_mdl');
		
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
					$res['client_password']=$this->input->post('cpassword');
					
					$this->db->where('client_id',$id);
					$sql=$this->db->update('client',$res);
					if($sql)	
					{
						$this->session->set_flashdata('success','Change Password Successfully');
						redirect('client/manage_client');	
					}
					
				}
				else
				{
					$data['err']=" Doesn't Match Password";						
					$this->load->view('client/change_password',$data);
					$this->load->view('client/change_password');
				
		        }
	    }
	       $this->load->view('client/change_password');
	}

	function edit_profile($id=0)
	{
		$data=array();
		$qry=$this->db->get_where('client',array('client_id'=>$id));
		$res=$qry->row_array();
		$data['record']=$res;
		
		$sql=$this->db->get_where('state',array('country_id'=>$res['country_id']));
		$data['state']=$sql->result_array();

		$sql=$this->db->get_where('city',array('state_id'=>$res['state_id']));
		$data['city']=$sql->result_array();
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
			//$this->form_validation->set_rules('skill_name','Skill Name','required|regex_match[/^[A-Z a-z]+$/]');
			if($this->form_validation->run()==FALSE)
        	   {
					
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
							if($res['image_path']!='1.jpg')
							{
								unlink('upload/client/'.$res['image_path']);
							}

						$file_data = $this->upload->data();
						$saveArr['image_path'] = $file_data['file_name'];
						$this->db->where('client_id',$id);
						$this->db->update('client',$saveArr);
						$this->session->set_userdata('client_img',$saveArr['image_path']);
						redirect('client/manage_client');
					}
					else
					{
						echo $this->upload->display_errors();
					}						
				}	

			    $this->db->where('client_id',$id);
				$this->db->update('client',$saveArr);
				redirect('client/manage_client');
			}
		}
			$country=$this->db->get('country')->result_array();
			
			$city=$this->db->get('city')->result_array();
			$data['country']=$country;

			$this->load->view('client/client_profile',$data);			
	}		
}
