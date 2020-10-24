<?php 

class login extends CI_Controller
{
	function register()
	{
		//$this->load->view('client/authentication-register');
		$data = array();
		if($this->input->post())
		{
			$this->form_validation->set_rules('client_name','Name','required');
			$this->form_validation->set_rules('client_email','Email','required|valid_email|is_unique[client.client_email]');
			$this->form_validation->set_rules('password','Password','required|min_length[6]');
			$this->form_validation->set_rules('mobile_no','Mobile_no','required|regex_match[/^[0-9]{10}$/]');

			$this->form_validation->set_rules('confirm_password','Confirm Password','required|min_length[6]|matches[password]');
           //$this->form_validation->set_error_delimiters('<div>', '</div>');
           if($this->form_validation->run()==FALSE)
           {
                 //echo validation_errors();
           		//echo "ss";die;
           }
           else
           {
				$name=$this->input->post('client_name');
				$email=$this->input->post('client_email');
				$password=$this->input->post('password');
				$mobile_no=$this->input->post('mobile_no');

				$data=array(
					'client_name'=>$name,
					'client_email'=>$email,
					'mobileno'=>$mobile_no,
					'client_password'=>md5($password),
					'image_path'=>'1.jpg'
				);
					$this->session->set_userdata('client_img',$data['image_path']);
					$sql=$this->db->insert('client',$data);
					//echo $sql; die;
					if($sql)	
					{
						$this->session->set_flashdata('success','Register Successfully');
						redirect('client/login');	
					}
					/*else
					{
						$this->session->set_flashdata('success','Error');
						//$data['msg']="Success";
						//$_POST = array();
						//$this->load->view('admin/admin_form',$data);
						redirect('admin/manage_admin/insertdata');	
					}*/
			}
		}	
		$this->load->view('client/authentication-register',$data);	
	}
	function index()
	{
		if($this->session->userdata('client_id'))
		{
			redirect('client/home/index'); 
		}
		if($this->input->get())
		{
			$email=$this->input->get('email');
			$password=$this->input->get('password');
			$this->db->where(array('client_email'=>$email,'client_password'=>md5($password)));
			$qry=$this->db->get('client');
			if($qry->num_rows()==1)
			{
				$row=$qry->row_array();
				
				$this->session->set_userdata('client_id',$row['client_id']);
				$this->session->set_userdata('client_name',$row['client_name']);
				$this->session->set_userdata('client_email',$row['client_email']);
				
				$this->session->set_userdata('client_img',$row['image_path']);
				redirect('client/home/index');

			}else{
				$this->session->set_flashdata('invalid','Wrong Email and Password');
				redirect('client/login');	
			}
		}
		$this->load->view('client/authentication-login');
	}
	function logout()
	{
		$this->session->unset_userdata('client_id');
		$this->session->unset_userdata('client_img');
		$this->load->view('client/authentication-login');
	}


	function forget_password()
	{
		if($this->session->userdata('client_id'))
		{
			redirect('client/home/index');
		}
		//echo $to_email;die;
		$config['protocol']='smtp';
		$config['smtp_host']='smtp.gmail.com';
		$config['smtp_user']='findexpert15699@gmail.com';
		$config['smtp_pass']='password';
		$config['smtp_port']=465;
		$config['smtp_crypto']='ssl';
		$config['newline']="\r\n";
		//$config['mailtype']="html";
		$this->email->initialize($config);
		$this->email->from('findexpert15699@gmail.com','Changed Password');
		$f=1;
		$this->email->subject('Test');
		$random=rand(100000,999999);
		$this->email->message('Your new password:'.$random);
		
		
		if($this->input->post('email'))
		{
			$to_email=$this->input->post('email');
			$this->email->to($to_email);
			$qry=$this->db->get('client');
			$res=$qry->result_array();
			foreach($res as $row)
			{
				if($row['client_email']==$to_email)
				{
					$data=array('client_password'=>md5($random));
					$this->db->where('client_email',$to_email);
					$this->db->update('client',$data);
					if($this->email->send())
					{
						$this->session->set_flashdata('success','Changed Password Successfully');
						redirect('client/login');
					}		
				}
				else
				{
					$f=0;
				}
			}
			if($f==0)
			{
				$this->session->set_flashdata('invalid','Wrong email');
				redirect('client/login');		
			}
		}
		redirect('client/login');
	}
}
?>
