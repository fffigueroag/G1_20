<?php
    class Conectar{
        protected $dbh;

        protected function Conexion(){
            try{
                $conectar = $this->dbh =new PDO("mysql:host=52.152.236.67;dbname=g7_20","G7_20","a60CZ6ku");
                return $conectar;
            }catch (Exception $e){
                print "¡Error BD!" . $e->getMessage() . "<br/>";
                die();
            }
        }
        public function set_names(){
            return $this->dbh->query("SET NAMES 'utf8'");
        }
    }
?>

