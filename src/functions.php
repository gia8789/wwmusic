<?php

function listCategories() {
    global $pdo;
    if($pdo) {
        $sql = 'SELECT * FROM `category`'; 
        $nameCateg = $pdo -> query($sql);
        while($row = $nameCateg -> fetch()) {
            $categoryLabel = <<<CATEGORY

            <a href="index.php?filter=1&id={$row['id_categ']}" class="list-group-item text-dark"><b>{$row['name_categ']}</b></a>
            CATEGORY;

            echo $categoryLabel;
        }
    } 
}

function listBrands() {
  global $pdo;
  if($pdo) {
      $sql = 'SELECT * FROM `brand`'; 
      $nameCateg = $pdo -> query($sql);
      while($row = $nameCateg -> fetch()) {
          $categoryLabel = <<<CATEGORY

          <a href="index.php?filter=2&id={$row['id_brand']}" class="list-group-item text-dark"><b>{$row['name_brand']}</b></a>
          CATEGORY;

          echo $categoryLabel;
      }
  } 
}

// Unfiltered list and only 6 products are shown
function HomeList() {
    global $pdo;
    if($pdo) {
      $sql = 'SELECT * FROM `product` INNER JOIN `brand` on product.brand_product=brand.id_brand LIMIT 6';//$sql = 'SELECT * FROM `product`';
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
        $sql = 'SELECT * FROM `product` INNER JOIN `brand` on product.brand_product=brand.id_brand 
        WHERE `id_product`=' . $_GET['id'];

        $infoProduct = $pdo -> query($sql);
        while($row = $infoProduct -> fetch()) {
            $productCard = <<<PRODUCT

            <div class="card mt-4">
              
              <div class="card-body">
                <h3 class="card-title"><b>{$row['name_brand']} <i>{$row['name_product']}</i></b></h3>
                <h4>{$row['price_product']} €</h4>
              </div>
              <img class="card-img-top img-fluid" src="../src/images/{$row['image_product']}" alt="">
              <div class="card-body">
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


function showByCategory() {
  global $pdo;
  if($pdo) {
    $sql = 'SELECT * FROM `product` INNER JOIN `brand` on product.brand_product=brand.id_brand WHERE `categ_product`=' . $_GET['id'];
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

//All products shown by category or by brand
function listFiltered($filter = 0, $filterValue) {
  global $pdo;
  if($pdo) {
      switch($filter) {

      case 1:
      $sql = 'SELECT * FROM `product` INNER JOIN `brand` on product.brand_product=brand.id_brand
      WHERE `categ_product`=' . $filterValue;
      break;

      case 2:
      $sql = 'SELECT * FROM `product` INNER JOIN `brand` on product.brand_product=brand.id_brand
      WHERE `brand_product`=' . $filterValue;
      break;

      default:
      $sql = 'SELECT * FROM `product` INNER JOIN `brand` on product.brand_product=brand.id_brand';
      }

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
