window.addEventListener('load', () => {
  setTimeout(() => {
    const preloader = document.getElementById('preloader');
    if (preloader) {
      preloader.style.opacity = '0';
      preloader.style.transition = 'opacity 0.5s ease';
      setTimeout(() => {
        preloader.style.display = 'none';
        document.body.style.overflow = 'auto';

      }, 7000); // espera a que termine la transición
    }
  }, 5000); // ⏱️ 5000 milisegundos = 5 segundos
});

 function updateDate() {
      const days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
      const months = ["January", "February", "March", "April", "May", "June",
                     "July", "August", "September", "October", "November", "December"];

      const now = new Date();
      const dayOfWeek = days[now.getDay()];
      const day = now.getDate();
      const month = months[now.getMonth()];
      const year = now.getFullYear();

      const text = `Today is ${dayOfWeek}, ${month} ${day}, ${year}`;
      document.getElementById("date").textContent = text;
    }

    updateDate();

    