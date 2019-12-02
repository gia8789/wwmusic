<?php

function listSingleValue($table,$field) {
    global $pdo;
    if($pdo) {
        $sql = 'SELECT * FROM ' . $table; 
        $nameCateg = $pdo -> query($sql);
        while($row = $nameCateg -> fetch()) {
            $categoryLabel = <<<CATEGORY

            <a href="categories.php?id={$row['id_categ']}" class="list-group-item">{$row[$field]}</a>
            CATEGORY;

            echo $categoryLabel;
        }
    } 
}

function listProductCard() {
    global $pdo;
    if($pdo) {
        $sql = 'SELECT * FROM `product`';
        $infoProduct = $pdo -> query($sql);
        while($row = $infoProduct -> fetch()) {
            $productCard = <<<PRODUCT

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="../src/images/{$row['image_product']}" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">{$row['name_product']}</a>
                  </h4>
                  <h5>{$row['price_product']} €</h5>
                  <p class="card-text">{$row['description_product']}</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>
            PRODUCT;

            echo $productCard;
        }
    }
} 