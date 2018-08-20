<?php

session_start();
include_once "Postavke.php";
include_once "funkcije.php";
$idAPP="OdrzavanjeVer1";
$nazivAPP="Održavanje";

switch($_SERVER["HTTP_HOST"]){
    case "localhost":
    $putanjaAPP="/Odrzavanje1.42/";
    $veza = new PDO("mysql:host=localhost;dbname=mojprimjer1","edunova","edunova");
    $veza->exec("set names utf8;");
    break;
   
    case "nikolasaric.byethost.com":
    $putanjaAPP="/../";
    $veza = new PDO("mysql:host=sql303.byethost.com;dbname=b13_21948091_odrzavanje18","b13_21948091","odrzavanje18");
    $veza->exec("set names utf8;");
    break;


}







