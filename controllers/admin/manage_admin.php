<?php
 
class manage_admin extends CI_Controller
{
	function index()
	{
		redirect('admin/home/index');
	}
	
	function show_profile($id=0)
	{
		$data=array();
		$qry=$this->db->get_where('admin',array('id'=>$id));
		$res=$qry->row_array();
		$data['record']=$res;
		
			
		$this->load->view('admin/admin_show_profile',$data);
			
	}
	function insertdata()
	{
		$data = array();

		if(!$this->session->userdata('user_id'))
		{
			redirect('admin/login/index');
		}
		if($this->input->post())
		{
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[admin.email]');
			$this->form_validation->set_rules('password','Password','required|min_length[6]');
           
           if($this->form_validation->run()==FALSE)
           {
                 //echo validation_errors();
           }
           else
           {
				$name=$this->input->post('name');
				$email=$this->input->post('email');
				$password=$this->input->post('password');
				$data=array(
					'name'=>$name,
					'email'=>$email,
					'password'=>$password
				);
				$config['upload_path']="upload/admin/";
				$config['allowed_types']="jpg|png|jpeg|gif";
				$this->load->library('upload',$config);
				if($this->upload->do_upload('img'))
				{
					$file_data=$this->upload->data();
					$data['image_path']=$file_data['file_name'];

					$sql=$this->db->insert('admin',$data);
					if($sql)	
					{
						$this->session->set_flashdata('success','Successfully Inserted');
						redirect('admin/manage_admin/insertdata');	
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
				else
				{
					$data['img_err'] = $this->upload->display_errors(); 	
				}	
			}
		}	
		$this->load->view('admin/admin_form',$data);	
	}
	function viewdata($segment=0)
	{
		$data=array();
		$limit=3;

		$qry=$this->db->get('admin');
		$total=$qry->num_rows();

		$config['per_page']=$limit;
		$config['total_rows']=$total;
		$config['base_url']=site_url('admin/manage_admin/viewdata');
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
		$qry=$this->db->get('admin');
		$res=$qry->result_array();
		
		$data['records']=$res;

		$this->load->view('admin/admin_details',$data);

	}
	function deletedata($id=0)
	{
		$qry=$this->db->get_where('admin',array('id'=>$id));
		$res=$qry->row_array();

		unlink('upload/admin/'.$res['image_path']);
		
		$this->db->where('id',$id);
		$sql=$this->db->delete('admin');	
		if($sql)	
		{
			$this->session->set_flashdata('success','Successfully deleted');
			//	redirect('admin/manage_admin/insertdata');	
		}
		//$this->load->view('tables');
		redirect('admin/manage_admin/viewdata');	
	}
	function updatedata($id=0)
	{	
		$data=array();
		$qry=$this->db->get_where('admin',array('id'=>$id));
		$res=$qry->row_array();
		$data['record']=$res;
		
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('password','Password','required|min_length[6]');
           
           if($this->form_validation->run()==FALSE)
           {
                 //echo validation_errors();
           }
           else
           {
				if($this->input->post())
				{
						$name=$this->input->post('name');
						$email=$this->input->post('email');
						$password=$this->input->post('password');
						$saveArr=array(
							'name'=>$name,
							'email'=>$email,
							'password'=>$password
						);
						if(!empty($_FILES['img']['name']))
						{
							$config['upload_path'] = "upload/admin/";
							$config['allowed_types'] = "jpg|png|jpeg|gif";
							$this->load->library('upload', $config);
							if($this->upload->do_upload('img'))
							{
								if($res['image_path']!='1.jpg')
								{
									unlink('upload/admin/'.$res['image_path']);
								}
								$file_data = $this->upload->data();
								$saveArr['image_path'] = $file_data['file_name'];
								$this->db->where('id',$id);
								$sql=$this->db->update('admin',$saveArr);
								if($sql)	
								{
									$this->session->set_flashdata('success','Successfully updated');
									//redirect('admin/manage_admin/insertdata');	
								}
								redirect('admin/manage_admin/viewdata');
							}
							else
							{
								echo $this->upload->display_errors();
							}
						}	
					        $this->db->where('id',$id);
							$sql=$this->db->update('admin',$saveArr);
							if($sql)	
							{
								$this->session->set_flashdata('success','Successfully updated');
							//	redirect('admin/manage_admin/insertdata');	
							}
							redirect('admin/manage_admin/viewdata');
				}	
			}
				$this->load->view('admin/admin_form',$data);
	}
function edit_profile($id=0)
{
		$data=array();
		$qry=$this->db->get_where('admin',array('id'=>$id));
		$res=$qry->row_array();
		$data['record']=$res;
		
		if($this->input->post())
			{
				$name=$this->input->post('name');
				$email=$this->input->post('email');
				$password=$this->input->post('password');
				$saveArr=array(
					'name'=>$name,
					'email'=>$email
				);
				if(!empty($_FILES['img']['name']))
				{
					$config['upload_path'] = "upload/admin/";
					$config['allowed_types'] = "jpg|png|jpeg|gif";
					$this->load->library('upload', $config);
					if($this->upload->do_upload('img')){
					if($res['image_path']!='1.jpg')
					{
						unlink('upload/admin/'.$res['image_path']);
					}
					$file_data = $this->upload->data();
					$saveArr['image_path'] = $file_data['file_name'];
					$this->db->where('id',$id);
					$this->db->update('admin',$saveArr);
					$this->session->set_userdata('user_img',$saveArr['image_path']);
				redirect('admin/manage_admin');
				}
				else
				{
					echo $this->upload->display_errors();
				}	
					
			}	
			        $this->db->where('id',$id);
					$this->db->update('admin',$saveArr);
				redirect('admin/manage_admin');
		}
		else
		{
				$this->load->view('admin/admin_profile',$data);
		}	
	}
	function change_password($id=0)
	{
		$data=array();
		$this->db->where('id',$id);
		$qry=$this->db->get('admin');
		$res=$qry->row_array();
		$pass=$res['password'];
		$this->load->model('admin/login_mdl');
		
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
					$res['password']=$this->input->post('cpassword');
					
					$this->db->where('id',$id);
					$this->db->update('admin',$res);
					redirect('admin/manage_admin');
				}
				else
				{
					$data['err']=" Doesn't Match Password";						
					$this->load->view('admin/change_password',$data);
					$this->load->view('admin/change_password');
				//redirect('admin/manage_admin/change_password');
		        }
	    }
	       $this->load->view('admin/change_password');
	}
}
