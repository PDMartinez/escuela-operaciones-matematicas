<?php
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=escuela", "root", "");
        // $conexion = new PDO("mysql:host=localhost;dbname=compumar_escuela", "compumar_escuela", "compumar_escuela123");
        $conexion->exec("set names utf8");
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }
?>