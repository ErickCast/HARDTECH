<?php
require_once "models/pedido.php";
    class pedidoController{
        public function hacer(){
            require_once "views/pedido/hacer.php";
            
        }
        public function ticket(){
            if(isset($_SESSION['usuario'])){
                $identity = $_SESSION['usuario'];
                $pedido = new Pedido();
                $pedido->setUsuario_id($identity->id);
                
                $pedido = $pedido->getOneByUser();
                
                $pedido_productos = new Pedido();
                $productos = $pedido_productos->getProductosByPedido($pedido->id);
            }
            require_once 'views/pedido/ticket.php';            





        }
        public function add(){
            if(isset($_SESSION['usuario'])){
                $usuario_id = $_SESSION['usuario']->id;
                $provincia = isset($_POST['estado']) ? $_POST['estado'] : false;
                $localidad = isset($_POST['ciudad']) ? $_POST['ciudad'] : false;
                $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
                
                $stats = Utils::statsCarrito();
                $coste = $stats['total'];
                    
                if($provincia && $localidad && $direccion){
                    // Guardar datos en bd
                    $pedido = new Pedido();
                    $pedido->setUsuario_id($usuario_id);
                    $pedido->setProvincia($provincia);
                    $pedido->setLocalidad($localidad);
                    $pedido->setDireccion($direccion);
                    $pedido->setCoste($coste);
                    
                    $save = $pedido->save();
                    
                    // Guardar linea pedido
                    $save_linea = $pedido->save_linea();
                    
                    if($save && $save_linea){
                        $_SESSION['pedido'] = "complete";
                    }else{
                        $_SESSION['pedido'] = "failed";
                    }
                    
                }else{
                    $_SESSION['pedido'] = "failed";
                }
                
                header("Location:".base_url.'pedido/confirmado');			
            }else{
                // Redigir al index
                header("Location:".base_url);
            }
        }

        public function delete(){
            if(isset($_GET["id"])){
                $id=$_GET["id"];
                $pedido = new Pedido();
                $pedido->setId($id);
                $cancelado=$pedido->cancel();
                if($cancelado){
                    $_SESSION['cancel']="Pedido cancelado";



                }else{
                    $_SESSION['cancel']="No se pudo cancelar el pedido";

                }
            
            


            }
            header("Location: " . base_url . "pedido/mis_pedidos");




        }











        

        public function confirmado(){
            if(isset($_SESSION['usuario'])){
                $identity = $_SESSION['usuario'];
                $pedido = new Pedido();
                $pedido->setUsuario_id($identity->id);
                
                $pedido = $pedido->getOneByUser();
                
                $pedido_productos = new Pedido();
                $productos = $pedido_productos->getProductosByPedido($pedido->id);
            }
            require_once 'views/pedido/confirmado.php';
        }

        public function mis_pedidos(){
            Utils::isIdentity();
            $usuario_id = $_SESSION['usuario']->id;
            $pedido = new Pedido();
            
            // Sacar los pedidos del usuario
            $pedido->setUsuario_id($usuario_id);
            $pedidos = $pedido->getAllByUser();
            
            require_once 'views/pedido/mis_pedidos.php';
        }
        
        public function detalle(){
            Utils::isIdentity();
            
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                
                // Sacar el pedido
                $pedido = new Pedido();
                $pedido->setId($id);
                $pedido = $pedido->getOne();
                
                // Sacar los poductos
                $pedido_productos = new Pedido();
                $productos = $pedido_productos->getProductosByPedido($id);
                
                require_once 'views/pedido/detalle.php';
            }else{
                header('Location:'.base_url.'pedido/mis_pedidos');
            }
        }
        
        public function gestion(){
            Utils::isAdmin();
            $gestion = true;
            
            $pedido = new Pedido();
            $pedidos = $pedido->getAll();
            
            require_once 'views/pedido/mis_pedidos.php';
        }
        
        public function estado(){
            Utils::isAdmin();
            if(isset($_POST['pedido_id']) && isset($_POST['estado'])){
                // Recoger datos form
                $id = $_POST['pedido_id'];
                $estado = $_POST['estado'];
                
                // Upadate del pedido
                $pedido = new Pedido();
                $pedido->setId($id);
                $pedido->setEstado($estado);
                $pedido->edit();
                
                header("Location:".base_url.'pedido/detalle&id='.$id);
            }else{
                header("Location:".base_url);
            }
        }

        
    }
?>

