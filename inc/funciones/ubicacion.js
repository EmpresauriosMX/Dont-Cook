import { enviar_datos } from "./funciones_generales.js";

export const obj = {
    id: "",
    ciudad: "",
  };

  export const select_ciudad = document.querySelector("#cbx");
 export const btn_confirmar_ciudad = document.querySelector("#enviar");

export class Ubicacion {
constructor(){
   this.url = "../../inc/peticiones/home/ciudades.json";
}
    async buscar() {
      const datos = await enviar_datos(this.url);
      this.mostrar(datos);
    }
  
    mostrar(datos) {
      select_ciudad.innerHTML += `<option value="0">Seleccionar</option>`;
      datos.forEach((estado) => {
        console.log(estado);
        select_ciudad.innerHTML += `
           <option value="${estado.id}" name="ciudad">${estado.nombre}</option>  
          `;
      });
    }
  
    obtener() {
      const opcion_id = select_ciudad.value;
      var opcion_texto = select_ciudad.options[select_ciudad.selectedIndex].text;
      obj.id = opcion_id;
      obj.ciudad = opcion_texto;
    }
  
    guardar(e) {
      e.preventDefault();
      window.localStorage.setItem("ubicacion", JSON.stringify(obj));
    }
  }