<?php
$tittle = "Ürün Ekleme";
require '../inc/fonksiyon.php';
?>
<style>
    .txt {
        margin-left: 7px;
        margin: 3px;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
    }

    .pa {
        float: right;
        margin: 10px;
        font-weight: bold;
    }
</style>
<p id="UrunKoduSonuc"></p>
<table>
    <tr>
        <td><p class="pa">Ürün Adı</p></td>
        <td><input type="text" class="form-control txt" name="UrunAdi" id="UrunAdi"></td>
    </tr>
    <tr>
        <td><p class="pa">Ürün Kodu</p></td>
        <td><input type="text" class="form-control txt" name="UrunKodu" id="UrunKodu"></td>
    </tr>
    <tr>
        <td><p class="pa">Ürün Adet</p></td>
        <td><input type="text" class="form-control txt" name="UrunAdet" id="UrunAdet"></td>
    </tr>
    <tr>
        <td><p class="pa">Ürün Markası</p></td>
        <td><input type="text" class="form-control txt" name="UrunMarkası" id="UrunMarkasi"></td>
    </tr>
    <tr>
        <td><p class="pa">Ürün Tutar</p></td>
        <td><input type="text" class="form-control txt" name="UrunTutar" id="UrunTutari"></td>
    </tr>
    <tr>
        <td><p class="pa">Ürün Geliş Tutarı</p></td>
        <td><input type="text" class="form-control txt" name="UrunGeliş" id="UrunGelisFiyati"></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <button type="button" onclick="kayit()" class="btn btn-primary" style="float:right;margin-top:5px">Kaydet
            </button>
        </td>
    </tr>
</table>

<script>
    $(document).ready(function () {
       $("#UrunAdi").prop("readonly","readonly");
    });

    $("#UrunKodu").keyup(function (e) {
        if (e.keyCode == 13) {
            a();
        }
    });

    function a() {
        var code = $("#UrunKodu").val();
        $.ajax({
            method: "post",
            url: "../ajax/ajax-query.php",
            data: {code: code}
        }).done(function (result) {
            var a = result.split("|");
            if (a[0] == 1) {
                $("#UrunAdi").val(a[1]);
            }
        });
    }

    function kayit() {
        var UrunAdi, UrunKodu, UrunMarkasi, UrunAdet, UrunTutari, UrunGelisFiyati;
        UrunAdi = $.trim($("#UrunAdi").val());
        UrunKodu = $.trim($("#UrunKodu").val());
        UrunMarkasi = $.trim($("#UrunMarkasi").val());
        UrunAdet = $.trim($("#UrunAdet").val());
        UrunTutari = $.trim($("#UrunTutari").val());
        UrunGelisFiyati = $.trim($("#UrunGelisFiyati").val());
        if (UrunAdi.length <= 0 || UrunKodu.length <= 0 || UrunAdet.length <= 0 || UrunMarkasi.length <= 0 || UrunTutari.length <= 0 || UrunGelisFiyati.length <= 0) {
            alert("Lütfen boş yer bırakmayınız");
        }
        else {
            $.ajax({
                method: "post",
                url: "../ajax/ajax-query.php",
                data: {
                    UrunEkle:1,
                    UrunAdi: UrunAdi,
                    UrunKodu: UrunKodu,
                    UrunAdet: UrunAdet,
                    UrunMarkasi: UrunMarkasi,
                    UrunTutari:UrunTutari,
                    UrunGelisFiyati: UrunGelisFiyati,
                    DukkanId:"<?=$dukkan;?>"
                }
            }).done(function (b) {
                if(b==1){
                    $("#UrunAdi").html("");
                    $("#UrunKodu").html("");
                    $("#UrunMarkasi").html("");
                    $("#UrunAdet").html("");
                    $("#UrunTutari").html("");
                    $("#UrunGelisFiyati").html("");
                    $("#UrunKoduSonuc").html("<p style='color:darkgreen'>Başarı ile kayıt edildi.</p>");
                }
                if(b==2)
                {
                    alert("Bu ürün daha önceden kaydedilmiş.");
                }
            });
        }
    }
</script>