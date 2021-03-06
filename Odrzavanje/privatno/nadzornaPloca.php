
<?php include_once "../konfiguracija.php" ;
if(!isset($_SESSION[$idAPP."o"])){
  header("location: " . $putanjaAPP . "odjava.php");
}
?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <?php include_once "../predlozak/head.php" ?>
  </head>
  <body>
    <div class="grid-container">
      
    <?php include_once "../predlozak/zaglavlje.php" ?>

    <?php include_once "../predlozak/izbornik.php" ?>


  	<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto">
</div>




 <?php include_once "../predlozak/podnozje.php" ?>
  </div>
  
    
    

   <?php include_once "../predlozak/podnozje.php" ?>
  <?php include_once "../predlozak/skripte.php" ?>
  <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script>
  Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Broj kvarova po kategorijama'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y}</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.y}',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'kvar',
        colorByPoint: true,
        data: 
          <?php 
            
            $izraz = $veza->prepare("
 
            select count(a.sifra)as y,
            b.naziv as name
             from kvar a left join kategorija b on a.kategorija=b.sifra group by kategorija
  ");
  $izraz->execute();
 $rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($rezultati, JSON_NUMERIC_CHECK);
            ?>
         
    }]
});
</script> 
    

    <?php include_once "../predlozak/podnozje.php" ?>

    <?php include_once "../predlozak/skripte.php" ?>
  </body>
</html>