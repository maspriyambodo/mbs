<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link rel="icon" href="<?= base_url('assets/images/Logo/PT.Marsit.jpg'); ?>" type="image/ico" />
        <title class="text-uppercase"><?= $title ?></title>
        <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('node_modules/nprogress/nprogress.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('assets/css/datatables.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('assets/css/bootstrap-datepicker.min.css'); ?>" rel="stylesheet" />
        <link href="<?= base_url('assets/css/animate.css'); ?>" type="text/css" rel="stylesheet"/>
        <link href="<?= base_url('assets/css/custom.min.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('assets/css/dropzone.min.css'); ?>" rel=stylesheet type="text/css" />
        <link href="<?= base_url('node_modules/chart.js/dist/Chart.min.css'); ?>" rel=stylesheet type="text/css" />
    </head>
    <body class="nav nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="clearfix"></div>
                        <div class="profile clearfix">
                            <div class="profile_pic"> <img src="<?= base_url($pict); ?>" class="img-circle profile_img img-rounded"> </div>
                            <div class="profile_info">
                                <span>Welcome,</span>
                                <h2 class="text-uppercase"><?= $uname; ?></h2>
                                <a href="<?= base_url('Logout/index/'); ?>">log out</a>
                            </div>
                        </div>
                        <br/>
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <?php
                            if ($hak_akses == 1) {//SUPER USER
                                echo '<div class="menu_section">'
                                . '<h3>Super User</h3>'
                                . '<ul class="nav side-menu">'
                                . '<li><a class="text-uppercase" href=' . base_url('Administrator/Dashboard/index') . '><i class="fa fa-dashboard"></i> Dashboard</a></li>'
                                . '<li><a><i class="glyphicon glyphicon-hdd"></i> Master <span class="fa fa-chevron-down"></span></a>'
                                . '<ul class="nav child_menu">'
                                . '<li><a href=' . base_url('Administrator/Kodepos') . ' class="text-uppercase">Kode Pos</a></li>'
                                . '<li><a href=' . base_url('Administrator/Pensiunan') . ' class="text-uppercase">Pensiunan</a></li>'
                                . '<li><a href=' . base_url('Administrator/KodeInteraksi') . ' class="text-uppercase">Kode Interaksi</a></li>'
                                . '<li><a href=' . base_url('Administrator/Usermanagement') . ' class="text-uppercase">User Management</a></li>'
                                . '</ul></li>'
                                . '<li><a class="text-uppercase" href=' . base_url('Administrator/Sales') . '><i class="glyphicon glyphicon-user"></i> Sales</a></li>'
                                . '<li><a class="text-uppercase" href=' . base_url('Administrator/Salesarea') . '><i class="glyphicon glyphicon-globe"></i> Sales Area</a></li>'
                                . '<li><a><i class="fa fa-bar-chart-o"></i> Report <span class="fa fa-chevron-down"></span></a>'
                                . '<ul class="nav child_menu">'
                                . '<li><a href=' . base_url('Administrator/Lap_bulanan') . ' class="text-uppercase">Laporan Bulanan</a></li>'
                                . '<li><a href=' . base_url('Administrator/Lap_rencanaharian') . ' class="text-uppercase">Laporan Rencana Harian</a></li>'
                                . '<li><a href=' . base_url('Administrator/Lap_interaksi') . ' class="text-uppercase">Laporan Interaksi Marketing</a></li>'
                                . '<li><a href=' . base_url('Administrator/Salary/index') . ' class="text-uppercase">Salary</a></li>'
                                . '</ul></li>'
                                . '</ul></div>';
                            } elseif ($hak_akses == 2) {//H R I S
                                echo '';
                            } elseif ($hak_akses == 3) {//ADMINISTRATOR
                                echo '';
                            } elseif ($hak_akses == 10) {//SALES MARKETING OFFICER
                                echo '<div class="menu_section">'
                                . '<h3>Sales Officer</h3>'
                                . '<ul class="nav side-menu">'
                                . '<li><a class="text-uppercase" href=' . base_url('Sales/Dashboard/index') . '><i class="fa fa-dashboard"></i> Dashboard</a></li>'
                                . '<li><a class="text-uppercase"><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>'
                                . '<ul class="nav child_menu">'
                                . '<li><a href=' . base_url('Sales/Caridata/index') . ' class="text-uppercase">Cari data</a></li>
                                <li><a href=' . base_url('Sales/Daftarkunjungan/index') . ' class="text-uppercase">Daftar Kunjungan</a></li>
                                <li><a href="#" class="text-uppercase">Interaksi non database</a></li>'
                                . '</ul></li>'
                                . '<li><a class="text-uppercase"><i class="fa fa-shopping-cart"></i> Penjualan <span class="fa fa-chevron-down"></span></a>'
                                . '<ul class="nav child_menu">'
                                . '<li><a href=' . base_url('Sales/Pencairan/index') . ' class="text-uppercase">Pencairan</a></li>
                                            <li><a href=' . base_url('Sales/Simulasi/Simulasi2') . ' class="text-uppercase"> simulasi </a></li>'
                                . '</ul></li>'
                                . '<li><a class="text-uppercase"><i class="fa fa-briefcase text-uppercase"></i> laporan <span class="fa fa-chevron-down"></span></a>'
                                . '<ul class="nav child_menu">'
                                . '<li><a href=' . base_url('Sales/Hotprospek') . ' class="text-uppercase">HOT prospek</a></li>'
                                . '<li><a href=' . base_url('Sales/Pencairan/Hasil') . ' class="text-uppercase">hasil Pencairan</a></li>'
                                . '<li><a href=' . base_url('Sales/Interaksi/Hasil') . ' class="text-uppercase">Hasil Interaksi</a></li>'
                                . '<li><a href=' . base_url('Sales/Simulasi/Hasil') . ' class="text-uppercase">Hasil Simulasi</a></li>'
                                . '</ul></li>'
                                . '</ul></div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav>
                            <div class="nav toggle"> <a id="menu_toggle"><i class="fa fa-bars"></i></a> </div>
                        </nav>
                    </div>
                </div>
                <div class="right_col hidden" role="main" style="min-height:0px ! important;">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2 class="text-uppercase"><?= $formtitle; ?></h2>
                            <div class="clearfix" style="clear:both;margin:0px;"></div>
                        </div>
                        <div class="x_content clearfix" style="clear:both;margin:0px;display:block;">
                            <?= $content ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <footer>
        <div class="pull-right"> Copyrights © 2018-<?= date("Y") ?> All Rights Reserved by <a href="https://marsitbangunsejahtera.com" target="_new">PT Marsit Bangun Sejahtera</a> </div>
        <div class="clearfix"></div>
    </footer>
    <div class="back-to-top" data-placement="top" data-toggle="tooltip" id="back-top" title="" data-original-title="Back to Top"><i class="fa fa-chevron-up"></i></div>
    <script src="<?= base_url('assets/js/jquery.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/fastclick.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('node_modules/nprogress/nprogress.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('node_modules/chart.js/dist/Chart.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/date.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/moment.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/custom.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/dropzone.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/jquery.inputmask.bundle.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/bootstrap-datepicker.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/signature_pad.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/jquery.number.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/html2canvas.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/datatables.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/pdfmake.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/vfs_fonts.js'); ?>" type="text/javascript"></script>
    <?php
    if ($formtitle == 'Form interaksi sales') {
        $this->load->view('V_Footerinteraksi');
    }
    ?>
</body>
</html>