<?php 

class login extends CI_Controller
{
	function register()
	{
		//$this->load->view('client/authentication-register');
		$data = array();
		if($this->input->post())
		{
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[admin.email]');
			$this->form_validation->set_rules('password','Password','required|min_length[6]');
		     $this->form_validation->set_rules('confirm_password','Confirm Password','required|min_length[6]|matches[password]');
           //$this->form_validation->set_error_delimiters('<div>', '</div>');
           if($this->form_validation->run()==FALSE)
           {
                 //echo validation_errors();
           		//echo "ss";die;
           }
           else
           {
				$name=$this->input->post('name');
				$email=$this->input->post('email');
				$password=$this->input->post('password');
				$data=array(
					'name'=>$name,
					'email'=>$email,
					'password'=>md5($password),
					'image_path'=>'1.jpg'
				);
					$this->session->set_userdata('user_img',$data['image_path']);
					$sql=$this->db->insert('admin',$data);
					//echo $sql; die;
					if($sql)	
					{
						$this->session->set_flashdata('success','Register Successfully');
						redirect('admin/login/index');	
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
		$this->load->view('admin/authentication_register',$data);	
	}
	function index()
	{
		if($this->session->userdata('user_id'))
		{
			redirect('admin/home/index'); 
		}
		if($this->input->get())
		{
			$name=$this->input->get('name');
			$password=$this->input->get('password');

			$this->db->where(array('name'=>$name,'password'=>md5($password)));
			$qry=$this->db->get('admin');
			if($qry->num_rows()==1)
			{
				$row=$qry->row_array();
				$this->session->set_userdata('user_id',$row['id']);
				$this->session->set_userdata('user_name',$row['name']);
				$this->session->set_userdata('user_email',$row['email']);
				
				$this->session->set_userdata('user_img',$row['image_path']);
				redirect('admin/home/index');

			}else{
				$this->session->set_flashdata('invalid','Wrong Username and Password');
				redirect('admin/login');		
			}
		}
		$this->load->view('admin/authentication-login');
	}
	function forget_pass()
	{
		if($this->session->userdata('user_id'))
		{
			redirect('admin/home/index');
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
		$this->email->from('findexpert15699@gmail.com','Its just Demo');
		$f=1;
		$this->email->subject('Test');
		$random=rand(100000,999999);
		$this->email->message('Your new password:'.$random);
		
		if($this->input->post('email'))
		{
			$to_email=$this->input->post('email');
			$this->email->to($to_email);
			$qry=$this->db->get('admin');
			$res=$qry->result_array();
			foreach($res as $row)
			{
				if($row['email']==$to_email)
				{
					$data=array('password'=>md5($random));
					$this->db->where('email',$to_email);
					$this->db->update('admin',$data);
					if($this->email->send())
					{
						$this->session->set_flashdata('success','Changed Password Successfully');
						redirect('admin/login');
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
				redirect('admin/login');		
			}
		}
		redirect('admin/login');	
		//$this->load->view('admin/authentication_login',$data);
	}
	function logout()
	{
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_img');
		$this->load->view('admin/authentication-login');
	}
}

?>
