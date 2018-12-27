<?php
/*----------------------------------------------*/
$host="localhost";
$kadi="root";
$sifre="";
$veritabani="barcodex";

$db=mysql_connect($host,$kadi,$sifre);
mysql_query("SET NAMES 'UTF8'");
mysql_query("SET character_set_connection = 'UTF8'");
mysql_query("SET character_set_client = 'UTF8'");
mysql_query("SET character_set_results = 'UTF8'");

if($db)
{
    echo "";
}
else
{
    echo"baglanti basarisizdir.".mysql_error();
}
@mysql_select_db($veritabani,$db) or die("veri tabanina baglantısı oluşturulamadı.");