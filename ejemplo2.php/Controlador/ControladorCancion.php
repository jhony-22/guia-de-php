<?php
    include_once("../Modelo/Conexion2.php");
    $objetocon = new Conexion2();
    $conexion = $objetocon->conectar();

    include_once("../Modelo/Cancion.php");

    $opcion = $_POST["enviar"];
    $idcancion = $_POST["idcancion"];
    $nombre = $_POST["nombre"];
    $duracion = $_POST["duracion"];
    $genero = $_POST["genero"];
    $artista = $_POST["artista"];

    $objetocancion = new Cancion($conexion,$idcancion,$nombre,$duracion,$artista,$genero);

    switch ($opcion){
        case 'Insertar':
            $objetocancion->insertar();
            $mensaje = "insertado";
            break;

        case 'Modificar':
            $objetocancion->modificar();
            $mensaje = "modificado";
            break;

        case 'Eliminar':
            $objetocancion->eliminar();
            $mensaje = "eliminado";
            break;
    }
    $objetocon->desconectar($conexion);
    header("location:../Vista/FormularioCancion.php?msj=$mensaje");
?>