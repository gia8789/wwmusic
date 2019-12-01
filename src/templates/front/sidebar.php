          <h1 class="my-4">Cerca</h1>
          <div class="list-group">

            <?php 
            $sql = 'SELECT * FROM `category`'; 
            $nameCateg = $pdo -> query($sql);
            while($row = $nameCateg -> fetch()) 
                echo '<a href="#" class="list-group-item">' . $row['name_categ'] . '</a>';
            ?>
            
          </div>