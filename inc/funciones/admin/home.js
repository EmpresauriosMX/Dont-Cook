    //VARIABLE A LA CUAL SE ENCUENTRAN LAS PETICIONES
    const url = "../../inc/peticiones/admin/funciones.php";
    //VARIABLE GLOBAL PARA SABER SI TIENE UNA CUENTA
    var cuenta_activa = false;

    //FUNCION PARA ENVIAR Y RECIBIR DE LA BD
    async function enviar_datos(url, datos) {
        try {
          const res = await fetch(url, { method: "POST", body: datos });
          const data = await res.json();
          return data;
        } catch (error) {
          console.log(error);
        }
    }

// ----------------SE CARGA AL INICIAR--------------
document.addEventListener("DOMContentLoaded", () => {
    mostrarServicios();
  });
  
  //FUNCIONES QUE SE DEBEN DE CARGAR AL INICIO
  async function mostrarServicios(){
    //VALIDACION DE UN LOG ANTERIOR
    /*if (existe_cuenta()){
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
    }*/
    //VALIDACION DE CONTAR CON RESTAURANTES
    //cargar_restaurantes();  
    console.log("se cargo");
    existe_cuenta();
  }

  async function existe_cuenta() {
    const url = "../../inc/peticiones/admin/funciones.php";
    const datos = new FormData();
    datos.append("accion","verifica_cuenta");
    
    const res = await enviar_datos(url, datos);
    console.log(res);
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
