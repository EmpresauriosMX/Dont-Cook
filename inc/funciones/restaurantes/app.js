import { enviar_datos, mostrar_ubicacion, mostrar_mensaje, } from "../funciones_generales.js";

const url = "../../inc/peticiones/restaurantes/funciones.php";
const contenedor = document.querySelector("#contenedor_restaurantes");
const titulo = document.querySelector("#titulo_restaurantes");
const tienes_ciudad = mostrar_ubicacion().ciudad;
const banner = document.querySelector("#banner_categoria");

//RECIBE POR GET UNA CATEGORIA
document.addEventListener("DOMContentLoaded", () => {
  const parametrosURL = new URLSearchParams(window.location.search);
  let categoria = parametrosURL.get("c");

  //SI LE PASAMOS UNA CATEGORIA LO BUSCARA
  //console.log(categoria);
  if (categoria) {
    //LE PASAMOS LA CATEGORIA
    if (!tienes_ciudad) {
      sin_ciudad();
    } else {
      mostrar_restaurantes_categoria(categoria);
    }
  }
  //SI NO LE PASAMOS NADA
  else {
    if (!tienes_ciudad) {
      sin_ciudad();
    } else {
      buscar_todos_los_restaurantes();
    }
  }
});
//si no tiene una ciudad registrada
function sin_ciudad() {
  mostrar_mensaje("sin_ciudad");
  const div_categorias = document.querySelector("#categorias");
  div_categorias.innerHTML = "";
  titulo.innerHTML = ``;
}

//----------------------CATEGORIAS-----------------------------

async function mostrar_restaurantes_categoria(categoria) {
  mostar_banner_categoria(categoria);
  //console.log("voy a cargar los restaurantes de la categoria: "+categoria);
}

async function mostar_banner_categoria(categoria) {
  //console.log("voy a mostrar el banner de la categoria: "+categoria);

  //AQUI  VAN LAS CATEGORIAS, ESTA LISTA VA CRECIENDO
  //LAS CATEGORIAS SE VAN AGREGANDO AQUI CON UNA IMAGEN Y UNA FOTO
  const BANNERS = {
    Bares: ["bar.jpg", "Bares"],
    Cafeterías: ["coffee.jpg", "Cafeterías"],
    "Carritos de comida": ["truck.jpg", "Carritos de comida"],
    "Comida oriental": ["oriental.jpg", "Comida oriental"],
    "Comida mexicana": ["tacos.jpg", "Comida mexicana"],
    "Comida rapida": ["fast.jpg", "Comida rapida"],
    Mariscos: ["camaron.jpg", "Mariscos"],
    Pizzerias: ["pizza.jpg", "Pizzerías"],
    "Servicio a domicilio": ["delivery.jpg", "Servicio a domicilio"],
  };
  const DEFAULT_BANNER = [
    "fondo.jpeg",
    "¡Gracias por la idea! pronto estará esta categoría",
  ];
  //const muestra = BANNERS[categoria] || DEFAULT_BANNER;
  //const aver = BANNERS[categoria] ? BANNERS[categoria] : categoria_rara();
  const muestra = BANNERS[categoria] || false;
  //console.log(muestra);
  if (muestra) {
    const foto = muestra[0];
    const titulo1 = muestra[1];
    banner.innerHTML = `
            <section class="d-block d-sm-block d-md-none breadcrumb-section set-bg" data-setbg="../../src/img/categories/${foto}" style="background-image: url(&quot;../../src/img/categories/${foto}&quot;);">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="breadcrumb__text">
                                <h2 id="nombre_restaurante">${titulo1}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        `;
    titulo.innerHTML = `<h2> ${categoria} </h2>`;
    cargar_restaurantes_categoria(categoria);
  } else {
    categoria_rara();
  }
}

function categoria_rara() {
  //console.log("entre a raros");
  const foto = "fondo.jpeg";
  const titulo1 = "¡Gracias por la idea! pronto estará esta categoría";
  banner.innerHTML = `
        <section class="breadcrumb-section set-bg" data-setbg="../../src/img/categories/${foto}" style="background-image: url(&quot;../../src/img/categories/${foto}&quot;);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2 id="nombre_restaurante">${titulo1}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    `;
  titulo.innerHTML = ``;
}
//------------TODOS LOS RESTUARANTES que pertenecen a una categoria-----------

async function cargar_restaurantes_categoria(categoria) {
  const datos = new FormData();
  const ciudad = mostrar_ubicacion().ciudad;
  datos.append("ciudad", ciudad);
  datos.append("categoria", categoria);
  datos.append("accion", "obtener_restaurantes_categoria");
  //console.log(ciudad, categoria);
  const res = await enviar_datos(url, datos);
  //console.log(res);
  if (res.respuesta) {
    mostrar_mensaje("error");
  } else {
    pintar_restaurantes_html(res);
  }
}

//------------TODOS LOS RESTUARANTES DE LA CIUDAD-----------
async function buscar_todos_los_restaurantes() {
  const datos = new FormData();
  const ciudad = mostrar_ubicacion().ciudad;
  datos.append("ciudad", ciudad);
  datos.append("accion", "obtener_restaurantes");
  const res = await enviar_datos(url, datos);
  console.log("todos los resutantes");
  console.log(res);
  pintar_restaurantes_html(res);
}

//plantilla para pintar  mostrar los restaurantes
function pintar_restaurantes_html(res) {
  limpiar_contenedor();
  titulo.innerHTML = `<h2>Todes los restaurantes de ${tienes_ciudad}</h2>`;

  res.forEach((restaurante) => {
    //console.log(restaurante);
    const { id, nombre, lugar, horario, descripcion, imagen, correo, fb, insta } = restaurante;
    contenedor.innerHTML += `
                <div class="blog-card col-md-12 col-sm-12 col-xs-12 col-lg-5 mx-auto">
                    <div class="meta">
                        <div class="photo" style="background-image: url(../../src/img/restaurantes/${imagen}"></div>
                        <ul class="details">
                            <li class="author">Correo: <a href="#">${correo}</a></li>
                            <li class="tags">
                            <ul>
                                <li>Facebook: <a href="${fb}">${fb}</a></li>
                                <li>Instagram: <a href="${insta}">${insta}</a></li>
                            </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="description">
                        <h4>${nombre}</b></h4> 
                        <div id = "restaurante_horario_${id}"> 
                            <div class ="text-danger"> Cerrado!</div>
                        </div>
                          <p class=""> <small class="text-muted">${descripcion}</small></p>
                            <div class="row">
                                
                            </div>
                        <div class="read-more mt-2">
                            <a href="restaurante_especifico.php?r=${id}" class="btn btn-outline-secondary btn-sm">
                                <span class="fa fa-eye" ></span> Visitar
                            </a>
                        </div>
                    </div>
                </div>
                `;
  });
  pintar_horario_html(); //los horarios disponibles hoy
}

function limpiar_contenedor() {
  contenedor.innerHTML = "";
  titulo.innerHTML = "";
}

async function pintar_horario_html() {
  const dia_hoy = moment().format("d");
  const ciudad = mostrar_ubicacion().ciudad;
  // console.log(dia_hoy);
  //console.log(ciudad);

  const datos = new FormData();
  datos.append("dia", dia_hoy);
  datos.append("ciudad", ciudad);
  datos.append("accion", "obtener_horarios");

  const res = await enviar_datos(url, datos);
  console.log(res);
  res.forEach((horario) => {
    const { id, apertura, cierre, servicio_domicilio } = horario;

    const apuerta_formato_12h = moment(apertura, "hh:mm").format("h:mm a");
    const cierre_formato_12h = moment(cierre, "hh:mm").format("h:mm a");
    const lista = document.querySelector(`#restaurante_horario_${id}`);
    if (lista) {
      lista.innerHTML = "";
      if (servicio_domicilio === 1) {
        lista.innerHTML = `
        <div class = "text-success">
        <i class="fa fa-car"></i>
           De ${apuerta_formato_12h} a ${cierre_formato_12h} </div> `;
      } else {
        lista.innerHTML = `
        <div class = "text-warning">Sin Servicio a Domicilio! :/</div>
        <div class = "text-success">De ${apuerta_formato_12h} a ${cierre_formato_12h} </div> `;
      }
    }
  });
}
