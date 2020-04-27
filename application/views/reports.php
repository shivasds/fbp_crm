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
    <h1 style=" margin-left: 12px;"><?php echo $heading; ?></h1>
    </div>
    <style>
   
        .lead{
            margin-bottom:5px;
            margin-top:5px;
            font-size: 16px;
       }
        .lead{
            height: 26px;
        }
    </style>

    <form action="<?php echo base_url()?>admin/generate_report">
    <div class="col-xs-12 col-md-12">
    <div class="row">
		<div class="col-xs-6 col-md-6 form-group">
			<label for="emp_code">From:</label>
            <input type="text" class="form-control datepicker" id="fromDate" name="fromDate" placeholder="Date" required="required" autocomplete="off">
            <!-- <input type="date" class="form-control" id="fromDate" name="fromDate" placeholder="Date" required="required"> -->
            <input type="time" class="form-control" id="fromTime" name="fromTime" placeholder="Time" value="00:00" required="required">
		</div>
		<div class="col-xs-6 col-md-6 form-group">
			<label for="emp_code">To:</label>
            <input type="text" class="form-control datepicker" id="" name="toDate" placeholder="Date" required="required" autocomplete="off">
            <!-- <input type="date" class="form-control" id="toDate" name="toDate" placeholder="Date" required="required"> -->
            <input type="time" class="form-control" id="toTime" name="toTime" placeholder="Time" value="23:59" required="required">
		</div>
		<div class="col-xs-12 col-md-6 form-group radio-btn">
			<!-- <label for="emp_code">To:</label> -->
            <label for = "lead_report" class="lead col-xs-7">Lead Report:</label>
            <div class="lead col-xs-5">
                <input type="radio" class="form-control lead" id="lead_report" value="lead" name="reportType" >
            </div>
            <div class="clearfix"></div>
            <label for = "lead_assignment_report" class="lead col-xs-7">Lead Assignment Report:</label>
            <div class="lead col-xs-5">
                <input type="radio" class="form-control lead" id="lead_assignment_report" value="lead_assignment" name="reportType" >
            </div>
            <div class="clearfix"></div>
            <?php if($this->session->userdata('user_type')!='City_head'){ ?>
            <label for = "site_visit_report" class="lead col-xs-7">Site Visit Done report:</label>
            <div class="lead col-xs-5">
                <input type="radio" class="form-control lead" id="site_visit_report" value="site_visit" name="reportType" >
            </div>
            <div class="clearfix"></div>
            <label for = "clent_reg_report" class="lead col-xs-7">Client registration report:</label>
            <div class="lead col-xs-5">
                <input type="radio" class="form-control lead" id="clent_reg_report" value="clent_reg" name="reportType" >
            </div>
            <div class="clearfix"></div>
            <label for = "revenue_report" class="lead col-xs-7">Revenue Report:</label>
            <div class="lead col-xs-5">
                <input type="radio" class="form-control lead" id="revenue_report" value="revenue" 
                name="reportType" >
            </div>
            <div class="clearfix"></div>
            <label for = "daily_act_report" class="lead col-xs-7">Daily Activity Report:</label>
            <div class="lead col-xs-5">
                <input type="radio" class="form-control lead" id="daily_act_report" value="daily_act" name="reportType" >
            </div>
            <div class="clearfix"></div>
            <label for = "site_visit_fixed_report" class="lead col-xs-7">Site Visit Fixed Report:</label>
            <div class="lead col-xs-5">
                <input type="radio" class="form-control lead" id="site_visit_fixed_report" value="site_visit_fixed" name="reportType" >
            </div>   
            <div class="clearfix"></div>
            <label for = "face_to_face_report" class="lead col-xs-7">Face to Face Report:</label>
            <div class="lead col-xs-5">
                <input type="radio" class="form-control lead" id="face_to_face_report" value="face_to_face" name="reportType" >
            </div>
        <?php }?>
            <div class="clearfix"></div>
            <label for = "face_to_face_report" class="lead col-xs-7">Due Report:</label>
            <div class="lead col-xs-5">
                <input type="radio" class="form-control lead" id="due_report" value="due" name="reportType" >
            </div>  
            <div class="clearfix"></div>
            <label for = "face_to_face_report" class="lead col-xs-7">Callback Report:</label>
            <div class="lead col-xs-5">
                <input type="radio" class="form-control lead" id="callback_report" value="dailyCallback" name="reportType" >
            </div>  
            <label for = "svdead" class="lead col-xs-7">site visit dead report:</label>
            <div class="lead col-xs-5">
                <input type="radio" class="form-control lead" id="svdead" value="svdead" name="reportType" >
            </div>
            <label for = "svdead" class="lead col-xs-7">Re visits report:</label>
            <div class="lead col-xs-5">
                <input type="radio" class="form-control lead" id="resv" value="resv" name="reportType" >
            </div>
            <div class="clearfix"></div>
		</div>
		<div class="col-xs-6 col-md-6 form-group">
            <button type="reset" id="save" class="btn btn-danger btn-block">Cancel</button>
        </div>
        <div class="col-xs-6 col-md-6 form-group">
            <button type="submit" id="Generate" class="btn btn-success btn-block">Generate</button>
        </div>
        </div>
        </div>
	</form>
</div>

<script type="text/javascript">

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

        $("#due_report").click(function(){
            window.location = "<?php echo base_url()."admin/generate_report" ?>?reportType=due&fromDate=1";
        });
       
    });
</script>
						
						
						
						
						
						
						
						
						
						
						
						
						
						
								<!--custom-widgets-->
								
									</div>
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
<!-- <script src="<?php echo base_url()?>assets/js/jquery.roll.js"></script> -->
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