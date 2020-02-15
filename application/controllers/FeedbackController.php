<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FeedbackController extends CI_Controller {

	function __construct(){
        /* Session Checking Start*/
        parent::__construct(); 
        $this->load->model('feedback_model');
    }

	public function index() {
        if($this->input->post())
        {
            $i=$this->input->post('ivalue'); 
            $bool = false;
            $data ='';
            for($a=1;$a<$i;$a++)
            { 
                $data = array(
                    'q_id' => $this->input->post('question'.$a),
                    'a_id' => $this->input->post('radio'.$a),
                    'lead_id' => $this->input->post('l_id')
                );
                $bool = $this->feedback_model->save_feedback($data);
                //print_r($data);
            }
           // die;
            
            if($bool)
                {
                   /* echo "<script>var loc=".base_url('feedback');
                    echo "alert('Thanks for giving feedback');location.href=loc;</script>";*/
                }
                $this->session->set_flashdata('msg', 'Feedback Submitted Successfully');
        }

        $data['q_a'] = $this->feedback_model->all_qa();
        $this->load->view('feedback',$data);
       
    }
    public function delete_question($id='')
    {
        /*$this->feedback_model->delete_by_id($id,'feedback_questions');*/
        redirect('admin/manage_questions');
    }
    public function update_question($id='')
    {
        /*$this->feedback_model->delete_by_id($id,'feedback_questions');*/
        //redirect('admin/manage_questions');
        $data = $this->feedback_model->getFromId($id,'q_id','feedback_questions');
        $data = json_decode(json_encode($data),true);
        $this->load->view('feedback/update_question',$data);
    }
    public function starValue($value='')
    { 
        //echo $value;
         $data = $this->feedback_model->get_star_value($value); 
         $data = json_decode(json_encode($data),true); 
 echo $data[0]['a_id']; 
    }
 

}
