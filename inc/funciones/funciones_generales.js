export async function enviar_datos(url, datos) {
  try {
    const res = await fetch(url, { method: "POST", body: datos });
    const data = await res.json();
    return data;
  } catch (error) {
    //console.log(error);
  }
}

export function mostrar_ubicacion() {
  return JSON.parse(localStorage.getItem("ubicacion")) || [];
  /*console.log(ubicacion.length);
    if (ubicacion.length === 0) {
      
      window.location = "../login/login.php";
    }*/
}

export function iniciar_sesion() {}

export async function existe_cuenta() {
  const url = "../../inc/peticiones/admin/funciones.php";
  const datos = new FormData();
  datos.append("accion", "verifica_cuenta");

  const res = await enviar_datos(url, datos);
  //console.log(res);
  const cuenta = res.cuenta_existente;
  return cuenta;
}

export function mostrar_mensaje(mensaje) {
  let div = document.querySelector("#mensaje");
  let restaurantes = document.querySelector("#restaurantes");

  const MENSAJES_POR_MOSTRAR = {
    sin_cuenta: `<div class="row">
                              <div class="col-md-5 mx-auto">
                                  <img src="../../src/img/ilustrations/no.svg" class="img-fluid" alt="Responsive image">
                                  <h5 class="text-center text-muted mt-3">Aún no tienes una cuenta.  
                                    <a class="btn btn-sm btn-dark mx-auto " href="../login/registro.php">Registrate</a> o 
                                    <a class="btn btn-sm btn-dark mx-auto" href="../login/login.php">Inicia sesión</a>
                                  </h5>
                                  <div class="col text-center mt-3">
                                      
                                  </div>
                              </div> 
                          </div>`,
    sin_restaurante: `<div class="row">
                                  <div class="col-md-5 mx-auto">
                                      <img src="../../src/img/ilustrations/empty_place.svg" class="img-fluid" alt="Responsive image">
                                      <h5 class="text-center text-muted mt-3">Parece que aun no tienes ningún restaurante registrado :(</h5>
                                      <div class="col text-center mt-3">
                                          <a href="../admin/agregar_restaurante.php"><button class="btn primary-btn mx-auto">Agregar un restaurante <span class="fa fa-check"></span></button></a>
                                      </div>  
                                  </div> 
                              </div>`,
    sin_favoritos: `<div class="row">
                                  <div class="col-md-4 mx-auto">
                                      <img src="../../src/img/ilustrations/fav.svg" class="img-fluid" alt="Responsive image">
                                      <h5 class="text-center text-muted mt-3">Parece que aun no tienes ningún restaurante en favoritos :(</h5>
                                      <div class="col text-center mt-3">
                                      <span class="text-muted">Agregarlos es cencillo, solo dale click al icono del corazón "<i class="fa fa-heart"></i>" del restaurante que más te guste.</span>
                                      </div>  
                                  </div> 
                              </div>`,
    error: `<div class="row">
                                  <div class="col-md-4 mx-auto">
                                      <img src="../../src/img/ilustrations/empty_place.svg" class="img-fluid" alt="Responsive image">
                                      <h5 class="text-center text-muted mt-3">Aquí no hay nada :(</h5>
                                      <div class="col text-center mt-3">
                                      </div>  
                                  </div> 
                              </div>`,
    sin_ciudad: `<div class="row">
                                  <div class="col-md-4 mx-auto">
                                      <img src="../../src/img/ilustrations/city.svg" class="img-fluid" alt="Responsive image">
                                      <h5 class="text-center text-muted mt-3">No tienes una ciudad guardada.
                                        <a class="btn btn-sm btn-dark mx-auto mt-2" href="../user/user.php">Configurar ciudad</a>
                                      </h5>
                                      <div class="col text-center mt-3">
                                      </div>  
                                  </div> 
                              </div>`,
    sin_promociones_hoy: `<div class="row">
                                  <div class="col-md-4 mx-auto">
                                      <img src="../../src/img/ilustrations/no_1.svg" class="img-fluid" alt="Responsive image">
                                      <h5 class="text-center text-muted mt-3">No hay promociones hoy :(
                                      </h5>
                                      <div class="col text-center mt-3">
                                      </div>  
                                  </div> 
                              </div>`,
    sin_promociones: `<div class="row">
                                  <div class="col-md-4 mx-auto">
                                      <img src="../../src/img/ilustrations/empty.svg" class="img-fluid" alt="Responsive image">
                                      <h5 class="text-center text-muted mt-3">No hay promociones :(
                                      </h5>
                                      <div class="col text-center mt-3">
                                      </div>  
                                  </div> 
                              </div>`,
  };
  const muestra = MENSAJES_POR_MOSTRAR[mensaje];
  div.innerHTML += muestra;
}

export function mostrar_alert(tipo, mensaje ,div) {
  //ESTA FUNCION ES USABLE EN DONDE SEA LLAMADO
  //PARA USARLO:
  //1. Declarar un div con id llamado "alert"
  //2. como primera linea de codigo llamar a la funcion como:
  //  2.1 import { mostrar_alert } from "../funciones_generales.js";
  //3. Donde se vaya a usar llamar a la funcion como:
  //  3.1 mostrar_alert(tipo_alert, mensaje, div_donde_Se_usara)
  //  en tipo_alert reemplzar por el tipo de alrta que se desee
  //  en mensaje el mensaje dentro del alert
  //  en el div va el div en el que se usara por ejemplo 
  const ALERTS_POR_MOSTRAR = {
    primary: `<div class="alert alert-primary" role="alert">
                  ${mensaje}
                </div>`,
    secondary: `<div class="alert alert-secondary" role="alert">
                  ${mensaje}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>`,
    success: `<div class="alert alert-success" role="alert">
                  ${mensaje}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>`,
    danger: `<div class="alert alert-danger" role="alert">
                  ${mensaje}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>`,
    warning: `<div class="alert alert-warning" role="alert">
                  ${mensaje}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>`,
    info:     `<div class="alert alert-info" role="alert">
                  ${mensaje}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>`,
    light: `<div class="alert alert-light" role="alert">
                  ${mensaje}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>`,
    dark: `<div class="alert alert-dark" role="alert">
                  ${mensaje}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>`,
  };
  const muestra = ALERTS_POR_MOSTRAR[tipo];
  //si le pasamos un div lo imprime ahi
  if(div){
    div.innerHTML += muestra;
  }
  //si no, lo improme en el div alert
  else{
    let div_alert = document.querySelector("#alert");
    div_alert.innerHTML += muestra;
  }
  
}


