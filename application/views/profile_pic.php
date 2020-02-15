<?php
if($this->session->userdata('user_type')!='admin')
{
  ?>

<a href="#" id="OpenImgUpload"><img src="<?php echo base_url()?>uploads/<?= $this->session->userdata('profile_pic');?>" width="150" height="150"></a> 
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
  <a href="#" id="OpenImgUpload"><img src="<?php echo base_url()?>uploads/<?= $this->session->userdata('profile_pic');?>" width="150" height="150"></a> 
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
?>
