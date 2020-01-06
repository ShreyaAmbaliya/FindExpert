<?php

class manage_project extends CI_Controller
{
	function view_details($id=0)
	{
		$data=array();
		$qry=$this->db->get_where('project',array('project_id'=>$id));
		$res=$qry->row_array();
		$sql=$this->db->get_where('client',array('client_id'=>$res['client_id']));
		$cname=$sql->row_array();
		$data['record']=$res;
		$data['client_name']=$cname;
		$this->load->view('admin/project_more_details.php',$data);
	}
	function viewdata($id=0,$segment=0)
	{
		$data=array();
		$this->session->set_flashdata('client_id',$id);
		/*$limit=3; 

		$qry=$this->db->get_where('project',array('client_id'=>$id));
		$total=$qry->num_rows();

		$config['per_page']=$limit;
		$config['total_rows']=$total;
		$config['base_url']=site_url('admin/manage_project/viewdata');
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
		*/
		$this->db->join('category','category.cat_id=project.cat_id');
		//$this->db->limit($limit,$segment);
		$qry=$this->db->get_where('project',array('client_id'=>$id));
		$res=$qry->result_array();
		//echo '<pre>';print_r($res);die;
		$data['records']=$res;

		$qry=$this->db->get_where('client',array('client_id'=>$id));
		$res=$qry->row_array();
	$data['client']=$res;		
		$this->load->view('admin/project_details',$data);
	}

	function change_status($id=0,$status=0){

		$this->db->where('project_id',$id);
		$this->db->update('project',array('status'=>$status));

		/*notification to client*/
			//$insert_id=$this->db->insert_id();
						$sql=$this->db->get_where('project',array('project_id'=>$id));
						$r=$sql->row_array();
						if($status==1){
						$dataArr=array(
							'n_txt'=>'Admin Approve',
							'client_id'=>$r['client_id'],
							'project_id'=>$r['project_id'],
							'admin_approve'=>$r['status']
						);}else{
							$dataArr=array(
							'n_txt'=>'Admin Decline',
							'client_id'=>$r['client_id'],
							'project_id'=>$r['project_id'],
							'admin_approve'=>$r['status']
						);	
						}


						$this->db->insert('notification',$dataArr);		
		/*notification client*/

		redirect('admin/manage_project/viewdata/'.$this->session->flashdata('client_id'));
	}	
}
?>