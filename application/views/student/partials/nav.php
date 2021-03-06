</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href=<?php echo base_url('profile') ?>>
                            <b class="logo-icon">
                                <!-- Dark Logo icon -->
                                <img src="<?php echo base_url(); ?>assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="<?php echo base_url(); ?>assets/images/logo-icon.png" alt="homepage" class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                <img src="<?php echo base_url(); ?>assets/images/logo-text.png" alt="homepage" class="dark-logo" style="padding-top:10px;" />
                                <!-- Light Logo text -->
                                <img src="<?php echo base_url(); ?>assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                            </span>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                        <!-- Date and Time with Greeting -->

                        <div class="nav-item">
                            <h1 style="font-size:140%;">
                                <?php
                                date_default_timezone_set('Asia/Colombo');
                                $mydate = getdate(date("U"));
                                if (date("H") < 12) {
                                    echo "Good Morning";
                                } elseif (date("H") > 11 && date("H") < 18) {
                                    echo "Good Afternoon";
                                } elseif (date("H") > 17) {
                                    echo "Good Evening";
                                }
                                $out = " / "  . $mydate["year"] . " " . $mydate["month"] . " " . $mydate["mday"] . " - " . $mydate["weekday"];
                                echo ($out);
                                ?>
                            </h1>
                        </div>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- User profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="<?php echo base_url() . $this->session->image; ?>" id='imgId' alt="user" class="rounded-circle" width="40" />
                                <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span>
                                    <span class="text-dark"><?php echo $this->session->userdata('fname') ?></span>
                                    <i data-feather="chevron-down" class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href=<?php echo base_url('profile') ?>><i data-feather="user" class="svg-icon mr-2 ml-1"></i> My
                                    Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href=<?php echo base_url('edit') ?>><i data-feather="settings" class="svg-icon mr-2 ml-1"></i>
                                    Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <div class="pl-4 p-3">
                                    <a href="<?php echo base_url('logout'); ?>" class="btn btn-rounded btn-info"><i class="fa fa-sign-out">&nbsp;</i>Logout</a>
                                </div>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="list-divider"></li>
                        <li class="nav-small-cap">
                            <span class="hide-menu">General</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href=<?php echo base_url('profile') ?> aria-expanded="false">
                                <i class="fa fa-id-card-alt"></i>
                                <span class="hide-menu">My Profile</span>
                            </a>
                        </li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap">
                            <span class="hide-menu">Marks</span>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href=<?php echo base_url('marks') ?> aria-expanded="false">
                                <i class="fa fa-chart-line"></i>
                                <span class="hide-menu">My Marks & Progress</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href=<?php echo base_url('latest') ?> aria-expanded="false">
                                <i class="fa fa-tags"></i>
                                <span class="hide-menu">Latest Marks (All)</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href=<?php echo base_url('search') ?> aria-expanded="false">
                                <i class="fa fa-search"></i>
                                <span class="hide-menu">Search Paper</span>
                            </a>
                        </li>

                        <li class="list-divider"></li>
                        <li class="nav-small-cap">
                            <span class="hide-menu">Extra</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href=<?php echo base_url('edit') ?> aria-expanded="false">
                                <i class="fa fa-cog"></i><span class="hide-menu">Account Settings</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href=<?php echo base_url('help') ?> aria-expanded="false">
                                <i class="fas fa-hands-helping" style="color: red;"></i><span class="hide-menu">Help</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="<?php echo base_url('logout'); ?>" aria-expanded="false">
                                <i class="fa fa-sign-out"></i><span class="hide-menu">Logout</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>