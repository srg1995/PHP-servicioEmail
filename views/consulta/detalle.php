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
        <h1 class="center">MODIFICAR CLIENTE CON NOMBRE <?php echo $this->cliente->nombre; ?></h1>
        <?php if(!empty($this->mensaje)){ echo "<div class='center info'>".$this->mensaje."</div>";} ?></div>
        <form method="POST" action="<?php echo constant('URL');?>consulta/actualizarCliente">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" aria-describedby="emailHelp" name="nombre" value="<?php echo $this->cliente->nombre; ?>" required>
            </div>
            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="number" class="form-control" name="telefono" value="<?php echo $this->cliente->telefono; ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $this->cliente->email; ?>" required>
            </div>

            <div class="form-group">
                <label for="mensaje">Mensaje</label>
                <textarea class="form-control rounded-0" id="mensaje" rows="10" name="mensaje" ><?php echo $this->cliente->mensaje; ?></textarea>
            </div>
            <button type="submit" class="btn btn-outline-success">Actualizar datos</button>
        </form>
    </section>

    <?php require 'views/footer.php'?>
</body>
</html>