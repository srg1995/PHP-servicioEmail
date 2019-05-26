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
        <h1 class="center">Para el desarrollo de la aplicacion...</h1>
        <div class="indicaciones">
            <p>
                El servidor con el que he trabajado es <strong>XAMPP</strong>, que integra apache y phpmyadmin para montar la aplicacion en el.
            </p>

            <div>
            <P  >para el desarrollo de la aplicacion me base en un desarrollo <strong>MVC PHP</strong> con la siguiente estructura,</P >
                <ul>
                    <li>index.php</li>
                    <li>.htaccess</li>
                    <li>config
                        <ul>
                            <li>config.php</li>
                        </ul>
                    </li>
                    <li>
                        controllers
                        <ul>
                            <li>consulta.php</li>
                            <li>errores.php</li>
                            <li>main.php</li>
                            <li>nuevo.php</li>
                        </ul>
                    </li>
                    <li>libs
                        <ul>
                            <li>app.php</li>
                            <li>controller.php</li>
                            <li>database.php</li>
                            <li>model.php</li>
                            <li>view.php</li>
                        </ul>
                    </li>
                    <li>models
                        <ul>
                            <li>cliente.php</li>
                            <li>consultaModel.php</li>
                            <li>nuevoModel.php</li>
                        </ul>
                    </li>
                    <li>
                        public
                        <ul>
                            <li>
                                css
                                <ul><li>styles.css</li></ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                    views
                    <ul>
                        <li>header.php</li>
                        <li>footer.php</li>
                        <li>ayuda
                            <ul><li>index.php</li></ul>
                            </li>
                        <li>consulta
                            <ul>
                                <li>index.php </li>
                                <li>detalle.php</li>
                                <li>login.php</li>
                            </ul>
                            </li>
                        <li>errores
                            <ul><li>index.php</li></ul>
                        </li>
                        <li>main
                            <ul><li>index.php</li></ul>
                        </li>
                        <li>nuevo
                            <ul>
                                <li>index.php</li>
                                <li>gracias.php</li>
                            </ul>
                        </li>
                    </ul>

                    </li>
                </ul>

            </div>
            <p>
                Para que la aplicacion funcione correctamete modifique el archivo .htaccess con las siguentes sentencias:<br>
                <ul>
                    <li><strong>RewriteEngine On</strong></li>
                    <li><strong>RewriteCond %{REQUEST_FILENAME} !-d</strong></li>
                    <li><strong>RewriteCond %{REQUEST_FILENAME} !-f</strong></li>
                    <li><strong>RewriteCond %{REQUEST_FILENAME} !-l</strong></li>
                    <li><strong>RewriteRule ^(.*)$ index.php?url=$1 [L,QSA]</strong></li>
                </ul>
                    *de este modo el enrutador app.php funciona correctamente
            </p>

            <p>
                Para el desarrollo he utilizado lenguajes como <strong>PHP, CSS3, HTML5, JQuery y frameworks como bootstrap</strong>
            </p>

            <p>
                La forma de trabajo ha sido mediante github en la que iba subiendo el desarrollo por partes, mediante la app <strong>Sourcetree.</strong>
            </p>
            <p>
                ** A tener en cuenta: el archivo htaccess esta sin punto para que funcione correctamente la aplicacion en el servidor hay que ponerle el punto delante.
            </p>
        </div>
    </section>

    <div class="center"><?php echo $this->mensaje;?></div>

    <?php require 'views/footer.php'?>
</body>
</html>