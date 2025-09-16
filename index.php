<?php
session_start();

// Tiempo máximo de inactividad (30 minutos)
$timeout_duration = 1800;

// Verifica si hay actividad previa
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout_duration) {
    // Cierra sesión por inactividad
    session_unset();
    session_destroy();
    header("Location: index.php"); // Redirige al inicio
    exit();
}

// Actualiza el tiempo de actividad
$_SESSION['last_activity'] = time();
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="themes/custom/sba/favicon.ico" type="image/vnd.microsoft.icon" style="opacity: 100%;"/>
  <title>SBA Login</title>
  
  <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
  <div class="login-container">
    <img src="themes/custom/sba/dist/img/logo-horizontal.svg" alt="SBA Home" width="206" height="56">
    <form id="loginForm" action="loginForm">
      <label for="username">Username</label>
      <input type="text" id="username" required>

      <label for="password">Password</label>
      <input type="password" id="password" required>

      <button type="submit">Log In</button>
    </form>
    <p id="message" class="note"></p>
  </div>

    <script src="JS/validate.js"></script>
    <script src="JS/main.js" defer></script>

  <script>
    const validUsers = {
      "andi": "sba2025",

    };

    document.getElementById("loginForm").addEventListener("submit", function(e) {
      e.preventDefault();
      const user = document.getElementById("username").value.trim();
      const pass = document.getElementById("password").value.trim();
      const message = document.getElementById("message");

      if (validUsers[user] && validUsers[user] === pass) {
        message.textContent = "✅ Access granted. Welcome!";
        message.style.color = "#00ffcc";

        window.location.href = "andisbaindex.html"

        // You can redirect here if needed:
        // window.location.href = "confirmation.html";
      } else {
        message.textContent = "❌ Invalid credentials. Try again.";
        message.style.color = "#ff4444";
      }
    });
  </script>
</body>
</html>
