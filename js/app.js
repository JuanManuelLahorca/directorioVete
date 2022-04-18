"use strict"

const API_URL = "http://localhost/directorioVete/api/vet";

let Localidad = getParameterByName("localidad");
console.log(Localidad);
async function getVets(Localidad) {
    //fetch para traer todos los veterinario
    try{
        let response = await fetch(API_URL);
        let vets = await response.json();
        
    console.log(vets);
        render(vets, Localidad);
    }
    catch (e){
        console.log(e);
    }
}

function render(vets, Localidad) {
    let lista = document.querySelector("#list-vets");
    lista.innerHTML = "";
    for (let vet of vets) {
        if(Localidad == vet.City){
            let html = `<li class="list-Vets"> ${vet.Name} - ${vet.State} -  
            ${vet.City} - ${vet.Phone} </li>`;
            lista.innerHTML += html;  
        }
    }
}

function getParameterByName(localidad) {
    localidad = localidad.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    let regex = new RegExp("[\\?&]" + localidad + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

getVets(Localidad);


