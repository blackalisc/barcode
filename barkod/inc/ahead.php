<!DOCTYPE html>
<?php
require "../r.php";

$query = mysql_query("SELECT * FROM ba_dukkan WHERE mail='$_SESSION[user]'");
$row = mysql_fetch_array($query);

$dukkan = $row["DukkanId"];
$koyu = "#F02E24";
$acik = "#E34941";
$url =  "http://{$_SERVER['HTTP_HOST']}";

$escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );
?>
<html>
<head>
    <meta name="theme-color" content="#F02E24">
    <meta name="msapplication-navbutton-color" content="#F02E24">
    <meta name="apple-mobile-web-app-status-bar-style" content="#F02E24">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Barcodex</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo $escaped_url;?>/inc/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $escaped_url;?>/inc/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo $escaped_url;?>/inc/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->



    <link rel="stylesheet" href="<?php echo $escaped_url;?>/inc/dist/css/AdminLTE.min.css">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">-->



    <link rel="stylesheet" href="<?php echo $escaped_url;?>/inc/dist/css/skins/skin-blue.min.css">

    <!--<script src="/admin/jquery-1.3.2.min.js"></script>-->
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <!--<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>-->
    <script src="<?php echo $escaped_url;?>/inc/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo $escaped_url;?>/inc/dist/js/adminlte.min.js"></script>
    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>-->
    <!--<script type="text/javascript" src="panel/jquery-ui-1.8.2.custom.min.js"></script>-->

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php

    $b = $_SESSION["user"];
    $a = mysql_query("SELECT * FROM ba_dukkan where mail='$b'");
    $row = mysql_fetch_array($a);
?>
    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a style="background-color:<?php echo $koyu;?>" href="<?php echo __DIR__.'/uygulama/anasayfa'; ?>" class="logo">

            <span style="background-color: <?php echo $koyu;?>" class="logo-mini"><!--<img src="../images/logo.png" width="50px" height="50px">--></span>
            <span style="background-color: <?php echo $koyu;?>;color:white" class="logo-lg"><b>Anasayfa</b></span>
        </a>
        <nav style="background-color:<?php echo $acik;?>;" class="navbar navbar-static-top" role="navigation">
            <a href="#" class="sidebar-toggle" style="background-color:<?php echo $acik;?>" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>


            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <?php /* ?>
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <?php

                                    ?>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-user text-red"></i> You changed your username
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li><?php  */ ?>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                           <span><?php echo $row["DukkanAdi"];?></span>
                        </a>
                        <ul style="background-color: <?php echo $acik;?>;" class="dropdown-menu">





                            <div class="pull-right">
                                <div class="pull-right"><form name="cikis" action="" method="post">
                                        <p style="float:left;padding: 5px;margin-top: 2px;color:white">Gidiyor musun? Sağlıcakla kal...</p>
                                        <input type="submit" style="border:1px solid #00a65a;margin:3px" class="btn btn-default btn-flat" value="Çıkış Yap" name="cikis">
                                        <input type="hidden" name="cikiss" value="15"></form>


                                </div>
                            </div>

                        </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <ul class="sidebar-menu" data-widget="tree">
                <li style="margin-top: 15px" class="header">Araçlar</li>
                <li><a href="/uygulama/SatisYap"><i class="fa fa-shopping-cart"></i> <span>Satış Yap</span></a></li>
                <li><a href="/uygulama/UrunEkle"><i class="fa fa-plus"></i> <span>Ürün Ekle</span></a></li>
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header)
        <section class="content-header">
          <h1>
            Page Header
            <small>Optional description</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
          </ol>
        </section> -->

        <!-- Main content -->
        <section class="content container-fluid">
     