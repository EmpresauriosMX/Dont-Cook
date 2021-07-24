import {mostrar_ubicacion, enviar_datos, mostrar_mensaje} from "../funciones_generales.js";
const url = "../../inc/peticiones/admin/funciones.php";
var id_restaurante = "";
var ID_RESTAURANTE_P = "";
var enviar_menu = document.querySelector("#enviar_el_menu");
let id_envio_cambio ;
var promociones = document.querySelector("#promos");
var btn_promo = document.querySelector("#btn-promo");
var div_promociones = document.querySelector("#contenido_promociones");   

//imagen previa
let imagen_a_enviar = document.querySelector("#imagen"); //input
let imagen_previa = document.querySelector("#img_previa");

let imagen_a_enviar_cambio = document.querySelector("#imagen_cambio"); //input
let imagen_previa_cambio = document.querySelector("#img_previa_cambio");


const btn_modal_guardar_imagen = document.querySelector("#guardar_la_nueva_imagen");

const datos_cambio_imagen = {
    'tipo': "" ,
    'id': ""
}

var quill = new Quill('#editor', {
    theme: 'snow'
});

//CON ESTO OBTENEMOS EL ID DEL RESTAURANTE POR LA URL
document.addEventListener("DOMContentLoaded", () => {
    const parametrosURL = new URLSearchParams(window.location.search);
    let restaurante = parametrosURL.get("r");
    enviar_menu.addEventListener("click",jssave);
    imagen_a_enviar_cambio.addEventListener('change',mostrar_imagen_seleccionada_cambio);
    imagen_a_enviar.addEventListener("change",mostrar_imagen_seleccionada);
    //SI LE PASAMOS UN RESTAURANTE LO BUSCARA
    if (restaurante) {
        //LE PASAMOS EL ID DE RESUTAURANTE
        id_restaurante = restaurante;
        ID_RESTAURANTE_P = restaurante;
        mostrar_restaurante(restaurante);
    }
    //SI NO LE PASAMOS NADA CARGARA UN MENSAJE DE ERROR
    else{
        const ver = document.querySelector("#ver");
        ver.innerHTML = "";
        mostrar_mensaje("error");
    }
    btn_modal_guardar_imagen.addEventListener("click",cambiar_imagen );
});

async function mostrar_restaurante(id){
    const datos = new FormData();
    datos.append("id", id);
    datos.append("accion","info_restaurantes");
    //SE BUSCA EL RESTAURANTE CON SU ID
    const res = await enviar_datos(url, datos);
    //console.log(res);
    //SI SE ENCUENTRA EL RESTAURANTE SE IMPRIME
    if(!res.respuesta){
        imprime_restaurante(res);
        imprime_menu_config(res);
    }
    else{
        mostrar_mensaje("error");
    }
}

function imprime_restaurante(datos) {
  let contenido1 = document.querySelector("#form_contenido_restaurante");
  const { id, nombre, telefono, descripcion, descripcion_larga,horario, correo, cp, direccion, ciudad, foto, fb} = datos;

  const div_modal_logo = document.querySelector("#btn_modal_logo");
  const text_nombre_restaurante = document.querySelector("#nombre_restaurante");
  const text_descripcion_larga = document.querySelector("#descripcion_larga");
  const img_restaurante = document.querySelector("#img_restaurante");
  const facebook = document.querySelector("#facebook");
  const enlace_editar_restaurante = document.querySelector("#editar");
  const texto_telefono = document.querySelector("#telefono");
  const texto_direccion = document.querySelector("#direccion");
  const texto_horarios = document.querySelector("#horarios");
  const texto_correo = document.querySelector("#correo");

  div_modal_logo.innerHTML = `
    <button type="button" class="btn btn-dark btn-sm btn-block cambio_imagen restaurante" data-id_cambio =${id} data-toggle="modal" data-target="#exampleModal">
        Cambiar logo <i class="fa fa-image"></i>
    </button>
    
    `;


  text_nombre_restaurante.innerHTML = `${nombre}`;

  text_descripcion_larga.innerHTML = `${descripcion_larga}`;

  texto_telefono.innerHTML = `${telefono}`;

  texto_direccion.innerHTML = `${ciudad}, ${direccion}, ${cp}`;

  texto_horarios.innerHTML = `${horario}`;

  texto_correo.innerHTML = `${correo}`;

  img_restaurante.setAttribute("src", `../../src/img/restaurantes/${foto}`);
  facebook.setAttribute("href", `${fb}`);
  enlace_editar_restaurante.setAttribute("href",`editar_restaurante.php?r=${id}`);

  const url_datos_externos = "../../inc/peticiones/restaurantes/funciones.php";
  imprime_restaurante_categorias(url_datos_externos);
  imprime_restaurante_dias(url_datos_externos);

}
async function imprime_restaurante_categorias(url_externo){
    const text_categorias = document.querySelector("#categorias");
    const datos = new FormData();
    datos.append("id", id_restaurante)
    datos.append("accion", "obtener_categorias_restaurante_especifico");
    const res = await enviar_datos(url_externo,datos);
    res.forEach((categoria) => text_categorias.innerHTML += `${categoria.nombre} /`);
}

async function imprime_restaurante_dias(url_externo){
    const text_dias = document.querySelector("#dias");
    const texto_horarios = document.querySelector("#horarios");

    const datos = new FormData();
    datos.append("id", id_restaurante)
    datos.append("accion", "obtener_horario_restaurante_especifico");
    const res = await enviar_datos(url_externo,datos);
    //console.log(res)
    res.forEach((dias) =>{ 
        const {dia,hora_inicio,hora_fin} = dias;
         const apuerta_formato_12h = moment(hora_inicio, "hh:mm").format("h:mm a");
         const cierre_formato_12h = moment(hora_fin, "hh:mm").format("h:mm a");
        const dia_semana = moment(dia, "d").format("dddd");


         text_dias.innerHTML += `${dia_semana} /`;
         texto_horarios.innerHTML = `${apuerta_formato_12h} - ${cierre_formato_12h}`;

});
}

function imprime_menu_config(datos){
    let div_config = document.querySelector("#form_segundo_contenido");
    const { id_restaurante, nombre, telefono, descripcion, descripcion_larga, horario, correo, cp, direccion, ciudad} = datos;
    //Imprime cada una de las configuraciones 
    config_promociones();
    //apartado_promociones();
    //config_galeria();
    config_menu();
}


async function config_promociones(){

    //aqui va tu codigo para obtener las promociones
    const datos = new FormData();
    var id = ID_RESTAURANTE_P;
    datos.append("id", ID_RESTAURANTE_P);
    datos.append("accion","ver_promo");
    //SE BUSCA EL RESTAURANTE CON SU ID
    const res = await enviar_datos(url, datos);
     
    if(res.sin_promo != true){
        let clase_activo = "btn-info";
        //let clase_inactivo ="btn-light disabled";
        let clase_l = "btn-light disabled";
        let clase_m = "btn-light disabled";
        let clase_mi = "btn-light disabled";
        let clase_j = "btn-light disabled";
        let clase_v = "btn-light disabled";
        let clase_s = "btn-light disabled";
        let clase_d = "btn-light disabled";

        res.forEach((element) => {
            let clase_l = "btn-light disabled";
            let clase_m = "btn-light disabled";
            let clase_mi = "btn-light disabled";
            let clase_j = "btn-light disabled";
            let clase_v = "btn-light disabled";
            let clase_s = "btn-light disabled";
            let clase_d = "btn-light disabled";
            //console.log(element);
            const {nombre_res,Nombre,descripcion,fecha,fecha_f,horario,id_promocion,id_restaurante,imagen, lunes, martes, miercoles, jueves, viernes, sabado, domingo} = element;
            if(lunes == 1){ clase_l = clase_activo }
            if(martes == 1){ clase_m = clase_activo }
            if(miercoles == 1){ clase_mi = clase_activo }
            if(jueves == 1){ clase_j = clase_activo }
            if(viernes == 1){ clase_v = clase_activo }
            if(sabado == 1){ clase_s = clase_activo }
            if(domingo == 1){ clase_d = clase_activo }
            promociones.innerHTML += `
                <div class="card border-0">
                    
                    <div class="card-body">
                    <div class="card">
                        <img class="card-img-top" src="../../src/img/promos/${imagen}" alt="Card image cap">
                        <div class="card-img-overlay">
                            <a href="../restaurantes/restaurante_especifico.php?r=${id_restaurante}"><h3 class="card-title">${nombre_res}</h3> </a>
                        </div>
                        <div class="card-body">
                            <h5>${Nombre}</h5>
                            <small class="card-text"> ${descripcion}</small>
                            <br>
                            <small> 
                                Con Horario <i>${horario}</i>. <br>
                                Valido: <i>${fecha}</i> a <i>${fecha_f}</i>
                            </small>
                            <br>
                            <label>Disponible: </label><br>
                            <label class="btn btn-circle ${clase_l}">L</label>
                            <label class="btn btn-circle ${clase_m}">M</label>
                            <label class="btn btn-circle ${clase_mi}">M</label>
                            <label class="btn btn-circle ${clase_j}">J</label>
                            <label class="btn btn-circle ${clase_v}">V</label>
                            <label class="btn btn-circle ${clase_s}">S</label>
                            <label class="btn btn-circle ${clase_d}">D</label>
                        </div>
                    </div>
                            <a href="editar_promocion.php?p=${id_promocion}" class="btn btn-secondary mt-1">
                                <i class="fa fa-edit"></i>
                            </a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-secondary mt-1 cambio_imagen promocion" data-id_cambio =${id_promocion} data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-image"></i>
                            </button>
                            <a href="#" class="btn btn-danger mt-1">
                                <i class="fa fa-trash"></i>
                            </a>
                    </div>
                </div>`;
        });
        btn_agregar_promo(id);
    }
    else{
        console.log("sin promos");
        mostrar_mensaje("sin_promociones" ,btn_promo);
        btn_agregar_promo(id);
        
    }
    //console.log (res);
    
    //console.log(id);
    
    var elements = document.getElementsByClassName("cambio_imagen");
    for(var i = 0; i < elements.length; i++){
    elements[i].addEventListener('click',modal_editar_imagen);
    }
}


function btn_agregar_promo(id){
    div_promociones.innerHTML+=`
        <div class="row justify-content-center mt-3">
            <div class="col-md-3 mt-3">
                <a href="agregar_promocion.php?r=${id}" class="btn btn-sm primary-btn"> Agregar promoción</a>
            </div> 
        </div>
        `;
}


function config_galeria(datos){
    let div_galeria = document.querySelector("#tabs-2");
    div_galeria.innerHTML+=`
        
        <div class="product__details__tab__desc">
                <h3>Fotos</h3>
                
                <div class="row mt-3">
                    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                        <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(73).jpg" class="w-100 shadow-1-strong rounded mb-4" alt="" />

                        <img src="https://mdbootstrap.com/img/Photos/Vertical/mountain1.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="" />
                    </div>

                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <img src="https://mdbootstrap.com/img/Photos/Vertical/mountain2.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="" />

                        <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(73).jpg" class="w-100 shadow-1-strong rounded mb-4" alt="" />
                    </div>

                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(18).jpg" class="w-100 shadow-1-strong rounded mb-4" alt="" />

                        <img src="https://mdbootstrap.com/img/Photos/Vertical/mountain3.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="" />
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6 col-lg-4 ">
                    <div class="card">
                        <div class="card-body text-center">
                            <p><strong>Agregar o editar</strong></p>
                            <span class="fa fa-plus btm btn site-btn mx-auto"></span>
                        </div>
                    </div>
                </div>
            </div>
    `;
}

//apartado del menu
function config_menu(datos){
    let div_menu = document.querySelector("#tabs-3");
    llenado_menu();

}
async function llenado_menu(){
    const datos = new FormData();
    datos.append("id", id_restaurante);
    datos.append("accion", "mostrar_menu");
    const res = await enviar_datos(url, datos);
    const veamos = document.querySelector(".ql-editor");

    veamos.innerHTML =`${res[0].descripcion}`;
    imagen_previa.src = `../../src/img/menus/${res[0].imagen}`;
}

function mostrar_imagen_seleccionada() {
    const files = imagen_a_enviar.files[0];
    if (files) {
      const fileReader = new FileReader();
      fileReader.readAsDataURL(files);
      fileReader.addEventListener("load", function () {
        imagen_previa.src = this.result;
      });    
    }
}

async function jssave() {
    let contenido = quill.container.firstChild.innerHTML;

    const datos = new FormData();
    datos.append("texto", contenido);
    datos.append("imagen", imagen_a_enviar.files[0]);
    datos.append("id", id_restaurante);
    datos.append("accion", "actualizar_menu");
    const url = "../../inc/peticiones/admin/funciones.php";
    try {
        const res = await fetch(url, { method: "POST", body: datos });
        const data = await res.json();
        alert("su menu se ha agregado");
        //console.log(data);
    } catch (error) {
        //console.log(error);
    }
}



//cambiar las imagenes

function modal_editar_imagen(e) {
  e.preventDefault();
  if (e.target.classList.contains("restaurante")) {
    datos_cambio_imagen.id = parseInt(e.target.dataset.id_cambio);
    datos_cambio_imagen.tipo = "cambiar_imagen_restaurante";
    //console.log(datos_cambio_imagen)
  }
  if (e.target.classList.contains("menu")) {
    datos_cambio_imagen.id = parseInt(e.target.dataset.id_cambio);
    datos_cambio_imagen.tipo = "cambiar_imagen_menu";
    //console.log(datos_cambio_imagen)
  }
  if (e.target.classList.contains("promocion")) {
    datos_cambio_imagen.id = parseInt(e.target.dataset.id_cambio);
    datos_cambio_imagen.tipo = "cambiar_imagen_promocion";
    //console.log(datos_cambio_imagen)
  }
}


async function cambiar_imagen() {
    //console.log(`ya se va a enviar la informacion ${datos_cambio_imagen.id}, ${datos_cambio_imagen.tipo}`)
    const datos = new FormData();
    datos.append("imagen", imagen_a_enviar_cambio.files[0]);
    datos.append("id", datos_cambio_imagen.id);
    datos.append("accion", `${datos_cambio_imagen.tipo}`);
    const url = "../../inc/peticiones/admin/funciones.php";
    try {
        const res = await fetch(url, { method: "POST", body: datos });
        const data = await res.json();
        //console.log(data);
    } catch (error) {
        //console.log(error);
    }
}

function mostrar_imagen_seleccionada_cambio() {
    const files = imagen_a_enviar_cambio.files[0];
    if (files) {
      const fileReader = new FileReader();
      fileReader.readAsDataURL(files);
      fileReader.addEventListener("load", function () {
        imagen_previa_cambio.src = this.result;
      });    
    }
}
