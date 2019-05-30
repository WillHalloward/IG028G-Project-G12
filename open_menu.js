function openNav() {
    document.getElementById("menu").style.width = "300px";
    document.getElementById("bar").style.marginLeft = "0px";
}

function closeNav() {
    document.getElementById("menu").style.width = "0";
    document.getElementById("bar").style.marginLeft = "0";
}

window.onscroll = function () {
    myFunction()
};

const huvud = document.getElementById("Huvud");
const fast = huvud.offsetTop;

function myFunction() {
    if (window.pageYOffset > fast) {
        huvud.classList.add("fast");
    } else {
        huvud.classList.remove("fast");
    }
}
