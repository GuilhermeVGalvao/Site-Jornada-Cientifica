let div_menu = document.getElementById("div-menu");
let mobileMenu = document.getElementById("nav-menu-mobile");
let showMobileMenuNow = false;


function showMobileMenu() {
  showMobileMenuNow = !showMobileMenuNow;

  if(showMobileMenuNow) {
    mobileMenu.classList.remove("no-show");
    mobileMenu.classList.add("show");
  } else {
    mobileMenu.classList.remove("show");
    mobileMenu.classList.add("no-show");
  }
  console.log(window.DOMPoint);
}
