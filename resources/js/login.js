
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
