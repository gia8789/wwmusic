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
                header('Location:shoppingCart.php');
            }
            else {
                
                 createNotice("Spiacenti, sono disponibili solo {$_SESSION['product_' . $_GET['add']]}
                 {$row['name_brand']} {$row['name_product']}.");

                header('Location:shoppingCart.php');
            }
                
        }
    }
    
}