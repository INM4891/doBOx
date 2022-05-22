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
$resultado = $mysqli->query("SELECT * FROM tbl_documentos");
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
    <title>Documentos</title>

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
        <h1>Documentos</h1>
        <button onclick="location.href='nuevo_documento.php'" class="guardar">Nuevo</button>

        <table>
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Fecha Vto</th>
                    <th>Adjunto</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>

                <?php
                while ($fila = $resultado->fetch_assoc()) { ?>

                    <tr>
                        <td class="celdacentrada"><?php echo $fila['ID']; ?></td>
                        <td><?php echo $fila['NOMBRE']; ?></td>
                        <td><?php echo $fila['TIPO']; ?></td>
                        <td><?php echo $fila['DESCRIPCION']; ?></td>
                        <td><?php echo $fila['FECHA']; ?></td>
                        <td><?php echo $fila['FECHA_VTO']; ?></td>
                        <td class="celdacentrada"><a href="leer_documento.php?ID=<?php echo $fila['ID']; ?>"><i class="fa fa-fw fa-paperclip link"></i></td>
                        <td class="celdacentrada"><a href="modificar_documento.php?ID=<?php echo $fila['ID']; ?>"><i class="fa fa-fw fa-pencil link"></i><a href="eliminar_documento.php?ID=<?php echo $fila['ID']; ?>"><i class="fa fa-fw fa-trash link"></td>
                    </tr>

                <?php } ?>

            </tbody>
        </table>

    </div>

</body>

</html>