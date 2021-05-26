import { enviar_datos, mostrar_ubicacion } from "../../funciones_generales.js";

//const url = "inc/peticiones/home/ciudades.json";
const url = "../../inc/peticiones/home/ciudades.json";

const select_ciudad = document.querySelector("#cbx");
const formulario = document.querySelector("#eleccion_ciudad");
const obj = {
  id: "",
  ciudad: "",
};

document.addEventListener("DOMContentLoaded", () => {
  select_ciudad.addEventListener("change", obtener_valor_select);
  formulario.addEventListener("submit", guardar_ubicacion);
  obtener_ciudades();
  console.log(mostrar_ubicacion());
});


const guardar_ubicacion = (e) => {
  e.preventDefault();
  window.localStorage.setItem("ubicacion", JSON.stringify(obj));
};

const obtener_valor_select = () => {
  const opcion_id = select_ciudad.value;
  var opcion_texto = select_ciudad.options[select_ciudad.selectedIndex].text;
  obj.id = opcion_id;
  obj.ciudad = opcion_texto;
};

function obtener_ciudades() {
  enviar_datos(url, "").then((res) => {
    select_ciudad.innerHTML += `<option value="0">Seleccionar</option>`;
    res.forEach((estado) => {
      console.log(estado);
      select_ciudad.innerHTML += `
          <option value="${estado.id}" name="ciudad">${estado.nombre}</option>  
          `;
    });
  });
}
