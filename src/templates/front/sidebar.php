            
          <br>
          <span class="list-group-item bg-dark text-white"><b>Filtra per categoria</b></span>
          <a href="index.php?filter=0&id=0" class="list-group-item text-dark"><b>Tutte le categorie</b></a>
          <div class="list-group">

            <?php 
            require_once __DIR__ . '/../../functions.php';
            listCategories(); 
            ?>

          </div> 
          
          
          <span class="list-group-item bg-dark text-white" style="margin-top:50px"><b>Filtra per marca</b></span>
          <a href="index.php?filter=0&id=0" class="list-group-item text-dark"><b>Tutte le marche</b></a>
          <div class="list-group">

            <?php 
            require_once __DIR__ . '/../../functions.php';
            listBrands(); 
            ?>

          </div>