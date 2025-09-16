document.getElementById('registroForm').addEventListener('submit', function(e) {
  const nombre = document.getElementById('nombre').value.trim();
  const cuenta = document.getElementById('cuenta').value.trim();
  const ultimos4 = cuenta.slice(-4); // Get last 4 digits 
  const monto = document.getElementById('monto').value.trim();

  if (!nombre || !cuenta || !monto) {
    alert('Por favor, completa todos los campos.');
    e.preventDefault();
  }
});

  const inputMonto = document.getElementById("monto");

  inputMonto.addEventListener("blur", () => {
    let raw = inputMonto.value.replace(/,/g, '').trim(); // Elimina comas previas
    let num = parseFloat(raw);

    if (!isNaN(num)) {
      inputMonto.value = num.toLocaleString('en-US', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
      });
    } else {
      inputMonto.value = ''; // Limpia si no es válido
    }
  });



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



    // Tiempo máximo de inactividad (en segundos)
$timeout_duration = 1800;

session_start();

// Verificar si hay actividad reciente
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout_duration) {
    session_unset();
    session_destroy();
    header("Location: andisbaindex.html");
    exit();
}

$_SESSION['last_activity'] = time(); // Actualiza la actividad