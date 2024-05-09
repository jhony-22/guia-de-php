<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Cancion</title>
</head>
<body>
    <center>
        <header>
            <h1>Formulario Cancion</h1>
        </header>
        <table border="1">
            <tbody>
                <th scope="col">Nombre</th>
                <th scope="col">Duracion</th>
                <th scope="col">Artista</th>
                <th scope="col">Genero</th>
                <th scope="col">Botones</th>

        <?php
            include_once("../Modelo/Conexion2.php");
            $objetocon = new Conexion2();
            $conexion = $objetocon->conectar();

            include_once("../Modelo/Cancion.php");
            $objetocancion = new Cancion($conexion,0,'nombre','duracion','genero','artista');
            $listacancion = $objetocancion->listar(0);
            while($unregistro = mysqli_fetch_array($listacancion)){
                echo '<tr><form id="modificarcancion '.$unregistro["idCancion"].'" action="../Controlador/ControladorCancion.php"
                method="post">';
                echo '<td><input type="hidden" name="idcancion" value="'.$unregistro['idCancion'].'">';
                echo '     <input type="text" name="nombre" value="'.$unregistro['nombre'].'"></td>';
                echo '<td><input type="time" name="duracion" value="'.$unregistro['duracion'].'"></td>';
                echo '<td><input type="number" name="genero" value="'.$unregistro['idGenero'].'"></td>';
                echo '<td><input type="number" name="artista" value="'.$unregistro['idArtista'].'"></td>';

                echo '<td><button type="submit" name="enviar" value="Modificar">Modificar</button>
                          <button type="submit" name="enviar" value="Eliminar">Eliminar</button></td>';
                echo '</form></tr>';
            }
        ?>
                <tr><form id="=ingresarcancion" action="../Controlador/ControladorCancion.php" method="post">
                <td><input type="hidden" name="idcancion" value="0">
                    <input type="text" name="nombre"></td>
                <td><input type="time" name="duracion" ></td>
                <td><input type="number" name="genero" ></td>
                <td><input type="number" name="artista" ></td>
                <td><button type="submit" name="enviar" value="Insertar">Insertar</button>
                    <button type="submit" name="enviar" value="Limpiar">Limpiar</button></td>
            
                </form></tr>
            </tbody>
        </table>
    <?php
        mysqli_free_result($listacancion);
        $objetocon->desconectar($conexion);
    ?>
    </center>
    
</body>
</html>