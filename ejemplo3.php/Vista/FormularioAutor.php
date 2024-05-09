<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Autor</title>
</head>
<body>
    <center>
        <header>
            <h1>Formulario Autor</h1>
        </header>
        <table border="1">
            <tbody>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Nacionalidad</th>
                    <th scope="col">Botones</th>
                </tr>
        <?php
            include_once("../Modelo/Conexion.php");
            $obgetoCone = new Conexion();
            $conexion = $obgetoCone->conectar();

            include_once("../Modelo/Autor.php");
            $obgetoAutor = new Autor($conexion,0,'','');
            $listaAutor = $obgetoAutor->listar(0);
            while($unregistro = mysqli_fetch_array($listaAutor)){
                echo '<tr><form id="modificarautor'.$unregistro["idautor"].'" action="../Controlador/ControladorAutor.php"
                method="post"">';
                echo '<td><input type="hidden" name="idautor"   value="'.$unregistro['idautor'].'">';
                echo '    <input type="text"   name="nombre"  value="'.$unregistro['nombre'].'"></td>';
                echo '<td><input type="text"   name="nacionalidad" value="'.$unregistro['nacionalidad'].'"></td>';
                
                echo '<td><button type="submit" name="enviar"  value="Modificar">Modificar</button>
                        <button type="submit" name="enviar"  value="Eliminar">Eliminar</button></td>';
                echo '</form></tr>';
            }
        ?>

                <tr><form id="IngresarGenero" action="../Controlador/ControladorAutor.php" method="post">
                    <td><input type="hidden" name="idgenero" value="0">
                        <input type="text"  name="nombre"></td>
                    <td><input type="text" name="nacionalidad"></td>
                    
                    <td><button type="submit" name="enviar" value="Insertar">Insertar</button>
                        <button type="submit" name="enviar" value="Limpiar">Limpiar</button></td>
                </form></tr>
            </tbody>
        </table>
        <?php
            mysqli_free_result($listaAutor);
            $obgetoCone->desconectar($conexion);
        ?>
    </center>
    
</body>
</html>