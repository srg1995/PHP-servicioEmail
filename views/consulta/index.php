<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="<?php echo constant('URL');?>public/js/ajaxOrdenacion.js"></script>
</head>
<body>
    <?php require 'views/header.php'?>
    <section>
        <h1 class="center">LISTADO DE CLIENTES</h1>
        <div class="table-responsive">
        <table class="table table-striped text-center table-sm">
            <thead>
                <tr>
                    <th>nombre</th>
                    <th>apellidos</th>
                    <th>dni</th>
                    <th>direccion</th>
                    <th>telefono</th>
                    <th>email</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php
                    include_once 'models/cliente.php';
                    foreach($this->clientes as $row){
                        $cliente = new Cliente();
                        $cliente = $row;
                ?>
                    <td><?php echo $cliente->nombre ?></td>
                    <td><?php echo $cliente->apellidos ?></td>
                    <td><?php echo $cliente->dni ?></td>
                    <td><?php echo $cliente->direccion ?></td>
                    <td><?php echo $cliente->telefono ?></td>
                    <td><?php echo $cliente->email ?></td>
                    <td> <a class="btn btn-danger" href="<?php echo constant('URL') . 'consulta/verCliente/' . $cliente->dni ?>">Editar</a> </td>
                    <td><a class="btn btn-warning" href="<?php echo constant('URL') . 'consulta/eliminarCliente/' . $cliente->dni ?>">eliminar</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
    </section>

    <?php require 'views/footer.php'?>
</body>
</html>