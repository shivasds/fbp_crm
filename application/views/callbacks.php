<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    $this->load->view('inc/header'); 
    if(!$this->session->userdata('permissions') && $this->session->userdata('permissions')=='' ) {
    ?>

    <style type="text/css">
    .alrtMsg{padding-top: 50px;}
    .alrtMsg i {
        font-size: 60px;
        color: #f1c836;
    }

    </style>
    <div class="container"> 
        <div class="row"> 
            <div class="text-center alrtMsg">
                <i class="fa fa-exclamation-triangle"></i>
                <h3>You Do Not have permission as of now. Please contact your Administration and Request for Permission.</h3>
            </div>
        </div>
    </div>
    <?php
}


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
                       <div>
					 
<div class="container">
  
    <div class="page-header">
        <h1><?php echo $heading; ?></h1>
    </div>
    <style>
        
    @media screen and (min-width: 768px) {
      
        .modal-dialog  {
            width:900px;
        }
    }
    .form-group input[type="checkbox"] {
        display: none;
    }
    .form-group input[type="checkbox"] + .btn-group > label span {
        width: 20px;
    }
    .form-group input[type="checkbox"] + .btn-group > label span:first-child {
        display: none;
    }
    .form-group input[type="checkbox"] + .btn-group > label span:last-child {
        display: inline-block;   
    }
    .form-group input[type="checkbox"]:checked + .btn-group > label span:first-child {
        display: inline-block;
    }
    .form-group input[type="checkbox"]:checked + .btn-group > label span:last-child {
        display: none;   
    }
    tr.highlight_past td.due_date{
        background-color: #cc6666 !important;
    }
    tr.highlight_now td.due_date{
        background-color: #e4b13e !important;
    }
    tr.highlight_future td.due_date{
        background-color: #65dc68 !important;
    }
    #history_table td {
        border: 1px solid #aaa;
        padding: 5px
    }

    .icon .fa{
            background-color: #ffffff00; 
            color:#ff1122;
             font-size:20px;
             padding-right:5px;
        }

    @media (max-width: 991px){
        .priority-7,.priority-8,.priority-13,.priority-14{
			display:none;
		}
        #search_form{
            display:block;
        }
        }
        @media (max-width: 1150px){
            .priority-10, .priority-7,.priority-8,.priority-13,.priority-14{
			display:none;
		}

        }
 
	@media screen and (max-width: 900px) and (min-width: 550px) {
        #search_form{
            display:block;
        }
		.priority-4,.priority-5,.priority-6, .priority-7,.priority-8,.priority-10,.priority-13,.priority-14{
			display:none;
		}
       
	}
	
	@media screen and (max-width: 550px) {
        .priority-4,.priority-5,.priority-6, .priority-7,.priority-8,.priority-10,.priority-13,.priority-14{
			display:none;
		}
        #search_form{
            display:block;
        }
        .icon .fa{
            background-color: #ffffff00; 
            color:#ff1122;
             font-size:16px!important;
            
        }
       
	}
	/* @media screen and (max-width: 384px) {
        #search_form{
            display:block;
        }
        .priority-4,.priority-5,.priority-6, .priority-7,.priority-8,.priority-10,.priority-11{
			display:none;
		}
   
	}  */
	@media screen and (max-width: 300px) {
        .icon .fa{
            background-color: #ffffff00; 
            color:#ff1122;
             font-size:16px!important;
            
        }
        .
        #search_form{
            display:block;
        }
        .priority-4,.priority-5,.priority-6, .priority-7,.priority-8,.priority-10,.priority-11,.priority-13,.priority-14{
			display:none;
		}
   
	}
</style>
    <form method="POST" id="search_form">
        <?php if($this->session->userdata("user_type")=="manager") { ?>
            <input type="hidden" name="self" id="self_input" value="<?php echo $this->session->userdata('self'); ?>">
            <div class="col-md-3 form-group">
                <label for="emp_code">Advisor:</label>
                <select  class="form-control"  id="dept" name="advisor" >
                    <option value="">Select</option>
                    <?php $all_advisor=$this->common_model->all_active_advisors();
                    foreach($all_advisor as $advisor){ ?>
                        <option value="<?php echo $advisor->id; ?>" <?php if(($this->session->userdata("advisor"))==$advisor->id) echo 'selected' ?>><?php echo $advisor->first_name." ".$advisor->last_name; ?></option>
                    <?php }?>             
                </select>
            </div>            
        <?php } ?>
        <?php if($this->session->userdata("user_type")!="user") { ?>
            <div class="col-md-3 form-group">
                <label for="emp_code">Department:</label>
                <select  class="form-control"  id="dept" name="dept" >
                    <option value="">Select</option>
                    <?php $all_department=$this->common_model->all_active_departments();
                    foreach($all_department as $department){ ?>
                        <option value="<?php echo $department->id; ?>" <?php if(($this->session->userdata("department"))==$department->id) echo 'selected' ?>><?php echo $department->name; ?></option>
                    <?php }?>             
                </select>
            </div>
        <?php } ?>
        <div class="col-md-3 form-group">
            <label for="emp_code">Project:</label>
            <select  class="form-control"  id="project" name="project" >
                <option value="">Select</option>
                <?php $projects= $this->common_model->all_active_projects(); 
                foreach( $projects as $project){ ?>
                    <option value="<?php echo $project->id ?>" <?php if(($this->session->userdata("project"))==$project->id) echo 'selected' ?>><?php echo $project->name ?></option>
                <?php }?>              
            </select>
        </div>
        <?php if($this->session->userdata("user_type")!="user") { ?>
            <div class="col-md-3 form-group">
                <label for="assign">Lead Source:</label>
                <select  class="form-control"  id="lead_source" name="lead_source" >
                    <option value="">Select</option>
                    <?php $lead_source= $this->common_model->all_active_lead_sources(); 
                    foreach( $lead_source as $source){ ?>
                        <option value="<?php echo $source->id ?>" <?php if(($this->session->userdata("lead_source"))==$source->id) echo 'selected' ?>><?php echo $source->name ?></option>
                    <?php } ?>             
                </select>
            </div>
            <div class="col-md-3 form-group">
                <label for="assign">Sub Broker:</label>
                <select  class="form-control"  id="sub_broker" name="sub_broker" >
                    <option value="">Select</option>
                    <?php $brokers= $this->common_model->all_active_brokers(); 
                    foreach( $brokers as $broker){ ?>
                        <option value="<?php echo $broker->id; ?>" <?php if(($this->session->userdata("sub_broker"))==$broker->id) echo 'selected' ?>><?php echo $broker->name ?></option>
                    <?php } ?>              
                </select>
            </div>
        <?php } ?>
        <div class="col-md-3 form-group">
            <label for="assign">Status:</label>
            <select  class="form-control"  id="status" name="status" >
                <option value="">Select</option>
                <?php $statuses= $this->common_model->all_active_statuses(); 
                foreach( $statuses as $status){ ?>
                    <option value="<?php echo $status->id; ?>" <?php if(($this->session->userdata("status"))==$status->id) echo 'selected' ?>><?php echo $status->name ?></option>
                <?php } ?>
            </select>
        </div>
        <?php if($this->session->userdata("user_type")!="user") { 
        if($this->session->userdata("user_type")=="City_head"){
            $users = $this->user_model->get_city_users_active();
            //print_r($users);
            
          ?>
          <div class="col-md-3 form-group">
                <label for="assign">Users:</label>
                <select  class="form-control"  id="city_user" name="city_user" >
                    <option value="">Select</option>
                    <?php 

                                foreach ($users as $user) {
                                ?>
                         <option value="<?php echo $user->id ?>" <?php echo ($user->id  == $this->session->userdata('city_user')) ? 'selected' : ''; ?>><?php echo $user->first_name." ".$user->last_name; ?></option>
                    <?php } ?>               
                </select>
            </div> 
          <?php
        }
        else
        {
        ?>
            <div class="col-md-3 form-group">
                <label for="assign">City:</label>
                <select  class="form-control"  id="city" name="city" >
                    <option value="">Select</option>
                    <?php $cities= $this->common_model->all_active_cities(); 
                    foreach( $cities as $city){ ?>
                        <option value="<?php echo $city->id; ?>" <?php if(($this->session->userdata("city"))==$city->id) echo 'selected' ?>><?php echo $city->name ?></option>
                    <?php } ?>               
                </select>
            </div>
        <?php 
        }
        }?>
        <?php if(($this->session->userdata("user_type")=="vp") || ($this->session->userdata("user_type")=="director")) { ?>
            <div class="col-md-3 form-group">
                <label for="assign">User Name:</label>
                <select  class="form-control"  id="user_name" name="user_name" >
                    <option value="">Select</option>
                    <?php $all_user= $this->user_model->all_users("type in (1,2,3,4)"); 
                    foreach( $all_user as $user){ 
                        switch ($user->type) {
                            case '1':
                                $role = "User";
                                break;

                            case '2':
                                $role = "Manager";
                                break;

                            case '3':
                                $role = "VP";
                                break;
                            
                            case '4':
                                $role = "Director";
                                break;
                            case '6':
                                $role = "City Head";
                                break;
                        }
                        ?>
                        <option value="<?php echo $user->id ?>" <?php if(($this->session->userdata("search_username"))==$user->id) echo 'selected' ?>><?php echo $user->first_name." ".$user->last_name." ($role)"; ?></option>
                    <?php } ?>
                </select>
            </div>
        <?php } /*if($this->session->userdata("user_type")=="vp" || $this->session->userdata("user_type")=="director") {*/?>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Search:</label>
                    <input type="text" class="form-control" name="srxhtxt" id="srxhtxt" placeholder="Enter search text" value="<?= ($this->session->userdata('SRCHTXT')) ? $this->session->userdata('SRCHTXT') : '' ?>" />
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Due Date</label>
                    <select  class="form-control" name="searchDate" id="searchDate">
                        <option value="">--Select--</option>
                        <option value="today" <?= ($this->session->userdata('SRCHDT')== "today")? 'selected':''; ?>>Due date</option>
                        <option value="yesterday" <?= ($this->session->userdata('SRCHDT')== "yesterday")? 'selected':''; ?>>Overdue </option>
                        <option value="tomorrow" <?= ($this->session->userdata('SRCHDT')== "tomorrow")? 'selected':''; ?>>Upcoming calls</option>
                    </select>
                </div>
            </div>
        <?php //} ?>
        <div class="col-sm-3 form-group">
            <button class="btn btn-info btn-block" id="reset" onclick="reset_data()" style="margin-top: 24px;" >Reset</button>
        </div>
        <div class="col-sm-3 form-group">
            <button type="submit" id="search" class="btn btn-success btn-block" style="margin-top: 24px;" >Search</button>
        </div>
    </form>
    <div class="clearfix"></div>
    <br>
    <?php if($this->session->userdata("user_type")=="manager") { ?>
        Now showing <?php echo ($this->session->userdata('self') == "1")?"self":"teams"; ?> callbacks. <a href="#" id="change_callbacks">Change</a>
    <?php }

     ?>
    <br>

</div>

<div class="container">
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="priority-1">No</th>
                    <th class="priority-2">Contact Name</th> 
                    <th class="priority-3">Contact No</th>
                    <th class="priority-4">Email</th>
                    <th class="priority-5">Project</th>
                    <?php if($this->session->userdata("user_type")!="user") { ?>
                        <th class="priority-13">Lead Source</th>
                        <th class="priority-14">Lead Id</th> 
                    <?php } ?>
                    <th class="priority-6">Advisor</th>
                    <?php if($this->session->userdata("user_type")!="user") { ?> 
                        <th class="priority-7">Sub-Source</th>
                    <?php } ?>
                    <th class="priority-8">Due date</th>
                    <th class="priority-9">Status</th>
                    <th class="priority-10">Date Added</th>
                    <!-- <th>Last Update</th> -->
                    <th class="priority-11">Action</th>
                </tr>
            </thead> 
            <tbody id="main_body">
                <?php $i= 1;
                if(count($result)>0){
                  // echo $this->session->userdata('self');
                foreach ($result as $data) {
                    $duedate = explode(" ", $data->due_date);
                    $duedate = $duedate[0]; ?>
                    <tr id="row<?php echo $i ?>" <?php if(strtotime($duedate)<strtotime('today')){?> class="highlight_past" <?php }elseif(strtotime($duedate) == strtotime('today')) {?> class="highlight_now" <?php }elseif(strtotime($duedate)>strtotime('today')){ ?> class="highlight_future" <?php } ?>>
                        <td class="priority-1"><?php echo $i; ?></td>
                        <td class="priority-2"><?php echo $data->name; ?></td>
                        <td class="priority-3"><?php echo $data->contact_no1 ?></td>
                        <td class="priority-4"><?php echo $data->email1; ?></td>
                        <td class="priority-5"><?php echo $data->project_name; ?></td>
                        <?php if($this->session->userdata("user_type")!="user") { ?>
                            <td class="priority-13"><?php echo $data->lead_source_name; ?></td>
                            <td class="priority-14"><?php echo $data->leadid; ?></td>
                        <?php } ?>
                        <td class="priority-6"><?php echo $data->user_name; ?></td>
                        <?php if($this->session->userdata("user_type")!="user") { ?>
                            <td class="priority-7"><?php echo $data->broker_name; ?></td>
                        <?php } ?>
                        <td class="due_date priority-8"><?php echo $data->due_date; ?></td>
                        <td class="priority-9"><?php echo $data->status_name; ?></td>
                        <td class="priority-10"><?php echo $data->date_added; ?></td>
                        <!-- <td><?php echo $data->last_update; ?></td> -->
                        <td class="priority-11">
                            <table>
                            <tr class="icon" style="background-color: #ffffff00;">
                                    <td>
                                        <!-- <a onclick="edit('<?php echo $data->id; ?>')" data-toggle="modal" data-target="#modal_edit"> -->
                                        <a href="<?= base_url('callback-details?id='.$data->id) ?>" target="_blank">
                                            <i class="fa fa-home fa-2x"  title="Detail" style="" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a onclick="previous_callbacks('<?php echo $data->id; ?>')" data-toggle="modal" data-target="#modal_previous">
                                            <i class="fa fa-keyboard-o fa-2x" title="Notes" style="" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                <?php $i++; } }
                else
                {
                    echo "<tr><td colspan=13 align=center>No Data Found</td></tr>";
                }

                ?>
            </tbody>
        </table>
    
    
        <div style="margin-top: 20px">
             <span class="pull-left"><p>Showing <?php echo ($this->uri->segment(2)) ? $this->uri->segment(2)+1 : 1; ?> to <?= ($this->uri->segment(2)+count($result)); ?> of <?= $totalRecords; ?> entries</p></span>
              <ul class="pagination pull-right"><?php echo $links; ?></ul> 
        </div>
    </div>
<br/><br/>



<br/><br/><br/><br/><br/><br/>
<?php $this->load->view('callback_operations'); ?>
 


<script type="text/javascript">

    $(document).ready(function() {
    //      $('#example').DataTable({
        //       "paging":   false,
        //       "info": false
 
        // });
    //     if (!Modernizr.inputtypes.date) {
    //         // If not native HTML5 support, fallback to jQuery datePicker
    //         $('input[type=date]').datepicker({
    //             // Consistent format with the HTML5 picker
    //                 dateFormat : 'dd/mm/yy'
    //             }
    //         );
    //     }
    //     if (!Modernizr.inputtypes.time) {
    //         // If not native HTML5 support, fallback to jQuery timepicker
    //         $('input[type=time]').timepicker({ 'timeFormat': 'H:i' });
    //     }
    //     $('#c_bkngMnth, #c_estMonthofInvoice').MonthPicker({
    //         Button: false
    //     });

        $('#change_callbacks').click(function(){
            $("#self_input").val(($("#self_input").val() == "0")?"1":"0");
            $("#search_form").submit();
        });


    });

    function reset_data(){
        $('#dept').val("");
        $('#project').val("");
        $('#lead_source').val("");
        $('#sub_broker').val("");
        $('#status').val("");
        $('#city').val("");
        <?php
        $this->session->unset_userdata('city_user');
        
        ?>
        $('#user_name').val("");
        $('#searchDate').val("");
        $('#srxhtxt').val("");
        $('#city_user').val("");
        $("#search_form").submit();
    }
    
</script> 
      
                       </div>

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
                    <header class="logo"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
                                     <?php if($this->session->userdata('user_type')=='user')
                                       {?>
                                      <span class="name-caret">RM:</span> <?php echo $this->session->userdata('manager_name'); ?><br>
                                        <?php } ?>
                                    
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
<!--js

<script type="text/javascript" src="<?php echo base_url()?>assets/js/TweenLite.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/CSSPlugin.min.js"></script> 
<script src="<?php echo base_url()?>assets/js/jquery.nicescroll.js"></script>-->
<!--<script src="<?php echo base_url()?>assets/js/scripts.js"></script>-->

<!--<script src="<?php echo base_url()?>assets/js/scripts.js"></script>-->
 Bootstrap Core JavaScript 
   -->
   <script>
    
    // $('#filter_revenue').click(get_revenues());
  
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
</body>
</html>