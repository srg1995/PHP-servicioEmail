<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <?php require 'views/header.php'?>
    <section>
        <h1 class="center">LOGIN ADMIN</h1>
        <form method="POST" action="<?php echo constant('URL');?>consulta/acceso">
            <div class="form-group">
                <label for="usuario">Usuario</label>
                <input type="text" class="form-control" aria-describedby="" placeholder="usuario" name="usuario" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="password" name="password" required>
            </div>

            <div class="center"><?php echo $this->mensaje; ?></div>
            <button type="submit" class="btn btn-outline-success">Acceder</button>
        </form>

    </section>

    <?php require 'views/footer.php'?>
</body>
</html>