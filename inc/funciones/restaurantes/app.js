import { enviar_datos, mostrar_ubicacion } from "../funciones_generales.js";
import { Ubicacion, select_ciudad, btn_confirmar_ciudad} from "../ubicacion.js";

const url = "../../inc/peticiones/restaurantes/funciones.php";
const contenedor = document.querySelector("#contenedor_restaurantes");

document.addEventListener("DOMContentLoaded", () => {
  const ubicacion = new Ubicacion();
  select_ciudad.addEventListener("change", ubicacion.obtener);
  btn_confirmar_ciudad.addEventListener("click", ubicacion.guardar);
  btn_confirmar_ciudad.addEventListener("click",mostrar_restaurantes);
  ubicacion.buscar();
  mostrar_restaurantes();
 // alert(mostrar_ubicacion().ciudad);
});

async function mostrar_restaurantes() {
    limpiar_contenedor();
  const datos = new FormData();
  const ciudad = mostrar_ubicacion().ciudad;
  datos.append("ciudad", ciudad)
  datos.append("accion", "obtener_restaurantes");
  const res = await enviar_datos(url, datos);
  console.log(res);
  res.forEach((restaurante) => {
    const { nombre, lugar, horario, descripcion } = restaurante;
    contenedor.innerHTML += `
    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
    <div class="featured__item">
        <div class="featured__item__pic set-bg" data-setbg="product-5.jpg">
            <ul class="featured__item__pic__hover">
                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                <li><a href="#"><i class="fa fa-eye"></i></a></li>
            </ul>
        </div>
        <div class="featured__item__text">
            <h6><a href="#">${descripcion}</a></h6>
            <h5>${nombre}</h5>
        </div>
    </div>
</div>
    `;
  });
}


function limpiar_contenedor() {
    contenedor.innerHTML ="";
}