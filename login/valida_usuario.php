<?php
//Comprobamos si el usuario y sus datos de acceso son correctos.
include "Usuario_Sesion.php";
require ('../conexion.php');


$email = $_POST['email'];
$pass = $_POST['psw'];




$usuario_sesion = new Usuario_Sesion();

$resultado = $mysqli->query("SELECT * FROM tbl_usuarios WHERE EMAIL = '" . $email . "'");

$usuarioRegistrado = $resultado->fetch_assoc();


if ($usuarioRegistrado != false){ 

  if($usuarioRegistrado["PASS"] == $pass){ 
    $id = $usuarioRegistrado['ID'];
    $usuario = $usuarioRegistrado['USUARIO'];
    $email = $usuarioRegistrado['EMAIL'];
    $rol = $usuarioRegistrado['ROL'];

    $usuario_sesion->addUsuarioSession($id,$usuario,$rol,$email);

    header("location: ../home.php");

    
    }else{ 
          echo '<script type="text/javascript">;';
              echo ' alert("Contraseña Incorrecta");';
              echo 'window.location= "../index.php";';
          echo '</script>;';
      }

}else{
  echo '<script type="text/javascript">';
      echo ' alert("Datos Incorrectos")';
      echo ' window.location= "../index.php";';
  echo '</script>';
}
