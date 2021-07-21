import {mostrar_ubicacion, enviar_datos, mostrar_mensaje} from "../funciones_generales.js";
const url = "../../inc/peticiones/admin/funciones.php";
var id_restaurante = "";
var ID_RESTAURANTE_P = "";
var enviar_menu = document.querySelector("#enviar_el_menu");


//imagen previa
let imagen_a_enviar = document.querySelector("#imagen"); //input
let imagen_previa = document.querySelector("#img_previa");


var quill = new Quill('#editor', {
    theme: 'snow'
});

//CON ESTO OBTENEMOS EL ID DEL RESTAURANTE POR LA URL
document.addEventListener("DOMContentLoaded", () => {
    const parametrosURL = new URLSearchParams(window.location.search);
    let restaurante = parametrosURL.get("r");
    enviar_menu.addEventListener("click",jssave);
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
        mostrar_mensaje("error");
    }
});

async function mostrar_restaurante(id){
    const datos = new FormData();
    datos.append("id", id);
    datos.append("accion","info_restaurantes");
    //SE BUSCA EL RESTAURANTE CON SU ID
    const res = await enviar_datos(url, datos);
    console.log(res);
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

  const text_nombre_restaurante = document.querySelector("#nombre_restaurante");
  const text_descripcion_larga = document.querySelector("#descripcion_larga");
  const img_restaurante = document.querySelector("#img_restaurante");
  const facebook = document.querySelector("#facebook");
  const enlace_editar_restaurante = document.querySelector("#editar");
  const texto_telefono = document.querySelector("#telefono");
  const texto_direccion = document.querySelector("#direccion");
  const texto_horarios = document.querySelector("#horarios");
  const texto_correo = document.querySelector("#correo");

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
    console.log(res)
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
    //config_promociones();
    apartado_promociones();
    config_galeria();
    config_menu();
}

async function apartado_promociones(){

    var div_promociones = document.querySelector("#tabs-1");
    div_promociones.innerHTML+=`
        <div class="product__details__tab__desc">
            <div id="promos" class="card-columns mt-3 ">

            </div>
        </div>
    `;
    config_promociones();

}

async function config_promociones(){
    //aqui va tu codigo para obtener las promociones
    const datos = new FormData();
    var id = ID_RESTAURANTE_P;
    datos.append("id", ID_RESTAURANTE_P);
    datos.append("accion","ver_promo");
    //SE BUSCA EL RESTAURANTE CON SU ID
    const res = await enviar_datos(url, datos);
    console.log (res);
    var promociones = document.querySelector("#promos");
    var div_promociones = document.querySelector("#tabs-1");


    res.forEach((element) => {
        console.log(element);
        const {nombre_res,Nombre,descripcion,fecha,fecha_f,horario,id_promocion,id_restaurante,imagen} = element;
        promociones.innerHTML += `
    <div class="card">
            <img class="card-img-top" src="../../src/img/promos/${imagen}" alt="Card image cap">
            <div class="card-img-overlay">
            <h4 class="card-title">${nombre_res}</h4>
        </div>
        <div class="card-body">
            <h5>${Nombre}</h5>
            <p class="card-text">${descripcion}<br>
            Horario: ${horario}</p>
        </div>
        <div class="card-footer">
            <a href="agregar_promocion.php" class="btn btn-dark mt-1">
                <i class="fa fa-edit"></i>
            </a>
            <a href="../admin/home_admin.php" class="btn btn-danger mt-1">
                <i class="fa fa-trash"></i>
            </a>
        </div>
        `;
    });
    
    console.log(id);
    div_promociones.innerHTML+=`
        <div class="row justify-content-center mt-3">
            <div class="col-md-3 mt-3">
                <a href="agregar_promocion.php?r=${id}" class="btn btn-sm primary-btn  "> Agregar promoción</a>
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
        console.log(data);
    } catch (error) {
        console.log(error);
    }
}