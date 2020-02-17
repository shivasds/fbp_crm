<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    $this->load->view('inc/admin_header'); 
    $this->load->model('user_model');
    
   
   //echo $string_ids;

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
                        <div class="outter-wp">
                                <!--custom-widgets-->
                                                <div class="custom-widgets">
                                                    <?php 
                                                   // print_r($active_count);die; 
                                                    if ($this->session->userdata('user_type')=="admin") { 
                                                    ?>
                                                    
                                                   <div class="row-one">
                                                        <div class="col-md-3 widget">
                                                            <div class="stats-left ">
                                                                <h5>Today's</h5>
                                                                <h4> Active Cp's</h4>
                                                            </div>
                                                            <div class="stats-right">
                                                                <label><a href="#" class="active_emp" data-type="active_user_total"><?=count($active_count); ?></a></label>
                                                            </div>
                                                            <div class="clearfix"> </div>   
                                                        </div>
                                                        <div class="col-md-3 widget states-mdl">
                                                            <div class="stats-left">
                                                                <h5>Overdue</h5>
                                                                <h4>Updates</h4>
                                                            </div>
                                                            <div class="stats-right">
                                                                <label> 5    </label>
                                                            </div>
                                                            <div class="clearfix"> </div>   
                                                        </div>
                                                        <div class="col-md-3 widget states-thrd">
                                                            <div class="stats-left">
                                                                <h5>Assigned</h5>
                                                                <h4>Callbacks</h4>
                                                            </div>
                                                            <div class="stats-right">
                                                                <label><a href="#" class="view_callbacks" data-type="user_overdue">101 </a></label>
                                                            </div>
                                                            <div class="clearfix"> </div>   
                                                        </div>
                                                        <div class="col-md-3 widget states-last">
                                                            <div class="stats-left">
                                                                <h5>Closure</h5>
                                                                <h4>Callbacks</h4>
                                                            </div>
                                                            <div class="stats-right">
                                                                <label>16</label>
                                                            </div>
                                                            <div class="clearfix"> </div>   
                                                        </div>
                                                        <div class="clearfix"> </div>   
                                                    </div>
                                                    <br>
                                                    <div class="row-one">
                                                        <div class="col-md-3 widget">
                                                            <div class="stats-left ">
                                                                <h5>Today's</h5>
                                                                <h4>New Leads </h4>
                                                            </div>
                                                            <div class="stats-right">
                                                                <label> 100</label>
                                                            </div>
                                                            <div class="clearfix"> </div>   
                                                        </div>
                                                        <div class="col-md-3 widget states-mdl">
                                                            <div class="stats-left">
                                                                <h5>Upcoming</h5>
                                                                <h4>Tabs</h4>
                                                            </div>
                                                            <div class="stats-right">
                                                                <label>- </label>
                                                            </div>
                                                            <div class="clearfix"> </div>   
                                                        </div>
                                                        <div class="col-md-3 widget states-thrd">
                                                            <div class="stats-left">
                                                                <h5>Upcoming</h5>
                                                                <h4>Tabs</h4>
                                                            </div>
                                                            <div class="stats-right">
                                                                <label>-</label>
                                                            </div>
                                                            <div class="clearfix"> </div>   
                                                        </div>
                                                        <div class="col-md-3 widget states-last">
                                                            <div class="stats-left">
                                                                <h5>Upcoming</h5>
                                                                <h4>Tabs</h4>
                                                            </div>
                                                            <div class="stats-right">
                                                                <label>-</label>
                                                            </div>
                                                            <div class="clearfix"> </div>   
                                                        </div>
                                                        <div class="clearfix"> </div>   
                                                    </div>
                                                    <br>
                                               
                                                <?php }
                                               ?>
                                                    
                                                </div>
                                    
                                    </div>
<!--/tabs-->
                                        <div class="tab-main">
                                             <!--/tabs-inner-->
                                                
                                                </div>
                                              <!--//tabs-inner-->

                                     <!--footer section start-->
                                        <footer>
                                           <p>&copy <?= date('Y')?> Fullbasket Property . All Rights Reserved | Design by <a href="https://secondsdigital.com/" target="_blank">Seconds Digital Solutions.</a></p>
                                        </footer>
                                    <!--footer section end-->
                                </div>
                            </div>
                <!--//content-inner-->
            <!--/sidebar-menu-->
                <div class="sidebar-menu">
                    <header class="logo">
                    <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo"> <h1>FBP</h1></span> 
                    <!--<img id="logo" src="" alt="Logo"/>--> 
                  </a> 
                </header>
            <div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
            <!--/down-->
                            <div class="down">  
                                      <?php $this->load->view('profile_pic');?>
                                      <a href="#"><span class=" name-caret"><?php echo $this->session->userdata('user_name'); ?></span></a>
                                       <p><?php echo $this->session->userdata('user_type'); ?></p>
                                    <?php if($this->session->userdata('user_type')=='user')
                                       {?>
                                      <a href="#"><span class="name-caret">RM:</span> <?php echo $this->session->userdata('manager_name'); ?></a><br>
                                        <?php } ?>
                                    <ul>
                                    <li><a class="tooltips" href="<?= base_url('dashboard/profile'); ?>"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
                                        <li><a class="tooltips" href="#"><span>Settings</span><i class="lnr lnr-cog"></i></a></li>
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
<script src="<?php echo base_url()?>assets/js/scripts.js"></script>
<!--<script src="<?php echo base_url()?>assets/js/scripts.js"></script>-->

<!-- Bootstrap Core JavaScript -->
  
   <script>
    $(document).ready(function() {
        $('#example').DataTable();
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

        $('.active_emp').click(function(){
            var type = $(this).data('type');
            var data = {};
            switch (type)
            {
                case "active_user_total":  
                    break;
            }
            
            admin_dashboard(data,'post');

        });
         function admin_dashboard(data, method) {
        var form = document.createElement('form');
        form.method = method;
        form.action = "<?php echo base_url('admin/')."admin_dashboard" ?>";
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
        $('#example').DataTable();
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