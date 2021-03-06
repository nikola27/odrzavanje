<?php include_once "../../konfiguracija.php" ;
if(!isset($_SESSION[$idAPP."o"])){
  header("location: " . $putanjaAPP . "odjava.php");
}

$greske=Array();

if(isset($_POST["dodaj"])){

  if(($_POST["naziv"])===""){
    $greske["naziv"]="Obavezno unos naziva";
  }
 if(($_POST["opis"])===""){
    $greske["opis"]="Obavezno unos Opis";
  }
  if(($_POST["kategorija"])===""){
    $greske["kategorija"]="Obavezno unos Kategorije";
  }

  if(($_POST["datum"])===""){
    $greske["datum"]="Obavezno unos datuma";
  }
  
  
  if(count($greske)===0){

  $izraz = $veza->prepare("insert into kvar (naziv, opis, kategorija, datum) values 
                          (:naziv, :opis, :kategorija, :datum)");

                          $izraz->bindParam(":naziv",$_POST["naziv"]);
                          $izraz->bindParam(":opis",$_POST["opis"]); 
                         $izraz->bindParam(":kategorija",$_POST["kategorija"]);
                          $izraz->bindParam(":datum",$_POST["datum"]);                     
                                                
  unset($_POST["dodaj"]);
  $izraz->execute($_POST);
  header("location: index.php");
}
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
          <?php if(!isset($greske["naziv"])): ?>

                  <label for="naziv">naziv</label>
                  <input autocomplete="off" type="text" id="naziv" name="naziv" placeholder="naziv"
                  value="<?php echo isset($_POST["naziv"]) ? $_POST["naziv"] : "" ?>">

                  <?php else:?>

                  <label class="is-invalid-label">
                    Zahtjevani unos
                    <input type="text" 
                    value="<?php echo  $_POST["naziv"]; ?>"
                    class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
                    aria-invalid="true" autocomplete="off" type="text" id="naziv" name="naziv" placeholder="naziv">
                    <span class="form-error is-visible" id="nazivGreska">
                    <?php echo $greske["naziv"]; ?>
                    </span>
                    </label>

                    <?php endif;?>
                  </div>
                  <div class="floated-label-wrapper">
                                    <?php if(!isset($greske["opis"])): ?>

                                    <label for="opis">opis</label>
                                    <input autocomplete="off" type="text" id="opis" name="opis" placeholder="opis"
                                    value="<?php echo isset($_POST["opis"]) ? $_POST["opis"] : "" ?>">

                                    <?php else:?>

                                    <label class="is-invalid-label">
                                    Zahtjevani unos
                                    <input type="text" 
                                    value="<?php echo  $_POST["opis"]; ?>"
                                    class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
                                    aria-invalid="true" autocomplete="off" type="text" id="opis" name="opis" placeholder="opis">
                                    <span class="form-error is-visible" id="nazivGreska">
                                    <?php echo $greske["opis"]; ?>
                                    </span>
                                    </label>

                                    <?php endif;?>
                                    </div>
                                    <?php include_once "osnovniPodaci.php" ?>

                  <div class="floated-label-wrapper">
                  <?php if(!isset($greske["datum"])): ?>

                  <label for="datum">datum</label>
                  <input autocomplete="off" type="date" id="datum" name="datum" placeholder="datum"
                  value="<?php echo isset($_POST["datum"]) ? $_POST["datum"] : "" ?>">

                  <?php else:?>

                  <label class="is-invalid-label">
                  Zahtjevani unos
                  <input type="text" 
                  value="<?php echo  $_POST["datum"]; ?>"
                  class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
                  aria-invalid="true" autocomplete="off" type="date" id="datum" name="datum" placeholder="datum">
                  <span class="form-error is-visible" id="nazivGreska">
                  <?php echo $greske["datum"]; ?>
                  </span>
                  </label>

                  <?php endif;?>
                  </div>
                  
          </div>
      

                <div class="grid-x">
                            <div class="cell large-1"></div>
                            <div class="cell large-4">
                              <a href="index.php" class="alert button expanded">Nazad</a>
                            </div>
                            <div class="cell large-2"></div>
                            <div class="cell large-4">
                            <input class="button expanded" type="submit" name="dodaj" value="Dodaj novi">
                            </div>
                          </div>  



    <?php include_once "../../predlozak/podnozje.php" ?>

    <?php include_once "../../predlozak/skripte.php" ?>
  </body>
</html>
