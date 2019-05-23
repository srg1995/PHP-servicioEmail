<?php

    class Main extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->mensaje = "";
        }

        function render(){
            $this->view->render('main/index');
        }

    }