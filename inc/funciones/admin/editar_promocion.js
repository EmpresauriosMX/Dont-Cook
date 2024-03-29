import {mostrar_ubicacion, enviar_datos, mostrar_mensaje, mostrar_alert} from "../funciones_generales.js";
const url = "../../inc/peticiones/admin/funciones.php";
const btn = document.querySelector("#btn");
var id_promocion = "";
var id_res;
//CON ESTO OBTENEMOS EL ID DEL RESTAURANTE POR LA URL
document.addEventListener("DOMContentLoaded", () => {
    const parametrosURL = new URLSearchParams(window.location.search);
    let promocion = parametrosURL.get("p");
    //SI LE PASAMOS UN RESTAURANTE LO BUSCARA
    if (promocion) {
        //LE PASAMOS EL ID DE RESUTAURANTE
        id_promocion = promocion;
        mostrar_promocion(promocion);
        btn.addEventListener("click", promociones);
    }
    //SI NO LE PASAMOS NADA CARGARA UN MENSAJE DE ERROR
    else{
        mostrar_mensaje("error");
        let contenido1 = document.querySelector("#demo-form");
        contenido1.innerHTML = "";
    }
    //console.log (promocion);
});

async function mostrar_promocion(promocion){
  //aqui va tu codigo para obtener las promociones
  const datos = new FormData();
  datos.append("id", promocion);
  datos.append("accion","ver_promo_especifico");
  //SE BUSCA LA PROMOCION CON SU ID
  const res = await enviar_datos(url, datos);
  //console.log (res);
  id_res = res.id_restaurante;
  //console.log(id_res);
  //SE EIMPRIMEN LOS DATOS DE LA PROMOCION
  const div_nombre = document.querySelector("#fullname");
  const div_message = document.querySelector("#message");

  const div_lunes = document.querySelector("#lunes");
  const div_martes = document.querySelector("#martes");
  const div_miercoles = document.querySelector("#miercoles");
  const div_jueves = document.querySelector("#jueves");
  const div_viernes = document.querySelector("#viernes");
  const div_sabado = document.querySelector("#sabado");
  const div_domingo = document.querySelector("#domingo");

  const div_fecha_inicio = document.querySelector("#reservation-time1");
  const div_fecha_fin = document.querySelector("#reservation-time2");

  const div_horario_inicio = document.querySelector("#horario_inicio");
  const div_horario_conclusion = document.querySelector("#horario_conclusion");
  
  //asiganrle los  valores que tienen por defecto las promociones
  div_nombre.value = res.Nombre;
  div_message.value = res.descripcion;
  if(res.lunes == 1){div_lunes.checked = true;}
  if(res.martes == 1){div_martes.checked = true;}
  if(res.miercoles == 1){div_miercoles.checked = true;}
  if(res.jueves == 1){div_jueves.checked = true;}
  if(res.viernes == 1){div_viernes.checked = true;}
  if(res.sabado == 1){div_sabado.checked = true;}
  if(res.domingo == 1){div_domingo.checked = true;}
  
  div_fecha_inicio.value = res.fecha;
  div_fecha_fin.value = res.fecha_f;
  let horario_unido = res.horario;
  let dividido = horario_unido.split(' ');
  div_horario_inicio.value = dividido[1];
  div_horario_conclusion.value = dividido[3];
}


$(document).on('change','#lunes' ,function(e) {
  const lunes = document.querySelector("#id_lunes").value;
  if(this.checked) $('#id_lunes').val(this.value);
  else $('#id_lunes').val("");
  //console.log (lunes);
});
$(document).on('change','#martes' ,function(e) {
  const martes = document.querySelector("#id_martes").value;
  if(this.checked) $('#id_martes').val(this.value);
  else $('#id_martes').val("");
  //console.log (martes);
});
$(document).on('change','#miercoles' ,function(e) {
  const miercoles = document.querySelector("#id_miercoles").value;
  if(this.checked) $('#id_miercoles').val(this.value);
  else $('#id_miercoles').val("");
  //console.log (miercoles);
});
$(document).on('change','#jueves' ,function(e) {
  const jueves = document.querySelector("#id_jueves").value;
  if(this.checked) $('#id_jueves').val(this.value);
  else $('#id_jueves').val("");
  //console.log (jueves);
});
$(document).on('change','#viernes' ,function(e) {
  const viernes = document.querySelector("#id_viernes").value;
  if(this.checked) $('#id_viernes').val(this.value);
  else $('#id_viernes').val("");
  //console.log (viernes);
});
$(document).on('change','#sabado' ,function(e) {
  const sabado = document.querySelector("#id_sabado").value;
  if(this.checked) $('#id_sabado').val(this.value);
  else $('#id_sabado').val("");
  //console.log (sabado);
});
$(document).on('change','#domingo' ,function(e) {
  const domingo = document.querySelector("#id_domingo").value;
  if(this.checked) $('#id_domingo').val(this.value);
  else $('#id_domingo').val("");
  //console.log (domingo);
});
$(document).on('change','#todos' ,function(e) {
  const todos = document.querySelector("#id_todos").value;
  if(this.checked) $('#id_todos').val(this.value);
  else $('#id_todos').val("");
  //console.log (todos);
});


async function promociones (e){
  e.preventDefault();
  const nombre = document.querySelector("#fullname").value;
  /*var lunes = document.querySelector("#id_lunes").value;
  const martes = document.querySelector("#id_martes").value;
  const miercoles = document.querySelector("#id_miercoles").value;
  const jueves = document.querySelector("#id_jueves").value;
  const viernes = document.querySelector("#id_viernes").value;
  const sabado = document.querySelector("#id_sabado").value;
  const domingo = document.querySelector("#id_domingo").value;
  */
  var lunes;
  var martes;
  var miercoles;
  var jueves;
  var viernes;
  var sabado;
  var domingo;

  const diai = document.querySelector("#reservation-time1").value;
  const diaf = document.querySelector("#reservation-time2").value;
  const inicio = document.querySelector("#horario_inicio").value;
  const fin = document.querySelector("#horario_conclusion").value;
  const message = document.querySelector("#message").value;

  if(document.getElementById('lunes').checked){ lunes = 1;}else{ lunes = 0}
  if(document.getElementById('martes').checked){  martes = 1;}else{ martes = 0}
  if(document.getElementById('miercoles').checked){   miercoles = 1;}else{ miercoles = 0}
  if(document.getElementById('jueves').checked){  jueves = 1;}else{ jueves = 0}
  if(document.getElementById('viernes').checked){  viernes = 1;}else{ viernes = 0}
  if(document.getElementById('sabado').checked){  sabado = 1;}else{ sabado = 0}
  if(document.getElementById('domingo').checked){  domingo = 1;}else{ domingo = 0}

  console.log(lunes, martes, miercoles, jueves, viernes, sabado, domingo);

  const datos = new FormData();

  datos.append("accion","editar_promo");
  datos.append("nombre",nombre);
  datos.append("lunes",lunes);
  datos.append("martes",martes);
  datos.append("miercoles",miercoles);
  datos.append("jueves",jueves);
  datos.append("viernes",viernes);
  datos.append("sabado",sabado);
  datos.append("domingo",domingo);
  datos.append("diai",diai);
  datos.append("diaf",diaf);
  datos.append("inicio",inicio);
  datos.append("fin",fin);
  datos.append("message",message);
  datos.append("id_promocion",id_promocion);

  const res = await enviar_datos(url, datos);
  console.log(res);
  window.location = "../admin/restaurante_ver.php?r="+id_res;
}
