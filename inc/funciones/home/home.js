import { enviar_datos, mostrar_ubicacion, mostrar_mensaje } from "../funciones_generales.js";
import {Ubicacion,select_ciudad,btn_confirmar_ciudad} from "../ubicacion.js";

const url = "../../inc/peticiones/restaurantes/funciones.php";

const url_promocion = "../../inc/peticiones/promociones/funciones.php";

const contenedor = document.querySelector("#contenedor_restaurantes");
const cont_promo = document.querySelector("#contenedor_promociones");
const titulo = document.querySelector("#titulo_restaurantes");
const titulo_promo = document.querySelector("#titulo_promociones");
const tienes_ciudad = mostrar_ubicacion().ciudad;


const contenedor_promociones_hoy = document.querySelector("#contenedor_promociones");


//AQUI CARGA SI TIENE UNA CIUDAD REGISTRADA O NO
document.addEventListener("DOMContentLoaded", () => {
  if (screen.width < 1024){ 
    //document.write ("Pequeña")
    const hero = document.querySelector("#hero");
    hero.classList.add("hero-normal");
  }
  if (!tienes_ciudad) {
    //MUESTRA EL MENSAJE DE QUE NO TIENE UNA CIUDAD
    mostrar_mensaje("sin_ciudad");
    const div_categorias = document.querySelector("#categorias");
    const div_restaurantes = document.querySelector("#contenedor_restaurantes");
    const div_titulo_restaurantes = document.querySelector("#titulo_restaurantes");
    const div_promociones = document.querySelector("#promociones");
    const div_titulo_promociones = document.querySelector("#titulo_promociones");
    //Vacia casi todos los div para mostrar solo el mensaje
    div_categorias.innerHTML = "";
    div_restaurantes.innerHTML = "";
    div_titulo_restaurantes.innerHTML = "";
    div_promociones.innerHTML = "";
    div_titulo_promociones.innerHTML = "";

  }else{
    //BRO, A QUIEN LE TOQUE PROGRAMAR EL HOME AQUI HAY DOS FUNCIONES EN LOS CUALES PUEDES PROGRAMAR
    mostrar_restaurantes();
    mostrar_promociones();
    mostrar_promocion_dia_actual();

  }     
   
});

async function mostrar_promociones(){
  limpiar_contenedor();
  titulo_promo.innerHTML = `<h2>Promociones de hoy</h2>  `;

}

//------------TODOS LOS RESTUARANTES DE LA CIUDAD-----------
async function mostrar_restaurantes() {
  limpiar_contenedor();
  const datos = new FormData();
  const ciudad = mostrar_ubicacion().ciudad;
  datos.append("ciudad", ciudad);
  datos.append("accion", "obtener_restaurantes");
  const res = await enviar_datos(url, datos);
  titulo.innerHTML = `<h2>Restaurantes de ${ciudad}</h2>`;
  res.forEach((restaurante) => {
    //.log(restaurante);
    const {id, nombre, lugar, horario, descripcion, imagen, correo, fb, insta } = restaurante;
    let imagen_real = imagen
    if(imagen_real == null){
      imagen_real = "fondo.png"
    }
    //console.log(imagen_real);
    contenedor.innerHTML += `
              <div class="blog-card col-md-12 col-sm-12 col-xs-12 col-lg-5 mx-auto">
              <div class="meta">
                  <div class="photo" style="background-image: url(../../src/img/restaurantes/${imagen_real}"></div>
                  <!--ul class="details"-->
                      <!--li class="author">Correo: <a href="#">${correo}</a></li-->
                      <!--li class=""-->
                      <!--ul-->
                        <!--i class="fa fa-facebook"></i> <a href="${fb}">Facebook</a>
                      </ul>
                      <ul>
                        <i class="fa fa-instagram"></i> <a href="${insta}">Instagram</a>
                      </ul>
                      </li>
                  </ul-->
              </div>
                  <div class="description">
                      <h3>${nombre}</b></h3>
                      <div id = "restaurante_horario_${id}"> 
                          <small class ="text-danger"> <strong> Cerrado </strong></small>
                      </div>
                      <p class=""><small class="text-muted">${descripcion}</small></p>
                          <div class="row">
                              
                          </div>
                      <div class="read-more mt-2">
                          <a href="../restaurantes/restaurante_especifico.php?r=${id}" class="btn btn-outline-secondary btn-sm">
                              <span class="fa fa-eye" ></span> Visitar
                          </a>
                      </div>
                  </div>
              </div>
              `;
  });
  pintar_horario_html(); //los horarios disponibles hoy

}

function limpiar_contenedor() {
  cont_promo.innerHTML = "";
  contenedor.innerHTML = "";
  titulo.innerHTML = "";
}

async function pintar_horario_html() {
  const dia_hoy = moment().format("d");
  const ciudad = mostrar_ubicacion().ciudad;
  // console.log(dia_hoy);
  //console.log(ciudad);

  const datos = new FormData();
  datos.append("dia", dia_hoy);
  datos.append("ciudad", ciudad);
  datos.append("accion", "obtener_horarios");

  const res = await enviar_datos(url, datos);
  //console.log(res);
  res.forEach((horario) => {
    const { id, apertura, cierre, servicio_domicilio } = horario;
    const lista = document.querySelector(`#restaurante_horario_${id}`);
    if (lista) {
      lista.innerHTML = "";
      if (servicio_domicilio === 1) {
        lista.innerHTML = `
        <small class = "text-success">
        <i class="fa fa-car"></i>
          De ${apertura} a ${cierre} </small> `;
      } else {
        lista.innerHTML = `
        <small class = "text-warning">Sin servicio a domicilio</small>
        <small class = "text-success">De ${apertura} a ${cierre} </small> `;
      }
    }
  });
}

async function mostrar_promocion_dia_actual() {
  const datos = new FormData();
  const dia_hoy = moment().format("d");
  let dia;
  if (dia_hoy == 0) dia = "domingos";
  if (dia_hoy == 1) dia ="lunes";
  if (dia_hoy == 2) dia ="martes";
  if (dia_hoy == 3) dia ="miercoles";
  if (dia_hoy == 4) dia ="jueves";
  if (dia_hoy == 5) dia ="viernes";
  if (dia_hoy == 6) dia = "sabado";

  const ciudad = mostrar_ubicacion().ciudad;
  datos.append("dia", dia);
  datos.append("ciudad", ciudad);
  //console.log(ciudad);
  datos.append("accion", "obtener_promocion_dia");
  const res = await enviar_datos(url_promocion, datos);
  res.length != 0 ? llenado_contenedor_html(contenedor_promociones_hoy,res) : sin_promos_hoy();
}

function llenado_contenedor_html(contenedor,res) {

  let clase_activo = "btn-info";

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

        contenedor.innerHTML += `
        <div class="card">
          <div class="card-header border-secondary">
            <a href="../restaurantes/restaurante_especifico.php?r=${id_restaurante}"><h3 class="card-title">${nombre_res}</h3> </a>
          </div>
        <img class="card-img-top" src="../../src/img/promos/${imagen}" alt="Card image cap">
  
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
    `;
      });
    
}

function sin_promos_hoy(){
  const titulo_promos_hoy = document.querySelector("#titulo_promos_hoy");
  titulo_promos_hoy.innerHTML = "";
  mostrar_mensaje("sin_promociones_hoy");
}