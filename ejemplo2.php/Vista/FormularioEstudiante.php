<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Estudiante</title>
</head>
<body>
    <center> 
    <header>
        <h1>Formulario Estudiante</h1>
    </header>
    <table border="1">
        <tbody>
            <tr>
                <th scope="col">Nombre </th>
                <th scope="col">Direccion </th>
                <th scope="col">Documento</th>
                <th scope="col">fechaNacimiento</th>
                <th scope="col">correoElectronico</th>
                <th scope="col">Botones</th>
            </tr>
    <?php
        include_once("../Modelo/Conexion2.php");    
        $objetoCon = new Conexion2();
        $cone = $objetoCon->conectar();

        include_once("../Modelo/Estudiante.php");
        $objetoEstu = new Estudiante($cone,0,'nombre','direccion','documento','fechaNacimiento','correoEelectronico');
        $listaEstu = $objetoEstu->listar(0);
        while($unRegistro = mysqli_fetch_array($listaEstu)){
            echo '<tr><form id="fmodificarEstudiante'.$unRegistro["idEstudiante"].'" action="../Controlador/ControladorEstudiante.php"
            method="post"">';
            echo '<td><input type="hidden"  name="fIdEstudiante" value="'.$unRegistro['idEstudiante'].'">';
            echo '     <input type="text"   name="fNombre" value="'.$unRegistro['nombre'].'"</td>';
            echo '<td><input type="text"    name="fDireccion"  value="'.$unRegistro['direccion'].'"></td>';
            echo '<td><input type="number"  name="fDocumento"  value="'.$unRegistro['documento'].'"></td>';
            echo '<td><input type="date"    name="fFechaNacimiento" value="'.$unRegistro['fechaNacimiento'].'"></td>';
            echo '<td><input type="email"   name="fCorreoElectronico" value="'.$unRegistro['correoElectronico'].'"></td>';

            echo  '<td> <button type="submit" name="fEnviar"  value="Modificar">Modificar</button>
                        <button type="submit" name="fEnviar"  value="Eliminar">Eliminar</button></td>';
            echo '</form></tr>';

        }
    ?>
            <tr><form id="FIngresarEstudiante"action="../Controlador/ControladorEstudiante.php" method="post">
                <td><input type="hidden" name="fIdEstudiante" value="0">
                    <input type="text" name="fNombre"></td>
                <td><input type="text" name="fDireccion"></td>
                <td><input type="number" name="fDocumento"></td>
                <td><input type="date"  name="fFechaNacimiento"></td>
                <td><input type="email" name="fCorreoElectronico"></td>

                <td><button type="submit" name="fEnviar" value="Insertar">Insertar</button>
                    <button type="submit" name="fEnviar" value="Limpiar">Limpiar</button></td>
            </form></tr>
        </tbody>
    </table>
<?php
    mysqli_free_result($listaEstu);
    $objetoCon->desconectar($cone);
?>
    </center>
    
</body>
</html>
