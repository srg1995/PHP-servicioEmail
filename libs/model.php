<?php

class Model{

    function __construct(){
        //cada modelo instanciara un objeto de base de datos
        $this->database = new Database();
    }
}
?>