<?php
// Clase encargada de la seguridad de la aplicación
class Usuario_Sesion
{
    private $usuario = null;
    private $rol = null;
    private $id = null;
    private $email = null;

    function __construct()
    {
//Inicamos la sesión
        session_start();
        if (isset($_SESSION["usuario"]) || isset($_SESSION["rol"]) || isset($_SESSION["id"]) || isset($_SESSION["email"])) {
            $this->usuario = $_SESSION["usuario"];
            $this->rol = $_SESSION["rol"];
            $this->id = $_SESSION["id"];
            $this->email = $_SESSION["email"];
        }
    }

    public function getID()
    {
        return $this->id;
    }
    public function getUsuario()
    {
        return $this->usuario;
    }
    public function getRol()
    {
        return $this->rol;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function addUsuarioSession($id, $usuario, $rol, $email)
    {
//Generamos variable de sesión
        $_SESSION['id'] = $id;
        $_SESSION["usuario"] = $usuario;
        $_SESSION['rol'] = $rol;
        $_SESSION['email'] = $email;
        $this->id = $id;
        $this->usuario = $usuario;
        $this->rol = $rol;
        $this->email = $email;
    }


    public function logOut()
    {
        $_SESSION = [];
        session_destroy();
        header("location:../index.php");
    }
}
