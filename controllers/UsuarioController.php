<?php
require_once "models/usuario.php";
class UsuarioController{
	public function login_Register(){
		require_once "views/usuario/registro.php";
	}
	public function datos(){

		
		require_once "views/usuario/datos.php";
	}

	public function save(){
		if($_POST){
			//Recogiendo valores del formulario
		$nombre=isset($_POST["nombre"]) ? $_POST["nombre"] : false;
		$apellido=isset($_POST["apellido"]) ? $_POST["apellido"] : false;;
		$email=isset($_POST["email"]) ? $_POST["email"] : false;
		$password=isset($_POST["password"]) ? $_POST["password"] : false;
		$estado=isset($_POST["estado"]) ? $_POST["estado"] : false;
		$municipio=isset($_POST["municipio"]) ? $_POST["municipio"] : false;
		$domicilio=isset($_POST["domicilio"]) ? $_POST["domicilio"] : false;



		//creando un array de errores
		$errores=array();

		//Validando formulario
		if(empty($nombre) && is_numeric($nombre) && preg_match("/[0-9]/", $nombre)){
			$errores["nombre"]="El nombre no es valido";
		}
		if(empty($apellido) && is_numeric($apellido) && preg_match("/[0-9]/", $apellido)){
			$errores["apellido"]="El apellido no es valido";
		}
		
		if(empty($email)){
			$errores["email"]="El email no es valido";
		}
		if(empty($password)){
			$errores["password"]="La contraseña no es valida";
		}
		if(empty($domicilio)){
			$errores["domicilio"]="El domicilio no puede quedar vacio";
		}

		if(count($errores)==0){


		if($nombre && $apellido && $email && $password){

			$usuario=new Usuario();
			$usuario->setNombre($nombre);
			$usuario->setApellido($apellido);
			$usuario->setEmail($email);
			$usuario->setPassword($password);
			$usuario->setEstado($estado);
			$usuario->setMunicipio($municipio);
			$usuario->setDomicilio($domicilio);



			$save=$usuario->save();
			
			if($save){
				$_SESSION["register"]="El usuario ha sido registrado";
			}else{
				$_SESSION["register"]="No se pudo registrar al usuario, alguno de los campos no es valido";
			}

		}else{
			$_SESSION["register"]="No se pudo registrar al usuario, alguno de los campos no es valido";
		}
	}else{
		$_SESSION["register"]="No se pudo registrar al usuario, alguno de los campos no es valido";
		
	}

		header("Location: ".base_url."usuario/login_Register");
		

	}
}

	public function login(){
		if(isset($_POST)){
		$email=$_POST["email"];
		$password=$_POST["password"];

		$usuario=new Usuario();
		$usuario->setEmail($email);
		$usuario->setPassword($password);

		$identity=$usuario->login();

		if($identity && is_object($identity)){
			$_SESSION["usuario"]=$identity;

			if($identity->rol=="admin"){
				$_SESSION["admin"]=true;

			}
			header("Location: ". base_url);
		}else{
			$_SESSION["error_login"]="Identificación errónea";
			header("Location: ". base_url."usuario/login_Register");
		}

		
		}
		

	}

	public function logout(){
		if(isset($_SESSION["usuario"])){
			unset($_SESSION["usuario"]);
		}

		if(isset($_SESSION["admin"])){
			unset($_SESSION["admin"]);
		}
		header("Location: ". base_url);
	}
	public function actualizar(){
		if($_POST){
			//Recogiendo valores del formulario
		$nombre=isset($_POST["nombre"]) ? $_POST["nombre"] : false;
		$apellido=isset($_POST["apellido"]) ? $_POST["apellido"] : false;
		$password=isset($_POST["password"]) ? $_POST["password"] : false;
		
		$estado=isset($_POST["estado"]) ? $_POST["estado"] : false;
		$municipio=isset($_POST["municipio"]) ? $_POST["municipio"] : false;
		$domicilio=isset($_POST["domicilio"]) ? $_POST["domicilio"] : false;



		//creando un array de errores
		$errores=array();

		//Validando formulario
		if(empty($nombre) && is_numeric($nombre) && preg_match("/[0-9]/", $nombre)){
			$errores["nombre"]="El nombre no es valido";
		}
		if(empty($apellido) && is_numeric($apellido) && preg_match("/[0-9]/", $apellido)){
			$errores["apellido"]="El apellido no es valido";
		}
		
		
		if(empty($password)){
			$errores["password"]="La contraseña no es valida";
		}
		if(empty($domicilio)){
			$errores["domicilio"]="El domicilio no puede quedar vacio";
		}

		if(count($errores)==0){


		if($nombre && $apellido && $estado && $municipio && $domicilio && $password){

			$usuario=new Usuario();
			$usuario->setNombre($nombre);
			$usuario->setApellido($apellido);
			
			$usuario->setPassword($password);
			$usuario->setEstado($estado);
			$usuario->setMunicipio($municipio);
			$usuario->setDomicilio($domicilio);



			$save=$usuario->update();
			
			if($save){
				$_SESSION["update"]="Datos actualizados correctamente";
			}else{
				$_SESSION["update"]="No se pudo actualizar al usuario, alguno de los campos no es valido";
				
			}

		}else{
			$_SESSION["update"]="No se pudo actualizar al usuario, alguno de los campos no es valido"; 
		}
	}else{
		$_SESSION["update"]="No se pudo actualizar al usuario, alguno de los campos no es valido"; 
	}

		header("Location: ".base_url."usuario/datos");
		

	}
}
	}



?>