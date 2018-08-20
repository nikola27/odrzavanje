<?php
if(!isset($_POST["korisnik"])){
exit;
}

include_once "konfiguracija.php";

    if($_POST["korisnik"]===""){
        header("location: prijava.php?poruka=2");
        exit;
    }

    if(($_POST["korisnik"]==="nsaric" && $_POST["lozinka"]==="n")
    ||
    ($_POST["korisnik"]==="odrzavanje" && $_POST["lozinka"]==="od")
    ){
      
        $_SESSION[$idAPP."o"]= $_POST["korisnik"];
        header("location: index.php");
    }else{
        header("location: prijava.php?poruka=1");
    }
