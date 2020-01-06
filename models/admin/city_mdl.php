<?php
	class city_mdl extends CI_Model
	{
		function getcat()
		{
			$qry=$this->db->get('state');
			return $qry->result_array();
		}
	}
?>