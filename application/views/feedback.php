 
<!DOCTYPE html>
<html>
<head>
<title>Feedback Form</title>
<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="" />
<!-- //for-mobile-apps -->
<link href='//fonts.googleapis.com/css?family=Amaranth:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Josefin+Slab:400,100,100italic,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    font-weight: 600;
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

.radio-btns label {
  font-size: 14px;
  vertical-align: text-top;
  margin: 0;
}
/*start-checkbox*/
.checkbox {
	padding-left: 25px;
	color: #B6B6B6;
	cursor: pointer;
	position:relative;
	font-size:12px;
}
 .checkbox:last-child {
	margin-bottom: 0;
}
.checkbox input {
	position: absolute;
	left: -9999px;
}
.checkbox i {
	position: absolute;
	bottom: 7px;
	left: 0px;
	display: block;
	width: 19px;
	height: 20px;
	outline: none;
  border: 3px solid #DF1E1C;
  background: #fff;
	border-radius:3px;
	-webkit-border-radius:3px;
	-moz-border-radius:3px;
	-o-border-radius:3px;
}
.checkbox input + i:after {
	position: absolute;
	opacity: 0;
	transition: opacity 0.1s;
	-o-transition: opacity 0.1s;
	-ms-transition: opacity 0.1s;
	-moz-transition: opacity 0.1s;
	-webkit-transition: opacity 0.1s;
}
.checkbox input + i:after {
	content: '';
	background: url(<?=base_url("assets/images/tick-mark1.png")?>) no-repeat center;
	top: -6px;
	left: 0px;
	width: 18px;
	height: 18px;
	text-align: center;
}
.form-elements li:nth-child(2) {
	margin-left: 18px;
	width: 37%;
}
.checkbox input:checked + i:after {
	opacity: 1;
}
.checkbox input:checked + i {
  border: 3px solid #DF1E1C;
  background: #fff;
}
.radio,.radio1,.radio2,.radio3 {
	position: relative;
	display:inline-block;
	margin-left:15px;
}
.radio:first-child,.radio1:first-child ,.radio2:first-child,.radio3:first-child{
	margin-left: 0;
	margin: 0;
}
.radio ,.radio1,.radio2 ,.radio3{
	padding-left:20px;
	line-height: 25px;
	color: #404040;
	cursor: pointer;
}
.radio  input[type="radio"],.radio1  input[type="radio"],.radio2  input[type="radio"],.radio3  input[type="radio"]{
	position: absolute;
	left: -9999px;
}
.radio-btns label {
  font-size: 14px;
  color: #A5A5A5;
  padding: 0px 0 0 2px;
  }
.radio i,.radio1 i,.radio2 i,.radio3 i  {
	position: absolute;
    top: 5px;
    left: 0;
    display: block;
    width: 12px;
    height: 12px;
    outline: none;
    border: 3px solid #ff7700;
    background: #fff;
    cursor: pointer;
    border-radius: 100%;
}

.radio input + i:after,.radio1 input + i:after ,.radio2 input + i:after,.radio3 input + i:after {
	position: absolute;
	opacity: 0;
	transition: opacity 0.1s;
	-o-transition: opacity 0.1s;
	-ms-transition: opacity 0.1s;
	-moz-transition: opacity 0.1s;
	-webkit-transition: opacity 0.1s;
}
 .radio input + i:after, .radio1 input + i:after , .radio2 input + i:after, .radio3 input + i:after{
	content: '';
	top: 6px;
	left: 7px;
	width: 5px;
	height: 5px;
	border-radius: 50%;
	-webkit-border-radius: 50%;
	-moz-border-radius: 50%;
	-o-border-radius: 50%;
}
.radio input:checked + i:after,.radio1 input:checked + i:after,.radio2 input:checked + i:after,.radio3 input:checked + i:after{
	opacity: 1;
}
.check_box {
   /* float: left;
    width: 8%;
}
.check_box_one {
   /* float: left;
    width: 31%;*/
}
/*** normal state ***/
.radio i ,.radio1 i,.radio2 i ,.radio3 i {
	transition: border-color 0.3s;
	-o-transition: border-color 0.3s;
	-ms-transition: border-color 0.3s;
	-moz-transition: border-color 0.3s;
	-webkit-transition: border-color 0.3s;
}
/*** checked state ***/
.radio input + i:after,.radio1 input + i:after,.radio2 input + i:after,.radio3 input + i:after {
    content: '';
    background: url(<?=base_url("assets/images/tick-mark1.png")?>) no-repeat -1px -1px;
    top: 3px;
    left: 3px;
    width: 6.5px;
    height: 6px;
    text-align: center;
    border-radius: 100%;
}
.radio input:checked + i ,.radio1 input:checked + i,.radio2 input:checked + i ,.radio3 input:checked + i{
  border: 3px solid #ff7700;
  background: #fff;
}
.swit {
    margin-bottom: 30px;
}
span.starRating {
    margin: 5px 0 30px;
}

.starRating:not(old){
  display        : inline-block;
  width          : 7.5em;
  height         : 1.5em;
  overflow       : hidden;
  vertical-align : bottom;
}

.starRating:not(old) > input{
  margin-right : -100%;
  opacity      : 0;
}

.starRating:not(old) > label{
  display         : block;
  float           : right;
  position        : relative;
  background      : url('../images/star-off.png');
  background-size : contain;
}

.starRating:not(old) > label:before{
  content         : '';
  display         : block;
  width           : 1.5em;
  height          : 1.5em;
  background      : url('../images/star-on.png');
  background-size : contain;
  opacity         : 0;
  transition      : opacity 0.2s linear;
}

.starRating:not(old) > label:hover:before,
.starRating:not(old) > label:hover ~ label:before,
.starRating:not(:hover) > :checked ~ label:before{
  opacity : 1;
}
/*-- responsive media queries --*/
@media (max-width: 1440px){
	.main {
		width: 29%;
	}	
}
@media (max-width: 1366px){
	.main {
		width: 31%;
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
		width: 67%;
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
</style>
</head>
<body>
<div class="content">
	<h1><img src="<?=base_url('assets/img/logo.png');?>"></h1>
	<h1>Feedback Form</h1>
	<?php if($this->session->flashdata('msg')): ?> 
    <?php echo "<script>alert('".$this->session->flashdata('msg')."')</script>"; ?>
<?php endif; ?>
	<div class="main">
		<form action="" method="post">
			<h5>Lead_id</h5>
				<input type="text" value="" name="l_id"placeholder="Please enter your lead id"   required="">
				<!--
					<input type="text" value="" placeholder="Please enter your lead id" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="">
				-->
				<?php
				$i=1;
 			$q_a =json_decode( json_encode($q_a), true);
 			foreach ($q_a as $q) {
 				 
 			?>
		<h5><?=$i.'. '.$q['question'];?><input type="hidden" name="question<?=$i?>" value="<?=$q['q_id']?>"></h5>

			<div class="radio-btns">
					<div class="swit">								
						<?php 
						if($q['a1']==5 || $q['a1'] ==10)
							{
								echo '<div class="check_box"> <div class="radio"> <label><input class="shiva'.$i.'"type="radio" name="radio'.$i.'" value=" " checked ><i></i>';
			 
							}
							else {
							echo '<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio'.$i.'" value="'.$q['a_id1'].'" required><i></i>'.$q['a1'];
							}?></label><?php if($q['a1']==5 || $q['a1'] ==10)
							{
			 echo "<div class='starrr' id='star".$i."'></div> ";
							}?> </div></div><br>
							<?php 
                        if($q['a2']!='')
                        	{?>
                        <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio<?=$i?>" value="<?=$q['a_id2']?>"><i></i><?=$q['a2']?></label> </div></div><br>
                        <?php 
                    }
                        if($q['a3']!='')
                        	{?>
						<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio<?=$i?>" value="<?=$q['a_id3']?>"><i></i><?=$q['a3']?></label> </div></div><br>
						<?php 
						}
                        if($q['a4']!='')
                        	{?> 
						<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio<?=$i?>" value="<?=$q['a_id4']?>"><i></i><?=$q['a4']?></label> </div></div><br>
						<?php 
					}
                        if($q['a5']!='')
                        	{?> 
						<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio<?=$i?>" value="<?=$q['a_id5']?>"><i></i><?=$q['a5']?></label> </div></div><br>
						<?php 
					}
                        if($q['a6']!='')
                        	{?> 
						<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio<?=$i?>" value="<?=$q['a_id6']?>"><i></i><?=$q['a6']?></label> </div></div><br>
						<?php
					}
					?>
						<div class="clear"></div>
					</div>
			</div>
			<?php
			$i++;
			}
				?>
				<input type="hidden" name="ivalue" value="<?=$i?>">
				<center><input type="submit" name="submit" value="submit"></center>
 
		</form>
	</div>
	<p class="footer">&copy; <?=date('Y');?> Seconds Digitals. All Rights Reserved | Developed by <a href="http:s//secondsdigital.com"> seconds digital solutions</a></p>
</div>

<script src="http:s//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo base_url()?>assets/js/starrr.js"></script> 
<script>
  $('#star1').starrr({
      change: function(e, value){
        if (value) {
          $('.your-choice-was').show();  
          $.ajax({
                                    type:"POST",
                                    url: "<?php echo base_url()?>FeedbackController/starValue/"+value,
                                   data:{value:value},
                                    success:function(data) {
                                        $('.shiva1').val(data);
                                    }
                                });
        } 
      }
    });
  	  $('#star2').starrr({
      change: function(e, value){
        if (value) {
          $('.your-choice-was').show();
         // alert(value);
         // var value =$('.shiva').text(value);
          //$('.shiva').val(value);
          $.ajax({
                                    type:"POST",
                                    url: "<?php echo base_url()?>FeedbackController/starValue/"+value,
                                   data:{value:value},
                                    success:function(data) {
                                        $('.shiva2').val(data);
                                    }
                                });
        } 
      }
    });
  	    $('#star3').starrr({
      change: function(e, value){
        if (value) { 
          $.ajax({
                type:"POST",
                url: "<?php echo base_url()?>FeedbackController/starValue/"+value,
               data:{value:value},
                success:function(data) {
                    $('.shiva3').val(data);
                }
            });
        } 
      }
    });
  	     $('#star4').starrr({
      change: function(e, value){
        if (value) { 
          $.ajax({
                type:"POST",
                url: "<?php echo base_url()?>FeedbackController/starValue/"+value,
               data:{value:value},
                success:function(data) {
                    $('.shiva4').val(data);
                }
            });
        } 
      }
    });
  	      $('#star5').starrr({
      change: function(e, value){
        if (value) { 
          $.ajax({
                type:"POST",
                url: "<?php echo base_url()?>FeedbackController/starValue/"+value,
               data:{value:value},
                success:function(data) {
                    $('.shiva5').val(data);
                }
            });
        } 
      }
    });
  	       $('#star6').starrr({
      change: function(e, value){
        if (value) { 
          $.ajax({
                type:"POST",
                url: "<?php echo base_url()?>FeedbackController/starValue/"+value,
               data:{value:value},
                success:function(data) {
                    $('.shiva6').val(data);
                }
            });
        } 
      }
    });
  	        $('#star7').starrr({
      change: function(e, value){
        if (value) { 
          $.ajax({
                type:"POST",
                url: "<?php echo base_url()?>FeedbackController/starValue/"+value,
               data:{value:value},
                success:function(data) {
                    $('.shiva7').val(data);
                }
            });
        } 
      }
    });
  	         $('#star8').starrr({
      change: function(e, value){
        if (value) { 
          $.ajax({
                type:"POST",
                url: "<?php echo base_url()?>FeedbackController/starValue/"+value,
               data:{value:value},
                success:function(data) {
                    $('.shiva8').val(data);
                }
            });
        } 
      }
    });
  	          $('#star9').starrr({
      change: function(e, value){
        if (value) { 
          $.ajax({
                type:"POST",
                url: "<?php echo base_url()?>FeedbackController/starValue/"+value,
               data:{value:value},
                success:function(data) {
                    $('.shiva9').val(data);
                }
            });
        } 
      }
    });
  	           $('#star10').starrr({
      change: function(e, value){
        if (value) { 
          $.ajax({
                type:"POST",
                url: "<?php echo base_url()?>FeedbackController/starValue/"+value,
               data:{value:value},
                success:function(data) {
                    $('.shiva10').val(data);
                }
            });
        } 
      }
    });
  	            $('#star3').starrr({
      change: function(e, value){
        if (value) { 
          $.ajax({
                type:"POST",
                url: "<?php echo base_url()?>FeedbackController/starValue/"+value,
               data:{value:value},
                success:function(data) {
                    $('.shiva3').val(data);
                }
            });
        }  
		  console.log("m in feeddack" +value)
          $('.choice').text(value);
        }
        });  
  </script> 
</body>
</html>
