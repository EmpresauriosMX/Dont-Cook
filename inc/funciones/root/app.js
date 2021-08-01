import {enviar_datos} from "../funciones_generales.js";

const url = "../../inc/peticiones/root/funciones.php";
const contenido_agregar = document.querySelector("#form_agregar");
const contenido_mostrar = document.querySelector("#form_categoria");

const contenedor_eliminar = document.querySelector("#contenedor_eliminar");
const contenedor_editar = document.querySelector("#contenedor_editar");

let imagen_a_enviar = document.querySelector("#imagen"); //input
let imagen_previa = document.querySelector("#img_previa");

document.addEventListener("DOMContentLoaded", () => {
    contenido_agregar.addEventListener("submit",guardar);
    mostrar_categoria();
    contenedor_eliminar.addEventListener("click",eliminar);
    contenedor_editar.addEventListener("click",editar);
});


async function eliminar(){
    
}

async function editar(){
    
}

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

async function mostrar_categoria(){
    const datos = new FormData();
    datos.append("accion","info_categorias");
    const res = await enviar_datos(url, datos);
    console.log(res);
    //SI SE ENCUENTRA EL RESTAURANTE SE IMPRIME
    if(!res.respuesta){
        imprime_categorias(res);
    }
    else{
        mostrar_mensaje("error");
    }
}



async function imprime_categorias(res) {
    let contenido1 = document.querySelector("#carta_categoria");

    res.forEach((element) => {

        const {id,  nombre} = element;
        console.log(element);
        contenido1.innerHTML += `
        <div  class="card">
            <img class="card-img-top" src="../../src/img/banner/banner_dc5.png" alt="Card image cap">
            <div class="card-body"></div>
                <h5 name="nombre" id="nombre" class="card-title">${nombre}</h5>
                    <button id="contenedor_editar" class="btn btn-dark btn-lg btn-block">Editar</button> 
                    <button id="contenedor_eliminar" class="btn btn-danger btn-lg btn-block">Eliminar</button>
            </div>
        </div>
        `;

    });
    
    

    //img_restaurante.setAttribute("src", `../../src/img/restaurantes/${foto}`);
    

}
