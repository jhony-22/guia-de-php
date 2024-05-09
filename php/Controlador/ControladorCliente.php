<?php
    include_once("../Modelo/Conexion.php");
    $objetoConexion = new Conexion();
    $conexion = $objetoConexion->conectar();

    include_once("../Modelo/Cliente.php");

    $opcion = $_POST["fEnviar"];
    $idCliente = $_POST["fIdCliente"];
    $nombreCliente = $_POST["fNombreCliente"];
    $documentoCliente = $_POST["fDocumentoCliente"];
    $correoCliente = $_POST["fCorreoCliente"];

    $nombreCliente   = htmlspecialchars($nombreCliente);
    $documentoCliente = htmlspecialchars($documentoCliente);
    $correoCliente   = htmlspecialchars($correoCliente);

    $objetoCliente = new Cliente($conexion, $idCliente, $nombreCliente, $documentoCliente, $correoCliente);
    var_dump("En el controlador 111");
    
    switch($opcion){
        case 'Ingresar':
            var_dump("En el controlador");
            $objetoCliente->insertar();
            $mensaje = "ingresado";
            break;
        case 'Modificar':
            var_dump('modificado');  
            $objetoCliente->modificar();
            $mensaje = 'modificado';
            
            break;
        case 'Eliminar':
            $objetoCliente->eliminar();
            $mensaje = 'Eliminado';
            break;
    }

    $objetoConexion->desconectar($conexion);
    header("location:../Vista/FormularioCliente.php?msj=$mensaje");
?>