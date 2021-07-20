import { enviar_datos, mostrar_ubicacion, mostrar_mensaje , mostrar_alert} from "../funciones_generales.js";
import { Ubicacion, select_ciudad, obj } from "../ubicacion.js";

const url = "../../inc/peticiones/admin/funciones.php";
var id_res;
const fechas = [];
//Documento del formulario
const form_edit_general = document.querySelector("#form_edit_general");
const btn_edit_general = document.getElementById("btn_edit_general");
const btn_edit_contacto = document.getElementById("btn_edit_contacto");
const lista_dias = document.querySelector("#lista_lista");

//------------OBTENER EL ID DEL RESTAURANTE-------------
document.addEventListener("DOMContentLoaded", () => {
  const parametrosURL = new URLSearchParams(window.location.search);
  let restaurante = parametrosURL.get("r");
  //SI LE PASAMOS UN RESTAURANTE LO BUSCARA
  if (restaurante) {
      //LE PASAMOS EL ID DE RESUTAURANTE
      id_res = restaurante;
      mostrar_restaurante(restaurante);
      //form_edit_general.addEventListener("submit", editar_datos_generales);
      //ESCUCHA LOS CLICK PARA EDITAR LOS DATOS
      btn_edit_general.addEventListener("click", editar_datos_generales);
      btn_edit_contacto.addEventListener("click", editar_datos_contato);
  }
  //SI NO LE PASAMOS NADA CARGARA UN MENSAJE DE ERROR
  else{
      mostrar_mensaje("error");
      listado_restaurante.innerHTML = "";
  }
});

/*/-----ESCUCHA DE LOS BOTONES DE SUBMIT DE LOS FORMULARIOS
document.addEventListener("DOMContentLoaded", () => {
  //ACTUALIZA DATOS GENERALES
  
});*/

//----------------------MOSTRAR LOS DATOS QUE YA TENIA EL RESTAURANTE--------
async function mostrar_restaurante(id){
  const datos = new FormData();
  datos.append("id", id);
  datos.append("accion","info_restaurantes");
  //SE BUSCA EL RESTAURANTE CON SU ID
  const res = await enviar_datos(url, datos);
  console.log(res);
  //SI SE ENCUENTRA EL RESTAURANTE SE IMPRIME
  if(!res.respuesta){
      imprime_restaurante(res);
      //imprime_menu_config(res);
  }
  else{
      mostrar_mensaje("error");
      listado_restaurante.innerHTML = "";
  }
}

async function imprime_restaurante(restaurante){
  let contenido1 = document.querySelector("#form_contenido_restaurante");
  const { id, nombre, telefono, descripcion, descripcion_larga, horario, correo, cp, direccion, ciudad,foto, serv_dom,fb, inst} = restaurante;
  
  const dias_validos = preparar_dias_a_enviar();

  //INFORMACION GENERAL
  //variables
  const nombre_res = document.querySelector("#nombre");
  const desc_corta = document.querySelector("#desc_corta");
  const desc_larga = document.querySelector("#desc_larga");
  const acc = document.querySelector("#acc");
  const servicio_domicilio = serv_dom ? 1 : 0;
  //imprimir en formulario
  nombre_res.value = nombre;
  desc_corta.value = descripcion;
  desc_larga.value = descripcion_larga
  acc.checked  = servicio_domicilio;

  //INFORAMACION DE CONTACTO
  //variables
  const telefono_res = document.querySelector("#telefono");
  const email = document.querySelector("#email");
  const facebook = document.querySelector("#facebook");
  const instagram = document.querySelector("#instagram");
  //imprimir en formulario
  telefono_res.value = telefono;
  email.value = correo;
  facebook.value = fb;
  instagram.value = inst;

  //INFORMACION DE CIUDAD 
  //variable
  const ciudad_actual = document.querySelector("#ciudad_actual");
  const direccion_res = document.querySelector("#direccion");
  const cp_res = document.querySelector("#cp");
  //imprimir en el formulario
  ciudad_actual.innerHTML = "Ciuad actual del restaurante: " + ciudad;
  direccion_res.value = direccion;
  cp_res.value = cp;
  
  //INFORMACION DE HORARIO
  const res_horario = await obtener_horario_restaurante(id);
  console.log(res_horario);
  if(res_horario.respuesta != "sin_horario"){
    res_horario.forEach((respuesta) => {
      console.log(respuesta);
      const {id_fechas, dia, hora_inicio, hora_fin} = respuesta;
        console.log(dia);
        const dia_div = document.getElementById(dia.toString());
        dia_div.checked = true;
      });
  }
  
}

async function obtener_horario_restaurante(restaurante){
  const datos = new FormData();
  datos.append("id", restaurante);
  datos.append("accion","horario_restaurante");
  //SE BUSCA EL HORARIO CON SU ID DE RESTAURANTE
  const horario = await enviar_datos(url, datos);
  //console.log(horario);
  return horario;
}


//------------------ENVIO DE LA ACTUALIZACION DEL RESTAURANTE------------
/*document.addEventListener("DOMContentLoaded", () => {
  const ubicacion = new Ubicacion();
  ubicacion.buscar();
  select_ciudad.addEventListener("change", ubicacion.obtener);
  //listado_restaurante.addEventListener("submit", registro_restaurante);
  lista_dias.addEventListener("change", agregar_dia);
});
*/
async function editar_datos_generales(e){
  e.preventDefault();
  console.log("entre con click");
  //VARIABLE
  const nombre = document.querySelector("#nombre").value;
  const desc_corta = document.querySelector("#desc_corta").value;
  const desc_larga = document.querySelector("#desc_larga").value;
  const acc = document.querySelector("#acc").checked;
  const servicio_domicilio = acc ? 1 : 0;
   //envio de variables
  const datos = new FormData();
  datos.append("id", id_res);
  datos.append("nombre", nombre);
  datos.append("desc_corta", desc_corta);
  datos.append("desc_larga", desc_larga);
  datos.append("servicio", servicio_domicilio);
  datos.append("accion", "actualiza_datos_generales");
  const res = await enviar_datos(url, datos);
  console.log(res);
  if(res.respuesta = "ok"){
    let div_alert2 = document.querySelector("#alert2");
    mostrar_alert("success", "Los datos generales han sido actualizados", div_alert2);
  }
}

async function editar_datos_contato(e){
  e.preventDefault();
  console.log("entre con click");
  //VARIABLE
  const telefono = document.querySelector("#telefono").value;
  const email = document.querySelector("#email").value;
  const facebook = document.querySelector("#facebook").value;
  const instagram = document.querySelector("#instagram").value;
   //envio de variables
  const datos = new FormData();
  datos.append("id", id_res);
  datos.append("telefono", telefono);
  datos.append("email", email);
  datos.append("face", facebook);
  datos.append("insta", instagram);
  datos.append("accion", "actualiza_datos_contacto");
  const res = await enviar_datos(url, datos);
  console.log(res);
  if(res.respuesta = "ok"){
    let div_alert2 = document.querySelector("#alert2");
    mostrar_alert("success", "Los datos generales han sido actualizados", div_alert2);
  }
}









function registro_restaurante(e) {
  e.preventDefault();
  const datos = new FormData();

  const dias_validos = preparar_dias_a_enviar();

  //VARIABLE
  const nombre = document.querySelector("#nombre").value;
  const desc_corta = document.querySelector("#desc_corta").value;
  const desc_larga = document.querySelector("#desc_larga").value;
  const ciudad = obj.ciudad;
  const direccion = document.querySelector("#direccion").value;
  const cp = document.querySelector("#cp").value;
  const telefono = document.querySelector("#telefono").value;
  const email = document.querySelector("#email").value;
  const acc = document.querySelector("#acc").checked;
  const facebook = document.querySelector("#facebook").value;
  const instagram = document.querySelector("#instagram").value;
  const imagen = document.querySelector("#imagen");
  const array_horarios = JSON.stringify(dias_validos);

  const servicio_domicilio = acc ? 1 : 0;

  //envio de variables
  datos.append("nombre", nombre);
  datos.append("desc_corta", desc_corta);
  datos.append("desc_larga", desc_larga);
  datos.append("ciudad", ciudad);
  datos.append("direccion", direccion);
  datos.append("cp", cp);
  datos.append("telefono", telefono);
  datos.append("email", email);
  datos.append("servicio", servicio_domicilio);
  datos.append("face", facebook);
  datos.append("insta", instagram);
  datos.append("imagen", imagen.files[0]);
  datos.append("horarios", array_horarios);

  datos.append("accion", "registrar_restaurante");
  enviar_datos(url, datos).then((re) =>alert(JSON.stringify(re)));
}

function agregar_dia(e) {
  // console.log(e.target);
  const id = e.target.id; // id del input;
  const is_day = fechas.findIndex((Element) => Element.id_dia == id);

  if (is_day != -1) {
    fechas[is_day].estado = e.target.checked; // true or false
  } else {
    fechas.push({
      id_dia: id,
      estado: true,
    });
  }
  console.table(fechas);
}

function preparar_dias_a_enviar() {
  const horario_abrir = document.querySelector("#horario_abrir").value;
  const horario_cerrar = document.querySelector("#horario_cerrar").value;

  const cambio = fechas.forEach((ele) => {
    ele.hora_inicio = horario_abrir;
    ele.hora_fin = horario_cerrar;
  });

  return fechas.filter((elem) => elem.estado == true);
}
