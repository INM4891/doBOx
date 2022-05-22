<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/favicon.png" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Login doBox</title>
</head>

<body>
    <div class="formulario">
        <form action="login/valida_usuario.php" method="POST">
            <img class="logo" src="img\logo_doBox.png">
            <div class="input-container">
                <i class="fa fa-user icon"></i>
                <input class="input-field" type="text" placeholder="Usuario" name="email">
            </div>

            <div class="input-container">
                <i class="fa fa-key icon"></i>
                <input class="input-field" type="password" placeholder="Password" name="psw">
            </div>

            <button type="submit" class="btn" name="acceso">Acceder</button>
            <p>doBox 2022 copyright © todos los derechos reservados</p>
        </form>

    </div>

</body>

</html>