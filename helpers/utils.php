<?php

class Utils{

public static function showError($errores, $campo){
	$alerta="";

	if(isset($errores[$campo]) && !empty($campo)){
		$alerta="<div class='alert alert-danger'>" . $errores[$campo] . "</div>";
	}

	return $alerta;
}

public static function deleteSession($name){
		if(isset($_SESSION[$name])){
			$_SESSION[$name]=null;
			unset($_SESSION[$name]);


		}
		return $name;
	}


	public static function isIdentity(){
		if(!isset($_SESSION['usuario'])){
			header("Location:".base_url);
		}else{
			return true;
		}
	}


public static function isAdmin(){
		if(!isset($_SESSION["admin"]) || !isset($_SESSION["usuario"])){
			header("Location: ".base_url);

		}else{
			return true;
		}
	}

public static function getAllCategory($conexion){
	$sql="SELECT * FROM categorias ORDER BY id ASC";
	$categorias=mysqli_query($conexion, $sql);

	return $categorias;
}
public static function getAllSubcategory1($database){
	$sql="SELECT * FROM subcategorias WHERE categoria_id=1";
	$subcategorias=mysqli_query($database, $sql);

	return $subcategorias;
}
public static function getAllSubcategory2($database){
	$sql="SELECT * FROM subcategorias WHERE categoria_id=2";
	$subcategorias=mysqli_query($database, $sql);

	return $subcategorias;
}
public static function getAllSubcategory3($database){
	$sql="SELECT * FROM subcategorias WHERE categoria_id=3";
	$subcategorias=mysqli_query($database, $sql);

	return $subcategorias;
}
public static function getAllSubcategory4($database){
	$sql="SELECT * FROM subcategorias WHERE categoria_id=4";
	$subcategorias=mysqli_query($database, $sql);

	return $subcategorias;
}

public static function getAllProductos($conexion, $id){
	$sql="SELECT p.*, c.*, s.* FROM productos p";
	$sql.=" INNER JOIN categorias c ON p.categoria_id=c.id_categoria ";
	$sql.="INNER JOIN subcategorias s ON p.subcategoria_id=s.id_subcategoria ";
	$sql.="WHERE p.categoria_id=$id";
	$productos=mysqli_query($conexion, $sql);

	return $productos;

}

public static function getProducts($conexion, $id){
	$sql="SELECT * FROM productos WHERE subcategoria_id=$id";
	$products=mysqli_query($conexion, $sql);

	return $products;
}

public static function getAllProductos_limit($conexion, $id){
	$sql="SELECT p.*, c.*, s.* FROM productos p";
	$sql.=" INNER JOIN categorias c ON p.categoria_id=c.id_categoria ";
	$sql.="INNER JOIN subcategorias s ON p.subcategoria_id=s.id_subcategoria ";
	$sql.="WHERE p.categoria_id=$id LIMIT 4";
	$productos=mysqli_query($conexion, $sql);

	return $productos;

}

public static function statsCarrito(){
	$stats=array(
	'count' => 0,
	'total' => 0
	);
	if(isset($_SESSION['carrito'])){
	$stats["count"] = count($_SESSION['carrito']);
	
	foreach($_SESSION['carrito'] as $index => $producto){
		$stats["total"] = $producto['precio']*$producto['unidades'];
	}
	}


	return $stats;
}

public static function borrarErrores(){
	if(isset($_SESSION['carrito'])){
		$_SESSION['carrito'];
	}
}

public static function showStatus($status){
	$value = 'Pendiente';
	
	if($status == 'confirm'){
		$value = 'Pendiente';
	}elseif($status == 'preparation'){
		$value = 'En preparación';
	}elseif($status == 'ready'){
		$value = 'Preparado para enviar';
	}elseif($status = 'sended'){
		$value = 'Enviado';
	}
	
	return $value;
}

public static function busqueda($conexion, $busqueda){
	$sql="SELECT * FROM productos WHERE nombre LIKE '%$busqueda%'";
	$productos = mysqli_query($conexion, $sql);
	return $productos;

}


}
?>



