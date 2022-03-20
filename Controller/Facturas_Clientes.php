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

    require_once("../config/conexion.php");
    require_once("../models/facturas_clientes.php");
    $facturas = new Facturas();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["op"]){

         case "Getfacturas":
              $datos=$facturas-> get_facturas();
              echo json_encode($datos);
         break;
    
         case "GetFacturacliente":
              $datos=$facturas->get_Factura_cliente($body["ID"]);
              echo json_encode($datos);
         break;
    
         case "InsertFactura":
              $datos=$facturas->Insert_Facturas($body["NUMERO_FACTURA"],$body["ID_SOCIO"],$body["FECHA_FACTURA"],$body["DETALLE"],$body["SUB_TOTAL"],$body["TOTAL_ISV"],$body["TOTAL"],$body[" FECHA_VENCIMIENTO"],$body["ESTADO"]);
              echo json_encode("Factura de Cliente Agregado");
         break;

         case "updateFactura":
             $datos=$facturas->Update_Facturas($body["ID"],$body["NUMERO_FACTURA"],$body["ID_SOCIO"],$body["FECHA_FACTURA"],$body["DETALLE"],$body["SUB_TOTAL"],$body["TOTAL_ISV"],$body["TOTAL"],$body["FECHA_VENCIMIENTO"],$body["ESTADO"]);
             echo json_encode("Factura de Cliente Actualizado");
         break;

         case "Deletefactura":
          $datos=$facturas->Delete_Factura($body["ID"]);
          echo json_encode("Factura de Cliente eliminado exitosamente");
          break;
    }
?>
    
