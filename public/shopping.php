<?php
require_once "../src/config.php";
require_once '../src/functions.php';

if(isset($_GET['add'])) {

    global $pdo;
    if($pdo) {

        $sql = 'SELECT * FROM `product` INNER JOIN `brand` on product.brand_product=brand.id_brand
        WHERE `id_product`=' . $_GET['add'];

        $quantityCheck = $pdo -> query($sql);
        
        while($row = $quantityCheck -> fetch()) {

            if($row['quantity_product'] > $_SESSION['product_' . $_GET['add']]) {

                $_SESSION['product_' . $_GET['add']]++;
                header("Location:shoppingCart.php?add={$_GET['add']}&edit={$_GET['add']}");
            }
            else {
                
                 createNotice("Spiacenti, sono disponibili solo {$_SESSION['product_' . $_GET['add']]}
                 {$row['name_brand']} {$row['name_product']}.");

                header("Location:shoppingCart.php?add={$_GET['add']}&edit={$_GET['add']}");
            }
                
        }
    }
    
}


if(isset($_GET['remove'])) {
    if($_SESSION['product_' . $_GET['remove']] > 0)
        $_SESSION['product_' . $_GET['remove']]--;
    else
        $_SESSION['product_' . $_GET['remove']] = 0;
    header("Location:shoppingCart.php?remove={$_GET['remove']}&edit={$_GET['remove']}");
}


if(isset($_GET['delete'])) {
    $_SESSION['product_' . $_GET['delete']] = 0;
    header("Location:shoppingCart.php?delete={$_GET['delete']}&edit={$_GET['delete']}");
}


