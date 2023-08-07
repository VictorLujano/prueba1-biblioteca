<?php 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];
?>

<html>
<head>
    <title>Bibilioteca</title>
    <link rel="stylesheet" href="css/principal.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tangerine:wght@700&display=swap" rel="stylesheet">

</head>
<body>
    <h1>Biblioteca</h1>

    <button onclick="location.href='agregar.php'" class="boton">Agregar Libro</button>

    <br><br>

    <table>
        <tr>
            <th>id</th>
            <th>titulo</th>
            <th>autor</th>
            <th>categoria</th>
            <th>editorial</th>
            <th>idioma</th>
            <th>descripcion</th>
            <th>fecha de edicion</th>
            <th></th>
            <th></th>
        </tr>

        <?php 
        
        require_once 'conexion.php';

        if($conn) {
            $sql = "SELECT id, titulo, autor, categoria, editorial, idioma, descripcion, fecha_edicion FROM libros";
            $resultado = mysqli_query($conn, $sql);
            
            while ($row = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['titulo'] . "</td>";
                echo "<td>" . $row['autor'] . "</td>";
                echo "<td>" . $row['categoria'] . "</td>";
                echo "<td>" . $row['editorial'] . "</td>";
                echo "<td>" . $row['idioma'] . "</td>";
                echo "<td>" . $row['descripcion'] . "</td>";
                echo "<td>" . $row['fecha_edicion'] . "</td>";
                echo "<td><button onclick=\"location.href='actualizar.php?id=".$row['id']."'\" class=\"boton boton-actualizar\">Actualizar</button></td>";
                echo "<td><button onclick=\"eliminarRegistro('".$row['id']."')\" class=\"boton boton-eliminar\">Eliminar</button></td>";
                echo "</tr>";
            }

            mysqli_free_result($resultado);
            mysqli_close($conn);
        } else {
            echo "Error al conectar a la base de datos.";
        }
        ?>

    </table>

    <button onclick="location.href='cerrar_sesion.php'" class="boton">Cerrar Sesión</button>

    <script>
        function eliminarRegistro(id) {
            if (confirm("¿Deseas eliminar este registro?")) {
                location.href = "eliminar_registro.php?id=" + id;
            }
        }
    </script>

</body>
</html>