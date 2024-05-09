<?php
    include_once("../Modelo/Conexion2.php");
    $objetoCone = new Conexion2();
    $conex = $objetoCone->conectar();

    include_once("../Modelo/TipoFruta.php");

    $opcion = $_POST["fEnviar"];
    $idTipoFruta = $_POST["fIdTipoFruta"];
    $descripcion = $_POST["fDescripcion"];

    $objetoTipo = new TipoFruta($conex,$idTipoFruta,$descripcion);

    switch ($opcion){
        case "Ingresar":
            $objetoTipo->insertar();
            $mensaje = "ingresado";
            break;
        case "Modificar":
            $objetoTipo->modificar();
            $mensaje = "modificado";
            break;
        case "Eliminar":
            $objetoTipo->eliminar();
            $mensaje = "eliminado";
            break;
    }
    $objetoCone->desconectar($conex);
    header("location:../Vista/FormularioTipofruta.php?msj=$mensaje");


?>