// 1 no

document.getElementById('contactForm').addEventListener('submit', function (e) {
  e.preventDefault();
  document.getElementById('formResponse').style.display = 'block';
  this.reset();
});


// No-2

  const roles = [
    "Web Developer in PHP",
    "Web Developer in Laravel",
    "Back-End"
  ];

  let index = 0;
  const roleElement = document.getElementById("role");

  function changeRole() {
    roleElement.classList.remove("fade-in");
    void roleElement.offsetWidth; // trigger reflow for restart
    roleElement.classList.add("fade-in");

    roleElement.textContent = roles[index];
    index = (index + 1) % roles.length;
  }

  // Run every 3 seconds
  setInterval(changeRole, 3000);

  // Initial load
  window.addEventListener('DOMContentLoaded', () => {
    changeRole();
  });

