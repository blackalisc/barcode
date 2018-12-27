<?php
  include("bsetting.php");
  include("bhead.php");
  include("goruntu.php");
  //include("../r.php");
  session_start();
  function degis($text) {
$text = trim($text);
$search = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü',' ');
$replace = array('c','c','g','g','i','i','o','o','s','s','u','u',' ');
$new_text = str_replace($search,$replace,$text);
$new_text = ucwords($new_text);
return $new_text;
} 
        function bosluksil($string)
{
  $string = preg_replace("/\s+/", " ", $string);
  $string = trim($string);
  $string = strtolower($string);
  return $string;
}
function ucfirst_tr($metin)
{
    $k_uzunluk = mb_strlen($metin, "UTF-8");
    $ilkKarakter= mb_substr($metin, 0, 1, "UTF-8");
    $kalan = mb_substr($metin, 1, $k_uzunluk - 1, "UTF-8");
    return mb_strtoupper($ilkKarakter, "UTF-8") . mb_strtolower($kalan,"UTF-8");
}

?>
<script type="text/javascript">
    function  id(text) {
        var metin = document.getElementById(text);
        return metin;
    }
    function  idVal(text) {
        var metin = document.getElementById(text).value;
        return metin;
    }
    function git(text) {
        return window.location = text;
    }
</script>
