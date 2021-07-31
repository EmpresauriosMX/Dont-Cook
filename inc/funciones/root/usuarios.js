import { enviar_datos, mostrar_ubicacion, mostrar_mensaje, } from "../funciones_generales.js";
const url = "../../inc/peticiones/root/funciones.php";

const contenedor_usuarios = document.querySelector("#contenedor_usuarios");
const contenedor = document.querySelector("#container");

document.addEventListener("DOMContentLoaded", () => {
  mostrar_usuarios();
  contenedor.addEventListener("click",editar_estado);
});


async function mostrar_usuarios() {
  const datos = new FormData();
  datos.append("accion", "mostrar_usuarios");
  const res = await enviar_datos(url, datos);
const reverso = res.reverse();  
  limpiar_html();
  usuarios_html(reverso);

}

async function editar_estado(e) {
    if (e.target.classList.contains("btn_cambiar")) {
        console.log(e.target.dataset.id)
        const id = e.target.dataset.id
            const estado = e.target.dataset.estado;
          const cambio_estado =   parseInt(estado) == 1 ? 0 : 1;


          const datos = new FormData();
          datos.append("estado", cambio_estado);
          datos.append("id_usuario", id )
          datos.append("accion", "cambiar_estado_usuario");
          const res = await enviar_datos(url, datos);
          mostrar_usuarios();


    
    }
}

function usuarios_html(datos) {
    let clase_pintar = "";

    console.log(datos);
    datos.forEach((usuario) => {
        const {id,nombre,apellido,correo,nombre_usuario,estado} = usuario;
        estado == 1 ?  clase_pintar = `table-success` :  clase_pintar = ``;
  
        contenedor_usuarios.innerHTML += `
        <tr class= "${clase_pintar}">
            <th scope="row">${id}</th>
            <td>${nombre}</td>
            <td>${apellido}</td>
            <td>${correo}</td>
            <td>${nombre_usuario}</td>
            <td>${estado}</td>
            <td><input class="btn btn-primary btn_cambiar" data-estado="${estado}" data-id="${id}" type="button" value="cambiar estado"> </td>
        </tr>
        `;
    });
}

function limpiar_html() {
    contenedor_usuarios.innerHTML = "";
}