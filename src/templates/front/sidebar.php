          <!--<h3 class="my-4">Categorie</h3>-->
          
          <br>
          <a href="index.php" class="list-group-item bg-dark text-white"><b>Pagina principale</b></a>
          <div class="list-group">

            <?php 
            require_once __DIR__ . '/../../functions.php';
            listCategories(); 
            ?>

          </div>          