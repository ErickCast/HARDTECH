<div class="row">
    <div class="col">
    <h2 class="text-center mt-3 mb-3">Actualizar mis datos</h2>
        <form action="<?= base_url ?>usuario/actualizar" method="post">
        
		
			<?php
            if(isset($_SESSION["update"]) && $_SESSION["update"]=="Datos actualizados correctamente"){
		?>
			<div class="alert alert-success mt-3"><?=$_SESSION["update"]?></div>

		<?php
    }elseif(isset($_SESSION["update"]) && $_SESSION["update"]=="No se pudo actualizar al usuario, alguno de los campos no es valido"){
		?>
		<div class="alert alert-danger mt-3"><?=$_SESSION["update"]?></div>

		<?php
	}
		?>
    <div class="form-group">
				<label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="<?= $_SESSION['usuario']->nombre ?>">
				
			</div>
			<div class="form-group">
				<label for="apellidos">Apellido</label>
				<input type="text" name="apellido" class="form-control" value="<?= $_SESSION['usuario']->apellidos ?>">
			</div>
			
			<div class="form-group">
				<label for="password">Contraseña</label>
				<input type="password" name="password" class="form-control" >
			</div>

			<div class="form-group ">
			<label for="estado">Estado en el que resides</label>

            <input type="text" name="estado" id="" class="form-control" value="<?= $_SESSION['usuario']->estado ?>">
            
        </div>
        <div class="form-group ">

		<label for="municipio">Municipio</label>
            <input type="text" name="municipio" id="" class="form-control" value="<?= $_SESSION['usuario']->ciudad ?>">
           
		</div>
		<div class="form-group">
		<label for="domicilio">Domicilio</label>
            <input type="text" name="domicilio" id="" class="form-control" value="<?= $_SESSION['usuario']->domicilio ?>">
           
        </div>





















            <input type="submit" class="btn btn-success" value="Registrarse">
            
            </form>
    </div>
</div>
<?php Utils::deleteSession("update"); ?>