<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if(!isset($_POST["email"])){
exit;
}

include_once "konfiguracija.php";

 
//provjera jesu lozinke iste

    $izraz=$veza->prepare("insert into operater (email,ime,prezime,lozinka,uloga,sessionid)
        values (:email,:ime,:prezime,:lozinka,'korisnik','" . session_id() . "')
    ");
    $izraz->execute(array(
        "email"=>$_POST["email"],
        "ime"=>$_POST["ime"],
        "prezime"=>$_POST["prezime"],
        "lozinka"=>password_hash($_POST["lozinka"],PASSWORD_BCRYPT,array("cost"=>12))
    
    
    ));

    $izraz->execute();
    $primatelj = new stdClass();
    $primatelj->email= $_POST["email"];
    $primatelj->ime= $_POST["ime"];
    $primatelj->prezime= $_POST["prezime"];
    saljiEmail("saricnikola27@gmail.com",array($primatelj),"Održavanje registracija","<a href=\"http://odrzavanje.byethost24.com/Odrzavanje/potvrdi.php?id=" . session_id() . "\">Potvrdi</a>");
    header("location: index.php");