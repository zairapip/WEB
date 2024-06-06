<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $surname = $_POST['surname'];
    $name = $_POST['name'];
    $telephone = $_POST['telephone'];
// URL de la API que deseas consumir
$url = "https://pipfaster.com:8443/v1/api/users/register/";

// Datos a enviar en el cuerpo de la solicitud
$data = array(

    "name" => $name,
    "surname" => $surname,
    "email" => $email,
    "password_hash" => $password,
    "username" => $username,
    "telephone" => $telephone 
);

// Convertir los datos a JSON
$jsonData = json_encode($data);

// Inicializar cURL
$ch = curl_init();

// Establecer opciones de cURL
curl_setopt($ch, CURLOPT_URL, $url); // URL a la que se enviará la solicitud
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // Retornar la respuesta como una cadena de texto en lugar de imprimirla
curl_setopt($ch, CURLOPT_POST, 1); // Usar método POST
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData); // Datos a enviar en el cuerpo de la solicitud
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); // Cabecera HTTP

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


curl_close($ch);

}

?>