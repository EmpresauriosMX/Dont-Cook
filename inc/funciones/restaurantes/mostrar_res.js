import {recibir_datos,mostrar_ubicacion} from "../funciones_generales.js";
import {Ubicacion,select_ciudad,obj} from "../ubicacion.js";

const url = "../../inc/peticiones/admin/funciones.php";

//Documentos
const contenido1 = document.querySelector("#form_contenido_restaurante");
const contenido2 = document.querySelector("#form_segundo_contenido");

document.addEventListener("DOMContentLoaded",() =>{

    const ubicacion = new Ubicacion();
    ubicacion.buscar();
    select_ciudad.addEventListener("change", ubicacion.obtener);
    contenido2.addEventListener("submit", mostrar_restaurante);
    console.log(mostrar_ubicacion());
});

function mostrar_restaurante(e){

    e.preventDefault();
    const datos = new FormData();
    
    

}