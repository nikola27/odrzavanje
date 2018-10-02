<?php include_once "../../konfiguracija.php" ;
if(!isset($_SESSION[$idAPP."o"])){
  header("location: " . $putanjaAPP . "odjava.php");
}

if(!isset($_GET["sifra"])){
  header("location: " . $putanjaAPP . "odjava.php");
}




  $izraz = $veza->prepare("delete from kvar
                          where sifra=:sifra;");
  $izraz->execute($_GET);
  header("location: index.php");
