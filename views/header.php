<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
    <header>
        <ul class="menu">
            <li><a href="<?php echo constant('URL');?>main"><span class="fas fa-home"> Inicio</span></a></li>
            <li><a href="<?php echo constant('URL');?>nuevo"><span class="fas fa-clipboard-list"> Formulario</span></a></li>
            <li><a href="<?php echo constant('URL');?>consulta"><span class="fas fa-user"> Administrar</span></a></li>
            <li><a href="<?php echo constant('URL');?>consulta/desconectar"><span class="fas fa-door-open"> Salir</span></a></li>
        </ul>
    </header>
</body>
</html>