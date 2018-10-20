<?php include_once "konfiguracija.php" ?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
  <style>
.container {
    position: relative;
    font-family: Tahoma;
}

.text {
    position: absolute;
    top: 16px;
    left: 16px;
    background-color:black ;
    color: white;
    padding-left: 20px;
    padding-right: 20px;
}
</style>
    <?php include_once "predlozak/head.php" ?>
  </head>
  <body>
    <div class="grid-container">
      
    <?php include_once "predlozak/zaglavlje.php" ?>

    <?php include_once "predlozak/izbornik.php" ?>

      
    <div class="container">
    <img src="img/slika3.jpg" alt="slika" class="center" width="100%;">
    <div class="text">
    <h4>Dobrodošli na stranicu za održavanje nekretnina</h4>
    </div>
    

    <?php include_once "predlozak/podnozje.php" ?>

    <?php include_once "predlozak/skripte.php" ?>
  </body>
</html>
