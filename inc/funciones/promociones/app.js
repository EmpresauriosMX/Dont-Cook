import { enviar_datos, mostrar_ubicacion, mostrar_mensaje } from "../funciones_generales.js";

//const url = "../../inc/peticiones/promociones/funciones.php";
const titulo = document.querySelector("#titulo_promociones");
const tienes_ciudad = mostrar_ubicacion().ciudad;

//RECIBE POR GET UNA CATEGORIA
document.addEventListener("DOMContentLoaded", () => {
    //SI LE PASAMOS UNA CATEGORIA LO BUSCARA
    if (!tienes_ciudad) {
        sin_ciudad();    
    }else{
        mostrar_restaurantes_categoria(categoria);
    }
    
});
//si no tiene una ciudad registrada
function sin_ciudad(){
    mostrar_mensaje("sin_ciudad");
    const titulo_promociones = document.querySelector("#titulo_promociones");
    const titulo_promociones_todas = document.querySelector("#titulo_promociones_todas");
    const contenido_promociones = document.querySelector("#contenido_promociones");
    contenido_promociones.innerHTML = "";
    titulo_promociones_todas.innerHTML = "";
    titulo_promociones.innerHTML = ``;
}
