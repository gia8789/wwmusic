<?php  updateProduct(); //--> this function will be uncommented only for real administrator 

if(isset($_GET['id']) ) {
    global $pdo;
    $sql = "SELECT * FROM `product` WHERE `id_product`='{$_GET['id']}'";
    $infoProduct = $pdo -> query($sql);

    while($row = $infoProduct -> fetch() ) {
        $actualName = $row['name_product'];
        $actualCategory = $row['categ_product'];
        $actualBrand = $row['brand_product'];
        $actualDescription = $row['description_product'];
        $actualPrice = $row['price_product'];
        $actualImage = $row['image_product'];
        $actualQuantity = $row['quantity_product'];
    }
    
}
else 
    header('Location:index.php?admin-prod');


?>


<div class="container">
    <div>
    <h3 class="page-header">Modifica un prodotto</h3>
    </div>

<form action="" method="post" enctype="multipart/form-data">
<div class="row">
<div class="col-md-5">
    <div class="form-group">
        <label for="name">Nome </label>
        <input type="text" name="name" class="form-control" value="<?php echo $actualName; ?>" >  
    </div>
    <div class="form-group">
         <label for="brand">Marche</label>
        <select name="brand"  class="form-control">
          <option value="<?php echo $actualBrand; ?>" > <?php echo brandName($actualBrand); ?> </option> 
          <?php showBrand(); ?>
        </select>
    </div>
    <div class="form-group">
        <label for="description">Descrizione</label>
            <textarea name="description"  cols="30" rows="10" maxlength="10000" class="form-control" id="editor1"><?php echo $actualDescription; ?></textarea>
            <script> CKEDITOR.replace( 'editor1' ); </script> 
    </div>
    
</div><!--end col-->

<div class="col-md-2">
</div><!--end col-->

<div class="col-md-5">

    <div class="form-group">
        <label for="price">Prezzo</label>
        <input type="number"  name="price" class="form-control" value="<?php echo $actualPrice; ?>" step=".01" min="0">
    </div>
    <div class="form-group">
         <label for="category">Categorie</label>
        <select name="category"  class="form-control">
          <option value="<?php echo $actualCategory; ?>" > <?php echo categoryName($actualCategory); ?> </option> 
          <?php showCategory(); ?>
        </select>
    </div>

    <div class="form-group">
        <label for="quantity">Quantità</label>
      <input type="number" name="quantity" class="form-control" value = "<?php echo $actualQuantity; ?>" min="0">
    </div>

    <div class="form-group">
        <label for="image">Immagine</label>
        <input type="file" name="image" value = "<?php echo $actualImage; ?>" >  
    </div>  
    
    <div class="form-group" style="margin-top:50px">
     <input type="submit" name="upd-pdt" class="btn btn-success" value="Aggiorna">
     <br><br>
     <?php showNotice(); ?>
    </div>
    

</div><!--end col-->
</div>
</form>

</div><!--contenuto-->
                



            
