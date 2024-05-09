<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Artista</title>
</head>
<body>
    <center>
        <header>
            <h1>Formulario Artista</h1>
        </header>
        <table border="1">
            <tbody>
                <tr>
                    <td scope="col">Nombre</td>
                    <td scope="col">Nacionalidad</td>
                    <td scope="col">Botones</td>
                </tr>
        <?php
            include_once("../Modelo/Conexion2.php");
            $objetoco = new Conexion2();
            $conexion = $objetoco->conectar();

            include_once("../Modelo/Artista.php");
            $objetoartista = new Artista($conexion,0,'nombre','nacionalidad');
            $listadoArtista = $objetoartista->listar(0);
            while($unregistro = mysqli_fetch_array($listadoArtista)){
                echo '<tr><form id="modificarartista"'.$unregistro["idArtista"].' action="../Controlador/ControladorArtista.php"
                method="post">';
                echo '<td><input type="hidden" name="idartista"   value="'.$unregistro['idArtista'].'" >';
                echo '    <input type="text" name="nombre"     value="'.$unregistro['nombre'].'"></td>';
                echo '<td><input type="text" name="nacionalidad" value="'.$unregistro['nacionalidad'].'"></td>';

                echo '<td><button type="submit" name="enviar" value="Modificar">Modificar</button>
                        <button type="submit"  name="enviar" value="Eliminar">Eliminar</button></td>';
                echo '</form></tr>';
            } 
        ?>
                <tr><form id="ingresarartista" action="../Controlador/ControladorArtista.php" method="post">
                    <td><input type="hidden" name="idartista" value="0">
                        <input type="text" name="nombre" ></td>
                    <td><input type="text" name="nacionalidad" ></td>
                    
                    <td><button type="submit" name="enviar" value="Insertar">Insertar</button>
                        <button type="submit" name="enviar" value="Limpiar">Limpiar</button></td>
                </form></tr>
            </tbody>
        </table>
    <?php
        mysqli_free_result($listadoArtista);
        $objetoco->desconectar($conexion);
    ?>
    </center>
    
</body>
</html>