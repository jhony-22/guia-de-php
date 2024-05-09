<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Editorial</title>
</head>
<body>
    <center>
        <header>
            <h1>Formulario Editorial</h1>
        </header>
        <table border="1">
            <tbody>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Ciudad</th>
                    <th scope="col">Botones</th>
                </tr>
        <?php
            include_once("../Modelo/Conexion.php");
            $obgetoConex = new Conexion();
            $conexion = $obgetoConex->conectar();

            include_once("../Modelo/Editorial.php");
            $obgetoEditorial = new Editorial($conexion,0,'','');
            $listaEditorial = $obgetoEditorial->listar(0);
            while($unregistro = mysqli_fetch_array($listaEditorial)){
                echo '<tr><form id="modificareditorial'.$unregistro["ideditorial"].'" action="../Controlador/Controladoreditorial.php"
                method="post"">';
                echo '<td><input type="hidden" name="ideditorial"   value="'.$unregistro['ideditorial'].'">';
                echo '    <input type="text"   name="nombre"  value="'.$unregistro['nombre'].'"></td>';
                echo '<td><input type="text"   name="ciudad" value="'.$unregistro['ciudad'].'"></td>';
                
                echo '<td><button type="submit" name="enviar"  value="Modificar">Modificar</button>
                        <button type="submit" name="enviar"  value="Eliminar">Eliminar</button></td>';
                echo '</form></tr>';
            }
        ?>

                <tr><form id="Ingresareditorial" action="../Controlador/Controladoreditorial.php" method="post">
                    <td><input type="hidden" name="ideditorial" value="0">
                        <input type="text"  name="nombre"></td>
                    <td><input type="text" name="ciudad"></td>
                    
                    <td><button type="submit" name="enviar" value="Insertar">Insertar</button>
                        <button type="submit" name="enviar" value="Limpiar">Limpiar</button></td>
                </form></tr>
            </tbody>
        </table>
        <?php
            mysqli_free_result($listaEditorial);
            $obgetoConex->desconectar($conexion);
        ?>
    </center>
    
</body>
</html>