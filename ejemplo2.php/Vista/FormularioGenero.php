<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Genero Musica</title>
</head>
<body>
    <center>
        <header>
            <h1>Formulario Genero Musica</h1>
        </header>
        <table border="1">
            <tbody>
                <tr>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Botones</th>
                </tr>
        <?php
            include_once("../Modelo/Conexion2.php");
            $objetoCo = new Conexion2();
            $conexion = $objetoCo->conectar();

            include_once("../Modelo/GeneroMusical.php");
            $objetogenero = new GeneroMusical($conexion,0,'descripcion');
            $listadogenero = $objetogenero->listar(0);
            while($unregistro = mysqli_fetch_array($listadogenero)){
                echo '<tr><form id="modificargenero'.$unregistro["idGenero"].'"action="../Controlador/ControladorGenero.php"
                method="post"">';
                echo '<td><input type="hidden" name="idgenero" value="'.$unregistro['idGenero'].'">';
                echo '    <input type="text" name="descripcion" value="'.$unregistro['descripcion'].'"></td>';
                
                echo '<td><button type="submit" name="enviar" value="Modificar">Modificar</button>
                          <button type="submit" name="enviar" value="Eliminar">Eliminar</button></td>';
                echo '</form></tr>';
            }
        ?>
                <tr><form id="ingresarGenero" action="../Controlador/ControladorGenero.php" method="post">
                <td><input type="hidden" name="idgenero" value="0">
                    <input type="text"  name="descripcion"></td>
                <td><button type="submit" name="enviar" value="Ingresar">Insertar</button>
                    <button type="submit" name="enviar" value="Limpiar">Limpiar</button></td>

                </form></tr>
            </tbody>
        </table>
    
<?php
    mysqli_free_result($listadogenero);
    $objetoCo->desconectar($conexion);
?>
   </center> 
</body>
</html>