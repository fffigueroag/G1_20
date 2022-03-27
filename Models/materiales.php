<?php

    class Materiales extends Conectar{
        
        public function get_materials(){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_materiales";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }


        Public function get_material($id){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_materiales WHERE ID=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_material($DESCRIPCION, $UNIDAD, $COSTO, $PRECIO, $APLICA_ISV, $PORCENTAJE_ISV, $ESTADO, $ID_SOCIO){  
            $conectar=parent::conexion(); 
            parent::set_names();
            $sql="INSERT INTO ma_materiales (ID, DESCRIPCION, UNIDAD, COSTO, PRECIO, APLICA_ISV, PORCENTAJE_ISV, ESTADO, ID_SOCIO)
            VALUES(NULL,?,?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $DESCRIPCION);
            $sql->bindValue(2, $UNIDAD);
            $sql->bindValue(3, $COSTO);
            $sql->bindValue(4, $PRECIO);
            $sql->bindValue(5, $APLICA_ISV);
            $sql->bindValue(6, $PORCENTAJE_ISV);
            $sql->bindValue(7, $ESTADO);
            $sql->bindValue(8, $ID_SOCIO);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_material($DESCRIPCION, $UNIDAD, $COSTO, $PRECIO, $APLICA_ISV, $PORCENTAJE_ISV, $ESTADO, $ID_SOCIO, $ID){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="UPDATE ma_materiales SET DESCRIPCION=?, UNIDAD=?, COSTO=?, PRECIO=?, APLICA_ISV=?, PORCENTAJE_ISV=?, ESTADO=?, ID_SOCIO=? WHERE ID=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $DESCRIPCION);
            $sql->bindValue(2, $UNIDAD);
            $sql->bindValue(3, $COSTO);
            $sql->bindValue(4, $PRECIO);
            $sql->bindValue(5, $APLICA_ISV);
            $sql->bindValue(6, $PORCENTAJE_ISV);
            $sql->bindValue(7, $ESTADO);
            $sql->bindValue(8, $ID_SOCIO);
            $sql->bindValue(9, $ID);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_material($ID){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="DELETE FROM ma_materiales WHERE ID=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $ID);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>