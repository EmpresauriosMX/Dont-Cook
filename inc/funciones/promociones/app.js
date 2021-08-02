import { enviar_datos,mostrar_ubicacion,mostrar_mensaje, mostrar_alert} from "../funciones_generales.js";
const url = "../../inc/peticiones/promociones/funciones.php";

const titulo = document.querySelector("#titulo_promociones");
const tienes_ciudad = mostrar_ubicacion().ciudad;

//variables dom
const contenido_promociones = document.querySelector("#contenido_promociones");
const contenedor_promociones_hoy = document.querySelector("#contenido_promociones_hoy");

//RECIBE POR GET UNA CATEGORIA
document.addEventListener("DOMContentLoaded", () => {

  if (!tienes_ciudad) {
    sin_ciudad();
  } else {
    mostrar_promocion();
    mostrar_promocion_dia_actual();
  }
});
//si no tiene una ciudad registrada
function sin_ciudad() {
  mostrar_mensaje("sin_ciudad");
  const titulo_promociones = document.querySelector("#titulo_promociones");
  const titulo_promociones_todas = document.querySelector(
    "#titulo_promociones_todas"
  );
  const div_todo = document.querySelector("#contenedor");
  div_todo.innerHTML = "";
  //contenido_promociones.innerHTML = "";
  // titulo_promociones_todas.innerHTML = "";
  //titulo_promociones.innerHTML = ``;
}

async function mostrar_promocion() {

  const datos = new FormData();
  const ciudad = mostrar_ubicacion().ciudad;
  datos.append("ciudad", ciudad);
  datos.append("accion", "obtener_promociones_todos");
  const res = await enviar_datos(url, datos);
  //console.log(res);

    res.length != 0 ? llenado_contenedor_html(contenido_promociones,res) : sin_promos_hoy();  
}

function ninguna_promocion(){
  const div_todo = document.querySelector("#contenedor");
  div_todo.innerHTML = "";
  mostrar_mensaje("sin_promociones");
}

async function mostrar_promocion_dia_actual() {
    const datos = new FormData();
    const dia_hoy = moment().format("d");
    let dia;
    if (dia_hoy == 0) dia = "domingo";
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
    const res = await enviar_datos(url, datos);
    if (res == undefined) {
      sin_promos_hoy();  
    }else{
      res.length != 0 ? llenado_contenedor_html(contenedor_promociones_hoy,res) : sin_promos_hoy();  
    }
}

function sin_promos_hoy(){
  const titulo_promos_hoy = document.querySelector("#titulo_promos_hoy");
  titulo_promos_hoy.innerHTML = "";
  mostrar_mensaje("sin_promociones_hoy");
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
          <a href="../restaurantes/restaurante_especifico.php?r=${id_restaurante}"><img class="card-img-top" src="../../src/img/promos/${imagen}" alt="Card image cap"></a>
        
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


function limpiar_contenedor() {
  cont_promo.innerHTML = "";
  contenedor.innerHTML = "";
  titulo.innerHTML = "";
}