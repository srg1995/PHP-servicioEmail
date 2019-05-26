<?php
    class NuevoModel extends Model{
        public function __construct(){
            parent::__construct();
        }
        public function insert($datos){
            $query = $this->database->connect()->prepare('INSERT INTO clientes  (NOMBRE, TELEFONO, EMAIL, MENSAJE) VALUES (:nombre, :telefono, :email, :mensaje)');
            $query->execute(['nombre' => $datos['nombre'], 'telefono' => $datos['telefono'], 'email' => $datos['email'], 'mensaje' => $datos['mensaje']]);
        }
}