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
                                    <ul class="nofitications-dropdown">
                                            <li class="dropdown note dra-down">
                                            <script type="text/javascript">
            
                                            function DropDown(el) {
                                                this.dd = el;
                                                this.placeholder = this.dd.children('span');
                                                this.opts = this.dd.find('ul.dropdown > li');
                                                this.val = '';
                                                this.index = -1;
                                                this.initEvents();
                                            }
                                            DropDown.prototype = {
                                                initEvents : function() {
                                                    var obj = this;

                                                    obj.dd.on('click', function(event){
                                                        $(this).toggleClass('active');
                                                        return false;
                                                    });

                                                    obj.opts.on('click',function(){
                                                        var opt = $(this);
                                                        obj.val = opt.text();
                                                        obj.index = opt.index();
                                                        obj.placeholder.text(obj.val);
                                                    });
                                                },
                                                getValue : function() {
                                                    return this.val;
                                                },
                                                getIndex : function() {
                                                    return this.index;
                                                }
                                            }

                                            $(function() {

                                                var dd = new DropDown( $('#dd') );

                                                $(document).click(function() {
                                                    // all dropdowns
                                                    $('.wrapper-dropdown-3').removeClass('active');
                                                });

                                            });

                                            </script>
                                            </li>
                                           <li class="dropdown note">
                                            <a href="<?= base_url('admin/chat') ?>" class="" data-toggle="" aria-expanded="false"><i class="fa fa-envelope-o"></i> <span class="badge"></span></a>

                                                
                                                    <ul class="dropdown-menu two first">
                                                        <li>
                                                            <div class="notification_header">
                                                                <h3>You have 3 new messages  </h3> 
                                                            </div>
                                                        </li>
                                                        <li><a href="#">
                                                           <div class="user_img"><img src="<?php echo base_url()?>assets/images/1.jpg" alt=""></div>
                                                           <div class="notification_desc">
                                                            <p>Lorem ipsum dolor sit amet</p>
                                                            <p><span>1 hour ago</span></p>
                                                            </div>
                                                           <div class="clearfix"></div> 
                                                         </a></li>
                                                         <li class="odd"><a href="#">
                                                            <div class="user_img"><img src="<?php echo base_url()?>assets/images/in.jpg" alt=""></div>
                                                           <div class="notification_desc">
                                                            <p>Lorem ipsum dolor sit amet </p>
                                                            <p><span>1 hour ago</span></p>
                                                            </div>
                                                          <div class="clearfix"></div>  
                                                         </a></li>
                                                        <li><a href="#">
                                                           <div class="user_img"><img src="<?php echo base_url()?>assets/images/in1.jpg" alt=""></div>
                                                           <div class="notification_desc">
                                                            <p>Lorem ipsum dolor sit amet </p>
                                                            <p><span>1 hour ago</span></p>
                                                            </div>
                                                           <div class="clearfix"></div> 
                                                        </a></li>
                                                        <li>
                                                            <div class="notification_bottom">
                                                                <a href="#">See all messages</a>
                                                            </div> 
                                                        </li>
                                                    </ul>
                                        </li>
                                    
                            <li class="dropdown note">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell-o"></i> <span class="badge">5</span></a>

                                    <ul class="dropdown-menu two">
                                        <li>
                                            <div class="notification_header">
                                                <h3>You have 5 new notification</h3>
                                            </div>
                                        </li>
                                        <li><a href="#">
                                            <div class="user_img"><img src="<?php echo base_url()?>assets/images/in.jpg" alt=""></div>
                                           <div class="notification_desc">
                                            <p>Lorem ipsum dolor sit amet</p>
                                            <p><span>1 hour ago</span></p>
                                            </div>
                                          <div class="clearfix"></div>  
                                         </a></li>
                                         <li class="odd"><a href="#">
                                            <div class="user_img"><img src="<?php echo base_url()?>assets/images/in5.jpg" alt=""></div>
                                           <div class="notification_desc">
                                            <p>Lorem ipsum dolor sit amet </p>
                                            <p><span>1 hour ago</span></p>
                                            </div>
                                           <div class="clearfix"></div> 
                                         </a></li>
                                         <li><a href="#">
                                            <div class="user_img"><img src="<?php echo base_url()?>assets/images/in8.jpg" alt=""></div>
                                           <div class="notification_desc">
                                            <p>Lorem ipsum dolor sit amet </p>
                                            <p><span>1 hour ago</span></p>
                                            </div>
                                           <div class="clearfix"></div> 
                                         </a></li>
                                         <li>
                                            <div class="notification_bottom">
                                                <a href="#">See all notification</a>
                                            </div> 
                                        </li>
                                    </ul>
                            </li>   
                        <li class="dropdown note">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tasks"></i> <span class="badge blue1">9</span></a>
                                        <ul class="dropdown-menu two">
                                        <li>
                                            <div class="notification_header">
                                                <h3>You have 9 pending task</h3>
                                            </div>
                                        </li>
                                        <li><a href="#">
                                                <div class="task-info">
                                                <span class="task-desc">Database update</span><span class="percentage">40%</span>
                                                <div class="clearfix"></div>    
                                               </div>
                                                <div class="progress progress-striped active">
                                                 <div class="bar yellow" style="width:40%;"></div>
                                            </div>
                                        </a></li>
                                        <li><a href="#">
                                            <div class="task-info">
                                                <span class="task-desc">Dashboard done</span><span class="percentage">90%</span>
                                               <div class="clearfix"></div> 
                                            </div>
                                           
                                            <div class="progress progress-striped active">
                                                 <div class="bar green" style="width:90%;"></div>
                                            </div>
                                        </a></li>
                                        <li><a href="#">
                                            <div class="task-info">
                                                <span class="task-desc">Mobile App</span><span class="percentage">33%</span>
                                                <div class="clearfix"></div>    
                                            </div>
                                           <div class="progress progress-striped active">
                                                 <div class="bar red" style="width: 33%;"></div>
                                            </div>
                                        </a></li>
                                        <li><a href="#">
                                            <div class="task-info">
                                                <span class="task-desc">Issues fixed</span><span class="percentage">80%</span>
                                               <div class="clearfix"></div> 
                                            </div>
                                            <div class="progress progress-striped active">
                                                 <div class="bar  blue" style="width: 80%;"></div>
                                            </div>
                                        </a></li>
                                        <li>
                                            <div class="notification_bottom">
                                                <a href="#">See all pending task</a>
                                            </div> 
                                        </li>
                                    </ul>
                            </li>                                           
                            <div class="clearfix"></div>    
                                </ul>
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
        <h1 style=" margin-left: 12px;"><?php echo $heading; ?></h1>
    </div>
    <style>
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
        .priority-3,.priority-4,.priority-5{
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
      
        }
      
	@media screen (max-width: 900px){
		.priority-2,.priority-4,.priority-5, .priority-3{
			display:none;
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
    .table td, .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
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
	
	@media screen (max-width: 550px) {
        .priority-2,.priority-4,.priority-5,.priority-6, .priority-3{
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
	
	@media screen (max-width: 300px) {
        .priority-2,.priority-4,.priority-3,.priority-5{
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
            <div class="col-sm-3 form-group">
                <label for="director">Enter First Name:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" required>
            </div>

            <div class="col-sm-3 form-group">
                <label for="director">Enter Last Name:</label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" >
            </div>

            <div class="col-sm-3 form-group">
                <label for="email">Enter Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
            </div>

            <div class="col-sm-3 form-group">
                <label for="emp_code">Enter Emp code:</label>
                <input type="text" class="form-control" onblur="code_check(this.value)" id="emp_code" name="emp_code" placeholder="Enter Employee Id" required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="emp_last_name">Mobile Number:</label>
                <input type="text" class="form-control" id="emp_last_name" name="employee_mobile" placeholder="Employee Mobile Number" required="required">
            </div>
            <div class="col-sm-6 form-group">
                <label for="emp_last_name">Address:</label>
                <textarea name="employee_address"></textarea>
            </div>

            <div class="col-sm-12 form-group">
                <button type="submit" style="margin-top:25px;" id="add_director" class="btn btn-success btn-block" disabled>Add Director</button>
            </div>
        </form>
    </div>

    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="priority-1">Id</th>
                <th class="priority-2">Director Name</th>
                <th class="priority-3">Director Email</th>
                <th class="priority-4">Emp Code</th>
                <th class="priority-5">Date Added</th>
                <th class="priority-6">Status</th>
                <th class="priority-7">Edit</th>
                <th class="priority-8">Change Password</th> 
                <th class="priority-9">Privilege</th>
            </tr>
        </thead> 
        <tbody>
            <?php if(isset($all_directors) && $all_directors){
                foreach($all_directors as $Director){?>
                    <tr>
                        <td class="priority-1"><?php echo $Director->id; ?></td>
                        <td class="priority-2"><?php echo $Director->first_name." ".$Director->last_name; ?></td>
                        <td class="priority-3"><?php echo $Director->email; ?></td>
                        <td class="priority-4"><?php echo $Director->emp_code; ?></td>
                        <td class="priority-5"><?php echo $Director->date_added; ?></td>
                        <td class="priority-6" align="middle"><button type="button" id="b1<?php echo $Director->id; ?>" class="btn <?php echo $Director->active?'btn-info':'btn-danger'; ?>" onclick="change_state(<?php echo $Director->id; ?>)"><span id="stateus_sp_<?php echo $Director->id; ?>"><?php echo $Director->active?'Active':'Inactive'; ?></span></button></td>
                        <td class="priority-7" align="middle"><button type="button" class="btn btn-info" onclick="edit_user(<?php echo $Director->id; ?>)" data-toggle="modal" data-target="#modal_edit">Edit</button></td>
                        <td class="priority-8" align="middle"><button type="button" class="btn btn-info" onclick="reset_password(<?php echo $Director->id; ?>)">Reset Password</button></td>
                        <td class="priority-9" align="middle">
                            <button type="button" class="btn btn-info" onclick="permissionModal(<?php echo $Director->id; ?>)" data-toggle="modal" data-target="#modalPermission">Permission</button>
                        </td>
                    </tr>
                <?php }
            } ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_edit" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Director</h4>
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

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="update_user()" data-dismiss="modal">Submit</button>
            </div>
        </div>
    </div>
</div>
<script>
    function change_state(id){
        $(".se-pre-con").show();
        $.ajax({
            type:"POST",
            url: "<?php echo base_url()?>admin/change_status_user",
            data:{
                id:id
            },
            success:function(data){
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

    function code_check(name){
        $('#add_director').prop('disabled', true);
        $(".se-pre-con").show();
        $.ajax({
            type:"POST",
            url: "<?php echo base_url()?>admin/check_user",
            data:{
                code:name
            },
            success:function(data){
                if(data.count){
                    alert("Duplicate Code! try again");
                    $('#emp_code').val('');
                }
                else
                    $('#add_director').prop('disabled', false);
                $(".se-pre-con").hide("slow");
            }
        });
    }

    function edit_user(v){
        $(".se-pre-con").show();
        console.log(v);
        $("#hid").val(v);
        $.ajax({
            type:"POST",
            url: "<?php echo base_url()?>admin/get_user_data",
            data:{id:v},
            success:function(data) {
                
                data = JSON.parse(data);
                var email=data.email;
                var first_name=data.first_name;
                var last_name=data.last_name;
                var emp_code=data.emp_code;
                var mobile=data.mobile_number;
                var address=data.address;
                
                $("#m_emp_code").val(emp_code);
                $("#m_first_name").val(first_name);
                $("#m_last_name").val(last_name);
                $("#m_email").val(email); 
                $("#m_employee_address").val(address);
                $("#m_employee_mobile").val(mobile);
                $(".se-pre-con").hide("slow");
            }
        });
    }

    function update_user(){
        $(".se-pre-con").show();
        
        var first_name=$("#m_first_name").val();
        var last_name=$("#m_last_name").val();
        var email=$("#m_email").val();
        var emp_address=$("#m_employee_address").val();
        var emp_mobile=$("#m_employee_mobile").val();

        var id=$("#hid").val(); 
            
        $.ajax({
            type:"POST",
            url: "<?php echo base_url()?>admin/update_user/"+id,
            data:{
                first_name:first_name,
                last_name:last_name,
                email:email,
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

    function reset_password(id){
        $(".se-pre-con").show();
        $.get("<?php echo base_url()?>admin/reset_password/"+id,function(response){
            $(".se-pre-con").hide("slow");
            if(response.status)
                alert("Success");
        })
    }
</script>
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
                    <header class="logo">
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
<!--js --
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/vroom.css">
<script type="text/javascript" src="<?php echo base_url()?>assets/js/vroom.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/TweenLite.min.js"></script>-->
<script type="text/javascript" src="<?php echo base_url()?>assets/js/CSSPlugin.min.js"></script>
<!--<script src="<?php echo base_url()?>assets/js/scripts.js"></script>-->
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