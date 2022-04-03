<?php
    class Socios extends Conectar{
        
        public function get_socios(){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_socios_negocio ";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
        }

        public function get_socio($id){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_socios_negocio WHERE ID=?";
            $sql=$conectar->prepare($sql);
            $sql->bindvalue(1, $id);
            $sql->execute();
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
        }
 
        public function insert_socio($nombre, $razon_social, $direccion , $tipo_socio, $contacto, $email, $fecha_creado, $estado, $telefono){
        $conectar= parent::Conexion();
        parent::set_names();
        $sql="INSERT INTO ma_socios_negocio (ID, NOMBRE, RAZON_SOCIAL, DIRECCION, TIPO_SOCIO, CONTACTO, EMAIL, FECHA_CREADO, ESTADO, TELEFONO)
        VALUES (NULL,?,?,?,?,?,?,?,?,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindvalue(1, $nombre);
        $sql->bindvalue(2, $razon_social);
        $sql->bindvalue(3, $direccion);
        $sql->bindvalue(4, $tipo_socio);
        $sql->bindvalue(5, $contacto);
        $sql->bindvalue(6, $email);
        $sql->bindvalue(7, $fecha_creado);
        $sql->bindvalue(8, $estado);
        $sql->bindvalue(9, $telefono);
        $sql->execute();
        return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
        }

        public function update_socio($nombre, $razon_social, $direccion , $tipo_socio, $contacto, $email, $fecha_creado, $estado, $telefono, $id){
            $conectar=parent::Conexion();
            parent::set_names();
            $sql="UPDATE ma_socios_negocio SET NOMBRE=?, RAZON_SOCIAL=?, DIRECCION=?, TIPO_SOCIO=?, CONTACTO=?, EMAIL=?, FECHA_CREADO=?, ESTADO=?, TELEFONO=? WHERE ID=?";
            $sql=$conectar->prepare($sql);
            $sql->bindvalue(1, $nombre);
            $sql->bindvalue(2, $razon_social);
            $sql->bindvalue(3, $direccion);
            $sql->bindvalue(4, $tipo_socio);
            $sql->bindvalue(5, $contacto);
            $sql->bindvalue(6, $email);
            $sql->bindvalue(7, $fecha_creado);
            $sql->bindvalue(8, $estado);
            $sql->bindvalue(9, $telefono);
            $sql->bindvalue(10, $id);
            $sql->execute();
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
        }
        public function delete_socio($id){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql="DELETE FROM ma_socios_negocio WHERE ID=?";
            $sql=$conectar->prepare($sql);
            $sql->bindvalue(1, $id);
            $sql->execute();
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
        }
   }
?>    