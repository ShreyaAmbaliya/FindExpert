<?php 

class pages extends CI_Controller
{
	function admin_details()
	{
		$this->load->view('admin/admin_details');
	}
	public function index()
	{
		$this->load->view('admin/authentication-login');
	}
	function category_form()
	{
		$this->load->view('admin/category_form');
	}
	function category_details()
	{
		$this->load->view('admin/category_details');
	}

	function admin_form()
	{
		$this->load->view('admin/admin_form');
	}
}

?>