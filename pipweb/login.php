<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    
    // URL de la API que deseas consumir
    $url = "https://pipfaster.com:8443/v1/api/users/gets/";
    
    // Usar file_get_contents para obtener el contenido de la URL
    $response = file_get_contents($url);
    
    // Verificar si hubo algún error
    if ($response === FALSE) {
        echo "Error al consumir la API";
        curl_close($ch);
    } else {
        // Convertir la respuesta JSON a un array asociativo
        
       // Convertir la respuesta JSON a un array asociativo
    $data = json_decode($response, true);
    }
    foreach ($data as $user) {
        if ($user['email'] === $email) {
            $_SESSION['username'] = $username;
            echo "Inicio de sesión exitoso. ¡Bienvenido, $username!";
            header("Location: riders.php");
        }else{
            header("Location: ErrorInicio.html");
        }

}
}

?>