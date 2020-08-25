<?php

class errorController{
	public function index(){
		echo "<h1>La pagina que buscas no existe</h1>";
		header("Refresh: 5; " . base_url);
	}
}

?>