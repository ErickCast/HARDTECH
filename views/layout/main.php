	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/img/slider1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/img/slider2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/img/slider3.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
		</div>

		<div class="row mt-4 productos">
			<div class="col col-12">
				<div class="laptops destacados">
					<h3>Computadoras destacadas</h3>
				</div>
			</div>
      <?php 
      
        $computadoras=Utils::getAllProductos_limit(Database::connect(), 1);
        if(!empty($computadoras)){
          while($computadora=mysqli_fetch_assoc($computadoras)): ?>
<div class="col col-12 col-lg-3 col-md-4 col-sm-6">
        <div class="card" style="width: 18rem;">
  <a href="<?=base_url?>producto/ver&id=<?=$computadora['id']?>"><img src="<?=$computadora['imagen']?>" class="card-img-top" alt="..."></a>
  <div class="card-body">
    <h5 class="card-title text-center"><?=$computadora["nombre"]?></h5>
        <p class="card-text precio">$<?=$computadora["precio"] ?></p>
     <div class="row">
      <div class="col col-8">
    <a href="<?=base_url?>carrito/add&id=<?= $computadora['id'] ?>" class="btn btn-success carrito" >Añadir al carrito<i class="fas fa-shopping-cart"></i></a></div>
    <div class="modal fade" id="carrito" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Producto añadido al carrito
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
    <div class="col col-4">
    <a href="<?=base_url?>producto/ver&id=<?=$computadora['id']?>" class="btn btn-primary">Ver</a>
    </div>
  </div>
  </div>
</div>
      </div>

          <?php
        endwhile;
        }

      ?>

		

		</div>

		<div class="row mt-4 productos">
			<div class="col col-12">
				<div class="accesorios destacados">
					<h3>Accesorios destacados</h3>
				</div>
      </div>
      
      <?php 
        $accesorios=Utils::getAllProductos_limit(Database::connect(), 2);
        if(!empty($accesorios)){
          while($accesorio=mysqli_fetch_assoc($accesorios)): ?>
<div class="col col-12 col-lg-3 col-md-6">
        <div class="card" style="width: 18rem;">
  <a href="<?=base_url?>producto/ver&id=<?=$accesorio['id']?>"><img src="<?=$accesorio['imagen']?>" class="card-img-top" alt="..."></a>
  <div class="card-body">
    <h5 class="card-title text-center"><?=$accesorio["nombre"]?></h5>
        <p class="card-text precio">$<?=$accesorio["precio"] ?></p>
     <div class="row">
      <div class="col col-8">
    <a href="<?=base_url?>carrito/add&id=<?= $accesorio['id'] ?>" class="btn btn-success carrito">Añadir al carrito<i class="fas fa-shopping-cart"></i></a></div>
    <div class="col col-4">
    <a href="<?=base_url?>producto/ver&id=<?=$accesorio['id']?>" class="btn btn-primary">Ver</a>
    </div>
  </div>
  </div>
</div>
      </div>

          <?php
        endwhile;
        }

      ?>
			

		</div>

		<div class="row mt-4 productos">
			<div class="col col-12">
				<div class="procesadores destacados">
					<h3>Componentes destacados</h3>
				</div>
			</div>
      <?php 
        $componentes=Utils::getAllProductos_limit(Database::connect(), 4);
        if(!empty($componentes)){
          while($componente=mysqli_fetch_assoc($componentes)): ?>
<div class="col col-12 col-lg-3 col-md-6">
        <div class="card" style="width: 18rem;">
  <a href="<?=base_url?>producto/ver&id=<?=$componente['id']?>"><img src="<?=$componente['imagen']?>" class="card-img-top" alt="..."></a>
  <div class="card-body">
    <h5 class="card-title text-center"><?=$componente["nombre"]?></h5>
        <p class="card-text precio">$<?=$componente["precio"] ?></p>
     <div class="row">
      <div class="col col-8">
    <a href="<?=base_url?>carrito/add&id=<?= $componente['id'] ?>" class="btn btn-success carrito">Añadir al carrito<i class="fas fa-shopping-cart"></i></a></div>
    <div class="col col-4">
    <a href="<?=base_url?>producto/ver&id=<?=$componente['id']?>" class="btn btn-primary">Ver</a>
    </div>
  </div>
  </div>
</div>
      </div>

          <?php
        endwhile;
        }

      ?>

		</div>