import {enviar_datos, existe_cuenta} from "../../funciones_generales.js";
    const url = "../../inc/peticiones/admin/funciones.php";

// ------------SE CARGA AL INICIAR--------
document.addEventListener("DOMContentLoaded", () => {
    mostrarServicios();
  });
  
  //FUNCIONES QUE SE DEBEN DE CARGAR AL INICIO
  function mostrarServicios(){
    //VALIDACION DE UN LOG ANTERIOR
    if (existe_cuenta()){
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
    //VALIDACION DE CONTAR CON RESTAURANTES
    //cargar_restaurantes();  
    console.log("se cargo");
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
        const MENSAJES_POR_MOSTRAR ={
            'sin_cuenta' :  "mostrar mensaje de que no hay cuenta",
            //'existe_cuenta' : "mostrar mensaje de que  si hay cuenta",
            'sin_restaurante'  : "mostrar mensaje de que si hay cuenta"
        }
        const muestra = MENSAJES_POR_MOSTRAR[mensaje];
        console.log(muestra);

    }