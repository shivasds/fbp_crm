<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    if($this->session->userdata('user_type')=='admin')
    {
      $this->load->view('inc/admin_header'); 
    }
    else
    {
      $this->load->view('inc/header'); 
    }
    $this->load->model('user_model');
   $user_ids =$this->session->userdata('user_ids');
   $user_ids =json_decode( json_encode($user_ids), true);
   $string_ids='';
   foreach ($user_ids as $id) {
   	//print_r($id['id']);
   	$string_ids.=$id['id'].',';
   } 

   //print_r($this->session->userdata());

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
   <div class="page-container" style="height: 1000px;">
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
						 <!-- //header-ends -->
						<!--outter-wp-->
							<div class="outter-wp">
                                    <!--sub-heard-part-->
                                    <div class="row">
									  <div class="col-xs-8 col-sm-10 col-md-10">
                                        <ol class="breadcrumb m-b-0">
                                                <li><a href="<?=base_url();?>">Home</a></li>
                                                <li class="active">Profile</li>
                                                
                                        </ol>
                                       </div>
                                        <div class="col-xs-4 col-sm-2 col-md-2">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" style=" float: right;">
                                        Reset Password
                                        </button>
                                        </div>
                                    </div>
								    <!--//sub-heard-part-->
										<!--/profile--> 
														<!--/profile-inner-->
<style type="text/css">

span.psw {
  float: right;
  padding-top: 16px;
}
@media (max-width: 375px){
    .btn-primary{
    font-size: 12px;
    margin-top: auto;
    padding: 5px;
    /* margin-left: -19px;  */
    }
   
}


/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
 
}
	input[type=text], select {
    width: 100%;
    padding: 7px 20px;
    margin: 0px -1px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
  input[type=password], select {
    width: 100%;
    padding: 7px 20px;
    margin: 0px -1px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
	input[type=email], select {
    width: 100%;
    padding: 7px 20px;
    margin: 0px -1px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #00C6D7	;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
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


input[type=submit]:hover {
  background-color: #45a049;
}
input[readonly] {
     cursor: no-drop;
}
  </style>
														 <div class="profile-section-inner">
														       <div class="col-md-6 profile-info">
																	<h3 class="inner-tittle">Personal Information </h3>
																	<div class="main-grid3">
																		<form action="<?= base_url('dashboard/update_user')?>" method="post">
																     <div class="p-20">
																		<div class="about-info-p">
																			<strong>Full Name</strong>
																			<br> 	
																			<input type="text" name="user_name" onfocus="this.blur()" readonly="" value="<?php echo $this->session->userdata('user_name'); ?>">
																		</div>
																		<div class="about-info-p">
																			<strong>Employee Code</strong>
																			<br> 	
																			<input type="text" name="emp_code" onfocus="this.blur()"readonly="" value="<?php echo $this->session->userdata('username'); ?>">
																		</div>
																		<div class="about-info-p">
																			<strong>Mobile</strong>
																			<br>
																			<input type="text" name="user_mobile" placeholder="Mobile Number" value="<?= $this->session->userdata('user_mobile')?$this->session->userdata('user_mobile') : '';?>" >
																		</div>
                                    <div class="about-info-p">
                                      <strong>D.O.B</strong>
                                      <br>
                                      <input type="text" name="user_dob" onfocus="this.blur()" readonly=""  value="<?= $this->session->userdata('user_dob')?$this->session->userdata('user_dob') : '';?>" readonly>
                                    </div>
                                    <div class="about-info-p">
                                      <strong>D.O.J</strong>
                                      <br>
                                      <input type="text" name="user_doj" onfocus="this.blur()" readonly=""  value="<?= $this->session->userdata('user_mobile')?$this->session->userdata('user_doj') : '';?>" readonly>
                                    </div>
																		<div class="about-info-p">
																			<strong>Address</strong>
																			<textarea name="address" placeholder="Address" ><?= $this->session->userdata('user_address')?$this->session->userdata('user_address') : '';?> </textarea>
																			<br> 
																		</div> 
																		<div class="about-info-p">
																			<strong>Email</strong>
																			<input type="email" name="user_email" onfocus="this.blur()" readonly="" value="<?php echo $this->session->userdata('user_email'); ?>">
																			<br> 
																		</div>

																		<div class="about-info-p">
																			<strong>Designation</strong>
																			<input type="text" name="user_designation" onfocus="this.blur()" readonly=""value="<?php echo $this->session->userdata('user_type'); ?>">
																			<br> 
																		</div> 
																		
																		<div class="about-info-p m-b-0">
																			<strong>Location</strong>
																			<br>
																			<p class="text-muted"><?php echo $user_city; ?></p>
																		</div>
																		<div class="about-info-p m-b-0"> 
																			<br> 
																			<input type="submit" name="submit" value="update">
																		</div>

																		</form>
																	</div>
																 </div> 
																 
															  </div>
															   <div class="col-md-6 profile-info two"> 
																</div>
																<!--/map-->
															<div class="col-md-6 profile-info two">
															   <h3 class="inner-tittle two">Head Office </h3>
																<div class="main-grid3 map">
 	                                                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888.08652150032!2d77.59919581443324!3d12.966315190859378!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae14677a117163%3A0xcc934a3cb6703eed!2sFull%20Basket%20Property%20Services%20Pvt%20Ltd%20%7C%20Leading%20Real%20Estate%20Company%20in%20Bangalore!5e0!3m2!1sen!2sin!4v1575961381619!5m2!1sen!2sin" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe> 
															<div class="gmap-info">
																<h4> <i class="fa fa-map-marker"></i> <b><a href="#" class="text-dark">Seconds Digitals</a></b></h4>
																<p>hayes Road, Richmond Circle</p>
                                                                
                                                                <p>Bangaluru Karnataka - 560025</p>
																<p><!--Rera : PRM/KA/RERA/1251/446/AG/170926/000120<br>-->
L:  080-2331375</p>
																</div>
																	
																	</div>
																	
																	
																	<!--//map-->
																</div>
																<div class="clearfix"></div>
															</div>
															
											 	<!--//profile-inner-->
												<!--//profile-->
									</div>
									<!--//outer-wp-->
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
           <?php
    if ($this->session->flashdata('message')) {
        ?>
       <script>alert('<?= $this->session->flashdata('message') ?>');</script>
         
        <?php
    }

    ?>
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
                           <div style="height: 100%"></div>
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
<script type="text/javascript" src="<?php echo base_url()?>assets/js/TweenLite.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/CSSPlugin.min.js"></script>
<!--<script src="<?php echo base_url()?>assets/js/scripts.js"></script>-->
<!--<!--<script src="<?php echo base_url()?>assets/js/scripts.js"></script>-->-->

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


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
<form action="<?php echo base_url()?>dashboard/change_password" method="post">

  <div class=" ">
    <label for="pswd"><b>Enter New Password</b></label>
    <input type="password" placeholder="Password" id="password" name="password" required>

    <label for="pswd"><b>Confirm New Password</b></label>
    <input type="password" placeholder="Confirm Password" id="confirm_password" name="cpassword" required>
        
    <!-- <button type="submit">Save</button> -->
   
  </div>
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>

 
</form>

      
    </div>
  </div>
</div>

<script>
var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
</body>
</html>