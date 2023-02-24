<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url('foto/' . session()->get('foto')) ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>
                    <?= session()->get('nama_user') ?>
                </p>
                <a href=""><i class="fa fa-circle text-success"></i><?php if (session()->get('level') == 1) {
                                                                        echo 'Super Admin';
                                                                    } else if (session()->get('level') == 2) {
                                                                        echo 'Admin';
                                                                    } else {
                                                                        echo 'User';
                                                                    } ?>
                </a>
            </div>
        </div>




        <!-- SIDEBAR MENU -->
        <ul class="sidebar-menu" data-widget="tree">

            <!-- -------------------------MENU LEVEL 1 ----------------------------------------------------------------------------------->
            <li class="header">Main Menu</li>

            <?php if (session()->get('level') == 1) { ?>
                <li class="treeview">
                    <a href="<?= base_url('menu/menu_kaprodi') ?> ">
                        <i class="fa fa-cogs text-red"></i> <span>Setting</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?= base_url('user') ?>"><i class="fa fa-users text-red"></i> User</a></li>
                        <li><a href="<?= base_url('kategori') ?>"><i class="fa fa-tags text-red"></i> Kategori</a></li>
                        <li><a href="<?= base_url('dep') ?>"><i class="fa fa-mortar-board text-red"></i> Instansi</a></li>
                    </ul>
                </li>

                <li>
                    <a href="<?= base_url('home') ?>">
                        <i class="fa fa-dashboard text-blue"></i> <span>Dashboard</span>
                        <span class="pull-right-container">
                            <small class="label pull-right bg-green">Home</small>
                        </span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="<?= base_url('menu/menu_kaprodi') ?> ">
                        <i class="fa fa-send text-blue"></i> <span>Surat</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?= base_url('file/kategori/' . 'Surat Masuk') ?>"><i class="fa fa-download text-green"></i> Surat Masuk</a></li>
                        <li><a href="<?= base_url('file/kategori/' . 'Surat Keluar') ?>"><i class="fa fa-upload text-red"></i> Surat Keluar</a></li>
                    </ul>
                </li>

                <li>
                    <a href="<?= base_url('file') ?>">
                        <i class="fa fa-file-text text-blue"></i> <span>Dokumen</span>
                        <span class="pull-right-container">
                            <small class="label pull-right bg-red">All</small>
                        </span>
                    </a>
                </li>

            <?php } ?>



            <!-- -------------------------MENU LEVEL 2 (STAFFF) ------------------------------------------------>
            <?php if (session()->get('level') == 2) { ?>

                <li class="treeview">
                    <a href="<?= base_url('menu/menu_kaprodi') ?> ">
                        <i class="fa fa-cogs text-red"></i> <span>Setting</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?= base_url('kategori') ?>"><i class="fa fa-tags text-red"></i> Jenis Surat</a></li>
                        <li><a href="<?= base_url('dep') ?>"><i class="fa fa-mortar-board text-red"></i> Instansi</a></li>
                    </ul>
                </li>

                <li>
                    <a href="<?= base_url('home') ?>">
                        <i class="fa fa-dashboard text-blue"></i> <span>Dashboard</span>
                        <span class="pull-right-container">
                            <small class="label pull-right bg-green">Home</small>
                        </span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="<?= base_url('menu/menu_kaprodi') ?> ">
                        <i class="fa fa-send text-blue"></i> <span>Surat</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?= base_url('file/kategori/' . 'Surat Keluar') ?>"><i class="fa fa-upload text-yellow"></i> Surat Keluar</a></li>
                        <li><a href="<?= base_url('file/kategori/' . 'Surat Masuk') ?>"><i class="fa fa-download text-yellow"></i> Surat Masuk</a></li>
                    </ul>
                </li>

                <li>
                    <a href="<?= base_url('file') ?>">
                        <i class="fa fa-file-text text-blue"></i> <span>Dokumen</span>
                        <span class="pull-right-container">
                            <small class="label pull-right bg-red">All</small>
                        </span>
                    </a>
                </li>
            <?php } ?>






            <!-- ------------------------- MENU LEVEL 3 (Dosen) ------------------------------------------------>
            <?php if (session()->get('level') == 3) { ?>

                <li>
                    <a href="<?= base_url('home') ?>">
                        <i class="fa fa-dashboard text-blue"></i> <span>Dashboard</span>
                        <span class="pull-right-container">
                            <small class="label pull-right bg-green">Home</small>
                        </span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="<?= base_url('menu/menu_kaprodi') ?> ">
                        <i class="fa fa-send text-blue"></i> <span>Surat</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?= base_url('file/kategori/' . 'Surat Keluar') ?>"><i class="fa fa-upload text-yellow"></i> Surat Keluar</a></li>
                        <li><a href="<?= base_url('file/kategori/' . 'Surat Masuk') ?>"><i class="fa fa-download text-yellow"></i> Surat Masuk</a></li>
                    </ul>
                </li>

                <li>
                    <a href="<?= base_url('file') ?>">
                        <i class="fa fa-file-text text-blue"></i> <span>Dokumen</span>
                        <span class="pull-right-container">
                            <small class="label pull-right bg-red">All</small>
                        </span>
                    </a>
                </li>
            <?php } ?>







            <li><a href="<?= base_url('Cari') ?>">
            <i class="fa fa-search text-blue"></i> <span>Pencarian</span></a></li>
        </ul>
    </section>
</aside>


<div class="content-wrapper">
    <section class="content-header">
        <h1>
            e-Arsip
            <small>D4 Teknik Informatika</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>e-Arsip</a></li>
        </ol>
    </section>
    <section class="content">