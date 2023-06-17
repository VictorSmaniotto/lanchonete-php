const btnMenu = document.getElementById("btnMenu");
const btnClose = document.getElementById("btnClose");
const menu = document.getElementById("menu-principal");

btnMenu.addEventListener("click", function (e) { 
    e.preventDefault();
    menu.classList.toggle("menuShow");
});

btnClose.addEventListener("click", function (e) { 
    e.preventDefault();
    menu.classList.toggle("menuShow");
});

