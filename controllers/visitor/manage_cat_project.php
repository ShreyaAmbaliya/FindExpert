<?php		
	class manage_cat_project extends CI_Controller
	{
		function index($id=0)
		{
			$this->load->model('visitor/getcat_mdl');
			$data['cat']=$this->getcat_mdl->getcat();

			$this->load->model('visitor/getcat_mdl');
			$data['records']=$this->getcat_mdl->get_project();

						

			$this->db->select('cat_id, COUNT(cat_id) as total');
 			$this->db->group_by('cat_id'); 
 			$q=$this->db->get('project');
 			$total=$q->result_array();
 			$data['cnt']=$total;

 			if($this->session->userdata('client_id'))
 			{
 				$data=array();
 				$qry=$this->db->get('category');
				$res=$qry->result_array();
				$data['cat']=$res;
				$this->db->where('project.client_id',$this->session->userdata('client_id'));
				$this->db->join('category ct','ct.cat_id=project.cat_id');
				$this->db->join('client c','c.client_id=project.client_id');
	  			$this->db->order_by('project.creation_time', 'DESC');
				$sql=$this->db->get('project');
				$rs=$sql->result_array();
				$data['records']=$rs;
				
				$this->load->view('visitor/category.php',$data); 
 			}else{
 				$this->load->view('visitor/category.php',$data); 
 			}
		}
		function project_bycat($id=0)
		{
			$this->load->model('visitor/getcat_mdl');
			$data['cat']=$this->getcat_mdl->getcat();

			$this->load->model('visitor/getcat_mdl');
			$data['records']=$this->getcat_mdl->get_project_bycat($id);

			$this->load->view('visitor/category.php',$data);
		}
	}
?>