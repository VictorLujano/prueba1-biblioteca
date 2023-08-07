<?php

require_once 'conexion.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        header("Location: index.php?error=empty_fields");
        exit;
    }

    $sql = "SELECT * FROM usuarios WHERE usuario = '$username'";

    $resultado = $conn->query($sql);

    if ($resultado->num_rows == 1) {
        
        $row = $resultado->fetch_assoc();
        $Password = $row["password"];


        if ($password === $Password) {

            session_start();
            $_SESSION['username'] = $username;
            header("Location: principal.php");
            exit;

        } else {

            header("Location: index.php?error=invalid_credentials");
            exit;
        }
    } else {
        
        header("Location: index.php?error=invalid_credentials");
        exit;   
    }
}

?>
