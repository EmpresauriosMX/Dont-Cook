import { enviar_datos } from "../../funciones_generales.js";

const url = "inc/peticiones/home/funciones.php";

const cbx_estado = document.querySelector("#cbx_estado");
const cbx_municipio = document.querySelector("#cbx_municipio");
const cbx_localidad = document.querySelector("#cbx_localidad");

document.addEventListener("DOMContentLoaded", () => {
  cbx_estado.addEventListener("change", cambio_municipio);
  cbx_municipio.addEventListener("change", cambio_localidad);
  cbx_localidad.addEventListener("change", obtener_ubicacion);
  obtener_todos_los_estados();
});

function obtener_todos_los_estados() {
  const datos = new FormData();
  datos.append("accion", "obtener_estado");

  enviar_datos(url, datos).then((res) => {
    cbx_estado.innerHTML += `<option value="0">Seleccionar Estado</option>`;
    res.forEach((estado) => {
      cbx_estado.innerHTML += `
        <option value="${estado.id}">${estado.nombre}</option>  
        `;
    });
  });
}

function cambio_municipio() {
  const estado = document.querySelector("#cbx_estado").value;
  cbx_municipio.innerHTML = ``;
  cbx_localidad.innerHTML = ``;

  const datos = new FormData();
  datos.append("accion", "obtener_municipio");
  datos.append("id_estado", estado);

  enviar_datos(url, datos).then((res) => {
    cbx_municipio.innerHTML += `<option value="0">Seleccionar municipio</option>`;

    res.forEach((municipio) => {
      cbx_municipio.innerHTML += `
            <option value="${municipio.id}">${municipio.nombre}</option>  
            `;
    });
  });
}

function cambio_localidad() {
  const municipio = document.querySelector("#cbx_municipio").value;
  cbx_localidad.innerHTML = ``;
  const datos = new FormData();
  datos.append("accion", "obtener_localidad");
  datos.append("id_municipio", municipio);

  enviar_datos(url, datos).then((res) => {
    cbx_localidad.innerHTML += `<option value="0">Seleccionar localidad</option>`;

    res.forEach((localidad) => {
      cbx_localidad.innerHTML += `
          <option value="${localidad.id}">${localidad.nombre}</option>  
          `;
    });
  });
}
function obtener_ubicacion() {
  const ubicacion = document.querySelector("#cbx_localidad").value;
  console.log(ubicacion);
}
