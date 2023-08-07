
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
    <title>Agregar Libro</title>
    <link rel="stylesheet" href="css/agregar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tangerine:wght@700&display=swap" rel="stylesheet">

</head>
<body>
    <h1>Agregar un libro nuevo</h1>

    <div class="contenedor">
    <form method="POST" action="insertar_registro.php">
        <div class="campo">
        <label class="contenedor__texto" for="id">Codigo del libro: </label>
        <input class="contenedor__input" type="text" id="id" name="id" required>
        </div>

        <div class="campo">
        <label class="contenedor__texto" for="titulo">Titulo:</label>
        <input class="contenedor__input" type="text" id="titulo" name="titulo" required>
        </div>

        <div class="campo">
        <label class="contenedor__texto" for="autor">Autor:</label>
        <input class="contenedor__input" type="text" id="autor" name="autor" required>
        </div>

        <div class="campo">
        <label class="contenedor__texto" for="categoria">Categoria:</label>
        <input class="contenedor__input" type="text" id="categoria" name="categoria" required>
        </div>

        <div class="campo">
        <label class="contenedor__texto" for="editorial">Editorial:</label>
        <input class="contenedor__input" type="text" id="editorial" name="editorial" required>
        </div>

        <div class="campo">
        <label class="contenedor__texto" for="idioma">Idioma:</label>
        <input class="contenedor__input" type="text" id="idioma" name="idioma" required>
        </div>

        <div class="campo">
        <label class="contenedor__texto" for="descripcion">Descripcion:</label>
        <input class="contenedor__input" type="text" id="descripcion" name="descripcion" required>
        </div>

        <div class="campo">
        <label class="contenedor__texto" for="fecha_edicion">Fecha de edicion:</label>
        <input class="contenedor__input" type="date" id="fecha_edicion" name="fecha_edicion">
        </div>

        <input class="contenedor__boton" type="submit" value="Insertar Registro">
    </form>
    </div>

    <button class="regresar" onclick="window.location.href='principal.php'">Regresar</button>

</body>
</html>
