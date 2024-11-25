<?php
define("BASE_URL", "/Proyecto/views/");
require_once("../config/conexion.php");
require_once("../modelos/usuario.php");
$usuario = new Usuario();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Recuperar Contraseña</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../HTML/plugins/fontawesome-free/css/all.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="../HTML/dist/css/adminlte.min.css" />
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>Recuperar </b>Contraseña</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Ingrese su correo electrónico para recibir un enlace de recuperación.</p>

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Correo electrónico" required />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Enviar enlace de recuperación</button>
                        </div>
                    </div>
                </form>

                <?php
                if (isset($_POST['email'])) {
                    $email = $_POST['email'];

                    if ($usuario->verificar_email($email)) {
                        $token = bin2hex(random_bytes(50));
                        $usuario->guardar_token($email, $token);
                        $link = BASE_URL . "reset_password.php?token=" . $token;
                        mail($email, "Recuperación de contraseña", "Haga clic en este enlace para restablecer su contraseña: " . $link);
                        echo "<div class='alert alert-success mt-3'>Se ha enviado un enlace de recuperación a su correo.</div>";
                    } else {
                        echo "<div class='alert alert-danger mt-3'>El correo electrónico no está registrado.</div>";
                    }
                }
                ?>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../HTML/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../HTML/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../HTML/dist/js/adminlte.min.js"></script>
</body>
</html>