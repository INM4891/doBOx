<?php

require('../conexion.php');
include "../login/Usuario_Sesion.php";

$usuario_sesion = new Usuario_Sesion();

$usuario = $usuario_sesion->getUsuario();
$rol = $usuario_sesion->getRol();
$id = $usuario_sesion->getID();
$email = $usuario_sesion->getEmail();

if (!isset($usuario)) {
    header("location:../index.php");
    exit();
}

$id = $_GET['ID'];

$query = "SELECT * FROM tbl_avisos WHERE ID= '" . $id . "'";
$resultado = $mysqli->query($query);
$fila = $resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="es">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/index.css">
    <link rel="icon" type="image/png" href="../img/favicon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/fontawesome.min.js" integrity="sha512-5qbIAL4qJ/FSsWfIq5Pd0qbqoZpk5NcUVeAAREV2Li4EKzyJDEGlADHhHOSSCw0tHP7z3Q4hNHJXa81P92borQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Eliminar Aviso</title>

</head>

<body>

    <div class="sidenav">
        <img class="logo" src="../img/logo_doBox_white.png">
        <a href="../home.php"><i class="fa fa-fw fa-home"></i>Inicio</a>
        <?php if ($rol === 'Administrador') { ?>
            <a href="../avisos/gridavisos.php"><i class="fa fa-fw fa-bell"></i>Avisos</a>
            <a href="../usuarios/gridusuarios.php"><i class="fa fa-fw fa-users"></i>Usuarios</a>
        <?php }
        ?>
        <a href="../entidades/gridentidades.php"><i class="fa fa-fw fa-building"></i>Entidades</a>
        <a href="../documentos/griddocumentos.php"><i class="fa fa-fw fa-folder"></i>Documentos</a>
        <br>
        <div class="sesion">
            <a href="index.php"><i class="fa fa-fw fa-user"></i>Hola <?php echo $usuario ?></a>
            <a href="../login/logout.php"><i class="fa fa-solid fa-arrow-right-from-bracket"></i> Salir</a>

        </div>
    </div>

    <div class="main">
        <h1>Eliminar Aviso</h1>

        <form name="eliminar_aviso" action="elimina_aviso.php" method="POST">


            <label for="id">Id:</label>
            <input type="text" name="id" value="<?php echo $fila['ID']; ?>" />

            <label for="titulo">Título:</label>
            <input type="text" name="titulo" value="<?php echo $fila['TITULO']; ?>" />

            <label for="descripcion">Descripción:</label>
            <input type="text" name="descripcion" value="<?php echo $fila['DESCRIPCION']; ?>" />


            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" value="<?php echo $fila['FECHA']; ?>" />

            <input class="guardar" type="submit" name="elimina_aviso" value="Eliminar" />

        </form>

    </div>

</body>


</html>