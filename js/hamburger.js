document.addEventListener("DOMContentLoaded", () => {
  const hamburger = () => {
    document.getElementById("line1").classList.toggle("line1_active");
    document.getElementById("line2").classList.toggle("line2_active");
    document.getElementById("line3").classList.toggle("line3_active");
    document.getElementById("hamburger_nav").classList.toggle("hamburger_nav_active");
  };
  document.getElementById("hamburger_button").addEventListener("click", function () {
    hamburger();
  });
});
