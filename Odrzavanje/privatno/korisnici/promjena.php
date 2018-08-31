<?php include_once "../../konfiguracija.php" ;
if(!isset($_SESSION[$idAPP."o"])){
  header("location: " . $putanjaAPP . "odjava.php");
}

if(!isset($_GET["sifra"]) && !isset($_POST["sifra"])){
  header("location: " . $putanjaAPP . "odjava.php");
}



if(isset($_POST["promjeni"])){
  $izraz = $veza->prepare("update korisnik set ime=:ime,
                          prezime=:prezime,lozinka=:lozinka,oib=:oib, 
                          telefon=:telefon, adresa=:adresa,email=:email
                          where sifra=:sifra;");
  unset($_POST["promjeni"]);
  $izraz->execute($_POST);
  header("location: index.php");
}else{
  $izraz = $veza->prepare("select * from korisnik where sifra=:sifra");
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
            <label for="ime">Ime</label>
            <input autocomplete="off" type="text" id="ime" name="ime" placeholder="ime korisnika">
          </div>
          <div class="floated-label-wrapper">
            <label for="prezime">Prezime</label>
            <input autocomplete="off" type="text" id="prezime" name="prezime" placeholder="prezime korisnika">
          </div>
          <div class="floated-label-wrapper">
            <label for="lozinka">Lozinka</label>
            <input autocomplete="off" type="text" id="lozinka" name="lozinka" placeholder="lozinka">
          </div>
          <div class="floated-label-wrapper">
            <label for="oib">OIB</label>
            <input autocomplete="off" type="text" id="oib" name="oib">
          </div>

          <div class="floated-label-wrapper">
            <label for="telefon">Telefon</label>
            <input autocomplete="off" type="text" id="telefon" name="telefon" placeholder="telefon">
          </div>
          <div class="floated-label-wrapper">
            <label for="adresa">Adresa</label>
            <input autocomplete="off" type="text" id="adresa" name="adresa" placeholder="adresa">
          </div>
          <div class="floated-label-wrapper">
            <label for="email">Email</label>
            <input autocomplete="off" type="text" id="email" name="email" placeholder="email">
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
