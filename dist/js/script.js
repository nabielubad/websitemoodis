const menuBar = document.querySelector(".menu-bar");
const menuNav = document.querySelector(".menubro");
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
function funedit() {
  const tujuan = document.getElementById("edit");
  if (tujuan) {
    tujuan.scrollIntoView({ behavior: "smooth" });
  }
}
function clearForm() {
  var form = document.getElementById("frm");

  var inputs = form.getElementsByTagName("input");
  for (var i = 0; i < inputs.length; i++) {
    if (inputs[i].type == "text" || inputs[i].type == "file") {
      inputs[i].value = "";
    }
  }
}

var overlay = document.getElementById("loginOverlay");
var toggleOverlayButton = document.getElementById("showLoginBtn");
var loginForm = document.getElementById("logov");
var registerForm = document.getElementById("regov");
var switchToRegisterButton = document.getElementById("toglereg");
var switchToLoginButton = document.getElementById("toglelog");

toggleOverlayButton.addEventListener("click", function () {
  if (overlay.style.display === "none" || overlay.style.display === "") {
    overlay.style.display = "block";
  } else {
    overlay.style.display = "none";
  }
});
switchToRegisterButton.addEventListener("click", function () {
  loginForm.style.display = "none";
  registerForm.style.display = "block";
});
switchToLoginButton.addEventListener("click", function () {
  registerForm.style.display = "none";
  loginForm.style.display = "block";
});
