<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="assets/uploads/profile_photos/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo strtoupper($current_user);?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">
                <a href="index.php?page=dashboard">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <!-- <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span> -->
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-circle"></i>
                    <span>Training of Trainers</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="index.php?page=training_trainers"><i class="fa fa-circle-o"></i>Training of Trainers</a></li>
                    <li><a href="index.php?page=training_trainers_days"><i class="fa fa-circle-o"></i>Field Day</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-circle"></i>
                    <span>Training of Lead Farmers</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="index.php?page=training_lead_farmer"><i class="fa fa-circle-o"></i>Training of Lead Farmers</a></li>
                    <li><a href="index.php?page=training_lead_farmer"><i class="fa fa-circle-o"></i>Field Day</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-circle"></i>
                    <span>Training of Farmers</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="index.php?page=training_farmer"><i class="fa fa-circle-o"></i>Training of Farmers</a></li>
                    <li><a href="index.php?page=training_farmer_days"><i class="fa fa-circle-o"></i>Field Day</a></li>
                </ul>
            </li>
            <!--<li class="treeview">
              <a href="#">
                <i class="fa fa-circle"></i>
                <span>Training of Field Officers</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i>Training of Field Officers</a></li>
                <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i>Field Day</a></li>
              </ul>
            </li>-->
            <li class="">
                <a href="index.php?page=video_screening">
                    <i class="fa fa-circle"></i>
                    <span>Video Screening</span>
                </a>
            </li>
            <li class="treeview" id="admin_menu_item">
                <a href="#">
                    <i class="fa fa-circle"></i>
                    <span>Reports</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#"><i class="fa fa-circle"></i>Trainings Completed
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                          <!--<li><a href="index.php?page=trainings_complete_training_trainers"><i class="fa fa-circle-o"></i>Training of Trainers</a></li>-->
                            <li><a href="index.php?page=trainings_complete_training_lead_farmers"><i class="fa fa-circle-o"></i>Training of Lead Farmers</a></li>
                            <li><a href="index.php?page=trainings_complete_training_farmers"><i class="fa fa-circle-o"></i>Training of Farmers</a></li>
                            <li><a href="index.php?page=trainings_complete_video_screening"><i class="fa fa-circle-o"></i>Video Screening</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-circle"></i>Payments List 
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                          <!-- <li><a href="index.php?page=payment_list_training_trainers"><i class="fa fa-circle-o"></i>Training of Trainers</a></li> -->
                            <li><a href="index.php?page=payment_list_training_lead_farmers"><i class="fa fa-circle-o"></i>Training of Lead Farmers</a></li>
                            <li><a href="index.php?page=payment_list_training_farmers"><i class="fa fa-circle-o"></i>Training of Farmers</a></li>
                            <li><a href="index.php?page=payment_list_video_screening"><i class="fa fa-circle-o"></i>Video Screening</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-circle"></i>Trainings Paid
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                          <!-- <li><a href="index.php?page=trainings_paid_training_trainers"><i class="fa fa-circle-o"></i>Training of Trainers</a></li> -->
                            <li><a href="index.php?page=trainings_paid_training_lead_farmers"><i class="fa fa-circle-o"></i>Training of Lead Farmers</a></li>
                            <li><a href="index.php?page=trainings_paid_training_farmers"><i class="fa fa-circle-o"></i>Training of Farmers</a></li>
                            <li><a href="index.php?page=trainings_paid_video_screening"><i class="fa fa-circle-o"></i>Video Screening</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li id="admin_menu_item">
                <a href="index.php?page=area_coordinator">
                    <i class="fa fa-circle"></i>
                    <span>Area Coordinators</span>
                </a>
            </li>
            <li id="admin_menu_item">
                <a href="index.php?page=field_officer">
                    <i class="fa fa-circle"></i>
                    <span>Field Officers</span>
                </a>
            </li>
            <li id="admin_menu_item">
                <a href="index.php?page=lead_farmer">
                    <i class="fa fa-circle"></i>
                    <span>Lead Farmers</span>
                </a>
            </li>
            <li id="admin_menu_item">
                <a href="#">
                    <i class="fa fa-circle"></i>
                    <span>Organic Farmers</span>
                </a>
            </li>
            <li id="admin_menu_item">
                <a href="index.php?page=training_modules">
                    <i class="fa fa-circle"></i>
                    <span>Modules</span>
                </a>
            </li>
            <li id="admin_menu_item">
                <a href="index.php?page=training_venue">
                    <i class="fa fa-circle"></i>
                    <span>Venue</span>
                </a>
            </li>
            <li id="admin_menu_item">
                <a href="index.php?page=production_area">
                    <i class="fa fa-circle"></i>
                    <span>Production Area</span>
                </a>
            </li>
            <li class="treeview" id="admin_menu_item">
                <a href="#">
                    <i class="fa fa-cog"></i>
                    <span>Settings</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="index.php?page=system_users"><i class="fa fa-circle-o"></i>System Users</a>
                    </li>
                    <li>
                        <a href="index.php?page=projects"><i class="fa fa-circle-o"></i>Projects</a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>