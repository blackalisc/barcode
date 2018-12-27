<?php
    if(isset($_POST["satisyap"])){
        require_once "../inc/classFunc.php";
        #require '../r.php';
        #$query = mysql_query("SELECT UrunAdi FROM ba_barkod WHERE barkod='$_POST[satisyap]'");
       # $f = mysql_fetch_array($query);
        $f = func::sorgu("ba_urun","UrunKodu='$_POST[satisyap]'","*");
        echo $f["UrunAdi"]."|".$f["UrunTutar"];
        return false;
    }
    $tittle = "Satış Yap";
    require '../inc/fonksiyon.php';
?>
<input type="text" name="SatisYap" id="SatisYap">
<p id="a"></p>
<p><b>Toplam Tutar : </b></p>
<p id="toplamtutar"></p>
<script type="text/javascript">
    $("#SatisYap").keyup(function (e) {
        if(e.keyCode==13){
            var a = $("#SatisYap").val();
            $.ajax({
                method:"post",
                url:"SatisYap.php",
                data:{satisyap:a}
            }).done(function(result){
                var ex = result.split("|");
                var b = $("#a").val();
                $("#a").val(b+a+" || "+ex[0]+" || "+ex[1]+"<br>");
                $("#a").html(b+a+" || "+ex[0]+" || "+ex[1]+"<br>");
                $("#SatisYap").val("");
                var meblag = parseFloat(ex[1]);
                if($("#toplamtutar").val()=="")
                    var para = 0;
                else
                    var para = $("#toplamtutar").val();
                var tutar = parseFloat(para)+meblag;
                $("#toplamtutar").val(tutar);
                $("#toplamtutar").html(tutar);
            });
        }
    });
</script>

