
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		/* Session Checking Start*/
		parent::__construct();
		$this->load->model(['ChatModel','OuthModel','UserModel']);
		$this->load->helper('string');
		$this->load->model('user_model');
		$this->load->model('common_model');
		$this->load->model('callback_model');
		$this->load->model('feedback_model');
		$this->load->library('session');
		if(!in_array($this->router->fetch_method(), array('fetch_online_leads', 'send_daily_report'))){
			if (!$this->session->userdata('is_loggedin')) {
				redirect(base_url("login/admin"));
			}
		}

		if($this->session->userdata('username') !='admin' && $this->session->userdata('is_loggedin') == true){  
            $this->getPermission($this->session->userdata('user_id'));
        }
         
	}

	public function index() {
		$data['name'] = "index";
		$data['user_id'] = $this->session->userdata('user_id');
		$data['profile_pic'] = $this->user_model->get_profile_pic_name($data['user_id']);
        $data['profile_pic'] = json_decode( json_encode($data['profile_pic']), true);
        $data['active_count'] = $this->user_model->get_live_feed_back();
        $this->session->set_userdata('profile_pic',$data['profile_pic'][0]['profile_pic']);
		$this->load->view('admin/home',$data);

	}

	public function manage_users() {
		$data['name'] ="admin";
		$data['heading'] ="Manage User";
		if($this->input->post()){
			$first_name=$this->input->post('first_name');
			$last_name=$this->input->post('last_name');
			$emp_code=$this->input->post('emp_code');
			$email=$this->input->post('email');
			$department=$this->input->post('department');
			$city=$this->input->post('city');
			$manager=$this->input->post('manager');
			$select_user=$this->input->post('select_user');
			$mobile = $this->input->post('employee_mobile');
			$address = $this->input->post('employee_address');
			$savedata=array(
				'first_name'=>$first_name,
				'last_name'=>$last_name,
				'type'=>1,
				'emp_code'=>$emp_code,
				'email'=>$email,
				'dept_id'=>$department,
				'city_id'=>$city,
				'select_user'=>$select_user,
				'reports_to'=>$manager,
				'password'=>md5($emp_code),
				'loginid'=>$emp_code,
				'date_added'=>date('Y-m-d H:i:s'),
				'mobile_number' => $mobile,
				'address' =>$address
			);
			$this->user_model->add_user($savedata);
			redirect('admin/manage_users');
		}
		//$data['all_user'] = $this->user_model->all_employees();
		
		//------- pagination ------
		$rowCount 				= $this->user_model->countEmployees();
		$data["totalRecords"] 	= $rowCount;
		$data["links"] 			= paginitaion(base_url().'admin/manage_users/', 3,VIEW_PER_PAGE, $rowCount);
		$page = $this->uri->segment(3);
        $offset = !$page ? 0 : $page;
		//------ End --------------


		$data['all_user'] = $this->user_model->getEmployeesByLimit($offset, VIEW_PER_PAGE);
		$this->load->view('admin/users',$data);
	}

	public function manage_directors() {
		$data['name'] ="admin";
		$data['heading'] ="Manage Director";
		if($this->input->post()){
			$first_name=$this->input->post('first_name');
			$last_name=$this->input->post('last_name');
			$emp_code=$this->input->post('emp_code');
			$email=$this->input->post('email'); 
			$mobile = $this->input->post('employee_mobile');
			$address = $this->input->post('employee_address');
			$savedata=array(
				'first_name'=>$first_name,
				'last_name'=>$last_name,
				'type'=>4,
				'emp_code'=>$emp_code,
				'email'=>$email,
				'password'=>md5($emp_code),
				'loginid'=>$emp_code,
				'date_added'=>date('Y-m-d H:i:s'), 
				'mobile_number' => $mobile,
				'address' =>$address 
			);
			$this->user_model->add_user($savedata);
				redirect('admin/manage_directors');
		}
		$data['all_directors'] = $this->user_model->all_users("type=4");
		$this->load->view('admin/directors',$data);
	}

	public function manage_vps() {
		$data['name'] ="admin";
		$data['heading'] ="Manage VP";
		if($this->input->post()){
			$first_name=$this->input->post('first_name');
			$last_name=$this->input->post('last_name');
			$emp_code=$this->input->post('emp_code');
			$email=$this->input->post('email');
			$department=$this->input->post('department');
			$city=$this->input->post('city');
			$director=$this->input->post('director');
			$mobile = $this->input->post('employee_mobile');
			$address = $this->input->post('employee_address');

			$savedata=array(
				'first_name'=>$first_name,
				'last_name'=>$last_name,
				'type'=>3,
				'emp_code'=>$emp_code,
				'email'=>$email,
				'dept_id'=>$department,
				'city_id'=>$city,
				'reports_to'=>$director,
				'password'=>md5($emp_code),
				'loginid'=>$emp_code,
				'date_added'=>date('Y-m-d H:i:s'),
				'mobile_number' => $mobile,
				'address' =>$address 
			); 
			$this->user_model->add_user($savedata);
			redirect('admin/manage_vps');
		}
		$data['all_vps'] = $this->user_model->all_vps();
		$this->load->view('admin/vps',$data);
	}
	
	public function manage_city_head()
		{
			$data['name'] ="admin";
			$data['heading'] ="Manage City Head";
			if($this->input->post())
			{
				$first_name=$this->input->post('first_name');
				$last_name=$this->input->post('last_name');
				$emp_code=$this->input->post('emp_code');
				$email=$this->input->post('email');
				$department=$this->input->post('department');
				$city=$this->input->post('city');
				$director=$this->input->post('director');
			$mobile = $this->input->post('employee_mobile');
			$address = $this->input->post('employee_address');
 
				$type=6;
				$savedata=array(
					'first_name'=>$first_name,
					'last_name'=>$last_name,
                    'select_user'=>'City_head',
					'type'=>$type,
					'emp_code'=>$emp_code,
					'email'=>$email,
					'dept_id'=>$department,
					'city_id'=>$city,
					'reports_to'=>$director,
					'password'=>md5($emp_code),
					'loginid'=>$emp_code,
					'date_added'=>date('Y-m-d H:i:s'),
				'mobile_number' => $mobile,
				'address' =>$address
				);
				$this->user_model->add_user($savedata);
				redirect('admin/manage_city_head');
					
			}
			$data['all_city_heads'] = $this->user_model->all_city_heads();
				$this->load->view('admin/manage_city_head',$data);
			
		}

	public function manage_managers() {
		$data['name'] ="admin";
		$data['heading'] ="Manage Manager";
		if($this->input->post()){
			$first_name=$this->input->post('first_name');
			$last_name=$this->input->post('last_name');
			$emp_code=$this->input->post('emp_code');
			$email=$this->input->post('email');
			$department=$this->input->post('department');
			$city=$this->input->post('city');
			$director=$this->input->post('director');
			$mobile = $this->input->post('employee_mobile');
			$address = $this->input->post('employee_address');
			$savedata=array(
				'first_name'=>$first_name,
				'last_name'=>$last_name,
				'type'=>2,
				'emp_code'=>$emp_code,
				'email'=>$email,
				'dept_id'=>$department,
				'city_id'=>$city,
				'reports_to'=>$director,
				'password'=>md5($emp_code),
				'loginid'=>$emp_code,
				'date_added'=>date('Y-m-d H:i:s'),
				'mobile_number' => $mobile,
				'address' =>$address
			);
			$this->user_model->add_user($savedata);
			redirect('admin/manage_managers');
		}
		$data['all_managers'] = $this->user_model->all_managers();
		$this->load->view('admin/managers',$data);
	}

	public function generate_target() {
		$data['name'] ="admin";
		$data['heading'] ="Generate Target";
		$data['success'] = false;
		$data['message'] = "";
		if($this->input->post()){
			$user_id = $this->input->post('user_id');
			$month = $this->input->post('month');
			$target = $this->input->post('target');
			$this->callback_model->add_user_target($user_id, $month, $target);
			$data['message'] = "Target Added";
			$data['success'] = true;
		}
		$data['users'] = $this->user_model->all_users("(type='1' OR type='2')");
		$this->load->view('admin/generate_target',$data);
	}

	public function get_target() {
		if($this->input->post()){
			$user_id = $this->input->post('user_id');
			$month = $this->input->post('month');
			$target = $this->callback_model->get_target($user_id,$month);
			echo $target;
		}
	}

	public function generate_incentive_slab() {
		$data['name'] ="admin";
		$data['heading'] ="Generate Incentive Slab";
		$data['success'] = false;
		$data['message'] = "";
		if($this->input->post()){
			$id = $this->input->post('id');
			$from = $this->input->post('from_date');
			$to = $this->input->post('to_date');
			$amounts = $this->input->post('amount');
			$percentages = $this->input->post('percentage');
			if($id){
				$update_data = array(
					"from" => $from,
					"to" => $to
				);
				$this->db->update('incentive_interval', $update_data, "id=".$id);
				$data['message'] = "Incentive interval updated";
			}
			else{
				$this->callback_model->add_incentive_slab($from, $to, $amounts, $percentages);
				$data['message'] = "Incentive slab generated";
			}
			$data['success'] = true;

		}
		$data['intervals'] = $this->callback_model->get_incentive_intervals();
		$this->load->view('admin/generate_incentive_slab',$data);
	}

	public function get_incentive_slabs($interval_id) {
		$slabs = $this->callback_model->get_incentive_slabs($interval_id);
		if(empty($slabs)){
			$return = "<tr><td colspan=\"2\" style=\"text-align:center;\">No slabs</td></tr>";
		}
		else{
			$return = "";
			foreach ($slabs as $slab) {
				$return .= ("<tr><td>".$slab->amount."</td><td>".$slab->percentage."</td></tr>");
			}
		}
		echo $return;
	}

	public function generate_callback() {
		if($this->input->post()){
			$dept=$this->input->post('dept');
			$name=$this->input->post('name');
			$contact_no1=$this->input->post('contact_no1');
			$contact_no2=$this->input->post('contact_no2');
			$callback_type=$this->input->post('callback_type');
			$email1=$this->input->post('email1');
			$email2=$this->input->post('email2');
			$project=$this->input->post('project');
			$lead_source=$this->input->post('lead_source'); 
			$lead_ids = json_decode(json_encode($this->callback_model->get_last_id()),true);
			$lead_ids = $lead_ids['id']+1;
			$user_name=$this->input->post('user_name');
			$due_date=$this->input->post('due_date');
			$sub_broker=$this->input->post('sub_broker');
			$status=$this->input->post('status');
			$notes=$this->input->post('notes');
			$data='';
			  
			if($this->input->post('ref_by'))
			{
				$data = array(
				'dept_id'=>$dept,
				'name'=>$name,
				'contact_no1'=>$contact_no1,
				'contact_no2'=>$contact_no2,
				'callback_type_id'=>$callback_type,
				'email1'=>$email1,
				'email2'=>$email2,
				'project_id'=>$project,
				'lead_source_id'=>$lead_source,
				'leadid'=> trim("FBP-".sprintf("%'.011d",$lead_ids).PHP_EOL),
				'user_id'=>$user_name,
				'due_date'=>$due_date,
				'broker_id'=>$sub_broker,
				'status_id'=>$status,
				'notes'=>$notes,
				'date_added'=>date('Y-m-d H:i:s'),
				'ref_type' => $this->input->post('ref_by'),
				'ref_mobile' => $this->input->post('mob_num'),
				);
				 
			}
			else
			{
				$data=array(
				'dept_id'=>$dept,
				'name'=>$name,
				'contact_no1'=>$contact_no1,
				'contact_no2'=>$contact_no2,
				'callback_type_id'=>$callback_type,
				'email1'=>$email1,
				'email2'=>$email2,
				'project_id'=>$project,
				'lead_source_id'=>$lead_source,
				'leadid'=> trim("FBP-".sprintf("%'.011d",$lead_ids).PHP_EOL),
				'user_id'=>$user_name,
				'due_date'=>$due_date,
				'broker_id'=>$sub_broker,
				'status_id'=>$status,
				'notes'=>$notes,
				'date_added'=>date('Y-m-d H:i:s'),
			); 
			}
			$query=$this->callback_model->add_callbacks($data);
			redirect(base_url().'admin/callbacks');
		}
		$data['name'] ="generate";
		$data['heading'] ="Generate";
		$this->load->view('admin/generate_callback',$data);
	}

	public function search_callback(){
		$data['name'] ="search";
		$data['heading'] ="Search";

		$type=$this->input->post('type');
		$query=$this->input->post('query');
		if($type != null){
			$this->session->set_userdata("type",$type);
			$this->session->set_userdata("query",$query);
		}
		else{
			$type = $this->session->userdata("type");
			$query = $this->session->userdata("query");
		}
		if($type){

			$data['result'] = $this->callback_model->search_callback($type,$query);
		}
		else
			$data['result'] = false;

		$data['header'] = '';
		$this->load->view('admin/search_callback',$data);
	}

	function revenue_approval($page=1){
		$data['name'] = 'revenue_approval';
		$data['heading'] ="Closed callbacks";
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'admin/revenue_approval/';

		$config['per_page'] = 100;
		$config['full_tag_open'] = '<ul class="pagination pagination-sm pull-right">';
		$config['full_tag_close'] = '</ul>';

		$config['first_link'] = '&laquo;&laquo;';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = '&raquo;&raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '<i class="fa fa-angle-right"></i>';
		$config['next_tag_open'] = '<li class="navi-mnzl">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '<i class="fa fa-angle-left"></i>';
		$config['prev_tag_open'] = '<li class="navi-mnzl">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><span>';
		$config['cur_tag_close'] = '</span></li>';

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$page =$config['per_page']*($page-1);
		$callback_data = $this->callback_model->all_close_callbacks($config['per_page'],$page);
		$config['total_rows'] = $callback_data['total'];
		$data['result'] = $callback_data['data'];
		$this->pagination->initialize($config);
		$this->load->view('admin/revenue_approval',$data);
	}

	public function get_notes(){
		$id=$this->input->post('id');
		$indiv_callback_data = $this->callback_model->get_callback_data($id);
		$returnHtml = "";
		$i=1;
		foreach ($indiv_callback_data as $key => $value) {
			$returnHtml .= "<tr>";
			$returnHtml .= "<td>".($i++)."</td>";
			$returnHtml .= "<td>".$value->current_callback."</td>";
			$returnHtml .= "<td>".$value->status."</td>";
			$returnHtml .= "<td>".$value->user."</td>";
			$returnHtml .= "<td>".$value->date_added."</td>";
			$returnHtml .= "</tr>";
		}
		echo $returnHtml;
	}

	public function get_callback_details(){
		$id=$this->input->post('id');
		$query=$this->callback_model->get_callback_details($id);
		$data = null;
		if($query){
			$data = array(
				'id' =>$id,
				'name' =>$query->name,
				'dept'=>$query->dept_id,
				'contact_no1'=>$query->contact_no1,
				'contact_no2'=>$query->contact_no2,
				'callback_type'=>$query->callback_type_id,
				'email1'=>$query->email1,
				'email2'=>$query->email2,
				'project'=>$query->project_id,
				'lead_source'=>$query->lead_source_id,
				'leadid'=>$query->leadid,
				'user_name'=>$query->user_id,
				'sub_broker'=>$query->broker_id,
				'manage_status'=>$query->status_id,
				'due_date'=>$query->due_date,
				'notes'=>$query->notes,
				'date_added'=>$query->date_added,
				'last_update'=>$query->last_update,
				'active'=>$query->active,	
	            'budget'=>$query->budget,  
	            'Locality' => $query->Locality,
	            'p_type' => $query->p_type,
	            'possesion' => $query->possesion,
	            'a_services' => $query->a_services,
	            'tos' => $query->tos,
	            'client_type' => $query->client_type,
			);
			$indiv_callback_data = $this->callback_model->get_callback_data($id);
			$previous_callback = "";
			foreach ($indiv_callback_data as $callback_data) {
				$previous_callback .= $callback_data->status."****".$callback_data->date_added."****".$callback_data->user;
				$previous_callback .= "\n---------------------------------\n";
				$previous_callback .= $callback_data->current_callback."\n\n";
			}
			$data['previous_callback'] = $previous_callback;
			if($this->input->post('type')){
				if($this->input->post('type') == "Close"){
					$details = $this->callback_model->get_close_callback_details($id);
					$data['advisor1_id'] = $details->advisor1_id;
					$data['advisor2_id'] = $details->advisor2_id;
					$data['booking'] = $details->booking;
					$data['booking_month'] = $details->booking_month;
					$data['closure_date'] = $details->closure_date;
					$data['customer'] = $details->customer;
					$data['sub_source_id'] = $details->sub_source_id;
					$data['project_id'] = $details->project_id;
					$data['sqft_sold'] = $details->sqft_sold;
					$data['plc_charge'] = $details->plc_charge;
					$data['floor_rise'] = $details->floor_rise;
					$data['basic_cost'] = $details->basic_cost;
					$data['other_cost'] = $details->other_cost;
					$data['car_park'] = $details->car_park;
					$data['total_cost'] = $details->total_cost;
					$data['commission'] = $details->commission;
					$data['gross_revenue'] = $details->gross_revenue;
					$data['cash_back'] = $details->cash_back;
					$data['sub_broker_amo'] = $details->sub_broker_amo;
					$data['net_revenue'] = $details->net_revenue;
					$data['share_of_advisor1'] = $details->share_of_advisor1;
					$data['share_of_advisor2'] = $details->share_of_advisor2;
					$data['est_month_of_invoice'] = $details->est_month_of_invoice;
					$data['agreement_status'] = $details->agreement_status;
					$data['project_type'] = $details->project_type;
				}
			}
		}
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function delete_callback(){
		$id=$this->input->post('id');
		$query=$this->callback_model->delete_callback($id);
		if($query){
			$data = array(
				'status' => true,
			);
		}
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function update_callback_details(){
		$id = $this->input->post('callback_id');
if($this->input->post('budget')!='')
{		
$customer_req = array(
			'callback_id'=>$id,
            'budget'=>$this->input->post('budget'),  
            'city'=>$this->input->post('city'),  
            'location'=>$this->input->post('location'),  
            'p_type' => $this->input->post('p_type'),
            'possesion' => $this->input->post('possesion'),
            'a_services' => $this->input->post('a_services'),
            'tos' => $this->input->post('tos'),
            'client_type' => $this->input->post('client_type'),
            'user_id' =>$this->session->userdata('user_id'),
            'date_created' => date('Y-m-d')
		);
		$this->callback_model->insert_req($customer_req);
}
		$update_data = array(
			'last_update' => date('Y-m-d H:s:i')
		);
		if($this->input->post('dept_id'))
			$update_data['dept_id'] = $this->input->post('dept_id');
		if($this->input->post('name'))
			$update_data['name'] = $this->input->post('name');
		if($this->input->post('contact_no1'))
			$update_data['contact_no1'] = $this->input->post('contact_no1');
		if($this->input->post('contact_no2'))
			$update_data['contact_no2'] = $this->input->post('contact_no2');
		if($this->input->post('callback_type_id'))
			$update_data['callback_type_id'] = $this->input->post('callback_type_id');
		if($this->input->post('email1'))
			$update_data['email1'] = $this->input->post('email1');
		if($this->input->post('email2'))
			$update_data['email2'] = $this->input->post('email2');
		if($this->input->post('project_id'))
			$update_data['project_id'] = $this->input->post('project_id');
		if($this->input->post('leadid'))
			$update_data['leadid'] = $this->input->post('leadid');
		if($this->input->post('status_id'))
			$update_data['status_id'] = $this->input->post('status_id');
		if($this->input->post('sub_source_id'))
			$update_data['broker_id'] = $this->input->post('sub_source_id');
		if($this->input->post('lead_source_id'))
			$update_data['lead_source_id'] = $this->input->post('lead_source_id');
		if($this->input->post('user_id'))
			$update_data['user_id'] = $this->input->post('user_id');

		if($this->input->post('budget'))
			$update_data['budget'] = $this->input->post('budget');

		if($this->input->post('Locality'))
			$update_data['Locality'] = $this->input->post('Locality');

		if($this->input->post('p_type'))
			$update_data['p_type'] = $this->input->post('p_type');

		if($this->input->post('possesion'))
			$update_data['possesion'] = $this->input->post('possesion');

		if($this->input->post('a_services'))
			$update_data['a_services'] = $this->input->post('a_services');

		if($this->input->post('tos'))
			$update_data['tos'] = $this->input->post('tos');

		if($this->input->post('client_type'))
			$update_data['client_type'] = $this->input->post('client_type'); 
		if($this->input->post('approve')){
			$update_data['active'] = 0;
			$update_data['verified_by'] = $this->session->userdata('user_id');
			$update_data['verified_on'] = date('Y-m-d H:s:i');
		}

		/*if($this->input->post('reason_for_dead'))
			$update_data['reason_for_dead'] = $this->input->post('reason_for_dead');*/

		if($this->input->post('reason_cause'))
			$update_data['reason_cause'] = $this->input->post('reason_cause');

		if($this->input->post('sitevisit_date') && $this->input->post('sitevisit')){
			$projects = $this->input->post('sitevisit_project_id');					
			if($this->input->post('extrxDataIds') !='') {		//for update the table 
				$clause = 'id IN ('.$this->input->post('extrxDataIds').')';
				$this->callback_model->delete_extra_details($clause);
			}
			
			foreach ($projects as $key => $value) {
				$data=array(
					'callback_id'=>$this->input->post('callback_id'),
					'date'=>$this->input->post('sitevisit_date'),
					'project_id'=>$value,
					'type'=>'1',
					'date_added'=>date('Y-m-d H:s:i'),
					'flag'=>1
				);
				$query=$this->callback_model->add_extra_details($data);

			}
		}

		if($this->input->post('sitevisitdone_date') && $this->input->post('sitevisitdone') ){
			$projects = $this->input->post('sitevisitdone_project_id');
			foreach ($projects as $key => $value) {
				$data=array(
					'callback_id'=>$this->input->post('callback_id'),
					'date'=>$this->input->post('sitevisitdone_date'),
					'project_id'=>$value,
					'type'=>'2',
					'date_added'=>date('Y-m-d H:s:i'),
				);
				$query=$this->callback_model->add_extra_details($data);
			}
			$params = array('flag'=>0);
			$clause = 'id IN ('.$this->input->post('extrxDataIds').')';
			$this->callback_model->update_extra_details($params, $clause);
			$this->session->unset_userdata('siteVisitIds');
		}
		if($this->input->post('notdone_date') && $this->input->post('sitevisitnotdone') ){
			$param=array(
				'callback_id'=>$this->input->post('callback_id'),
				'date'=>$this->input->post('notdone_date'),	
				'reason'=>$this->input->post('notdone_reason'),	
				'type'=>'4',
				'date_added'=>date('Y-m-d H:s:i'),
			);
			$query=$this->callback_model->add_extra_details($param);
			$params = array('flag'=>0);
			$clause = 'id IN ('.$this->input->post('extrxDataIds').')';
			$this->callback_model->update_extra_details($params, $clause);
			$this->session->unset_userdata('siteVisitIds');
		}


		if($this->input->post('facetoface_date')){
			$projects = $this->input->post('facetoface_project_id');
			foreach ($projects as $key => $value) {
				$data=array(
					'callback_id'=>$this->input->post('callback_id'),
					'date'=>$this->input->post('facetoface_date'),
					'project_id'=>$value,
					'type'=>'3',
					'date_added'=>date('Y-m-d H:s:i'),
				);

				$query=$this->callback_model->add_extra_details($data);
			}
		}

		if($this->input->post('due_date'))
			$update_data['due_date'] = $this->input->post('due_date');

		if($this->input->post('important') !== null)
			$update_data['important'] = $this->input->post('important')?1:0;
		
		$query = $this->callback_model->update_callback($update_data,$id);

		if(!$this->input->post('user_id') && ($this->session->userdata('user_id') == $this->input->post('current_user_id')) )
			$this->tracksCallbacks($this->session->userdata('user_id'), $this->session->userdata('user_name'), $id);

		if($this->input->post('status_id')=='5'){
			$data=array(
				'callback_id'=>$this->input->post('callback_id'),
				'advisor1_id'=>$this->input->post('advisor1_id'),
				'advisor2_id'=>$this->input->post('advisor2_id'),
				'booking'=>$this->input->post('booking'),
				'booking_month'=>$this->input->post('booking_month'),
				'closure_date'=>$this->input->post('closure_date'),
				'customer'=>$this->input->post('customer'),
				'sub_source_id'=>$this->input->post('sub_source_id'),
				'project_id'=>$this->input->post('close_project_id'),
				'sqft_sold'=>$this->input->post('sqft_sold'),
				'plc_charge'=>$this->input->post('plc_charge'),
				'floor_rise'=>$this->input->post('floor_rise'),
				'basic_cost'=>$this->input->post('basic_cost'),
				'other_cost'=>$this->input->post('other_cost'),
				'car_park'=>$this->input->post('car_park'),
				'total_cost'=>$this->input->post('total_cost'),
				'commission'=>$this->input->post('commission'),
				'gross_revenue'=>$this->input->post('gross_revenue'),
				'cash_back'=>$this->input->post('cash_back'),
				'sub_broker_amo'=>$this->input->post('sub_broker_amo'),
				'net_revenue'=>$this->input->post('net_revenue'),
				'share_of_advisor1'=>$this->input->post('share_of_advisor1'),
				'share_of_advisor2'=>$this->input->post('share_of_advisor2'),
				'est_month_of_invoice'=> $this->input->post('est_month_of_invoice'),
				'agreement_status' => $this->input->post('agreement_status'),
				'project_type' => $this->input->post('project_type'),

			);

			$notification_data = array(
				'callback_id'=>$this->input->post('callback_id'),
				'user_id'=>$this->session->userdata('user_id'),
				'project_id'=>$this->input->post('close_project_id')
			);
			
			$this->callback_model->insert_notification($notification_data);

			$query=$this->callback_model->update_callback_details($data,$id);
		}

		$current_callback=$this->input->post('current_callback');
		$user_id = $this->session->userdata('user_id');
		$date_added = date('Y-m-d H:s:i');
		$ind_callback_data = array(
			"current_callback" => $current_callback,
			"user_id" => $user_id,
			"callback_id" => $id,
			"status_id" => $this->input->post('status_id'),
			"date_added" => $date_added
		);
		$query = $this->callback_model->add_callback_data($ind_callback_data);

		$data = array(
			'status' =>true
		);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function send_mail($type=""){
		if($this->input->post()){
			$this->load->library('email');

			$this->email->initialize(email_config());
			$to = null;

			switch ($type) {
				case 'site-visit':
					$client_name=$this->input->post('client_name');
					$client_email=$this->input->post('client_email');
					$client_visit=$this->input->post('client_visit');
					$assign_by=$this->input->post('assign_by');
					$subject=$this->input->post('subject');
					$relationship_manager=$this->input->post('relationship_manager');
					$message=$this->input->post('message');
					$callback_id=$this->input->post('callback_id');
					$this->db->insert('svd_follow_callback_details',array(
						'callback_id' => $callback_id,
						'user_id' => $this->session->userdata('user_id'),
						'client_name' => $client_name,
						'client_email' => $client_email,
						'client_visit' => $client_visit,
						'assign_by' => $assign_by,
						'subject' => $subject,
						'relationship_manager' => $relationship_manager,
						'message' => $message,
						'date_added' => date('Y-m-d H:i:s')
					));
					$to = $client_email;
					break;

				case 'client-reg':
					$client_email=$this->input->post('client_email');
					$message=$this->input->post('message');
					$subject=$this->input->post('subject');
					$callback_id=$this->input->post('callback_id');
					$this->db->insert('client_reg',array(
						'callback_id' => $callback_id,
						'user_id' => $this->session->userdata('user_id'),
						'client_email' => $client_email,
						'subject' => $subject,
						'message' => $message,
						'date_added' => date('Y-m-d H:i:s')
					));
					$to = $client_email;
					break;

			}

			$message = str_replace ("\r\n", "<br>", $message );
			$message = str_replace ("\n", "<br>", $message );
			$this->email->set_mailtype("html");

			if($to){
				$this->email->from($this->session->userdata('user_email'), $this->session->userdata('user_name'));
				$this->email->to($to);

				$this->email->subject($subject);
				$this->email->message($message);

				$cc = $this->user_model->get_vp_director_admin_emails();
				$cc[] = $this->session->userdata('user_email');

				$this->email->bcc($cc);

				header('Content-Type: application/json');
				if($this->email->send())
					echo json_encode(array("success" => true));
				else
					echo json_encode(array("success" => false));
			}
			else
				echo json_encode(array("success" => false));

		}
	}

	public function dead_leads(){
		
		ini_set('memory_limit', '-1');
		$data['name'] ="more";
		$data['heading'] ="All Callbacks";
		$where =" AND cb.status_id <>5";
		
		/*if($this->input->post() && $this->input->post('search')!=''){
			$srxhtxt = trim($this->input->post('srxhtxt'));
			$this->session->set_userdata('SRCHTXT', $srxhtxt);		

			$searchDate = $this->input->post('searchDate');
			$this->session->set_userdata('SRCHDT', $searchDate);
		}
		if($this->session->userdata('SRCHTXT')) 	{	
			$searchVal = $this->session->userdata('SRCHTXT');
			$where .=" AND (cb.name='".$searchVal."' OR cb.email1='".$searchVal."' OR cb.contact_no1='".$searchVal."' OR cb.leadid='".$searchVal."' OR p.name='".$searchVal."' OR ls.name = '".$searchVal."' OR concat(u.first_name,' ',u.last_name) ='".$searchVal."' OR b.name='".$searchVal."')";
		}

		if($this->session->userdata('SRCHDT')) {
			if($this->session->userdata('SRCHDT') == 'today')
				$where .=" AND cb.due_date like '%".date('Y-m-d')."%'";
			elseif ($this->session->userdata('SRCHDT') == 'yesterday') 
				$where .=" AND cb.due_date < '".date('Y-m-d', strtotime ('-1 day'))."'";
			elseif ($this->session->userdata('SRCHDT') == 'tomorrow') 
				$where .=" AND cb.due_date > '".date('Y-m-d', strtotime('+ 1 day'))."'";
		}*/

		if($this->input->post()){
			$dept=$this->input->post('dept');
			$project=$this->input->post('project');
			$lead_source=$this->input->post('lead_source');
			$user_name=$this->input->post('user_name');
			$sub_broker=$this->input->post('sub_broker');
			$status=$this->input->post('status');
			$city=$this->input->post('city');
			$budget=$this->input->post('budget'); 
			$location=$this->input->post('location');
			$p_type=$this->input->post('p_type');
			$possesion=$this->input->post('possesion');
			$a_services=$this->input->post('a_services');
			$tos=$this->input->post('tos');
			$client_type=$this->input->post('client_type'); 
			$dead_reason=$this->input->post('dead_reason'); 

			
			if($budget!==null){
				$this->session->set_userdata("budget",$budget);
				if($budget)
					$where.=" AND cb.budget=".trim($budget);
			}
			if($p_type!==null){
				$this->session->set_userdata("p_type",$p_type);
				if($p_type)
					$where.=" AND cb.p_type=".trim($p_type);
			}
			if($possesion!==null){
				$this->session->set_userdata("possesion",$possesion);
				if($possesion)
					$where.=" AND cb.possesion=".trim($possesion);
			}
			if($a_services!==null){
				$this->session->set_userdata("a_services",$a_services);
				if($a_services)
					$where.=" AND cb.a_services=".trim($a_services);
			}
			if($tos!==null){
				$this->session->set_userdata("tos",$tos);
				if($tos)
					$where.=" AND cb.tos=".trim($tos);
			}
			if($client_type!==null){
				$this->session->set_userdata("client_type",$client_type);
				if($client_type)
					$where.=" AND cb.client_type=".trim($client_type);
			}
			if($location!==null){
				$this->session->set_userdata("location",$location);
				if($location)
					$where.=" AND cb.location like '%".$location."%'";
			} 

			if($dept!==null){
				$this->session->set_userdata("department",$dept);
				if($dept)
					$where.=" AND cb.dept_id=".trim($dept);
			}
			if($project!==null){
				$this->session->set_userdata("project",$project);
				if($project)
					$where.=" AND cb.project_id=".trim($project);
			}
			if($lead_source!==null){
				$this->session->set_userdata("lead_source",$lead_source);
				if($lead_source)
					$where.=" AND cb.lead_source_id=".trim($lead_source);
			}
			if($user_name!==null){
				$this->session->set_userdata("search_username",$user_name);
				if($user_name)
					$where.=" AND cb.user_id=".trim($user_name);
			}
			if($sub_broker!==null){
				$this->session->set_userdata("sub_broker",$sub_broker);
				if($sub_broker)
					$where.=" AND cb.broker_id=".trim($sub_broker);
			}
			if($status!==null){
				$this->session->set_userdata("status",$status);
				if($status)
					$where.=" AND cb.status_id=".trim($status);
			}
			if($city!==null){
				$this->session->set_userdata("city",$city);
				if($city)
					$where.=" AND u.city_id=".trim($city);
			}
			if($dead_reason!==null){
				$this->session->set_userdata("dead_reason", $dead_reason);
				if($dead_reason)
					$where.=" AND cb.reason_cause=".trim($dead_reason);
			}
			
			$srxhtxt = trim($this->input->post('srxhtxt'));
			if($srxhtxt !==null ){
				$this->session->set_userdata('SRCHTXT', $srxhtxt);	
				if($srxhtxt)			
					$where .=" AND (cb.name='".$srxhtxt."' OR cb.email1='".$srxhtxt."' OR cb.contact_no1='".$srxhtxt."' OR cb.leadid='".$srxhtxt."' OR p.name='".$srxhtxt."' OR ls.name = '".$srxhtxt."' OR concat(u.first_name,' ',u.last_name) ='".$srxhtxt."' OR b.name='".$srxhtxt."')";
			}
			$searchDate = $this->input->post('searchDate');
			if($searchDate  !==null) {
				$this->session->set_userdata('SRCHDT', $searchDate);

				if($searchDate && $searchDate == 'today')
					$where .=" AND cb.due_date like '%".date('Y-m-d')."%'";
				elseif ($searchDate && $searchDate == 'yesterday') 
					$where .=" AND cb.due_date < '".date('Y-m-d')."'";
				elseif ($searchDate && $searchDate == 'tomorrow') 
					$where .=" AND cb.due_date > '".date('Y-m-d')."'";
			}	
					
		}
		else{
				 
			if($this->session->userdata("department"))
				$where.=" AND cb.dept_id=".trim($this->session->userdata("department"));
			if($this->session->userdata("project"))
				$where.=" AND cb.project_id=".trim($this->session->userdata("project"));
			if($this->session->userdata("lead_source"))
				$where.=" AND cb.lead_source_id=".trim($this->session->userdata("lead_source"));
			if($this->session->userdata("search_username"))
				$where.=" AND cb.user_id=".trim($this->session->userdata("search_username"));
			if($this->session->userdata("sub_broker"))
				$where.=" AND cb.broker_id=".trim($this->session->userdata("sub_broker"));
			if($this->session->userdata("status"))
				$where.=" AND cb.status_id=".trim($this->session->userdata("status"));
			if($this->session->userdata("city"))
				$where.=" AND u.city_id=".trim($this->session->userdata("city"));
            
            if($this->session->userdata("dead_reason"))
				$where.=" AND cb.reason_cause='".trim($this->session->userdata("dead_reason"))."'";
            
			if($this->session->userdata('SRCHTXT')){
				$searchVal = $this->session->userdata('SRCHTXT');
				$where .=" AND (cb.name='".$searchVal."' OR cb.email1='".$searchVal."' OR cb.contact_no1='".$searchVal."' OR cb.leadid='".$searchVal."' OR p.name='".$searchVal."' OR ls.name = '".$searchVal."' OR concat(u.first_name,' ',u.last_name) ='".$searchVal."' OR b.name='".$searchVal."')";
			}

			if($this->session->userdata('SRCHDT')!=''){
				if($this->session->userdata('SRCHDT') == 'today')
					$where .=" AND cb.due_date like '%".date('Y-m-d')."%'";
				elseif ($this->session->userdata('SRCHDT') == 'yesterday') 
					$where .=" AND cb.due_date < '".date('Y-m-d')."'";
				elseif ($this->session->userdata('SRCHDT') == 'tomorrow') 
					$where .=" AND cb.due_date > '".date('Y-m-d')."'";
			}
		}

		/*if($this->input->post('reset')){
			$this->session->unset_userdata(['SRCHTXT', 'SRCHDT']);
			redirect('admin/dead_leads');
		}*/
		//------- pagination ------
		$rowCount 				= $this->callback_model->count_search_records(null,$where);
		//echo $rowCount;die;
		$data["totalRecords"] 	= $rowCount;
		$data["links"] 			= paginitaion(base_url().'admin/dead_leads/', 3,VIEW_PER_PAGE, $rowCount);
		$page = $this->uri->segment(3);
        $offset = !$page ? 0 : $page;
		//------ End --------------
		$data['result'] = $this->callback_model->search_callback(null,$where,$offset,VIEW_PER_PAGE);

		$this->load->view('admin/dead_leads',$data);
	}

	public function callbacks() {
		$data['name'] ="callbacks";
		$data['heading'] ="Callbacks";
		$where="";
		if($this->input->post()){
			$dept=$this->input->post('dept');
			$project=$this->input->post('project');
			$lead_source=$this->input->post('lead_source');
			$user_name=$this->input->post('user_name');
			$sub_broker=$this->input->post('sub_broker');
			$status=$this->input->post('status');
			$city=$this->input->post('city');
			if($dept!==null){
				$this->session->set_userdata("department",$dept);
				if($dept)
					$where.=" AND cb.dept_id=".trim($dept);
			}
			if($project!==null){
				$this->session->set_userdata("project",$project);
				if($project)
					$where.=" AND cb.project_id=".trim($project);
			}
			if($lead_source!==null){
				$this->session->set_userdata("lead_source",$lead_source);
				if($lead_source)
					$where.=" AND cb.lead_source_id=".trim($lead_source);
			}
			if($user_name!==null){
				$this->session->set_userdata("search_username",$user_name);
				if($user_name)
					$where.=" AND cb.user_id=".trim($user_name);
			}
			if($sub_broker!==null){
				$this->session->set_userdata("sub_broker",$sub_broker);
				if($sub_broker)
					$where.=" AND cb.broker_id=".trim($sub_broker);
			}
			if($status!==null){
				$this->session->set_userdata("status",$status);
				if($status)
					$where.=" AND cb.status_id=".trim($status);
			}
			if($city!==null){
				$this->session->set_userdata("city",$city);
				if($city)
					$where.=" AND u.city_id=".trim($city);
			}
			
			$srxhtxt = trim($this->input->post('srxhtxt'));
			if($srxhtxt !==null ){
				$this->session->set_userdata('SRCHTXT', $srxhtxt);	
				if($srxhtxt)			
					$where .=" AND (cb.name='".$srxhtxt."' OR cb.email1='".$srxhtxt."' OR cb.contact_no1='".$srxhtxt."' OR cb.leadid='".$srxhtxt."' OR p.name='".$srxhtxt."' OR ls.name = '".$srxhtxt."' OR concat(u.first_name,' ',u.last_name) ='".$srxhtxt."' OR b.name='".$srxhtxt."')";
			}
			$searchDate = $this->input->post('searchDate');
			if($searchDate  !==null) {
				$this->session->set_userdata('SRCHDT', $searchDate);

				if($searchDate && $searchDate == 'today')
					$where .=" AND cb.due_date like '%".date('Y-m-d')."%'";
				elseif ($searchDate && $searchDate == 'yesterday') 
					$where .=" AND cb.due_date < '".date('Y-m-d')."'";
				elseif ($searchDate && $searchDate == 'tomorrow') 
					$where .=" AND cb.due_date > '".date('Y-m-d')."'";
			}	
			//echo $where;		
		}
		else{
			if($this->session->userdata("department"))
				$where.=" AND cb.dept_id=".trim($this->session->userdata("department"));
			if($this->session->userdata("project"))
				$where.=" AND cb.project_id=".trim($this->session->userdata("project"));
			if($this->session->userdata("lead_source"))
				$where.=" AND cb.lead_source_id=".trim($this->session->userdata("lead_source"));
			if($this->session->userdata("search_username"))
				$where.=" AND cb.user_id=".trim($this->session->userdata("search_username"));
			if($this->session->userdata("sub_broker"))
				$where.=" AND cb.broker_id=".trim($this->session->userdata("sub_broker"));
			if($this->session->userdata("status"))
				$where.=" AND cb.status_id=".trim($this->session->userdata("status"));
			if($this->session->userdata("city"))
				$where.=" AND u.city_id=".trim($this->session->userdata("city"));

			if($this->session->userdata('SRCHTXT')){
				$searchVal = $this->session->userdata('SRCHTXT');
				$where .=" AND (cb.name='".$searchVal."' OR cb.email1='".$searchVal."' OR cb.contact_no1='".$searchVal."' OR cb.leadid='".$searchVal."' OR p.name='".$searchVal."' OR ls.name = '".$searchVal."' OR concat(u.first_name,' ',u.last_name) ='".$searchVal."' OR b.name='".$searchVal."')";
			}

			if($this->session->userdata('SRCHDT')!=''){
				if($this->session->userdata('SRCHDT') == 'today')
					$where .=" AND cb.due_date like '%".date('Y-m-d')."%'";
				elseif ($this->session->userdata('SRCHDT') == 'yesterday') 
					$where .=" AND cb.due_date < '".date('Y-m-d')."'";
				elseif ($this->session->userdata('SRCHDT') == 'tomorrow') 
					$where .=" AND cb.due_date > '".date('Y-m-d')."'";
			}
		}
		
		//------- pagination ------
		$rowCount 				= $this->callback_model->count_search_records(null,$where,null,null,$user="admin")/*(null,$where,$user="admin")*/;
		$data["totalRecords"] 	= $rowCount;
		$data["links"] 			= paginitaion(base_url().'admin/callbacks/', 3,VIEW_PER_PAGE, $rowCount);
		$page = $this->uri->segment(3);
        $offset = !$page ? 0 : $page;
		//------ End --------------

        $data['result'] = $this->callback_model->search_callback(null,$where,$offset,VIEW_PER_PAGE);
		$this->load->view('admin/callbacks',$data);
	}

	public function reports(){
		$data['name'] = "reports";
		$data['heading'] ="Reports";
		$this->load->view('reports',$data);
	}

	public function email_report() {
		
		$fromDate = $this->input->get('fromDate');
		$toDate = $this->input->get('toDate');
		$city = $this->input->get('city');
		$dept = $this->input->get('dept');
		$reportType = $this->input->get('reportType');
		if($reportType != 'dailyCallback'){
			$report_data = $this->generate_report_data($fromDate, $toDate, $dept, $city, $reportType,$project='');
			$to_emails = $this->user_model->get_vp_director_admin_emails();
			$subject = "Report Summary";
		}
		else{
			$report_data = $this->generate_callback_report_data($fromDate, $toDate,$dept, $city, $reportType,$project='');
			$subject = "Callback done summary";
			if(!$city)		
				$clause = 'type IN (3,4,5)';
			else
				$clause = "((type = 2 AND city_id = ".$city.") OR type in (3,4,5)) AND active = 1 AND email != 'test@test.com'";

			$fetchEmail = $this->user_model-> getUserEmailByClause($clause);
			$tmparry = array();
			foreach ($fetchEmail as $emailData) {
				$tmparry[] = $emailData['email'];
			}
			$tmparry[] = 'admin@leads.com';
			$to_emails = implode(',', $tmparry);
		}
		$data['dept'] = $dept;
		$data['city'] = $city;
		$data['fromDate'] = $fromDate;
		$data['toDate'] = $toDate;
		$data['reportType'] = $reportType;
		if($report_data){
			$data = array_merge($data, $report_data);
			
			$mail_body = $this->load->view("mail/header", $data, true) . $this->load->view("mail/details", $data, true) . $this->load->view($data['mail_template'], $data, true) . $this->load->view("mail/footer", $data, true);
				
			
			$this->load->library('email');
			$config = email_config();
			
			$this->email->initialize($config);
			$this->email->from("admin@leads.com","Admin");
			$this->email->to($to_emails);
			$this->email->subject($subject);
			$this->email->message($mail_body);
			//$this->email->send();
			if($this->email->send())
				echo "Success";
			/*else
			echo $this->email->print_debugger();*/
			//print_r($to_emails);
			
			exit;
		}
		//echo "Error";
	}

	function generate_report(){	
			$data['name'] = "reports";
			$data['heading'] ="Reports";
			if($this->input->get()){
				if($this->input->get('fromDate')){
					$fromDate=$this->input->get('fromDate');
					$fromTime=$this->input->get('fromTime');
					$fromDate .= " ".$fromTime;
					$toDate=$this->input->get('toDate');
					$toTime=$this->input->get('toTime');
					$toDate .= " ".$toTime;
					$reportType=$this->input->get('reportType');
					$this->session->set_userdata("report-fromDate",$fromDate);
					$this->session->set_userdata("report-toDate",$toDate);
					$this->session->set_userdata("report-type",$reportType);
					$dept = '';
					$city = '';
					$project=$this->input->get('project');
					$this->session->set_userdata("fromTime",$fromTime);
					$this->session->set_userdata("toTime",$toTime);
				}
				else{
					$dept=$this->input->get('dept');
					$city=$this->input->get('city');
					$project=$this->input->get('project');
					$project=$this->common_model->get_project_id_by_name($project,null);
					$project=$project['id'];
					//echo $project;die;
					$this->session->set_userdata("report-dept",$dept);
					$this->session->set_userdata("report-city",$city);
					$this->session->set_userdata("report-project",$project);
					$fromDate = $this->session->userdata('report-fromDate');
					$toDate = $this->session->userdata('report-toDate');
					$reportType = $this->session->userdata('report-type');
				}
				$data['dept'] = $dept;
				$data['city'] = $city;
				$data['project'] = $project;
				$data['fromDate'] = $fromDate;
				$data['toDate'] = $toDate;
				$data['reportType'] = $reportType;

				

				if($reportType != 'dailyCallback')
				{
				 if($reportType=="svdead")
				{
					$report_data = $this->site_visit_dead($fromDate,$toDate);

				}
				elseif ($reportType=="resv") {
					$report_data = $this->re_site_visit($fromDate,$toDate);
				}
				else
				{
					$report_data = $this->generate_report_data($fromDate, $toDate, $dept, $city, $reportType,$project);
				}

				}
				
				else
					$report_data = $this->generate_callback_report_data($fromDate, $toDate, $dept, $city, $reportType);

				if($report_data){
					$data = array_merge($data, $report_data);
					$this->load->view($data['view_page'], $data);
				}
				else
					redirect(base_url().'admin/reports');
			}
			else
				redirect(base_url().'admin/reports');
		}

		public function generate_report_data($fromDate, $toDate, $dept, $city, $reportType,$project){
			if(!$project)
				$project='';
			$callbacks = $this->callback_model->generate_report_data($fromDate,$toDate,$dept,$city, $reportType,$project);
			$return = array();
			switch ($reportType) {
				case 'lead':
					$this->session->set_userdata("report-heading","Lead breakup report");
					$advisors = array();
					$projects = array();
					$lead_sources = array();
					foreach ($callbacks as $callback) {
						if(array_key_exists($callback->user_id, $advisors))
							$advisors[$callback->user_id] += 1;
						else
							$advisors[$callback->user_id] = 1;
						if(array_key_exists($callback->project_id, $projects))
							$projects[$callback->project_id] += 1;
						else
							$projects[$callback->project_id] = 1;
						if(array_key_exists($callback->lead_source_id, $lead_sources))
							$lead_sources[$callback->lead_source_id] += 1;
						else
							$lead_sources[$callback->lead_source_id] = 1;
					}
					$return['advisors'] = $advisors;
					$return['projects'] = $projects;
					$return['lead_sources'] = $lead_sources;
					$return['view_page'] = 'reports/lead_report';
					$return['mail_template'] = 'mail/lead_report';
					break;

				case 'lead_assignment':
					$this->session->set_userdata("report-heading","Total Lead Assignment Breakup Report");
					if($this->session->userdata('report-project')=='')
					{
					$projects = $this->common_model->all_projects();
					$projectCallbacks = array();
					foreach ($projects as $key => $value) {
						$projectCallbacks[$value->id] = array();
					}
					}
					else
					{
						$project_id =$this->session->userdata('report-project');
						
						$projectCallbacks[$project_id] = array();
					
					}
					$advisors = array();
					foreach ($callbacks as $callback) {
						if(array_key_exists($callback->user_id, $advisors)){
							if(array_key_exists($callback->project_id, $advisors[$callback->user_id]))
								$advisors[$callback->user_id][$callback->project_id] += 1;
							else
								$advisors[$callback->user_id][$callback->project_id] = 1;
						}
						else
							$advisors[$callback->user_id] = array($callback->project_id =>1);
					}
					$return['projectCallbacks'] = $projectCallbacks;
					$return['advisors'] = $advisors;
					$return['view_page'] = 'reports/lead_assignment_report';
					$return['mail_template'] = 'mail/lead_assignment_report';
					break;

				case 'site_visit':
					$this->session->set_userdata("report-heading","Site Visit Done Report");
					//$advisors = array();
					$idsArry = array();
					$site_visits = $this->callback_model->generate_sitevisit_data($dept,$city,$fromDate,$toDate,$type=2);
					foreach ($site_visits as $key => $value) {
						$idsArry[]	= $value->emp_code;
					}

					$return['siteVisitDoneCount'] = array_count_values($idsArry);
					
					/*foreach ($site_visits as $key => $value) {
						if($value->cb_status_id == 6){
							if(array_key_exists($value->cb_user_id, $advisors))
								$advisors[$value->cb_user_id]['count'] += 1;
							else
								$advisors[$value->cb_user_id]['count'] = 1;
							$advisors[$value->cb_user_id]['project'] = $value->cb_project_id;
						}
					}
					$return['advisors'] = $advisors;
					$return['facetoface'] = false;*/
					$return['site_visits'] = $site_visits;
					$return['view_page'] = 'reports/site_visit_report';
					$return['mail_template'] = 'mail/site_visit_report';
					break;

				case 'clent_reg':
					$this->session->set_userdata("report-heading","Client Registration Report");
					$advisors = array();
					foreach ($callbacks as $key => $value) {
						$regDetails = $this->callback_model->get_client_reg_details($value->id);
						if(array_key_exists($value->user_id, $advisors)){
							$advisors[$value->user_id]['count'] += count($regDetails);
						}
						else{
							$advisors[$value->user_id]['count'] = count($regDetails);
						}
					}
					$return['advisors'] = $advisors;
					$return['view_page'] = 'reports/client_reg_report';
					$return['mail_template'] = 'mail/client_reg_report';
					break;

				case 'revenue':
					$this->session->set_userdata("report-heading","Revenue Report");
					$revenue_datas = $this->callback_model->get_revenue_datas($fromDate,$toDate,$dept,$city);
					$return['revenue_datas'] = $revenue_datas;
					$return['view_page'] = 'reports/revenue_report';
					$return['mail_template'] = 'mail/revenue_report';
					break;

				case 'daily_act':
					$this->session->set_userdata("report-heading","Daily Activity Report");
					$statuses = $this->common_model->all_statuses();
					$advisors = array();
					$callback_data = $this->callback_model->get_callbacks_data($fromDate,$toDate,$dept,$city);
					foreach ($callback_data as $key => $value) {
						if(!(array_key_exists($value->user_id, $advisors))){
							$advisors[$value->user_id] = array();
							$advisors[$value->user_id]['total'] = 0;
							foreach ($statuses as $status) {
								$advisors[$value->user_id][$status->id] = 0;
							}
						}
						if(array_key_exists($value->status_id, $advisors[$value->user_id])){
							$advisors[$value->user_id][$value->status_id] += 1;
							$advisors[$value->user_id]['total'] += 1;
						}

					}
					$return['statuses'] = $statuses;
					$return['advisors'] = $advisors;
					$return['view_page'] = 'reports/daily_act_report';
					$return['mail_template'] = 'mail/daily_act_report';
					break;

				case 'site_visit_fixed':
					$this->session->set_userdata("report-heading","Site Visit Fixed Report");
					$idsArry = array();
					$site_visits = $this->callback_model->generate_sitevisit_data($dept,$city,$fromDate,$toDate,$type=1);				
					foreach ($site_visits as $key => $value) {
						if(!in_array_r($value->id, $idsArry))
							$idsArry[$value->emp_code][]	= $value->id;
					}

					$return['siteVisitCount'] = $idsArry;
					
					$return['site_visits'] = $site_visits;
					$return['view_page'] = 'reports/site_visit_fixed_report';
					$return['mail_template'] = 'mail/site_visit_fixed_report';
					break;

				case 'face_to_face':
					$this->session->set_userdata("report-heading","Face to Face Report");
					//$advisors = array();
					$idsArry=array();
					$facetofaces = $this->callback_model->generate_sitevisit_data($dept,$city,$fromDate,$toDate,$type=3);
					foreach ($facetofaces as $key => $value) {
						echo $value->emp_code;
						$idsArry[]	= $value->emp_code;
					}

					$return['facetofacesCount'] = array_count_values($idsArry);
					//echo '<pre>'; print_r($return['facetofacesCount']);echo '</pre>';
					$return['facetofaces'] = $facetofaces;
					$return['view_page'] = 'reports/face_to_face_report';
					$return['mail_template'] = 'mail/face_to_face_report';
					break;

				case 'due';
					$this->session->set_userdata("report-heading","Due Report");
					$due_reports = array();
					$overdue_reports = array();
					foreach ($callbacks as $callback) {
						$duedate = explode(" ", $callback->due_date);
						$duedate = $duedate[0];
						if($duedate == date('Y-m-d')){
							if(array_key_exists($callback->user_id, $due_reports))
								$due_reports[$callback->user_id] += 1;
							else
								$due_reports[$callback->user_id] = 1;
						}
						else{
							if(array_key_exists($callback->user_id, $overdue_reports))
								$overdue_reports[$callback->user_id] += 1;
							else
								$overdue_reports[$callback->user_id] = 1;
						}
					}
					$return['due_reports'] = $due_reports;
					$return['overdue_reports'] = $overdue_reports;
					$return['view_page'] = 'reports/due_report';
					$return['mail_template'] = 'mail/due_report';
					break;

				default:
					$return = false;
					break;
			}
			return $return;
		}

	public function generate_callback_report_data($fromDate, $toDate, $dept, $city, $reportType) {
		if($reportType == 'dailyCallback') {
			$return = array();
			$startDate = $fromDate;
			$endDate   = $toDate;
			$clause = ['entryDate >=' => $startDate, 'entryDate <=' => $endDate, 'u.city_id'=>$city, 'cb.dept_id'=>$dept];
			if($this->session->userdata('user_type') == 'manager'){
				$qryStr = ['u.reports_to' => $this->session->userdata('user_id')];
				$clause = array_merge($clause, $qryStr);
			}
			elseif($this->session->userdata('user_type')=='City_head')
			{
			 
			}
			$callbackData = $this->callback_model->generate_report_callback_data($clause);
			$return['view_page'] = 'reports/callback_report';
			$return['callbackData'] = $callbackData;
			$return['mail_template'] = 'mail/callback_report';
			return $return;
		}
		return false;
	}


	function view_site_visit_fixed_data(){		
		if($this->input->get('userid') && $this->input->get('fromDate') && $this->input->get('endDate') && $this->input->get('reportType')) {
			$data['name'] = "reports";
			$advisorData = $this->user_model->get_user_data($this->input->get('userid'));
			switch ($this->input->get('reportType')) {
				case 'site-visit-fixed':
					$data['heading']  = "Site Visit Fixed Report for ".$advisorData['first_name']." ".$advisorData['last_name'];
					$data['duration'] = "<strong>From</strong> <em>".$this->input->get('fromDate')."</em> <strong>To</strong> <em>".$this->input->get('endDate')."</em>";
					$clause = [
						'u.id'				=> $this->input->get('userid'),
						//'ced.callback_id'	=> $this->input->get('cbId'),
						'ced.type' 			=> 1,
						'ced.date >='		=> $this->input->get('fromDate'),
						'ced.date <='		=> $this->input->get('endDate')
					];
					break;
				case 'site-visit-done':
					$data['heading']  = "Site Visit Done Report for ".$advisorData['first_name']." ".$advisorData['last_name'];
					$data['duration'] = "<strong>From</strong> <em>".$this->input->get('fromDate')."</em> <strong>To</strong> <em>".$this->input->get('endDate')."</em>";
					$clause = [
						'u.id'				=> $this->input->get('userid'),
						//'ced.callback_id'	=> $this->input->get('cbId'),
						'ced.type' 			=> 2,
						'ced.date >='		=> $this->input->get('fromDate'),
						'ced.date <='		=> $this->input->get('endDate')
					];
					break;
					case 'face-to-face':
						$data['heading']  = "Face to Face Report for ".$advisorData['first_name']." ".$advisorData['last_name'];
						$data['duration'] = "<strong>From</strong> <em>".$this->input->get('fromDate')."</em> <strong>To</strong> <em>".$this->input->get('endDate')."</em>";
						$clause = [
							'u.id'				=> $this->input->get('userid'),
							//'ced.callback_id'	=> $this->input->get('cbId'),
							'ced.type' 			=> 3,
							'ced.date >='		=> $this->input->get('fromDate'),
							'ced.date <='		=> $this->input->get('endDate')
						];
					break;
				default:

			}
			
			$data['fetchData'] = $this->callback_model->sitevisit_data_details($clause);
			$prArry = array();            
            foreach ($data['fetchData'] as $key => $value) {
            	$prArry[$value['id']][$key] = $value['id'];
            	$prArry[$value['id']][$key] = $value['projectName'];
            }
            $data['projectsData'] = $prArry;
            $this->load->view('reports/view_site_visit_data', $data);		
		}
		else
			show_404();
		
	}

	public function send_daily_report($city_id = 3) {

		$to_emails = $this->user_model->get_vp_director_admin_emails();

		$data['fromDate'] = date('Y-m-d 00:00:00');
		$data['toDate'] = date('Y-m-d 23:59:59');
		$data['dept'] = '';
		$data['city'] = $city_id;
		$data['lead_report'] = $this->generate_report_data($data['fromDate'], $data['toDate'], $data['dept'], $data['city'], 'lead');
		$data['site_visit_report'] = $this->generate_report_data($data['fromDate'], $data['toDate'], $data['dept'], $data['city'], 'site_visit');
		$data['clent_reg_report'] = $this->generate_report_data($data['fromDate'], $data['toDate'], $data['dept'], $data['city'], 'clent_reg');
		$data['revenue_report'] = $this->generate_report_data($data['fromDate'], $data['toDate'], $data['dept'], $data['city'], 'revenue');
		$data['daily_act_report'] = $this->generate_report_data($data['fromDate'], $data['toDate'], $data['dept'], $data['city'], 'daily_act');
		$data['site_visit_fixed_report'] = $this->generate_report_data($data['fromDate'], $data['toDate'], $data['dept'], $data['city'], 'site_visit_fixed');
		$data['face_to_face_report'] = $this->generate_report_data($data['fromDate'], $data['toDate'], $data['dept'], $data['city'], 'face_to_face');

		$mailData['data'] = $data;
		$mail_body = $this->load->view('reports/daily_report', $mailData, true);

		$this->load->library('email');
		$config = email_config();

		$this->email->initialize($config);
		$this->email->from("admin@leads.com", "Admin");
		$this->email->to($to_emails);
		$this->email->subject($this->common_model->get_city_name($city_id)." - Daily Report - ".date('d/m/Y'));
		$this->email->message($mail_body);
		$this->email->send();

		echo "Success";
	}

	public function reset_password($id) {
		$this->user_model->reset_password($id);
		$data = array(
		  'status' => true
		);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function check_isnumberexists($number) {
		$data = array("contact_no1" => $number);
		echo json_encode(array("exists"=>$this->callback_model->isexists_callbacks($data)));
	}
	function check_isleadexists($leadid)
	{
		$leadid = str_replace("%20"," ",$leadid);
		echo $leadid;
		$data = array("leadid" => $leadid);
		echo json_encode(array("exists"=>$this->callback_model->isexists_callbacks($data)));

	}
	function check_isemailexists() {
		$data = array("email1" => $this->input->get('email'));
		echo json_encode(array("exists"=>$this->callback_model->isexists_callbacks($data)));
	}

	public function get_user_data() {
		$user_id = $this->input->post('id');
		$data = $this->user_model->get_user_data($user_id);
		echo json_encode($data);
	}

	public function update_user($id) {
		//echo '<pre>'; print_r($this->input->post());echo '</pre>';die;
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$email = $this->input->post('email');
		$reports_to = $this->input->post('reports_to');
		$select_user = $this->input->post('select_user');
		$dept_id = $this->input->post('dept_id');
		$city_id = $this->input->post('city_id');
		$data = array(
			"first_name" => $first_name,
			"last_name" => $last_name,
			"email" => $email,
			"mobile_number" => $this->input->post('mobile_number'),
			"address" => $this->input->post('address')
		);
		if($reports_to)
			$data["reports_to"] = $reports_to;
		if($select_user){
			switch ($select_user) {
				case 'user':
					$uType = 1; 
					break;
				case 'crm':
					$uType = 1; 
					break;
				case 'manager':
					$uType = 2; 
					break;
				case 'vp':
					$uType = 3; 
					break;
				case 'admin':
					$uType = 5; 
					break;
				case 'City_head':
					$uType = 6; 
					break;
				default:
					$uType = 1; 
			}
			$data["type"] 			= $uType;
			$data["select_user"] 	= $select_user;
		}
		if($dept_id)
			$data["dept_id"] = $dept_id;
		if($city_id)
			$data["city_id"] = $city_id;
		$q = $this->user_model->update_user($data,$id);
		echo json_encode(array("response" => $q));
	}

	public function manage_cities() {
		$data['name'] ="admin";
		$data['heading'] ="Manage City";
		$data['all_cities'] = $this->common_model->all_cities();
		$this->load->view('admin/cities',$data);
	}

	public function manage_states() {
		$data['name'] ="admin";
		$data['heading'] ="Manage State";
		$data['all_states'] = $this->common_model->all_states();
		$this->load->view('admin/states',$data);
	}

	public function manage_depts() {
		$data['name'] ="admin";
		$data['heading'] ="Manage Departments";
		$data['all_depts'] = $this->common_model->all_depts();
		$this->load->view('admin/depts',$data);
	}

	public function manage_lead_sources() {
		$data['name'] ="admin";
		$data['heading'] ="Manage Lead Source";
		$data['all_lead_sources'] = $this->common_model->all_lead_sources();
		$this->load->view('admin/lead_sources',$data);
	}

	public function manage_projects() {
		$data['name'] ="admin";
		$data['heading'] ="Manage Project";
		$data['all_projects'] = $this->common_model->all_projects();
		$this->load->view('admin/projects',$data);
	}

	public function manage_builders() {
		$data['name'] ="admin";
		$data['heading'] ="Manage Builder";
		$data['all_builders'] = $this->common_model->all_builders();
		$this->load->view('admin/builders',$data);
	}

	public function manage_brokers() {
		$data['name'] ="admin";
		$data['heading'] ="Manage Broker";
		$data['all_brokers'] = $this->common_model->all_brokers();
		$this->load->view('admin/brokers',$data);
	}

	public function manage_callback_types() {
		$data['name'] ="admin";
		$data['heading'] ="Manage Callback Type";
		$data['all_callback_types'] = $this->common_model->all_callback_types();
		$this->load->view('admin/callback_types',$data);
	}

	public function manage_status() {
		$data['name'] ="admin";
		$data['heading'] ="Manage Status";
		$data['all_statuses'] = $this->common_model->all_statuses();
		$this->load->view('admin/statuses',$data);
	}

	function check_state(){
		$code=$this->input->post('code');
		$query=$this->common_model->duplicate_check('state',$code);
		$data = array(
		  'count' =>$query
		);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function check_dept(){
		$code=$this->input->post('code');
		$query=$this->common_model->duplicate_check('department',$code);
		$data = array(
		  'count' =>$query
		);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function check_lead_source(){
		$code=$this->input->post('code');
		$query=$this->common_model->duplicate_check('lead_source',$code);
		$data = array(
		  'count' =>$query
		);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function check_project(){
		$code=$this->input->post('code');
		$query=$this->common_model->duplicate_check('project',$code);
		$data = array(
		  'count' =>$query
		);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function check_builder(){
		$code=$this->input->post('code');
		$query=$this->common_model->duplicate_check('builder',$code);
		$data = array(
		  'count' =>$query
		);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function check_broker(){
		$code=$this->input->post('code');
		$query=$this->common_model->duplicate_check('broker',$code);
		$data = array(
		  'count' =>$query
		);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function check_callback_type(){
		$code=$this->input->post('code');
		$query=$this->common_model->duplicate_check('callback_type',$code);
		$data = array(
		  'count' =>$query
		);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function check_city(){
		$code=$this->input->post('code');
		$query=$this->common_model->duplicate_check('city',$code);
		$data = array(
		  'count' =>$query
		);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function check_status(){
		$code=$this->input->post('code');
		$query=$this->common_model->duplicate_check('status',$code);
		$data = array(
		  'count' =>$query
		);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function check_user(){
		$code=$this->input->post('code');
		$query=$this->common_model->duplicate_check('user',$code);
		$data = array(
		  'count' =>$query
		);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function add_state(){
		$state=$this->input->post('state');
		$data=array(
			'name'=>$state,
			'date_added'=>date('Y-m-d H:i:s')
		);
		$query=$this->db->insert('state',$data);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function add_dept(){
		$dept=$this->input->post('dept');
		$data=array(
			'name'=>$dept,
			'date_added'=>date('Y-m-d H:i:s')
		);
		$query=$this->db->insert('department',$data);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function add_lead_source(){
		$lead_source=$this->input->post('lead_source');
		$data=array(
			'name'=>$lead_source,
			'date_added'=>date('Y-m-d H:i:s')
		);
		$query=$this->db->insert('lead_source',$data);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function add_project(){
		$project=$this->input->post('project');
		$builder=$this->input->post('builder');
		$data=array(
			'name'=>$project,
			'builder_id'=>$builder,
			'date_added'=>date('Y-m-d H:i:s')
		);
		$query=$this->db->insert('project',$data);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function add_builder(){
		$builder=$this->input->post('builder');
		$data=array(
			'name'=>$builder,
			'date_added'=>date('Y-m-d H:i:s')
		);
		$query=$this->db->insert('builder',$data);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function add_broker(){
		$broker=$this->input->post('broker');
		$data=array(
			'name'=>$broker,
			'date_added'=>date('Y-m-d H:i:s')
		);
		$query=$this->db->insert('broker',$data);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function add_callback_type(){
		$callback_type=$this->input->post('callback_type');
		$data=array(
			'name'=>$callback_type,
			'date_added'=>date('Y-m-d H:i:s')
		);
		$query=$this->db->insert('callback_type',$data);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function add_status(){
		$status=$this->input->post('status');
		$data=array(
			'name'=>$status,
			'date_added'=>date('Y-m-d H:i:s')
		);
		$query=$this->db->insert('status',$data);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function add_city(){
		$city=$this->input->post('city');
		$state=$this->input->post('state');
		$data=array(
			'name'=>$city,
			'state_id'=>$state,
			'date_added'=>date('Y-m-d H:i:s')
		);
		$query=$this->db->insert('city',$data);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function change_status_state(){
		$id=$this->input->post('id');
		$newStatus = $this->common_model->toggle_status('state',$id);
		$data = array(
			'id' => $id,
			'active' => $newStatus
		);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function change_status_dept(){
		$id=$this->input->post('id');
		$newStatus = $this->common_model->toggle_status('department',$id);
		$data = array(
			'id' => $id,
			'active' => $newStatus
		);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function change_status_lead_source(){
		$id=$this->input->post('id');
		$newStatus = $this->common_model->toggle_status('lead_source',$id);
		$data = array(
			'id' => $id,
			'active' => $newStatus
		);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function change_status_project(){
		$id=$this->input->post('id');
		$newStatus = $this->common_model->toggle_status('project',$id);
		$data = array(
			'id' => $id,
			'active' => $newStatus
		);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function change_status_builder(){
		$id=$this->input->post('id');
		$newStatus = $this->common_model->toggle_status('builder',$id);
		$data = array(
			'id' => $id,
			'active' => $newStatus
		);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function change_status_city(){
		$id=$this->input->post('id');
		$newStatus = $this->common_model->toggle_status('city',$id);
		$data = array(
			'id' => $id,
			'active' => $newStatus
		);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function change_status_broker(){
		$id=$this->input->post('id');
		$newStatus = $this->common_model->toggle_status('broker',$id);
		$data = array(
			'id' => $id,
			'active' => $newStatus
		);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function change_status_callback_type(){
		$id=$this->input->post('id');
		$newStatus = $this->common_model->toggle_status('callback_type',$id);
		$data = array(
			'id' => $id,
			'active' => $newStatus
		);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function change_status_status(){
		$id=$this->input->post('id');
		$newStatus = $this->common_model->toggle_status('status',$id);
		$data = array(
			'id' => $id,
			'active' => $newStatus
		);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function change_status_user(){
		$id=$this->input->post('id');
		$newStatus = $this->common_model->toggle_status('user',$id);
		$data = array(
			'id' => $id,
			'active' => $newStatus
		);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function bulk_generate_callbacks(){
		$data['name'] ="bulk generate";
		$data['heading'] ="Bulk Generate";
		$this->load->view('admin/bulk_generate_callback',$data);
	}

	function bulk_upload_callback() {
		if(isset($_POST["submit"])) {
			$count = 0;
			$duplicate = 0;
			$target = 'uploads/'.uniqid().'.xls';
			if (move_uploaded_file($_FILES["upload_xl"]["tmp_name"], $target)){
				$this->load->library('excel');
				$objPHPExcel = PHPExcel_IOFactory::load($target);
				$lead_ids = json_decode(json_encode($this->callback_model->get_last_id()),true);
				$lead_ids = $lead_ids['id'];
				foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
					break;
				$lastColumn = $worksheet->getHighestColumn();
				$tempArray = $worksheet->rangeToArray('A1:'.$lastColumn.'1');
				$keyArray = $tempArray[0];
				// print_r($keyArray);exit;
				$nameKey = array_search('Name', $keyArray);
				$contact1Key = array_search('Contact No', $keyArray);
				$contact2Key = array_search('Contact No 2', $keyArray);
				$email1Key = array_search('Email', $keyArray);
				$email2Key = array_search('Email 2', $keyArray);
				$leadIdKey = array_search('Lead Id', $keyArray);
				//$leadIdKey = "FBP - ".sprintf("%'.011d",$lead_ids).PHP_EOL;
				$notesKey = array_search('Notes', $keyArray);
				$highestRow = $worksheet->getHighestRow();
				$newCallbacks = array();
				for($i = 2;$i <= $highestRow; $i++ ){
					$name = (string) $worksheet->getCellByColumnAndRow($nameKey, $i);
					if(($name == '') || ($name == null))
						break;
					$contact_no1 = (string) $worksheet->getCellByColumnAndRow($contact1Key, $i);
					if($contact2Key)
						$contact_no2 = (string) $worksheet->getCellByColumnAndRow($contact2Key, $i);
					else
						$contact_no2 = "";
					if($contact_no1 == $contact_no2)
						$contact_no2 = '';
					$email1 = (string) $worksheet->getCellByColumnAndRow($email1Key, $i);
					if($email2Key)
						$email2 = (string) $worksheet->getCellByColumnAndRow($email2Key, $i);
					else
						$email2 = "";
					if($email1 == $email2)
						$email2 = '';
					$leadId = (string) $worksheet->getCellByColumnAndRow($leadIdKey, $i);
					$notes = (string) $worksheet->getCellByColumnAndRow($notesKey, $i);
					$temp_due_date = $worksheet->getCellByColumnAndRow(14, $i);
					$data = array(
						'name'=>trim($name),
						'contact_no1'=>trim($contact_no1),
						'contact_no2'=>trim($contact_no2),
						'email1'=>trim($email1),
						'email2'=>trim($email2),
						'leadid'=>trim("FBP-".sprintf("%'.011d",$lead_ids++).PHP_EOL),
						'notes'=>trim($notes),
					);
					// print_r($data);exit;
					if (!($this->callback_model->isexists_callbacks($data))){
						array_push($newCallbacks, $data);
						$count++;
					}
					else
						$duplicate++;
	 
				}
				unlink($target);
				$data['callbacks'] = $newCallbacks;
				$data['duplicate_callback'] = $duplicate;
				$data['success_callback'] = $count;
				$data['name'] = "Bulk Upload";
			$data['heading'] ="Lead Upload"; 
				$this->load->view('admin/bulk_generate_report',$data);
			}
			else
				echo "Upload error";
		}
		else
			echo "No data";
	}

	function save_bulk_upload_callbacks() {
		if($this->input->post()){
			$callbacks=$this->input->post('callbacks');
			$dept=$this->input->post('dept');
			$project=$this->input->post('project');
			$lead_source=$this->input->post('lead_source');
			$callback_type=$this->input->post('callback_type');
			$user=$this->input->post('user');
			$broker=$this->input->post('broker');
			$status=$this->input->post('status');
			$due_date=$this->input->post('due_date');
			$due_time=$this->input->post('due_time');

			$callbacks = json_decode($callbacks,true);
			$due_date = $due_date." ".$due_time;
			foreach ($callbacks as $key => $value) {
				$data=array(
					'dept_id'=>$dept,
					'name'=>$value['name'],
					'contact_no1'=>$value['contact_no1'],
					'contact_no2'=>$value['contact_no2'],
					'callback_type_id'=>$callback_type,
					'email1'=>$value['email1'],
					'email2'=>$value['email2'],
					'project_id'=>$project,
					'lead_source_id'=>$lead_source,
					'leadid'=>$value['leadid'],
					'user_id'=>$user,
					'due_date'=>$due_date,
					'broker_id'=>$broker,
					'status_id'=>$status,
					'notes'=>$value['notes'],
					'date_added'=>date('Y-m-d H:i:s'),
					'ref_type' => $this->input->post('ref_by'),
               		'ref_mobile' => $this->input->post('mob_num'),
				);
				if (!($this->callback_model->isexists_callbacks($data))){
					$this->callback_model->add_callbacks($data);
				}
			}
		}
		redirect(base_url().'admin/callbacks');
	}

	public function online_leads(){
		$data['name'] ="more";
		$data['heading'] ="Online Callbacks";
		
		// $data['projects']= $this->common_model->all_active_projects();
		$rowCount 				=$this->common_model->countAll('online_leads');
		$data["totalRecords"] 	= $rowCount;
		$data["links"] 			= paginitaion(base_url().'admin/online_leads/', 3,VIEW_PER_PAGE, $rowCount);
		$page = $this->uri->segment(3);
        $offset = !$page ? 0 : $page;
		//------ End --------------

      $data['leads'] = $this->common_model->getAll('online_leads',VIEW_PER_PAGE,$offset);
		$this->load->view('admin/online_leads',$data);
	}
	public function acres99_leads()
	{
		
		$data['lead']=$this->fetch_99acre_online_leads();
		//print_r($data['lead']);die;
		$this->common_model->save_online_leads_99acres(json_decode(json_encode($data['lead']), True));
		$data['name'] ="more";
		$data['heading'] ="99 Acres Online Callbacks";
		$rowCount 				= $this->common_model->count_onlineleads('online_leads','99acres');
			$data["totalRecords"] 	= $rowCount;
			$data["links"] 			= paginitaionWithQueryString(base_url().'admin/acres99_leads/', 3, VIEW_PER_PAGE, $rowCount, $this->input->get());
			//print_r($data["links"])	
			$page = $this->uri->segment(3);
	        $offset = !$page ? 0 : $page;
			//------ End --------------
			// $data['result'] = $this->callback_model->getCallbackLists($clause, $offset, VIEW_PER_PAGE);
		$data['leads'] = $this->common_model->get_online_leads('online_leads','99acres',VIEW_PER_PAGE,$offset);
		if (empty($data['leads'])) {
			$data['name'] = "index";
     echo "<script>alert('no leads in 99acre');</script>";
     $this->load->view('admin/online_leads',$data);
		}
		else
		{ 
		$this->load->view('admin/online_leads',$data);
		}
		//$data['projects']= $this->common_model->all_active_projects();
		
	}
	public function magicbricks_leads()
	{
		$leadsdata_magicbrick=$this->magic_brick_api();
		//echo"this is data";print_r($leadsdata_magicbrick);die;
		$data['name'] ="more";
		$data['heading'] ="Magic Bricks Online Callbacks";
		$this->common_model->save_online_leads($leadsdata_magicbrick);
		//$data['leads'] = $this->common_model->get_online_leads('Magicbricks');
		$rowCount 				= $this->common_model->count_onlineleads('online_leads','Magicbricks');
			$data["totalRecords"] 	= $rowCount;
			$data["links"] 			= paginitaionWithQueryString(base_url().'admin/magicbricks_leads/', 3, VIEW_PER_PAGE, $rowCount, $this->input->get());	
			$page = $this->uri->segment(3);
	        $offset = !$page ? 0 : $page;
			//------ End --------------
			// $data['result'] = $this->callback_model->getCallbackLists($clause, $offset, VIEW_PER_PAGE);
		$data['leads'] = $this->common_model->get_online_leads('online_leads','Magicbricks',VIEW_PER_PAGE,$offset);
		$this->load->view('admin/online_leads',$data); 
	}
	function  magic_brick_api()
	{
			$start_date=date("Ymd", strtotime('yesterday'));
		$end_date =  date("Ymd", strtotime(date("y-m-d")));
		$url="http://rating.magicbricks.com/mbRating/download.xml?key=UEt~~~~~~2BTQhTPxE~~~~~~3D&startDate=".$start_date."&endDate=".$end_date."";
		
		 			$crl = curl_init($url);
					curl_setopt ($crl, CURLOPT_POST, 1);
					curl_setopt ($crl, CURLOPT_POSTFIELDS,3);
					curl_setopt ($crl, CURLOPT_RETURNTRANSFER,1);
					$leads=curl_exec ($crl);
					//print_r($leads);die;
					return simplexml_load_string($leads);
	}
		public function commonfloor_leads()
	{
		$output=array(); 
		$leadsdata_commonfloor=$this->commonfloor_leads_api();
		//print_r($leadsdata_commonfloor);die;
		function xml2array ( $xmlObject, $out = array () )
		{
   		 foreach ( (array) $xmlObject as $index => $node )
       	 $out[$index] = ( is_object ( $node ) ) ? xml2array ( $node ) : $node;
   		 return $out;
		}
		$output=xml2array( $leadsdata_commonfloor,$output);
		$cdata=array();
		$l_data=array();
		$a=0;
		for ($k=0; $k < count($output["cf_lead"]) ; $k++) { 
			foreach ($output["cf_lead"] as $key => $value) {
			$cdata[$key]= $value;
		}
		}
		$cdata = json_decode(json_encode($cdata), true);
		//print_r($cdata);die;

		$this->common_model->save_commonfloor_online_leads($cdata,count($output["cf_lead"]));

	//print_r($cdata);die;

		$data['name'] ="more";
		$data['heading'] ="Commonfloor Online Callbacks";
		$where="";
		$searchVal='';
		$project='';
		$fromdate='';
		$todate='';
		$lead_source='Commonfloor';
		$data['search']=0;

		if($this->input->post()){
			$project=$this->input->post('project');
			$searchVal = trim($this->input->post('srxhtxt'));
			$fromdate= $this->input->post('fromDate');
			$todate=$this->input->post('toDate');
		if($project!==null){
				$project=trim($project);
				$this->session->set_userdata("project",$project);
				if($project)
					$where.=" (project='$project') ";
			}
			if($searchVal !=null ){
				$this->session->set_userdata('SRCHTXT', $searchVal);	
				if(($searchVal&$project & $fromdate & $todate))			
					$where .="and  (name like '%$searchVal%' or phone like'%$searchVal%' or email like '%$searchVal%' or project like'%$searchVal%')";
				elseif ($searchVal& $fromdate & $todate) {
				$where .=" 	(name like '%$searchVal%' or phone like'%$searchVal%' or email like '%$searchVal%' or project like'%$searchVal%')";
				}
				elseif($searchVal&&$project)
					$where .="and( name like '%$searchVal%' or phone like'%$searchVal%' or email like '%$searchVal%' or project like'%$searchVal%')";
				elseif($searchVal)
				{
					$where .="( name like '%$searchVal%' or phone like'%$searchVal%' or email like '%$searchVal%' or project like'%$searchVal%')";
				}

			}
			if($fromdate & $todate & $project)
			{
				//$where.="lead_date >= $fromdate and lead_date <= $todate";
				$where.="and CAST(lead_date AS date) BETWEEN '$fromdate' and '$todate'";
			}
			$data['fromdate']=$fromdate;
			$data['todate']=$todate;
			$data['search'] = $this->common_model->search_online_leads($fromdate,$todate,$project,$searchVal,$lead_source,$where);		
		}
		else{
				if($this->session->userdata('SRCHTXT')){
				$searchVal = $this->session->userdata('SRCHTXT');
				$where .="(name like '%$searchVal%' or phone like'%$searchVal%' or email like '%$searchVal%' or project like'%$searchVal%')";

			}
		}

		//$data['leads'] = $this->common_model->get_online_leads('commonfloor',$where);
		$rowCount 				= $this->common_model->count_onlineleads('online_leads','Commonfloor');
			$data["totalRecords"] 	= $rowCount;
			$data["links"] 			= paginitaionWithQueryString(base_url().'admin/commonfloor_leads/', 3, VIEW_PER_PAGE, $rowCount, $this->input->get());	
			$page = $this->uri->segment(3);
	        $offset = !$page ? 0 : $page;
			//------ End --------------
			// $data['result'] = $this->callback_model->getCallbackLists($clause, $offset, VIEW_PER_PAGE);
		$data['leads'] = $this->common_model->get_online_leads('online_leads','Commonfloor',VIEW_PER_PAGE,$offset);
		$this->load->view('admin/online_leads',$data); 
	}
	public function commonfloor_leads_api()
	{
		$start_date=date("Ymd", strtotime('-2 days'));
		$end_date =  date("Ymd", strtotime('tomorrow'));
		//echo $end_date;die;
		$url="https://www.commonfloor.com/agent/pull-leads/v1?id=50fa36218cf02&key=83lnnxpateix819gibmxbp58db0spe2e&start=".$start_date."&end=".$end_date."";
		
		 			$crl = curl_init($url);
					curl_setopt ($crl, CURLOPT_POST, 1);
					curl_setopt ($crl, CURLOPT_POSTFIELDS,3);
					curl_setopt ($crl, CURLOPT_RETURNTRANSFER,1);
					$leads=curl_exec ($crl);
					return simplexml_load_string($leads);
	}

		public function fetch_99acre_online_leads(){
		$url =  "https://www.99acres.com/99api/v1/getmy99Response/OeAuXClO43hwseaXEQ/uid/";
		//$data = $this->common_model->load_l_s_credentials('99acre');
		//print_r($data);die;
		$username = 'city.99';
		$password = 'Shashank1986';
		$start_date = date("Y-m-d 00:00:00", strtotime('-1 days'));
		$end_date = date("Y-m-d 23:59:59");
		$request = "<?xml version='1.0'?><query><user_name>$username</user_name><pswd>$password</pswd><start_date>$start_date</start_date><end_date>$end_date</end_date></query>";
		$allParams = array('xml'=>$request);
		$leads = $this->get99AcresLeads();
		//print_r($leads); die;
		$data=array();
		$i=0;
		if(!empty($leads))
	{$data = simplexml_load_string($leads); }
		 //print_r($data);
		 //die;
		//echo $data->ErrorDetail->Message;
	$authentication='';
		/*	if($data->ErrorDetail->Message)
		$authentication ='authentication fail';
		$this->session->set_userdata('99acre_authenication_fail',$authentication);*/
		$lead_data = array();
		if(isset($data->Resp) && count($data->Resp)>0){
			foreach ($data->Resp as $value) {
				$notes = (string) $value->QryDtl->QryInfo;
				$leadid = (string) $value->QryDtl->ProjId;
				$projectname = (string) $value->QryDtl->ProjName;
				$contactname = (string) $value->CntctDtl->Name;
				$contactemail = (string) $value->CntctDtl->Email;
				$contactphone = (string) $value->CntctDtl->Phone;
				$temp[$i] = array(
					"source" => "99acres",
					"name" => $contactname,
					"phone" => $contactphone,
					"email" => $contactemail,
					"project" =>$projectname,
					"leadid" => $leadid,
					"notes" => $notes,
					"lead_date" => date("Y-m-d")
				);
				$i++;	
			}
			$count=array('count'=>$i);
			return array_merge($temp,$count);	
		}	
		else
		{
			if($authentication)
			echo "<script>alert('Invalid Credentials');</script>";
		else
			echo "<script>alert('no leads');</script>";

		}
		
		
	}


	public function save_online_leads(){

		$error=0;
		$ext='';
		if($this->input->post()){
			$dept=$this->input->post('dept');
			$callback_type=$this->input->post('callback_type');
			$user=$this->input->post('user');
			$broker=$this->input->post('broker');
			$status=$this->input->post('status');
			$due_date=$this->input->post('due_date');
			$due_time=$this->input->post('due_time');
			$checked=$this->input->post('check');

			foreach ($checked as $key) {
				$return[] = $key;
				$lead_data = $this->common_model->getFromId($key, 'id', 'online_leads');
				if($lead_data->source=='99acres')
				{
				$p_id=$this->common_model->get_project_id_by_name($lead_data->project,1);
				if($p_id=='')
					$p_id['id']=1;
				}
				elseif($lead_data->source=='Magicbricks')
				{
				$p_id=$this->common_model->get_project_id_by_name($lead_data->project,2);
				if($p_id=='')
					$p_id['id']=2;
				}
				elseif($lead_data->source=='Commonfloor')
				{
				$p_id=$this->common_model->get_project_id_by_name($lead_data->project,3);
				if($p_id=='')
					$p_id['id']=3;
				}
				else
				{
					//$p_id=703;
				}
				//echo $lead_data->project. $p_id['id'];die;
				$data=$this->common_model->getsourceId($lead_data->source);

				$data=array(
					'dept_id'=>$dept,
					'name'=>$lead_data->name,
					'contact_no1'=>$lead_data->phone,
					'callback_type_id'=>$callback_type,
					'email1'=>$lead_data->email,
					'project_id'=>$p_id['id'],
					'lead_source_id'=>$data['id'],
					'leadid'=>$lead_data->leadid,
					'user_id'=>$user,
					'due_date'=>$due_date,
					'broker_id'=>$broker,
					'status_id'=>$status,
					'notes'=>$lead_data->notes,
					'date_added'=>date('Y-m-d H:i:s'),
				);

				if (!($this->callback_model->isexists_callbacks($data)))
				{
					$this->callback_model->add_callbacks($data);
				}
				//$this->common_model->deleteWhere(array('id'=>$key), 'online_leads');
				else
				{
					$error=1;
					echo "<script>alert('this lead already exists');</script>";
					//$ext='admin/'.$this->session->userdata('ext');
					//$this->load->view('admin/online_leads');
				}
				$this->common_model->updateWhere(array('id'=>$lead_data->id));

				//echo json_encode($return);
			}
			if($data['lead_source_id']==30)
			{
					$ext="acres99_leads";
					$this->session->set_userdata('ext',$ext);
			}
				elseif($data['lead_source_id']==29)
				{
					$ext="magicbricks_leads";
					$this->session->set_userdata('ext',$ext);
				}
				elseif($data['lead_source_id']==32)
				{
					$ext="commonfloor_leads";
					$this->session->set_userdata('ext',$ext);
				}
				//echo site_url()
				if($error==0)
				echo "<script>alert('added successfully');location.href='".base_url().'admin/'.$ext."'</script>";
				else
					echo "<script>location.href='".base_url().'admin/'.$ext."'</script>";

		}
		//echo json_encode($return);
	}

	function get99AcresLeads(){
		$curl = curl_init();
 
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://www.99acres.com/99api/v1/getmy99Response/OeAuXClO43hwseaXEQ/uid/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "xml=<?xml version='1.0'?><query><user_name>countryside99</user_name><pswd>ind123</pswd><start_date>2020-02-12 00:00:00</start_date><end_date>2020-02-13 23:59:59</end_date></query>",
  CURLOPT_HTTPHEADER => array( 
    "content-type: application/x-www-form-urlencoded",
  ),
));
 
$response = curl_exec($curl);
		$info = curl_getinfo($curl);
$err = curl_error($curl);
 
curl_close($curl);
 
if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
	}

	return $info;
}
	function dead_leads_reassign(){
		if($this->input->post('chkValues')) {
			$valuesArry = json_decode($this->input->post('chkValues'), true);
			$this->session->set_userdata('CHKVALUES', $valuesArry );
			if($this->session->userdata('CHKVALUES'))
				echo 1;
			else
				echo 0;
			exit();
		}
	}

	function post_dead_leads_reassing(){
		$results 			= array();
		$results['type'] 	= 0;

		if($this->input->post('userId') && $this->input->post('stsId')) {
			if($this->session->userdata('CHKVALUES')){
				$params = array(
					'user_id'		=> $this->input->post('userId'),
					'status_id'		=> $this->input->post('stsId'),
					'due_date'		=> date('Y-m-d H:i:s'),
					'last_update'	=> date('Y-m-d H:i:s'),
					'date_added'	=> date('Y-m-d H:i:s'),
				);
				foreach ($this->session->userdata('CHKVALUES') as $value) {
					$this->callback_model->updateCallbacksData($params, ['id'=>$value]);
				}
				$this->session->unset_userdata('CHKVALUES');
				$results['type'] = 1;
				$results['msg']  = 'Reassign successfull.';
			}
			else
				$results['msg'] = 'Please select userlists!';
		}
		else 
			$results['msg'] = 'Select user and status!';

		echo json_encode($results);exit();
	}

	public function dead_reason(){
		$data['name'] ="admin";
		$data['heading'] ="Dead Reason";
		$data['results'] = $this->common_model->getDeadReasons();
		$this->load->view('admin/deadReason', $data);
	}

	public function add_dead_reason(){
		$result         = array();
		$result['type'] = 0;

		if($this->input->post('reason')) {
			$exists = $this->common_model->checkExistsDeadReason(['name'=>$this->input->post('reason')]);
			if(!$exists) {
				$params = array(
					'name'		=> $this->input->post('reason'),
					'status'	=> 'Y',
					'entryDate' => date('Y-m-d H:i:s')
				);
				$insId = $this->common_model->insertDeadReason($params);
				if($insId) {
					$result['type'] = 1;
					$result['msg'] = 'Success!';
				}
				else
					$result['msg'] = 'Error!';
			}
			else
				$result['msg'] = 'Already exists!';
		}
		else
			$result['msg'] = 'Enter Reason!';

		$this->output
		->set_status_header(200)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
		->_display();
		exit();
	}

	function dead_reason_delete(){
		$this->load->library('user_agent');
		$id = $this->input->get('id');
		if($id)
			$this->common_model->deleteDeadReasons($id);
		redirect($this->agent->referrer());
	}

	function dead_reason_status(){
		$this->load->library('user_agent');
		$id = $this->input->get('id');
		$sts = $this->input->get('sts');
		if($id && $sts) {
			$params = array(
				'status' => ($sts == 'Y') ? 'N' : 'Y',
			);
			$this->common_model->updateDeadReason($params, $id);
		}
		redirect($this->agent->referrer());
	}

	function tracksCallbacks($userId, $userName, $callbackId){
		$params = array(
			'userId'	=> $userId,
			'userName'	=> $userName,
			'callbackId'=> $callbackId,
			'entryDate' => date('Y-m-d h:i:s')
		);
		$this->callback_model->insertCallbackTracks($params);
	}


	function view_callbacks_lists(){
		$usrId 		= $this->input->get('userId');
		$fromDate 	= $this->input->get('fromDate');
		$toDate 	= $this->input->get('endDate');
		if($usrId && $fromDate && $toDate) {
			$data['name'] = "reports";
			$advisorData = $this->user_model->get_user_data($usrId);
			$data['heading']  = "Callback report for ".$advisorData['first_name']." ".$advisorData['last_name'];
			$data['duration'] = "<strong>From</strong> <em>".$fromDate."</em> <strong>To</strong> <em>".$toDate."</em>";
			
			$clause = "ct.userId =".$usrId." AND ct.entryDate BETWEEN '".$fromDate."' AND '".$toDate."'";
			

			//------- pagination ------
			$rowCount 				= $this->callback_model->countCallbackLists($clause);
			$data["totalRecords"] 	= $rowCount;
			$data["links"] 			= paginitaionWithQueryString(base_url().'admin/view_callbacks_lists/', 3, VIEW_PER_PAGE, $rowCount, $this->input->get());	
			$page = $this->uri->segment(3);
	        $offset = !$page ? 0 : $page;
			//------ End --------------
			$data['result'] = $this->callback_model->getCallbackLists($clause, $offset, VIEW_PER_PAGE);
			$this->load->view('reports/view_callbacks_lists.php', $data);
		}
		else
			show_404();
	}

	function permission_lists() {
		$userId = $this->input->post('id');
		$result = array();
		if($userId) {
            $result['prntModules'] = $this->common_model->getNavbarByClause(['status' => 'Y', 'parentId'=>0]);
            $result['chldModules'] = $this->common_model->getNavbarByClause(['status' => 'Y', 'parentId !='=>0]);
            $fetchData = $this->common_model->checkModulePermission(['userId' => $userId]);
            if($fetchData['accessLists'])
            	$result['userAccess'] = json_decode($fetchData['accessLists'], true);
            echo json_encode($result);
            exit();
		}
		else
			echo 'User Id not found!';
	}

	function post_module_permission(){
		$result = array();
		$result['type'] = 0;
		if($this->input->post('access') && $this->input->post('userId')) {			
			$params = array(
				'userId'		=> $this->input->post('userId'),
				'accessLists'	=> json_encode($this->input->post('access')),
				'entryDate'		=> date('Y-m-d H:i:s')
			);
			$chkExists = $this->common_model->checkModulePermission(['userId' => $this->input->post('userId')]);
			if(!$chkExists){
				$insId = $this->common_model->postAccessQuery($params);			
				$result['type'] = 1;
				$result['msg']  = 'Permission set successfully.';
			}
			else{
				$clause = ['userId' => $this->input->post('userId')];
				if($this->common_model->updateAccessQuery($clause, $params)){
					$result['type'] = 1;
					$result['msg']  = 'Permission update successfully.';
				}
				else
					$result['msg']  = 'Permission update failed!';
			}
		}
		elseif($this->input->post('userId')) {
			$chkExists = $this->common_model->checkModulePermission(['userId' => $this->input->post('userId')]);
			if($chkExists){
				$this->common_model->deleteAccess(['userId' => $this->input->post('userId')]);
				$result['type'] = 1;
				$result['msg']  = 'Permission revoked successfully.';
			}
			else
				$result['msg']  = 'Permission revoked failed!';
		}
		else
			$result['msg']  = 'Please select modules!';

		echo json_encode($result);
		exit();
	}

	function manage_admin(){
		$data['name'] ="admin";
		$data['heading'] ="Manage Admin";
		if($this->input->post()){
			$first_name=$this->input->post('first_name');
			$last_name=$this->input->post('last_name');
			$emp_code=$this->input->post('emp_code');
			$email=$this->input->post('email');			
			$savedata=array(
				'first_name'=>$first_name,
				'last_name'=>$last_name,
				'type'=>5,
				'emp_code'=>$emp_code,
				'email'=>$email,
				'password'=>md5($emp_code),
				'loginid'=>$emp_code,
				'date_added'=>date('Y-m-d H:i:s')
			);
			$this->user_model->add_user($savedata);
		}
		$data['all_admins'] = $this->user_model->all_admins();
		$this->load->view('admin/manage_admin', $data);
	}

	function getPermission($userId){
        $this->load->model('login_model');
        $fetchData = $this->login_model->getModulePermission(['userId' => $userId]);
        //echo '<pre>'; print_r($userId); echo '<pre>';
        $permission = $fetchData['accessLists'];
        $this->session->set_userdata('permissions', $permission);
    }


    function post_sitevisit_data(){
    	$result = array('code' => 0);
    	if($this->input->post('sitevisitdone_date') && $this->input->post('sitevisitdone') ){
			$projects = $this->input->post('sitevisitdone_project_id');
			foreach ($projects as $key => $value) {
				$data=array(
					'callback_id'=>$this->input->post('callback_id'),
					'date'=>$this->input->post('sitevisitdone_date'),
					'project_id'=>$value,
					'type'=>'2',
					'date_added'=>date('Y-m-d H:s:i'),
				);
				$query=$this->callback_model->add_extra_details($data);
			}
			$params = array('flag'=>0);
			$clause = 'id IN ('.$this->input->post('extrxDataIds').')';
			$this->callback_model->update_extra_details($params, $clause);
			$this->session->unset_userdata('siteVisitIds');
			$result['code'] = 1;
		}
		elseif($this->input->post('notdone_date') && $this->input->post('sitevisitnotdone') ){
			$param=array(
				'callback_id'=>$this->input->post('callback_id'),
				'date'=>$this->input->post('notdone_date'),	
				'reason'=>$this->input->post('notdone_reason'),	
				'type'=>'4',
				'date_added'=>date('Y-m-d H:s:i'),
			);
			$query=$this->callback_model->add_extra_details($param);
			$params = array('flag'=>0);
			$clause = 'id IN ('.$this->input->post('extrxDataIds').')';
			$this->callback_model->update_extra_details($params, $clause);
			$this->session->unset_userdata('siteVisitIds');

			$result['code'] = 1;
		}
		else
			$result['code'] = 0;
    	echo json_encode($result);
    	exit();
    }
    public function createXLS() { // create file name $fileName = 'data-'.time().'.xlsx';   //
	//load excel library
	 $this->load->library('excel'); 
	//$empInfo = $this->export->employeeList(); 
	$objPHPExcel = new PHPExcel();
	$objPHPExcel->setActiveSheetIndex(0); // set Header
	$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'No');
	$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Contact Name');
	$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Contact No');
	$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Email');
	$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Project'); 
	$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Lead Source'); 
	$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Lead Id'); 
	$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Advisor'); 
	$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Due date'); 
	$objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Status'); 
	$objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Date Added'); 
	$objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Last Update');  
	$where="";
			$page = $this->uri->segment(3);
	        $offset = !$page ? 0 : $page;
			//------ End --------------

	        $data['result'] = $this->callback_model->search_callback(null,$where,$offset,VIEW_PER_PAGE);
	        	
	 		$this->load->view("admin/exceldownload",$data);

	 		}
	 		public function do_upload()
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['file_name'] = $this->session->userdata('user_id').".jpg";
                $config['overwrite'] = TRUE;
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('file'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        ?><script>alert('failed to upload');</script>
                <?php
                }
                else
                {
                    if($this->session->userdata('profile_pic')=='admin.png')
                    { 
                        $this->user_model->update_profile_pic($this->session->userdata('user_id'));
                        $this->session->userdata('profile_pic',$this->session->userdata('user_id').".jpg");

                    }

                        $data = array('upload_data' => $this->upload->data());
                       // print_r($data);die;
                        if($this->session->userdata('user_type')!='admin')
                        ?><script>alert('success');location.href="<?= base_url('admin'); ?>"</script>
                        <?php     
                        

           }
        }
        public function chat()
        {
        	$data['strTitle']='';
		$data['strsubTitle']='';
		$list=[];
        	$data['name'] = "chat";
        $data['user_id'] = $this->session->userdata('user_id'); 
        $data['user_ids']=$this->user_model->get_city_user_ids('time');
        $data['user_ids'] =json_decode( json_encode($data['user_ids']), true);
        $data['vendorslist']=$data['user_ids'];
		
 		$this->parser->parse('admin/ChatTemplate.php',$data);
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
      //  $id=$this->user_model->get_userid_by_name($this->input->get('receiver_id'));
		$r_id = $this->input->get('receiver_id');
		$receiver_id = $this->OuthModel->Encryptor('decrypt', $this->input->get('receiver_id') );
		/*print_r($receiver_id);die('chill');
		print_r($id);
		 */
        $Logged_sender_id = $this->session->userdata['user_id'];
        $this->session->set_userdata('receiver_id',$r_id);
		$history = $this->ChatModel->GetReciverChatHistory($r_id);
		 
		$this->ChatModel->read_msg($r_id,$Logged_sender_id);
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
	public function update_99acre_credentials($value='')
	 {
	 	if($this->input->post())
	 	{
	 		$username =  $this->input->post('username');
	 		$password = $this->input->post('Password');
	 		$lead = $this->input->post('lead');
	 		$data = array(
	 			'username' => $username,
	 			'password' => $password

	 		);
	 		$bool = $this->common_model->l_s_source_credentials($data,$lead);
	 		if($bool)
	 		{
	 			echo "<script>alert('Credentials updated successfully');location.href='acres99_leads'</script>";
	 			$this->load->view('');
	 		}
	 		else
	 		{
	 			echo "Please contact Your crm developer";
	 		}
	 		
	 	}
	 }

	 public function manage_questions($value='')
	 {
	 		$data['name'] ="admin";
		$data['heading'] ="Manage Questions";
		if($this->input->post()){
			$question=$this->input->post('question'); 
			$savedata=array(
				'question'=>$question, 
			);
			$this->feedback_model->add_question($savedata);
			redirect('admin/manage_questions');
		}
		$data['all_questions'] = $this->feedback_model->all_questions();
		
	 	$this->load->view('feedback/add_question',$data);
	 }
	 public function manage_answers($value='')
	 {
	 		$data['name'] ="admin";
		$data['heading'] ="Manage Answers";
		if($this->input->post()){
			$answer=$this->input->post('answer'); 
			$savedata=array(
				'answers'=>$answer, 
			);
			$this->feedback_model->add_answer($savedata);
			redirect('admin/manage_answers');
		}
		$data['all_answers'] = $this->feedback_model->all_answers();
		
	 	$this->load->view('feedback/add_answer',$data);
	 }
	 public function feedback_qa($value='')
	 {
	 		$data['name'] ="admin";
		$data['heading'] ="Feedback Form";
		if($this->input->post()){
		
        $savedata = array(
            'q_id' => $this->input->post('question'),
            'a_id1' => $this->input->post('option1'),
            'a_id2' => $this->input->post('option2'),
            'a_id3' => $this->input->post('option3')?$this->input->post('option3'):'0',
            'a_id4' => $this->input->post('option4')?$this->input->post('option4'):'0',
            'a_id5' => $this->input->post('option5')?$this->input->post('option5'):'0',
            'a_id6' => $this->input->post('option6')?$this->input->post('option6'):'0'
        );
        $this->feedback_model->add_qa($savedata);
			redirect('admin/feedback_qa');
		}
		$data['all_questions'] = $this->feedback_model->all_questions(array('active'=>1));
		$data['all_answers'] = $this->feedback_model->all_answers();
		$data['q_a'] = $this->feedback_model->all_qa();
		
	 	$this->load->view('feedback/add_feedback_from',$data);
	 }

	 public function change_status_feedback($value='')
	 {
	 	$id=$this->input->post('id');
		$newStatus = $this->common_model->toggle_status('feedback_qa',$id);
		$data = array(
			'id' => $id,
			'active' => $newStatus
		);
		header('Content-Type: application/json');
		echo json_encode($data);
	 }
	 public function change_status_question($value='')
	 {
	 	$id=$this->input->post('id');
		$newStatus = $this->feedback_model->toggle_status('feedback_questions',$id);
		$data = array(
			'q_id' => $id,
			'active' => $newStatus
		);
		header('Content-Type: application/json');
		echo json_encode($data);
	 }
	 public function feedback_submissions($value='')
	 {

	 	$data['name'] ="admin";
		$data['heading'] ="Submitted Feedback Forms";
		$data['feedbacks'] = $this->feedback_model->all_submitted_feedbacks();
		$data['feedbacks'] = json_decode(json_encode($data['feedbacks']),true);
		//print_r($data['feedbacks']);die;	
	 	$this->load->view('feedback/feedback_submissions',$data);
	 }

	 public function view_feedback($l_id='')
	 {
	 	$data['l_id'] = $l_id;
	 	$id = $this->input->get('id'); 
	 	$data['print'] = $this->input->get('print'); 
		$data['feedbacks'] = $this->feedback_model->all_submitted_feedbacks($l_id,$id);
		$data['feedbacks'] = json_decode(json_encode($data['feedbacks']),true);
	 	$this->load->view('feedback/view_feedback',$data);
	 }

	 public function print_feedback( )
	 {
	 	$l_id= $this->input->post('lead_id');
	 	//$id = $this->input->get('id'); 
	 	//$data['print'] = $this->input->get('print'); 
		$data['feedbacks'] = $this->feedback_model->all_submitted_feedbacks($l_id);
		$data['feedbacks'] = json_decode(json_encode($data['feedbacks']),true);
	 	$this->load->view('feedback/print_feedback',$data);
	 }
	 public function delete_online_lead()
	{
		//echo "<script>alert('deletting macha');location.href='http://localhost:8082/admin/magicbricks_leads'</script>";
		$lead_id =  $this->uri->segment(3);
		$controller_name= $this->uri->segment(4);
		$lead_id = array('id'=>$lead_id);
		$bool = $this->common_model->updateWhere($lead_id);
		if($bool)
		{
			echo "<script>location.href='".base_url().'admin/'.$controller_name."';</script>";
		}


	}
		public function admin_dashboard(){
			$data['name'] ="admin";
		$data['heading'] ="Active Employees";
			$data['last_login'] = $this->user_model->get_live_feed_back();
			$this->load->view('reports/view_active_emp.php', $data);
 
	}
public function make_user_online($value='')
	{
		$this->db->simple_query('update user set todaytimer = todaytimer+5 where Id ='. $this->session->userdata('user_id'));
		$where = array('id'=>$this->session->userdata('user_id'));
		$data = array('last_update'=>date('Y-m-d H:i:s'));
		$bool = $this->callback_model->updateWhere($where,$data,'user');
		if($bool)
		echo 'success';
		else
		echo 'error';

	}
	public function track_users($value='')
	{
	$data['name'] ="admin";
		$data['heading'] ="User Track Records";
		$data['trcking_data'] = $this->common_model->track_users();
		if($value)
		{
			$subject="Users Login Report";
			$mail_body = $this->load->view("reports/user_track_report", $data, true);
			$to_emails ="info@secondsdigital.com,shiva@secondsdigital.com"; 
			$this->load->library('email');
			$config = email_config();
			
			$this->email->initialize($config);
			$this->email->from("admin@leads.com","Admin");
			$this->email->to($to_emails);
			$this->email->subject($subject);
			$this->email->message($mail_body);
			//$this->email->send();
			if($this->email->send())
				echo "Success";
		}
		else
		$this->load->view('admin/track_users',$data);
	}

	public function resitevisit($value='')
	{
		$data['heading'] = "Users Re Site Visit Report";
		$data['name'] ="Re Site Visit Report"; 
		$data['result'] = $this->callback_model->resitevisit();
		$this->load->view('reports/resitevisit',$data);
	}
	public function site_visit_dead($fromDate='',$toDate='')
	{
		$data['heading'] = "Users Site Visit Dead Report";
		$data['name'] ="Site Visit Dead Report"; 
		$data['view_page'] ="reports/site_visit_dead"; 
		$date = explode(' ', $fromDate);
		$fromDate = $date[0];
		$date = explode(' ', $toDate);
		$toDate = $date[0];
		$rowCount 				= 1000;//$this->callback_model->Count_site_visit_dead($fromDate,$toDate);
		$data["totalRecords"] 	= $rowCount;
		$data["links"] 			= paginitaion(base_url().'admin/site_visit_dead/', 3,VIEW_PER_PAGE, $rowCount);
		$page = $this->uri->segment(3);
        $offset = !$page ? 0 : $page;
		//------ End --------------
		$data['result'] = $this->callback_model->site_visit_dead($offset,VIEW_PER_PAGE,$fromDate,$toDate);
		//echo $this->db->last_query();die;
		//echo $this->db->last_query();
		//$this->load->view('reports/site_visit_dead_id',$data);
		return $data;
	}

	
	public function site_visit_dead_by_id($fromDate='',$toDate='',$user_id='')
	{
		$data['heading'] = "Users Site Visit Dead Report ";
		$data['name'] ="Site Visit Dead Report"; 
		//$data['view_page'] ="reports/site_visit_dead"; 
		$date = explode(' ', $this->input->get('fromDate'));
		$fromDate = $date[0];
		$date = explode(' ', $this->input->get('toDate'));
		$toDate = $date[0];
		$data['fromDate'] = $fromDate;
		$data['toDate'] = $toDate;
		$user_id = $this->input->get('user_id');
		$rowCount 				= 1000;//$this->callback_model->Count_site_visit_dead($fromDate,$toDate);
		$data["totalRecords"] 	= $rowCount;
		$data["links"] 			= paginitaion(base_url().'admin/site_visit_dead/', 3,VIEW_PER_PAGE, $rowCount);
		$page = $this->uri->segment(3);
        $offset = !$page ? 0 : $page;
		//------ End --------------
		$data['result'] = $this->callback_model->site_visit_dead($offset,VIEW_PER_PAGE,$fromDate,$toDate,$user_id);
//echo $this->db->last_query();die;
		//print_r($data);
		$this->load->view('reports/site_visit_dead_id',$data);
	}
	public function re_site_visit($fromDate='',$toDate='')
	{
		$data['heading'] = "Users Re Site Visits Report";
		$data['name'] ="Re Site Visit  Report"; 
		$data['view_page'] ="reports/re_site_visit"; 
		$date = explode(' ', $fromDate);
		$fromDate = $date[0];
		$date = explode(' ', $toDate);
		$toDate = $date[0];
		$rowCount 				= 1000;//$this->callback_model->Count_site_visit_dead($fromDate,$toDate);
		$data["totalRecords"] 	= $rowCount;
		$data["links"] 			= paginitaion(base_url().'admin/re_site_visit', 3,VIEW_PER_PAGE, $rowCount);
		$page = $this->uri->segment(3);
        $offset = !$page ? 0 : $page;
		//------ End --------------
		$data['result'] = $this->callback_model->re_site_visit($offset,VIEW_PER_PAGE,$fromDate,$toDate);
		//echo $this->db->last_query();die;
		//echo $this->db->last_query();
		//$this->load->view('reports/site_visit_dead_id',$data);
		return $data;
	}
	
	public function re_site_visit_by_id($fromDate='',$toDate='',$user_id='')
	{
		$data['heading'] = "Users Re Site Visit  Report ";
		$data['name'] ="Re Site Visit Report"; 
		//$data['view_page'] ="reports/site_visit_dead"; 
		$date = explode(' ', $this->input->get('fromDate'));
		$fromDate = $date[0];
		$date = explode(' ', $this->input->get('toDate'));
		$toDate = $date[0];
		$data['fromDate'] = $fromDate;
		$data['toDate'] = $toDate;
		$user_id = $this->input->get('user_id');
		$rowCount 				= 1000;//$this->callback_model->Count_site_visit_dead($fromDate,$toDate);
		$data["totalRecords"] 	= $rowCount;
		$data["links"] 			= paginitaion(base_url().'admin/re_site_visit_by_id/', 3,VIEW_PER_PAGE, $rowCount);
		$page = $this->uri->segment(3);
        $offset = !$page ? 0 : $page;
		//------ End --------------
		$data['result'] = $this->callback_model->re_site_visit($offset,VIEW_PER_PAGE,$fromDate,$toDate,$user_id);
//echo $this->db->last_query();die;
		//print_r($data);
		$this->load->view('reports/re_site_visit_by_id',$data);
	}
	 

}
