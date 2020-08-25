<?php

require_once "models/producto.php";
class ProductoController{
	public function ver(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
		
			$producto = new Producto();
			$producto->setId($id);
			
			$product = $producto->getOne();
			
		}
		require_once 'views/producto/ver.php';
	}

	public function administrar(){
		Utils::isAdmin();
		
		$producto = new Producto();
		$productos = $producto->getAll();
		
		require_once 'views/producto/administrar.php';
	}

	public function crear(){
		Utils::isAdmin();
		require_once 'views/producto/crear.php';
	}

	public function save(){
		Utils::isAdmin();
		if(isset($_POST)){
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
			$precio = isset($_POST['precio']) ? $_POST['precio'] : false;
			$stock = isset($_POST['stock']) ? $_POST['stock'] : false;
			$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
			$subcategoria = isset($_POST['subcategoria']) ? $_POST['subcategoria'] : false;
			// $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;
			
			if($nombre && $descripcion && $precio && $stock && $categoria && $subcategoria){
				$producto = new Producto();
				$producto->setNombre($nombre);
				$producto->setDescripcion($descripcion);
				$producto->setPrecio($precio);
				$producto->setStock($stock);
				$producto->setCategoria_id($categoria);
				$producto->setSubcategoria_id($subcategoria);
				
				// Guardar la imagen
				if(isset($_FILES['imagen'])){
					$file = $_FILES['imagen'];
					$filename = $file['name'];
					$mimetype = $file['type'];

					if($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif'){

						if(!is_dir('uploads/images')){
							mkdir('uploads/images', 0777, true);
						}

						$producto->setImagen($filename);
						move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
					}
				}
				
				if(isset($_GET['id'])){
					$id = $_GET['id'];
					$producto->setId($id);
					
					$save = $producto->edit();
				}else{
					$save = $producto->save();
				}
				
				if($save){
					$_SESSION['producto'] = "complete";
					header('Location: '.base_url.'producto/crear');
				}else{
					$_SESSION['producto'] = "failed";
					header('Location: '.base_url.'producto/crear');
				}
			}else{
				$_SESSION['producto'] = "failed";
				header('Location: '.base_url.'producto/crear');
			}
		}else{
			$_SESSION['producto'] = "failed";
			header('Location: '.base_url.'producto/crear');
		}
		
	}
	public function mostrar(){
		/*
		
			$products = new Producto();
			$products->setSubcategoria_id($id);
		$products->getProducts();
		
		
	}*/
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	require_once "views/producto/listado.php";
	 }

	}
	public function delete(){
		$producto= new Producto();
		$producto->delete();
		header("Location: administrar.php");
	}

	public function busqueda(){
		if($_POST){
			$buscar=$_POST['buscar'];



			

			require_once "views/producto/busqueda.php";
		}

	}

}

?>