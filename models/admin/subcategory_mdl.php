<?php
	class subcategory_mdl extends CI_Model
	{
		function getcat()
		{
			$qry=$this->db->get('category');
			return $qry->result_array();
		}
	}
?>