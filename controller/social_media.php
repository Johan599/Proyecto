<?php
// TODO: Llamando a la conexión
require_once("../config/conexion.php");

// TODO: Llamando a la clase
require_once("../modelos/social_media.php");

// TODO: Inicializando la clase
$social_media = new SocialMedia();

// TODO: Opción de solicitud de controller
switch ($_GET["opc"]) {

    // Listar redes sociales
    case "listar":
        $datos = $social_media->listar_redes_sociales();
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["socmed_id"];
            $sub_array[] = $row["socmed_icono"] ?? 'Sin Icono'; // Evitar valores nulos
            $sub_array[] = $row["socmed_url"] ?? 'Sin URL';
            $sub_array[] = $row["est"] ?? 'Sin Estado';
            $sub_array[] = '
                <button type="button" onClick="editar(' . $row["socmed_id"] . ');" class="btn btn-success">Editar</button>
                <button type="button" onClick="eliminar(' . $row["socmed_id"] . ');" class="btn btn-danger">Eliminar</button>
            ';
            $data[] = $sub_array;
        }
        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );
        echo json_encode($results);
        break;

    // Mostrar detalle de una red social
    case "mostrar":
        $datos = $social_media->obtener_red_social($_POST["socmed_id"]);
        if (is_array($datos) && count($datos) > 0) {
            $output = $datos[0];
            echo json_encode($output);
        }
        break;

    // Guardar o editar una red social
    case "guardaryeditar":
        if (empty($_POST["socmed_id"])) {
            $social_media->insertar_red_social(
                $_POST["socmed_icono"],
                $_POST["socmed_url"],
                $_POST["est"]
            );
        } else {
            $social_media->editar_red_social(
                $_POST["socmed_id"],
                $_POST["socmed_icono"],
                $_POST["socmed_url"],
                $_POST["est"]
            );
        }
        break;

    // Eliminar una red social
    case "eliminar":
        $social_media->eliminar_red_social($_POST["socmed_id"]);
        break;
}
?>
