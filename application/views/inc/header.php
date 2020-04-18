<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>User</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Augment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url()?>assets/css/style.css" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url()?>assets/css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.checked {
  color: orange;
}
</style>
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/icon-font.min.css" type='text/css' />    
<link href="<?php echo base_url()?>assets/css/fabochart.css" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url()?>assets/css/dropdown.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<link rel="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://rawgit.com/KidSysco/jquery-ui-month-picker/v3.0.0/demo/MonthPicker.min.css"/>  
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/dygraph-combined.js"></script>
<!--
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url()?>assets/js/amcharts.js"></script>    
<script src="<?php echo base_url()?>assets/js/serial.js"></script>  
<script src="<?php echo base_url()?>assets/js/light.js"></script>   
<script src="<?php echo base_url()?>assets/js/radar.js"></script>   
<script src="<?php echo base_url()?>assets/js/dropdown.js"></script>  -->    
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script> 
<script src="<?php echo base_url()?>assets/js/css3clock.js"></script>
<script src="<?php echo base_url()?>assets/js/skycons.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>

<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>-->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://rawgit.com/KidSysco/jquery-ui-month-picker/v3.0.0/demo/MonthPicker.min.js"></script>
<script type="text/javascript">
    /* window.setInterval(function(){
                $.ajax({
                          //dataType : "json",
                          url: 'make_user_online',
                          success:function(data)
                          {
                         // alert('user is actice');
                          },
                          error: function (jqXHR, status, err) {
                             //alert('Local error callback');
                          }
                    }); 
}, 5000);*/
</script>
<script type="text/javascript">
    $(function(){
        $('.datepicker').each(function(){
            $(this).datepicker({
                dateFormat: 'yy-mm-dd',
                beforeShow: function() {
                    setTimeout(function(){
                        $('.ui-datepicker').css('z-index', 99999999999999);
                    }, 0);
                }
             });
        });
        $('#ui-datepicker-div').draggable();
        $('#c_bkngMnth, #c_estMonthofInvoice').MonthPicker({
     Button: false
		  });
        $('.timePicker').each(function(){
            $(this).timepicker({ 'timeFormat': 'H:i' });
        });
    });

 
</script> 


</head> 