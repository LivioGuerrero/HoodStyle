<?php

$server = "localhost";
$usuario = "root";
$password = "";
$basedeDatos= "db_hoodstyle";

    try {
        $con = new PDO("mysql:host=$server;dbname=$basedeDatos;", $usuario, $password);
       

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $telefono = $_POST["telefono"];
            $direccion = $_POST["direccion"];
            $correo = $_POST["correo"];
            $clave = $_POST["clave"]; 

            $sql = "INSERT INTO datos (nombre, telefono, direccion, correo, clave) 
                    VALUES (:nombre, :telefono, :direccion, :correo, :clave)";

            $stmt = $con->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':direccion', $direccion);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':clave', $clave);

            if ($stmt->execute()) {
                echo "Datos almacenados correctamente";
            } else {
                echo "Error al almacenar los datos";
            }
        }
    } catch (PDOException $e) {
        die('Error de conexión: ' . $e->getMessage());
    }
?>
