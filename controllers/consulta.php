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
            $this->view->render('consulta/login');
        }

        /*funcion que me retorna un elemento para poder editarle posteriormente*/
        function verCliente($param){
            $dniCliente = $param[0];
            $cliente = $this->model->getByDNI($dniCliente);
            $this->view->cliente = $cliente;
            $this->view->mensaje = "";
            $this->view->render('consulta/detalle');
        }
        /*funcion que me actualiza el cliente que posee un dni determinado */
        function actualizarCliente(){
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $dni = $_POST['dni'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $email = $_POST['email'];

            //en caso de poder actualizar el campo devuelvo los nuevos valores ya modificados a la vista
            if($this->model->update(['nombre' => $nombre,'apellidos' => $apellidos,'dni' => $dni,'direccion' => $direccion,'telefono' => $telefono,'email' => $email])){

                $cliente = new Cliente();
                $cliente->nombre = $nombre;
                $cliente->apellidos = $apellidos;
                $cliente->dni = $dni;
                $cliente->direccion = $direccion;
                $cliente->telefono = $telefono;
                $cliente->email = $email;

                $this->view->cliente = $cliente;
                $this->view->mensaje = "alumno actualizado correctamente";
            }else{
                $this->view->mensaje = "no se pudo actualizar el alumno";
            }
            $this->view->render('consulta/detalle');
        }

        //funcion que me elimina el cliente determinado por un dni especifico
        function eliminarCliente($param = null){
            $dni = $param[0];

            if($this->model->delete($dni)){
                $this->view->mensaje = "alumno eliminado correctamente";
            }else{
                $this->view->mensaje = "no se pudo eliminar el alumno";
            }
            $this->render();
        }

        function acceso(){
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
        }

    }