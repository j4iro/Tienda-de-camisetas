<?php
require_once 'models/pedido.php';

class PedidoController 
{
    public function hacer()
    {
        require_once 'views/pedido/hacer.php';
    }

    public function add()
    {
        if (isset($_SESSION['identity']))
        {        
            $usuario_id = $_SESSION['identity']->id;
            $provincia = isset($_POST['txtProvincia']) ? $_POST['txtProvincia'] : false;
            $localidad = isset($_POST['txtLocalidad']) ? $_POST['txtLocalidad'] : false;
            $direccion = isset($_POST['txtDireccion']) ? $_POST['txtDireccion'] : false;
            $stats = Utils::statsCarrito();
            $coste = $stats['total'];

            if ($direccion && $provincia && $localidad) 
            {
                $pedido = new Pedido();
                $pedido->setUsuario_id($usuario_id);
                
                $pedido->setProvincia($provincia);
                $pedido->setLocalidad($localidad);
                $pedido->setDireccion($direccion);
                $pedido->setCoste($coste);

                $save = $pedido->save();

                $savelinea = $pedido->save_linea();

                // if ($save) 
                // {
                //     $_SESSION['pedido'] = "completed";
                // }
                // else
                // {
                //     $_SESSION['pedido'] = "failed";
                // }
                //var_dump($pedido);

                $_SESSION['pedido'] = ($save && $savelinea) ? "completed" : "failed";

                
            }else
            {
                $_SESSION['pedido'] = "failed";
            }

            header("Location: " . base_url.'pedido/confirmado');
            
        }
        else
        {
            header("Location: " . base_url);
        }
    }

    public function confirmado()
    {
        if (isset($_SESSION['identity'])) {
            $identity = $_SESSION['identity'];
            $pedido = new Pedido();
            $pedido->setUsuario_id($identity->id);

            $pedido = $pedido->getOnebyUser();
            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedido($pedido->id); 

            require_once 'views/pedido/confirmado.php';
        }
        
    }

    public function mis_pedidos() {
        Utils::isIdentity();

        //Esto de acceder a una propiedad de una sesion en algunas versiones no nos deja pero de la version 5 y pico para adelante si nos deja
        $usuario_id = $_SESSION['identity']->id;
        $pedido = new Pedido();

        //Sacar los pedidos del usuario
        $pedido->setUsuario_id($usuario_id);
        $pedidos = $pedido->getAllbyUser();

        require_once 'views/pedido/mis_pedidos.php';

    }

    public function detalle() {

        Utils::isIdentity();

        if (isset($_GET['id'])) 
        {
            $id = $_GET['id'] ;

            //Sacar el pedido
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido = $pedido->getOne();

            //Sacar los Productos
            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedido($id); 


            require_once 'views/pedido/detalle.php';
        }
        else
        {
            header("Location: " .base_url . 'pedido/mis_pedidos');
        }
    }

    public function gestion() {
        Utils::isAdmin();
        $gestion = true;

        $pedido = new Pedido();
        $pedidos = $pedido->getAll();

        require_once 'views/pedido/mis_pedidos.php';
    }

    public function estado()
    {
        Utils::isAdmin();

        if (isset($_POST['txtPedidoId']) && isset($_POST['cboestado']) ) {

        $id = $_POST['txtPedidoId'];
        $estado = $_POST['cboestado'];

         //Upodate del pedido
        $pedido = new Pedido();
        $pedido->setId($id);
        $pedido->setEstado($estado);
        $pedido->edit();

        header ("Location: " . base_url. 'pedido/detalle&id='.$id);

        }
        else
        {
            header("Location: " .base_url);
        }
    }

}