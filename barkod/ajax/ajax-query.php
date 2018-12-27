<?php
require "../r.php";
session_start();
if (isset($_POST["giris"])){
    $m = mysql_real_escape_string($_POST["mail"]);
    $s = mysql_real_escape_string($_POST["sifre"]);
    $s = sha1(md5($s));
    $query = mysql_query("SELECT * FROM ba_dukkan WHERE mail='$m' and s='$s'");
    if(mysql_num_rows($query)>0){
        $_SESSION["user"]  = $m;
        echo 1;
    }
    else
        echo 0;
    return false;
}
if(isset($_POST["UrunEkle"])){
    $query1 = mysql_query("SELECT UrunId FROM ba_urun WHERE DukkanId='$_POST[DukkanId]' AND UrunKodu='$_POST[UrunKodu]'");
    if(mysql_num_rows($query1)>0){
        echo 2;
        return false;
    }
    $query = mysql_query("INSERT INTO ba_urun(UrunAdi, UrunAdet, UrunKodu,UrunMarkasi,UrunTutar,UrunGelisTutar,Aktif,DukkanId) VALUES ('$_POST[UrunAdi]', '$_POST[UrunAdet]','$_POST[UrunKodu]', '$_POST[UrunMarkasi]', '$_POST[UrunTutari]', '$_POST[UrunGelisFiyati]','0','$_POST[DukkanId]')");
echo 1;
}
if(isset($_POST["code"])){
    $sorgu = mysql_query("SELECT * FROM ba_barkod where barkod='$_POST[code]'");
    if(mysql_num_rows($sorgu)>0){
        $fetch = mysql_fetch_array($sorgu);
        echo "1|".$fetch["UrunAdi"];
    }
   // else if()
}
