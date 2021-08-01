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



async function imprime_categorias() {
    let contenido1 = document.querySelector("#carta_categoria");

    res.forEach((element) => {

        const {id,  nombre} = element;
        console.log(element);
        contenido1.innerHTML = `
            <img class="card-img-top" src="../../src/img/banner/banner_dc5.png" alt="Card image cap">
            <div class="card-body"></div>
                <h5 name="nombre" id="nombre" class="card-title">${nombre}</h5>
                <button class="btn btn-dark btn-lg btn-block">Editar</button> 
                <button class="btn btn-danger btn-lg btn-block">Eliminar</button>    
            </div>
        `;

    });
    
    

    //img_restaurante.setAttribute("src", `../../src/img/restaurantes/${foto}`);
    

}
