<?php
    class Facturas extends Conectar{

    public function get_facturas(){
        $conectar = parent::conexion();
        parent::set_names();
        $sql="SELECT* FROM ma_facturas_cliente";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql ->fetchALL(PDO::FETCH_ASSOC);
    }

    public function get_Factura_cliente($id){
        $conectar = parent::conexion();
        parent::set_names();
        $sql="SELECT* FROM ma_facturas_cliente WHERE ID = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
    }
    public function Insert_Facturas( $NUMERO_FACTURA, $ID_SOCIO, $FECHA_FACTURA, $DETALLE, $SUB_TOTAL, $TOTAL_ISV, $TOTAL, $FECHA_VENCIMIENTO, $ESTADO){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO ma_facturas_cliente (ID, NUMERO_FACTURA, ID_SOCIO, FECHA_FACTURA, DETALLE, SUB_TOTAL, TOTAL_ISV, TOTAL, FECHA_VENCIMIENTO, ESTADO)
        VALUES(NULL, ?,?,?,?,?,?,?,?,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $NUMERO_FACTURA);
        $sql->bindValue(2, $ID_SOCIO);
        $sql->bindValue(3, $FECHA_FACTURA);
        $sql->bindValue(4, $DETALLE);
        $sql->bindValue(5, $SUB_TOTAL);
        $sql->bindValue(6, $TOTAL_ISV);
        $sql->bindValue(7, $TOTAL);
        $sql->bindValue(8, $FECHA_VENCIMIENTO);
        $sql->bindValue(9, $ESTADO);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function Update_Facturas($ID, $NUMERO_FACTURA, $ID_SOCIO, $FECHA_FACTURA, $DETALLE, $SUB_TOTAL, $TOTAL_ISV, $TOTAL, $FECHA_VENCIMIENTO, $ESTADO){
        $conectar= parent::conexion();
        $sql="UPDATE ma_facturas_cliente SET NUMERO_FACTURA=?, ID_SOCIO=?, FECHA_FACTURA=?, DETALLE=?, SUB_TOTAL=?, TOTAL_ISV=?, TOTAL=?, FECHA_VENCIMIENTO=?, ESTADO=?, WHERE ID=?;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $ID); 
        $sql->bindValue(2, $NUMERO_FACTURA);
        $sql->bindValue(3, $ID_SOCIO);
        $sql->bindValue(4, $FECHA_FACTURA);
        $sql->bindValue(5, $DETALLE);
        $sql->bindValue(6, $SUB_TOTAL);
        $sql->bindValue(7, $TOTAL_ISV);
        $sql->bindValue(8, $TOTAL);
        $sql->bindValue(9, $FECHA_VENCIMIENTO);
        $sql->bindValue(10, $ESTADO);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
     }
     public function Delete_Factura($ID){
         $conectar=parent::conexion();
         parent::set_names();
         $sql="DELETE FROM ma_facturas_cliente WHERE ID=?";
         $sql=$conectar->prepare($sql);
         $sql->bindValue(1, $ID);
         $sql->execute();
         return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
     }
   }
?>