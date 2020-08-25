<div class="row mt-5 sesion">
	<div class="col col-12 col-md-6">
		<h2>Iniciar Sesión</h2>
		<form action="<?=base_url?>usuario/login" method="POST">
			<?php
			if(isset($_SESSION["error_login"])):
			?>
			<div class="alert alert-danger"><?=$_SESSION["error_login"]?></div>
		<?php endif;
			?>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" name="email" class="form-control">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" class="form-control">
			</div>

			<input type="submit" value="Iniciar Sesión" class="btn btn-success">
		</form>
	</div>
	<div class="col col-12 col-md-6">
		<h2>Registrarse</h2>
		<form action="<?=base_url?>usuario/save" method="POST">
			<?php
			if(isset($_SESSION["register"]) && $_SESSION["register"]=="El usuario ha sido registrado"){
		?>
			<div class="alert alert-success mt-3"><?=$_SESSION["register"]?></div>

		<?php
	}elseif(isset($_SESSION["register"]) && $_SESSION["register"]=="No se pudo registrar al usuario, alguno de los campos no es valido"){
		?>
		<div class="alert alert-danger mt-3"><?=$_SESSION["register"]?></div>

		<?php
	}
		?>
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control">
				
			</div>
			<div class="form-group">
				<label for="apellidos">Apellido</label>
				<input type="text" name="apellido" class="form-control">
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" name="email" class="form-control">
			</div>
			<div class="form-group">
				<label for="password">Contraseña</label>
				<input type="password" name="password" class="form-control">
			</div>

			<div class="form-group ">
			<label for="estado">Estado en el que resides</label>

            <input type="text" name="estado" id="" class="form-control">
            
        </div>
        <div class="form-group ">

		<label for="municipio">Municipio</label>
            <input type="text" name="municipio" id="" class="form-control">
           
		</div>
		<div class="form-group">
		<label for="domicilio">Domicilio</label>
            <input type="text" name="domicilio" id="" class="form-control">
           
        </div>





















			<input type="submit" class="btn btn-success" value="Registrarse">
		</form>
	</div>
</div>





<?php Utils::deleteSession("register"); ?>
<?php Utils::deleteSession("error_login"); ?>