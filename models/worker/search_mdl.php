<?php

class search_mdl extends CI_Model
{
 function fetch_data($query)
 {
  $this->db->select("*");
  $this->db->where('status',1);
  $this->db->where('client_accept',0);
  $this->db->from("project");

  if($query != '')
  {
   $this->db->like('required_skills', $query); 
  }
  $this->db->order_by('creation_time', 'DESC');

  return $this->db->get();
 }
}

?>