<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php require 'views/header.php'?>
    <section>
    <h1 class="text-center">GRACIAS POR SU REGISTRO "<?php echo $_SESSION['datos']['nombre'] ?>"</h1>

    <h2 class="text-center">Sus datos son</h2>
    <table class="table table-striped text-center table-sm">
            <thead>
                <tr>
                    <th>nombre</th>
                    <th>telefono</th>
                    <th>email</th>
                    <th>mensaje</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $_SESSION['datos']['nombre'] ?></td>
                    <td><?php echo $_SESSION['datos']['telefono'] ?></td>
                    <td><?php echo $_SESSION['datos']['email'] ?></td>
                    <td><?php echo $_SESSION['datos']['mensaje'] ?></td>
                </tr>
            </tbody>
        </table>
    
    </section>

    <?php require 'views/footer.php'?>

</body>
</html>