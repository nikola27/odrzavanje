<?php include_once "../../konfiguracija.php" ;
if(!isset($_SESSION[$idAPP."o"])){
  header("location: " . $putanjaAPP . "odjava.php");
}
$greske=Array();


if(isset($_POST["dodaj"])){

  if(($_POST["ime"])===""){
    $greske["ime"]="Obavezno unos Imena";
  }

  if(($_POST["prezime"])===""){
    $greske["prezime"]="Obavezno unos Prezime";
  }

  if(($_POST["lozinka"])===""){
    $greske["lozinka"]="Obavezno unos Lozinka";
  }

  if(($_POST["oib"])===""){
    $greske["oib"]="Obavezno unos OIB";
  }

  if(($_POST["telefon"])===""){
    $greske["telefon"]="Obavezno unos Telefon";
  }
  if(($_POST["adresa"])===""){
    $greske["adresa"]="Obavezno unos Adresa";
  }
  if(($_POST["email"])===""){
    $greske["email"]="Obavezno unos email";
  }
  
  if(count($greske)===0){

  $izraz = $veza->prepare("insert into korisnik (ime, prezime, lozinka, oib, telefon, adresa, email) values 
                          (:ime, :prezime, :lozinka, :oib, :telefon, :adresa, :email)");
  
  $izraz->bindParam(":ime",$_POST["ime"]);
  $izraz->bindParam(":prezime",$_POST["prezime"]);
  $izraz->bindParam(":lozinka",$_POST["lozinka"]);
  $izraz->bindParam(":oib",$_POST["oib"]);
  $izraz->bindParam(":telefon",$_POST["telefon"]);
  $izraz->bindParam(":adresa",$_POST["adresa"]);                       
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
          <?php if(!isset($greske["ime"])): ?>

            <label for="ime">Ime</label>
            <input autocomplete="off" type="text" id="ime" name="ime" placeholder="ime korisnika"
            value="<?php echo isset($_POST["ime"]) ? $_POST["ime"] : "" ?>">

            <?php else:?>

            <label class="is-invalid-label">
              Zahtjevani unos
              <input type="text" 
              value="<?php echo  $_POST["ime"]; ?>"
              class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
              aria-invalid="true" autocomplete="off" type="text" id="ime" name="ime" placeholder="ime korisnika">
              <span class="form-error is-visible" id="nazivGreska">
              <?php echo $greske["ime"]; ?>
              </span>
              </label>

              <?php endif;?>
          </div>


          <div class="floated-label-wrapper">

            <?php if(!isset($greske["ime"])): ?>
           
           
            <label for="prezime">Prezime</label>
            <input autocomplete="off" type="text" id="prezime" name="prezime" placeholder="prezime"
            value="<?php echo isset($_POST["prezime"]) ? $_POST["prezime"] : "" ?>">

            <?php else:?>

            <label class="is-invalid-label">
              Zahtjevani unos
              <input type="text" 
              value="<?php echo  $_POST["prezime"]; ?>"
              class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
              aria-invalid="true" autocomplete="off" type="text" id="prezime" name="prezime" placeholder="prezime">
              <span class="form-error is-visible" id="nazivGreska">
              <?php echo $greske["prezime"]; ?>
              </span>
              </label>

              <?php endif;?>
          </div>

          <div class="floated-label-wrapper">
            <?php if(!isset($greske["lozinka"])): ?>
           
           
            <label for="lozinka">lozinka</label>
            <input autocomplete="off" type="text" id="lozinka" name="lozinka" placeholder="lozinka"
            value="<?php echo isset($_POST["lozinka"]) ? $_POST["lozinka"] : "" ?>">

            <?php else:?>

            <label class="is-invalid-label">
              Zahtjevani unos
              <input type="text" 
              value="<?php echo  $_POST["lozinka"]; ?>"
              class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
              aria-invalid="true" autocomplete="off" type="lozinka" id="lozinka" name="lozinka" placeholder="lozinka">
              <span class="form-error is-visible" id="nazivGreska">
              <?php echo $greske["lozinka"]; ?>
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
      
          <input class="button" type="submit" name="dodaj" value="Dodaj novi">
        </form>

    <?php include_once "../../predlozak/podnozje.php" ?>

    <?php include_once "../../predlozak/skripte.php" ?>
  </body>
</html>
