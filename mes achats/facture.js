let body = document.querySelector('body');
let blure = document.createElement('div');
let table = document.querySelector("#customers");
let nav = document.querySelector('nav');
let quit = document.createElement("form");
let out = document.createElement("input");



table.style.display="none";

blure.classList.add('bluree');

body.appendChild(blure);

nav.style.display="none";

function xmjjjj(){
    window.location.href="../mes achats/achats.php";
    console.log(123);
}