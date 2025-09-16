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