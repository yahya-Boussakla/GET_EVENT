let body = document.querySelector('body');
let blure = document.createElement('div');
let table = document.querySelector("#customers");
let nav = document.querySelector('nav');
let facture = document.getElementById("factureSection");
let outBtn = document.getElementById("outer");
let printer = document.getElementById("printer");


table.style.display="none";

blure.classList.add('bluree');

body.appendChild(blure);

nav.style.display="none";

printer.addEventListener("click" , () => {
    window.print();
});

function outt(){
    table.style.display="";
    nav.style.display="flex";
    blure.remove();
    facture.remove();
    outBtn.remove();
}
