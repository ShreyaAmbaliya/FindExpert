<?php
 
class manage_blog extends CI_Controller
{
	function insertdata()
	{
		$aid=$this->session->userdata('user_id');

		$data = array();
		$qry=$this->db->get_where('blog',array('admin_id'=>$aid));
		$rs=$qry->num_rows();

		
				if($this->input->post())
				{
					$this->form_validation->set_rules('title','Title','required');
					$this->form_validation->set_rules('description','Description','required');
		           
		           if($this->form_validation->run()==FALSE)
		           {
		                 //echo validation_errors();
		           }
		           else
		           {
						$title=$this->input->post('title');
						$desc=$this->input->post('description');
						
						$data=array(
							'title'=>$title,
							'description'=>$desc,
							'admin_id'=>$aid
							
						);
						$this->db->where('admin_id',$id);
						$config['upload_path']="upload/admin/blog/";
						$config['allowed_types']="jpg|png|jpeg|gif";
						$this->load->library('upload',$config);
						if($this->upload->do_upload('img'))
						{
							$file_data=$this->upload->data();
							$data['image_path']=$file_data['file_name'];

							$sql=$this->db->insert('blog',$data);
							if($sql)	
							{
								$this->session->set_flashdata('success','Successfully Inserted');
								redirect('admin/manage_blog/insertdata');	
							}
							
						}
					
				else
				{
					$data['img_err'] = $this->upload->display_errors(); 	
				}	
			}
			
		}	
		$this->load->view('admin/blog_form',$data);	
	}
	function viewdata($segment=0)
	{
		$data=array();
		$limit=3;

		$qry=$this->db->get('blog');
		$total=$qry->num_rows();

		$config['per_page']=$limit;
		$config['total_rows']=$total;
		$config['base_url']=site_url('admin/manage_blog/viewdata');
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
		$qry=$this->db->get('blog');
		$res=$qry->result_array();
		
		$data['records']=$res;

		$this->load->view('admin/blog_details',$data);

	}
	function deletedata($id=0)
	{
		$qry=$this->db->get_where('blog',array('blog_id'=>$id));
		$res=$qry->row_array();

		unlink('upload/admin/blog/'.$res['image_path']);
		
		$this->db->where('blog_id',$id);
		$sql=$this->db->delete('blog');	
		if($sql)	
		{
			$this->session->set_flashdata('success','Successfully deleted');
			//	redirect('admin/manage_blog/insertdata');	
		}
		//$this->load->view('tables');
		redirect('admin/manage_blog/viewdata');	
	}
	function updatedata($id=0)
	{	
		
		$data=array();
		$qry=$this->db->get_where('blog',array('blog_id'=>$id));
		$res=$qry->row_array();
		$data['record']=$res;
		
			$this->form_validation->set_rules('title','Title','required');
			$this->form_validation->set_rules('description','Description','required');
           
           if($this->form_validation->run()==FALSE)
           {
                 //echo validation_errors();
           }
           else
           {
				if($this->input->post())
				{
						$title=$this->input->post('title');
						$desc=$this->input->post('description');
						$saveArr=array(
							'title'=>$title,
							'description'=>$desc
						);
						if(!empty($_FILES['img']['name']))
						{
							$config['upload_path'] = "upload/admin/blog";
							$config['allowed_types'] = "jpg|png|jpeg|gif";
							$this->load->library('upload', $config);
							if($this->upload->do_upload('img'))
							{
								unlink('upload/admin/blog'.$res['image_path']);
								$file_data = $this->upload->data();
								$saveArr['image_path'] = $file_data['file_name'];
								$this->db->where('blog_id',$id);
								$sql=$this->db->update('blog',$saveArr);
								if($sql)	
								{
									$this->session->set_flashdata('success','Successfully updated');
									//redirect('admin/manage_blog/insertdata');	
								}
								redirect('admin/manage_blog/viewdata');
							}
							else
							{
								echo $this->upload->display_errors();
							}
						}	
					        $this->db->where('blog_id',$id);
							$sql=$this->db->update('blog',$saveArr);
							if($sql)	
							{
								$this->session->set_flashdata('success','Successfully updated');
							//	redirect('admin/manage_blog/insertdata');	
							}
							redirect('admin/manage_blog/viewdata');
				}	
			}
				$this->load->view('admin/blog_form',$data);
	}

	
}
