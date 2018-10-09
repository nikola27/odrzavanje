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

<a href="novi.php" class="success button expanded" style= "background-color: red; font-size:1em; font-weight:bold; color:white;"; >Dodaj kvar</a>
  <?php



//izbor kategorije potreban
 $izraz = $veza->prepare("
      select a.sifra, a.naziv as kvarovi, a.opis,
      b.naziv as kategorija, a.datum from 
      kvar a inner join kategorija b 
      on a.kategorija=b.sifra
      group by a.sifra, a.naziv, a.datum
      order by a.datum desc
        ");
 $izraz->execute();
 $rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
 ?>
 
 
 <div class="cell large-6">
  <table class="responsive-card-table unstriped">

    <thead>
    <tr>
    <th>Naziv</th>
    <th>Opis</th>
    <th>Kategorija</th>
    <th>Datum</th>
    <th>Akcija</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($rezultati as $red):?>
      <tr>
      <td data-label="Naziv"><?php echo $red->kvarovi; ?></td>
      <td data-label="Opis"><?php echo $red->opis; ?></td>
      <td data-label="Kategorija"><?php echo $red->kategorija; ?></td>
      <td data-label="Datum"><?php echo $red->datum; ?></td>
      <td data-label="Akcija">
      
      <a href="promjena.php?sifra=<?php echo $red->sifra; ?>">
      <i class="fas fa-edit fa"></i> 
      </a>
      <?php if($red->kvarovi==0): ?>
      <a onclick="return confirm('Sigurno obrisati <?php echo $red->kvarovi ?>')" href="obrisi.php?sifra=<?php echo $red->sifra; ?>">
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
