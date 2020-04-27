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
<div class="container">
	<div class="page-header">
	  <h1><?php echo $heading; ?></h1>
	</div>
	<div class="alert alert-success" style="display: none;">
		<strong>Success!</strong> Email Sent.
	</div>
	<div class="alert alert-danger" style="display: none;">
		<strong>Error!</strong> Email not Sent.
	</div>
	<form method="GET" action="<?php echo base_url()?>admin/generate_report">
		<div class="col-sm-3 form-group">
			<label for="emp_code">Dept:</label>
            <select  class="form-control"  id="dept" name="dept" required >
                <option value="">Select</option>
                <?php $all_department=$this->common_model->all_active_departments();
                foreach($all_department as $department){ ?>
                    <option value="<?php echo $department->id; ?>" <?php if($department->id==$dept) echo 'selected'; ?>><?php echo $department->name; ?></option>
                <?php }?>              
            </select>
		</div>
		<div class="col-sm-3 form-group">
			<label for="emp_code">City:</label>
            <select  class="form-control"  id="city" name="city" >
                <option value="">Select</option>
                <?php $cities= $this->common_model->all_active_cities(); 
                foreach( $cities as $c){ ?>
                    <option value="<?php echo $c->id; ?>" <?php if($c->id==$city) echo 'selected'; ?> ><?php echo $c->name ?></option>
                <?php } ?>               
            </select>
		</div>
		<div class="col-sm-3 form-group">
            <button type="submit" id="Generate" class="btn btn-success btn-block">Filter</button>
        </div>
        <div class="col-sm-3 form-group">
            <button id="email_this_report" class="btn btn-default btn-block">Email this report</button>
        </div>
    </form>
    <br>
    <div class="col-md-12">
    	<div class="col-md-4">
    		<h4> Due Calls</h4>
    		<table class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Sl.No</th>
						<th>Advisor</th>
						<th>No. of callbacks Assigned</th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($due_reports)>0){
						$i = 1;
						$total = 0;
						foreach ($due_reports as $key => $value) { 
							$name = $this->user_model->get_user_fullname($key); 
							$total += $value; ?>
						 	<tr>
						 		<td><?php echo $i; ?></td>
						 		<td><?php echo $name; ?></td>
						 		<td><a href="<?php echo base_url().'view_callbacks?report='.urlencode($reportType).'&advisor='.urlencode($key).'&dept='.urlencode($dept).'&city='.urlencode($city).'&due_date='.date('Y-m-d'); ?>"><?php echo $value; ?></a></td>
						 	</tr>
						<?php $i++; } ?>
						<tr>
							<td colspan="2">Total</td>
							<td><a href="<?php echo base_url().'view_callbacks?report='.urlencode($reportType).'&dept='.urlencode($dept).'&city='.urlencode($city).'&due_date='.date('Y-m-d'); ?>"><?php echo $total; ?></a></td>
						</tr>
					<?php } else { ?>
						<tr>
							<td colspan="3"> No entries </td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
    	</div>
	    	
		<div class="col-md-4">
		<h4> Over Due Calls</h4>
		<table class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Sl.No</th>
					<th>Advisor</th>
					<th>No. of callbacks Assigned</th>
				</tr>
			</thead>
			<tbody>
				<?php if(count($overdue_reports)>0){
					$i = 1;
					$total = 0;
					foreach ($overdue_reports as $key => $value) { 
						$name = $this->user_model->get_user_fullname($key); 
						$total += $value; ?>
					 	<tr>
					 		<td><?php echo $i; ?></td>
					 		<td><?php echo $name; ?></td>
					 		<td><a href="<?php echo base_url().'view_callbacks?report='.urlencode($reportType).'&advisor='.urlencode($key).'&dept='.urlencode($dept).'&city='.urlencode($city).'&due_date_to='.date('Y-m-d',strtotime("-1 days")); ?>"><?php echo $value; ?></a></td>
					 	</tr>
					<?php $i++; } ?>
					<tr>
						<td colspan="2">Total</td>
						<td><a href="<?php echo base_url().'view_callbacks?report='.urlencode($reportType).'&dept='.urlencode($dept).'&city='.urlencode($city).'&due_date_to='.date('Y-m-d',strtotime("-1 days")); ?>"><?php echo $total; ?></a></td>
					</tr>
				<?php } else { ?>
					<tr>
						<td colspan="3"> No entries </td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		</div>
    </div>
		
</div>
</body>
<script type="text/javascript">
	$("#email_this_report").click(function(e){
		e.preventDefault();
		$(".alert-success").hide();
		$(".alert-danger").hide();
		$.get("<?php echo base_url().'admin/email_report?fromDate='.urlencode($fromDate).'&toDate='.urlencode($toDate).'&city='.urlencode($city).'&dept='.urlencode($dept).'&reportType='.urlencode($reportType); ?>", function(response){
			if($.trim(response) == "Success")
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
<!--js
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/vroom.css">
<script type="text/javascript" src="<?php echo base_url()?>assets/js/vroom.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/TweenLite.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/CSSPlugin.min.js"></script>-->

<!--<script src="<?php echo base_url()?>assets/js/scripts.js"></script>-->
 
</body>
</html>