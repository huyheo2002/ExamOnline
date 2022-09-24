
var p = document.getElementById('pwd');
var pwShown = false;

document.getElementById("eye").addEventListener("click", function () {
    if (pwShown == false) {
        pwShown = true;
        p.setAttribute('type', 'text');
    } else {
        pwShown = false;
        p.setAttribute('type', 'password');
    }
});

var p1 = document.getElementById('pwd-confirm');
var pwShown1 = false;

document.getElementById("eye-confirm").addEventListener("click", function () {
    if (pwShown1 == false) {
        pwShown1 = true;
        p1.setAttribute('type', 'text');
    } else {
        pwShown1 = false;
        p1.setAttribute('type', 'password');
    }
});