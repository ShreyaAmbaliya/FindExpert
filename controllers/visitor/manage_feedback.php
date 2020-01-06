<?php 

    class manage_feedback extends CI_Controller
    {
        function index()
        {
            $this->load->model('visitor/getcat_mdl');
            $data['cat']=$this->getcat_mdl->getcat();
            
            if($this->input->post())
            {
                $this->form_validation->set_rules('fb_name','Full Name','required');
                $this->form_validation->set_rules('fb_email','Email','required');
                $this->form_validation->set_rules('star','Rating','required');
                $this->form_validation->set_rules('fb_message','Message','required');
                if($this->form_validation->run()==FALSE)
                {
                 //echo validation_errors();
                }
                else
                {
                    $name=$this->input->post('fb_name');
                    $email=$this->input->post('fb_email');
                    $rating=$this->input->post('star');
                    $msg=$this->input->post('fb_message');
                    $saveArr=array(
                        'fb_name'=>$name,
                        'fb_email'=>$email,
                        'rating'=>$rating,
                        'fb_msg'=>$msg
                    );

                        if($this->session->userdata('worker_id'))
                        {
                            $saveArr['worker_id']=$this->session->userdata('worker_id');
                        }
                        if($this->session->userdata('client_id'))
                        {
                            $saveArr['client_id']=$this->session->userdata('client_id');
                        }
                        $sql=$this->db->insert('feedback',$saveArr);
                        if($sql)
                        {
                            $_POST=array();
                            $this->session->set_flashdata('success','Successfully   Feedback is Sent');
                        }
                    }
                }
                    $this->load->view('visitor/feedback_form',$data);
        }
    }
?>