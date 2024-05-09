<?php
    class Conexion2{
        function conectar(){
            $conexion = mysqli_connect("localhost", "root", "", "ejemplo2");
            mysqli_query($conexion, "SET NAMES 'utf8' ");
            return $conexion;
        }
        function desconectar($conexion){
            mysqli_close($conexion);
        }
    }
?>