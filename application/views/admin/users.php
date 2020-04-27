<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    if($this->session->userdata("user_type") == "admin")
        $this->load->view('inc/admin_header');
    else
        $this->load->view('inc/header');    
?>
<body>
	 <div class="se-pre-con"></div>
   <div class="page-container">
   <!--/content-inner-->
	<div class="left-content">
	   <div class="inner-content">
		<!-- header-starts -->
			<div class="header-section">
						<!--menu-right-->
						<div class="top_menu">
						        <!--<div class="main-search">
											<form>
											   <input type="text" value="Search" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Search';}" class="text"/>
												<input type="submit" value="">
											</form>
									<div class="close"><img src="<?php echo base_url()?>assets/images/cross.png" /></div>
								</div>
									<div class="srch"><button></button></div>
									<script type="text/javascript">
										 $('.main-search').hide();
										$('button').click(function (){
											$('.main-search').show();
											$('.main-search text').focus();
										}
										);
										$('.close').click(function(){
											$('.main-search').hide();
										});
									</script>
							<!--/profile_details-->
								<div class="profile_details_left">
									<?php $this->load->view('notification');?>
							</div>
							<div class="clearfix"></div>	
							<!--//profile_details-->
						</div>
						<!--//menu-right-->
					<div class="clearfix"></div>
				</div>
					<!-- //header-ends -->
						<div class="outter-wp">

<div class="container">    
    <div class="page-header">
        <h1><?php echo $heading; ?></h1>
    </div>
    <style type="text/css">
        textarea {
        width: 100%;
        height: 150px;
        padding: 12px 20px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #f8f8f8;
        resize: none;
      }
      .table-striped {
	    border: #e1e0e0 1px solid;
	}
	.table-striped th {
	    text-align: left;
	    background: #f0F0F0;
	    padding: 10px;
	}
	.table-striped td {
	    border-bottom: #e1e0e0 1px solid;
	    padding: 10px;
	}
	@media (max-width: 991px){
        .priority-2,.priority-5,.priority-6,.priority-7,.priority-8{
			display:none;
		}
        .table td, .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    /* padding: 10px 5px !important; */
    font-size: 0.8em;
    color: #999;
    border-top: none !important;
    width: 0%;
}
        .btn {
    cursor: pointer;
    margin: 10px;
    border-radius: 0;
    text-decoration: none;
    padding: 2px 2px;
    font-size: 13px;
    }
        }
        @media (max-width:1150px){
        .priority-2,.priority-5,.priority-6,.priority-7,.priority-8{
			display:none;
		}
        }
       
	@media screen (max-width: 900px){
		.priority-2,.priority-4,.priority-5,.priority-6, .priority-7,.priority-8{
			display:none;
		}
        .table td, .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    /* padding: 10px 5px !important; */
    font-size: 0.8em;
    color: #999;
    border-top: none !important;
    width: 0%;
        }
                .btn {
            cursor: pointer;
            margin: 10px;
            border-radius: 0;
            text-decoration: none;
            padding: 2px 2px;
            font-size: 13px;
        }

        .plus {
                background-color: #5bc0de;
                border: none;
                margin-bottom: 11px;
                float: right;
                color: white;
                border-radius: 6px;
                padding: 5px 7px;
                font-size: 11px;
                cursor: pointer;
    }
	}
	


    @media (max-width: 384px){
        /* .left-content {
    width: 89%;
    } */
        }

	
	@media screen (max-width: 300px) {
        .priority-2,.priority-4,.priority-5,.priority-6, .priority-7,.priority-8,{
			display:none;
		}
        .table td, .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    /* padding: 10px 5px !important; */
    font-size: 0.8em;
    color: #999;
    border-top: none !important;
    width: 0%;
}
        .btn {
    cursor: pointer;
    margin: 10px;
    border-radius: 0;
    text-decoration: none;
    padding: 2px 2px;
    font-size: 13px;
  }
  
     
	
	}
    .plus{
        background-color: #5bc0de;
        border: none;
        margin-bottom: 11px;
        float: right;
        color: white;
        border-radius: 6px;
        padding: 7px 15px;
        font-size: 14px;
        cursor: pointer;
    }
 </style>
    <button class="plus"  onclick="myFunction()"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add User</button>
    <br>
    <br>
      <div id="myDIV" style="display:none;">
             <form name="save_seller_form" id="save_seller_form" method="POST" enctype="multipart/form-data">
                <div class="col-sm-6 form-group">
                    <label for="emp_code">Employee Code:</label>
                    <input type="text" class="form-control" id="emp_code" onblur="code_check(this.value)" name="emp_code" placeholder="Employee Code" required="required">
                </div>
                <div class="col-sm-6 form-group">
                    <label for="emp_first_name">First name:</label>
                    <input type="text" class="form-control" id="emp_first_name" name="first_name" placeholder="Employee first name" required="required">
                </div>
                <div class="col-sm-6 form-group">
                    <label for="emp_last_name">Last name:</label>
                    <input type="text" class="form-control" id="emp_last_name" name="last_name" placeholder="Employee last name" required="required">
                </div>
                <div class="col-sm-6 form-group">
                    <label for="email">Email Id:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Employee Enter email" required="required">
                </div>
                <div class="col-sm-6 form-group">
                    <label for="emp_dob">D.O.B:</label>
                    <input type="text" class="form-control datepicker" id="emp_dob" name="emp_dob" placeholder="Employee Date Of Birth" readonly required="required">
                </div>
                <div class="col-sm-6 form-group">
                    <label for="emp_doj">D.O.J:</label>
                    <input type="text" class="form-control datepicker" id="emp_doj" name="emp_doj" placeholder="Employee Date Of Joining" readonly required="required">
                </div>
                <div class="col-sm-6 form-group">
                    <label for="emp_last_name">Mobile Number:</label>
                    <input type="text" class="form-control" id="emp_last_name" name="employee_mobile" placeholder="Employee Mobile Number" required="required">
                </div>
                <div class="col-sm-6 form-group">
                    <label for="emp_last_name">Address:</label>
                    <textarea name="employee_address"></textarea>
                </div>
                <div class="col-md-6 form-group">
                    <label for="emp_code">Manager:</label>
                    <select  class="form-control"  id="manager" name="manager" required="required" >
                        <option value="">Select</option>
                        <?php $all_manager=$this->common_model->all_active_managers();
                        foreach($all_manager as $manager){ ?>
                            <option value="<?php echo $manager->id; ?>"><?php echo $manager->first_name." ".$manager->last_name; ?></option>
                        <?php }?>
                    </select>
                </div>

                <div class="col-md-6 form-group">
                    <label for="emp_code">User type:</label>
                    <select  class="form-control"  id="select_user" name="select_user" required="required" >
                        <option value="user">User</option>
                        <option value="crm">CRM</option>
                    </select>
                </div>

                <div class="col-md-6 form-group">
                    <label for="emp_code">Deprtment:</label>
                    <select  class="form-control"  id="user_type" name="department" required="required" >
                        <option value="">Select</option>
                        <?php $all_department=$this->common_model->all_active_departments();
                        foreach($all_department as $department){ ?>
                            <option value="<?php echo $department->id; ?>"><?php echo $department->name; ?></option>
                        <?php }?>
                    </select>
                </div>
                
                <div class="col-md-6 form-group">
                    <label for="emp_code">City:</label>
                    <select  class="form-control"  id="user_type" name="city" required="required" >
                        <option value="">Select</option>
                        <?php $all_city=$this->common_model->all_active_cities();
                        foreach($all_city as $city){ ?>
                            <option value="<?php echo $city->id; ?>"><?php echo $city->name; ?></option>
                        <?php }?>
                    </select>
                </div>

                <button type="submit" id="add_user" class="btn btn-success btn-block" disabled>Submit</button>
            </form>
      </div>

<div class="container">
    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="priority-1" style="width:30%;">No</th>
                <th class="priority-2" style="width:30%;">Employee Code</th>
                <th class="priority-3" style="width:30%;">First name</th>
                <th class="priority-4" style="width:30%;">Last name</th>
                <th class="priority-5" style="width:30%;">E-mail Id</th>
                <th class="priority-6" style="width:30%;">Manager</th>
                <th class="priority-7" style="width:30%;">Status</th>
                <th class="priority-8" style="width:30%;">Edit</th>
                <th class="priority-9" style="width:30%;">Change Password</th> 
                <th class="priority-10" style="width:30%;">Privilege</th>
            </tr>
        </thead> 
        <tbody>
            <?php if(isset($all_user)){
                foreach($all_user as $user){ ?>
                    <tr>
                        <td class="priority-1" style="width:30%;"><?php echo $user->id; ?></td>
                        <td class="priority-2" style="width:30%;"><?php echo $user->emp_code; ?></td>
                        <td class="priority-3" style="width:30%;"><?php echo $user->first_name; ?></td>
                        <td class="priority-4" style="width:30%;"><?php echo $user->last_name; ?></td>
                        <td class="priority-5" style="width:30%;"><?php echo $user->email; ?></td>
                        <td class="priority-6" style="width:30%;"><?php echo $user->reports_to; ?></td>
                        <td class="priority-7"  style="width:30%;vertical-align:middle;"><button type="button" id="b1<?php echo $user->id; ?>" class="btn <?php echo $user->active?'btn-info':'btn-danger'; ?>" onclick="change_state(<?php echo $user->id; ?>)"><span id="stateus_sp_<?php echo $user->id; ?>"><?php echo $user->active?'Active':'Inactive';?></span></button></td>
                        <td class="priority-8" style="width:30%;vertical-align:middle;"><button type="button" class="btn btn-info" onclick="edit_user(<?php echo $user->id; ?>)" data-toggle="modal" data-target="#modal_edit">Edit</button></td>
                        <td class="priority-9" style="width:30%;vertical-align:middle;"><button type="button" class="btn btn-info" onclick="reset_password(<?php echo $user->id; ?>)">Reset Password</button></td>
                        <td class="priority-10" style="width:30%;vertical-align:middle;">
                            <button type="button" class="btn btn-info" onclick="permissionModal(<?php echo $user->id; ?>)" data-toggle="modal" data-target="#modalPermission">Permission</button>
                        </td>
                    </tr>
                <?php } 
            } ?>

        </tbody>
    </table>
    
    <div style="margin-top: 20px">
        <span class="pull-left"><p>Showing <?php echo ($this->uri->segment(3)) ? $this->uri->segment(3)+1 : 1; ?> to <?= ($this->uri->segment(3)+count($all_user)); ?> of <?= $totalRecords; ?> entries</p></span>
        <ul class="pagination pull-right"><?php echo $links; ?></ul>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_edit" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit User</h4>
                <div class="modal-body">
                    <input type="hidden" id="hid" name="hid">
                    
                    <div class="col-sm-6 form-group">
                        <label for="emp_code">Employee Code:</label>
                        <input type="text" class="form-control" id="m_emp_code" name="emp_code" placeholder="Employee Code" disabled="disabled">
                    </div>

                    <div class="col-sm-6 form-group">
                        <label for="emp_code">First name:</label>
                        <input type="text" class="form-control" id="m_first_name" name="m_first_name" placeholder="First name">
                    </div>

                    <div class="col-sm-6 form-group">
                        <label for="emp_code">Last name:</label>
                        <input type="text" class="form-control" id="m_last_name" name="m_last_name" placeholder="Last name">
                    </div>

                    <div class="col-sm-6 form-group">
                        <label for="emp_code">Email-id:</label>
                        <input type="text" class="form-control" id="m_email" name="m_email_id" placeholder="Email id">
                    </div>
                    <div class="col-sm-6 form-group">
                    <label for="emp_last_name">Mobile Number:</label>
                    <input type="text" class="form-control" id="m_employee_mobile" name="m_employee_mobile" placeholder="Employee Mobile Number" required="required">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="emp_last_name">Address:</label>
                        <textarea id="m_employee_address"name="m_employee_address"></textarea>
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="emp_code">Manager:</label>
                        <select  class="form-control"  id="m_manager" name="manager" required="required" >
                            <option value="">Select</option>
                            <?php $all_manager=$this->common_model->all_active_managers();
                            foreach($all_manager as $manager){ ?>
                                <option value="<?php echo $manager->id; ?>"><?php echo $manager->first_name." ".$manager->last_name; ?></option>
                            <?php }?>
                        </select>
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="emp_code">User type:</label>
                        <select  class="form-control"  id="m_select_user" name="select_user" required="required" >
                            <option value="user">User</option>
                            <option value="crm">CRM</option>
                            <option value="manager">Manager</option>
                            <option value="vp">VP</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="emp_code">Deprtment:</label>
                        <select  class="form-control"  id="m_dept_id" name="department" required="required" >
                            <option value="">Select</option>
                            <?php $all_department=$this->common_model->all_active_departments();
                            foreach($all_department as $department){ ?>
                                <option value="<?php echo $department->id; ?>"><?php echo $department->name; ?></option>
                            <?php }?>
                        </select>
                    </div>
                      
                    <div class="col-md-6 form-group">
                        <label for="emp_code">City:</label>
                        <select  class="form-control"  id="m_city_id" name="city" required="required" >
                            <option value="">Select</option>
                            <?php $all_city=$this->common_model->all_active_cities();
                            foreach($all_city as $city){ ?>
                                <option value="<?php echo $city->id; ?>"><?php echo $city->name; ?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="update_user()">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_password" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>password change section</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
   

    function edit_user(v){
        $(".se-pre-con").show();
        //console.log(v);
        $("#hid").val(v);
        $.ajax({
            type:"POST",
            url: "<?php echo base_url()?>admin/get_user_data",
            data:{id:v},
            success:function(data) {
                
                data = JSON.parse(data);
                var city_id=data.city_id;
                var dept_id=data.dept_id;
                var email=data.email;
                var first_name=data.first_name;
                var last_name=data.last_name;
                var reports_to=data.reports_to;
                var select_user=data.select_user;
                var emp_code=data.emp_code;
                var mobile=data.mobile_number;
                var address=data.address;
                
                $("#m_emp_code").val(emp_code);
                $("#m_first_name").val(first_name);
                $("#m_last_name").val(last_name);
                $("#m_email").val(email);
                $("#m_manager").val(reports_to);
                $("#m_select_user").val(select_user);
                $("#m_dept_id").val(dept_id);
                $("#m_city_id").val(city_id);
                $("#m_employee_address").val(address);
                $("#m_employee_mobile").val(mobile);
                $(".se-pre-con").hide("slow");
            }
        });
    }

    function reset_password(id){
        $(".se-pre-con").show();
        $.get("<?php echo base_url()?>admin/reset_password/"+id,function(response){
            $(".se-pre-con").hide("slow");
            if(response.status)
                alert("Success");
        })
    }
    
    function update_user(){
        $(".se-pre-con").show();
        
        var first_name=$("#m_first_name").val();
        var last_name=$("#m_last_name").val();
        var email=$("#m_email").val();
        var reports_to=$("#m_manager").val();
        var select_user=$("#m_select_user").val();
        var dept_id=$("#m_dept_id").val();
        var city_id=$("#m_city_id").val();
        var emp_address=$("#m_employee_address").val();
        var emp_mobile=$("#m_employee_mobile").val();

        console.log(emp_mobile);
 
        var id=$("#hid").val(); 
            
        $.ajax({
            type:"POST",
            url: "<?php echo base_url()?>admin/update_user/"+id,
            data:{
                first_name:first_name,
                last_name:last_name,
                email:email,
                reports_to:reports_to,
                select_user:select_user,
                dept_id:dept_id,
                city_id:city_id,
                address:emp_address,
                mobile_number:emp_mobile
            },
            success:function(data) {
                data = JSON.parse(data);
                if(data.response){
                    alert("success");
                }
                location.reload();
            }
        });
    }
            
    function code_check(name){
        $('#add_user').prop('disabled', true);
        $(".se-pre-con").show();
        $.ajax({
            type:"POST",
            url: "<?php echo base_url()?>admin/check_user",
            data:{code:name},
            success:function(data){
                if(data.count){
                    alert("Duplicate Code! try again");
                    $('#emp_code').val('');
                }
                else
                    $('#add_user').prop('disabled', false);
                $(".se-pre-con").hide("slow");
            }
        });
    }

    function change_state(id){
        $(".se-pre-con").show();
        $.ajax({
            type:"POST",
            url: "<?php echo base_url()?>admin/change_status_user",
            data:{id:id},
            success:function(data) {
                if(data.active){
                    $('#stateus_sp_'+id).text('Active');
                    $('#b1'+id).removeClass("btn-danger");
                    $('#b1'+id).addClass("btn-info");
                }else{
                    $('#stateus_sp_'+id).text('Inactive');
                    $('#b1'+id).removeClass("btn-info");
                    $('#b1'+id).addClass("btn-danger");
                }
                $(".se-pre-con").hide("slow");
            }
        });
    }

    
</script>

</body>

</html>
						</div><!--/tabs-->
										 <div class="tab-main">
											 <!--/tabs-inner-->
												
												</div>
											  <!--//tabs-inner-->

									 <!--footer section start-->
										<footer>
										   <p>&copy <?= date('Y')?> Seconds Digital . All Rights Reserved | Design by <a href="https://secondsdigital.com/" target="_blank">Seconds Digital Solutions.</a></p>
										</footer>
									<!--footer section end-->
								</div>
							</div>
				<!--//content-inner-->
			<!--/sidebar-menu-->
				<div class="sidebar-menu">
					<header class="logo"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
					<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a>  <span id="logo"> <h1>FBP</h1></span> 
					<!--<img id="logo" src="" alt="Logo"/>--> 
				  </a> 
				</header>
			<div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
			<!--/down-->
							<div class="down">	
									  <?php $this->load->view('profile_pic');?>
									  <span class=" name-caret"><?php echo $this->session->userdata('user_name'); ?></span>
									   <p><?php echo $this->session->userdata('user_type'); ?></p>
									
									<ul>
									<li><a class="tooltips" href="<?= base_url('dashboard/profile'); ?>"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
										<li><a class="tooltips" style=" color: #00C6D7 !important; " href="#"><span>Team Size</span><?php if($this->session->userdata("manager_team_size")) echo $this->session->userdata("manager_team_size")?$this->session->userdata("manager_team_size"):''?></a></li>
										<li><a class="tooltips" href="<?php echo base_url()?>login/logout"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
										</ul>
									</div>
							   <!--//down-->
                           <?php $this->load->view('inc/header_nav'); ?>
							  </div>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/vroom.css">
<script type="text/javascript" src="<?php echo base_url()?>assets/js/vroom.js"></script>-->
<!-- <script type="text/javascript" src="<?php echo base_url()?>assets/js/TweenLite.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/CSSPlugin.min.js"></script>
<script src="<?php echo base_url()?>assets/js/scripts.js"></script>-->
<script src="<?= base_url();?>assets/js/custom.js"></script>
<!-- Bootstrap Core JavaScript -->
   
   <script>
    $(document).ready(function() {
         $('#example').DataTable({
              "paging":   false,
              "info": false
 
        });
        if (!Modernizr.inputtypes.date) {
            // If not native HTML5 support, fallback to jQuery datePicker
            $('input[type=date]').datepicker({
                // Consistent format with the HTML5 picker
                    dateFormat : 'dd/mm/yy'
                }
            );
        }
        if (!Modernizr.inputtypes.time) {
            // If not native HTML5 support, fallback to jQuery timepicker
            $('input[type=time]').timepicker({ 'timeFormat': 'H:i' });
        }
        $('#revenueMonth').MonthPicker({
            Button: false
        });
       

        $("#refresh").click(function(){
            $(".se-pre-con").show();
            $.get("<?php echo base_url(); ?>dashboard/get_live_feed_back", function(response){
                $("#live_feed_back_body").html(response);
                $(".se-pre-con").hide("slow");
            });
        });

        $("#overdue_lead_count").click(function(){
            var form = document.createElement('form');
            form.method = "POST";
            form.action = "<?php echo base_url()."dashboard/generate_report" ?>";
            
            var input = document.createElement('input');
            input.type = "text";
            input.name = "toDate";
            input.value = $(this).data('datetime');
            form.appendChild(input);

            input = document.createElement('input');
            input.type = "text";
            input.name = "reportType";
            input.value = "due";
            form.appendChild(input);

            document.body.appendChild(form);
            form.submit();
        });

        $('.emailSiteVisit').on('click', function(){
            $(".se-pre-con").show();
            $.ajax({
                type : 'POST',
                url : "<?= base_url('site-visit-report-mail');?>",
                data:1,
                success: function(res){
                    $(".se-pre-con").hide("slow");
                    if(res == 1)
                        alert('Email Sent Successfully.');
                    else
                        alert('Email Sent fail!');
                }
            });
        });

    });
   

</script>

<script>
    function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
    </script>
</body>
</html>