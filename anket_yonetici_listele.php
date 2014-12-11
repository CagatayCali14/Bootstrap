<?php
function anketlerilistele(){ //fonksiyon başlangıcı
    try {//Try başlangıcı
        if ($conn = mysql_connect("localhost", "root", "kalkandere")) {
            mysql_query("SET NAMES'UTF-8'");
        } else {
            throw new Exception('Veritabanına bağlanılamadı');
        }
        if(!mysql_select_db("anket",$conn)){
            throw new Exception('Veritabanı seçilemedi');
        }


            $sql="select * from anketsorular ORDER  BY anketid";
            if($sqlsonuc=mysql_query($sql,$conn)){
                $anketsayisi=mysql_num_rows($sqlsonuc);
                    if($anketsayisi<1){
                        echo "Anket Bulunamadı";
                    }
                    else{
                        echo'<b>Anketler :</b>';
                        $i=0;
                        while ($anketbilgisi=mysql_fetch_array($sqlsonuc)){
                            echo'<a href="anketyonetici.php?Mode=Goster&id=.$anketbilgisi["anketid"].$anketbilgisi["anketsoru"]></a><br>';
                            $i++;
                        }
                        echo'<br>Toplam "'.$i.'" anket bulundu ..';
                    }
            }else{
                throw new Exception('HATA!');
            }
        mysql_close($conn);
    }//Try bitişi
    catch (Exception $e){
        echo $e->getMessage();
    }

}//fonksiyon bitişi

