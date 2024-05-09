<?php
    include_once("../Modelo/Conexion.php");
    $obgetoCone = new Conexion();
    $conexion = $obgetoCone->conectar();

    include_once("../Modelo/Autor.php");

    $opcion = $_POST["enviar"];
    $idautor = $_POST["idautor"];
    $nombre = $_POST["nombre"];
    $nacionalidad = $_POST["nacionalidad"];

    $obgetoAutor = new Autor($conexion,$idautor,$nombre,$nacionalidad);

    switch($opcion){
        case 'Insertar':
            $obgetoAutor->insertar();
            $mensaje = "ingresado";
            break;
        case 'Modificar':
            var_dump('modificado');  
            $obgetoAutor->modificar();
            $mensaje = 'modificado';
            
            break;
        case 'Eliminar':
            $obgetoAutor->eliminar();
            $mensaje = 'Eliminado';
            break;
    }
    
    $obgetoCone->desconectar($conexion);
    header("location:../Vista/FormularioAutor.php?msj=$mensaje");

    ?>