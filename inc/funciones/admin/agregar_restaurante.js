const listado_restaurante = document.querySelector("#form_agregar_restaurante");

document.addEventListener("DOMContentLoaded",() =>{

listado_restaurante.addEventListener("submit",registro_restaurante)

});

function registro_restaurante(e){

    e.preventDefault();

    const nombre = document.querySelector("#nombre").value;
    const desc_corta = document.querySelector("#desc_corta").value;
    const desc_larga = document.querySelector("#desc_larga").value;
    const estado = document.querySelector("#estado").value;
    const municipio = document.querySelector("#municipio").value;
    const ciudad = document.querySelector("#ciudad").value;
    const cp = document.querySelector("#cp").value;
    const telefono = document.querySelector("#telefono").value;
    const email = document.querySelector("#email").value;
    const acc = document.querySelector("#acc").value;

    datos.append("accion","registrar_restaurante");

    //alert(nombre, desc_corta, desc_larga, estado, municipio, ciudad, cp, telefono, email);

    console.log(acc);


}