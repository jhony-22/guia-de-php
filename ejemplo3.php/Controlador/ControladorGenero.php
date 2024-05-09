<?php
    include_once("../Modelo/Conexion.php");
    $obgetoCon = new Conexion();
    $conexion = $obgetoCon->conectar();

    include_once("../Modelo/Genero.php");

    $opcion = $_POST["enviar"];
    $idgenero = $_POST["idgenero"];
    $descripcion = $_POST["descripcion"];

    $obgetoGenero = new Genero($conexion,$idgenero,$descripcion);

    switch($opcion){
        case 'Insertar':
            $obgetoGenero->insertar();
            $mensaje = "ingresado";
            break;
        case 'Modificar':
            var_dump('modificado');  
            $obgetoGenero->modificar();
            $mensaje = 'modificado';
            
            break;
        case 'Eliminar':
            $obgetoGenero->eliminar();
            $mensaje = 'Eliminado';
            break;
    }
    
    $obgetoCon->desconectar($conexion);
    header("location:../Vista/FormularioGenero.php?msj=$mensaje");

    ?>