<?php
require_once("../config/conexion.php");
require_once("../modelos/socialMedia.php");

$socialMedia = new SocialMedia();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Estudios</title>
    <link rel="stylesheet" href="../HTML/plugins/fontawesome-free/css/all.min.css" />
    <link rel="stylesheet" href="../HTML/dist/css/adminlte.min.css" />
    <script src="../HTML/plugins/jquery/jquery.min.js"></script>
    <script src="../HTML/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../HTML/dist/js/adminlte.min.js"></script>
    <script>
        function nuevo() {
            // Lógica para abrir un modal o redirigir a la página de añadir red social
            // Aquí puedes implementar un modal para agregar una nueva red social
        }

        function editar(id) {
            // Lógica para abrir un modal con los datos de la red social a editar
            // Puedes usar AJAX para cargar los datos en un modal
        }

        function eliminar(id) {
            if (confirm("¿Estás seguro de que deseas eliminar esta red social?")) {
                $.post("../controller/social_media.php?opc=eliminar", { socmed_id: id }, function(response) {
                    location.reload(); // Recargar la página para reflejar cambios
                });
            }
        }

        $(document).ready(function() {
            // Cargar la lista de redes sociales al cargar la página
            $.ajax({
                url: "../controller/social_media.php?opc=listar",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    let tableBody = '';
                    $.each(data.aaData, function(index, value) {
                        tableBody += '<tr>';
                        tableBody += '<td>' + value[0] + '</td>'; // ID
                        tableBody += '<td>' + value[1] + '</td>'; // Icono
                        tableBody += '<td>' + value[2] + '</td>'; // URL
                        tableBody += '<td>' + value[3] + '</td>'; // Estado
                        tableBody += '<td>' + value[4] + '</td>'; // Acciones
                        tableBody += '</tr>';
                    });
                    $('#socialMediaTable tbody').html(tableBody);
                }
            });
        });
    </script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <?php include("modulos/header.php"); ?>
    <!-- Main Sidebar Container -->
    <?php include("modulos/menu.php"); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="card card-info">
                <div class="card-header">
                    <h1 class="card-title">Estudios</h1>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary mb-3" onclick="nuevo()">Añadir Estudios</button>
                    <table id="socialMediaTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Nivel Educacion</th>
                                <th>Instituciones</th>
                                <th>Titulos</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Los datos se cargarán aquí mediante AJAX -->
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
   
     
    <?php include("modulos/footer.php"); ?>
</div>

<!-- ./wrapper -->


</body>
</html>