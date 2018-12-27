<?php
session_start();
if(isset($_SESSION["user"])){
    header("Location: /uygulama/anasayfa");
    exit;
}
require 'r.php';
if (isset($_POST["mail"])) {
    $m = mysql_real_escape_string($_POST["mail"]);
    $s = mysql_real_escape_string($_POST["sifre"]);
    $s = sha1(md5($s));
    $query = mysql_query("SELECT * FROM ba_dukkan WHERE mail='$m' and sifre='$s' and Aktif='1'");
    if (mysql_num_rows($query) > 0) {
        $_SESSION["user"] = $m;
        echo 1;
    } else
        echo 0;
    return false;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="inc/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="inc/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="inc/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="inc/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="inc/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="inc/index2.html"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg" id="sonuc"></p>

        <form action="inc/index2.html" method="post">
            <div class="form-group has-feedback">
                <input type="email" onkeypress="validate()" class="form-control" id="mail" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" onkeypress="validate()" class="form-control" id="sifre" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <a href="giris/sifresifirlama">Şifre Yenileme</a><br>
                    <a href="kayit" class="text-center">Yeni Kayıt</a>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="button" onclick="giris()" class="btn btn-primary btn-block btn-flat">Giriş</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <!-- /.social-auth-links -->


    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="inc/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="inc/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="inc/plugins/iCheck/icheck.min.js"></script>
<script>
    function MailKontrol(email) {
        var kontrol = new RegExp(/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/i);
        return kontrol.test(email);
    }

    function giris() {
        $("#sonuc").html("<img width='25px' height='25px'  src='inc/gif/loading.gif'  style='width: 50'/>");
        setTimeout(function () {
            var mail, sifre;
            mail = $('#mail').val();
            sifre = $('#sifre').val();
            if (mail == "" || sifre == "") {
                $('#sonuc').css("color", "darkred");
                $('#sonuc').html("<h4>Lütfen alan boş bırakmayınız...</h4>");
            }
            else if (!MailKontrol(mail)) {
                $('#sonuc').css("color", "darkred");
                $("#sonuc").html("<h4><i class='fa fa-fw fa-close'></i>  Lütfen geçerli bir mail adresi giriniz...</h4>");
            }
            else {
                $.ajax({
                    method: "post",
                    url: this.url,
                    data: {giris: "1", mail: mail, sifre: sifre}
                }).done(function (result) {
                    if (result == 0) {
                        $('#sonuc').css("color", "darkred");
                        $("#sonuc").html("<h4><i class='fa fa-fw fa-close'></i> Kullanıcı adı ya da şifre hatalı!</h4>");
                    }
                    if (result == 1) {
                        setTimeout(function () {
                            $('#sonuc').css("color", "darkgreen");
                            $("#sonuc").html("<h4><i class='fa fa-fw fa-success'></i> Başarılı giriş!</h4>");
                        },500);
                        window.location="/uygulama/anasayfa";
                    }
                });
            }
        }, 500);
    }

    function validate(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);

        if (event.keyCode == 13) {
            if ($('#sifre').val() == "") {
                $('#sifre').focus();
            }
            else
                giris();
        }
    };

    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>
</html>
