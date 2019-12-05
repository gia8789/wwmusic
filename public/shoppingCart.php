<?php
require_once '../src/config.php';
require_once '../src/functions.php';
include FRONTEND . 'header.php';


function shoppingCart() {
  global $pdo;
  if($pdo) {
      $sql = "SELECT * FROM `product` INNER JOIN `brand` on product.brand_product=brand.id_brand";
      $infoProduct = $pdo -> query($sql);
      while($row = $infoProduct -> fetch()) {
          
          $quantity = (isset($_SESSION['product_' . $row['id_product']])) ? $_SESSION['product_' . $row['id_product']] : 0;
          $amount = (isset($_SESSION['product_' . $row['id_product']])) ? $row['price_product'] * $_SESSION['product_' . $row['id_product']] : 0;
          $productTable = <<<PRODUCT_TABLE

          <tr>
          <td>{$row['name_brand']} {$row['name_product']}</td>
          <td>{$row['price_product']}</td>
          <td>{$quantity}</td>
          <td>{$amount}</td>
          <td><a class="btn btn-dark" href="shopping.php?add={$row['id_product']}" role="button">Aggiungi</a></td>
          <td><a class="btn btn-light" href="shopping.php?remove={$row['id_product']}" role="button">Rimuovi</a></td>
          <td><a class="btn btn-danger" href="shopping.php?delete={$row['id_product']}" role="button">Cancella</a> </td>
          </tr>

          PRODUCT_TABLE;
          if($quantity > 0)
            echo $productTable;
      }
  }
}

?>
 
<!-- Page Content -->
<div class="container">
<!-- /.row --> 
<h1><?php 

//if(isset($_GET['edit']))
//echo $_SESSION['product_' . $_GET['edit']]; ?></h1>
<h1 class="text-center my-5">Il tuo ordine</h1>
<h4 class="bg-danger text-center text-white"><?php showNotice(); ?></h4>
<div class="row">   
<div class="col-sm-12 col-md-10 col-lg-10 m-auto">

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
  <input type="hidden" name="cmd" value="_cart">
  <input type="hidden" name="business" value="gia878989@gmail.fake"> 
  <INPUT TYPE="hidden" name="charset" value="utf-8">
  <INPUT TYPE="hidden" NAME="currency_code" value="EUR">
    
    <table class="table table-striped">
        <thead>
         <tr>
           <th>Prodotto</th>
           <th>Prezzo</th>
           <th>Quantità</th>
           <th>Importo</th>
           <th>MODIFICA</th>
          </tr>
        </thead>
        <tbody>

        <?php shoppingCart();?>
         
        </tbody> 
    </table>
    
      <input type="hidden" name="upload">
      <input type="image" src="https://www.paypalobjects.com/it_IT/IT/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="paga subito">
      <img alt="" border="0" src="https://www.paypalobjects.com/it_IT/i/scr/pixel.gif" width="1" height="1">
      </form>
      

</form>
</div> 
</div>

<div class="row mt-5">
<div class="col-5 ">
<h2>Riepilogo ordine</h2>

<table class="table table-bordered" cellspacing="0">

<tr class="cart-subtotal">
<th>Articoli:</th>
<td><span class="amount"><?php /*echo isset ($_SESSION['quantita_art']) ?  $_SESSION['quantita_art']  : $_SESSION['quantita_art'] = '0';*/ ?> COMPLETARE</span></td>
</tr>
<tr class="shipping">
<th>Spedizione</th>
<td>Gratuita</td>
</tr>

<tr class="order-total">
<th>Totale ordine</th>
<td><strong><span class="amount">€<?php /* echo isset ($_SESSION['totale']) ?  $_SESSION['totale']  : $_SESSION['totale'] = '0'; */?> TOTALE </span></strong> </td>
</tr>

</tbody>

</table>
</div> 
</div>
 </div>

 <?php include FRONTEND . "footer.php"; ?>
<!-- </body>
</html> -->