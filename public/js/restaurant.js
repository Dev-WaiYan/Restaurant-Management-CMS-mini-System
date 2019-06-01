//menu-bar
function menuClick() {
    document.getElementById('menu').style.display = "block";
    document.getElementById('menu-bar').style.display = "none";
    document.getElementById('menu-close').style.display = "initial";
}

function menuClose() {
    document.getElementById('menu').style.display = "none";
    document.getElementById('menu-bar').style.display = "initial";
    document.getElementById('menu-close').style.display = "none";
}