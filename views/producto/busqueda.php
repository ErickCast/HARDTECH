
<?php $productos=Utils::busqueda(Database::connect(), $buscar); 
if(!empty($productos)){
?>
<h1 class="text-center mt-3 mb-3">Resultados para: <?= $buscar ?></h1>

<div class="row">

<?php while($product = mysqli_fetch_assoc($productos)): ?>
    
    <div class="col col-12 col-lg-3 col-md-4 col-sm-6">
    <div class="card" style="width: 18rem;">
<a href="<?=base_url?>producto/ver&id=<?=$product['id']?>"><img src="../<?=$product['imagen'] ?>" class="card-img-top" alt="..."></a>
<div class="card-body">
<h5 class="card-title text-center"><?=$product['nombre'] ?></h5>
    <p class="card-text precio">$<?=$product['precio'] ?></p>
 <div class="row">
  <div class="col col-8">
<a href="<?=base_url?>carrito/add&id=<?= $product['id'] ?>" class="btn btn-success">Añadir al carrito<i class="fas fa-shopping-cart"></i></a></div>
<div class="col col-4">
<a href="<?=base_url?>producto/ver&id=<?=$product['id'] ?>" class="btn btn-primary">Ver</a>
</div>
</div>
</div>
</div>

</div>




<?php

endwhile;
}elseif(mysqli_num_rows($productos)==0){?>
<h1>Sin resultados para <?= $buscar ?></h1>

    <?php
    } ?>

