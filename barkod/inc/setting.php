<?php 
session_start();
$OturumunAcikKalmasi = $_SESSION["zaman"];
if ($OturumunAcikKalmasi > time()) {
	$_SESSION['zaman'] = time() + 60;

}
if ($OturumunAcikKalmasi <= time()) {
		session_start();
		$user = $_SESSION["sahis"];
		include("../c.php");
		$ip = $_SERVER["REMOTE_ADDR"];
		$tarih = date("d-m-Y H:i:s");
		#$query = mysql_query("INSERT INTO kisiLog(username,eylem,ip,tarih) VALUES('$user','Süre Aşımı','$ip','$tarih')");
		header("location: ../");
		exit;
	}

if($_SESSION["sahis"]==null)
{
  $_SESSION["hata"]="Lütfen giriş yapınız.";
  header("location: ../");
  exit;
}
include("../r.php");
$u = $_SESSION["sahis"];
$sorgula = mysql_query("select * from rm_users where username='$u'");
$say = mysql_num_rows($sorgula);
$sorgula = mysql_fetch_array($sorgula);
$paketTrih = $sorgula["expiration"];
$name = $sorgula["firstname"];
$username = $sorgula["username"];
$surname = $sorgula["lastname"];
$simdikiZaman = strtotime($simdi);
$paketTrihh = strtotime($paketTrih);
$_SESSION["t"] = $username;

?>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
$(function(){
var saniye = 600;
var sayacYeri = $("div.sayac span");
$.sayimiBaslat = function(){
if(saniye > 1){
saniye--;
sayacYeri.text(saniye);
} else {
window.location="<?php echo __DIR__; ?>";
}
} 
sayacYeri.text(saniye);
setInterval("$.sayimiBaslat()", 1000);
});
</script>