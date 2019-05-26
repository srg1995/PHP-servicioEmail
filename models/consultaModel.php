<?php
include_once 'models/cliente.php';
    class ConsultaModel extends Model{
        public function __construct(){
            parent::__construct();
        }

        //funcion que me devuelve la lista de clientes
        public function get(){
            $items = [];
            try{

                $query = $this->database->connect()->query("SELECT * FROM clientes");

                while($row = $query->fetch()){
                    $item = new Cliente();
                    $item->nombre = $row['nombre'];
                    $item->telefono = $row['telefono'];
                    $item->email = $row['email'];
                    $item->mensaje = $row['mensaje'];

                    array_push($items, $item);
                }
                return $items;
            }catch(PDOException $e){
                return [];
            }
        }

        //funcion que me devuelve el cliente con el nombre solicitado
        public function getByNombre($nombre){
            $item =new Cliente();
            $query = $this->database->connect()->prepare("SELECT * FROM clientes WHERE nombre = :nombre");
            try{    
                $query->execute(['nombre' => $nombre]);

                while($row = $query->fetch()){
                    $item->nombre = $row['nombre'];
                    $item->telefono = $row['telefono'];
                    $item->email = $row['email'];
                    $item->mensaje = $row['mensaje'];
                }
                
                return $item;
            }catch(PDOException $e){
                return null;
            }
        }

        //funcion que me actualiza el cliente con el nombre indicado
        public function update($item){
            $query = $this->database->connect()->prepare("UPDATE clientes SET telefono = :telefono, email = :email, mensaje = :mensaje WHERE nombre = :nombre");
            try{
                $query->execute([
                    'nombre' => $item['nombre'],
                    'telefono' => $item['telefono'],
                    'email' => $item['email'],
                    'mensaje' => $item['mensaje']
                ]);
                return true;

            }catch(PDOException $e){
                return false;
            }
        }

        //funcion que me elimina el cliente con el nombre indicado
        public function delete($nombre){
            $query = $this->database->connect()->prepare("DELETE FROM clientes WHERE nombre = :nombre");
            try{
                $query->execute([
                    'nombre' => $nombre
                ]);
                return true;

            }catch(PDOException $e){
                return false;
            }
        }

        function comprobarUsuario($datos){
            $query = $this->database->connect()->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
            try{
                $query->execute([
                    'usuario' => $datos['usuario']
                ]);
            
                return $query->rowCount();
            }catch(PDOException $e){
                return false;
            }
        }
}