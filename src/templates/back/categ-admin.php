<?php  //aggiungi_cat_admin(); ?>
<div class="row">
<div class="col-md-12">
<h3 class="display-5"> Gestisci le categorie</h3>
<h4 class="bg-success"><?php //mostraAvviso(); ?></h4>
</div>
</div>

<div class="row">
<div class= "col-md-6">
<table class="table table-bordered">
<thead>
  <tr>
       <th>Id</th>
       <th>Nome</th>
  </tr>
</thead>
<tbody>

<?php adminCategories(); ?>
    
</tbody>
</table>
</div>

<div class="col-md-1">
</div>

<div class="col-md-4">
<form action="" method="post">
    
        <div class="form-group">
            <label for="categoria">Crea una nuova categoria</label>
            <input name="cat_nome" type="text" class="form-control">
        </div>

        <div class="form-group">
            
            <input name="aggiungi_cat" type="submit" class="btn btn-success" value="Aggiungi">
        </div>      
    </form>
</div>
</div>