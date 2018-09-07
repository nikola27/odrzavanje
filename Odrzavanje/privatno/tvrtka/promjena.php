<?php include_once "../../konfiguracija.php" ;
if(!isset($_SESSION[$idAPP."o"])){
  header("location: " . $putanjaAPP . "odjava.php");
}

if(!isset($_GET["sifra"]) && !isset($_POST["sifra"])){
  header("location: " . $putanjaAPP . "odjava.php");
}



if(isset($_POST["promjeni"])){
  $izraz = $veza->prepare("update tvrtka set naziv=:naziv,
                          adresa=:adresa,oib=:oib, 
                          telefon=:telefon,email=:email
                          where sifra=:sifra;");
  unset($_POST["promjeni"]);
  $izraz->execute($_POST);
  header("location: index.php");
}else{
  $izraz = $veza->prepare("select * from tvrtka where sifra=:sifra");
  $izraz->execute($_GET);
  $o=$izraz->fetch(PDO::FETCH_OBJ);
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
    <form class="callout text-center" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
          
    <div class="floated-label-wrapper">
            <label for="naziv">Naziv</label>
            <input value="<?php echo $o->naziv ?>"  autocomplete="off" type="text" id="naziv" name="naziv" placeholder="naziv tvrtke">
          </div>
          <div class="floated-label-wrapper">
            <label for="adresa">Adresa</label>
            <input value="<?php echo $o->adresa ?>" autocomplete="off" type="text" id="adresa" name="adresa" placeholder="Adresa tvrtke">
          </div>
          
          <div class="floated-label-wrapper">
            <label for="oib">OIB</label>
            <input value="<?php echo $o->oib ?>" autocomplete="off" type="text" id="oib" name="oib">
          </div>

          <div class="floated-label-wrapper">
            <label for="telefon">Telefon</label>
            <input value="<?php echo $o->telefon ?>" autocomplete="off" type="text" id="telefon" name="telefon" placeholder="telefon">
          </div>
        
          <div class="floated-label-wrapper">
            <label for="email">Email</label>
            <input value="<?php echo $o->email ?>" autocomplete="off" type="text" id="email" name="email" placeholder="email">
          </div>
          
          <input type="hidden" name="sifra" value="<?php echo $o->sifra ?>" />
          

        <input type="hidden" name="sifra" value="<?php echo $o->sifra ?>" />
        
        
        <div class="grid-x">
            <div class="cell large-1"></div>
            <div class="cell large-4">
              <a href="index.php" class="alert button expanded">Nazad</a>
            </div>
            <div class="cell large-2"></div>
            <div class="cell large-4">
            <input class="button expanded" type="submit" name="promjeni" value="Promjeni">
            </div>
          </div>    
        
        
        
        </form>

    <?php include_once "../../predlozak/podnozje.php" ?>

    <?php include_once "../../predlozak/skripte.php" ?>
  </body>
</html>
