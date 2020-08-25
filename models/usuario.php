<?php

class Usuario{
	private $id;
	private $nombre;
	private $apellido;
	private $email;
	private $password;
	private $rol;
	private $imagen;
	private $estado;
	private $municipio;
	private $domicilio;




	public $db;

	//Conectando la base de datos

	public function __construct(){
		$this->db=Database::connect();
	}

	//GETTERS

	function getId(){
		return $this->id;
	}
	function getNombre(){
		return $this->nombre;
	}
	function getApellido(){
		return $this->apellido;
	}
	function getEmail(){
		return $this->email;
	}
	function getPassword(){
		return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ["cost" => 4]);
	}
	function getRol(){
		return $this->rol;
	}
	function getImagen(){
		return $this->imagen;
	}
	function getEstado(){
		return $this->estado;
	}
	function getMunicipio(){
		return $this->municipio;
	}
	function getDomicilio(){
		return $this->domicilio;
	}





	//SETTERS

	function setId($id){
		$this->id=$id;
	}
	function setNombre($nombre){
		$this->nombre=$this->db->real_escape_string($nombre);
	}
	function setApellido($apellido){
		$this->apellido=$this->db->real_escape_string($apellido);
	}
	function setEmail($email){
		$this->email=$this->db->real_escape_string($email);
	}
	function setPassword($password){
		$this->password=$password;
	}
	function setRol($rol){
		$this->rol=$rol;
	}
	function setImagen($imagen){
		$this->imagen=$imagen;
	}
	function setEstado($estado){
		$this->estado=$estado;
	}
	function setMunicipio($municipio){
		$this->municipio=$municipio;
	}
	function setDomicilio($domicilio){
		$this->domicilio=$domicilio;
	}



	public function save(){
		$sql="INSERT INTO usuarios VALUES(NULL, '{$this->getNombre()}', '{$this->getApellido()}', '{$this->getEmail()}', '{$this->getPassword()}','{$this->getEstado()}','{$this->getMunicipio()}','{$this->getDomicilio()}', CURDATE(), 'user', NULL);";
		$save=$this->db->query($sql);

		$result=false;
		if($save){
			$result=true;
		}

		return $result;
	}

	public function login(){
		$result=false;
		$email=$this->email;
		$password=$this->password;

		//Comprobar si el usuario existe
		$sql="SELECT * FROM usuarios WHERE email='$email'";
		$login=$this->db->query($sql);

		if($login && $login->num_rows==1){
			$usuario= $login->fetch_object();

			//Verificar la contraseña
			$verify=password_verify($password, $usuario->password);

			if($verify){
				$result=$usuario;
			}


		}
		return $result;

	}
	public function update(){
		$sql="UPDATE usuarios SET nombre = '{$this->getNombre()}', apellidos = '{$this->getApellido()}', password = '{$this->getPassword()}', estado = '{$this->getEstado()}', ciudad = '{$this->getMunicipio()}', domicilio = '{$this->getDomicilio()}'";

		$update=$this->db->query($sql);

		$result=false;
		if($update){
			$result=true;
		}

		return $result;
	}





}


?>