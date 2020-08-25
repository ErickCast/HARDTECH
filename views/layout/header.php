<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>HARDTECH</title>
	<link href="https://fonts.googleapis.com/css?family=Oranienbaum&display=swap" rel="stylesheet">
<link rel="icon" type="image/png" href="../assets/img/logo.png">
<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<script type="text/javascript" src="../assets/jQuery/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../assets/js/main.js"></script>
	<link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
	<link rel="stylesheet" type="text/css" href="../assets/fontawesome-free-5.11.2-web/css/all.css">
	<link rel="icon" type="image/png" href="assets/img/logo.png">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
	<link rel="stylesheet" type="text/css" href="assets/fontawesome-free-5.11.2-web/css/all.css">
	
	<script type="text/javascript" src="assets/jQuery/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="assets/js/main.js"></script>
	

</head>
<body>
	<div class="container-fluid" >
		<div class="row header align-items-center">
			<div class="col col-md-3 ml-3 logo">
			<a href="<?=base_url?>"><img src="assets/img/logo.png"></a>
		</div>
		<div class="col col-md-3 d-flex align-items-center categorias">
			<div class="btn btn-primary" id="categorias"><i class="fas fa-bars mr-1"></i>Categorias</div>
			
		</div>
		<div class="col col-md-5 d-flex align-items-center login ">
			
			<nav class="navbar">
			<?php if(isset($_SESSION["usuario"])): ?>
				
				<ul class="navbar-nav mr-auto">
			 <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?= $_SESSION["usuario"]->nombre . " ".$_SESSION["usuario"]->apellidos ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

          <!--<a class="dropdown-item" href="#">Mi perfil</a>
          <a class="dropdown-item" href="#">Administrar usuarios</a>
          <a class="dropdown-item" href="#">Administrar productos</a>
          <a class="dropdown-item" href="#">Administrar pedidos</a>-->
		  <?php
          	if(isset($_SESSION["admin"])):
          ?>
          <a class="dropdown-item text-dark" href="<?=base_url?>usuario/administrar">Administrar Usuarios</a>
          <a class="dropdown-item text-dark" href="<?=base_url?>producto/administrar">Administrar Productos</a>
          <a class="dropdown-item text-dark" href="<?=base_url?>categoria/administrar">Administrar Categorias</a>
        <?php endif; ?>
					<a class="dropdown-item text-dark" href="<?= base_url ?>pedido/mis_pedidos">Historial de pedidos</a>
					<a class="dropdown-item text-dark" href="<?= base_url ?>usuario/datos">Actualizar mis datos</a>

          <a class="dropdown-item text-dark" href="<?=base_url?>usuario/logout">Cerrar Sesión</a>
         

          </div>
      </li>
  </ul>

</nav>
 
  	
  

		<?php else: ?>
			<a href="<?=base_url?>usuario/login_Register" class="mr-3"><i class="fas fa-user mr-1"></i>Iniciar sesión
			</a>
		<?php endif; ?>
	
	<form class="form-inline my-2 my-lg-0" action="<?= base_url ?>producto/busqueda" method="POST">
      <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search" name="buscar">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
			<?php $stats = Utils::statsCarrito(); ?>
			<a href="<?= base_url ?>/carrito/index" class="ml-3"><i class="fas fa-shopping-cart"></i>(<?= $stats['count']; ?>)</a>
		</div>
		</div>

		<div class="row text-white lista bg-primary" id="lista">
				<div class="col col-lg-3">
				<h3><a href="#">Computadoras</a></h3>
				<ul>
				<?php 
						$subcategorias=Utils::getAllSubcategory1(Database::connect());

						if(!empty($subcategorias)){
							while($subcategoria=mysqli_fetch_assoc($subcategorias)):?>

								<li><a href="<?=base_url?>producto/mostrar&id=<?= $subcategoria['id_subcategoria'] ?>"><?=$subcategoria["subcategoria"]?></a></li>

				<?php
							endwhile;
						}

				?>

					

				</ul>
				</div>
				<div class="col col-md-3">
				<h3><a href="#">Accesorios</a></h3>
				<ul>
				<?php 
						$subcategorias=Utils::getAllSubcategory2(Database::connect());

						if(!empty($subcategorias)){
							while($subcategoria=mysqli_fetch_assoc($subcategorias)):?>

								<li><a href="<?=base_url?>producto/mostrar&id=<?= $subcategoria['id_subcategoria'] ?>"><?=$subcategoria["subcategoria"]?></a></li>

				<?php
							endwhile;
						}

				?>


					

				</ul>
				</ul>
				</div>
				<div class="col col-md-3">
				
				<h3><a href="#">Almacenamiento</a></h3>
				<ul>
				<?php 
						$subcategorias=Utils::getAllSubcategory3(Database::connect());

						if(!empty($subcategorias)){
							while($subcategoria=mysqli_fetch_assoc($subcategorias)):?>

							<li><a href="<?=base_url?>producto/mostrar&id=<?= $subcategoria['id_subcategoria'] ?>"><?=$subcategoria["subcategoria"]?></a></li>

				<?php
							endwhile;
						}

				?>



					

				</ul>
				</div>
				<div class="col col-md-3">
				<h3><a href="#">Componentes</a></h3>
				<ul>
				<?php 
						$subcategorias=Utils::getAllSubcategory4(Database::connect());

						if(!empty($subcategorias)){
							while($subcategoria=mysqli_fetch_assoc($subcategorias)):?>

								<li><a href="<?=base_url?>producto/mostrar&id=<?= $subcategoria['id_subcategoria'] ?>"><?=$subcategoria["subcategoria"]?></a></li>

				<?php
							endwhile;
						}

				?>


					

				</ul>
				</div>
			</div>
