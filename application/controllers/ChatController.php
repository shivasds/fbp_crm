<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ChatController extends CI_Controller {
 	public function __construct()
        {
                parent::__construct();
				$this->load->model(['ChatModel','OuthModel','UserModel']);
                //$this->SeesionModel->not_logged_in();
				$this->load->helper('string');
				$this->load->model('user_model');
        $this->load->model('common_model');
        $this->load->model('callback_model');
        $this->load->library('session');
        $this->load->model('login_model');

        if($this->session->userdata('user_id') && $this->session->userdata('is_loggedin') == true && ($this->session->userdata('username') !='admin') )     
            $this->getPermission($this->session->userdata('user_id'));
        elseif($this->session->userdata('username') =='admin' && $this->session->userdata('user_type') =='admin')
        {
            $mData = $this->login_model->getModulesClause();
            $tmpArry = array();
            foreach ($mData as $value) {
                $tmpArry[] = $value['id'];
            }
            $this->session->set_userdata('permissions', json_encode($tmpArry));
        }
        elseif($this->session->userdata('user_type') =='admin')
             $this->getPermission($this->session->userdata('user_id'));
        else
            $this->getPermission($this->session->userdata('user_id'));

        if (!$this->session->userdata('is_loggedin')) {
            redirect(base_url("login"));
        }
        elseif($this->router->fetch_method() != "generate_dar") {
            if ($this->session->userdata('dar_flag'))
                redirect(base_url("generate_dar"));
        }
        }
          function getPermission($userId){
        $this->load->model('login_model');
        $fetchData = $this->login_model->getModulePermission(['userId' => $userId]);
        $permission = $fetchData['accessLists'];
        $this->session->set_userdata('permissions', $permission);
        
    }
	public function index(){
		
		$data['strTitle']='';
		$data['strsubTitle']='';
		$list=[];

        $data['name'] = "chat";
        $data['user_id'] = $this->session->userdata('user_id');
        $city_id=$this->user_model->get_city_id($data['user_id']);  
        $data['city_id']=$city_id[0]->city_id;
        $this->session->set_userdata('city_id',$data['city_id']);
        $data['user_ids']=$this->user_model->get_city_user_ids('time');
        $data['user_ids'] =json_decode( json_encode($data['user_ids']), true);

             // print_r( $data['user_ids']);exit();
        $this->session->set_userdata('user_ids',$data['user_ids']);
        $data['profile_pic'] = $this->user_model->get_profile_pic_name($data['user_id']);
        $data['profile_pic'] = json_decode( json_encode($data['profile_pic']), true);
        $this->session->set_userdata('profile_pic',$data['profile_pic'][0]['profile_pic']);
     
          
      
		$data['vendorslist']=$data['user_ids'];
		
 		$this->parser->parse('chatTemplate',$data);
    }
	
	
	public function send_text_message(){
		$post = $this->input->post();
		$messageTxt='NULL';
		$attachment_name='';
		$file_ext='';
		$mime_type='';
		
		if(isset($post['type'])=='Attachment'){ 
		 	$AttachmentData = $this->ChatAttachmentUpload();
			//print_r($AttachmentData);
			$attachment_name = $AttachmentData['file_name'];
			$file_ext = $AttachmentData['file_ext'];
			$mime_type = $AttachmentData['file_type'];
			 
		}else{
			$messageTxt = reduce_multiples($this->input->post('messageTxt'),' ');
		}	
		 
				$data=[
 					'sender_id' => $this->session->userdata['user_id'],
					'receiver_id' => $this->session->userdata('receiver_id'),
					'message' =>   $messageTxt,
					'attachment_name' => $attachment_name,
					'file_ext' => $file_ext,
					'mime_type' => $mime_type,
					'message_date_time' => date('Y-m-d H:i:s'), //23 Jan 2:05 pm
					'ip_address' => $this->input->ip_address(),
				];

               // print_r($data);die;
		  
 				$query = $this->ChatModel->SendTxtMessage($this->OuthModel->xss_clean($data)); 
 				$response='';
				if($query == true){
					$response = ['status' => 1 ,'message' => '' ];
				}else{
					$response = ['status' => 0 ,'message' => 'sorry we re having some technical problems. please try again !' 						];
				}
             
 		   echo json_encode($response);
	}
	public function ChatAttachmentUpload(){
		 
		
		$file_data='';
		if(isset($_FILES['attachmentfile']['name']) && !empty($_FILES['attachmentfile']['name'])){	
				$config['upload_path']          = './uploads/attachment';
				$config['allowed_types']        = 'jpeg|jpg|png|txt|pdf|docx|xlsx|pptx|rtf';
				//$config['max_size']             = 500;
				//$config['max_width']            = 1024;
				//$config['max_height']           = 768;
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('attachmentfile'))
				{
					echo json_encode(['status' => 0,
					'message' => '<span style="color:#900;">'.$this->upload->display_errors(). '<span>' ]); die;
				}
				else
				{
					$file_data = $this->upload->data();
					//$filePath = $file_data['file_name'];
					return $file_data;
				}
		    }
 		 
	}
	
	public function get_chat_history_by_vendor(){
        //$id=$this->user_model->get_userid_by_name($this->input->get('receiver_id'));
        $r_id = $this->input->get('receiver_id');
		$receiver_id = $this->OuthModel->Encryptor('decrypt', $this->input->get('receiver_id') );
		/*print_r($receiver_id);die('chill');
		print_r($id);
		 */
        $Logged_sender_id = $this->session->userdata['user_id'];
        $this->session->set_userdata('receiver_id',$r_id);
		$history = $this->ChatModel->GetReciverChatHistory($r_id);
		$this->ChatModel->read_msg($r_id,$Logged_sender_id);
		//print_r($history);
		foreach($history as $chat):
			
			$message_id = $this->OuthModel->Encryptor('encrypt', $chat['id']);
			$sender_id = $chat['sender_id'];
			$userName = $this->UserModel->GetName($chat['sender_id']);
			$userPic = $this->UserModel->PictureUrlById($chat['sender_id']);
			
			$message = $chat['message'];
			$messagedatetime = date('d M H:i A',strtotime($chat['message_date_time']));
		
				$messageBody='';
            	if($message=='NULL'){ //fetach media objects like images,pdf,documents etc
					$classBtn = 'right';
					if($Logged_sender_id==$sender_id){$classBtn = 'left';}
					
					$attachment_name = $chat['attachment_name'];
					$file_ext = $chat['file_ext'];
					$mime_type = explode('/',$chat['mime_type']);
					
					$document_url = base_url('uploads/attachment/'.$attachment_name);
					
				  if($mime_type[0]=='image'){
 					$messageBody.='<img src="'.$document_url.'" onClick="ViewAttachmentImage('."'".$document_url."'".','."'".$attachment_name."'".');" class="attachmentImgCls">';	
				  }else{
					$messageBody='';
					 $messageBody.='<div class="attachment">';
                          $messageBody.='<h4>Attachments:</h4>';
                           $messageBody.='<p class="filename">';
                            $messageBody.= $attachment_name;
                          $messageBody.='</p>';
        
                          $messageBody.='<div class="pull-'.$classBtn.'">';
                            $messageBody.='<a download href="'.$document_url.'"><button type="button" id="'.$message_id.'" class="btn btn-primary btn-sm btn-flat btnFileOpen">Open</button></a>';
                          $messageBody.='</div>';
                        $messageBody.='</div>';
					}
						
											
				}else{
					$messageBody = $message;
				}
			?>
            
            
        
             <?php if($Logged_sender_id!=$sender_id){?>     
                  <!-- Message. Default to the left -->
                    <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left"><?=$userName;?></span>
                        <span class="direct-chat-timestamp pull-right"><?=$messagedatetime;?></span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="<?=$userPic;?>" alt="<?=$userName;?>">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                         <?=$messageBody;?>
                      </div>
                      <!-- /.direct-chat-text -->
                      
                    </div>
                    <!-- /.direct-chat-msg -->
			<?php }else{?>
                    <!-- Message to the right -->
                    <div class="direct-chat-msg right">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right"><?=$userName;?></span>
                        <span class="direct-chat-timestamp pull-left"><?=$messagedatetime;?></span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="<?=$userPic;?>" alt="<?=$userName;?>">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                      	<?=$messageBody;?>
                          	<!--<div class="spiner">
                             	<i class="fa fa-circle-o-notch fa-spin"></i>
                            </div>-->
                       </div>
                       <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->
             <?php }?>
        
        <?php
		endforeach;
 		
	}
	public function chat_clear_client_cs(){
		$receiver_id = $this->OuthModel->Encryptor('decrypt', $this->input->get('receiver_id') );
		
		$messagelist = $this->ChatModel->GetReciverMessageList($receiver_id);
		
		foreach($messagelist as $row){
			
			if($row['message']=='NULL'){
				$attachment_name = unlink('uploads/attachment/'.$row['attachment_name']);
			}
 		}
		
		$this->ChatModel->TrashById($receiver_id); 
 
 		
	}

public function make_user_online($value='')
	{
		$where = array('id'=>$this->session->userdata('user_id'));
		$data = array('last_update'=>date('Y-m-d H:i:s'));
		$bool = $this->callback_model->updateWhere($where,$data,'user');
		 if($bool)
		echo 'success';
		else
		echo 'error';
	}
	
}