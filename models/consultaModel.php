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
                    $item->apellidos = $row['apellidos'];
                    $item->dni = $row['dni'];
                    $item->direccion = $row['direccion'];
                    $item->telefono = $row['telefono'];
                    $item->email = $row['email'];

                    array_push($items, $item);
                }
                return $items;
            }catch(PDOException $e){
                return [];
            }
        }

        //funcion que me devuelve el cliente con el dni solicitado
        public function getByDNI($dni){
            $item =new Cliente();
            $query = $this->database->connect()->prepare("SELECT * FROM clientes WHERE dni = :dni");
            try{
                $query->execute(['dni' => $dni]);

                while($row = $query->fetch()){
                    $item->nombre = $row['nombre'];
                    $item->apellidos = $row['apellidos'];
                    $item->dni = $row['dni'];
                    $item->direccion = $row['direccion'];
                    $item->telefono = $row['telefono'];
                    $item->email = $row['email'];
                }
                return $item;
            }catch(PDOException $e){
                return null;
            }
        }

        //funcion que me actualiza el cliente con el dni indicado
        public function update($item){
            $query = $this->database->connect()->prepare("UPDATE clientes SET nombre = :nombre, apellidos = :apellidos, direccion = :direccion, telefono = :telefono, email = :email WHERE dni = :dni");
            try{
                $query->execute([
                    'nombre' => $item['nombre'],
                    'apellidos' => $item['apellidos'],
                    'dni' => $item['dni'],
                    'direccion' => $item['direccion'],
                    'telefono' => $item['telefono'],
                    'email' => $item['email']
                ]);
                return true;

            }catch(PDOException $e){
                return false;
            }
        }

        //funcion que me elimina el cliente con el dni indicado
        public function delete($dni){
            $query = $this->database->connect()->prepare("DELETE FROM clientes WHERE dni = :dni");
            try{
                $query->execute([
                    'dni' => $dni
                ]);
                return true;

            }catch(PDOException $e){
                return false;
            }
        }
}