<?php

///////////////////////////
////  BACKEND  ////

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
        $sql = "SELECT * FROM `product` INNER JOIN `brand` on product.brand_product=brand.id_brand ORDER BY RAND() LIMIT 3";
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
                    <span >&#9734; &#9734; &#9734; &#9734; &#9734;</span>
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


///////////////////////////
////  BACKEND  ////

/* only a fake administrator account can login at the moment!
his operation won't be saved into the database */
function login() {
  if( !isset($_POST['username']) || !isset($_POST['password'])
  || empty($_POST['username']) || empty($_POST['password']) )
          
      header('Location: loginPage.php?fail');

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
  if(isset($_SESSION['user']))
  {
    session_unset();
    session_destroy();
    header('Location: index.php');
  }

}


function adminProducts(){
  global $pdo;
  $sql = "SELECT * FROM `product` INNER JOIN `category` ON `categ_product`=`id_categ`
  INNER JOIN `brand` ON `brand_product`=`id_brand`";
  $infoProduct = $pdo -> query($sql);

   while($row = $infoProduct -> fetch()) {
  
    $idDel = $row['id_product'];

    echo"<div class='modal fade' id=\"confirm{$row['id_product']}\" tabindex='-1' role='dialog' 
         aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog' role='document'>
              <div class='modal-content'>
                <div class='modal-header' >
                    <h4 class='modal-title' style='text-align: center;' id='exampleModalLabel'>Elimina prodotto</h4>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>
                  <div class='modal-body'>
                    <form action='#' method='POST'>
                    Sei sicuro di voler eliminare questo prodotto? 
                  <center><input type='text' class='form-control' style='text-align: center' name='idDel' 
                  value=\"{$row['brand_product']}-{$row['name_product']}\" size='1' readonly>
                  </center>  
                  </div>
                  <div class='modal-footer'>
                    <button type='button' class='btn btn-dark' data-dismiss='modal'>Annulla</button>
                    <button type='submit' class='btn btn-danger'>Conferma</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>";

    $product = <<< PRODUCT
    
    

    <tr>
    <td>{$row['id_product']}</td>
    <td>{$row['name_product']}</td>
    <td>{$row['name_brand']}</td>
    <td><img src="../../src/images/{$row['image_product']}" alt="" style="width:100%"></td>
    <td>{$row['name_categ']}</td>
    <td>€{$row['price_product']}</td>
    <td>{$row['quantity_product']}</td>
    <td><a class="btn btn-warning" href="index.php?update-pdt&id={$row['id_product']}" role="button">Modifica</a>
    <td><button type='button' class='btn btn-danger' data-toggle='modal' data-target="#confirm{$row['id_product']}">Elimina</button> </td>
    </tr>
    
    PRODUCT;
    echo  $product;
  }
}


function showBrand() {
  global $pdo;

  $sql = "SELECT * FROM `brand`";
  $infoProduct = $pdo -> query($sql);
  
  while($row = $infoProduct -> fetch()) {
  
    $brand = <<< BRAND
    <option value="{$row['id_brand']}">{$row['name_brand']}</option>
  BRAND;
  echo $brand;
  
  }
}

function showCategory() {
  global $pdo;

  $sql = "SELECT * FROM `category`";
  $infoProduct = $pdo -> query($sql);
  
  while($row = $infoProduct -> fetch()) {
  
    $category = <<< CATEGORY
    <option value="{$row['id_categ']}">{$row['name_categ']}</option>
  CATEGORY;
  echo $category;
  
  }
}


function adminCategories(){
  global $pdo;
  $sql = "SELECT * FROM `category`";
  $categInfo = $pdo -> query($sql);
  
  while($row = $categInfo -> fetch() ){
  
    $category = <<<CATEGORY
    <tr>
    
    <td style="width:25%">{$row['id_categ']}</td>
    <td style="width:50%">{$row['name_categ']}</td>
    <td style="width:25%"><a class="btn btn-danger" href="" role="button">Cancella</a> </td>
    </tr>
    
    CATEGORY;
  
    echo $category;
  }
}

// if you give its name you get the id
function categoryId($name) {
  global $pdo;
  $sql = "SELECT * FROM `category` WHERE `name_categ`='$name'";
  $categId = $pdo -> query($sql);
  
  
  while($row = $categId -> fetch() )
      return $row['id_categ'];
  
}

//if you give its name you get the id
function brandId($name) {
  global $pdo;
  $sql = "SELECT * FROM `brand` WHERE `name_brand`='$name'";
  $brandId = $pdo -> query($sql);
  
  
  while($row = $brandId -> fetch() )
      return $row['id_brand'];
  
}

// if you give its id you get the name
function categoryName($id) {
  global $pdo;
  $sql = "SELECT * FROM `category` WHERE `id_categ`='$id'";
  $categName = $pdo -> query($sql);
    
  while($row = $categName -> fetch() )
      return $row['name_categ'];
  
}

// if you give its id you get the name
function brandName($id) {
  global $pdo;
  $sql = "SELECT * FROM `brand` WHERE `id_brand`='$id'";
  $brandName = $pdo -> query($sql);
    
  while($row = $brandName -> fetch() )
      return $row['name_brand'];
  
}

// if you give its id you get the name
function productName($id) {
  global $pdo;
  $sql = "SELECT * FROM `product` WHERE `id_product`='$id'";
  $productName = $pdo -> query($sql);
    
  while($row = $productName -> fetch() )
      return $row['name_product'];
  
}

// if you give the product id you get the name of its image
function imageOfProduct($id) {
  global $pdo;
  $sql = "SELECT * FROM `product` WHERE `id_product`='$id'";
  $productImage = $pdo -> query($sql);
    
  while($row = $productImage -> fetch() )
      return $row['image_product'];
  
}

//upload the new image
function uploadImg( $image, $imageTemp, $previous=false ) {
  $failure = false;

  if($image && $imageTemp){
    if(move_uploaded_file($imageTemp , IMG_UPLOADS . '/' . $image))
      $uploadMsg = "L'immagine e' stata caricata.<br>";
    else{
      $uploadMsg = "Errore nel caricamento della nuova immagine<br>";
      $failure = true;
    }
  }
  else {
    if($previous)
      $uploadMsg = "";
    else
      $uploadMsg = "Non e' stata inserita alcuna immagine<br>";
  }

  return ['failure'=>$failure , 'msg'=> $uploadMsg];
}

// the old image gets deleted
function deletePreviousImg($image) {
  if($image) {
    if(!unlink(IMG_UPLOADS . '/' . $image))
      $imgMsg = "Errore. La vecchia immagine $image' ancora presente.<br>";
    else
      $imgMsg = "La vecchia immagine e' stata eliminata.<br>";
  } 
  else
      $imgMsg = "Questo prodotto non aveva un'immagine.<br>";

  return $imgMsg;
}

// modal dialog
function confirmDialog(/*$operation*/) {
  echo"<div class='modal fade' id='confirm' tabindex='-1' role='dialog' 
            aria-labelledby='exampleModalLabel' aria-hidden='true'>
                    <div class='modal-dialog' role='document'>
                      <div class='modal-content'>
                        <div class='modal-header' style='background-color:#2a4b7c'>
                          <h4 class='modal-title' style='padding-left:140px; color:#ffffff;' id='exampleModalLabel'>Elimina prodotto</h4>
                          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                          </button>
                        </div>
                        <div class='modal-body'>
                         <form action='#' method='POST'>
                         Sei sicuro di voler eliminare questo prodotto? 
                        <center><input type='text' class='form-control' style='max-width:50px' name='idDel' 
                        value='' size='1' readonly>
                        </center>  
                        </div>
                        <div class='modal-footer'>
                          <button type='button' class='btn btn-secondary' data-dismiss='modal'>Annulla</button>
                          <button type='submit' class='btn btn-primary'>Si</button>
                         </form>
                        </div>
                      </div>
                    </div>
                  </div>";
}


function addProduct(){
  if(isset($_POST['add-pdt'])){
  
    global $pdo;
    $name = $_POST['name'];
    // we must insert category->id and brand->id in `product` table, not their names
    $brand = $_POST['brand'];
    $category = $_POST['category'];
    $description = ($_POST['description']) ? $_POST['description'] : null;
    $price = ( $_POST['price'] && ($_POST['price'] >= 0) ) ? $_POST['price'] : 0;
    // each image has a univocal name because of adding time() to its name
    $image = ($_FILES['image']['name']) ? time() . $_FILES['image']['name'] : null;
    $imageTemp = ($_FILES['image']['tmp_name']) ? $_FILES['image']['tmp_name'] : null;
    $quantity = ( $_POST['quantity'] && ($_POST['quantity'] >= 0) ) ? $_POST['quantity'] : 0;

    //$upload contains a boolean and a message about the information of the upload
    // the function will be executed even we don't insert an image
    $upload = uploadImg($image, $imageTemp);

    // if the image file is submitted but its upload fails, query won't be executed because we don't want to save the name of an image that doesn't exist
    if(!$upload['failure']) {
      $sql = "INSERT INTO `product`(name_product , brand_product , categ_product , 
      description_product , price_product , quantity_product , image_product ) 
      VALUES('{$name}' , '{$brand}' , '{$category}' , '{$description}' , '{$price}' , '{$quantity}' , '{$image}' )";
      
      $insertProd = $pdo -> query($sql);
    }
        
    if($insertProd)      
      createNotice('<b>Il prodotto ' . $_POST['brand'] . ' ' . $name . ' e\' stato aggiunto.<br>' . $upload['msg'] . '</b>');
    else
      createNotice('<b>Inserimento fallito.<br>' . /* $upload['msg'] . */ '</b>');    
    
  }
  
}


function updateProduct(){
  if(isset($_POST['upd-pdt'])){
  
    global $pdo;
    $name = ( $_POST['name'] && !empty($_POST['name']) ) ? $_POST['name'] : productName($_GET['id']);
    // we must insert category->id and brand->id in `product` table, not their names
    $brand = $_POST['brand'];
    $category = $_POST['category'];
    $description = ($_POST['description']) ? $_POST['description'] : null;
    $price = ( $_POST['price'] && ($_POST['price'] >= 0) ) ? $_POST['price'] : 0;
    // save the name of the previous image to delete it from its folder after the update
    $previousImg = (imageOfProduct($_GET['id'])) ? imageOfProduct($_GET['id']) : null;
    // each image has a univocal name because of adding time() to its name
    $image = ($_FILES['image']['name']) ? time() . $_FILES['image']['name'] : $previousImg;
    $imageTemp = ($_FILES['image']['tmp_name']) ? $_FILES['image']['tmp_name'] : null;
    $quantity = ( $_POST['quantity'] && ($_POST['quantity'] >= 0) ) ? $_POST['quantity'] : 0;

    //$upload contains a boolean and a message about the information of the upload
    // the function will be executed even we don't insert an image
    $upload = uploadImg($image, $imageTemp, $previousImg);

    // if the new image is submitted but its upload fails, query won't be executed
    if(!$upload['failure']) {
      $sql = "UPDATE `product` SET `name_product` = '{$name}' ,  `categ_product` =  '{$category}' , `brand_product` = '{$brand}' ,
      `description_product` =  '{$description}' , `price_product` =  '{$price}' , `image_product` = '{$image}' ,
      `quantity_product` =  '{$quantity}' WHERE  `id_product` = {$_GET['id']}";

      $updateProd = $pdo -> query($sql);
    }
       
    if($updateProd){
      //if you don't insert a new image, the old remains, if it exists
      if($image == $previousImg)
        $delImg = "";
      else
        // $imgMsg notice the failure of deletePreviousImg
        $delImg = deletePreviousImg($previousImg);
      
      createNotice('<b>Il prodotto ' . brandName($_POST['brand']) . ' ' . $name . ' e\' stato aggiornato.<br>' 
      . $delImg . $upload['msg'] . '</b>');
    }
    else
      createNotice("<b>Aggiornamento fallito.<br>" . /* $upload['msg'] . */ "</b>");    
    
  }

}

/*
function deleteProduct(){

}*/

/*
function addBrand(){

}*/

/*
function editBrand(){

}*/

/*
function deleteBrand(){

}*/

/*
function addCategory(){

}*/

/*
function editCategory(){

}*/

/*
function deleteCategory(){

}*/        