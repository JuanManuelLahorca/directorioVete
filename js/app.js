"use strict";

const API_URL = "https://directorioveterinario.campoymedio.com/api/vet";

let params = new URLSearchParams(location.search);
let Localidad = params.get('localidad');
let Provincia = params.get('provincia');
let provincia = "";
let localidad = "";
if(Provincia !== null){
    provincia = Provincia.toUpperCase();
    console.log(provincia);
}
if(Localidad !== null){
    localidad = Localidad.toUpperCase();
    console.log(localidad); 
}
getVets(localidad, provincia);
async function getVets(localidad, provincia) {
    //fetch para traer todos los veterinario
    try{
        let response = await fetch(API_URL);
        let vets = await response.json();
        if (localidad !== "" && provincia !== "" ){
            render(vets, localidad, provincia);
        }
    }
    catch (e){
        console.log(e);
    }
}


function render(vets,localidad, provincia) {  
    let tabla = document.querySelector("#table-vets"); 
    let titulo = document.querySelector("#title-table-vets");
    titulo.innerHTML += `<h2>Listado de veterinarios disponibles por zonas</h2>`;
    tabla.innerHTML = "";
    let html = `<tr class="tr-cabecera">
                    <td>Nombre</td>
                    <td>Provincia</td>
                    <td>Localidad</td>
                    <td>Telefono</td>
                </tr>`;
    tabla.innerHTML += html;
    for (let vet of vets) {
        if((provincia == vet.State.toUpperCase()) && (localidad == vet.City.toUpperCase()) && (vet.Role == 'p')){
                let contenido = `<tr class="tr-cuerpo"> 
                            <td> <i class="fa-solid fa-user"></i>  ${vet.Name} </td>
                            <td> <i class="fa-solid fa-map-location-dot"></i>  ${vet.State} </td>
                            <td> <i class="fa-solid fa-location-dot"></i>  ${vet.City} </td>
                            <td> <i class="fa-brands fa-whatsapp"></i>  ${vet.Phone} </td>
                        </tr>`;
            tabla.innerHTML += contenido; 
        } 
    } 
}

function getParameterByName(localidad) {
    localidad = localidad.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    let regex = new RegExp("[\\?&]" + localidad + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}



