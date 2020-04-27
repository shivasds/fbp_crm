<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    $this->load->view('inc/admin_header'); 
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
						
<div class="container">
    <div class="page-header">
        <h1 style=" margin-left: 20px;"><?php echo $heading; ?></h1>
    </div>
    <form  action="<?php echo base_url()?>admin/generate_callback" method="POST" enctype="multipart/form-data">
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="row">
            <div class="col-xs-6 col-sm-4 col-md-3 form-group">
                <label for="emp_code">Dept:</label>
                <select  class="form-control"  id="dept" name="dept" required >
                    <option value="">Select</option>
                    <?php $all_department=$this->common_model->all_active_departments();
	                foreach($all_department as $department){ ?>
	                    <option value="<?php echo $department->id; ?>"><?php echo $department->name; ?></option>
	                <?php }?>           
                </select>
            </div>

            <div class="col-xs-6 col-sm-4 col-md-3 form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required="required">
            </div>

            <div class="col-xs-6 col-sm-4 col-md-3 form-group">
                <label for="contact_no1">Contact No:</label>
                <input type="number" class="form-control" id="contact_no1" name="contact_no1" placeholder="Contact No">
            </div>

            <div class="col-xs-6 col-sm-4 col-md-3 form-group">
                <label for="name">Contact No 2:</label>
                <input type="number" class="form-control" id="contact_no2" name="contact_no2" placeholder="Contact No">
            </div>
            
            <div class="col-xs-6 col-sm-4 col-md-3 form-group">
                <label for="assign">Call back type:</label>
                <select  class="form-control"  id="callback_type" name="callback_type" required="required" >
                    <option value="">Select </option>
                    <?php $all_callback_types=$this->common_model->all_active_callback_types();
	                foreach($all_callback_types as $callback_type){ ?>
	                    <option value="<?php echo $callback_type->id; ?>"><?php echo $callback_type->name; ?></option>
	                <?php }?>            
                </select>
            </div>

            <div class="col-xs-6 col-sm-4 col-md-3 form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email1" name="email1" placeholder="Email">
            </div>

            <div class="col-xs-6 col-sm-4 col-md-3 form-group">
                <label for="email">Email2:</label>
                <input type="email" class="form-control" id="email2" name="email2" placeholder="email">
            </div>

            <div class="col-xs-6 col-sm-4 col-md-3 form-group">
                <label for="emp_code">Project:</label>
                <select  class="form-control"  id="project" name="project" required="required" >
                    <option value="">Select</option>
                    <?php $projects= $this->common_model->all_active_projects(); 
                    foreach( $projects as $project){ ?>
                        <option value="<?php echo $project->id ?>"><?php echo $project->name ?></option>
                    <?php }?>               
                </select>
            </div>

            <div class="col-xs-6 col-sm-4 col-md-3 form-group">
                <label for="assign">Lead Source:</label>
                <select  class="form-control"  id="lead_source"  name="lead_source" required="required" >
                    <option value="">Select</option>
                    <?php $lead_source= $this->common_model->all_active_lead_sources(); 
                    foreach( $lead_source as $source){ ?>
                        <option value="<?php echo $source->id ?>"><?php echo $source->name ?></option>
                    <?php } ?>
                </select>
            </div>
             <div id="abc" hidden>
                        <div class="col-xs-6 col-sm-4 col-md-3 form-group">
                            <label for="ref_by">Refered By:</label>
                            <select  class="form-control"  id="ref_by"  name="ref_by" >
                                    <option value="">Select</option>  
                                    <option value="1">Client</option>
                                    <option value="2">Management</option> 
                            </select>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-3 form-group">
                            <label for="mob_num">Mobile Number:</label>
                             <input class="form-control" type="text" name="mob_num" id="mob_num" value="">
                        </div>
                        <script>
                      $(document).ready(function(){

     // Initialize 
     $( "#mob_num1" ).autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url: "<?=base_url()?>dashboard/mob_num/",
            type: 'post',
            dataType: "json",
            data: {
              contact_no1: request.term
            },
            success: function( data ) {
                response($.map(data, function (value, key) {
                return {
                    label: value.contact_no1, 
                }
            }));
            }
          });
        },
        select: function (event, ui) {
          // Set selection
          $('#mob_num').val(ui.item.label); // display the selected text
          //$('#userid').val(ui.item.value); // save selected id to input
          return false;
        }
      });

    });
                    </script>
             </div>

          <!--   <div class="col-xs-6 col-sm-4 col-md-3 form-group">
                <label for="leadId">Lead Id:</label>
                <input type="text" class="form-control" id="leadId" name="leadId" placeholder="Lead Id">
            </div> -->

            <div class="col-xs-6 col-sm-4 col-md-3 form-group">
                <label for="assign">User Name:</label>
                <select  class="form-control"  id="user_name" name="user_name" required="required" >
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
                    	}
                    	?>
                        <option value="<?php echo $user->id ?>"><?php echo $user->first_name." ".$user->last_name." ($role)"; ?></option>
                    <?php } ?>               
                </select>
            </div>
      
            <div class="col-xs-6 col-sm-4 col-md-3 form-group">
                <label for="assign">Manage Sub Broker:</label>
                <select  class="form-control"  id="sub_broker" name="sub_broker" required="required" >
                    <option value="">Select</option>
                    <?php $brokers= $this->common_model->all_active_brokers(); 
                    foreach( $brokers as $broker){ ?>
                        <option value="<?php echo $broker->id; ?>"><?php echo $broker->name ?></option>
                    <?php } ?>               
                </select>
            </div>
      
            <div class="col-xs-6 col-sm-4 col-md-3 form-group">
                <label for="assign">Status:</label>
                <select  class="form-control"  id="status" name="status" required="required" >
                    <option value="">Select</option>
                    <?php $statuses= $this->common_model->all_active_statuses(); 
                    foreach( $statuses as $status){ ?>
                        <option value="<?php echo $status->id; ?>"><?php echo $status->name ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-xs-6 col-sm-4 col-md-3 form-group">
                <label for="leadId">Due date:</label>
                <input type="date" class="form-control" id="due_date" name="due_date" placeholder="Date" required="required">
            </div>
      
            <div class="col-xs-6 col-sm-4 col-md-3 form-group">
                <label for="comment">Notes:</label>
                <textarea class="form-control" name="notes" id="notes" rows="3" id="comment"></textarea>
            </div>
      
            <div class="col-xs-6 col-sm-4 col-md-3" id="phone_error" style="display:none">
                <div class="alert alert-danger" >
                    The contact number already used
                </div>
            </div>
            
            <div class="col-xs-6 col-sm-4 col-md-3" id="email_error" style="display:none">
                <div class="alert alert-danger" >
                    The email already used
                </div>
            </div>
            
            <div class="col-xs-6 col-sm-6 form-group">
                <a class="btn btn-danger btn-block" id="cancel"onclick="reset_data()">Cancel</a>
            </div>
            <div class="col-xs-6 col-sm-6 form-group">
                <button type="submit" id="save" class="btn btn-success btn-block">Save</button>
            </div>
        </div>
    
       </div>
     </form>
</div>
<script type="text/javascript">
    
    function reset_data(){
        $('#name').val('');
        $('#contact_no1').val('');
        $('#contact_no2').val('');
        $('#email1').val('');
        $('#email2').val('');
        $('#lead_source').val();
        $('#project').val();
        $('#leadId').val();
        $('#assign').val();
        $('#due_date').val('');

        $('#dept').val('0').change();
        $('#callback_type').val('0').change();
        $('#project').val('0').change();
        $('#lead_source').val('0').change();
    }

    $(document).ready(function(){
        var con1=$('#contact_no1').val();
        var con2=$('#contact_no2').val();
        if(con1=='' && con2==''){
            $('#contact_no1').prop('required',true);
        }
        
        var em1=$('#email1').val();
        var em2=$('#email2').val();
        if(em1=='' && em2==''){
            $('#email1').prop('required',true);
        }

        $("#contact_no1, #contact_no2").keyup(function(){
            if($(this).val() != ''){
                $.getJSON( "<?php echo base_url()?>admin/check_isnumberexists/"+$(this).val(), function( data ) {
                    if(data.exists){
                        $('#phone_error').show();
                        $(this).focus();
                        $("#save").attr('disabled',true);
                    }
                    else{
                        $('#phone_error').hide();
                        $("#save").attr('disabled',false);
                    }
                });
            }
        });

        $("#email1, #email2").keyup(function(){
            if($(this).val() != ''){
                $.getJSON( "<?php echo base_url()?>admin/check_isemailexists?email="+encodeURIComponent($(this).val()), function( data ) {
                    if(data.exists){
                        $('#email_error').show();
                        $(this).focus();
                        $("#save").attr('disabled',true);
                    }
                    else{
                        $('#email_error').hide();
                        $("#save").attr('disabled',false);
                    }
                });
            }
        });

    });
   
    $(document).ready(function(){
    function changesource(){
        var a  = this.value;
        if('6'==a)
        {
            $("#abc").show();
            $("#ref_by").attr("required",true);
        }
        else
        {
            $("#abc").hidden();
        }
    }
    $("#lead_source").on("change", changesource);
});
</script>


									
<!--/tabs-->
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
<!--js -->
<!-- <link rel="stylesheet" href="<?php echo base_url()?>assets/css/vroom.css">
<script type="text/javascript" src="<?php echo base_url()?>assets/js/vroom.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/TweenLite.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/CSSPlugin.min.js"></script> -->
<!--<script src="<?php echo base_url()?>assets/js/scripts.js"></script>-->

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
        get_revenues();

        $('.view_callbacks').click(function(){
            var type = $(this).data('type');
            var data = {};
            switch (type)
            {
                case "user_total":
                    data.advisor = "<?php echo $user_id; ?>";
                    data.due_date = "<?php echo date('Y-m-d'); ?>";
                    data.access = 'read_write'; 
                    break;

                case "user_overdue":
                    data.advisor = "<?php echo $user_id; ?>";
                    data.due_date_to = "<?php echo date('Y-m-d H:i:s'); ?>";
                    data.for = "dashboard";
                    data.access = 'read_write'; 
                    break;

                case "user_active": 
                    data.advisor = "<?php echo $user_id; ?>";
                    data.for = "dashboard";
                    data.access = 'read_write'; 
                    break;

                case "user_close": 
                    data.advisor = "<?php echo $user_id; ?>";
                    data.status = "close";
                    break;

                case "user_important":
                    data.advisor = "<?php echo $user_id; ?>";
                    data.access = 'read_write'; 
                    data.important = 1;
                    break;

                case "manager_active": 
                    data.advisor = "<?php echo $user_id; ?>";
                    data.for = "dashboard";
                    data.access = 'read_write'; 
                    break;

                case "manager_close":
                    data.advisor = "<?php echo $user_id; ?>";
                    data.status = "close";
                    break;
            }
            
            view_callbacks(data,'post');

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
    // $('#filter_revenue').click(get_revenues());
    function get_revenues(){
        $.get( "<?php echo base_url()."dashboard/get_revenue/" ?>"+$('#revenueMonth').val(), function( data ) {
            $('#revenue_data').html(data);
        });
    }
    function view_callbacks(data, method) {
        var form = document.createElement('form');
        form.method = method;
        form.action = "<?php echo base_url()."view_callbacks?" ?>"+jQuery.param(data);
        for (var i in data) {
            var input = document.createElement('input');
            input.type = "text";
            input.name = i;
            input.value = data[i];
            form.appendChild(input);
        }
        //console.log(form);
        document.body.appendChild(form);
        form.submit();
    }

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
        get_revenues();

        $('.view_callbacks').click(function(){
            var type = $(this).data('type');
            var data = {};
            switch (type)
            {
                case "user_total":
                    data.advisor = "<?php echo $user_id; ?>";
                    data.due_date = "<?php echo date('Y-m-d'); ?>";
                    data.access = 'read_write'; 
                    break;

                case "user_overdue":
                    data.advisor = "<?php echo $user_id; ?>";
                    data.due_date_to = "<?php echo date('Y-m-d H:i:s'); ?>";
                    data.for = "dashboard";
                    data.access = 'read_write'; 
                    break;

                case "user_active": 
                    data.advisor = "<?php echo $user_id; ?>";
                    data.for = "dashboard";
                    data.access = 'read_write'; 
                    break;

                case "user_close": 
                    data.advisor = "<?php echo $user_id; ?>";
                    data.status = "close";
                    break;

                case "user_important":
                    data.advisor = "<?php echo $user_id; ?>";
                    data.access = 'read_write'; 
                    data.important = 1;
                    break;

                case "manager_active": 
                    data.advisor = "<?php echo $user_id; ?>";
                    data.for = "dashboard";
                    data.access = 'read_write'; 
                    break;

                case "manager_close":
                    data.advisor = "<?php echo $user_id; ?>";
                    data.status = "close";
                    break;
            }
            
            view_callbacks(data,'post');

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
    // $('#filter_revenue').click(get_revenues());
    function get_revenues(){
        $.get( "<?php echo base_url()."dashboard/get_revenue/" ?>"+$('#revenueMonth').val(), function( data ) {
            $('#revenue_data').html(data);
        });
    }
    function view_callbacks(data, method) {
        var form = document.createElement('form');
        form.method = method;
        form.action = "<?php echo base_url()."view_callbacks?" ?>"+jQuery.param(data);
        for (var i in data) {
            var input = document.createElement('input');
            input.type = "text";
            input.name = i;
            input.value = data[i];
            form.appendChild(input);
        }
        //console.log(form);
        document.body.appendChild(form);
        form.submit();
    }

</script>
</body>
</html>