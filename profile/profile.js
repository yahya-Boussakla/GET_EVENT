let editBtn = document.getElementById("editBtn");
let editBox = document.getElementById("editBox");
let infoBox = document.getElementById("info");
let returnBtn = document.getElementById("quite");


editBtn.addEventListener("click", () =>{
    editBox.style.display="flex";
    infoBox.style.display="none";
});

returnBtn.addEventListener("click", () =>{
    editBox.style.display="none";
    infoBox.style.display="flex";
});