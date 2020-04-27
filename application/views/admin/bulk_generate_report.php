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
    <br>
    <br>
    <table id="example" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%" >
        <thead>
            <tr>
                <th>No</th>
                <th>Contact Name</th> 
                <th>Contact No 1</th>
                <th>Contact No 2</th>
                <th>Email 1</th>
                <th>Email 2</th>
                <th>Lead Id</th> 
                <th>Notes</th> 
            </tr>
        </thead> 
        <tbody id="main_body">
            <?php $i= 1;
            if(count($callbacks)>0){
            foreach ($callbacks as $data) { ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['contact_no1'] ?></td>
                    <td><?php echo $data['contact_no2']; ?></td>
                    <td><?php echo $data['email1']; ?></td>
                    <td><?php echo $data['email2']; ?></td>
                    <td><?php echo $data['leadid']; ?></td>
                    <td><?php echo $data['notes']; ?></td>
                </tr>
            <?php $i++; } }?>
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="page-header text-center">
                <h1>Default Callback Assignment</h1>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url()?>admin/save_bulk_upload_callbacks">
                <input type="hidden" name="callbacks" value="<?php echo htmlspecialchars(json_encode($callbacks)); ?>">
                <div class="form-group">
                    <label for="email" class="control-label col-sm-3">Dept*</label>
                    <div class="col-sm-9">
                        <select type="email" class="form-control" name="dept" required>
                            <?php $all_department=$this->common_model->all_active_departments();
                            foreach($all_department as $department){ ?>
                                <option value="<?php echo $department->id; ?>"><?php echo $department->name; ?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="control-label col-sm-3">Project*</label>
                    <div class="col-sm-9">
                        <select type="email" class="form-control" name="project" required>
                            <?php $projects= $this->common_model->all_active_projects(); 
                            foreach( $projects as $project){ ?>
                                <option value="<?php echo $project->id ?>"><?php echo $project->name ?></option>
                            <?php }?> 
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="control-label col-sm-3">Callback type*</label>
                    <div class="col-sm-9">
                        <select type="email" class="form-control" name="callback_type" required>
                            <?php $all_callback_types=$this->common_model->all_active_callback_types();
                            foreach($all_callback_types as $callback_type){ ?>
                                <option value="<?php echo $callback_type->id; ?>"><?php echo $callback_type->name; ?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="control-label col-sm-3">Lead Source*</label>
                    <div class="col-sm-9">
                        <select type="email" class="form-control" name="lead_source" id="lead_source" required>
                            <?php $lead_source= $this->common_model->all_active_lead_sources(); 
                            foreach( $lead_source as $source){ ?>
                                <option value="<?php echo $source->id ?>"><?php echo $source->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div id="abc" hidden>
                    <div class="form-group">
                    <label for="ref_by" class="control-label col-sm-3">Refered By:</label>
                        <div class="col-sm-9">
                            <select  class="form-control"  id="ref_by"  name="ref_by" >
                                    <option value="">Select</option>  
                                    <option value="1">Client</option>
                                    <option value="2">Management</option> 
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mob_num" class="control-label col-sm-3">Mobile Number:</label>
                        <div class="col-sm-9">
                            
                             <input class="form-control" type="text" name="mob_num" id="mob_num" value="">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="control-label col-sm-3">Assigned to*</label>
                    <div class="col-sm-9">
                        <select type="email" class="form-control" name="user" required>
                            <?php $all_user= $this->user_model->all_users("type in (1,2,3,4,6)"); 
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
                                <option value="<?php echo $user->id ?>"><?php echo $user->first_name." ".$user->last_name." ($role)"; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="control-label col-sm-3">Broker*</label>
                    <div class="col-sm-9">
                        <select type="email" class="form-control" name="broker" required>
                            <?php $brokers= $this->common_model->all_active_brokers(); 
                            foreach( $brokers as $broker){ ?>
                                <option value="<?php echo $broker->id; ?>"><?php echo $broker->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="control-label col-sm-3">Status*</label>
                    <div class="col-sm-9">
                        <select type="email" class="form-control" name="status" required>
                            <?php $statuses= $this->common_model->all_active_statuses(); 
                            foreach( $statuses as $status){ ?>
                                <option value="<?php echo $status->id; ?>"><?php echo $status->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="control-label col-sm-3">Due Date*</label>
                    <div class="col-sm-9">
                        <input type="date" id="dt" class="form-control" name="due_date" required />
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="control-label col-sm-3">Due Time*</label>
                    <div class="col-sm-9">
                        <input type="time" id="dt" class="form-control" name="due_time" value="00:00"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-success btn-block">Save All Data</button>
                    </div>
                </div>
            </form>        
        </div>
    </div>
</div>
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
<!--js -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/vroom.css">
<script type="text/javascript" src="<?php echo base_url()?>assets/js/vroom.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/TweenLite.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/CSSPlugin.min.js"></script>
<!--<script src="<?php echo base_url()?>assets/js/scripts.js"></script>-->

<!-- Bootstrap Core JavaScript -->
 
</body>
</html>	