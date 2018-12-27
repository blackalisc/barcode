<?php
require "../r.php";
$tittle = "Anasayfa";
require "../inc/fonksiyon.php";
$query = mysql_query("SELECT * FROM ba_dukkan WHERE mail='$_SESSION[user]'");
$row = mysql_fetch_array($query);

$dukkan = $row["DukkanId"];

?>
<script type="text/javascript">
    selamCak(selam);
</script>
<style>
    .gmd-1 {
        -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        -ms-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        -o-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        -webkit-transition: all 0.25s ease-in-out;
        -moz-transition: all 0.25s ease-in-out;
        -ms-transition: all 0.25s ease-in-out;
        -o-transition: all 0.25s ease-in-out;
        transition: all 0.25s ease-in-out;
    }

    .gmd-1:hover {
        -webkit-box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
        -moz-box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
        -ms-box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
        -o-box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
    }
</style>

<!----------------  GÜNLÜK SATIŞLAR ----------------->
<div class="col-md-3 col-sm-6 col-xs-12 gmd-1">
    <div class="info-box" style="margin-top:15px">
        <span class="info-box-icon bg-red"><i class="fa fa-shopping-cart"></i></span>
        <?php

        $date = date("Y-m-d H:i:s");
        $gunlukSatis = mysql_query("SELECT count(Tutar) FROM ba_satis WHERE Tarih like '$date%' and DukkanId='$dukkan'");
        $gunlukRow = mysql_fetch_array($gunlukSatis);
        if ($gunlukRow[0] == "")
            $yazilacak = 0;
        else
            $yazilacak = $gunlukRow[0];
        $gunlukSatisSayisi = mysql_query("SELECT * FROM ba_satis WHERE Tarih like '" . date("Y-m-d") . "%' and DukkanId='$dukkan'");
        $say = mysql_num_rows($gunlukSatisSayisi);


        ?>
        <div class="info-box-content">
            <span class="info-box-text">GÜNLÜK SATIŞLAR</span>
            <span class="info-box-number"><?php  if ($say == 0) echo "Henüz sefte yapılmadı..."; else $say; ?></span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>
<!----------------  GÜNLÜK KAZANÇ ----------------->
<div class="col-md-3 col-sm-6 col-xs-12 gmd-1">
    <div class="info-box" style="margin-top:15px">
        <span class="info-box-icon bg-red"><i class="fa fa-turkish-lira"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">GÜNLÜK KAZANÇ</span>
            <span class="info-box-number"><?php if ($say == 0) echo "Henüz sefte yapılmadı..."; else {$yazilacak;} ?><span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>
<!----------------  GÜNLÜK NET KAZANÇ ----------------->
<div class="col-md-3 col-sm-6 col-xs-12 gmd-1">
    <div class="info-box" style="margin-top:15px">
        <span class="info-box-icon bg-green"><i id="" class="fa fa-turkish-lira"></i></span>
        <?php



        ?>
        <div class="info-box-content">
            <span class="info-box-text">GÜNLÜK NET KAZANÇ</span>
            <span class="info-box-number">41,410</span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>

<!----------------  GÜNLÜK NET KAZANÇ ----------------->
<div class="col-md-3 col-sm-6 col-xs-12 gmd-1">
    <div class="info-box" style="margin-top:15px">
        <span class="info-box-icon bg-green"><i class="fa fa-line-chart"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">AYLIK NET KAZANÇ</span>
            <span class="info-box-number">41,410</span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>


<script type="text/javascript">
    $(document).ready(function () {

        var angle = 0;
        setInterval(function () {
            angle += 3;
            $("#mill_rotate").rotate(angle);
        }, 60);
    });
</script>