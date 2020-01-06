<?php
	class state_mdl extends CI_Model
	{
		function getcat()
		{
			$qry=$this->db->get('country');
			return $qry->result_array();
		}
	}
?>