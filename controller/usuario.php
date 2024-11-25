<?php
    /*TODO: Llamando a cadena de Conexion */
    require_once("../config/conexion.php");
    /*TODO: Llamando a la clase */
    require_once("../modelos/usuario.php");
    /*TODO: Inicializando Clase */
    $usuario = new Usuario();

    /*TODO: Opcion de solicitud de controller */
    switch($_GET["opc"]){

        /*TODO: MicroServicio para poder mostrar el listado de cursos de un usuario con certificado */
        

            case "mostrar":
                $datos = $usuario->usuarios_x_id($_POST["usu_id"]);
                if(is_array($datos)==true and count($datos)<>0){
                 foreach($datos as $row){
                   $output["usu_id"] = $row["usu_id"];
                   $output["nombre"] = $row["nombre"];
                   $output ["ape_paterno"] = $row["ape_paterno"];
                   $output ["ape_materno"] = $row["ape_materno"];
                   $output["usu_correo"] = $row["usu_correo"];
                   $output ["sexo"] = $row["sexo"];
                   $output ["usu_pass"] = $row["usu_pass"];
                   $output ["telefono"] = $row["telefono"];

                  }
                  echo json_encode($output);

                }

            break;

            case "update_perfil":
                $usuario->update_usuarios_perfil( 
                    $_POST["usu_id"],
                    $_POST["nombre"],
                    $_POST["ape_paterno"],
                    $_POST["ape_materno"],                
                    $_POST["clave"],
                    $_POST["sexo"],
                    $_POST["telefono"]);
                break;

                case "total":
                    $datos = $usuario->total_curso_x_usuario($_POST["usu_id"]);
                    if(is_array($datos)==true and count($datos)>0){
                        foreach($datos as $row){
                            $output["total"] = $row["total"];
                        
                   } 
                   echo json_encode($output);

                }
                break;

                case "total_usuario":
                    $datos = $usuario->total_x_usuario($_POST["usu_id"]);
                    if(is_array($datos)==true and count($datos)>0){
                        foreach($datos as $row){
                            $output["total_usuario"] = $row["total_usuario"];
                        
                   } 
                   echo json_encode($output);

                }
                break;

                case "total_instructor":
                    $datos = $usuario->total_x_instructor($_POST["usu_id"]);
                    if(is_array($datos)==true and count($datos)>0){
                        foreach($datos as $row){
                            $output["total_instructor"] = $row["total_instructor"];
                        
                   } 
                   echo json_encode($output);

                }
                break;
}


    $usuarios = new Usuarios();

    switch($_GET["opc"]){
        case "guardaryeditar":
            if(empty($_POST["usu_id"])){
                $usuarios->insert_usuario($_POST["nombre"],$_POST["ape_paterno"],$_POST["ape_materno"],$_POST["usu_correo"],$_POST["sexo"],$_POST["telefono"]);
            }else{
                $usuarios->update_usuario($_POST["usu_id"],$_POST["nombre"],$_POST["ape_paterno"],$_POST["ape_materno"],$_POST["usu_correo"],$_POST["usu_pass"],$_POST["sexo"],$_POST["telefono"]);
            }
            break;

        case "Mostrar":
            $datos = $usuarios->usuario_id($_POST["usu_id"]);
            if(is_array($datos) == true and count($datos)<>0){
                foreach($datos as $row){
                    $output["usu_id"] = $row["usu_id"];
                    $output["nombre"] = $row["nombre"];
                    $output["ape_paterno"] = $row["ape_paterno"];
                    $output["ape_materno"] = $row["ape_materno"];
                    $output["usu_correo"] = $row["usu_correo"];
                    $output["usu_pass"] = $row["usu_pass"] ;
                    $output["sexo"] = $row["sexo"];          
                    $output["telefono"] = $row["telefono"];
                }
                echo json_encode($output);
            }
            break;

        case "eliminar":
            $usuarios->delete_usuario($_POST["usu_id"]);
            break;
        
        case "listar":
            $datos=$usuarios->usuario();
            $data=Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["nombre"];
                $sub_array[] = $row["ape_paterno"];
                $sub_array[] = $row["ape_materno"];
                $sub_array[] = $row["usu_correo"];
                $sub_array[] = str_repeat('*', strlen($row["usu_pass"]));
                $sub_array[] = $row["sexo"];          
                $sub_array[] = $row["telefono"];
                $sub_array[] = '<button type="button" onClick="editar('.$row["usu_id"].');" usu_id="'.$row["usu_id"].'" class="btn btn-success">Editar</button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["usu_id"].');" usu_id="'.$row["usu_id"].'" class="btn btn-danger">Borrar</button>';
                
                $data[] = $sub_array;
            }
            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
            break;

            case "mostrar_curso_detalle":
                $datos = $usuarios->curso_x_id_detalle ($_POST["curusu_id"]);

                if(is_array($datos)==true and count($datos)<>0){
                 foreach ($datos as $row){
                
                  $output ["curusu_id"] = $row["curusu_id"]; 
                  $output ["cur_id"] = $row["cur_id"]; 
                  $output ["curso"] = $row["curso"];
                  $output ["descripcion"] = $row["descripcion"]; 
                  $output ["fecha_ini"] = $row["fecha_ini"]; 
                  $output ["fecha_fin"] = $row["fecha_fin"]; 
                  $output ["usu_id"] = $row["usu_id"];
                  $output ["nombre"] = $row["nombre"];
                  $output ["ape_paterno"] = $row["ape_paterno"]; 
                  $output ["ape_materno"] = $row["ape_materno"]; 
                  $output ["inst_id"] = $row["inst_id"]; 
                  $output ["nombrei"] = $row["nombrei"];
                  $output ["ape_paternoi"] = $row["ape_paternoi"]; 
                  $output ["ape_maternoi"] = $row["ape_maternoi"];
                }
                echo json_encode($output);
                }
            break;
    }
?>