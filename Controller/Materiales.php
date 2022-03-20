<?php
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: token, Content-Type');
    header('Access-Control-Max-Age: 1728000');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    die();
  }
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: aplication/json');
    require_once("../config/conexion.php");
    require_once("../models/materiales.php");
    $material= new Materiales();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["op"]){

    case "GetMaterials":
        $datos=$material->get_materials();
        echo json_encode($datos);
    break;
    
    case "GetMaterial":
        $datos=$material->get_material($body["ID"]);
        echo json_encode($datos);
    break;

    case "InsertMaterial":
        $datos=$material->insert_material($body["DESCRIPCION"], $body["UNIDAD"],$body["COSTO"],$body["PRECIO"],$body["APLICA_ISV"],$body["PORCENTAJE_ISV"],$body["ESTADO"],$body["ID_SOCIO"]);
        echo json_encode("material agregado exitosamente");
    break;

    case "UpdateMaterial":
        $datos=$material->update_material($body["DESCRIPCION"],$body["UNIDAD"],$body["COSTO"],$body["PRECIO"],$body["APLICA_ISV"],$body["PORCENTAJE_ISV"],$body["ESTADO"],$body["ID_SOCIO"],$body["ID"]);
        echo json_encode("material actualizado exitosamente");
    break;

    case "DeleteMaterial":
    $datos=$material->delete_material($body["ID"]);
    echo json_encode("material eliminado exitosamente");
    break;
}
?>