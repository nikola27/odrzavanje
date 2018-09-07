<?php include_once "../../konfiguracija.php" ;
if(!isset($_SESSION[$idAPP."o"])){
  header("location: " . $putanjaAPP . "odjava.php");
}

$greske=Array();


if(isset($_POST["dodaj"])){

  if(($_POST["naziv"])===""){
    $greske["naziv"]="Obavezno unos naziva";
  }
 if(($_POST["adresa"])===""){
    $greske["adresa"]="Obavezno unos Adresa";
  }
  if(($_POST["oib"])===""){
    $greske["oib"]="Obavezno unos OIB";
  }

  if(($_POST["telefon"])===""){
    $greske["telefon"]="Obavezno unos Telefon";
  }
  
  if(($_POST["email"])===""){
    $greske["email"]="Obavezno unos email";
  }
  
  if(count($greske)===0){

  $izraz = $veza->prepare("insert into tvrtka (naziv, adresa, oib, telefon, email) values 
                          (:naziv, :adresa, :oib, :telefon, :email)");

                          $izraz->bindParam(":naziv",$_POST["naziv"]);
                          $izraz->bindParam(":adresa",$_POST["adresa"]); 
                         $izraz->bindParam(":oib",$_POST["oib"]);
                          $izraz->bindParam(":telefon",$_POST["telefon"]);                     
                          $izraz->bindParam(":email",$_POST["email"]);                        
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
                                    <?php if(!isset($greske["adresa"])): ?>

                                    <label for="adresa">adresa</label>
                                    <input autocomplete="off" type="text" id="adresa" name="adresa" placeholder="adresa"
                                    value="<?php echo isset($_POST["adresa"]) ? $_POST["adresa"] : "" ?>">

                                    <?php else:?>

                                    <label class="is-invalid-label">
                                    Zahtjevani unos
                                    <input type="text" 
                                    value="<?php echo  $_POST["adresa"]; ?>"
                                    class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
                                    aria-invalid="true" autocomplete="off" type="adresa" id="adresa" name="adresa" placeholder="adresa">
                                    <span class="form-error is-visible" id="nazivGreska">
                                    <?php echo $greske["adresa"]; ?>
                                    </span>
                                    </label>

                                    <?php endif;?>
                                    </div>

                  <div class="floated-label-wrapper">
                  <?php if(!isset($greske["oib"])): ?>

                  <label for="oib">OIB</label>
                  <input autocomplete="off" type="text" id="oib" name="oib" placeholder="oib"
                  value="<?php echo isset($_POST["oib"]) ? $_POST["oib"] : "" ?>">

                  <?php else:?>

                  <label class="is-invalid-label">
                  Zahtjevani unos
                  <input type="text" 
                  value="<?php echo  $_POST["oib"]; ?>"
                  class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
                  aria-invalid="true" autocomplete="off" type="oib" id="oib" name="oib" placeholder="oib">
                  <span class="form-error is-visible" id="nazivGreska">
                  <?php echo $greske["oib"]; ?>
                  </span>
                  </label>

                  <?php endif;?>
                  </div>

                  <div class="floated-label-wrapper">
                  <?php if(!isset($greske["telefon"])): ?>

                  <label for="telefon">telefon</label>
                  <input autocomplete="off" type="text" id="telefon" name="telefon" placeholder="telefon"
                  value="<?php echo isset($_POST["telefon"]) ? $_POST["telefon"] : "" ?>">

                  <?php else:?>

                  <label class="is-invalid-label">
                  Zahtjevani unos
                  <input type="text" 
                  value="<?php echo  $_POST["telefon"]; ?>"
                  class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
                  aria-invalid="true" autocomplete="off" type="telefon" id="telefon" name="telefon" placeholder="telefon">
                  <span class="form-error is-visible" id="nazivGreska">
                  <?php echo $greske["telefon"]; ?>
                  </span>
                  </label>

                  <?php endif;?>
                  </div>
                  
                  <div class="floated-label-wrapper">
                  
                  <?php if(!isset($greske["email"])): ?>

                  <label for="email">email</label>
                  <input autocomplete="off" type="text" id="email" name="email" placeholder="email"
                  value="<?php echo isset($_POST["email"]) ? $_POST["email"] : "" ?>">

                  <?php else:?>

                  <label class="is-invalid-label">
                  Zahtjevani unos
                  <input type="text" 
                  value="<?php echo  $_POST["email"]; ?>"
                  class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
                  aria-invalid="true" autocomplete="off" type="email" id="email" name="email" placeholder="email">
                  <span class="form-error is-visible" id="nazivGreska">
                  <?php echo $greske["email"]; ?>
                  </span>
                  </label>

                  <?php endif;?>
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