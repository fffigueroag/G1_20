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
    public function insert_facturas( $NUMERO_FACTURA, $ID_SOCIO, $FECHA_FACTURA, $DETALLE, $SUB_TOTAL, $TOTAL_ISV, $TOTAL, $FECHA_VENCIMIENTO, $ESTADO){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO ma_facturas_cliente(ID, NUMERO_FACTURA, ID_SOCIO, FECHA_FACTURA, DETALLE, SUB_TOTAL, TOTAL_ISV, TOTAL, FECHA_VENCIMIENTO, ESTADO)
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
    public function Update_Facturas( $NUMERO_FACTURA, $ID_SOCIO, $FECHA_FACTURA, $DETALLE, $SUB_TOTAL, $TOTAL_ISV, $TOTAL, $FECHA_VENCIMIENTO, $ESTADO){
        $conectar= parent::conexion();
        $sql="UPDATE ma_facturas_cliente SET NUMERO_FACTURA=?, ID_SOCIO=?, FECHA_FACTURA=?, DETALLE=?, SUB_TOTAL=?, TOTAL_ISV=?, TOTAL=?, FECHA_VENCIMIENTO=?, ESTADO=? WHERE ID=?;";
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
    }
?>