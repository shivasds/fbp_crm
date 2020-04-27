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
    <div class="alert alert-success" style="display: none;">
        <strong>Success!</strong> Email Sent.
    </div>
    <div class="alert alert-danger" style="display: none;">
        <strong>Error!</strong> Email not Sent.
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

<div class="col-sm-3 form-group">
            <button id="email_this_track_report" class="btn btn-default btn-block">Email this report</button>
        </div>

 <table class="table table-striped table-bordered dataTable no-footer">
     <tr>
         <th>S.No</th>
         <th>Name</th>
         <th>First Login</th>
         <th>Last Logged In Time</th>
         <th>Total Time Spent</th>
     </tr>
     <?php
     if($trcking_data)
     {
        $y=1;
        foreach ($trcking_data as $track) {
            $hours = floor($track['todaytimer'] / 3600);
            $mins = floor($track['todaytimer'] / 60 % 60);
            $secs = floor($track['todaytimer'] % 60); 

$timeFormat = sprintf('%02d:%02d:%02d', $hours, $mins, $secs);
           echo "<tr><td>".$y."</td>";
           echo "<td>".$track['first_name']." ".$track['last_name']."</td>";
           echo "<td>".date('Y-m-d H:i:s',strtotime($track['login_time']))."</td>";
           echo "<td>".$track['last_login']."</td>";
           echo "<td>".$timeFormat."</td></tr>";
           $y++;
        }
     }
     ?>
 </table> 
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
        $('#email_this_track_report').on('click', function(){
            //$(".se-pre-con").show();
            $.ajax({
                type : 'POST',
                url : "<?= base_url('admin/track_users/1');?>",
                data:1,
                success: function(res){
                   // $(".se-pre-con").hide("slow");
                    if($.trim(res) == "Success")
                        alert('Email Sent Successfully.');
                    else
                        alert('Email Sent fail!');
                }
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