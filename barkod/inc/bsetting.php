<?php
session_start();
$OturumunAcikKalmasi = $_SESSION["azaman"];
if ($OturumunAcikKalmasi > time()) {
	$_SESSION['azaman'] = time() + 600;

}
if ($OturumunAcikKalmasi <= time()) {
		header("location: /panelgiris.php");
		exit;
	}
	if($_SESSION["entryBayi"]=="")
{
	header("location: ../panelgiris.php");
	exit;
}
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
window.location="/panelgiris.php";
}
} 
sayacYeri.text(saniye);
setInterval("$.sayimiBaslat()", 1000);
});
</script>