import { enviar_datos, mostrar_ubicacion } from "../../funciones_generales.js";

//const url = "inc/peticiones/home/ciudades.json";
const url = "../../inc/peticiones/home/ciudades.json";

const select_ciudad = document.querySelector("#cbx");
const btn_confirmar_ciudad = document.querySelector("#enviar");
const obj = {
  id: "",
  ciudad: "",
};

document.addEventListener("DOMContentLoaded", () => {
  select_ciudad.addEventListener("change", obtener_valor_select);
  btn_confirmar_ciudad.addEventListener("click", guardar_ubicacion);
  obtener_ciudades();
 alert(mostrar_ubicacion().ciudad);
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


export function ejemplo(){
  console.log("des la funcion de ubicacion que esta en el home");
}