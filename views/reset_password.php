<?php
require_once("../config/conexion.php");
require_once("../modelos/usuario.php");
$usuario = new Usuario();

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    ?>
    <form action="../controller/reset_password_action.php" method="POST">
        <input type="hidden" name="token" value="<?php echo $token; ?>">
        <input type="password" name="new_password" placeholder="Nueva contraseña" required>
        <button type="submit">Restablecer contraseña</button>
    </form>
    <?php
}
?>