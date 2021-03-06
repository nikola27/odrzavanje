<?php include_once "konfiguracija.php" ?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <?php include_once "predlozak/head.php" ?>
    <style>
    
      .floated-label-wrapper {
        position:relative;
        
      }

      .floated-label-wrapper label {
        background: #fefefe;
        color: #1779ba;
        font-size: 0.75rem;
        font-weight: 600;
        left: 0.75rem;
        opacity: 0;
        padding: 0 0.25rem;
        position: absolute;
        top: 2rem;
        transition: all 0.15s ease-in;
        z-index: -1;
      }

      .floated-label-wrapper label input[type=text],
      .floated-label-wrapper label input[type=email],
      .floated-label-wrapper label input[type=password] {
        border-radius: 4px;
        font-size: 1.75em;
        padding: 0.5em;
      }

      .floated-label-wrapper label.show {
        opacity: 1;
        top: -0.85rem;
        z-index: 1;
        transition: all 0.15s ease-in;
      }
      
      
    </style>
  </head>
  <body> 
  
    <div class="grid-container">
      
    <?php include_once "predlozak/zaglavlje.php" ?>

    <?php include_once "predlozak/izbornik.php" ?>
      

     
   <div class="grid-x grid-padding-x " >
   <div class="large-4 cell text-center position- center">
        <form class="callout text-center" action="autoriziraj.php" method="post">
          <h1>Prijava</h1>
          <div class="floated-label-wrapper">
            <label for="email">Email</label>
            <input autocomplete="off" type="text" id="email" name="email" placeholder="email">
          </div>
          <div class="floated-label-wrapper">
            <label for="lozinka">Lozinka</label>
            <input autocomplete="off" type="password" id="lozinka" name="lozinka" placeholder="lozinka">
          </div>
          <input class="button expanded" type="submit" value="Potvrdi">
        </form>
        <div class="large-6 cell text-center">
        <form class="callout text-center" action="registracija.php" method="post">
          <h1>Registracija</h1>
          <div class="floated-label-wrapper">
            <label for="ime">Ime</label>
            <input autocomplete="off" type="text" id="ime" name="ime" placeholder="Ime">
          </div>
          <div class="floated-label-wrapper">
            <label for="prezime">Prezime</label>
            <input autocomplete="off" type="text" id="prezime" name="prezime" placeholder="Prezime">
          </div>
          <div class="floated-label-wrapper">
            <label for="email">Email</label>
            <input autocomplete="off" type="text" id="email" name="email" placeholder="email">
          </div>
          <div class="floated-label-wrapper">
            <label for="lozinka">Lozinka</label>
            <input autocomplete="off" type="password" id="lozinka" name="lozinka" placeholder="lozinka">
          </div>
          <div class="floated-label-wrapper">
            <label for="plozinka">Ponovo lozinka</label>
            <input autocomplete="off" type="password" id="plozinka" name="plozinka" placeholder="ponovi">
          </div>
          <input class="button expanded" type="submit" value="Registriraj se">
        </form>
      </div>
      </div>
    </div>
    
    


    <?php include_once "predlozak/podnozje.php" ?>

    <?php include_once "predlozak/skripte.php" ?>
  </body>
</html>
