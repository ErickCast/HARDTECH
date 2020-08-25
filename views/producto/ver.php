<?php if (isset($product)): ?>
	

<div class="container">
	<div class="row">
		<div class="col col-md-6">
			<img src="../<?= $product->imagen ?>" style="width: 500px;">
		</div>
		<div class="col col-md-6">
			<h1><?=$product->nombre?></h1>
			
			<br>
			<p><?=$product->descripcion?></p>
			<h3 class="precio" style="color: green;" >$<?=$product->precio?></h3>
			
			<a href="<?=base_url?>carrito/add&id=<?= $product->id ?>" class="btn btn-success">Agregar al carrito<i class="fas fa-shopping-cart"></i></a>
		</div>
	</div>
</div>

<?php endif; ?>