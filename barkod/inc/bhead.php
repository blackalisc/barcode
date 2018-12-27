<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <script src="../admin/jquery-1.3.2.min.js"></script>
  <script>$(document).ready(function() {$("#destek").load("/admin/d.php");var refreshId = setInterval(function() {$("#destek").load('/admin/d.php?randval='+ Math.random());}, 1000);$("#sahis").load("/admin/e.php");var refreshId1 = setInterval(function() {$("#sahis").load('/admin/e.php?randval='+ Math.random()); }, 1000); $("#satis").load("/admin/s.php"); var refreshId2 = setInterval(function() {$("#satis").load('/admin/s.php?randval='+ Math.random()); }, 1000); $("#muhasebe").load("/admin/m.php"); var refreshId3 = setInterval(function() {$("#muhasebe").load('/admin/m.php?randval='+ Math.random()); }, 1000); $("#toplam").load("/admin/toplam.php"); var refreshId4 = setInterval(function() {$("#toplam").load('/admin/toplam.php?randval='+ Math.random()); }, 1000); }); </script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lodosnet &mdash; Ege Bolgesinin Kurumsal Internet Erisim Lideri</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="/inc/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/inc/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/inc/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/inc/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="/inc/dist/css/skins/skin-blue.min.css">

<!--<script src="/admin/jquery-1.3.2.min.js"></script>-->
 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
<!--<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>-->
<script src="/inc/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/inc/dist/js/adminlte.min.js"></script>
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>-->
<!--<script type="text/javascript" src="panel/jquery-ui-1.8.2.custom.min.js"></script>-->

  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a style="background-color: #F02E24" href="#" class="logo">
        <?php 
        session_start();
        $_SESSION["t"] = $username;
      ?><?php 
          include("../r.php");
          $adm = $_SESSION["entryBayi"];
          $baki = mysql_query("select * from rm_managers where managername = '$adm'");
          $bakce = mysql_fetch_array($baki);
          ?>
       <span style="background-color: #F02E24" class="logo-mini"><img src="../images/logo.png" width="50px" height="50px"></span>
      <span style="background-color: #F02E24;color:white" class="logo-lg"><b>Anasayfa</b></span>
    </a>
    <nav style="background-color: #E34941;" class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" style="background-color:#E34941" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      
  
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          </li>
          <?php
            $z50 = mysql_query("SELECT * FROM lo_Bayi_Balance WHERE BayiName='$adm'");
            $z80 = mysql_fetch_array($z50);
          

          $z10 = mysql_query("SELECT * FROM lo_Bayi_Hesap where manager='$adm'");
          $z30 = mysql_fetch_array($z10);
         ?>
            
          
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <?php  if($z30["Kredili"]!=0){  $kred = $z30["Kredili"]; $bala = $z80["balance"]; $sonux = $kred-$bala; 

                list($sonu,$sa) = split("[-]", $sonux);

                echo "<b>Limit : ".$sa." ₺     |</b>"; } ?><b> Mevcut bakiyeniz : <?php echo $z80["balance"]; ?></b> ₺     |
              <span><?php echo $_SESSION["entryBayi"]; ?></span>
            </a>
            <ul style="background-color: #E34941;" class="dropdown-menu">
             
 

                
                
                <div class="pull-right">
                 <div class="pull-right"><form name="cikis" action="" method="post">
                  <p style="float:left;padding: 5px;margin-top: 2px;color:white">Gidiyor musun? Sağlıcakla kal...</p>
                 <input type="submit" style="border:1px solid #E34941" class="btn btn-default btn-flat" value="Çıkış Yap" name="cikis"> 
                 <input type="hidden" name="cikiss" value="15"></form>
                 <?php
                  if($_POST["cikiss"]!=0)
                  {
                    session_start();
                    unset($_SESSION["entryBayi"]);
                    unset($_SESSION["u"]);
                    if ($_SESSION["entryBayi"]==0)
                      {echo '<script type="text/javascript">
                                  window.location = "/admin/log-in.php"
                                  </script>';}
                  }
               ?>
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
      <div class="user-panel">
        <div class="pull-left image">
      <?php echo "."; ?>
        </div>
        <div class="pull-left info">
          <p>Hoşgeldin <?php echo $_SESSION["entryBayi"]; ?></p>
        </div><?php 
        	$rapela = $bakce["perm_accessap"];

        $ra = mysql_fetch_array(mysql_query("SELECT * FROM lo_Bayi_Yetki WHERE BayiName='$adm'"));

        	$oera = $ra["musteri_olustur"]; 
          
          if($oera==1)
            $musteri = '<li><a href="YeniMusteri.php"><i class="fa fa-plus"></i> Yeni Müşteri Oluştur</a></li>';
        
          if($rapela == 1){
            $faturaSec = '<li><a href="/lodosnetBayi/fatura-sec.php"><i class="fa fa-file"></i> <span>Ödeme Sorgula</span></a></li>';
            $tckontrol = '<li><a href="/lodosnetBayi/TcKontrol.php">T.C. Kontrol</a></li>';
            $eksik = '<li><a href="EksikBilgi.php"><i class="fa fa-book"></i> Bilgileri Eksik Olanlar</a></li>';
          	$odemeProfil = '<li><a href="/lodosnetBayi/OdemeProfil.php"><i class="fa fa-users"></i> <span>Ödeme Noktaları</span></a></li>';
          	$gelenkutusu = '<li><a href="/lodosnetBayi/mesaj/OdemeProfil.php"><i class="fa fa-users"></i> <span>Ödeme Noktaları</span></a></li>';
           	$ozet = '<li><a href="/lodosnetBayi/Ozet.php"><i class="fa fa-address-card"></i> <span>Özet</span></a></li>';
           	$listt = ' 	<li><a href="/lodosnetBayi/list.php?i='.$_SESSION['entryBayi'].'"><i class="fa fa-user"></i> <span>Aylık Raporlar</span></a></li>';
        }
        else{
         	$detay = '<li><a href="odemeDetay.php"><i class="fa fa-money"></i> <span>Ödeme Detayları</span></a></li>';
        	$listt = ' 	<li><a href="/lodosnetBayi/OdemeListe.php?i='.$_SESSION['entryBayi'].'"><i class="fa fa-user"></i> <span>Aylık Raporlar</span></a></li>';
        } 
         ?>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li><a href="/lodosnetBayi/arama.php"><i class="fa fa-search"></i> <span>Kullanıcı Ara</span></a></li>
		  <?php echo $tckontrol;?>
          <li><a href="/lodosnetBayi/profil.php"><i class="fa fa-user"></i> <span>Profil</span></a></li>
      	<?php echo $odemeProfil;?>

      	<?php echo $musteri; ?>
        <?php echo $faturaSec;?>
     	<?php echo $listt; ?>
      	<li><a href="OdemeGecmisi.php"><i class="fa fa-try"></i> Ödeme Geçmişi</a></li>
        <?php echo $eksik;?>
      	<li><a href="feedback.php"> <i class="fa fa-code"></i> <span>Geri Bildirim</span></a></li>
      	<?php echo $detay; ?>
      	
     	<li><?php echo $ozet; ?></li>
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
