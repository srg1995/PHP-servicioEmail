<?php

class Controller{

    function __construct(){
        //Instancio la vista
        $this->view = new View();
    }

    /* carga el modelo */
    function loadModel($model){
        //monta la url del modelo
        $url = 'models/'.$model.'Model.php';
        //si existe la url
        if(file_exists($url)){
            require $url;
            //cero el modelo particular dependiendo del nombre
            $modelName = $model.'Model';
            $this->model = new $modelName();
        }
    }
}
?>