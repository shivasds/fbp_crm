<!DOCTYPE HTML>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>CRM Seconds Digital | Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="keywords" content="Full Baskey Property " />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="<?php echo base_url(); ?>assets/css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.min.js"></script>
<!--clock init-->
</head> 
<body>
								<!--/login-->
								
									   <div class="error_page">
									   	<?php if($error){ ?>
                    <!-- Alert Row -->
                    <div class="login_row_group">
                        <div class="alert alert-error  animated bounceIn">
                            <?php echo "<script>alert('".$message."')</script>"; ?>
                        </div>
                    </div>
                <?php } ?>
												<!--/login-top-->
												
													<div class="error-top">
													<h2 class="inner-tittle page" style='align:nowrap;'></h2>
                         <!--  <img src="<?php echo base_url()?>assets/img/logo.png"style="width: 35%;padding: 11px;margin-top: -30px;"> -->
													    <div class="login">
														<h3 class="inner-tittle t-inner" style="font-size: 25px;">Admin Login</h3>
																
																<form action="<?php echo base_url()?>login/admin" method="POST" enctype="multipart/form-data" role="form" autocomplete="off">
																		<input type="text" class="text" value="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" name="username" >
																		<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" name="password">
																		<div class="submit"><input type="submit" onclick="myFunction()" value="Login" ></div>
																		<div class="clearfix"></div>
																		
																	</form>
														</div>

														
													</div>
													
													
												<!--//login-top-->
										   </div>
						
										  	<!--//login-->
										    <!--footer section start-->
										<div class="footer">
												<div class="error-btn">
															
															</div>
										   <p>&copy <?= date('Y')?> Seconds Digital . All Rights Reserved | Design by <a href="https://secondsdigital.com/" target="_blank">Seconds Digital Soultions</a></p>
										</div>
									<!--footer section end-->
									<!--/404-->
<!--js -->
<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

</body>
</html>