import { enviar_datos } from "../../funciones_generales.js";

const registro = document.querySelector("#form_registro");

const url = "../../inc/peticiones/login/funciones.php";

document.addEventListener("DOMContentLoaded", () => {
  registro.addEventListener("submit", registro_usuario);
});

function registro_usuario(e) {
  e.preventDefault();
  const nombres = document.querySelector("#nombres").value;
  const apellidos = document.querySelector("#apellidos").value;
  const correo = document.querySelector("#correo").value;
  const usuario = document.querySelector("#usuario").value;
  const contrasenia1 = document.querySelector("#contrasenia1").value;
  //    const contrasenia2 = document.querySelector("#contrasenia2").value;
  console.log(
    `${nombres}, ${apellidos}, ${correo}, ${usuario}, ${contrasenia1}`
  );
  const datos = new FormData();
  datos.append("nombres", nombres);
  datos.append("apellidos", apellidos);
  datos.append("correo", correo);
  datos.append("usuario", usuario);
  datos.append("contrasenia1", contrasenia1);
  datos.append("accion", "registrar");

  enviar_datos(url, datos).then((re) => console.log(re));
}
