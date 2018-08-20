
<div class="title-bar" data-responsive-toggle="izbornik" data-hide-for="medium">
  <button class="menu-icon" type="button" data-toggle="izbornik"></button>
  <div class="title-bar-title"><?php echo $nazivAPP; ?></div>
</div>


<div class="top-bar" id="izbornik" <?php echo $bojaIzbornika="" ?> style="color: #2F4F4F";>
  <div class="top-bar-left">
    <ul class="dropdown menu" data-dropdown-menu>
      <?php 
      stavkaIzbornika($putanjaAPP,"index.php","<i class=\"fas fa-home\" style=\"color: black;\"></i>");
      if(isset($_SESSION[$idAPP."o"])):
        //stavkaIzbornika($putanjaAPP,"privatno/nadzornaPloca.php","Nadzorna ploča");
        stavkaIzbornika($putanjaAPP,"privatno/korisnici/index.php","Korisnici");
        stavkaIzbornika($putanjaAPP,"privatno/tvrtka/index.php","Tvrtke");
        stavkaIzbornika($putanjaAPP,"privatno/kategorija/index.php","Kategorije");
        //stavkaIzbornika($putanjaAPP,"privatno/ERA.php","ERA dijagram");
        ?>
        <a href="https://github.com/nikola27/mojprojekt18/blob/master/ERAdijagram.png"target="_blank">ERA</a>
        <a href="https://github.com/nikola27" target="_blank">GIT</a>
        <?php
        //stavkaIzbornika($putanjaAPP,"privatno/PDO.php","PDO");
        
      endif;
      stavkaIzbornika($putanjaAPP,"onama.php","O nama");
        stavkaIzbornika($putanjaAPP,"kontakt.php","Kontakt");
      ?>  
    </ul>
  </div>
    
  <div class="top-bar-right">
    <ul class="menu">
    <?php if(isset($_SESSION[$idAPP."o"])): ?>
      <li style="width:100%; text-align: center;"><a href="<?php echo $putanjaAPP; ?>odjava.php">Odjava</a></li>
    <?php else:?>
      <li style="width:100%; text-align: center;"><a href="<?php echo $putanjaAPP; ?>prijava.php">Prijava</a></li>
    <?php endif?>
    </ul>
  </div>
</div>
