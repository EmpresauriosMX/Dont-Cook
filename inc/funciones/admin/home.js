  import {enviar_datos, existe_cuenta} from "../../funciones_generales.js";
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
        //AL EXISTIR UNA CUENTA SE VALIDA SI HAY RESTAURANTES
        cargar_restaurantes();
    }
    else{
        //NO EXISTE UNA CUENTA
        //mostrar el mensaje de no existe una cuenta 
        let mensaje = "sin_cuenta";
        mostrar_mensaje(mensaje);
        console.log("no existe una cuenta");
    }
    //VALIDACION DE CONTAR CON RESTAURANTES
    //cargar_restaurantes();  
  }


    function cargar_restaurantes(){
        //e.preventDefault();
        const datos = new FormData();
        console.log("ahora puedo buscar restaurantes")
        //datos.append("accion","registrar_restaurante");
    
        //enviar_datos(url,datos).then((re) => console.log(re));

        //alert('EL RESTAURANTE SE REGISTRO CORRECTAMENTE');

    }

    function mostrar_mensaje(mensaje){
      let div = document.querySelector("#mensaje");
      
        const MENSAJES_POR_MOSTRAR ={
            'sin_cuenta' :  `<?php include '../pages/sin_cuenta.html';?>`,
            //'existe_cuenta' : "mostrar mensaje de que  si hay cuenta",
            'sin_restaurante'  : "mostrar mensaje de que si hay cuenta"
        }
        const muestra = MENSAJES_POR_MOSTRAR[mensaje];
        div.innerHTML += `<?php include '../pages/sin_cuenta.html';?>`;
        console.log(muestra);

    }

    /*
export async function existe_cuenta(){
  const url = "../../inc/peticiones/admin/funciones.php";
  const datos = new FormData();
  datos.append("accion","verifica_cuenta");
  let respuesta = enviar_datos(url,datos).then(res => res);
  console.log("respuesta: " + respuesta);
  return respuesta;
  /*if(re.cuenta_existente){
      //EXISTE UNA CUENTA
      console.log("existe una cuenta");
      cargar_restaurantes();
  }
  else{
      //NO EXISTE UNA CUENTA
      //mostrar el mensaje de no existe una cuenta 
      let mensaje = "sin_cuenta";
      mostrar_mensaje(mensaje);
      console.log("no existe una cuenta");
  }

}*/
