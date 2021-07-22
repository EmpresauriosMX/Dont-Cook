import { enviar_datos,mostrar_ubicacion,mostrar_mensaje} from "../funciones_generales.js";
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
  contenido_promociones.innerHTML = "";
 // titulo_promociones_todas.innerHTML = "";
  //titulo_promociones.innerHTML = ``;
}

async function mostrar_promocion() {
  const datos = new FormData();
  const ciudad = mostrar_ubicacion().ciudad;
  datos.append("ciudad", ciudad);
  datos.append("accion", "obtener_promociones_todos");
  const res = await enviar_datos(url, datos);
  console.log(res);
 res.length != 0 ? llenado_contenedor_html(contenido_promociones,res) : alert ("no hay promociones");
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
    console.log(ciudad);
    datos.append("accion", "obtener_promocion_dia");
    const res = await enviar_datos(url, datos);
    res.length != 0 ? llenado_contenedor_html(contenido_promociones_hoy,res) : alert ("no hay promociones");
  }


function llenado_contenedor_html(contenedor,res) {
    res.forEach((element) => {
        console.log(element);
        const {nombre_res,Dias,Nombre,descripcion,fecha,fecha_f,horario,id_promocion,id_restaurante,imagen} = element;
        contenedor.innerHTML += `
    <div class="card">
        <img class="card-img-top" src="../../src/img/promos/${imagen}" alt="Card image cap">
        <div class="card-img-overlay">
            <h4 class="card-title">${nombre_res}</h4>
        </div>
        <div class="card-body">
            <h6>${Nombre}</h6>
            <p class="card-text"> <b>Descripcion </b>${descripcion}<br>
            De Lunes a Jueves <br>
            Con Horario de ${horario}</p>
        </div>
    </div>
    `;
      });
    
}