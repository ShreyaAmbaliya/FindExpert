<?php
	class login_mdl extends CI_Model
	{
		function currect_password($pass)
		{
		    if ($pass == $this->input->post('password')) {
		        return true;
		    } 
		    else {
		        return false;
		    }
		}
	} 
?>