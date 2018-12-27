<?php
    require 'r.php';
    session_start();
    session_unset();
    if(!isset($_SESSION["user"])) {
        header("Location: /giris");
    }
    /*
    if(isset($_GET["barkodara"])) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://www.bilsoftyazilim.com/stok3.asp");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('barkodara' => "$_GET[barkodara]")));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        $a = explode("size=2", $server_output);
        $b = str_replace(">", "", $a[7]);
        print_r($b);
        echo "<br>"
        curl_close($ch);
    }
    */
?>
<form>
    <input type="text" name="barkodara" >
</form>
