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
        <h1 class="center">INSERTAR NUEVO CLIENTE</h1>
        <?php if(!empty($this->mensaje)){ echo "<div class='center info'>".$this->mensaje."</div>";} ?></div>
        <form method="POST" action="<?php echo constant('URL');?>nuevo/registrarCliente">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nombre" name="nombre" value="<?php if(!empty($this->cliente)){ echo $this->cliente['nombre'];} ?>" required>
            </div>
            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="tel" class="form-control" placeholder="Telefono" name="telefono" pattern="[0-9]{9}" value="<?php if(!empty($this->cliente)){ echo $this->cliente['telefono'];} ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="Email" name="email" value="<?php if(!empty($this->cliente)){ echo $this->cliente['email'];} ?>" required>
            </div>

            <div class="form-group">
                <label for="mensaje">Mensaje</label>
                <textarea class="form-control rounded-0" id="mensaje" rows="10" name="mensaje" placeholder="Escriba aqui su mensaje..."><?php if(!empty($this->cliente)){ echo $this->cliente['mensaje'];} ?></textarea>
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="acepto[]" id="acepto">
                <label class="form-check-label" for="acepto">Acepta la Política de privacidad y Aviso legal</label>
            </div>

            <button type="submit" class="btn btn-outline-success">Registrar cliente</button>
        </form>

    </section>

    <?php require 'views/footer.php'?>
</body>
</html>