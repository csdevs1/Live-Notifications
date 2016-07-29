<?php
    require_once('connect.php');
    class AppController extends DBManager {
        var $con;
        function  AppController(){
            $this->con=new DBManager;
        }
        public function consulta_sql($sql) {
            $result=null;
            if($this->con->conectar()==true){
                $result=mysql_query($sql);
                return $result;
            }
        }
        function grabar($sql){
            if($this->con->conectar()==true){
                return mysql_query($sql);
            }
        }  
    }
?>