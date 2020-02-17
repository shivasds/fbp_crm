
<style>
  .MyImage{
    background: url(<?php echo base_url()?>uploads/<?= $this->session->userdata('profile_pic');?>);
    width: 150px;
    height: 150px;
    position: relative;
    /* margin-left: 29px; */
    display: inline-block;
    border-radius: 100%;
    border: 3px solid #002561;
}
.penLayer{
  position:absolute;
  width:100%;
  height:50%;
  margin-top:50%;
  background:rgba(0, 0, 0, 0.46);
  border-bottom-left-radius: 110px;
  border-bottom-right-radius: 110px;
  display:none;
  /* border-radius: 100%; */

  /* width: 200px;
    height: 100px;
    background: rgba(0, 0, 0, 0.21);
    border-bottom-left-radius: 110px;
    border-bottom-right-radius: 110px; */
    border-bottom: 0;

}
.penLayer img{
  width:60px;
height:60px;
position:absolute;
left:50%;
top:50%;
margin-top:-30px;
margin-left:-30px;

}
@media (max-width: 375px){
    .MyImage{
    background: url(<?php echo base_url()?>uploads/<?= $this->session->userdata('profile_pic');?>);
    width: 140px;
    height: 140px;
    position: relative;
    /* margin-left: 29px; */
    display: inline-block;
    border-radius: 100%;
    border: 2px solid #002561;
}
.penLayer{
  position:absolute;
  width:100%;
  height:50%;
  font-size: 14px;
  margin-top:50%;
  background:rgba(0, 0, 0, 0.46);
  border-bottom-left-radius: 110px;
  border-bottom-right-radius: 110px;
  display:none;
    border-bottom: 0;

}
.penLayer img{
  width:60px;
height:60px;
position:absolute;
left:50%;
top:50%;
margin-top:-30px;
margin-left:-30px;

}
}
.down i {
  font-size: 1.5em;
    margin-top: 10px;
    vertical-align: middle;
}
  </style>
<?php
if($this->session->userdata('user_type')!='admin')
{
  ?>
<div class="MyImage" id="OpenImgUpload">
<!-- <a href="#" id="OpenImgUpload"><img src="<?php echo base_url()?>uploads/<?= $this->session->userdata('profile_pic');?>" width="150" height="150"></a>  -->
<div class="penLayer">
<i class="fa fa-camera" style="color: white;" aria-hidden="true"></i>
<br>
<span style="color: white;">Update</span>
  </div></div>
                                      <?php echo form_open_multipart('dashboard/do_upload');?>
                                      <input type="file" id="file" name="file" style="display:none"/> 

                                      <script type="text/javascript">
                                        $('#OpenImgUpload').click(function(){ $('#file').trigger('click'); });
                                        $('#file').on('change',function()
                                        {
                                            $('#upload').trigger('click');
                                        });
                                      </script>
                                      <input type="submit" name="upload" id="upload" value="upload" style="display: none">
<?php
}
else
{
  ?>
 <div class="MyImage" id="OpenImgUpload"> 
 <div class="penLayer">
  <!-- <a href="#" id="OpenImgUpload"><img src="<?php echo base_url()?>uploads/<?= $this->session->userdata('profile_pic');?>" width="150" height="150"></a>  -->
  <i class="fa fa-camera" style="color: white;" aria-hidden="true"></i>
<br>
<span style="color: white;">Update</span>
  </div></div>                          
  <?php echo form_open_multipart('admin/do_upload');?>
                                      <input type="file" id="file" name="file" style="display:none"/> 

                                      <script type="text/javascript">
                                        $('#OpenImgUpload').click(function(){ $('#file').trigger('click'); });
                                        $('#file').on('change',function()
                                        {
                                            $('#upload').trigger('click');
                                        });
                                      </script>
                                      <input type="submit" name="upload" id="upload" value="upload" style="display: none">
                
<?php 
}
echo form_close();
?>
<script>
  $(document).ready(function(){

 
$('.MyImage').hover(function(){

 $('.penLayer').fadeToggle();

})

})

$(window).resize(function(){

if ($(window).width() <= 400) {  

  $('.MyImage').hover(function(){

$('.penLayer').fadeToggle();

})

}     

});
  </script>

