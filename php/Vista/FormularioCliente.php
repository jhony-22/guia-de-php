<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Clinte</title>
</head>
<body>
    <header>
        <h1>Formulario Cliente</h1>
    </header>
    <table border="1">
        <tbody>
            <tr>
                <th scope="col">Nombre Cliente</th>
                <th scope="col">Documento Cliente</th>
                <th scope="col">Email Cliente</th>
                <th scope="col"></th>
            </tr>
    <?php
        include_once("../Modelo/Conexion.php");
        $objetoConexion = new Conexion();
        $conexion = $objetoConexion->conectar();

        include_once("../Modelo/Cliente.php");
        $objetoCliente = new Cliente($conexion,0,'nombre','documento','correo');
        $listaClientes = $objetoCliente->listar(0);
        while($unregistro = mysqli_fetch_array($listaClientes)){
            echo '<tr><form id="fmodificarCliente'.$unregistro["idCliente"].'" action="../Controlador/ControladorCliente.php"
            method="post"">';
            echo '<td><input type="hidden" name="fIdCliente"   value="'.$unregistro['idCliente'].'">';
            echo '    <input type="text"   name="fNombreCliente"  value="'.$unregistro['nombreCliente'].'"></td>';
            echo '<td><input type="number" name="fDocumentoCliente" value="'.$unregistro['documentoCliente'].'"></td>';
            echo '<td><input type="email"  name="fCorreoCliente"   value="'.$unregistro['correoCliente'].'"></td>';
            
            echo '<td><button type="submit" name="fEnviar"  value="Modificar">Modificar</button>
                      <button type="submit" name="fEnviar"  value="Eliminar">Eliminar</button></td>';
            echo '</form></tr>';

            
        }    
    ?>
            <tr><form id="fIngresarCliente" action="../Controlador/ControladorCliente.php" method="post">
                <td><input type="hidden" name="fIdCliente" value="0">
                <input type="text"  name="fNombreCliente"></td>
                <td><input type="number" name="fDocumentoCliente"></td>
                <td><input type="email" name="fCorreoCliente"></td>
                <td><button type="submit" name="fEnviar" value="Ingresar">Insertar</button>
                    <button type="submit" name="fEnviar" value="Limpiar">Limpiar</button></td>
            </form></tr>
        </tbody>
    </table>
<?php
    mysqli_free_result($listaClientes);
    $objetoConexion->desconectar($conexion);
?>
    
</body>
</html>

