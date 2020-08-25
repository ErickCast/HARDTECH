<?php

class Producto{
	private $id;
	private $categoria_id;
	private $subcategoria_id;
	private $nombre;
	private $descripcion;
	private $precio;
	private $stock;
	private $oferta;
	private $fecha;
	private $imagen;
	private $busqueda;

	private $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}
	
	function getId() {
		return $this->id;
	}

	function getCategoria_id() {
		return $this->categoria_id;
	}
	function getSubcategoria_id() {
		return $this->subcategoria_id;
	}

	function getNombre() {
		return $this->nombre;
	}

	function getDescripcion() {
		return $this->descripcion;
	}

	function getPrecio() {
		return $this->precio;
	}

	function getStock() {
		return $this->stock;
	}

	function getOferta() {
		return $this->oferta;
	}

	function getFecha() {
		return $this->fecha;
	}

	function getImagen() {
		return $this->imagen;
	}
	function getBusqueda(){
		return $this->busqueda;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setCategoria_id($categoria_id) {
		$this->categoria_id = $categoria_id;
	}

	function setSubcategoria_id($subcategoria_id) {
		$this->subcategoria_id = $subcategoria_id;
	}

	function setNombre($nombre) {
		$this->nombre = $this->db->real_escape_string($nombre);
	}

	function setDescripcion($descripcion) {
		$this->descripcion = $this->db->real_escape_string($descripcion);
	}

	function setPrecio($precio) {
		$this->precio = $this->db->real_escape_string($precio);
	}

	function setStock($stock) {
		$this->stock = $this->db->real_escape_string($stock);
	}

	function setOferta($oferta) {
		$this->oferta = $this->db->real_escape_string($oferta);
	}

	function setFecha($fecha) {
		$this->fecha = $fecha;
	}

	function setImagen($imagen) {
		$this->imagen = $imagen;
	}
	
	function setBusqueda($busqueda){
		$this->busqueda= $busqueda;
	}

	public function getAll(){
		$productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC");
		return $productos;
	}
	public function getProducts(){
	$products=$this->db->query("SELECT * FROM productos WHERE subcategoria_id= {$this->getSubcategoria_id()} ORDER BY id DESC");
	return $products->fetch_object();
	}

	public function getOne(){
		$producto = $this->db->query("SELECT * FROM productos WHERE id = {$this->getId()}");
		return $producto->fetch_object();
	}

	public function save(){
		$sql = "INSERT INTO productos VALUES(NULL, {$this->getCategoria_id()}, {$this->getSubcategoria_id()}, '{$this->getNombre()}', '{$this->getDescripcion()}', {$this->getPrecio()}, {$this->getStock()}, null, CURDATE(), '{$this->getImagen()}');";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	public function delete(){
		if(isset($_get["id"])){
			$id=$_GET["id"];
			
			$query="DELETE FROM productos WHERE id=$id";

			$save=$this->db->query($query);

			

		}
	}
	public function search(){
		$buscar=$this->db->query("SELECT * FROM productos WHERE nombre like '%{$this->getBusqueda()}%'");
		return $buscar->fetch_object();
	}



}


?>	