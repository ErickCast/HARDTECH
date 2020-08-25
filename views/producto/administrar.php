<div class="container">
	<div class="row mt-5">
		<div class="col">
			<a href="<?=base_url?>producto/crear" class="btn btn-primary mb-3">Agregar nuevo producto</a>
			<table class="table table-bordered">
				<tr>
					<th>ID</th>

					<th>NOMBRE</th>
					
					<th>PRECIO</th>
					<th>STOCK</th>
					<th>ACCIONES</th>
					
				</tr>
				<?php
				$productos=Utils::getAllProductos(Database::connect());

				if(!empty($productos)){
					while($producto=mysqli_fetch_assoc($productos)):?>
					<tr>
						<td><?=$producto["id"]?></td>
					<td><?=$producto["nombre"]?></td>
					<td><?= $producto["precio"] ?></td>
					<td><?= $producto["stock"] ?></td>
					<td><a href="<?=base_url?>producto/edit.php&id=<?= $producto['id'] ?>" class="btn btn-warning">Editar</a><a href="<?=base_url?>producto/delete.php?id=<?= $producto['id'] ?>" class="btn btn-danger">Eliminar</a></td>

					</tr>

					


					<?php
				endwhile;
				} 

				?>
				
			</table>
		</div>
	</div>
</div>