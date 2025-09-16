<?php
session_start();

// Tiempo máximo de inactividad (en segundos)
$timeout = 300; // 5 minutos

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout) {
    session_unset();
    session_destroy();
    header("Location: index.html");
    exit();
}

$_SESSION['last_activity'] = time(); // Actualiza el tiempo de actividad
?>
