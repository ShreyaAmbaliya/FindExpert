<?php

class manage_chat extends CI_Controller
{ 
	function download_files($id=0)
	{
		//echo $id;die;	
		$this->load->helper('download');
        $sql=$this->db->get_where('chat',array('msg_id'=>$id));
        $row=$sql->row_array();
          
        //file path
        $file = 'upload/chat/'.$row['attachment'];
            
        //download file from directory
        force_download($file, NULL);
	}

	function view_chat($id=0)
	{
		$sql=$this->db->get_where('project_assignment',array('bid_id'=>$id));	
		$res=$sql->row_array();
		
		$data['assign']=$res;
		$qry1=$this->db->get_where('chat',array('assign_id'=>$res['assign_id']));
		$rows=$qry1->result_array();
		$data['message']=$rows; 

		$qry=$this->db->get_where('worker',array('worker_id'=>$res['worker_id']));
		$rows=$qry->row_array();
		$data['worker']=$rows; 
			
		$this->load->view('client/client_chat',$data);
	}

	function msg_send($id=0)
	{
		$msg=$this->input->post('text_msg');

				$config['upload_path']="upload/chat/";
				$config['allowed_types']='*';
				$config['max_size'] = 1000000;
				$this->load->library('upload',$config);

				if($this->upload->do_upload('attach_file'))
				{
					$file_data=$this->upload->data();
					$data['attach']=$file_data['file_name'];
				

					$saveArr=array(
						'text_msg'=>"",
						'attachment'=>$data['attach'],
						'assign_id'=>$id,
						'c_msg'=>1
					);
				if($msg!=""){
						$saveArr=array(
						'text_msg'=>$msg,
						'attachment'=>$data['attach'],
						'assign_id'=>$id,
						'c_msg'=>1
					);
				}	
				$this->db->insert('chat',$saveArr);
				redirect('client/manage_chat/view_chat/'.$this->input->post('bid_id'));
			}else if($msg!=""){
					$saveArr=array(
						'text_msg'=>$msg,
						'assign_id'=>$id,
						'c_msg'=>1
					);
		$this->db->insert('chat',$saveArr);
		}
		redirect('client/manage_chat/view_chat/'.$this->input->post('bid_id'));
	}
}
?>