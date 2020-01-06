<?php		
	class manage_worker extends CI_Controller
	{
		function show_worker($id=0)
		{

			$this->load->model('visitor/getcat_mdl');
			$data['cat']=$this->getcat_mdl->getcat();
			
			$sql=$this->db->get_where('worker',array('worker_id'=>$id));
			$res=$sql->row_array();

			$data['record']=$res;
			//print_r($res);die;

			$this->load->view('visitor/worker_details',$data);	
		}
	}

?>