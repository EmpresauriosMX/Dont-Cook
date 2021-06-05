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
      let restaurantes = document.querySelector("#restaurantes");
      
        const MENSAJES_POR_MOSTRAR ={
            'sin_cuenta' :  `<div class="row">
                                <div class="col-md-4 mx-auto">
                                    <img src="../../src/img/ilustrations/no.svg" class="img-fluid" alt="Responsive image">
                                    <h5 class="text-center text-muted mt-3">Aún no tienes una cuenta. <a href="../login/registro.php">Registrate aquí :)</a></h5>
                                    <div class="col text-center mt-3">
                                        
                                    </div>
                                </div> 
                            </div>`,
            //'existe_cuenta' : "mostrar mensaje de que  si hay cuenta",
            'sin_restaurante'  : `<div class="row">
                                      <div class="col-md-5 mx-auto">
                                          <img src="../../src/img/ilustrations/empty_place.svg" class="img-fluid" alt="Responsive image">
                                          <h5 class="text-center text-muted mt-3">Parece que aun no tienes ningún restaurante registrado :(</h5>
                                          <div class="col text-center mt-3">
                                              <a href="../admin/agregar_restaurante.php"><button class="btn primary-btn mx-auto">Agregar un restaurante <span class="fa fa-check"></span></button></a>
                                          </div>
                                          
                                      </div> 
                                  </div>`
        }
        const muestra = MENSAJES_POR_MOSTRAR[mensaje];
        div.innerHTML += muestra;
        restaurantes.innerHTML = "";

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
