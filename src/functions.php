<?php

function listCategories() {
    global $pdo;
    if($pdo) {
        $sql = 'SELECT * FROM `category`'; 
        $nameCateg = $pdo -> query($sql);
        while($row = $nameCateg -> fetch()) {
            $categoryLabel = <<<CATEGORY

            <a href="category.php?id={$row['id_categ']}" class="list-group-item">{$row['name_categ']}</a>
            CATEGORY;

            echo $categoryLabel;
        }
    } 
}

function listProductCard() {
    global $pdo;
    if($pdo) {
      $sql = 'SELECT * FROM `product` INNER JOIN `brand` on product.brand_product=brand.id_brand';//$sql = 'SELECT * FROM `product`';
        $infoProduct = $pdo -> query($sql);
        while($row = $infoProduct -> fetch()) {
            $productCard = <<<PRODUCT

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="product.php?id={$row['id_product']}"><img class="card-img-top" src="../src/images/{$row['image_product']}" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    {$row['name_brand']}
                  </h4>
                  <h4 class="card-title">
                    <a href="product.php?id={$row['id_product']}">{$row['name_product']}</a>
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

function singleProduct() {
  global $pdo;
    if($pdo) {
        $sql = 'SELECT * FROM `product` WHERE `id_product` = ' . $_GET['id'];
        $infoProduct = $pdo -> query($sql);
        while($row = $infoProduct -> fetch()) {
            $productCard = <<<PRODUCT

            <div class="card mt-4">
              <img class="card-img-top img-fluid" src="../src/images/{$row['image_product']}" alt="">
              <div class="card-body">
                <h3 class="card-title">{$row['name_product']}</h3>
                <h4>{$row['price_product']} €</h4>
                <p class="card-text">{$row['description_product']}</p>
                <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                4.0 stelle
              </div>
            </div> 
            PRODUCT;

            echo $productCard;
        }
    }
}
