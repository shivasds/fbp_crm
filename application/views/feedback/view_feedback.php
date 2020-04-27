
<!DOCTYPE html>
<html>
<head>
<title>View Feedback</title>
<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="" />
<!-- //for-mobile-apps -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.checked {
  color: orange;
}
</style>
<style>
html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,dl,dt,dd,ol,nav ul,nav li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline;}
article, aside, details, figcaption, figure,footer, header, hgroup, menu, nav, section {display: block;}
ol,ul{list-style:none;margin:0px;padding:0px;}
blockquote,q{quotes:none;}
blockquote:before,blockquote:after,q:before,q:after{content:'';content:none;}
table{border-collapse:collapse;border-spacing:0;}
/* start editing from here */
a{text-decoration:none;}
.txt-rt{text-align:right;}/* text align right */
.txt-lt{text-align:left;}/* text align left */
.txt-center{text-align:center;}/* text align center */
.float-rt{float:right;}/* float right */
.float-lt{float:left;}/* float left */
.clear{clear:both;}/* clear float */
.pos-relative{position:relative;}/* Position Relative */
.pos-absolute{position:absolute;}/* Position Absolute */
.vertical-base{	vertical-align:baseline;}/* vertical align baseline */
.vertical-top{	vertical-align:top;}/* vertical align top */
nav.vertical ul li{	display:block;}/* vertical menu */
nav.horizontal ul li{	display: inline-block;}/* horizontal menu */
img{max-width:100%;}
/*end reset*/

body{
padding:0;
margin:0;
background:#4cc2c4;
font-family: 'Open Sans', sans-serif !important;
}

h1,h2,h3,h4,h5,h6{
	margin:0;
	
}	
p{
	margin:0;

}
ul{
	margin:0;
	padding:0;
}
label{
	margin:0;
}
/*-- main --*/
.content{
	padding:50px 0;
}
.content h1{
    color: #fff;
    font-size: 40px;
    text-align: center;
    letter-spacing: 1px;
	font-family: 'Amaranth', sans-serif;
}
.main{
	width:50%;
	margin:45px auto;
	background:#fff;
	padding:30px 30px;

}
p.footer {
    color: #fff;
    font-size: 14px;
    text-align: center;
}
p.footer a {
    color: #000;
	transition:0.5s all;
	-webkit-transition:0.5s all;
	-moz-transition:0.5s all;
	-o-transition:0.5s all;
	-ms-transition:0.5s all;	
}
p.footer a:hover {
    color: #fff;
	transition:0.5s all;
	-webkit-transition:0.5s all;
	-moz-transition:0.5s all;
	-o-transition:0.5s all;
	-ms-transition:0.5s all;	
}
.main form input[type="text"], .main form input[type="password"] {
    width: 94%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #e6e6e6;
    outline: none;
    color: #D8D5D5;
    margin-bottom: 30px;

}
.main h5 {
    color: #ff7700;
    margin-bottom: 8px;
	font-size:19px;
    font-family: 'Josefin Slab', serif;
    /*font-weight: 600;*/
    font-weight: bold;
}
.main h5 span{
	font-size:15px;	
	color:#ccc;
}
.main form input[type="text"]:hover,  .main textarea:hover{
	border: 1px solid #4cc2c4;
	color:#000;
	transition:0.5s all;
	-webkit-transition:0.5s all;
	-moz-transition:0.5s all;
	-o-transition:0.5s all;
	-ms-transition:0.5s all;
}

.main form input[type="submit"] {
    background: #ff7700;
    color: #FFFFFF;
    text-align: center;
    padding: 14px 0;
    border: none;
    border-bottom:4px solid #CA6106;
    font-size: 16px;
    outline: none;
    width: 25%;
    cursor: pointer;
    margin-bottom: 0px;
	text-transform:capitalize;

}
.main form input[type="submit"]:hover{
    background: #000;
    border-bottom:4px solid #403E3E;
	transition:0.5s all;
	-webkit-transition:0.5s all;
	-moz-transition:0.5s all;
	-o-transition:0.5s all;
	-ms-transition:0.5s all;	
}
 .main textarea {
    width: 94%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #e6e6e6;
    outline: none;
    color: #D8D5D5;
    margin-bottom: 20px;
	outline:none;
	resize:none;
    height: 100px;
    font-family: 'Lato', sans-serif !important;
}
td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;  
  text-align: center;
}

/*-- responsive media queries --*/
@media (max-width: 1440px){
	.main {
		width: 49%;
	}	
}
@media (max-width: 1366px){
	.main {
		width: 40%;
	}	
}
@media (max-width: 1280px){
	.main {
		width: 33%;
	}	
}
@media (max-width: 1080px){
	.main {
		width: 36%;
	}	
}
@media (max-width: 1024px){
	.main {
		width: 40%;
	}
	.main textarea {
		height: 80px;
	}	
	.main form input[type="text"],.swit {
		margin-bottom: 22px;
	}
	span.starRating {
		margin: 0px 0 22px;
	}
}
@media (max-width: 991px){
	.main {
		width: 42%;
	}
	.radio-btns label {
		font-size: 13px;
	}
	.main form input[type="text"],.main textarea,p.footer {
		font-size: 13px;
	}
	.radio input + i:after, .radio1 input + i:after, .radio2 input + i:after, .radio3 input + i:after {
		width: 6px;
		height: 6px;
	}
	.radio i, .radio1 i, .radio2 i, .radio3 i {
		top: 4px;
	}	
}
@media (max-width: 800px){
	.main {
		width: 49%;
	}
	.content h1 {
		font-size: 38px;
	}	
}
@media (max-width: 768px){
	.main {
		width: 49%;
	}	
}
@media (max-width: 736px){
	.main {
		width: 53%;
	}	
}
@media (max-width: 667px){
	.main {
		width: 56%;
	}	
}
@media (max-width: 640px){
	.main {
		width: 60%;
	}	
}
@media (max-width: 600px){
	.main {
		width: 64%;
	}	
}
@media (max-width: 568px){
	.main {
		width: 74%;
	}	
}
@media (max-width: 480px){
	.main form input[type="text"],.main textarea {
		padding: 7px;
		width: 95%;
	}
	.main {
		width: 78%;
	}	
}
@media (max-width: 414px){
	.main form input[type="text"], .main textarea {
		width: 94%;
	}
	.check_box,.check_box_one {
		/*float: left;
		width: 100%;*/
	}
	.main form input[type="submit"] {
		padding: 12px 0;
	}
	p.footer {
		line-height: 1.8em;
	}
	.content h1 {
		font-size: 35px;
	}
	.main h5 {
		font-weight: bold !important;
		line-height: 1.5em;
	}
	.main {
		width: 76%;
	}	
}
@media (max-width: 384px){
	.main form input[type="text"], .swit {
		margin-bottom: 18px;
	}
	.content h1 {
		font-size: 33px;
	}
	.main {
		margin: 35px auto;
		padding: 25px 25px;
	}
	
}
@media (max-width: 375px){
	
}
@media (max-width: 320px){
	.content h1 {
		font-size: 30px;
	}
	.main {
		padding: 20px 20px;
		width: 81%;
	}
	.main h5 {
		font-size: 16px;	
	}
	.main form input[type="submit"] {
		padding: 12px 0 8px;
	}
}
	table {
	font-family: arial, sans-serif;
	border-collapse: collapse;
	width: 100%;
	margin-bottom: 23px;
	}
</style>
<style type="text/css">
    @media print {
 
  #content, #content * {
    visibility: visible;
  }
  #content {
    position: absolute;
    left: 0;
    top: 0;
  } 
}
img.ribbon {
      position: fixed;
      z-index: 1;
      top: 0;
      right: 0;
      border: 0;
      cursor: pointer; }

   .starrr {
    display: inline-block; }

  .starrr a {
    font-size: 16px;
    padding: 0 1px;
    cursor: pointer;
    color: #FFD119;
    text-decoration: none; }
    .Currentdate{
    	float: right;
    margin-bottom: 20px;
    }
	
</style>
<script type="text/javascript">
	function printFunction( ) {
		window.print();
	}
</script>
<?php
if($print)
echo "<script>printFunction();</script>";

?>
</head>
<body> 
<div class="content">
	<h1><img src='/assets/img/logo.png'></h1>
	<h1>View Feedback</h1> 
	<div class="main">
  <form id="printFeedback" >
  	<div class="Currentdate">
  	<h6>Date: <?=$feedbacks[0]['date_created'];?></h6>
  </div>
		<table>
		<tr>
			<th><h5>Lead_id</h5></th>
			<th><h5>Username</h5></th>
			<th><h5>Employee Name</h5></th>
			<th><h5>Project Name</h5></th>
		</tr>
		<tr>
			<td><h6><?=$feedbacks[0]['lead_id'];?></h6> </td>
			<td><h6><?=$feedbacks[0]['name'];?></h6> </td>
			<td><h6><?=$feedbacks[0]['username'];?></h6> </td>
			<td><h6><?=$feedbacks[0]['projectname'];?></h6> </td>
		</tr>
		
		</table>
			<!-- <h5>Lead_id</h5>
			<h6><?=$feedbacks[0]['lead_id'];?></h6> 
			<br>
			<h5>Username</h5>
			<h6><?=$feedbacks[0]['name'];?></h6> 
			<br>
			<h5>Employee Name</h5>
			<h6><?=$feedbacks[0]['username'];?></h6> 
			<br>
			<h5>Project Name</h5>
			<h6><?=$feedbacks[0]['projectname'];?></h6> 
			<br> -->
				<?php
				$i=1;
				foreach($feedbacks as $f)
				{	
				?>
                <h5><?=$i.'. '.$f['question'];?></h5><br>
            <h6><?php if($f['a']==1){echo $f['a']." Star" ;}elseif( $f['a'] ==2 || $f['a'] ==3 || $f['a'] ==4 || $f['a']==5){echo $f['a']." Stars" ;} else{echo $f['a'];};?></h6>
                <br>
                <?php
                $i++;
	            } 
	            ?>   
	            <div class="container">
				  <span id="rateMe4"  class="feedback"></span>
				</div>
		</form>
		<script type="text/javascript">
			$(document).ready(function() {
			  $('#rateMe4').mdbRate();
			});
		</script> 
	</div> 
	</form>
</div>  
	</div> 
	</form>

<script type="text/javascript" src="<?php echo base_url()?>assets/js/starrr.js"></script>
<script>
  $('#star1').starrr({
      change: function(e, value){
        if (value) {
          $('.your-choice-was').show();
          $('.choice').text(value);
        } else {
          $('.your-choice-was').hide();
        }
      }
    });

  </script> 
</div> 
	<p class="footer">&copy; <?=date('Y');?> Seconds Digitals. All Rights Reserved | Developed by <a href="http:s//secondsdigital.com"> seconds digital solutions</a></p>
</div>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/starrr.js"></script>

<!--<script src="<?php echo base_url()?>assets/js/scripts.js"></script>-->
</body>
</html>
