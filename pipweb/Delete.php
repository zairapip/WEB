<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $id = $_POST['id'];
  
    // URL de la API que deseas consumir
    $url = "https://pipfaster.com:8443/v1/api/users/er/".$id;
    
   

    // Inicializar cURL
    $ch = curl_init();
    
    // Establecer opciones de cURL
    curl_setopt($ch, CURLOPT_URL, $url); // URL del endpoint
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // Retornar la respuesta como una cadena de texto
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE"); // Método HTTP DELETE
    
    
    // Ejecutar la solicitud y almacenar la respuesta en una variable
    $response = curl_exec($ch);
    
    // Verificar si hubo algún error
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
        curl_close($ch);
    } else {
        curl_close($ch);
        header("Location: riders.php");
    }
}

?>