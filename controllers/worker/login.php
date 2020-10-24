<?php 

class login extends CI_Controller
{
	function register()
	{
		//$this->load->view('worker/authentication-register');
		$data = array();
		if($this->input->post())
		{
			$this->form_validation->set_rules('worker_name','Name','required');
			$this->form_validation->set_rules('worker_email','Email','required|valid_email|is_unique[worker.worker_email]');
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
				$name=$this->input->post('worker_name');
				$email=$this->input->post('worker_email');
				$password=$this->input->post('password');
				$mobile_no=$this->input->post('mobile_no');

				/*sent email*/
						$config['protocol']='smtp';
						$config['smtp_host']='smtp.gmail.com';
						$config['smtp_user']='findexpert15699@gmail.com';
						$config['smtp_pass']='find@2019';
						$config['smtp_port']=465;
						$config['smtp_crypto']='ssl';
						$config['newline']="\r\n";
						//$config['mailtype']="html";
						$this->email->initialize($config);
						$this->email->from('findexpert15699@gmail.com','Verification Code');
						$f=1;
						$this->email->subject('Verification');
						$random=rand(100000,999999);
						$this->email->message('Your Verification Code:'.$random);
				/*end*/

				$data=array(
					'worker_name'=>$name,
					'worker_email'=>$email,
					'mobileno'=>$mobile_no,
					'worker_password'=>md5($password),
					'image_path'=>'1.jpg',
					'verification_code'=>md5($random)
				);
					$this->session->set_userdata('worker_img',$data['image_path']);
					$this->session->set_userdata('worker_email',$data['worker_email']);
					$sql=$this->db->insert('worker',$data);
					//echo $sql; die;
					if($sql)	
					{
						$this->session->set_flashdata('success','Register Successfully');
						$this->session->set_userdata('w_email',$email);

						
						$this->email->to($email);
						//redirect('worker/login');	
						if($this->email->send())
						{
							redirect('worker/login/verify');
						}
					}
			}
		}	
		$this->load->view('worker/authentication-register',$data);	
	}
	function verify_again()
	{

		$w_email=$this->session->userdata('w_email');
		/*sent email*/
						$config['protocol']='smtp';
						$config['smtp_host']='smtp.gmail.com';
						$config['smtp_user']='findexpert15699@gmail.com';
						$config['smtp_pass']='password';
						$config['smtp_port']=465;
						$config['smtp_crypto']='ssl';
						$config['newline']="\r\n";
						//$config['mailtype']="html";
						$this->email->initialize($config);
						$this->email->from('findexpert15699@gmail.com','Verification Code');
						$f=1;
						$this->email->subject('Verification');
						$random=rand(100000,999999);
						$this->email->message('Your Verification Code:'.$random);
		/*end*/
		$this->db->where('worker_email',$w_email);
		$this->db->update('worker',array('verification_code'=>md5($random)));
		
		
		$this->email->to($w_email);
		if($this->email->send())
		{
			$this->session->set_flashdata('invalid_code','You have to verify first');				
			redirect('worker/login/verify');
		}
	
		
		$this->load->view('worker/worker_verify');
	}
	function verify()
	{
		if($this->input->post())
		{
			$w_email=$this->session->userdata('w_email');
			//echo $w_email;die;
			$sql=$this->db->get_where('worker',array('worker_email'=>$w_email));
			$row=$sql->row_array();
			$mail=$this->input->post('code');
			if($row['verification_code']==md5($mail))
			{
				$this->db->where('worker_email',$w_email);
				$this->db->update('worker',array('is_verified'=>1));
				$this->session->set_flashdata('success','Register Successfully');
				$this->session->unset_userdata('w_email');
				redirect('worker/login');
			}
			else
			{
				$this->session->set_flashdata('invalid_code','Verification code is wrong');
			}
		}

		$this->load->view('worker/worker_verify');
	}
	function index()
	{
		if($this->session->userdata('worker_id'))
		{
			redirect('worker/home/index'); 
		}
		if($this->input->get())
		{
			$email=$this->input->get('email');
			$password=$this->input->get('password');
			$this->db->where(array('worker_email'=>$email,'worker_password'=>md5($password)));
			$qry=$this->db->get('worker');
			if($qry->num_rows()==1)
			{

				$row=$qry->row_array();
				if($row['is_verified']==0){
					$this->session->set_userdata('w_email',$email);
					$this->session->set_flashdata('invalid','You have to verify first');
					redirect('worker/login/verify_again');
				}
				else if($row['status']==0){
					$this->session->set_flashdata('invalid','Your request is pending');
				redirect('worker/login');	
				}else if($row['status']==2){
					$this->session->set_flashdata('invalid','You are blocked');
				redirect('worker/login');
				}else{
					$this->session->set_userdata('worker_id',$row['worker_id']);
					$this->session->set_userdata('worker_name',$row['worker_name']);
					$this->session->set_userdata('worker_email',$row['worker_email']);
					
					$this->session->set_userdata('worker_img',$row['image_path']);
					redirect('worker/home/index');
				}
				

			}else{
				$this->session->set_flashdata('invalid','Wrong Email and Password');
				redirect('worker/login');	
			}
		}
		$this->load->view('worker/authentication-login');
	}
	function logout()
	{
		$this->session->unset_userdata('worker_id');
		$this->session->unset_userdata('worker_img');
		$this->load->view('worker/authentication-login');
	}

	function forget_password()
	{
		if($this->session->userdata('worker_id'))
		{
			redirect('worker/home/index');
		}
		//echo $to_email;die;
		$config['protocol']='smtp';
		$config['smtp_host']='smtp.gmail.com';
		$config['smtp_user']='findexpert15699@gmail.com';
		$config['smtp_pass']='find@2019';
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
			$qry=$this->db->get('worker');
			$res=$qry->result_array();
			foreach($res as $row)
			{
				if($row['worker_email']==$to_email)
				{
					$data=array('worker_password'=>md5($random));
					$this->db->where('worker_email',$to_email);
					$this->db->update('worker',$data);
					if($this->email->send())
					{
						$this->session->set_flashdata('success','Changed Password Successfully');
						redirect('worker/login');
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
				redirect('worker/login');		
			}
		}
		redirect('worker/login');
	}
}
?>
