<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class UserModel extends CI_Model {



  	public function __construct()

        {

                parent::__construct();

                // Your own constructor code

        }

	

	private $User = 'user';

 

	

  	public function GetUserData()

	{  

 		$this->db->select('id,first_name,last_name,email,about,mobile_no,address,address_2,state,city,country,profile_pic,pincode');

		$this->db->from($this->User);

		$this->db->where("id",$this->session->userdata['user_id']);

		$this->db->limit(1);

  		$query = $this->db->get();

 		if ($query) {

			 return $query->row_array();

		 } else {

			 return false;

		 }

   	}

	public function IfExistEmail($email){

		 

		 $this->db->select('id, email'); 

		 $this->db->from($this->User);

		 $this->db->where('email', $email);

		 $query = $this->db->get();

		 if ($query->num_rows() != 0) {

			  return $query->row_array();

		 } else {

			 return false;

		 }

	}

	

	public function PictureUrl()

	{  

 		$this->db->select('id,profile_pic');

		$this->db->from($this->User);

		$this->db->where("id",$this->session->userdata['Admin']['id']);

		$this->db->limit(1);

  		$query = $this->db->get();

		$res = $query->row_array();

		if(!empty($res['profile_pic'])){

			return base_url('uploads/'.$res['profile_pic']);

		}else{

			return base_url('public/images/user-icon.jpg');

		}

   	}

	public function PictureUrlById($id)

	{  

 		$this->db->select('id,profile_pic');

		$this->db->from($this->User);

		$this->db->where("id",$id);

		$this->db->limit(1);

  		$query = $this->db->get();

		$res = $query->row_array();

		if(!empty($res['profile_pic'])){

			return base_url('uploads/'.$res['profile_pic']);

		}else{

			return base_url('public/images/user-icon.jpg');

		}

   	}

	

	

	public function GetName($id)

	{  

 		$this->db->select('id,first_name');

		$this->db->from($this->User);

		$this->db->where("id",$id);

		$this->db->limit(1);

  		$query = $this->db->get();

		$res = $query->row_array();

 		return $res['first_name'];

		 

   	}
	
	public function GetIDByName($name)

	{  

 		$this->db->select('id,first_name');

		$this->db->from($this->User);

		$this->db->where("first_name",$name);

		$this->db->limit(1);

  		$query = $this->db->get();

		$res = $query->row_array();

 		return $res['id'];

		 

   	}

	

	public function GetUserAddress($id)

	{  

 		$this->db->select('id,email,mobile_no,address,address_2,city,state,pincode,language');

		$this->db->from($this->User);

		$this->db->where("id",$id);

		$this->db->limit(1);

  		$query = $this->db->get();

		$res = $query->row_array();

 		return $res;

		 

   	}

	

	

	

	

	public function UpdateProfileImageByID($data)

	{  

 		$res = $this->db->update($this->User, $data ,['id' => $this->session->userdata['Admin']['id'] ] ); 

		if($res == 1)

			return true;

		else

			return false;

 	}

	

	public function UpdateCustomerProfileImageByID($data)

	{  

 		$res = $this->db->update($this->User, $data ,['id' => $this->session->userdata['User']['id'] ] ); 

		if($res == 1)

			return true;

		else

			return false;

 	}

	

	 public function GetUserDataById($id) 

	{  

 		$this->db->select('id,name,first_name,last_name,email,about,mobile_no,address,address_2,state,city,country,profile_pic,pincode');

		$this->db->from($this->User);

		$this->db->where("id",$id);

		$this->db->limit(1);

  		$query = $this->db->get();

 		if ($query) {

			 return $query->row_array();

		 } else {

			 return false;

		 }

   	}

	

	public function GetMemberNameById($id) 

	{  

 		$this->db->select('id,name');

		$this->db->from($this->User);

		$this->db->where("id",$id);

		$this->db->limit(1);

  		$query = $this->db->get();

 		$u=$query->row_array();

		return $u['name'];

		  

   	}

	

	public function AddMember($data)

	{  

		$res = $this->db->insert($this->User,$data);

		if($res == 1)

			return $this->db->insert_id();

		else

			return false;	

  	}

	

	

	

	public function StatusUpdateByID($user_id,$status)

	{  

 

 		$res = $this->db->update($this->User,['status' => $status],['id' => $user_id ] ); 

		if($res == 1)

			return true;

		else

			return false;

 	}

	

	

	public function TrashByID($user_id)

	{  

 

 		$res = $this->db->delete($this->User,['id' => $user_id ] ); 

		if($res == 1)

			return true;

		else

			return false;

 	}

 

 

 	public function AllRoleTypes($role) 

	{  

 		$this->db->select('id,name');

		$this->db->from($this->User);

		$this->db->where("role",$role);

   		$query = $this->db->get();

 		$u=$query->num_rows();

		return $u;

		  

   	}

	

	public function VendorsList() 

	{  

 		$this->db->select('id,name,profile_pic');

		$this->db->from('users');

		$this->db->where("status","1");

   		$query = $this->db->get();

 		$r=$query->result_array();

		return $r;

   	}

	public function ClientsListCs() 

	{  

 		$this->db->select('id,name,profile_pic');

		$this->db->from('users');

		$this->db->where("status","1");

   		$query = $this->db->get();

 		$r=$query->result_array();

		return $r;

   	}
   	

	

	

 }

