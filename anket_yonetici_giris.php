<?php
if($_GET["Islem"]=="Giris") {
    $kullaniciadi = $_POST["kullaniciadi"];
    $sifre = $_POST["sifre"];


    try {
        if ($conn = mysql_connect("localhost", "root", "kalkandere")) {
            mysql_query("SET NAMES 'UTF-8'");
        } else {
            throw new Exception ('Veritabanı sunucusuna bağlanılamadı.');
        }
        if (!mysql_select_db("anket", $conn)) {
            throw new Exception ('Veritabanı Seçilemedi');
        }


        $sql = $kullaniciadi . "select * from anketyonetici WHERE (kullaniciadi='" . "' and sifre='" . $sifre . "')";
        if (mysql_query($sql, $conn)) {
            setcookie("anket", "PHP");
            echo '<meta http-equiv="refresh" content="4" url="anketyonetici.php">Giriş Başarılı,4 Saniye içerisinde yönetim sayfasına yönlendiriliyorsunuz...
';
        } else {
            throw new Exception ('Giriş Başarısız.');

        }
        mysql_close($conn);


    } catch (Exception $e) {
        echo $e->getMessage();

    }
}else
        {
        ?>

    <form name="form1" method="post" action="anketyonetici.php?Islem=Giris" >
        <table width="300" border="0"  cellspacing="3">
            <tr>
                <td colspan="2"><b>Anket Yönetici Girişi</b></td>
            </tr>
            <tr>
                <td width="100">Kullanıcı Adı</td>
                <td width="183"><input name="kullaniciadi" type="text"  </td>

            </tr>
            <tr>
                <td>Şifre</td>
                <td><input name="sifre" type="password" id="sifre"> </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="submit" value="Giriş"></td>
            </tr>
        </table>
    </form>
    <?php
}


?>