<?php
		
	class home extends CI_Controller
	{
		function search_bycat()
		{
			  $this->db->select("*");
			  $this->db->from("project");
			  $query=$this->input->post('category');
			  if($query != '')
			  {
			   $this->db->like('cat_id', $query); 
			  }
			  $this->db->order_by('creation_time', 'DESC');
			  $qry=$this->db->get();
			  $rows=$qry->row_array();
			  $data['records']=$rows;
			  $data['cat_id']=$rows['cat_id'];
			  //echo '<pre>';print_r($rows['cat_id']);die;
			  redirect('visitor/manage_cat_project/project_bycat/'.$rows['cat_id']);
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
		function index()
		{
			$sql=$this->db->get('worker');
			$data['w_count']=$sql->num_rows();
			$sql=$this->db->get('client');
			$data['c_count']=$sql->num_rows();
			
			$sql=$this->db->get('project');
			$data['pa_count']=$sql->num_rows();
			$this->db->where('client_accept',0);
			$sql=$this->db->get('project');
			$data['avail_project']=$sql->num_rows();

			$this->load->model('visitor/getcat_mdl');
			$data['cat']=$this->getcat_mdl->getcat();

			$this->load->model('visitor/getcat_mdl');
			$data['records']=$this->getcat_mdl->get_project();

			$this->db->select('cat_id, COUNT(cat_id) as total');
 			$this->db->group_by('cat_id'); 
 			$q=$this->db->get('project');
 			$total=$q->result_array();
 			$data['cnt']=$total;
			$this->load->model('visitor/getcat_mdl');
			$data['cat']=$this->getcat_mdl->getcat();

			/*blog*/
			$this->load->model('visitor/getcat_mdl');
			$data['cat']=$this->getcat_mdl->getcat();
				
	        $sql=$this->db->get('blog');
	        $rows=$sql->result_array(); 
	        $data['blog']=$rows;
			/*end*/

			/*search start*/
			/*$country=$this->db->get('country')->result_array();
			$city=$this->db->get('city')->result_array();
			$data['country']=$country;			*/
			/*search end*/
			$this->load->view('visitor/dashboard',$data);
		}
		function login_form()
		{
			$data['cur']=$this->session->flashdata('cur_tab');
			$this->load->model('visitor/getcat_mdl');
			$data['cat']=$this->getcat_mdl->getcat();
			$this->load->view('visitor/login_form',$data);	
		}
		function register_form()
		{
			$this->load->model('visitor/getcat_mdl');
			$data['cat']=$this->getcat_mdl->getcat();
			$this->load->view('visitor/register_form',$data);	
		}
		function logout()	
		{
			$this->load->model('visitor/getcat_mdl');
			$data['cat']=$this->getcat_mdl->getcat();
			$this->session->unset_userdata('worker_id');
			$this->session->unset_userdata('worker_img');

			$this->session->unset_userdata('client_id');
			$this->session->unset_userdata('client_img');
			$this->load->view('visitor/dashboard',$data);
		}
	}
?>