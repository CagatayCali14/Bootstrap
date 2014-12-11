<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<?php
if($_GET["Islem"]=="Kaydet"){ //if bloğu başlangıcı 1

    //try catch başlangıcı
    try{//try başlangıcı

        if($conn=mysql_connect("localhost","root","kalkandere")){//if blogu başlangıcı 2
            mysql_query("SET NAMES 'UTF-8'");
        }//if blogu bitişi 2
        else{//else blogu  başlangıcı
            throw new Exception('Veritabanı sunucusuna bağlanılamadı!');
        }//else blogu bitişi

        if(!mysql_select_db("anket",$conn)){
            throw new Exception('Veritabanı tablosu seçilemedi!!');
        }

        //anket sorularını anketsorular tablosuna ekleyeceğiz.
        $anketsorusu=$_POST["anketsorusu"];
        $sqlanketsorusu="insert into anketsorular (anketsoru) VALUES ('".$anketsorusu."')";
        if(mysql_query($sqlanketsorusu,$conn)){
            $anketid=mysql_insert_id();

            //anket sorusunu ekledikten sonra (işlem başarılıysa) anketin seçeneklerini ekleyeceğiz ankete hangi id verildiğini  mysql insert id fonksiyonu ile öğreniyoruz anketid yi öğrendikten sonra seçenekleri değişkenlere atayalım
            $secenek1=$_POST["secenek1"];
            $secenek2=$_POST["secenek2"];
            $secenek3=$_POST["secenek3"];
            $secenek4=$_POST["secenek4"];
            $secenek5=$_POST["secenek5"];
        }
        //if seçenek kontrolü başlangıcı
        if(!empty($secenek1)){
            $sqlsecenek1="insert into anketsecenekler (anketid, secenek, oy) VALUES ('".$anketid."','".$secenek1."','".$anketid."','0')";
            mysql_query($sqlsecenek1,$conn);
        }
        if(!empty($secenek2)){
            $sqlsecenek1="insert into anketsecenekler (anketid, secenek, oy) VALUES ('".$anketid."','".$secenek2."','".$anketid."','0')";
            mysql_query($sqlsecenek2,$conn);
        }
        if(!empty($secenek3)){
            $sqlsecenek1="insert into anketsecenekler (anketid, secenek, oy) VALUES ('".$anketid."','".$secenek3."','".$anketid."','0')";
            mysql_query($sqlsecenek3,$conn);
        }
        if(!empty($secenek4)){
            $sqlsecenek1="insert into anketsecenekler (anketid, secenek, oy) VALUES ('".$anketid."','".$secenek4."','".$anketid."','0')";
            mysql_query($sqlsecenek4,$conn);
        }
        if(!empty($secenek5)){
            $sqlsecenek1="insert into anketsecenekler (anketid, secenek, oy) VALUES ('".$anketid."','".$secenek5."','".$anketid."','0')";
            mysql_query($sqlsecenek5,$conn);
        }//if seçenek kontrolü bitişi

    } //try blogu bitişi
    catch  (Exception $e){//catch blogu başlangıcı
        echo $e->getMessage();
    }//catch blogu bitişi

} //if bloğu bitişi 1..
else{//else blogu başlangıcı , işlem değişkeni bir değer içermiyorsa veya değeri kaydet değilse formu görünteleyelim.
    //else öldür araya form girsin ?>
    <form name="form1" method="post" action="anketyonetici.php?Mode=Yeni&Islem=Kaydet">
        <table width="400" border="0" cellspacing="2" cellpadding="2">
            <tr>
                <td colspan="2"><b>Anket Ekle</b></td>
            </tr>
            <tr>
                <td width="100">Soru : </td>
                <td width="286"><label for="anketsorusu"></label><input name="anketsorusu" type="text" id="anketsorusu" size="35"</td>
            </tr>
            <tr>
                <td>Seçenek 1 :</td>
                <td><label for="secenek1"></label><input name="secenek1" type="text" id="secenek1" size="45" ></td>
            </tr>
            <tr>
                <td>Seçenek 2 :</td>
                <td><label for="secenek2"></label><input name="secenek2" type="text" id="secenek2" size="45" ></td>
            </tr>
            <tr>
                <td>Seçenek 3 :</td>
                <td><label for="secenek3"></label><input name="secenek3" type="text" id="secenek3" size="45" ></td>
            </tr>
            <tr>
                <td>Seçenek 4 :</td>
                <td><label for="secenek4"></label><input name="secenek4" type="text" id="secenek4" size="45" ></td>
            </tr>
            <tr>
                <td>Seçenek 5 :</td>
                <td><label for="secenek5"></label><input name="secenek5" type="text" id="secenek5" size="45" ></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td><input type="submit" name="Submit" value="Anket Ekle"></td>
            </tr>
        </table>
    </form>


    <?php //else canlandır formdan koda geçsin.
}//else blogu bitişi
?>
</body>
</html>

