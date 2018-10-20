<?php
if(!isset($_POST["email"])){
exit;
}

include_once "konfiguracija.php";

    if($_POST["email"]===""){
        header("location: prijava.php?poruka=2");
        exit;
    }

  $izraz=$veza->prepare("select * from operater where email=:email and odobren=1");
    $izraz->execute(array("email"=>$_POST["email"]));

    $o = $izraz->fetch(PDO::FETCH_OBJ);
//print_r($o);
    if($o!=null && $o->lozinka==password_verify($_POST["lozinka"],$o->lozinka)){
        //pusti dalje
        $o->lozinka="";
        $_SESSION[$idAPP."o"]= $o;
        header("location: index.php");
    }else{
        
        header("location: prijava.php?poruka=1");
    }




    /*
    if(($_POST["korisnik"]==="nsaric" && $_POST["lozinka"]==="n")
    ||
    ($_POST["korisnik"]==="odrzavanje" && $_POST["lozinka"]==="od")
    ){
      
        $_SESSION[$idAPP."o"]= $_POST["korisnik"];
        header("location: index.php");
    }else{
        header("location: prijava.php?poruka=1");
    }
*/