<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Actualizar</title>
    <link rel="stylesheet" href="css/actualizar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tangerine:wght@700&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Actualizar Datos del Libro</h1>

    <?php

    require_once 'conexion.php';



    if ($conn) {

        $id = $_GET['id'];

        $sql = "SELECT * FROM libros WHERE id = '$id'";
        $resultado = mysqli_query($conn, $sql);

        if ($resultado) {

            $row = mysqli_fetch_assoc($resultado);
            $titulo = $row['titulo'];
            $autor = $row['autor'];
            $categoria = $row['categoria'];
            $editorial = $row['editorial'];
            $idioma = $row['idioma'];
            $descripcion = $row['descripcion'];
            $fecha_edicion = $row['fecha_edicion'];
    
            mysqli_free_result($resultado);
            mysqli_close($conn);
        }else {
            echo "Error al obtener los datos del registro: " . mysqli_error($conn);
        }
    } else {
        echo "Error al conectar a la base de datos.";
        exit();
    }
    ?>

    <div class="contenedor">
    <form method="POST" action="actualizar_registro.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="campo">
        <label class="contenedor__texto" for="titulo">Titulo:</label>
        <input class="contenedor__input" type="text" id="titulo" name="titulo" value="<?php echo $titulo; ?>" required>
        </div>

        <div class="campo">
        <label class="contenedor__texto" for="autor">Autor:</label>
        <input class="contenedor__input" type="text" id="autor" name="autor" value="<?php echo $autor; ?>" required>
        </div>

        <div class="campo">
        <label class="contenedor__texto" for="categoria">Categoria:</label>
        <input class="contenedor__input" type="text" id="categoria" name="categoria" value="<?php echo $categoria; ?>" required>
        </div>

        <div class="campo">
        <label class="contenedor__texto" for="editorial">Editorial:</label>
        <input class="contenedor__input" type="text" id="editorial" name="editorial" value="<?php echo $editorial; ?>" required>
        </div>

        <div class="campo">
        <label class="contenedor__texto" for="idioma">Idioma:</label>
        <input class="contenedor__input" type="text" id="idioma" name="idioma" value="<?php echo $idioma; ?>" required>
        </div>

        <div class="campo">
        <label class="contenedor__texto" for="descripcion">Descripcion:</label>
        <input class="contenedor__input" type="text" id="descripcion" name="descripcion" value="<?php echo $descripcion; ?>" required>
        </div>
        
        <div class="campo">
        <label class="contenedor__texto" for="fecha_edicion">Fecha de edicion:</label>
        <input class="contenedor__input" type="date" id="fecha_edicion" name="fecha_edicion" value="<?php echo $fecha_edicion; ?>">
        </div>
        
        <input class="contenedor__boton" type="submit" value="Actualizar Registro">
    </form>
    </div>

    <button class="regresar" onclick="window.location.href='principal.php'">Regresar</button>

</body>
</html>
