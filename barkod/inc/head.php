  <!DOCTYPE html> <html>
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lodosnet &mdash; Ege Bolgesinin Kurumsal Internet Erisim Lideri</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="http://online.lodosnet.com.tr/inc/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://online.lodosnet.com.tr/inc/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="http://online.lodosnet.com.tr/inc/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="http://online.lodosnet.com.tr/inc/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="http://online.lodosnet.com.tr/inc/dist/css/skins/skin-blue.min.css">
  <script src="/inc/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="/inc/dist/js/adminlte.min.js"></script>
  <script src="/inc/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header style="background-color: #F02E24" class="main-header" class="main-header">
    <a style="background-color: #F02E24" href="../t.php" class="logo">
        <?php 
        session_start();
        $_SESSION["t"] = $username;
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
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span><?php echo $name." ".$surname; ?></span>
            </a>
            <ul style="background-color: #E34941;" class="dropdown-menu">
              <li style="background: #E34941;" class="user-header">
 <img src="../images/logokisi.png" class="img-circle" style="border:none" alt="Lodosnet Kullanıcı">

                <p>
                 <?php  
                  
                    $tarih = $sorgula["createdon"];

                  ?>
                  <?php echo $name." ".$surname; ?>
                  <small><?php echo $tarih." tarihinden bu yana sizinle çalışmaktan mutluluk duyuyoruz."; ?></small>
                
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-right">
                 <div class="pull-right"><form name="cikis" action="" method="post">
                 <input type="submit" style="border:1px solid #E34941" class="btn btn-default btn-flat" value="Çıkış Yap" name="cikis"> 
                 <input type="hidden" name="cikiss" value="15"></form>
                 <?php
                  if($_POST["cikiss"]!=0)
                  {
                    session_start();
                    unset($_SESSION["sahis"]);
                    unset($_SESSION["t"]);
                    if ($_SESSION["sahis"]==0)
                      {echo '<script type="text/javascript">
                                  window.location = "http://online.lodosnet.com.tr"
                                  </script>';}
                  }
               ?>
             </div>
                </div>
              </li>
            </ul>
      </div>
    </nav>
  </header>
    <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
     <img src="../images/logokisi.png" class="img-circle" alt="kullanıcı resmi">
        </div>
        <div class="pull-left info">
          <p><?php echo $username; ?></p>
          <?php
            session_start();
            include("../r.php");
            $sor = mysql_query("select * from rm_users where username='$username'");
            $bol = mysql_fetch_array($sor);
            $paketTrihh = $bol["expiration"];
            $simdikiZaman = date("Y-m-d");

            if ($paketTrihh>$simdikiZaman) {
            echo '<a href="#"><i class="fa fa-circle text-success" style="color:green"></i>Aktifsiz</a>';
            }
            else
            {
            echo '<a href="#"><i class="fa fa-circle text-unsuccess" style="color:yellow"></i> Aktif Değilsiniz</a>';
            }
          ?>
        </div>
      </div>
     <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Kullanıcı Yönetim Paneli</li>
        <li>
          <a href="fatura.php">
            <i class="fa fa-credit-card"></i> <span>Faturaları Görüntüle</span>
            
          </a>
        </li>
        <li>
          <a href="al.php">
            <i class="fa fa-try"></i> <span>Sürenizi Şimdi Uzatın</span>
            
          </a>
        </li>
        <li>
          <a href="hiztesti.php">
            <i class="fa fa-tachometer"></i> <span>Hızınızı Test Edin</span>
            
          </a>
        </li>
    </section>
  </aside>
  <div class="content-wrapper">
    <section class="content-header">
    </section>
    <section class="content container-fluid">