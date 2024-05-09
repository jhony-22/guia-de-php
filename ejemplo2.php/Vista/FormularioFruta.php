<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Fruta</title>
</head>
<body>
    <center>
    <header>
        <h1>Formulario Fruta</h1>
    </header>
    <table border="1">
        <tbody>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Color</th>
                <th scope="col">Peso</th>
                <th scope="col">IdTipoFruta</th>
                <th scope="col">Botones</th>
            </tr>
    <?php
        include_once("../Modelo/Conexion2.php");
        $objetoConex = new Conexion2();
        $conexion = $objetoConex->conectar();

        include_once("../Modelo/Fruta.php");
        $objetofruta = new Fruta($conexion,0,'nombre','color','peso','idTipoFruta');
        $listaFrutas = $objetofruta->listar(0);
        while ($unRegistro = mysqli_fetch_array($listaFrutas)){
            echo '<tr><form id="modificarFruta '.$unRegistro["idFruta"].'" action="../Controlador/ControladorFruta.php"
            method="post"">';
            echo '<td><input type="hidden" name="idfruta"  value="'.$unRegistro['idFruta'].'">';
            echo '    <input type="text" name="nombre" value="'.$unRegistro['nombre'].'"></td>';
            echo '<td><input type="text" name="colorFruta" value="'.$unRegistro['colorFruta'].'"></td>';
            echo '<td><input type="number" name="peso" value="'.$unRegistro['peso'].'"></td>';
            //echo '<td><input type="number" name="idtipofruta" value="'.$unRegistro['$idTipoFruta'].'"></td>';
            echo '<td><input type="number" name="idtipofruta" value="'.$unRegistro['idTipoFruta'].'"></td>';
            

            
            echo '<td><button type="submit" name="enviar" value="Modificar">Modificar</button>
                      <button type="submit" name="enviar" value="Eliminar">Eliminar</button></td>';
            echo '</form></tr>';

        }
    ?>
            <tr><form id="ingresarFruta" action="../Controlador/ControladorFruta.php" method="post">
                <td><input type="hidden" name="idfactura" value="0">
                    <input type="text" name="nombre" ></td>
                <td><input type="text" name="colorFruta" ></td>
                <td><input type="number" name="peso" ></td>
                <td><input type="number" name="idtipofruta"></td>
                <td><button type="submit" name="enviar" value="Insertar">Insertar</button>
                    <button type="submit" name="enviar" value="Limpiar">Limpiar</button></td>

            </form></tr>
        </tbody>
    </table>
<?php
    mysqli_free_result($listaFrutas);
    $objetoConex->desconectar($conexion);
?>
    </center>
    
</body>
</html>