//import { enviar_datos,} from "../funciones_generales.js";

const url = "../../inc/peticiones/root/funciones.php";
const contenido_agregar = document.querySelector("#form_agregar");
const contenido_mostrar = document.querySelector("#form_categoria");


document.addEventListener("DOMContentLoaded", () => {
    contenido_agregar.addEventListener("submit",guardar);
});

async function guardar(){

    e.preventDefault();
    const datos = new FormData();
    const nombre = document.querySelector("#nombre").value;
    const imagen = document.querySelector("#imagen");


    datos.append("nombre", nombre);
    datos.append("imagen",imagen.files[0]);
    datos.append("accion", "registrar_categoria");
    //const res = await enviar_datos(url, datos);

    enviar_datos(url,datos).then((re) => console.log(re));
    //alert('CATEGORIA REGISTRADA');


}


/*
 res.forEach(respuesta => {
        const {nombre} = respuesta;
        div_restaurantes.innerHTML += `
        
        `;
    });*/