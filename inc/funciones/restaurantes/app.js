import { enviar_datos, mostrar_ubicacion } from "../funciones_generales.js";

const url = "../../inc/peticiones/restaurantes/funciones.php";
const contenedor = document.querySelector("#contenedor_restaurantes");
const titulo = document.querySelector("#titulo_restaurantes");
const tienes_ciudad = mostrar_ubicacion().ciudad;

document.addEventListener("DOMContentLoaded", () => {
    if (!tienes_ciudad) {
        alert("parece que no tienes una ubicacion, selecciona tu ubicacion :D")
        window.location.href  ="../user/user.php";
    }else{
        mostrar_restaurantes();

    }
});

async function mostrar_restaurantes() {
  limpiar_contenedor();
  const datos = new FormData();
  const ciudad = mostrar_ubicacion().ciudad;
  datos.append("ciudad", ciudad);
  datos.append("accion", "obtener_restaurantes");
  const res = await enviar_datos(url, datos);
  titulo.innerHTML = `Todos los restaurantes de ${ciudad}`;
  res.forEach((restaurante) => {
    const { nombre, lugar, horario, descripcion, imagen } = restaurante;
    contenedor.innerHTML += `
                <div class="blog-card col-md-12 col-sm-12 col-xs-12 col-lg-5 mx-auto">
                    <div class="meta">
                        <div class="photo" style="background-image: url(../../src/img/restaurantes/${imagen}"></div>
                        <ul class="details">
                            <li class="author"><a href="#">Correo@mail.com</a></li>
                            <li class="tags">
                            <ul>
                                <li><a href="#">Facebook</a></li>
                                <li><a href="#">Instagram</a></li>
                                <li><a href="#">Twitter</a></li>
                            </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="description">
                        <h4>${nombre}</b></h4>
                        <h5>Abierto / Cerrado</h5>
                        <p class=""><small class="text-muted">${descripcion}</small></p>
                            <div class="row">
                                
                            </div>
                        <div class="read-more mt-2">
                            <button type="button" class="btn btn-outline-secondary btn-sm">
                                <span class="fa fa-heart">
                                </span>
                                Favorito
                            </button>
                            <a class="btn btn-outline-secondary btn-sm">
                                <span class="fa fa-eye" ></span> Visitar
                            </a>
                        </div>
                    </div>
                </div>
                `;
  });
}

function limpiar_contenedor() {
  contenedor.innerHTML = "";
  titulo.innerHTML = "";
}
