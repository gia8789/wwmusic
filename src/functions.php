<?php

// widget to filter by category
function listCategories() {
    global $pdo;
    if($pdo) {
        $sql = 'SELECT * FROM `category`'; 
        $nameCateg = $pdo -> query($sql);
        while($row = $nameCateg -> fetch()) {
            // if you select a category, its button becomes grey
            $activeButton = (isset($_GET['id']) && 
                              isset($_GET['filter']) && 
                              ($_GET['filter'] == 1) &&
                              ($row['id_categ'] == $_GET['id'])
                            ) ? 'background-color:#eeeeee' : '';
            $categoryLabel = <<<CATEGORY
            
            <a href="index.php?filter=1&id={$row['id_categ']}" class="list-group-item text-dark" 
            style={$activeButton}><b>{$row['name_categ']}</b></a>
            CATEGORY;

            echo $categoryLabel;
        }
    } 
}

// widget to filter by brand
function listBrands() {
  global $pdo;
  if($pdo) {
      $sql = 'SELECT * FROM `brand`'; 
      $nameCateg = $pdo -> query($sql);
      while($row = $nameCateg -> fetch()) {
          // if you select a brand, its button becomes grey
          $activeButton = (isset($_GET['id']) && 
                            isset($_GET['filter']) && 
                            ($_GET['filter'] == 2) &&
                            ($row['id_brand'] == $_GET['id'])
                          ) ? 'background-color:#eeeeee' : '';
          $categoryLabel = <<<CATEGORY

          <a href="index.php?filter=2&id={$row['id_brand']}" class="list-group-item text-dark" 
          style={$activeButton}>
          <b>{$row['name_brand']}</b></a>
          CATEGORY;

          echo $categoryLabel;
      }
  } 
}

// Unfiltered list in Home Page - only 6 products are shown
function HomeList() {
    global $pdo;
    if($pdo) {
        $sql = "SELECT * FROM `product` INNER JOIN `brand` on product.brand_product=brand.id_brand ORDER BY RAND() LIMIT 6";
        $infoProduct = $pdo -> query($sql);
        while($row = $infoProduct -> fetch()) {
                 
          $productCard = <<<PRODUCT
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="product.php?filter=0&id={$row['id_product']}"><img class="card-img-top" 
                src="../src/images/{$row['image_product']}" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    {$row['name_brand']} <i>{$row['name_product']}</i>
                  </h4>
                  
                </div>
                <div class="card-footer bg-white">
                  <div class="row">
                    <div class="col-lg-5">
                    <h5><b>{$row['price_product']} €</b></h5>
                    </div>
                    <div class="col-lg-7">
                    <a href="shopping.php?add={$row['id_product']}"><button type="button" class="btn btn-dark btn-small">Acquista</button></a>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-center">
                <a href="product.php?filter=0&id={$row['id_product']}" class="btn btn-outline-dark btn-small">Specifiche del prodotto</a>
                </div>
              </div>
            </div>
            PRODUCT;

          echo $productCard;
        }
    }
}

//All products shown filtered by category or by brand
function listFiltered($filter, $filterValue) {
  global $pdo;
  if($pdo) {
      //categories will send filter 1, brands will send filter 2
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
                <a href="product.php?filter=0&id={$row['id_product']}"><img class="card-img-top" 
                src="../src/images/{$row['image_product']}" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    {$row['name_brand']} <i>{$row['name_product']}</i>
                  </h4>
                  
                </div>
                <div class="card-footer bg-white">
                  <div class="row">
                    <div class="col-md-5">
                    <h5><b>{$row['price_product']} €</b></h5>
                    </div>
                    <div class="col-md-7">
                    <a href="shopping.php?add={$row['id_product']}"><button type="button" class="btn btn-dark btn-small">Acquista</button></a>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-center">
                <a href="product.php?filter=0&id={$row['id_product']}" class="btn btn-outline-dark btn-small">Specifiche del prodotto</a>
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
            
          $singleProductCard = <<<SINGLE_PRODUCT

            <div class="card mt-4">
              <div class="card-body">
                <h3 class="card-title"><b>{$row['name_brand']} <i>{$row['name_product']}</i></b></h3>
                <p class="card-text">{$row['description_product']}</p>
              </div>
              <img class="card-img-top img-fluid" src="../src/images/{$row['image_product']}" alt="">
              
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <h4><b>{$row['price_product']} €</b></h4>
                    <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                4.0 stelle
                  </div>
                  <div class="col-md-6">
                    <a href="shopping.php?add={$row['id_product']}"><button type="button" class="btn btn-dark btn-small btn-block">Acquista</button></a>
                  </div>
                  <div class="col-md-2">
                  </div>
                </div>  
              
             
                
              </div>
            </div> 
            SINGLE_PRODUCT;

          echo $singleProductCard;
        }
    }
}

//shopping.php create the notice
function createNotice($msg) {

  if(!empty($msg))
    $_SESSION['message'] = $msg;
  else
    $msg = " ";

}

//shoppingCart.php show the notice
function showNotice() {
  
  if(isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
  }
}


function login() {
  if( !isset($_POST['username']) || !isset($_POST['password'])
  || empty($_POST['username']) || empty($_POST['password']) )
          
      header('Location: loginPage.php?fail');

  // fake admin account: his operation won't be saved into the database
  if( ($_POST['username'] != 'fakeadmin') || ($_POST['password'] != 'pass') )

      header('Location: loginPage.php?fail');

  else
  {
      session_unset();
      session_destroy();
      session_start();
      $_SESSION['user'] = 'fakeadmin';

      header('Location: admin/index.php');
  }

}


function logout() {
  if(isset($_SESSION))
  {
    session_unset();
    session_destroy();
    header('Location: index.php');
  }

}


