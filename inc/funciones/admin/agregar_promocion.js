$(document).on('change','#lunes' ,function(e) {
  const lunes = document.querySelector("#id_lunes").value;
  if(this.checked) $('#id_lunes').val(this.value);
  else $('#id_lunes').val("");
  console.log (lunes);
});
$(document).on('change','#martes' ,function(e) {
  const martes = document.querySelector("#id_martes").value;
  if(this.checked) $('#id_martes').val(this.value);
  else $('#id_martes').val("");
  console.log (martes);
});
$(document).on('change','#miercoles' ,function(e) {
  const miercoles = document.querySelector("#id_miercoles").value;
  if(this.checked) $('#id_miercoles').val(this.value);
  else $('#id_miercoles').val("");
  console.log (miercoles);
});
$(document).on('change','#jueves' ,function(e) {
  const jueves = document.querySelector("#id_jueves").value;
  if(this.checked) $('#id_jueves').val(this.value);
  else $('#id_jueves').val("");
  console.log (jueves);
});
$(document).on('change','#viernes' ,function(e) {
  const viernes = document.querySelector("#id_viernes").value;
  if(this.checked) $('#id_viernes').val(this.value);
  else $('#id_viernes').val("");
  console.log (viernes);
});
$(document).on('change','#sabado' ,function(e) {
  const sabado = document.querySelector("#id_sabado").value;
  if(this.checked) $('#id_sabado').val(this.value);
  else $('#id_sabado').val("");
  console.log (sabado);
});
$(document).on('change','#domingo' ,function(e) {
  const domingo = document.querySelector("#id_domingo").value;
  if(this.checked) $('#id_domingo').val(this.value);
  else $('#id_domingo').val("");
  console.log (domingo);
});
$(document).on('change','#todos' ,function(e) {
  const todos = document.querySelector("#id_todos").value;
  if(this.checked) $('#id_todos').val(this.value);
  else $('#id_todos').val("");
  console.log (todos);
});

import { enviar_datos, mostrar_ubicacion } from "../funciones_generales.js";
const url = "../../inc/peticiones/admin/funciones.php";
const btn = document.querySelector("#btn");
btn.addEventListener("click", promociones);

document.getElementById("file").onchange = function(e) {
  // Creamos el objeto de la clase FileReader
  let reader = new FileReader();

  // Leemos el archivo subido y se lo pasamos a nuestro fileReader
  reader.readAsDataURL(e.target.files[0]);

  // Le decimos que cuando este listo ejecute el código interno
  reader.onload = function(){
    let preview = document.getElementById('preview'),
            image = document.createElement('img');

    image.src = reader.result;

    preview.innerHTML = '';
    preview.append(image);
  };
}

function promociones (){

  const nombre = document.querySelector("#fullname").value;
  const foto = document.querySelector("#formFile");
  const lunes = document.querySelector("#id_lunes").value;
  const martes = document.querySelector("#id_martes").value;
  const miercoles = document.querySelector("#id_miercoles").value;
  const jueves = document.querySelector("#id_jueves").value;
  const viernes = document.querySelector("#id_viernes").value;
  const sabado = document.querySelector("#id_sabado").value;
  const domingo = document.querySelector("#id_domingo").value;
  const todos = document.querySelector("#id_todos").value;
  const dia = document.querySelector("#reservation-time").value;
  const inicio = document.querySelector("#horario_inicio").value;
  const fin = document.querySelector("#horario_conclusion").value;
  const message = document.querySelector("#message").value;

  const datos = new FormData();

  datos.append("accion","agregar_promo");
  datos.append("nombre",nombre);
  datos.append("foto", foto.files[0]);
  datos.append("lunes",lunes);
  datos.append("martes",martes);
  datos.append("miercoles",miercoles);
  datos.append("jueves",jueves);
  datos.append("viernes",viernes);
  datos.append("sabado",sabado);
  datos.append("domingo",domingo);
  datos.append("todos",todos);
  datos.append("dia",dia);
  datos.append("inicio",inicio);
  datos.append("fin",fin);
  datos.append("message",message);

  enviar_datos(url, datos).then((resultado) =>alert(JSON.stringify(resultado)));


}