<?php

class View{

    function __construct(){
    }
    //funcion para mostrar la vista
    function render($nombre){
        require 'views/'. $nombre . '.php';
    }
}
?>