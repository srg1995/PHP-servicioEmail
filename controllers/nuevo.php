<?php

    class Nuevo extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->mensaje = "";
        }

        function render(){
            $this->view->render('nuevo/index');
        }

        //funcion que me intenta registrar un cliente
        function registrarCliente(){
            $mensaje = "";
                $nombre = $_POST['nombre'];
                $telefono = $_POST['telefono'];
                $email = $_POST['email'];
                $mensaje = $_POST['mensaje'];

                $datos = [
                    'nombre' => $nombre,
                    'telefono' => $telefono,
                    'email' => $email,
                    'mensaje' => $mensaje];

            if(isset($_POST['acepto'])){
                $_SESSION['datos'] = $datos;
                try{
                    $this->model->insert($datos);
                }catch(PDOException $e){
                    $mensaje = "ya existe este cliente";
                }
                $destino1 ='admin@hotmail.com';
                $destino2 = $email;
                $desde = 'From:'.'admin@hotmail.com';
                $asunto = 'mensaje enciado por'.$nombre;
                $mensaje = $mensaje;
                mail($destino1,$desde,$asunto,$mensaje);
                mail($destino2,$desde,$asunto,$mensaje);
                $this->view->render('nuevo/gracias');
            }else{
                $mensaje = "Es necesario aceptar la politica";
                $this->view->mensaje = $mensaje;
                $this->view->cliente = $datos;
                $this->render();
            }
        }

        function mensajeCorrecto(){

        }

    }