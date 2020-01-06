<?php
		
class login extends CI_Controller
{
	function index()
	{
		$this->load->model('visitor/getcat_mdl');
		$data['cat']=$this->getcat_mdl->getcat();
		$this->load->view('visitor/home');
	}	
	function login_worker()
	{
		//echo "s";die;
		$data= array();
		$this->load->model('visitor/getcat_mdl');
		$data['cat']=$this->getcat_mdl->getcat();
		if($this->session->userdata('worker_id'))
		{
			redirect('visitor/home'); 
		}
		if($this->input->post())
		{

			$data['cur']=$this->input->post('cur_tab');

			$email=$this->input->post('email');
			$password=$this->input->post('password');
			$this->db->where(array('worker_email'=>$email,'worker_password'=>md5($password)));
			$qry=$this->db->get('worker');
			if($qry->num_rows()==1)
			{
				$row=$qry->row_array();
				if($row['status']==0){
					$this->session->set_flashdata('invalid','Your request is pending');
				redirect('visitor/home/login_form');	
				}else if($row['status']==2){
					$this->session->set_flashdata('invalid','You are blocked');
				redirect('visitor/home/login_form');	
				}else{
					$this->session->set_userdata('worker_id',$row['worker_id']);
					$this->session->set_userdata('worker_name',$row['worker_name']);
					$this->session->set_userdata('worker_email',$row['worker_email']);
					
					$this->session->set_userdata('worker_img',$row['image_path']);
					redirect('visitor/home/index');
				}
			}else{
				$this->session->set_flashdata('invalid_worker','Wrong Email and Password');
				//$this->load->view('visitor/login_form',$data);
			}
		}
		$this->load->view('visitor/login_form',$data);
	}
	function login_client()
	{
		$data =array();
		$this->load->model('visitor/getcat_mdl');
		$data['cat']=$this->getcat_mdl->getcat();
		if($this->session->userdata('client_id'))
		{
			redirect('visitor/home'); 
		}
		if($this->input->post())
		{
		    $data['cur']=$this->input->post('cur_tab');
			$email=$this->input->post('email'); 
			$password=$this->input->post('password');
			$this->db->where(array('client_email'=>$email,'client_password'=>md5($password)));
			$qry=$this->db->get('client');
			if($qry->num_rows()==1)
			{
				$row=$qry->row_array();
				$this->session->set_userdata('client_id',$row['client_id']);
				$this->session->set_userdata('client_name',$row['client_name']);
				$this->session->set_userdata('client_email',$row['client_email']);
				$this->session->set_userdata('client_img',$row['image_path']);
				redirect('visitor/home/index');

			}else{
				$this->session->set_flashdata('invalid_client','Wrong Email and Password');
				//$this->load->view('visitor/login_form',$data);
			}
		}
		$this->load->view('visitor/login_form',$data);
	}
	function register_worker()
	{
		$data = array();
		$this->load->model('visitor/getcat_mdl');
		$data['cat']=$this->getcat_mdl->getcat();
		if($this->input->post())
		{
			$data['cur']=$this->input->post('cur_tab');
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
				$data=array(
					'worker_name'=>$name,
					'worker_email'=>$email,
					'mobileno'=>$mobile_no,
					'worker_password'=>md5($password),
					'image_path'=>'1.jpg'
				);
					$this->session->set_userdata('worker_img',$data['image_path']);
					$this->session->set_userdata('worker_email',$data['worker_email']);
					$sql=$this->db->insert('worker',$data);
					//echo $sql; die;
					if($sql)	
					{
						$this->session->set_flashdata('cur_tab','client');
						$this->session->set_flashdata('success_worker','Register Successfully');
						redirect('visitor/home/login_form');
					}
			}
		}	$this->load->view('visitor/register_form',$data);
	}
	function register_client()
	{
		$data = array();
		$this->load->model('visitor/getcat_mdl');
		$data['cat']=$this->getcat_mdl->getcat();
		if($this->input->post())
		{
			$data['cur']=$this->input->post('cur_tab');
			$this->form_validation->set_rules('client_name','Name','required');
			$this->form_validation->set_rules('client_email','Email','required|valid_email|is_unique[client.client_email]');
			$this->form_validation->set_rules('password','Password','required|min_length[6]');
			$this->form_validation->set_rules('cmobile_no','Mobile_no','required|regex_match[/^[0-9]{10}$/]');

			$this->form_validation->set_rules('cconfirm_password','Confirm Password','required|min_length[6]|matches[password]');
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
				$mobile_no=$this->input->post('cmobile_no');
				$data=array(
					'client_name'=>$name,
					'client_email'=>$email,
					'mobileno'=>$mobile_no,
					'client_password'=>md5($password)
				);
				
					$sql=$this->db->insert('client',$data);
					//echo $sql; die;
					if($sql)	
					{
						$this->session->set_flashdata('cur_tab','client');
						$this->session->set_flashdata('success_client','Register Successfully');
						redirect('visitor/home/login_form');
					}
			}
		}	
		$this->load->view('visitor/register_form',$data);
	}

	function worker_forget_password()
	{
		$data['user']='worker';
		$this->load->model('visitor/getcat_mdl');
		$data['cat']=$this->getcat_mdl->getcat();

		$this->form_validation->set_rules('email','Email','required|valid_email');
		if($this->session->userdata('worker_id'))
		{
			redirect('visitor/home/index');
		}
		//echo $to_email;die;
		if($this->form_validation->run()==FALSE)
           {
                 //echo validation_errors();
           		//echo "ss";die;
           }
           else
           {
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
					$data=array('worker_password'=>$random);
					$this->db->where('worker_email',$to_email);
					$this->db->update('worker',$data);
					if($this->email->send())
					{
						$this->session->set_flashdata('cur_tab','worker');
						$this->session->set_flashdata('success_worker','Changed Password Successfully');
						redirect('visitor/home/login_form');
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
				redirect('visitor/login/worker_forget_password');		
			}
		}
	}
		$this->load->view('visitor/forget_password',$data);
	}
	function client_forget_password()
	{
		$data['user']='client';
		$this->load->model('visitor/getcat_mdl');
		$data['cat']=$this->getcat_mdl->getcat();
		

		$this->form_validation->set_rules('email','Email','required|valid_email');
		if($this->session->userdata('client_id'))
		{
			redirect('visitor/home/index');
		}
		//echo $to_email;die;
		if($this->form_validation->run()==FALSE)
           {
                 //echo validation_errors();
           		//echo "ss";die;
           }
           else
           {
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
			$qry=$this->db->get('client');
			$res=$qry->result_array();
			foreach($res as $row)
			{
				if($row['client_email']==$to_email)
				{
					$data=array('client_password'=>$random);
					$this->db->where('client_email',$to_email);
					$this->db->update('client',$data);
					if($this->email->send())
					{
						$this->session->set_flashdata('cur_tab','client');
						$this->session->set_flashdata('success_client','Changed Password Successfully');
						redirect('visitor/home/login_form');
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
				redirect('visitor/login/client_forget_password');		
			}
		}
	}
		$this->load->view('visitor/forget_password',$data);
	}
}
?>  