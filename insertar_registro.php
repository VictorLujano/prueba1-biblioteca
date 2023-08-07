<?php
require_once 'conexion.php';


$id = $_POST['id'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$categoria = $_POST['categoria'];
$editorial = $_POST['editorial'];
$idioma = $_POST['idioma'];
$descripcion = $_POST['descripcion'];
$fecha_edicion = $_POST['fecha_edicion'];


if ($conn) {

    $sql = "INSERT INTO libros (id, titulo, autor, categoria, editorial, idioma, descripcion, fecha_edicion) VALUES ('$id', '$titulo', '$autor', '$categoria', '$editorial', '$idioma', '$descripcion', '$fecha_edicion')";

    $resultado = mysqli_query($conn, $sql);

    mysqli_close($conn);

    if ($resultado) {
        header("Location: principal.php");
        exit();
    
    } else {
        echo "Error al insertar en la base de datos.";
    }
} else {
    echo "Error al conectar a la base de datos.";
}
?>
