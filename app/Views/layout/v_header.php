<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>Arsip</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>e</b>-Arsip</span>
            </a>





            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>


                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= base_url('foto/' . session()->get('foto')) ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?= session()->get('nama_user') ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?= base_url('foto/' . session()->get('foto')) ?>" class="img-circle" alt="User Image">
                                    <p>
                                        <?= session()->get('nama_user') ?>
                                    </p>
                                    <i class="fa fa-circle text-danger"></i> <?php if (session()->get('level') == 1) {
                                                                                echo 'Super Admin';
                                                                            } else if (session()->get('level') == 2) {
                                                                                echo 'Admin';
                                                                            } else {
                                                                                echo 'User';
                                                                            } ?>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="<?= base_url('auth/logout') ?>" class="btn btn-danger btn-flat">Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                    </ul>
                </div>


                <div class="navbar-custom-menu">
                    </li>
                    </ul>
                    </li>
                    </ul>
                </div>
            </nav>
        </header>