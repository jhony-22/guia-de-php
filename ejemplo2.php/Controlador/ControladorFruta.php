<?php
    include_once("../Modelo/Conexion2.php");
    $objetoConex = new Conexion2();
    $conexion = $objetoConex->conectar();

    include_once("../Modelo/Fruta.php");

    $opcion = $_POST["enviar"];
    $idFruta = $_POST["idfruta"];
    $nombre = $_POST["nombre"];
    $color = $_POST["colorFruta"];
    $peso = $_POST["peso"];
    $idTipoFruta = $_POST["idtipofruta"];

    $objetofruta = new Fruta($conexion,$idFruta,$nombre,$color,$peso,$idTipoFruta);


    
    switch($opcion){
        case "Insertar":
            $objetofruta->insertar();
            $mensaje = "insertado";
            break;
        case "Modificar":
            $objetofruta->modificar();
            $mensaje = "modificado";
            break;
            
        
        case "Eliminar":
            echo "entra al eliminar";
            $objetofruta->eliminar();
                 
            $mensaje = "eliminado";
            break;

    }

    $objetoConex->desconectar($conexion);
    header("location:../Vista/FormularioFruta.php?msj=$mensaje");
    ?>