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

$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$descripcion = $_POST['descripcion'];
$fecha = $_POST['fecha'];
$fechavto = $_POST['fechavto'];
$archivo = $_FILES['archivo'];

$nombre_archivo = $_FILES['archivo']['name'];
$tipo_archivo = $_FILES['archivo']['type'];
$tam_archivo = $_FILES['archivo']['size'];

if ($tam_archivo <= 5000000) {
    //Ruta de la carpeta destino en el servidor
    $carpeta_destino = '../uploads/';
    //Movemos el fichero del directorio temporal al directorio escogido
    move_uploaded_file($_FILES['archivo']['tmp_name'], $carpeta_destino . $nombre_archivo);
} else {
    echo "Error. Tamaño máximo permitido 5MB.";
}

$query = "INSERT INTO tbl_documentos (NOMBRE, TIPO, DESCRIPCION, FECHA, FECHA_VTO, ARCHIVO) VALUES ('$nombre','$tipo','$descripcion', '$fecha', '$fechavto', '$nombre_archivo')";

$resultado = $mysqli->query($query);

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

    <title>Guardar Documento</title>

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

        <?php if ($resultado > 0) { ?>
            <h1>Documento guardado</h1>
        <?php } else { ?>
            <h1>Error al guardar Documento</h1>
        <?php    } ?>


        <button onclick="location.href='nuevo_documento.php'" class="guardar">Nuevo</button>
        <button onclick="location.href='griddocumentos.php'" class="guardar">Ver Documentos </button>

    </div>

</body>

</html>