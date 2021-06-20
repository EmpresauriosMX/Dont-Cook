import { enviar_datos } from "../funciones_generales.js";

const registro = document.querySelector("#form_registro");
const usuario_input = document.querySelector("#usuario");
const nombre_input = document.querySelector("#nombres");
const apellido_input = document.querySelector("#apellidos");
const correo_input = document.querySelector("#correo");
const contrasenia1_input = document.querySelector("#contrasenia1");
const contrasenia2_input = document.querySelector("#contrasenia2");

const url = "../../inc/peticiones/login/funciones.php";

document.addEventListener("DOMContentLoaded", () => {
  registro.addEventListener("submit", registro_usuario);
  usuario_input.addEventListener("blur", validar_usuario);

});

function registro_usuario(e) {
  e.preventDefault();
  const nombres = document.querySelector("#nombres").value;
  const apellidos = document.querySelector("#apellidos").value;
  const correo = document.querySelector("#correo").value;
  const usuario = document.querySelector("#usuario").value;
  const contrasenia1 = document.querySelector("#contrasenia1").value;
  const contrasenia2 = document.querySelector("#contrasenia2").value;

  if (contrasenia1 === contrasenia2) {
    const datos = new FormData();
    datos.append("nombres", nombres);
    datos.append("apellidos", apellidos);
    datos.append("correo", correo);
    datos.append("usuario", usuario);
    datos.append("contrasenia1", contrasenia1);
    datos.append("accion", "registrar");
  
    enviar_datos(url, datos).then((re) =>{
      console.log(re);
      limpiar_campos();
    } );
  }else{
    alert("las contraseñas no son iguales");
  }
 
}

async function validar_usuario() {
  const usuario = usuario_input.value
  const datos = new FormData();
  datos.append("user", usuario);
  datos.append("accion",'comprobar_usuario');
  
const resolve = await enviar_datos(url,datos);

if (resolve.respuesta === true ){ 
  alert("este usuario ya esta en uso"); 
  usuario_input.value = "";
} ;

}


function limpiar_campos() {
  usuario_input.value = "";
  apellido_input.value ="";
  nombre_input.value ="";
  correo_input.value ="";
  usuario_input.value="";
  contrasenia1_input.value ="";
  contrasenia2_input.value ="";
}