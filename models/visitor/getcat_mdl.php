<?php
	class getcat_mdl extends CI_Model
	{
		function getcat()
		{
			$qry=$this->db->get('category');
			return $qry->result_array();
		}
		function get_project()
		{
			
			$this->db->select('project.*, COUNT(cat_id) as total');
			$this->db->group_by('cat_id');
			$sql=$this->db->get('project');
			
			$this->db->join('category ct','ct.cat_id=project.cat_id');
			$this->db->join('client c','c.client_id=project.client_id');

  			$this->db->order_by('project.creation_time', 'DESC');
  			$this->db->where('client_accept',0);
			$sql=$this->db->get('project');
			
			return $sql->result_array();
			
		}

		function get_project_bycat($id)
		{
			$this->db->join('category ct','ct.cat_id=project.cat_id');
			$this->db->join('client c','c.client_id=project.client_id');
  			$this->db->order_by('project.creation_time', 'DESC');
			
			if($this->session->userdata('client_id'))
			{	
				$this->db->where('client_accept',0);
				$sql=$this->db->get_where('project',array('ct.cat_id'=>$id,'project.client_id'=>$this->session->userdata('client_id')));
			}else{
				$this->db->where('client_accept',0);
				$sql=$this->db->get_where('project',array('ct.cat_id'=>$id));
			}

			return $sql->result_array();
			
		}

	}
?>