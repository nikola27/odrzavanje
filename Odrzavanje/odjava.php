<?php 
include_once "konfiguracija.php" ;
unset($_SESSION[$idAPP . "o"]);
session_destroy();
header("location: index.php");