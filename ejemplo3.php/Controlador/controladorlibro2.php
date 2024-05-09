<?php
    include_once("../Modelo/Conexion.php");
    $obgetocon = new Conexion();
    $conexion = $obgetocon->conectar();

    include_once("../Modelo/Libro.php");

    $opcion = $_POST['enviar'];
    $idlibro = $_POST['idlibro'];
    $titulo = $_POST['titulo'];
    $paginas = $_POST['paginas'];
    $ideditorial = $_POST['editorial'];
    $idgenero = $_POST['genero'];
    $idautor = $_POST['autor'];

    $obgetoLibro = new Libro($conexion,$idlibro,$titulo,$paginas,$idgenero,$idautor,$ideditorial);

    switch($opcion){
        case 'Insertar':
            $obgetoLibro->insertar();
            $mensaje = "insertado";
            break;
        
        case 'Modificar':
            $obgetoLibro->modificar();
            $mensaje = 'Modificado';
            break;
        
        case 'Eliminar':
            $obgetoLibro->eliminar();
            $mensaje = 'Eliminado';
            break;
    }
    $obgetocon->desconectar($conexion);
    header("location:../Vista/FormularioLibro2.php?msj=$mensaje");