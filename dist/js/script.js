const menuBar = document.querySelector(".menu-bar");
const menuNav = document.querySelector(".menu");
const navBar = document.querySelector(".navbar");

menuBar.addEventListener("click", () => {
  menuNav.classList.toggle("menu-active");
  if (window.scrollY === 0) {
    navBar.classList.toggle("scrolling-active");
  }
});

window.addEventListener("scroll", () => {
  console.log(window.scrollY);
  const windowPosition = window.scrollY > 0;
  //const windowps = (window.scrollY = 0);
  navBar.classList.toggle("scrolling-active", windowPosition);
  menuNav.classList.remove("menu-active");
});
function arahkanKeTujuan() {
  const tujuan = document.getElementById("laporkan");
  if (tujuan) {
    tujuan.scrollIntoView({ behavior: "smooth" });
  }
}
