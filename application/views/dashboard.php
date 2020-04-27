<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    $this->load->view('inc/header'); 
    $this->load->model('user_model');
   $user_ids =$this->session->userdata('user_ids');
   $user_ids =json_decode( json_encode($user_ids), true);
   $string_ids='';
   foreach ($user_ids as $id) {
   	//print_r($id['id']);
   	$string_ids.=$id['id'].',';
   }
   //echo $string_ids;

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
					<?php
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


								else{?>
						<div class="outter-wp">
								<!--custom-widgets-->
												<div class="custom-widgets">
													<?php 
													
													if ($this->session->userdata('user_type')=="user") { 
       												?>
       												
												   <div class="row-one">
														<div class="col-md-3 widget">
															<div class="stats-left ">
																<h5>Today</h5>
																<h4> Calls</h4>
															</div>
															<div class="stats-right">
																<label><a href="#" class="view_callbacks" data-type="user_total"><?php echo $today_callback_count; ?></a></label>
															</div>
															<div class="clearfix"> </div>	
														</div>
														<div class="col-md-3 widget states-mdl">
															<div class="stats-left">
																<h5>Yesterday</h5>
																<h4>Calls</h4>
															</div>
															<div class="stats-right">
																<label> <?php echo $yesterday_callback_count; ?></label>
															</div>
															<div class="clearfix"> </div>	
														</div>
														<div class="col-md-3 widget states-thrd">
															<div class="stats-left">
																<h5>Overdue </h5>
																<h4>Calls</h4>
															</div>
															<div class="stats-right">
																<label><a href="#" class="view_callbacks" data-type="user_overdue"><?php echo $overdue_callback_count; ?></a></label>
															</div>
															<div class="clearfix"> </div>	
														</div>
														<div class="col-md-3 widget states-last">
															<div class="stats-left">
																<h5>Today Calls</h5>
																<h4>Done</h4>
															</div>
															<div class="stats-right">
																<label> <?php if(isset($callsDone['totalCalls'])){echo $callsDone['totalCalls'] ? $callsDone['totalCalls'] : 0; }else{echo 0;}?></label>
															</div>
															<div class="clearfix"> </div>	
														</div>
														<div class="clearfix"> </div>	
													</div>
													<br>
													<div class="row-one">
														<div class="col-md-3 widget">
															<div class="stats-left ">
																<h5>Calls Assigned </h5>
																<h4> Today</h4>
															</div>
															<div class="stats-right">
																<label><?php echo $calls_assigned_today['count'] ? $calls_assigned_today['count'] : 0; ?></label>
															</div>
															<div class="clearfix"> </div>	
														</div>
														<div class="col-md-3 widget states-mdl">
															<div class="stats-left">
																<h5>Total</h5>
																<h4>Leads</h4>
															</div>
															<div class="stats-right">
																<label> <?php echo $total_callback_count; ?></label>
															</div>
															<div class="clearfix"> </div>	
														</div>
														<div class="col-md-3 widget states-thrd">
															<div class="stats-left">
																<h5>Dead </h5>
																<h4>Leads</h4>
															</div>
															<div class="stats-right">
																<label><?php echo $dead_leads_count; ?></label>
															</div>
															<div class="clearfix"> </div>	
														</div>
														<div class="col-md-3 widget states-last">
															<div class="stats-left">
																<h5>Active</h5>
																<h4>Leads</h4>
															</div>
															<div class="stats-right">
																<label><?php echo $active_leads_count; ?></label>
															</div>
															<div class="clearfix"> </div>	
														</div> 
														<div class="clearfix"> </div>	
													</div>
													<br>
													<div class="tab-inner">
												      <div id="tabs" class="tabs">
															<div class="graph">
																					<nav>
																						<ul>
																							<li class="tab-current"><a href="#section-1" class="icon-shop"><i class="lnr lnr-briefcase"></i> <span>Important Calls</span></a></li>
																							<li><a href="#section-2" class="icon-cup"><i class="lnr lnr-lighter"></i> <span>Site Visit Fixed</span></a></li>
																							<li><a href="#section-3" class="icon-cup"><i class="lnr lnr-lighter"></i> <span>Total Revenue</span></a></li>
																						</ul>
																					</nav>
																					<div class="content tab">
																						<section id="section-1" class="content-current">
																							<div class="">
																							<table class="table" style="margin-top: 30px;">
														                                <thead>
														                                    <tr>
														                                        <th>Contact Name</th>
														                                        <th>Assigned User</th>
														                                        <th>Email</th>
														                                        <th>Last added Note</th>
														                                    </tr>
														                                     <?php

																							if(count($imp_callbacks)>0)
																							{
														                                      foreach ($imp_callbacks as $callback) { ?>
																							
                                        <tr>
                                            <td><a href="<?php echo base_url().'dashboard/view_callbacks/'.$user_id; ?>" data-type="user_important" data-id="<?php echo $callback->id; ?>"><?php echo $callback->name; ?></a></td>
                                            <td><?php echo $callback->user_name; ?></td>
                                            <td>
                                                <?php 
                                                    echo $callback->email1; 
                                                    if($callback->email2)
                                                        echo ", ".$callback->email2;
                                                ?>
                                            </td>
                                            <td><?php echo $callback->last_note; ?></td>
                                        </tr>
                                    <?php }
                                }
                                 else
                                        echo '<tr><td colspan="3">No records found!</td></tr>';

                                     ?>
                                        
														                                </thead>
														                                <tbody>
														                                    														                                        
														                                </tbody>
														                            </table>
																							</div>
																						
																						</section>
																						<section id="section-2">
																							<div class="">
																							 <br>
														                            <table class="table">
														                                <thead>
														                                    <tr>
														                                        <th>Contact Name</th>
														                                        <th>Date of Site Visit</th>
														                                        <th>Project Name</th>
														                                        <!-- <th>Lastest Comment</th> -->
														                                    </tr>
														                                </thead>
														                                <tbody>
														                                	<?php  
                                    if(count($site_visit_data)>0) {    
                                   echo '<a href="javascript:void(0);" class="btn btn-info pull-right emailSiteVisit" style="margin-top: 15px;">Email this</a>';                              
                                        foreach ($site_visit_data as $k=>$data) { 
                                             if(!isset($site_visit_data[$k+1]['id']))
                                                $site_visit_data[$k+1]['id']=null;
                                            if($data['id'] != $site_visit_data[$k+1]['id']) {
                                            ?>
                                            <tr>
                                                <td><?php echo $data['name']; ?></td>
                                                <td><?php echo $data['visitDate']; ?></td>
                                                <td>
                                                    <?php echo implode(', ', $site_visit_projects[$data['id']]);?>
                                                </td>
                                                <!-- <td><?php //echo $callback->last_note; ?></td> -->
                                            </tr>
                                            <?php 
                                            }   
                                                                                 
                                        }
                                    }
                                    else
                                        echo '<tr><td colspan="3">No records found!</td></tr>';
                                    ?> 
										                                        
														                                </tbody>
														                            </table>
																							</div>
																						</section>
									                                                    <section id="section-3">
																							<div class="">
																							 <br>
														                            <!-- <table class="table">
														                                <thead>
														                                    <tr>
														                                        <th>Total Revenue</th> 
														                                        <!-- <th>Lastest Comment</th>
														                                    </tr>
														                                </thead>
														                                <tbody>
														                                	<tr>
														                                		 <td><a href="#" class="view_callbacks" data-type="user_close"><?php echo $total_revenue; ?></a></td>
														                                	</tr>
									                                  
														                                </tbody>
                                                                                    </table> -->
                                                                                    
                                                                                    <div class="container">
                                                                                            <div class="row text-center">
                                                                                                <div class="col-md-6">
                                                                                                Total Revenue
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                               <a href="#" class="view_callbacks" data-type="user_close"><?php echo $total_revenue; ?></a>
                                                                                                </div>
                                                                                               
                                                                                            </div>
                                                                                            </div>
																							</div>
																						</section>
																					</div><!-- /content -->
																				</div>
																				<!-- /tabs -->
																				
																			</div>
																			<script src="<?php echo base_url()?>/assets/js/cbpFWTabs.js"></script>
																			<script>
																				new CBPFWTabs( document.getElementById( 'tabs' ) );
																			</script>
																	
																 
																 <div class="clearfix"> </div>
														</div>
												<?php }
												elseif ($this->session->userdata('user_type')=="manager"  ) { 

        ?>
         <style>

        .stats-right{
            padding: 25px 0px;
        } 
        .stats-right label{
            font-size: 1em; 
            color: #3E3D3D;
            word-break: break-all;
        }
        #textright{
            padding: 37px 0px;
        }
        @media (max-width:1366px){
            .stats-right{
            padding: 25px 0px;
        } 
        .stats-right label{
            font-size: 1em; 
            color: #3E3D3D;
            word-break: break-all;
        }
        #textright{
            padding: 37px 0px;
        }
        }
        @media (max-width:1366px){
            .stats-right{
            padding: 25px 0px;
        } 
        .stats-right label{
            font-size: 1em; 
            color: #3E3D3D;
            word-break: break-all;
        }
        #textright{
            padding: 37px 0px;
        }
        }
        /*@media (max-width:1280px){
            .stats-right{
            padding: 21px 0px;
        } 
       
        #textright{
            padding: 32px 0px;
        }
        }*/
        @media (max-width:1150px){
            .stats-right{
            padding: 33px 0px;
}
        } 
       
        #textright{
            padding: 32px 0px;
        }
        }

        @media (max-width:930px){
            .stats-right{
            padding: 2px 0px;
        } 
       
        #textright{
            padding: 24px 0px;
        }
        }
        @media (max-width:768px){
            .stats-right{
            padding: 2px 0px;
        } 
       
        #textright{
            padding: 24px 0px;
        }
        }
        </style>

												   <div class="row-one">
														<div class="col-md-3 widget">
															<div class="stats-left ">
																<h5>Team</h5>
																<h4> Revenue</h4>
															</div>
															<div class="stats-right" >
																<label style=""><a href="#" ><?php echo $total_team_revenue?$total_team_revenue:0; ?></a></label>
															</div>
															<div class="clearfix"> </div>	
														</div>
														<div class="col-md-3 widget states-mdl">
															<div class="stats-left">
																<h5>Own</h5>
																<h4>Closed Calls</h4>
															</div>
															<div class="stats-right" id="textright">
																<label> <a href="#" class="view_callbacks" data-type="manager_close"><?php echo $close_leads_count; ?></a></label>
															</div>
															<div class="clearfix"> </div>	
														</div>
														<div class="col-md-3 widget states-thrd">
															<div class="stats-left">
																<h5>Total Calls </h5>
																<h4>For Team</h4>
															</div>
															<div class="stats-right" id="textright">
																<label><a href="<?php echo base_url().'view_callbacks?advisor='.$team_members; ?>" ><?php echo $total_calls; ?></a></label>
															</div>
															<div class="clearfix"> </div>	
														</div>
														<div class="col-md-3 widget states-last">
															<div class="stats-left">
																<h5>Own</h5>
																<h4>Revenue</h4>
															</div>
															<div class="stats-right">
																<label> <?php echo $total_revenue; ?></label>
															</div>
															<div class="clearfix"> </div>	
														</div>
														<div class="clearfix"> </div>	
													</div> 
        <div class="container"> 
            <div class="top-mg dash-wd">
                <div class="tab-inner">
												      <div id="tabs" class="tabs">
															<div class="graph">
																					<nav>
																						<ul>
																							<li class="tab-current"><a href="#section-1" class="icon-shop"><i class="lnr lnr-briefcase"></i> <span>Important Calls</span></a></li>
																							<li><a href="#section-2" class="icon-cup"><i class="lnr lnr-lighter"></i> <span>Site Visit Fixed</span></a></li>
																						</ul>
																					</nav>
																					<div class="content tab">
																						<section id="section-1" class="content-current">
																							<div class="">
																							<table class="table" style="margin-top: 30px;">
														                                <thead>
														                                    <tr>
														                                        <th>Contact Name</th>
														                                        <th>Assigned User</th>
														                                        <th>Email</th>
														                                        <th>Last added Note</th>
														                                    </tr>
														                                </thead>
														                                <tbody>
														                                    														                                        
														                                </tbody>
														                            </table>
																							</div>
																						
																						</section>
																						<section id="section-2">
																							<div class="">
																							 <br>
														                            <table class="table">
														                                <thead>
														                                    <tr>
														                                        <th>Contact Name</th>
														                                        <th>Date of Site Visit</th>
														                                        <th>Project Name</th>
														                                        <!-- <th>Lastest Comment</th> -->
														                                    </tr>
														                                </thead>
														                                <tbody>
														                                    <tr><td colspan="3">No records found!</td></tr>                                        
														                                </tbody>
														                            </table>
																							</div>
																						</section>
																					</div><!-- /content -->
																				</div>
																				<!-- /tabs -->
																				
																			</div>
																			<script src="<?php echo base_url()?>/assets/js/cbpFWTabs.js"></script>
																			<script>
																				new CBPFWTabs( document.getElementById( 'tabs' ) );
																			</script>
																	
																 
																 <div class="clearfix"> </div>
														</div>
                <div class="col-md-12">
                    <div class="">
                        <h2 align="center">Lead Source Report</h2>
                        <div class="col-md-12 ctr">
                            <table align="center" style="width:50%" class="table">
                                <thead>
                                    <tr>
                                        <th>Lead Source</th>
                                        <th>Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($lead_source_report as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $this->common_model->get_leadsource_name($key); ?></td>
                                            <td><?php echo $value; ?></td>
                                        </tr>
                                    <?php } ?>
                                        
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="">
                        <h2 align="center">Call Reports</h2>
                        <div class="col-md-12 ctr">
                            <table align="center" style="width:50%" class="table">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Number of calls</th>
                                        <th>Calls done Yesterday</th>
                                        <th>Calls for Today</th>
                                        <th>Productivity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($call_reports as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $value->first_name." ".$value->last_name; ?></td>
                                            <td><?php echo $value->total_calls; ?></td>
                                            <td><?php echo $value->yesterday_callback_count; ?></td>
                                            <td><?php echo $value->today_callback_count; ?></td>
                                            <td><?php echo $value->productivity; ?> %</td>
                                        </tr>
                                    <?php } ?>
                                        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
             </div>
        </div>
    <?php } elseif ($this->session->userdata('user_type')=="City_head"  ) { 

        ?>
        <div class="container"> 
            <div class="top-mg dash-wd">
                <div class="col-md-12">
                    
                      <div class="tab-inner">
												      <div id="tabs" class="tabs">
															<div class="graph">
																					<nav>
																						<ul>
																							<li class="tab-current"><a href="#section-1" class="icon-shop"><i class="lnr lnr-briefcase"></i> <span>Important Calls</span></a></li>
																							<li><a href="#section-2" class="icon-cup"><i class="lnr lnr-lighter"></i> <span>Site Visit Fixed</span></a></li>
																						</ul>
																					</nav>
																					<div class="content tab">
																						<section id="section-1" class="content-current">
																							<div class="">
																							<table class="table" style="margin-top: 30px;">
														                                <thead>
														                                    <tr>
														                                        <th>Contact Name</th>
														                                        <th>Assigned User</th>
														                                        <th>Email</th>
														                                        <th>Last added Note</th>
														                                    </tr>
														                                </thead>
														                                <tbody>
														                                    														                                        
														                                </tbody>
														                            </table>
																							</div>
																						
																						</section>
																						<section id="section-2">
																							<div class="">
																							 <br>
														                            <table class="table">
														                                <thead>
														                                    <tr>
														                                        <th>Contact Name</th>
														                                        <th>Date of Site Visit</th>
														                                        <th>Project Name</th>
														                                        <!-- <th>Lastest Comment</th> -->
														                                    </tr>
														                                </thead>
														                                <tbody>
														                                    <tr><td colspan="3">No records found!</td></tr>                                        
														                                </tbody>
														                            </table>
																							</div>
																						</section>
																					</div><!-- /content -->
																				</div>
																				<!-- /tabs -->
																				
																			</div>
																			<script src="<?php echo base_url()?>/assets/js/cbpFWTabs.js"></script>
																			<script>
																				new CBPFWTabs( document.getElementById( 'tabs' ) );
																			</script>
																	
																 
																 <div class="clearfix"> </div>
														</div>
					<div class="row top-mg dash-wd">
                        <h2>Lead Source Report</h2>
                        <div class="col-md-12 ctr">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Lead Source</th>
                                        <th>Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($lead_source_report as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $this->common_model->get_leadsource_name($key); ?></td>
                                            <td><?php echo $value; ?></td>
                                        </tr>
                                    <?php } ?>
                                        
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row top-mg dash-wd">
                        <h2>Call Reports</h2>
                        <div class="col-md-12 ctr">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Number of calls</th>
                                        <th>Calls done Yesterday</th>
                                        <th>Calls for Today</th>
                                        <th>Productivity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($call_reports as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $value->first_name." ".$value->last_name; ?></td>
                                            <td><?php echo $value->total_calls; ?></td>
                                            <td><?php echo $value->yesterday_callback_count; ?></td>
                                            <td><?php echo $value->today_callback_count; ?></td>
                                            <td><?php echo $value->productivity; ?> %</td>
                                        </tr>
                                    <?php } ?>
                                        
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
              
            </div>
        </div>
    <?php }
    else { ?>
        <div class="container"> 
            <div class="top-mg dash-wd">
                <div class="col-md-5">
                    <div class="row top-mg dash-wd">
                        <h2>Productivity</h2>
                        <div class="col-md-12 ctr">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Number of calls</th>
                                        <!-- <th>Calls done Yesterday</th>
                                        <th>Calls for Today</th>
                                        <th>Productivity</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($productivity_report as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $value->first_name." ".$value->last_name; ?></td>
                                            <td>
                                                <a href="<?php echo base_url().'view_callbacks?advisor='.$value->id.'&for=dashboard'; ?>"><?php echo $value->total_calls; ?></a>
                                            </td>
                                            <!-- <td><?php echo $value->yesterday_callback_count; ?></td>
                                            <td><?php echo $value->today_callback_count; ?></td>
                                            <td><?php echo $value->productivity; ?> %</td> -->
                                        </tr>
                                    <?php } ?>
                                        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                  <div class="col-md-4">
                    <div class="row top-mg dash-wd">
                        <h2>Live Feedback<button type="submit" class="btn btn-default" id="refresh">Refresh</button></h2>
                        <div class="col-md-12 ctr">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Last Login Time</th>
                                    </tr>
                                </thead>
                                <tbody id="live_feed_back_body">
                                    <?php foreach ($live_feed_back as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $value->first_name." ".$value->last_name; ?> (<?php echo ($value->type == 1)?'User':'Manager'; ?>)</td>
                                            <td>
                                                <?php echo $value->last_login; ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
              
            </div>
            <br/><br/><br/><br/><br/>
            
        </div>
        <div class="container">
            <div class="top-mg dash-wd">
                <div class="col-md-4">
                    <div class="row top-mg dash-wd">
                        <h2>Source Analysis</h2>
                        <div class="col-md-12 ctr">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Lead Source</th>
                                        <th>Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($lead_source_report as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $this->common_model->get_leadsource_name($key); ?></td>
                                            <td><?php echo $value; ?></td>
                                        </tr>
                                    <?php } ?>
                                        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row top-mg dash-wd">
                        <h2>Revenue List</h2>
                        <input type="text" class="form-control" id="revenueMonth" name="email2" placeholder="Click to filter" value="<?php echo date('m/Y'); ?>" > <button id="filter_revenue" onclick="get_revenues();">Filter</button>
                        <br>
                        <div class="col-md-12 ctr">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>User name</th>
                                        <th>Project</th>
                                        <th>Net Revenue</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody id="revenue_data">
                                        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--<div class="col-md-3">
                    <div class="row top-mg dash-wd">
                        <h2>Name/State/</h2>
                    </div>
                </div>-->
            </div>
        </div>
    <?php }?>
												    
												</div>
									
									</div>
									<?php
								}?>
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
<!--js 
<script type="text/javascript" src="<?php echo base_url()?>assets/js/TweenLite.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/CSSPlugin.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.nicescroll.js"></script>-->
<!--<script src="<?php echo base_url()?>assets/js/scripts.js"></script>-->
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