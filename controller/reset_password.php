<?php
require_once("../config/conexion.php");
require_once("../modelos/usuario.php");
$usuario = new Usuario();

if (isset($_POST['token']) && isset($_POST['new_password'])) {
    $token = $_POST['token'];
    $new_password = $_POST['new_password'];

    $email = $usuario->get_email_by_token($token);

    if ($email) {
        $usuario->update_password($email, $new_password);
        echo "La contraseña ha sido restablecida con éxito.";
    } else {
        echo "Token inválido.";
    }
}
?>