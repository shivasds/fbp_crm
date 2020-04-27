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
    <style>
      @media (max-width:375px){
      .users-list>li {
    width: 50%!important;
    float: left;
    padding: 10px;
    text-align: center;
}
      }
      .users-list>li {
    width: 20%!important;
    float: left;
    padding: 10px;
    text-align: center;
}
  .fileDiv {
  position: relative;
  overflow: hidden;
}
.upload_attachmentfile {
  position: absolute;
  opacity: 0;
  right: 0;
  top: 0;
}
.btnFileOpen {margin-top: -50px; }

.direct-chat-warning .right>.direct-chat-text {
    background: #d2d6de;
    border-color: #d2d6de;
    color: #444;
  text-align: right;
}
.direct-chat-primary .right>.direct-chat-text {
    background: #3c8dbc;
    border-color: #3c8dbc;
    color: #fff;
  text-align: right;
}

.img_cont{
			position: relative;
		height: auto;
			width: 70px;
	}
  .selectVendor{
    width: 30%; 
height: 100px; 
/* border: 5px dashed #f7a239; */
  }

.users-list>li img { 
    height: -webkit-fill-available!important;
}

/* .users-list>li img {
    border-radius: 50%;
    width: 100%;
    height: auto!important;
} */

@media (max-width: 1440px){
  #chatSection{
  position: fixed;
  width: 43%;
}
}
@media (max-width: 550px){
#chatSection {
    position: initial;
    width: auto;
}
}
.message-notify{
	  position: absolute;
    color: white;
    height: 22px;
    width: 22px;
    background-color: #052963e0;
    border-radius: 68%;
    bottom: 2.1em;
    right: 0.3em;
	}
.spiner{}
.spiner .fa-spin { font-size:24px;}
.attachmentImgCls{ width:400px; margin-left: -25px; cursor:pointer; }
</style>
 
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url('public')?>/components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('public')?>/components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url('public')?>/components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('public')?>/dist/css/AdminLTE.min.css">
  
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <link rel="stylesheet" href="<?=base_url('public')?>/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?=base_url('public')?>/plugins/pace/pace.min.css">
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
            <div class="outter-wp">
     <div class="row">
           
            <div class="col-sm-6 col-md-6 col-lg-6" id="chatSection" style="float:left;">
              <!-- DIRECT CHAT -->
              <div class="box box-warning direct-chat direct-chat-primary">
                <div class="box-header with-border">
                  <h3 class="box-title" id="ReciverName_txt">Chat Box</h3>

                  <div class="box-tools pull-right">
                    <span data-toggle="tooltip" title="Clear Chat" class="ClearChat"><i class="fa fa-comments"></i></span>
                    <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>-->
                   <!-- <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Clear Chat"
                            data-widget="chat-pane-toggle">
                      <i class="fa fa-comments"></i></button>-->
                   <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>-->
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages" style="height: 400px;background: #8a90900d;" id="content">
                     <!-- /.direct-chat-msg -->
                     <style>
                    #myBtn {
                        display: block;
                        /*position: fixed;*/
                        bottom: 193px;
                        right: 30px;
                        z-index: 99;
                        font-size: 16px;
                        border: medium none;
                        outline: medium none;
                        background-color: #FF3600;
                        color: #FFF;
                        cursor: pointer;
                        padding: 9px;
                        border-radius: 16px;

                    }

                    #myBtn:hover {
                      background-color: #555;
                    }
                  
                    </style>
                     <!--<button onclick="ScrollDown()" id="myBtn" title="Go to top">Bottom</button>-->
                     <div id="dumppy">
                       
                     </div>

                  </div>
                  <!--/.direct-chat-messages-->
 
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <!--<form action="#" method="post">-->
                    <div class="input-group">
                     <?php
            $obj=&get_instance();
          ?>
                      
                        <input type="hidden" id="Sender_Name" value="<?=$this->session->userdata('first_name');?>">
                        <input type="hidden" id="Sender_ProfilePic" value=" <?php echo base_url()?>uploads/<?= $this->session->userdata('profile_pic');?>">
                      
                      <input type="hidden" id="ReciverId_txt">
                        <input type="text" name="messageTxt" placeholder="Type Message ..." class="form-control message">
                          <span class="input-group-btn">
                             <button type="button" class="btn btn-success btn-flat btnSend" id="nav_down">Send</button>
                            <!-- <div class="fileDiv btn btn-info btn-flat"> <i class="fa fa-upload"></i> 
                             <input type="file" name="file" class="upload_attachmentfile"/></div>-->
                          </span>
                    </div>
                  <!--</form>-->
                </div>
                <!-- /.box-footer-->
              </div>
              <!--/.direct-chat -->
            </div>
 

            <div class="col-sm-6 col-md-6 col-lg-6" style="float:right;">
              <!-- USERS LIST -->
              <div class="box box-danger">
                  <div class="box-header with-border">
                  <h6>Active (<?php $count=$this->user_model->get_active_users_count(); echo $count[0]->count-1?$count[0]->count-1:0; ?>) </h6>
                    <h3 class="box-title"><?=$strTitle;?></h3>
                    <?php //print_r($vendorslist);echo $vendorslist[0]['id']."this is vendorslist";
                    $vendors='';
                    foreach ($vendorslist as $Vendor) {
                    $vendors.=strval($Vendor['id'].",");
                    }
                    $vendors = rtrim($vendors, ", ");
                              
                    //echo $vendors;?>
                    <div class="box-tools pull-right">
                      <span class="label label-danger"><?=count($vendorslist);?> <?=$strsubTitle;?></span>
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.box-header -->
                <div class="box-body">
                 
                  <ul class="users-list clearfix">
                  
                    <?php if(!empty($vendorslist)){
                    
                    foreach($vendorslist as $v):
                      $this->load->model('user_model');
                      $user=$this->user_model->get_user_details($v);
                      $s =$user[0]['last_update']; 
                      $i = strtotime(date('Y-m-d H:i:s')) - strtotime($s);
                      //echo $i;
                      if($i<=10){
                        ?>
                        <style>
                        /* .selectVendor  img{
                          border: 2px solid #0e8016;
                        } */
                        </style>
                        <?php
                      }else{
                        ?>
                        <style>
                        .selectVendor  img{
                          border: 2px solid #de2323;
                          box-shadow: 2px 2px 5px #de2323;
                        }
                        </style>
                        <?php
                      }
                    ?>
                      <li class="selectVendor img_cont"  id="<?=$user[0]['id'];?>" title="<?=$user[0]['first_name'];?>">
                          <img onclick="ScrollDown();" style=" <?php if($i<=20){$count++;echo 'width: 100%;height: 100%;border: 2px solid #0e8016;box-shadow: 2px 2px 5px #0e8016;';}?>" src="<?=base_url('uploads/').$user[0]['profile_pic'];?>" alt="<?=$user[0]['first_name'];?>" title="<?=$user[0]['first_name'].' '.$user[0]['last_name']?>">
                          <?php
                         $unread = $this->ChatModel->get_unread_msgs($this->session->userdata('user_id'),$user[0]['id']);
                                           if($unread[0]["count"]==0)
                                            $space="";
                                        else
                                        {
                                         echo '<span class="message-notify">';
                                         $space = $unread[0]["count"];
                                            echo $space;
                                        }
                                            
                                          ?></span>
                                          <br>
                          <a class="users-list-name" href="#"><?=$user[0]['first_name'];?></a>
                          <!--<span class="users-list-date">Yesterday</span>-->
                        </li>
                        <?php
                        endforeach;?>
                        
                        <?php }else{?>
                        <li>
                          <a class="users-list-name" href="#">No Users's Find...</a>
                        </li>
                      <?php } ?>
                    
                    
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
               <!-- <div class="box-footer text-center">
                  <a href="javascript:void(0)" class="uppercase">View All Users</a>
                </div>-->
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->            
          </div>
    
    <!-- /.row --> 

                  
                  </div>
<!--/tabs-->
                    <div class="tab-main">
                       <!--/tabs-inner-->
                        <div class="tab-inner">

                            </div>
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
<script src="<?=base_url('public/chat/chat.js');?>"></script> 
<!--<!--<script src="<?php echo base_url()?>assets/js/scripts.js"></script>-->-->

<!-- Bootstrap Core JavaScript -->
 

<!-- Bootstrap 3.3.7 -->

  
<!-- SlimScroll -->
<!-- FastClick -->

<!-- AdminLTE App -->
<script src="<?=base_url('public')?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('public')?>/dist/js/demo.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
  <?php if($this->uri->segment(1) != 'chat'){?>
  $(document).ajaxStart(function () {
    Pace.restart();
  });
  <?php }?>
  </script>
</body>
</html>