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

    $sql = "UPDATE libros SET titulo = '$titulo', autor = '$autor', categoria = '$categoria', editorial = '$editorial', idioma = '$idioma', descripcion = '$descripcion', fecha_edicion = '$fecha_edicion' WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: principal.php");
        exit();
    } else {
        echo "Error al actualizar el registro: " . mysqli_error($conn);
    }
    mysqli_close($conn);
} else {
    echo "Error al conectar a la base de datos.";
}
?>
