<?php include_once "../../konfiguracija.php" ;
if(!isset($_SESSION[$idAPP."o"])){
  header("location: " . $putanjaAPP . "odjava.php");
}

if(isset($_POST["dodaj"])){
  $izraz = $veza->prepare("insert into kategorija (naziv) values 
                          (:naziv)");
  unset($_POST["dodaj"]);
  $izraz->execute($_POST);
  header("location: index.php");
}


?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <?php include_once "../../predlozak/head.php" ?>
  </head>
  <body>
    <div class="grid-container">
      
    <?php include_once "../../predlozak/zaglavlje.php" ?>

    <?php include_once "../../predlozak/izbornik.php" ?>
    <form class="callout text-center" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post"  >
  
          <div class="floated-label-wrapper">
            <label for="naziv">Naziv</label>
            <input autocomplete="off" type="text" id="naziv" name="naziv">
          </div>
         
          <input class="button" type="submit" name="dodaj" value="Dodaj novi">
        </form>

    <?php include_once "../../predlozak/podnozje.php" ?>

    <?php include_once "../../predlozak/skripte.php" ?>
  </body>
</html>
