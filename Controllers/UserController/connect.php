<?php
    class DBManager{
        var $cnx;
        var $BaseDatos;
        var $Servidor;
        var $Usuario;
        var $Clave;
        function DBManager(){
            $this->BaseDatos = "test";
            $this->Servidor = "localhost";
            $this->Usuario = "root";
            $this->Clave = "root";
        }
        function conectar() {
            if(!($con=@mysql_connect($this->Servidor,$this->Usuario,$this->Clave))){
                echo"<h3> Error al conectar a la base de datos</h3>";
                exit();
            }
            if (!@mysql_select_db($this->BaseDatos,$con)){
                echo "<h3> Error al seleccionar la base de datos</h3>";
                exit();
            }
            $this->conect=$con;
            return true;
        }
    }
?>