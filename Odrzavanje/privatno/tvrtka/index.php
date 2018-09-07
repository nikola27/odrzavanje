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

<a href="novi.php" class="success button expanded" style= "background-color: red; font-size:1em; font-weight:bold; color:white;">Dodaj tvrtku</a>
  <?php

$izraz = $veza->prepare("
select a.sifra, a.naziv, a.adresa, a.oib, a.telefon, a.email,
count(b.tvrtka) as tvrtke
from tvrtka a left join kvartvrtka b
on a.sifra = b.tvrtka
group by a.sifra, a.naziv, a.adresa, a.oib, a.telefon, a.email;");
$izraz->execute();
$rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
?>

<div class="cell large-12">
  
 <table>
   <thead>
   <tr>
   <th>Naziv</th>
   <th>Adresa</th>
   <th>OIB</th>
   <th>Telefon</th>
   <th>Email</th>
   <th>Akcija</th>
   </tr>
   </thead>
   <tbody>
   <?php foreach($rezultati as $red):?>

     <tr>
     <td><?php echo $red->naziv; ?></td>
     <td><?php echo $red->adresa; ?></td>
     <td><?php echo $red->oib; ?></td>
     <td><?php echo $red->telefon; ?></td>
     <td><?php echo $red->email; ?></td>
      
    <td>
    <a href="promjena.php?sifra=<?php echo $red->sifra; ?>">
     <i class="fas fa-edit"></i> 
     </a>
     <?php if($red->tvrtke==0): ?>
    <a onclick="return confirm('Sigurno obrisati <?php echo $red->naziv?>')" href="obrisi.php?sifra=<?php echo $red->sifra; ?>">
    <i class="fas fa-trash" style="color: red;"></i>
    </a>
    <?php endif;?>
    </td>
    </tr>
    <?php endforeach;?>
    </tbody>
    </table>
    </div>

    <?php include_once "../../predlozak/podnozje.php" ?>

    <?php include_once "../../predlozak/skripte.php" ?>
  </body>
</html>