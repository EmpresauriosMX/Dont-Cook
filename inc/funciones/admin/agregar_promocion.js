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
  const foto = document.querySelector("#formFile").value;
  const lunes = document.querySelector("#lunes").value;
  const martes = document.querySelector("#martes").value;
  const miercoles = document.querySelector("#miercoles").value;
  const jueves = document.querySelector("#jueves").value;
  const viernes = document.querySelector("#viernes").value;
  const sabado = document.querySelector("#sabado").value;
  const domingo = document.querySelector("#domingo").value;
  const dia = document.querySelector("#reservation-time").value;
  const message = document.querySelector("#message").value;

  const datos = new FormData();
  
  datos.append("accion","agregar_promo");
  datos.append("nombre",nombre);
  datos.append("foto",foto);
  datos.append("lunes",lunes);
  datos.append("martes",martes);
  datos.append("miercoles",miercoles);
  datos.append("jueves",jueves);
  datos.append("viernes",viernes);
  datos.append("sabado",sabado);
  datos.append("domingo",domingo);
  datos.append("dia",dia);
  datos.append("message",message);

  enviar_datos(url, datos).then((resultado) =>alert(JSON.stringify(resultado)));


}


