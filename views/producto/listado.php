<h1 class="text-center mt-5">Productos</h1>
<hr>
<div class="row mt-5">

<div class="col-12 col-lg-4">

<div class="list-group">
<a class="btn btn-primary pt-4 pb-4 border border-bottom-dark" data-toggle="collapse" href="#computadoras" role="button" aria-expanded="false" aria-controls="collapseExample">
    Computadoras
  </a>
  <div class="collapse" id="computadoras">
  <div class="card card-body">
   <ul>
        <?php 
            $subcategorias=Utils::getAllSubcategory1(Database::connect());

            if(!empty($subcategorias)){
              while($subcategoria=mysqli_fetch_assoc($subcategorias)):?>

                <a href="<?=base_url?>producto/mostrar&id=<?= $subcategoria['id_subcategoria'] ?>" class="list-group-item list-group-item-action"><?=$subcategoria["subcategoria"]?></a>

        <?php
              endwhile;
            }

        ?>

          

        </ul>
  </div>
</div>
 <a class="btn btn-primary pt-4 pb-4 border border-bottom-dark" data-toggle="collapse" href="#accesorios" role="button" aria-expanded="false" aria-controls="collapseExample">
    Accesorios
  </a>
  <div class="collapse" id="accesorios">
  <div class="card card-body">
  <ul>
        <?php 
            $subcategorias=Utils::getAllSubcategory2(Database::connect());

            if(!empty($subcategorias)){
              while($subcategoria=mysqli_fetch_assoc($subcategorias)):?>

<a href="<?=base_url?>producto/mostrar&id=<?= $subcategoria['id_subcategoria'] ?>" class="list-group-item list-group-item-action"><?=$subcategoria["subcategoria"]?></a>

        <?php
              endwhile;
            }

        ?>

          

        </ul>
  </div>
</div>
 <a class="btn btn-primary pt-4 pb-4 border border-bottom-dark" data-toggle="collapse" href="#almacenamiento" role="button" aria-expanded="false" aria-controls="collapseExample">
    Almacenamiento
  </a>
  <div class="collapse" id="almacenamiento">
  <div class="card card-body">
   <ul>
        <?php 
            $subcategorias=Utils::getAllSubcategory3(Database::connect());

            if(!empty($subcategorias)){
              while($subcategoria=mysqli_fetch_assoc($subcategorias)):?>

<a href="<?=base_url?>producto/mostrar&id=<?= $subcategoria['id_subcategoria'] ?>" class="list-group-item list-group-item-action"><?=$subcategoria["subcategoria"]?></a>

        <?php
              endwhile;
            }

        ?>

          

        </ul>
  </div>
</div>
 <a class="btn btn-primary pt-4 pb-4 border border-bottom-dark" data-toggle="collapse" href="#componentes" role="button" aria-expanded="false" aria-controls="collapseExample">
    Componentes
  </a>
  <div class="collapse" id="componentes">
  <div class="card card-body">
   <ul>
        <?php 
            $subcategorias=Utils::getAllSubcategory4(Database::connect());

            if(!empty($subcategorias)){
              while($subcategoria=mysqli_fetch_assoc($subcategorias)):?>

<a href="<?=base_url?>producto/mostrar&id=<?= $subcategoria['id_subcategoria'] ?>" class="list-group-item list-group-item-action"><?=$subcategoria["subcategoria"]?></a>

        <?php
              endwhile;
            }

        ?>

          

        </ul>
  </div>
</div>
</div>
</div>
<div class="col-12 col-lg-8">
  <div class="row">
<?php 
$products=Utils::getProducts(Database::connect(), $id);
if(!empty($products)){
while($product=mysqli_fetch_assoc($products)): ?>

    
    <div class="col-12 col-md-6 col-lg-4">
    <div class="col col-12 col-lg-3 col-md-4 col-sm-6">
    <div class="card" style="width: 18rem;">
<a href="<?=base_url?>producto/ver&id=<?=$product['id']?>"><img src="../<?=$product['imagen']?>" class="card-img-top" alt="..."></a>
<div class="card-body">
<h5 class="card-title text-center"><?=$product['nombre']?></h5>
    <p class="card-text precio">$<?=$product['precio']?></p>
 <div class="row">
  <div class="col col-8">
<a href="<?=base_url?>carrito/add&id=<?= $product['id'] ?>" class="btn btn-success">Añadir al carrito<i class="fas fa-shopping-cart"></i></a></div>
<div class="col col-4">
<a href="<?=base_url?>producto/ver&id=<?=$product['id']?>" class="btn btn-primary">Ver</a>
</div>
</div>
</div>
</div>
    </div>


</div>
<?php 
endwhile;
}
if(mysqli_num_rows($products)==0):
?>
<div class="col col-12 text-center">  <h1>No se encontraron productos disponibles</h1>   </div>

  
    <?php
      endif;
    ?>
</div>

</div>

</div>
