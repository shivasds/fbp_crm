
<style>
    .tooltip {
		position: relative;
    display: contents;
    /* border-bottom: 1px dotted black; */
    font-size: 15px;
  }
  
  .tooltip .tooltiptext {
	visibility: hidden;
	width: 80px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    top: 100%;
    left: 50%;
    margin-left: -35px;
  }
  
  .tooltip:hover .tooltiptext {
	visibility: visible;
  }
	</style>
<?php
$baseURL = ($this->session->userdata('user_type') == 'admin') ? base_url('admin') : base_url();
$i=1;
?>
<div class="menu">
									<ul id="menu" >
										<li class="<?php if($name=='index'){echo 'active';}?>"><a href="<?php echo $baseURL; ?>"><i class="fa fa-home"></i> <span>Home</span></a></li>
	

	<?php
    $this->load->model('Common_model');
    $parentModules = $this->common_model->getNavbarByClause(['parentId'=>0]);
    $aAttr = '';
    $permissionArry = json_decode($this->session->userdata('permissions'), true);
    if($parentModules) {
        foreach ($parentModules as $pModule) {
            if($permissionArry && in_array($pModule['id'], $permissionArry)) {
                
                $baseLink = ($this->session->userdata('user_type') == 'admin') ? base_url('admin/'.$pModule['permalink']) : base_url($pModule['permalink']);
                $childModules = $this->common_model->getNavbarByClause(['parentId' => $pModule['id']]);
                if($childModules) 
                    $aAttr  = 'data-toggle="dropdown" dropdown-toggle';
                ?>

 <li class="<?= ($this->router->fetch_method() == $pModule['permalink']) ? 'active' : '' ?>">
                    <a href="<?= $baseLink;?>" <?= $aAttr; ?> ><i class="<?php  echo $pModule['class']?>"></i> <span><?= $pModule['module'].((count($childModules)>0) ? '<span class="caret"></span>' :'') ?></span></a>
                    <?php
                    if(count($childModules)>0){
                        echo '<ul class="dropdown-menu scrollbar1" id="bluescroll">';
                        foreach ($childModules as $cModule) {
                            $baseLink = ($this->session->userdata('user_type') == 'admin') ? base_url('admin/'.$cModule['permalink']) : base_url($cModule['permalink']);
                            //if(in_array($cModule['id'], $permissionArry))
                               /* if($cModule['module']== 'Online Leads')
                                {
                                     echo '<li class="dropdown-submenu" ><a href="#" class="test" tabindex="-1">'.$cModule['module'].'<span class="caret right"></span></a>';
                                     ?>
                                     
        <!--  <li><a tabindex="-1" href="<?php echo base_url().'admin/acres99_leads'?>">99 Acres</a></li>
          <li><a tabindex="-1" href="<?php echo base_url().'admin/magicbricks_leads'?>">Magic Bricks</a></li>
                                    <ul class="dropdown-menu">
          <li><a tabindex="-1" href="<?php echo base_url().'admin/acres99_leads'?>">99 Acres</a></li>
          <li><a tabindex="-1" href="<?php echo base_url().'admin/magicbricks_leads'?>">Magic Bricks</a></li>
          <!--<li><a tabindex="-1" href="<?php //echo base_url().'admin/commonfloor_leads'?>">Common Floor</a></li>-->

        </ul></li>
                                     <?php
                                }
                                elseif($cModule['module']== 'Online Lead Report')
                                {
                                echo '<li><a href="'.$baseLink.'">'.$cModule['module'].'</a></li>';
                                }
                                else
                                {
                                   echo '<li><a href="'.$baseLink.'">'.$cModule['module'].'</a></li>';
                                }*/
                                 echo '<li><a href="'.$baseLink.'">'.$cModule['module'].'</a></li>';
                        }
                        echo '</ul>';
                    }
                    ?>
                </li>
                <?php
            }
            $i++;
        }
    }
    ?>


										<!-- <li id="menu-academico" ><a href="#"><i class="fa fa-table"></i> <span> Tabs &amp; Panels</span> <span  style="float: right"></span></a>
										   <ul id="menu-academico-sub" >
											<li id="menu-academico-avaliacoes" ><a href="tabs.html"> Tabs &amp; Panels</a></li>
											<li id="menu-academico-boletim" ><a href="widget.html">Widgets</a></li>
											<li id="menu-academico-avaliacoes" ><a href="calender.html">Calendar</a></li>


											
										  </ul>
										</li>
										 <li id="menu-academico" ><a href="#"><i class="fa fa-file-text-o"></i> <span>Ui Elements</span> <span class="fa fa-angle-right" style="float: right"></span></a>
											 <ul id="menu-academico-sub" >
												<li id="menu-academico-avaliacoes" ><a href="forms.html">Forms</a></li>
												<li id="menu-academico-boletim" ><a href="validation.html">Validation Forms</a></li>
												<li id="menu-academico-boletim" ><a href="table.html">Tables</a></li>
												<li id="menu-academico-boletim" ><a href="buttons.html">Buttons</a></li>
											  </ul>
										 </li>
									<li><a href="typography.html"><i class="lnr lnr-pencil"></i> <span>Typography</span></a></li>
									<li id="menu-academico" ><a href="#"><i class="lnr lnr-book"></i> <span>Pages</span> <span class="fa fa-angle-right" style="float: right"></span></a>
										  <ul id="menu-academico-sub" >
										    <li id="menu-academico-avaliacoes" ><a href="login.html">Login</a></li>
										    <li id="menu-academico-boletim" ><a href="register.html">Register</a></li>
											<li id="menu-academico-boletim" ><a href="404.html">404</a></li>
											<li id="menu-academico-boletim" ><a href="sign.html">Sign up</a></li>
											<li id="menu-academico-boletim" ><a href="profile.html">Profile</a></li>
										  </ul>
									 </li>
									 <li><a href="#"><i class="lnr lnr-envelope"></i> <span>Mail Box</span><span class="fa fa-angle-right" style="float: right"></span></a>
									   <ul>
										<li><a href="inbox.html"><i class="fa fa-inbox"></i> Inbox</a></li>
										<li><a href="compose.html"><i class="fa fa-pencil-square-o"></i> Compose Mail</a></li>
										<li><a href="editor.html"><span class="lnr lnr-highlight"></span> Editors Page</a></li>
									
									  </ul>
									</li>
							        <li id="menu-academico" ><a href="#"><i class="lnr lnr-layers"></i> <span>Components</span> <span class="fa fa-angle-right" style="float: right"></span></a>
										 <ul id="menu-academico-sub" >
											<li id="menu-academico-avaliacoes" ><a href="grids.html">Grids</a></li>
											<li id="menu-academico-boletim" ><a href="media.html">Media Objects</a></li>

										  </ul>
									 </li>
									<li><a href="chart.html"><i class="lnr lnr-chart-bars"></i> <span>Charts</span> <span class="fa fa-angle-right" style="float: right"></span></a>
									  <ul>
										<li><a href="map.html"><i class="lnr lnr-map"></i> Maps</a></li>
										<li><a href="graph.html"><i class="lnr lnr-apartment"></i> Graph Visualization</a></li>
									</ul>
									</li>
									<li id="menu-comunicacao" ><a href="#"><i class="fa fa-smile-o"></i> <span>More</span><span class="fa fa-angle-double-right" style="float: right"></span></a>
									  <ul id="menu-comunicacao-sub" >
										<li id="menu-mensagens" style="width:120px" ><a href="project.html">Projects <i class="fa fa-angle-right" style="float: right; margin-right: -8px; margin-top: 2px;"></i></a>
										  <ul id="menu-mensagens-sub" >
											<li id="menu-mensagens-enviadas" style="width:130px" ><a href="ribbon.html">Ribbons</a></li>
											<li id="menu-mensagens-recebidas"  style="width:130px"><a href="blank.html">Blank</a></li>
										  </ul>
										</li>
										<li id="menu-arquivos" ><a href="500.html">500</a></li>
									  </ul>
									</li>-->
								  </ul>
								</div>
								<style>
    .table {
        color: green;
       /* display: block;*/
        max-width: 100%;
        overflow: scroll; <!-- Available options: visible, hidden, scroll, auto -->

    }
</style>
