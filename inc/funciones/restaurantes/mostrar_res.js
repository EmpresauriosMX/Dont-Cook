import {mostrar_ubicacion, enviar_datos} from "../funciones_generales.js";
//import {Ubicacion,btn_confirmar_ciudad, select_ciudad,obj} from "../ubicacion.js";

const url = "../../inc/peticiones/admin/funciones.php";

//Documentos
//const contenido1 = document.querySelector("#form_contenido_restaurante");
const contenido2 = document.querySelector("#form_segundo_contenido");


document.addEventListener("DOMContentLoaded",() =>{
    mostrar_restaurante();
    //const ubicacion = new Ubicacion();
    //ubicacion.buscar();
    //select_ciudad.addEventListener("change", ubicacion.obtener);
    //btn_confirmar_ciudad.addEventListener("click", mostrar_restaurante);
    //console.log(mostrar_ubicacion());
});

async function mostrar_restaurante(){

    //limpiar_contenedor();
    //e.preventDefault();
    const datos = new FormData();

    const ciudad = mostrar_ubicacion().ciudad;
    datos.append("ciudad", ciudad)
    
    datos.append("accion","info_restaurantes");
    const res = await enviar_datos(url, datos);
    console.log(res);


        let contenido1 = document.querySelector("#form_contenido_restaurante");
        res.forEach(respuesta => {
            const { id_restaurante, nombre, descripcion} = respuesta;
            contenido1.innerHTML += `
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="">
                        <img src="../../inc/funciones/restaurantes/product-5.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-eye"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">${descripcion}</a></h6>
                            <h5>${nombre}</h5>
                        </div>
                    </div>
                </div>
            `;
        });
    


}

/*
function limpiar_contenedor() {
    contenido1.innerHTML ="";
}*/