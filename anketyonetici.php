<? ob_start(); ?>
<?php
if($_COOKIE["anket"]=="PHP"){

     $mode=$_GET["Mode"];
    switch($mode){
        case "Listele":
            include "anket_yonetici_listele.php";
            anketlerilistele();
            break;
        case "Yeni";
            include "anket_yonetici_yeni.php";
            break;
        case "Goster":
            include "anket_yonetici_goster.php";
            anketgoster($_GET["id"]);
            break;
        case "Cikis":
            include "anket_yonetici_cikis.php";
            break;
        default:
            echo"İşlem yapmak için yandaki menüyü kullanınız";
            break;
    }

}
else{
    include "anket_yonetici_giris.php";
}



ob_end_flush();



?>


