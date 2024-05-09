<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Libro</title>
</head>
<body>
    <center>
        <header>
            <h1>Formulario Libro</h1>
        </header>
        <table border="1">
            <tbody>
                <tr>
                    <th scope="col">Titulo</th>
                    <th scope="col">paginas</th>
                    <th scope="col">Genero</th>
                    <th scope="col">Editorial</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Botones</th>
                </tr>

        <?php
            include_once("../Modelo/Conexion.php");
            $obgetocon = new Conexion();
            $conexion = $obgetocon->conectar();

            include_once("../Modelo/Libro.php");

            include_once("../Modelo/Genero.php");

            include_once("../Modelo/Editorial.php");

            include_once("../Modelo/Autor.php");

            $obgetoGenero = new Genero($conexion,0,'',);
            $resultadoGenero = $obgetoGenero->listar(0);
            
            $obgetoeditorial = new Editorial($conexion,0,'','');
            $resultadoEditorial  = $obgetoeditorial->listar(0);
            
            $obgetoAutor = new Autor($conexion,0,'','');
            $resultadoAutor= $obgetoAutor->listar(0);
            
            $obgetoLibro = new Libro($conexion, 0, '', '', '', '', '',);
            $listaLibro = $obgetoLibro->listar(0);
            
            while ($unregistro = mysqli_fetch_array($listaLibro)) {
                echo '<tr><form id="modificarlibro'.$unregistro["idlibro"].'" action="../Controlador/ControladorLibro2.php" method="post">';
                echo '<td><input type="hidden" name="idlibro" value="'.$unregistro['idlibro'].'">';
                echo '    <input type="text" name="titulo" value="'.$unregistro['titulo'].'"></td>';
                echo '<td><input type="number" name="paginas" value="'.$unregistro['paginas'].'"></td>';
                
                // Desplegable para editorial
                echo '<td><select name="editorial">';
                    while ($rowEditorial = mysqli_fetch_assoc($resultadoEditorial)) {
                        echo '<option value="'.$rowEditorial['ideditorial'].'"';
                        if ($unregistro['ideditorial'] == $rowEditorial['ideditorial']) {
                            echo ' selected';
                        }
                        echo '>'.$rowEditorial['nombre'].'</option>';
                    }
                echo '</select></td>';
            
                // Desplegable para género literario
                echo '<td><select name="genero">';
                    while ($rowGenero = mysqli_fetch_assoc($resultadoGenero)) {
                        echo '<option value="'.$rowGenero['idgeneroLiterario'].'"';
                        if ($unregistro['idgeneroLiterario'] == $rowGenero['idgeneroLiterario']) {
                            echo ' selected';
                        }
                        echo '>'.$rowGenero['descripcion'].'</option>';
                    }
                echo '</select></td>';
            
                // Desplegable para autor
                echo '<td><select name="autor">';
                    while ($rowAutor = mysqli_fetch_assoc($resultadoAutor)) {
                        echo '<option value="'.$rowAutor['idautor'].'"';
                        if ($unregistro['idautor'] == $rowAutor['idautor']) {
                            echo ' selected';
                        }
                        echo '>'.$rowAutor['nombre'].'</option>';
                    }
                echo '</select></td>';
                
            
                echo '<td><button type="submit" name="enviar" value="Modificar">Modificar</button>
                        <button type="submit" name="enviar" value="Eliminar">Eliminar</button></td>';
                echo '</form></tr>';
                
            $resultadoGenero = $obgetoGenero->listar(0);
            
            $resultadoEditorial  = $obgetoeditorial->listar(0);
            
            $resultadoAutor= $obgetoAutor->listar(0);
            
            }
            $resultadoGenero = $obgetoGenero->listar(0);
            
            $resultadoEditorial  = $obgetoeditorial->listar(0);
            
            $resultadoAutor= $obgetoAutor->listar(0);
            
        ?>
               <tr>
    <form id="Ingresarlibro" action="../Controlador/controladorlibro2.php" method="post">
        <td><input type="hidden" name="idlibro" value="0">
            <input type="text"  name="titulo"></td>
        <td><input type="number" name="paginas"></td>
        
        <td>
            <select name="editorial">
                <?php
                    
                    while ($rowEditorial = mysqli_fetch_assoc($resultadoEditorial)) {
                        echo '<option value="'.$rowEditorial['ideditorial'].'">'.$rowEditorial['nombre'].'</option>';
                    }
                ?>
            </select>
        </td>
        <!-- Desplegable para género -->
        <td>
            <select name="genero">
                <?php
                   
                    while ($rowGenero = mysqli_fetch_assoc($resultadoGenero)) {
                        echo '<option value="'.$rowGenero['idgeneroLiterario'].'">'.$rowGenero['descripcion'].'</option>';
                    }
                ?>
            </select>
        </td>
        <!-- Desplegable para autor -->
        <td>
            <select name="autor">
                <?php
                    while ($rowAutor = mysqli_fetch_assoc($resultadoAutor)) {
                        echo '<option value="'.$rowAutor['idautor'].'">'.$rowAutor['nombre'].'</option>';
                    }
                ?>
            </select>
        </td>
        <td>
            <button type="submit" name="enviar" value="Insertar">Insertar</button>
            <button type="submit" name="enviar" value="Limpiar">Limpiar</button>
        </td>
    </form>
</tr>

            </tbody>
        </table>
        <?php
            mysqli_free_result($listaLibro);
            $obgetocon->desconectar($conexion);
        ?>
    </center>
    
</body>
</html>