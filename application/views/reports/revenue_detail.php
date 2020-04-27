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

<style type="text/css">
	.display td {
	    border: 1px solid #aaa;
	    padding: 5px
	  }
</style>
</head>
<body>
	<div class="container">
		<div class="page-header">
		  <h1><?php echo $heading; ?></h1>
		</div>
		<form method="POST">
			<div class="col-md-3 form-group">
                <input type="hidden" id="mhid">
                <label for="emp_code">Dept:</label>
                <input type="text" class="form-control" id="m_name1" placeholder="Name" required="required" value="<?php echo $details->department; ?>" disabled>
            </div>
            <div class="col-sm-3 form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="m_name1" placeholder="Name" required="required" value="<?php echo $details->name; ?>" disabled>
            </div>
            <div class="col-sm-3 form-group">
                <label for="contact_no1">Contact No:</label>
                <input type="text" class="form-control" id="m_contact_no1" placeholder="Contact No" value="<?php echo $details->contact_no1; ?>" disabled>
            </div>
            <div class="col-sm-3 form-group">
                <label for="name">Contact No 2:</label>
                <input type="text" class="form-control" id="m_contact_no2" placeholder="Contact No" value="<?php echo $details->contact_no2; ?>" disabled>
            </div>
            <div class="col-md-3 form-group">
                <label for="assign">Call back type:</label>
                <input type="text" class="form-control" id="m_contact_no2" placeholder="Contact No" value="<?php echo $details->callback_type; ?>" disabled>
            </div>
            <div class="col-sm-3 form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="m_email1" placeholder="Email" value="<?php echo $details->email1; ?>" disabled>
            </div>   
            <div class="col-sm-3 form-group">
                <label for="email">Email2:</label>
                <input type="email" class="form-control" id="m_email2" placeholder="email" value="<?php echo $details->email2; ?>" disabled>
            </div>
            <div class="col-md-3 form-group">
                <label for="emp_code">Project:</label>
                <input type="text" class="form-control" id="m_contact_no2" placeholder="Contact No" value="<?php echo $details->project; ?>" disabled>
            </div>
            <div class="col-md-3 form-group">
                <label for="assign">Lead Source:</label>
                <input type="text" class="form-control" id="m_contact_no2" placeholder="Contact No" value="<?php echo $details->lead_source; ?>" disabled>
            </div>
            <div class="col-sm-3 form-group">
                <label for="leadId">Lead Id:</label>
                <input type="text" class="form-control" id="m_leadId" placeholder="Lead Id" value="<?php echo $details->leadid; ?>" disabled>
            </div>
            <div class="col-md-3 form-group">
                <label for="assign">Status:</label>
                <input type="text" class="form-control" id="m_contact_no2" placeholder="Contact No" value="<?php echo $details->status; ?>" disabled>
            </div>
            <div class="col-md-3 form-group">
                <label for="assign">Assign To:</label>
                <input type="text" class="form-control" id="m_contact_no2" placeholder="Contact No" value="<?php echo $details->user_name; ?>" disabled>
            </div>
            <div class="col-sm-6 form-group">
                <label for="email">Advisor one:</label>
                <select  class="form-control"  id="c_seniorAdvisor" name="c_seniorAdvisor" required="required"  >
                    <option value="">Select</option>
                    <?php $all_user= $this->user_model->all_users("type in (1,2)"); 
                    foreach( $all_user as $user){ 
                        switch ($user->type) {
                            case '1':
                                $role = "User";
                                break;

                            case '2':
                                $role = "Manager";
                                break;

                        }
                        ?>
                        <option value="<?php echo $user->id ?>" <?php if($revenue_details->advisor1_id == $user->id ) echo 'selected'; ?>><?php echo $user->first_name." ".$user->last_name." ($role)"; ?></option>
                    <?php } ?>               
                </select>
            </div>
            <div class="col-sm-6 form-group">
                <label for="email">Advisor two:</label>
                <select  class="form-control"  id="c_secondAdvisor" name="c_secondAdvisor" required="required"  >
                    <option value="">Select</option>
                    <?php $all_user= $this->user_model->all_users("type in (1,2)"); 
                    foreach( $all_user as $user){ 
                        switch ($user->type) {
                            case '1':
                                $role = "User";
                                break;

                            case '2':
                                $role = "Manager";
                                break;

                        }
                        ?>
                        <option value="<?php echo $user->id ?>" <?php if($revenue_details->advisor2_id === $user->id ) echo 'selected'; ?>><?php echo $user->first_name." ".$user->last_name." ($role)"; ?></option>
                    <?php } ?>               
                </select>
            </div>
            <div class="col-sm-6 form-group">
                <label for="email">Booking Name:</label>
                <input type="text" class="form-control" id="c_bkngName" name="c_bkngName" placeholder="Booking Name" value="<?php echo $revenue_details->booking; ?>">
            </div>
            <div class="col-sm-6 form-group">
                <label for="email">Booking Month:</label>
                <input type="text" class="form-control" id="c_bkngMnth" name="c_bkngMnth" placeholder="Booking Date" value="<?php echo $revenue_details->booking_month; ?>">
            </div>
            <div class="col-sm-6 form-group">
                <label for="email">Date of closure:</label>
                <input type="date" class="form-control" id="c_dateofClosure" name="c_dateofClosure" placeholder="Date of closure" value="<?php echo $revenue_details->closure_date; ?>">
            </div>
            <div class="col-sm-6 form-group">
                <label for="email">Customer name:</label>
                <input type="text" class="form-control" id="c_customerName" name="c_customerName" placeholder="Customer Name" value="<?php echo $revenue_details->customer; ?>">
            </div>
            <div class="col-sm-6 form-group">
                <label for="email">Sub Source:</label>
                <select  class="form-control"  id="c_subSource" name="c_subSource" disabled>
                    <option value="">Select</option>
                    <?php $brokers= $this->common_model->all_active_brokers(); 
                    foreach( $brokers as $broker){ ?>
                        <option value="<?php echo $broker->id; ?>" <?php if($revenue_details->sub_source_id == $broker->id) echo 'selected'; ?>><?php echo $broker->name ?></option>
                    <?php } ?>               
                </select>
            </div>
            <div class="col-sm-6 form-group">
                <label for="email">Project:</label>
                <select  class="form-control"  id="c_projectName" name="c_projectName" required="required" >
                    <option value="">Select</option>
                    <?php $projects= $this->common_model->all_active_projects(); 
                    foreach( $projects as $project){ ?>
                        <option value="<?php echo $project->id ?>" <?php if($project->id == $revenue_details->project_id) echo 'selected'; ?>><?php echo $project->name ?></option>
                    <?php }?>               
                </select>
            </div>
            <div class="col-sm-6 form-group">
                <label for="email">Sqft Sold:</label>
                <input type="text" class="form-control" id="c_sqftSold" name="c_sqftSold" placeholder="Sqft Sold" value="<?php echo $revenue_details->sqft_sold; ?>">
            </div>
            <div class="col-sm-6 form-group">
                <label for="email">PLC Charges:</label>
                <input type="text" class="form-control"  id="c_plcCharge" name="c_plcCharge" placeholder="PLC charges" value="<?php echo $revenue_details->plc_charge; ?>">
            </div>
            <div class="col-sm-6 form-group">
                <label for="email">Floor Rise:</label>
                <input type="text" class="form-control" id="c_floorRise" name="c_floorRise" placeholder="Floor Rise" value="<?php echo $revenue_details->floor_rise; ?>">
            </div>
            <div class="col-sm-6 form-group">
                <label for="email">Basic Cost:</label>
                <input type="text" class="form-control" id="c_basicCost" name="c_basicCost" placeholder="Basic Cost" value="<?php echo $revenue_details->basic_cost; ?>">
            </div>
            <div class="col-sm-6 form-group">
                <label for="email">Other Cost:</label>
                <input type="text" class="form-control" id="c_otherCost" name="c_otherCost" placeholder="Other Cost" value="<?php echo $revenue_details->other_cost; ?>">
            </div>
            <div class="col-sm-6 form-group">
                <label for="email">Car Park:</label>
                <input type="text" class="form-control" id="c_carPark" name="c_carPark" placeholder="Car Park" value="<?php echo $revenue_details->car_park; ?>">
            </div>
            <div class="col-sm-6 form-group">
                <label for="email">Total Cost:</label>
                <input type="text" class="form-control"   id="c_totalCost" name="c_totalCost" placeholder="Total Cost" value="<?php echo $revenue_details->total_cost; ?>">
            </div>

            <div class="col-sm-6 form-group">
                <label for="email">Commission(%):</label>
                <input type="text" class="form-control" id="c_comission" name="c_comission" placeholder="Commission" value="<?php echo $revenue_details->commission; ?>">
            </div>

            <div class="col-sm-6 form-group">
                <label for="email">Gross Revenue:</label>
                <input type="text" class="form-control" id="c_grossRevenue" name="c_grossRevenue" placeholder="Gros Revenue" value="<?php echo $revenue_details->gross_revenue; ?>">
            </div>
            <div class="col-sm-6 form-group">
                <label for="email">Cashback:</label>
                <input type="text" class="form-control" id="c_cashBack" name="c_cashBack" placeholder="Cash Back" value="<?php echo $revenue_details->cash_back; ?>">
            </div>
            <div class="col-sm-6 form-group">
                <label for="email">Sub broker amount:</label>
                <input type="text" class="form-control" id="c_subBrokerAmo" name="c_subBrokerAmo" placeholder="Sub Broker amount" value="<?php echo $revenue_details->sub_broker_amo; ?>">
            </div>
            <div class="col-sm-6 form-group">
                <label for="email">Net Revenue:</label>
                <input type="text" class="form-control" id="c_netRevenue" name="c_netRevenue" placeholder="Net Revenue" value="<?php echo $revenue_details->net_revenue; ?>">
            </div>
            <div class="col-sm-6 form-group">
                <label for="email">Share of advisor 1:</label>
                <input type="text" class="form-control" id="c_shareAdvisor1" name="c_shareAdvisor1" placeholder="Share of advisor 1" value="<?php echo $revenue_details->share_of_advisor1; ?>">
            </div>
            <div class="col-sm-6 form-group">
                <label for="email">Share of advisor 2:</label>
                <input type="text" class="form-control" id="c_shareAdvisor2" name="c_shareAdvisor2" placeholder="Share of advisor 2" value="<?php echo $revenue_details->share_of_advisor2; ?>">
            </div>

            <div class="col-sm-6 form-group">
                <label for="email">Estimated month of invoice:</label>
                <input type="text" class="form-control" id="c_estMonthofInvoice" name="c_estMonthofInvoice" placeholder="Estimated month of invoice" value="<?php echo $revenue_details->est_month_of_invoice; ?>">
            </div>

            <div class="col-sm-6 form-group">
                <label for="email">Agreement Status:</label>
                <input type="text" class="form-control" id="c_agrmntStatus" name="c_agrmntStatus" placeholder="Agreement Status" value="<?php echo $revenue_details->agreement_status; ?>">
            </div>

            <div class="col-sm-6 form-group">
                <label for="email">Project Type:</label>
                <input type="text" class="form-control" id="c_projectType" name="c_projectType" placeholder="Project Type" value="<?php echo $revenue_details->project_type; ?>">
            </div>
            <?php if($this->session->userdata('user_type') == 'admin') {?>
	            <div class="col-sm-6 form-group">
	                <button type="submit" class="btn btn-success btn-block" style="margin-top: 24px;" >Save</button>
	            </div>
	        <?php } ?>
		</form>

	</div>
</body>
<script type="text/javascript">
	jQuery(document).ready(function($) {
	    $(".revenue_row").click(function() {
	        window.document.location = "<?php echo base_url().'dashboard/view_revenue/'; ?>"+$(this).data("id");
	    });
	});
	$("#email_this_report").click(function(e){
		e.preventDefault();
		$(".alert-success").hide();
		$(".alert-danger").hide();
		$.get("<?php echo base_url().'admin/email_report?fromDate='.urlencode($fromDate).'&toDate='.urlencode($toDate).'&city='.urlencode($city).'&dept='.urlencode($dept).'&reportType='.urlencode($reportType); ?>", function(response){
			if(response == "Success")
				$(".alert-success").show();
			else
				$(".alert-danger").show();
		});
	});
</script>
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
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/vroom.css">
<script type="text/javascript" src="<?php echo base_url()?>assets/js/vroom.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/TweenLite.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/CSSPlugin.min.js"></script>

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