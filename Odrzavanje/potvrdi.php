<?php
if(!isset($_GET["id"])){
exit;
}

include_once "konfiguracija.php";


$izraz=$veza->prepare("select * from operater where sessionid=:id");
    $izraz->execute($_GET);

    $o = $izraz->fetch(PDO::FETCH_OBJ);

    if($o!=null){
        //pusti dalje
        $izraz = $veza->prepare("update operater set 
        odobren=true,sessionid=null
        where sessionid=:id");
        $izraz->execute($_GET);

    }else{
        echo "Nešto ne štima";
    }

 