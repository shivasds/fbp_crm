<?php
$count =  $this->callback_model->get_notification_count();
 $notifications = $this->callback_model->get_notification();

        $this->session->set_userdata('notifications',$notifications);
        ?>

           <ul class="nofitications-dropdown">
                                            <li class="dropdown note dra-down">
                                            <script type="text/javascript">
            
                                            function DropDown(el) {
                                                this.dd = el;
                                                this.placeholder = this.dd.children('span');
                                                this.opts = this.dd.find('ul.dropdown > li');
                                                this.val = '';
                                                this.index = -1;
                                                this.initEvents();
                                            }
                                            DropDown.prototype = {
                                                initEvents : function() {
                                                    var obj = this;

                                                    obj.dd.on('click', function(event){
                                                        $(this).toggleClass('active');
                                                        return false;
                                                    });

                                                    obj.opts.on('click',function(){
                                                        var opt = $(this);
                                                        obj.val = opt.text();
                                                        obj.index = opt.index();
                                                        obj.placeholder.text(obj.val);
                                                    });
                                                },
                                                getValue : function() {
                                                    return this.val;
                                                },
                                                getIndex : function() {
                                                    return this.index;
                                                }
                                            }

                                            $(function() {

                                                var dd = new DropDown( $('#dd') );

                                                $(document).click(function() {
                                                    // all dropdowns
                                                    $('.wrapper-dropdown-3').removeClass('active');
                                                });

                                            });

                                            </script>
                                            </li>
                                           <li class="dropdown note">
                                            <?php
                                           // print_r($this->session->userdata());
                                             
                                           $unread = $this->ChatModel->get_unread_msgs($this->session->userdata('user_id'));
                                           if($unread[0]["count"]==0)
                                            $space="";
                                        else
                                            $space = $unread[0]["count"];
                                            if($this->session->userdata('user_type')!='admin')
                                            

echo '<div class="tooltip"><a href="'. base_url('chat') .'" class="" ><i class="fa fa-commenting-o"></i> <span class="badge">'.$space.'</span></a> <span class="tooltiptext">Chat</span></div>';
                                          
                                          

                                          else
echo '<div class="tooltip"><a href="'. base_url('admin/chat') .'" class="" ><i class="fa fa-commenting-o"></i><span class="badge">'.$space.'</span></a><span class="tooltiptext">Chat</span></div>';
                                          
                                            ?>
                                        </li>
                                    
                            <li class="dropdown note">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell-o"></i> <span class="badge"><?= $count[0]['count'];?></span></a>

                                    <ul class="dropdown-menu two">
                                        <li>
                                            <div class="notification_header">
                                                <h3>You have <?= $count[0]['count'];?>  new notification</h3>
                                            </div>
                                        </li>
                                        <?php
                                       $i=0;
                                       foreach ($this->session->userdata('notifications') as $note) {
                                            if($i<30)
                                            {
                                                ?>
                                                <li><a href="#"> 
                                           <div class="notification_desc">
                                            <p>congrats <?= $note['f_name']." ".$note['l_name']; ?> for closing the deal at <?=$note['project_name'];?></p>
                                            <p><span><?= $note['date'] ?></span></p>
                                            </div>
                                          <div class="clearfix"></div>  
                                         </a></li>
                                                <?php
                                               
                                            }
                                           
                                            else if($i==3)
                                            {
                                                ?>
                                                <li>
                                            <div class="notification_bottom">
                                                <a href="#">See all notification</a>
                                            </div> 
                                        </li>
                                        <?php
                                            }
                                            $i++;
                                       }
                                        ?>
                                        
                                        
                                         
                                    </ul>
                            </li>   
                       <!-- <li class="dropdown note">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tasks"></i> <span class="badge blue1">9</span></a>
                                        <ul class="dropdown-menu two">
                                        <li>
                                            <div class="notification_header">
                                                <h3>You have 9 pending task</h3>
                                            </div>
                                        </li>
                                        <li><a href="#">
                                                <div class="task-info">
                                                <span class="task-desc">Database update</span><span class="percentage">40%</span>
                                                <div class="clearfix"></div>    
                                               </div>
                                                <div class="progress progress-striped active">
                                                 <div class="bar yellow" style="width:40%;"></div>
                                            </div>
                                        </a></li>
                                        <li><a href="#">
                                            <div class="task-info">
                                                <span class="task-desc">Dashboard done</span><span class="percentage">90%</span>
                                               <div class="clearfix"></div> 
                                            </div>
                                           
                                            <div class="progress progress-striped active">
                                                 <div class="bar green" style="width:90%;"></div>
                                            </div>
                                        </a></li>
                                        <li><a href="#">
                                            <div class="task-info">
                                                <span class="task-desc">Mobile App</span><span class="percentage">33%</span>
                                                <div class="clearfix"></div>    
                                            </div>
                                           <div class="progress progress-striped active">
                                                 <div class="bar red" style="width: 33%;"></div>
                                            </div>
                                        </a></li>
                                        <li><a href="#">
                                            <div class="task-info">
                                                <span class="task-desc">Issues fixed</span><span class="percentage">80%</span>
                                               <div class="clearfix"></div> 
                                            </div>
                                            <div class="progress progress-striped active">
                                                 <div class="bar  blue" style="width: 80%;"></div>
                                            </div>
                                        </a></li>
                                        <li>
                                            <div class="notification_bottom">
                                                <a href="#">See all pending task</a>
                                            </div> 
                                        </li>
                                    </ul>
                            </li>  -->                                         
                            <div class="clearfix"></div>    
                                </ul>