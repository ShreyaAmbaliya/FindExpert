<?php 

class manage_blog extends CI_Controller
{
    function index()
    {
    	$this->load->model('visitor/getcat_mdl');
			$data['cat']=$this->getcat_mdl->getcat();
			
        $sql=$this->db->get('blog');
        $rows=$sql->result_array(); 
        $data['blog']=$rows;
        $this->load->view('visitor/blog_details',$data);
    }
}

?>