<?php  addProduct(); //---> this function will be uncommented only for real administrator; 

?>

<div class="container">
    <div>
    <h3 class="page-header">Aggiungi un nuovo prodotto</h3>
    </div>

<form action="" method="post" enctype="multipart/form-data">
<div class="row">
<div class="col-md-5">
    <div class="form-group">
        <label for="name">Nome </label>
        <input type="text" name="name" class="form-control">  
    </div>
    <div class="form-group">
         <label for="brand">Marche</label>
        <select name="brand"  class="form-control">
          <option value="">Seleziona</option> 
          <?php showBrand(); ?>
        </select>
    </div>
    <div class="form-group">
        <label for="description">Descrizione</label>
        <textarea name="description"  cols="30" rows="10" class="form-control" id="editor1"></textarea>
     <!-- <script> CKEDITOR.replace( 'editor1' ); </script> -->
    </div>
    
</div><!--end col-->

<div class="col-md-2">
</div><!--end col-->

<div class="col-md-5">

    <div class="form-group">
        <label for="price">Prezzo</label>
        <input type="number"  name="price" class="form-control"  step=".01" min="0">
    </div>
    <div class="form-group">
         <label for="category">Categorie</label>
        <select name="category"  class="form-control">
          <option value="">Seleziona</option> 
          <?php showCategory(); ?>
        </select>
    </div>

    <div class="form-group">
        <label for="quantity">Quantità</label>
      <input type="number" name="quantity" class="form-control" min="0">
    </div>

    <div class="form-group">
        <label for="image">Immagine</label>
        <input type="file" name="image">  
    </div>  
    
    <div class="form-group" style="margin-top:50px">
     <input type="submit" name="add-pdt" class="btn btn-success" value="Aggiungi">
     <br><br>
     <?php showNotice(); ?>
    </div>

</div><!--end col-4-->
</div>
</form>

</div>
                



            
