<?php
	class skill_mdl extends CI_Model
	{
		function getcat()
		{
			$qry=$this->db->get('category');
			return $qry->result_array();
		}
		function getsubcat()
		{
			$qry=$this->db->get('sub_category');
			return $qry->result_array();
		}
	}
?>