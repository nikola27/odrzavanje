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

<a href="novi.php" class="success button expanded" style= "background-color: red; font-size:1em; font-weight:bold; color:white;"; >Dodaj kategoriju</a>
  <?php

 $izraz = $veza->prepare("
 select a.sifra, a.naziv,
count(b.kategorija) as kategorije
from kategorija a left join kvar b
on a.sifra = b.kategorija
group by a.sifra, a.naziv
 
 
 ");
 $izraz->execute();
 $rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
 ?>
 
 
 <div class="cell large-6">
  <table class="responsive-card-table unstriped">

    <thead>
    <tr>
    <th>Naziv</th>
    <th>Akcija</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($rezultati as $red):?>
      <tr>
      <td data-label="Naziv"><?php echo $red->naziv; ?></td>
      <td data-label="Akcija">

      <a href="promjena.php?sifra=<?php echo $red->sifra; ?>">
      <i class="fas fa-edit fa"></i> 
      </a>
      <?php if($red->kategorije==0): ?>
      <a onclick="return confirm('Sigurno obrisati <?php echo $red->naziv ?>')" href="obrisi.php?sifra=<?php echo $red->sifra; ?>">
      <i class="fas fa-trash fa" style="color: red;"></i>
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
  </body>
</html>
