<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');      
    }

	public function index() {
       $status = $this->input->post('status');
      // echo $this->session->userdata('bid_id');die;
       //echo '<pre>';print_r($this->input->post());die;
       
        $this->db->join('worker','worker.worker_id=project_assignment.worker_id');
        $this->db->join('client','client.client_id=project_assignment.client_id');
        $this->db->join('project','project.project_id=project_assignment.project_id');       
        $sql=$this->db->get_where('project_assignment',array('bid_id'=>$this->session->userdata('bid_id')));
        $rows=$sql->row_array();
        $assign_id=$rows['assign_id'];
        //echo '<pre>';print_r($rows);die;
        $worker_name=$rows['worker_name'];
        $client_name=$rows['client_name'];
        $p_title=$rows['project_title'];
        $txn_id=$this->input->post('txnid');
        $amt=$this->input->post('amount');
        $p_time=$this->input->post('addedon');
        $status=$this->input->post('status');
        
        $c_arr=array(
          'assign_id'=>$assign_id,
          'worker_name'=>$worker_name,
          'project_title'=>$p_title,
          'txn_id'=>$txn_id,
          'payment_amt'=>$amt,
          'payment_time'=>$p_time,
          'status'=>$status
        );
            $this->db->where('assign_id',$assign_id);
            $this->db->update('project_assignment',array('payment_status'=>1));
        $this->db->insert('c_payment_history',$c_arr);
          
          
       $saveArr=array();
      if (empty($status)) {
            redirect('Welcome');
        }
       
         $firstname = $this->input->post('firstname');
        $amount = $this->input->post('amount');
        $txnid = $this->input->post('txnid');
        $posted_hash = $this->input->post('hash');
        $key = $this->input->post('key');
        $productinfo = $this->input->post('productinfo');
        $email = $this->input->post('email');
        $salt = "4apvPnnsS0"; //  Your salt
        $add = $this->input->post('additionalCharges');
        If (isset($add)) {
            $additionalCharges = $this->input->post('additionalCharges');
            $retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
        } else {

            $retHashSeq = $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
        }
         $data['hash'] = hash("sha512", $retHashSeq);
          $data['amount'] = $amount;
          $data['txnid'] = $txnid;
          $data['posted_hash'] = $posted_hash;
          $data['status'] = $status;
          if($status == 'success'){
              $this->load->view('success', $data);   
         }
         else{
              $this->load->view('failure', $data); 
         }
     
    }
 
    
   }
