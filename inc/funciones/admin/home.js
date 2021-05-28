import {enviar_datos} from "../../funciones_generales.js";
const url = "../../inc/peticiones/admin/funciones.php";

// ------------SE CARGA AL INICIAR--------
document.addEventListener("DOMContentLoaded", () => {
    mostrarServicios();
  });
  
  //FUNCIONES QUE SE DEBEN DE CARGAR AL INICIO
  function mostrarServicios(){
    //VALIDACION DE UN LOG ANTERIOR
    existe_cuenta();
    //VALIDACION DE CONTAR CON RESTAURANTES
    cargar_restaurantes();  
    console.log("se cargo");
  }

    function existe_cuenta(){
        const datos = new FormData();
        datos.append("accion","verifica_cuenta");
        enviar_datos(url,datos);

        if(data.cuenta){
            //EXISTE UNA CUENTA
            console.log("existe una cuenta");
            cargar_restaurantes();
        }

    }

    function cargar_restaurantes(){
        //e.preventDefault();
        const datos = new FormData();
        console.log("ahora puedo buscar restaurantes")
        //datos.append("accion","registrar_restaurante");
    
        //enviar_datos(url,datos).then((re) => console.log(re));

        //alert('EL RESTAURANTE SE REGISTRO CORRECTAMENTE');

    }
