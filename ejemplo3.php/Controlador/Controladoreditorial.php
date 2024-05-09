<?php
    include_once("../Modelo/Conexion.php");
    $obgetoConex = new Conexion();
    $conexion = $obgetoConex->conectar();

    include_once("../Modelo/Editorial.php");

    $opcion = $_POST["enviar"];
    $ideditorial = $_POST["ideditorial"];
    $nombre = $_POST["nombre"];
    $ciudad = $_POST["ciudad"];

    $obgetoEditorial = new Editorial($conexion,$ideditorial,$nombre,$ciudad);

    switch($opcion){
        case 'Insertar':
            $obgetoEditorial->insertar();
            $mensaje = "ingresado";
            break;
        case 'Modificar':
            var_dump('modificado');  
            $obgetoEditorial->modificar();
            $mensaje = 'modificado';
            
            break;
        case 'Eliminar':
            $obgetoEditorial->eliminar();
            $mensaje = 'Eliminado';
            break;
    }

    $obgetoConex->desconectar($conexion);
    header("location:../Vista/FormularioEditorial.php?msj=$mensaje");