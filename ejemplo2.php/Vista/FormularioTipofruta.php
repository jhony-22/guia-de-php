<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Tipo Fruta</title>
</head>
<body>
    <center>
    <header>
        <h1>Formulario Tipo Fruta</h1>
    </header>
    <table border="1">
        <tbody>
            <tr>
                <th scope="col">Descripcion</th>
                <th scope="col">Botones</th>
            </tr>
    <?php
        include_once("../Modelo/Conexion2.php");
        $objetoCon= new Conexion2();
        $cone = $objetoCon->conectar();

        include_once("../Modelo/TipoFruta.php");
        $objetoTipo = new TipoFruta($cone,0,'descripcion');
        $listaTipo = $objetoTipo->listar(0);
        while($unRegistro = mysqli_fetch_array($listaTipo)){
            echo '<tr><form id="fModificarTipo'.$unRegistro["idTipoFruta"].'" action="../Controlador/ControladorTipo.php"
            method="post">';
            echo '<td><input type="hidden" name="fIdTipoFruta" value="'.$unRegistro['idTipoFruta'].'">';
            echo  '   <input type="text"   name="fDescripcion" value="'.$unRegistro['descripcion'].'"></td>';

            echo '<td><button type="submit" name="fEnviar"  value="Modificar">Modificar</button>
                      <button type="submit" name="fEnviar"  value="Eliminar">Eliminar</button></td>';
            echo '</form></tr>';
        }
    ?>
            <tr><form id="fIngresarTipo" action="../Controlador/ControladorTipo.php"method="post">
                <td><input type="hidden" name="fIdTipoFruta" value="0">
                    <input type="text" name="fDescripcion" ></td>
                    <td><button type="submit" name="fEnviar" value="Ingresar">Insertar</button>
                        <button type="submit" name="fEnviar" value="Limpiar">Limpiar</button></td>
            </form></tr>
        </tbody>
    </table>

<?php
    mysqli_free_result($listaTipo);
    $objetoCon->desconectar($cone);
?>
    </center>
    
</body>
</html>