<?php
    include_once("../Modelo/Conexion2.php");
    $objetoCo = new Conexion2();
    $conexion = $objetoCo->conectar();

    include_once("../Modelo/GeneroMusical.php");

    $opcion =$_POST['enviar'];
    $idgenero = $_POST['idgenero'];
    $descripcion = $_POST['descripcion'];

    $objetogenero = new GeneroMusical($conexion,$idgenero,$descripcion);

    switch ($opcion){
        case "Ingresar":
            $objetogenero->insertar();
            $mensaje = "ingresado";
            break;
        case "Modificar":
            $objetogenero->modificar();
            $mensaje = "modificado";
            break;
        case "Eliminar":
            $objetogenero->eliminar();
            $mensaje = "eliminado";
            break;
    }

    $objetoCo->desconectar($conexion);
    header("location:../Vista/FormularioGenero.php?msj=$mensaje");
    ?>