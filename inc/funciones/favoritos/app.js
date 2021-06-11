import {enviar_datos, existe_cuenta, mostrar_mensaje} from "../funciones_generales.js";
//VARIABLE A LA CUAL SE ENCUENTRAN LAS PETICIONES
const url = "../../inc/peticiones/admin/funciones.php";

//VARIABLE GLOBAL PARA SABER SI TIENE UNA CUENTA
var cuenta_activa = false;

// ----------------SE CARGA AL INICIAR--------------
document.addEventListener("DOMContentLoaded", () => {
    mostrarServicios();
});

//FUNCIONES QUE SE DEBEN DE CARGAR AL INICIO
async function mostrarServicios(){
    cuenta_activa =  await existe_cuenta();
  //VALIDACION DE UN LOG ANTERIOR
    if (cuenta_activa){
      //EXISTE UNA CUENTA
        console.log("existe una cuenta");
      //AL EXISTIR UNA CUENTA SE VALIDA PUEDEN HABER FAVORITOS
      //OS WE, AQUI PONES EL CODIGO DE CARGAR FAVORITOS
      //cargar_favoritos();
    }
    else{
      //NO EXISTE UNA CUENTA
      //mostrar el mensaje de no existe una cuenta 
        let mensaje = "sin_cuenta";
        mostrar_mensaje(mensaje);
        console.log("no existe una cuenta");
    }
}

async function cargar_favoritos(){

}