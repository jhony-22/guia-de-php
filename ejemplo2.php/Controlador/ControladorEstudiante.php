<?php
    include_once("../Modelo/Conexion2.php");
    $objetoCon = new Conexion2();
    $cone = $objetoCon->conectar();

    include_once("../Modelo/Estudiante.php");

    $opcion = $_POST["fEnviar"];
    $idEstudiante = $_POST["fIdEstudiante"];
    $nombre = $_POST["fNombre"];
    $direccion = $_POST["fDireccion"];
    $documento = $_POST["fDocumento"];
    $fechaNacimiento = $_POST["fFechaNacimiento"];
    $correoElectronico = $_POST["fCorreoElectronico"];

    $nombre = htmlspecialchars($nombre);
    $direccion = htmlspecialchars($direccion);
    $documento = htmlspecialchars($documento);
    $fechaNacimiento = htmlspecialchars($fechaNacimiento);
    $correoElectronico = htmlspecialchars($correoElectronico);

    $objetoEstu = new Estudiante($cone,$idEstudiante,$nombre,$direccion,$documento,$fechaNacimiento,$correoElectronico);

    switch($opcion){
        case "Insertar":
            $objetoEstu->insertar();
            $mensaje = 'estudiante insertado';
            break;
        case "Modificar":
            $objetoEstu->modificar();
            $mensaje = 'estudiante modificado';
            break;
        case "Eliminar":
            $objetoEstu->eliminar();
            $mensaje = 'estudiante eliminado';
            break;
    }

    $objetoCon->desconectar($cone);
    header("location:../Vista/FormularioEstudiante.php?msj=$mensaje");

?>