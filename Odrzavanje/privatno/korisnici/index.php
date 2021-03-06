<?php include_once "../../konfiguracija.php" ;
if(!isset($_SESSION[$idAPP."o"])){
  header("location: " . $putanjaAPP . "odjava.php");
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

<a href="novi.php" class="success button expanded" style= "background-color: red; font-size:1em; font-weight:bold; color:white;"; >Dodaj korisnika</a>
  <?php

$izraz = $veza->prepare("
select a.sifra,a.ime,a.prezime,
a.lozinka, a.oib,  a.telefon,  a.adresa, a.email, 
count(b.korisnik) as korisnika
from korisnik a left join korisnikkvar b
on a.sifra = b.korisnik
group by a.sifra,a.ime,a.prezime,
a.lozinka, a.oib,  a.telefon,  a.adresa, a.email;

");
$izraz->execute();
$rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
?>
 

 
 <div class="cell large-6">
  <table class="responsive-card-table unstriped">

    <thead>
      <tr>
        <th>Ime</th>
        <th>Prezime</th>
        <th>OIB</th>
        <th>Telefon</th>
        <th>Adresa</th>
        <th>Email</th>
        <th>Akcija</th>
   </tr>
   </thead>
   
   <tbody>
   <?php foreach($rezultati as $red):?>
     <tr>
     <td data-label="Ime"><?php echo $red->ime; ?></td>
     <td data-label="Prezime"><?php echo $red->prezime; ?></td>
     <td data-label="OIB"><?php echo $red->oib; ?></td>
     <td data-label="Telefon"><?php echo $red->telefon; ?></td>
     <td data-label="Adresa"><?php echo $red->adresa; ?></td>
     <td data-label="Email"><?php echo $red->email; ?></td>
     <td>
     <a href="promjena.php?sifra=<?php echo $red->sifra; ?>">
     <i class="fas fa-edit fa"></i> 
     </a>
     
     
          
          <?php if($red->korisnika==0): ?> 
          <a onclick="return confirm('Sigurno obrisati <?php echo $red->ime ?>')" href="obrisi.php?sifra=<?php echo $red->sifra; ?>">
            <i class="fas fa-trash fa " style="color: red;"></i>
            </a>
          <?php endif;?>
          </td>
      </tr>
     </tr>
    <?php endforeach;?>
    </tbody>
    </table>
  </div>


    <?php include_once "../../predlozak/podnozje.php" ?>

    <?php include_once "../../predlozak/skripte.php" ?>
    </div>
  </body>
</html>