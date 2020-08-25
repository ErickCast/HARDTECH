<!--<link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">-->
	
	<div class="row">
    <div class="col w-75">
	<img src="../assets/img/logo.png" alt="">
    <p> <b>Cliente: </b><?= $_SESSION["usuario"]->nombre . " " . $_SESSION["usuario"]->apellidos ?></p>
    <?php if (isset($pedido)): ?>
		<h3>Datos de la venta:</h3>

		Número de venta: <?= $pedido->id ?>   <br/>
		Total a pagar: $<?= $pedido->coste ?>  <br/>
		Productos:

		<table>
			<tr>
				
				<th>Nombre</th>
				<th>Precio</th>
				<th>Unidades</th>
			</tr>
			<?php while ($producto = $productos->fetch_object()): ?>
				<tr>
					
					<td>
						<a href="<?= base_url ?>producto/ver&id=<?= $producto->id ?>"><?= $producto->nombre ?></a>
					</td>
					<td>
						<?= $producto->precio ?>
					</td>
					<td>
						<?= $producto->unidades ?>
					</td>
				</tr>
			<?php endwhile; ?>
		</table>

	<?php endif; ?>
            
            
            </div>
	</div>




