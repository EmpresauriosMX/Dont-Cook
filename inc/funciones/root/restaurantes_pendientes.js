import { enviar_datos, mostrar_ubicacion, mostrar_mensaje, } from "../funciones_generales.js";
const url = "../../inc/peticiones/root/funciones.php";

const contenedor_restaurantes = document.querySelector("#contenedor_restaurante");
const contenedor = document.querySelector("#container");

document.addEventListener("DOMContentLoaded", () => {
  mostrar_usuarios();
  contenedor_restaurantes.addEventListener("click",editar_estado);
});


async function mostrar_usuarios() {
  const datos = new FormData();
  datos.append("accion", "mostrar_restaurantes_pendientes");
  const res = await enviar_datos(url, datos);
const reverso = res.reverse();  
  limpiar_html();
  usuarios_html(reverso);

}

async function editar_estado(e) {
    console.log(e.target);
    if (e.target.classList.contains("btn_cambiar")) {
        console.log(e.target.dataset.id)
        const id = e.target.dataset.id
            const estado = e.target.dataset.estado;
            
          const cambio_estado =   parseInt(estado) == 1 ? 0 : 1;


          const datos = new FormData();
          datos.append("estado", cambio_estado);
          datos.append("id_restaurante", id )
          datos.append("accion", "cambiar_estado_restaurante");
          const res = await enviar_datos(url, datos);
          mostrar_usuarios();


    
    }
}

function usuarios_html(datos) {
    let clase_pintar = "";

    console.log(datos);
    datos.forEach((restaurante) => {
        console.log(restaurante);
    const {id, nombre, /*lugar, horario,*/ descripcion, imagen, estado } = restaurante;
    let imagen_real = imagen
    if(imagen_real == null){
      imagen_real = "fondo.png"
    }
    if(estado === 1){
        var clase = "success";
    }
    else{
        var clase = "danger";
    }
    contenedor_restaurantes.innerHTML += `
                <div class="blog-card bg-${clase} col-md-12 col-sm-12 col-xs-12 col-lg-5 mx-auto">
                    <div class="meta">
                        <div class="photo" style="background-image: url(../../src/img/restaurantes/${imagen_real}"></div>
                    </div>
                    <div class="description">
                        <h4>${nombre}</b></h4>
                        <h5>Abierto / Cerrado</h5>
                        <p class=""><small class="text-muted">${descripcion}</small></p>
                        <div class="row">
                            <div class="read-more mt-2">
                                <input class="btn btn-primary btn_cambiar" data-estado="${estado}" data-id="${id}" type="button" value="cambiar estado">
                                <a href="root_restaurante_ver.php?r=${id}" class="btn btn-outline-secondary btn-sm">
                                    <span class="fa fa-eye" ></span> Visitar
                                </a>
                            </div>
                            
                                
                            
                        </div>  
                        
                    </div>
                </div>
                `;
    });
}

function limpiar_html() {
    contenedor_restaurantes.innerHTML = "";
}