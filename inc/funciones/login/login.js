import { enviar_datos } from "../../funciones_generales.js";

const form_login = document.querySelector("#login_inicio");

document.addEventListener("DOMContentLoaded", () => {
  form_login.addEventListener("submit", registro_usuario);
});

async function registro_usuario(e) {
  e.preventDefault();
  const usuario = document.querySelector("#usuario").value;
const contraseña = document.querySelector("#contraseña").value;
  const url = "../../inc/peticiones/login/funciones.php";
  const datos = new FormData();
  datos.append("user", usuario);
  datos.append("password", contraseña);
  datos.append("accion", "ingresar");


  const peticion_bd = await enviar_datos(url, datos);

  console.log(peticion_bd);
  peticion_bd.respuesta === "correcto" ? window.location = '../home/home.php' : alert(`${peticion_bd.respuesta}`)
}


