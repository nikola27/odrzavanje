<?php

session_start();
include_once "Postavke.php";
include_once "funkcije.php";
$idAPP="OdrzavanjeVer1";
$nazivAPP="Održavanje";

switch($_SERVER["HTTP_HOST"]){
    case "localhost":
    $putanjaAPP="/Odrzavanje/";
    $veza = new PDO("mysql:host=localhost;dbname=mojprimjer1","edunova","edunova");
    $veza->exec("set names utf8;");
    break;
   
    case "www.odrzavanje.byethost24.com":
    case "odrzavanje.byethost24.com":
    $putanjaAPP="/";
    $veza = new PDO("mysql:host=sql201.byethost.com;dbname=b24_22616270_odrzavanje18","b24_22616270","arwenevenstar27");
    $veza->exec("set names utf8;");
    break;


}







