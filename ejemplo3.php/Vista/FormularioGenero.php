<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Genero</title>
</head>
<body>
    <center>
        <header>
            <h1>Formulario Genero Literario</h1>
        </header>
        <table border="1">
            <tbody>
                <tr>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Botones</th>
                </tr>
        <?php
            include_once("../Modelo/Conexion.php");
            $obgetoCon = new Conexion();
            $conexion = $obgetoCon->conectar();

            include_once("../Modelo/Genero.php");
            $obgetoGenero = new Genero($conexion,0,'');
            $listaGenero = $obgetoGenero->listar(0);
            while($unregistro = mysqli_fetch_array($listaGenero)){
                echo '<tr><form id="modificargenero'.$unregistro["idgeneroLiterario"].'" action="../Controlador/ControladorGenero.php"
                method="post"">';
                echo '<td><input type="hidden" name="idgenero"   value="'.$unregistro['idgeneroLiterario'].'">';
                echo '    <input type="text"   name="descripcion"  value="'.$unregistro['descripcion'].'"></td>';
                
                echo '<td><button type="submit" name="enviar"  value="Modificar">Modificar</button>
                        <button type="submit" name="enviar"  value="Eliminar">Eliminar</button></td>';
                echo '</form></tr>';
            }
        ?>

                <tr><form id="IngresarGenero" action="../Controlador/ControladorGenero.php" method="post">
                    <td><input type="hidden" name="idgenero" value="0">
                    <input type="text"  name="descripcion"></td>
                    
                    <td><button type="submit" name="enviar" value="Insertar">Insertar</button>
                        <button type="submit" name="enviar" value="Limpiar">Limpiar</button></td>
                </form></tr>
            </tbody>
        </table>
        <?php
            mysqli_free_result($listaGenero);
            $obgetoCon->desconectar($conexion);
        ?>
    </center>
    
</body>
</html>