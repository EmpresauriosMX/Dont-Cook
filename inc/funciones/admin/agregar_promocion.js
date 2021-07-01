import { enviar_datos, mostrar_ubicacion } from "../funciones_generales.js";
const url = "../../inc/peticiones/admin/funciones.php";
const btn = document.querySelector("#btn");
btn.addEventListener("click", qwerty);

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

function qwerty (){

  const nombre = document.querySelector("#fullname").value;
  const datos = new FormData();
  datos.append("accion","ver_promo");
  datos.append("qwerty1",nombre);

  enviar_datos(url, datos).then((resultado) =>alert(JSON.stringify(resultado)));


}


