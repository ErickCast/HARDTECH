<div class="row">
	<div class="col">
		<h2 class="text-center mt-3">Registrar producto</h2>
		<hr>
		<?php
		if(isset($_SESSION["producto"]) && $_SESSION["producto"]=="complete"):
		?>

		<div class="alert alert-success">Producto registrado</div>

		<?php 
	elseif(isset($_SESSION["producto"]) && $_SESSION["producto"]=="failed"):
		?>
			<div class="alert alert-danger">No se pudo registrar el producto</div>
		<?php
			endif;
		?>
		<form action="<?=base_url?>producto/save" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="nombre">Nombre:</label>
				<input type="text" name="nombre" class="form-control" required="">
			</div>
			<div class="form-group">
				<label for="descripcion">Descripcion:</label>
				<textarea name="descripcion" class="form-control" required=""></textarea>
			</div>
			<div class="form-group">
				<label for="precio">Precio:</label>
				<input type="text" name="precio" class="form-control" required="">
			</div>
			<div class="form-group">
				<label for="stock">Stock:</label>
				<input type="number" name="stock" class="form-control" required="">
			</div>
			<div class="form-group">
				<label for="categoria">Categoria:</label>
				<select name="categoria" class="form-control" id="categoria">
					<?php 
						$categorias=Utils::getAllCategory(Database::connect());
						
							if(!empty($categorias)){
								while($categoria=mysqli_fetch_assoc($categorias)): ?>

								<option value="<?=$categoria['id']?>"><?=$categoria['nombre']?></option>


								<?php
							endwhile;

							}
						
					?>

					
				</select>
				
			</div>

			<div class="form-group">
				<label for="subcategoria">Subcategoria:</label>
				<select name="subcategoria" id="div_1" class="form-control subcategoria">
					<?php 
						$subcategorias=Utils::getAllSubcategory1(Database::connect());

						if(!empty($subcategorias)){
							while($subcategoria=mysqli_fetch_assoc($subcategorias)):?>

							<option value="<?=$subcategoria['id']?>"><?=$subcategoria['nombre']?></option>

							<?php
							endwhile;

						}
					?>
				</select>
				<select name="subcategoria" id="div_2" class="form-control subcategoria">
					<?php 
						$subcategorias=Utils::getAllSubcategory2(Database::connect());

						if(!empty($subcategorias)){
							while($subcategoria=mysqli_fetch_assoc($subcategorias)):?>

							<option value="<?=$subcategoria['id']?>"><?=$subcategoria['nombre']?></option>

							<?php
							endwhile;

						}
					?>
				</select>
				<select name="subcategoria" id="div_3" class="form-control subcategoria">
					<?php 
						$subcategorias=Utils::getAllSubcategory3(Database::connect());

						if(!empty($subcategorias)){
							while($subcategoria=mysqli_fetch_assoc($subcategorias)):?>

							<option value="<?=$subcategoria['id']?>"><?=$subcategoria['nombre']?></option>

							<?php
							endwhile;

						}
					?>
				</select>
				<select name="subcategoria" id="div_4" class="form-control subcategoria">
					<?php 
						$subcategorias=Utils::getAllSubcategory4(Database::connect());

						if(!empty($subcategorias)){
							while($subcategoria=mysqli_fetch_assoc($subcategorias)):?>

							<option value="<?=$subcategoria['id']?>"><?=$subcategoria['nombre']?></option>

							<?php
							endwhile;

						}
					?>
				</select>
			</div>

			<div class="form-group">
				<label for="imagen">Imagen:</label>
				<input type="file" name="imagen" class="form-control">
			</div>

			<input type="submit" value="Registrar Producto" class="btn btn-success" >
		</form>

		<?php 
			Utils::deleteSession("producto");

		?>
	</div>
</div>