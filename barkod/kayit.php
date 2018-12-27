<?php
require 'r.php';
$m = "deneme@deneme.com";
$s = "1234";
$s = sha1(md5($s));
$query = mysql_query("SELECT * FROM ba_dukkan WHERE mail='$m' and sifre='$s' and Aktif='1'");
if(mysql_num_rows($query)>0){
    $_SESSION["user"]  = $m;
    echo 1;
}
else
    echo 0;