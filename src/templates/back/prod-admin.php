<h3 class="mt-5">
  Tutti i prodotti</h3>
<h4> <?php showNotice();  ?> </h4>
<table class="table table-bordered">
    <thead>
      <tr>
           <th>Id</th>
           <th>Nome</th>
           <th>Marca</th>
           <th style="width:10%">Immagine</th>
           <th>Categoria</th>
           <th>Prezzo</th>
           <th>Magazzino</th>
        
      </tr>
    </thead>
    <tbody>

    <?php
    adminProducts();
    ?>

    </tbody>
</table>


