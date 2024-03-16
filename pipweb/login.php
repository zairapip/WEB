<?php
session_start();
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_type = $_POST['user_type'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar el tipo de usuario y redirigir a la página correspondiente
    if ($user_type == 1) {
        // Verificar si el usuario y la contraseña coinciden
            $sql = "SELECT * FROM triders WHERE email ='$username'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row['password'])) {
                    // Inicio de sesión exitoso
                    $_SESSION['username'] = $username;
                    echo "Inicio de sesión exitoso. ¡Bienvenido, $username!";
                    header("Location: riders.php");
                } else {
                    echo "Contraseña incorrecta";
                }
            } else {
                echo "Usuario no encontrado";
            }
            
    } elseif ($user_type == 2) {
        // Verificar si el usuario y la contraseña coinciden
        $sql = "SELECT * FROM tsenders WHERE email ='$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                // Inicio de sesión exitoso
                $_SESSION['username'] = $username;
                echo "Inicio de sesión exitoso. ¡Bienvenido, $username!";
                header("Location: senders.php");
            } else {
                echo "Contraseña incorrecta";
            }
        } else {
            echo "Usuario no encontrado";
        }
        
    } else {
        // Tipo de usuario no válido
        echo "Tipo de usuario no válido";
    }
}

$conn->close();
?>