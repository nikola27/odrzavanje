
 <div class="grid-x">
            <div class="cell large-12">

           
            <label  <?php if(isset($greske["kategorija"])){
              echo ' class="is-invalid-label" ';
            } ?> for="kategorija">Kategorija</label>
            <select <?php if(isset($greske["kategorija"])){
              echo ' required="" class="is-invalid-input" data-invalid="" aria-invalid="true" ';
            } ?> id="kategorija" name="kategorija">
              <option value="0">Odaberi kategoriju</option>  
              <?php 
              
              $izraz = $veza->prepare("select * from kategorija order by naziv");
              $izraz->execute();
              $rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
               foreach($rezultati as $red):?>

             <option
             <?php 
             if(isset($_POST["kategorija"]) && $_POST["kategorija"]==$red->sifra){
               echo ' selected="selected" ';
             }
             ?>
              value="<?php echo $red->sifra ?>"><?php echo $red->naziv ?></option>  
            <?php endforeach;?>
              
              ?>
            </select>
            <?php if(isset($greske["kategorija"])): ?>
            <span class="form-error is-visible" id="nazivGreska">
              <?php echo $greske["kategorija"]; ?>
              </span>
              </label>
          <?php endif;?>
           

           
            </div>
          </div>

           