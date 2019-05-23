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

            if(isset($_POST['acepto'])){
                $mensaje = "";
                $nombre = $_POST['nombre'];
                $telefono = $_POST['telefono'];
                $email = $_POST['email'];
                $mensaje = $_POST['mensaje'];

                $datos = [
                    'nombre' => $nombre,
                    'telefono' => $telefono,
                    'email' => $email,
                    'mensaje' => $mensaje,
                    'acepto' => 's'];

                $_SESSION['datos'] = $datos;
                try{
                    $this->model->insert($datos);
                }catch(PDOException $e){
                    $mensaje = "ya existe este cliente";
                }
                $destino ='srg_ek@hotmail.com';
                $desde = 'From:'.'srg_ek@hotmail.com';
                $asunto = 'este es un asunto';
                $mensaje = 'este es el mensaje';
                mail($destino,$desde,$asunto,$mensaje);
                $this->view->render('nuevo/gracias');
            }else{
                $mensaje = "Es necesario aceptar la politica";
                $this->view->mensaje = $mensaje;
                $this->render();
            }
        }

        function mensajeCorrecto(){

        }

    }