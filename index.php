<?php
// Tiempo máximo de inactividad (en segundos)
$timeout_duration = 1800;

session_start();

// Verificar si hay actividad reciente
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout_duration) {
    session_unset();
    session_destroy();
    header("Location: index.html");
    exit();
}

$_SESSION['last_activity'] = time(); // Actualiza la actividad
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SBA Login</title>
  <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
  <div class="login-container">
    <h1>Institutional Access</h1>
    <form id="loginForm">
      <label for="username">Username</label>
      <input type="text" id="username" required>

      <label for="password">Password</label>
      <input type="password" id="password" required>

      <button type="submit">Log In</button>
    </form>
    <p id="message" class="note"></p>
  </div>

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