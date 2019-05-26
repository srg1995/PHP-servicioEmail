<?php
    class Consulta extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->clientes = [];
        }

        /*funcion que me visualiza por defecto un listado de clientes */
        function render(){
            //$clientes = $this->model->get();
            //$this->view->clientes = $clientes;
            if(!isset($_SESSION['usuario'])){
                $this->view->render('consulta/login');
            }else{
                $clientes = $this->model->get();
                $this->view->clientes = $clientes;
                $this->view->render('consulta/index');
            }
        }

        /*funcion que me retorna un elemento para poder editarle posteriormente*/
        function verCliente($param){
            $this->view->mensaje = "";
            $nombreCliente = $param[0];
            $cliente = $this->model->getByNombre($nombreCliente);
            $this->view->cliente = $cliente;
            if(isset($param[1])){
                $this->view->mensaje = "no se pudo actualizar el alumno";
            }else{
                
            }
            
            $this->view->render('consulta/detalle');
        }
        /*funcion que me actualiza el cliente que posee un nombre determinado */
        function actualizarCliente(){

            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];
            $email = $_POST['email'];
            $mensaje = $_POST['mensaje'];

           

            //en caso de poder actualizar el campo devuelvo los nuevos valores ya modificados a la vista
            if($this->model->update(['nombre' => $nombre,'telefono' => $telefono,'email' => $email,'mensaje' => $mensaje])){
                $cliente = new Cliente();
                $cliente->nombre = $nombre;
                $cliente->telefono = $telefono;
                $cliente->email = $email;
                $cliente->mensaje = $mensaje;

                $this->view->cliente = $cliente;
                $this->view->mensaje = "alumno actualizado correctamente";
                $this->view->render('consulta/detalle');
                return true;
            }else{
                $mensaje = "";
                $this->verCliente([$nombre, $mensaje]);
            }
            
        }

        //funcion que me elimina el cliente determinado por un nombre especifico
        function eliminarCliente($param = null){
            $nombre = $param[0];

            if($this->model->delete($nombre)){
                $this->view->mensaje = "alumno eliminado correctamente";
            }else{
                $this->view->mensaje = "no se pudo eliminar el alumno";
            }
            $this->render();
        }

        function acceso(){
            $mensaje = "";
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
            
            try{
                $datos = [
                    'usuario' => $usuario,
                    'password' => $password
                ];
                if($this->model->comprobarUsuario($datos) != 0){
                    $_SESSION['usuario'] = $usuario;
                    $clientes = $this->model->get();
                    $this->view->clientes = $clientes;
                    $this->view->render('consulta/index');
                }else{
                    $this->view->mensaje = "este usuario no esta registrado";
                    $this->render();

                }

            }catch(PDOException $e){
                $mensaje = "ya existe este cliente";
            }
        }

        function desconectar(){
            if(isset($_SESSION['usuario'])){
                unset( $_SESSION["usuario"] );  
            }
            $this->view->render('consulta/login');
            
        }

    }

