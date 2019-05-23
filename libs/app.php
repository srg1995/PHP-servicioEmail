<?php
    require_once 'controllers/errores.php';
    class App{

        function __construct(){
            //echo "<p>nueva app</p>";

            $url =  isset($_GET['url']) ? $_GET['url'] : null;
            $url = rtrim($url,'/');
            $url = explode('/',$url);

            //cuando no escribimos nada en la url y retorna el index
            if(empty($url[0])){
                $archivoController = 'controllers/main.php';
                require_once $archivoController;
                $controller = new Main();
                $controller->loadModel('main');
                $controller->render();
                return false;
            }
            //asigno mi controlador
            $archivoController = 'controllers/' . $url[0] . '.php';

            //valido si existe mi controlador
            if(file_exists($archivoController)){
                //agrego el archivo del controlador
                require_once $archivoController;

                //inicializo el controlador
                $controller =  new $url[0];
                //cargo el modelo
                $controller->loadModel($url[0]);

                //numero de elementos de la url
                $nparam = sizeof($url);

                //en caso de tener mas de un parametro en la url se si esta llamando a una clase o a un metodo de la clase y poder enrutarlo
                if($nparam > 1){
                    if($nparam > 2){
                        $param = [];
                        for ($i=2; $i < $nparam; $i++) {
                            array_push($param, $url[$i]);
                        }
                        $controller->{$url[1]}($param);
                    }else{
                        $controller->{$url[1]}();
                    }
                }else{
                    //sino por defecto va a cargar el render
                    $controller->render();
                }
            }else{
                //sino existe lo mando a error
                $controller = new Errores();
            }
        }
    }

?>