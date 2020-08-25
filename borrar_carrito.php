<?php
session_start();
if(isset($_SESSION['carrito'])){
    $_SESSION['carrito']=null;
}
header("Location: " . base_url);

?>