import {enviar_datos, existe_cuenta, mostrar_mensaje} from "../funciones_generales.js";
//----------VALIDACION DE CUENTA DE USUARIO-----------
document.addEventListener("DOMContentLoaded", () => {
    mostrarServicios();
});
  //FUNCIONES QUE SE DEBEN DE CARGAR AL INICIO
async function mostrarServicios(){
    var cuenta_activa = false;
    cuenta_activa =  await existe_cuenta();
    //VALIDACION DE UN LOG ANTERIOR
    if (cuenta_activa){
        //EXISTE UNA CUENTA
        console.log("existe una cuenta");
        //imprime_user_card();
    }
    else{
        //NO EXISTE UNA CUENTA
        //mostrar el mensaje de no existe una cuenta 
        let user_card = document.querySelector("#card");
        user_card.innerHTML="";
        let mensaje = "sin_cuenta";
        mostrar_mensaje(mensaje);
        console.log("no existe una cuenta");
    }
}

function imprime_user_card(){

}