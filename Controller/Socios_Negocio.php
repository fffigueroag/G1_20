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
    header('Content-Type: application/json');
require_once("../Config/Conexion.php");
require_once("../Models/Socios_Negocio.php");

$socios = new Socios();
$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["opcion"]){
    case "GetSocios":
        $datos=$socios->get_socios();
        echo json_encode($datos);
    break;

    case "GetSocio":
        $datos=$socios->get_socio($body["ID"]);
        echo json_encode($datos);
    break;
    
    case "InsertSocio":
        $datos=$socios->insert_socio($body["NOMBRE"],$body["RAZON_SOCIAL"],$body["DIRECCION"],$body["TIPO_SOCIO"],$body["CONTACTO"],$body["EMAIL"],$body["FECHA_CREADO"],$body["ESTADO"],$body["TELEFONO"]);
        echo json_encode("Socio de Negocio Agregado");
    break;
    
    case "UpdateSocio":
        $datos=$socios->update_socio($body["NOMBRE"],$body["RAZON_SOCIAL"],$body["DIRECCION"],$body["TIPO_SOCIO"],$body["CONTACTO"],$body["EMAIL"],$body["FECHA_CREADO"],$body["ESTADO"],$body["TELEFONO"],$body["ID"]);
        echo json_encode("Socio de Negocio Actualizado");
    break;
     
    case "DeleteSocio":
        $datos=$socios->delete_socio($body["ID"]);
        echo json_encode("Socio de Negocio Eliminado");
    break;
       }
?>