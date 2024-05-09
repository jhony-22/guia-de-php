<?php
    include_once("../Modelo/Conexion2.php");
    $objetoco = new Conexion2();
    $conexion = $objetoco->conectar();

    include_once("../Modelo/Artista.php");

    $opcion = $_POST['enviar'];
    $idartista = $_POST['idartista'];
    $nombre = $_POST['nombre'];
    $nacionalidad = $_POST['nacionalidad'];

    $objetoartista = new Artista($conexion,$idartista,$nombre,$nacionalidad);

    switch($opcion){
        case "Insertar":
            $objetoartista->insertar();
            $mensaje = "ingresado";
            break;
        case "Modificar":
            $objetoartista->modificar();
            $mensaje = "modificado";
            break;
        case "Eliminar":
            $objetoartista->eliminar();
            $mensaje = "eliminado";
            break;
    }

    $objetoco->desconectar($conexion);
    header("location:../Vista/FormularioArtista.php?msj=$mensaje");
    ?>