<?php include_once "../../konfiguracija.php" ;
if(!isset($_SESSION[$idAPP."o"])){
  header("location: " . $putanjaAPP . "odjava.php");
}

$greske=Array();


if(isset($_POST["dodaj"])){

  if(($_POST["naziv"])===""){
  $greske["naziv"]="Obavezno unos Naziva";
}

if(count($greske)===0){

  $izraz = $veza->prepare("insert into kategorija (naziv) values 
                          (:naziv)");
  $izraz->bindParam(":naziv",$_POST["naziv"]);
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

            <label for="naziv">Naziv</label>
            <input autocomplete="off" type="text" id="naziv" name="naziv" placeholder="ime kategorije"
            value="<?php echo isset($_POST["naziv"]) ? $_POST["naziv"] : "" ?>">

            <?php else:?>

            <label class="is-invalid-label">
              Zahtjevani unos
              <input type="text" 
              value="<?php echo  $_POST["naziv"]; ?>"
              class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
              aria-invalid="true" autocomplete="off" type="text" id="naziv" name="naziv" placeholder="ime kategorije">
              <span class="form-error is-visible" id="nazivGreska">
              <?php echo $greske["naziv"]; ?>
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
