<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback_model extends My_model {

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function all_questions($where=""){
    	$this->db->select()
            ->from('feedback_questions')
            ->order_by('q_id','desc');
        if($where)
            $this->db->where($where);
        $query=$this->db->get();
        return $query->result();
    }

    public function add_question($data){
        $this->db->insert('feedback_questions',$data);
 
    }
       public function all_answers($where=""){
        $this->db->select()
            ->from('feedback_anaswers')
            ->where('active',1)
            ->order_by('a_id','desc');
        if($where)
            $this->db->where($where);
        $query=$this->db->get();
        return $query->result();
    }

    public function add_answer($data){
        $this->db->insert('feedback_anaswers',$data);
 
    }
    public function add_qa($data='')
    {
       $this->db->insert('feedback_qa',$data);
    }
    public function all_qa($where=""){
        $this->db->select('f.*, q.question as question,a1.answers as a1,a2.answers as a2,a3.answers as a3,a4.answers as a4,a5.answers as a5,a6.answers as a6')
            ->from('feedback_qa f')
            ->join('feedback_questions q','q.q_id=f.q_id','left')
            ->join('feedback_anaswers a1','a1.a_id=f.a_id1','left')
            ->join('feedback_anaswers a2','a2.a_id=f.a_id2','left')
            ->join('feedback_anaswers a3','a3.a_id=f.a_id3','left')
            ->join('feedback_anaswers a4','a4.a_id=f.a_id4','left')
            ->join('feedback_anaswers a5','a5.a_id=f.a_id5','left')
            ->join('feedback_anaswers a6','a6.a_id=f.a_id6','left')
            ->limit(10)
            ->where('f.active=',1);
        if($where)
            $this->db->where($where);
        $query=$this->db->get();
        return $query->result();
    }
    public function all_submitted_feedbacks($l_id='',$id='')
    {
        $this->db->select('fs.*,c.*,fs.id as fs_id, p.name as projectname, q.question as question,a.answers as a,concat(u.first_name," ",u.last_name) as username')
        ->from('feedback_submit fs')
        ->join('feedback_questions q','q.q_id=fs.q_id','left')
        ->join('callback c','c.leadid=fs.lead_id','left')
        ->join('user u','u.id =c.user_id','left')
        ->join('project p','p.id=c.project_id','left')
        ->join('feedback_anaswers a','a.a_id=fs.a_id','left');
       /* if($l_id)
      $this->db->group_by('fs.date_created');*/
       // $this->db->group_by('fs.id'); 
      if($l_id)
            {$this->db->where('fs.lead_id',$l_id);// $this->db->group_by('fs.date_created');
    }
        else
            {$this->db->group_by('fs.lead_id');}
        
       /*   if($id)
            $this->db->where('fs.id',$id); */
        $query=$this->db->get();
        return $query->result();

    }
    public function save_feedback($data='')
    {
        return $this->db->insert('feedback_submit',$data);
    }
    public function delete_by_id($id='',$table)
    {
        if($table=='feedback_questions')
        $this->db->where('q_id',$id);
    elseif ($table=='feedback_answers')  
        $this->db->where('a_id',$id);

        $this->db->delete($table);

    }

    public function toggle_status($table,$id){
        $this->db->select('active');
        $this->db->from($table); 
        $this->db->where('q_id',$id);
        $result=$this->db->get()->result();
        if(count($result) > 0){
            $active = $result[0]->active;
            $newStatus = $active?0:1;
            $query=$this->db->update(
                $table,
                array(
                    'active'=>$newStatus
                ),
                array(
                    'q_id'=>$id
                )
            );
            return $newStatus;
        }
        return false;
    }
    public function get_star_value($value='')
    {
       $this->db->select('*')
       ->from('feedback_anaswers')
       ->where('answers',$value);
        $result=$this->db->get()->result();
        return $result;
    }
 
}