import { enviar_datos, mostrar_ubicacion, mostrar_mensaje } from "../funciones_generales.js";

const url = "../../inc/peticiones/restaurantes/funciones.php";
const contenedor = document.querySelector("#contenedor_restaurantes");
const titulo = document.querySelector("#titulo_restaurantes");
const tienes_ciudad = mostrar_ubicacion().ciudad;

//RECIBE POR GET UNA CATEGORIA
document.addEventListener("DOMContentLoaded", () => {
    const parametrosURL = new URLSearchParams(window.location.search);
    let categoria = parametrosURL.get("c");

    //SI LE PASAMOS UN RESTAURANTE LO BUSCARA
    if (restaurante) {
        //LE PASAMOS EL ID DE RESUTAURANTE
        mostrar_restaurantes(restaurante);
    }
    //SI NO LE PASAMOS NADA CARGARA UN MENSAJE DE ERROR
    else{
        mostrar_mensaje("error");
    }


    //SI LE PASAMOS UNA CATEGORIA LO BUSCARA
    console.log(categoria); 
    if (categoria) {
        //LE PASAMOS LA CATEGORIA
        if (!tienes_ciudad) {
            sin_ciudad();
        }else{
            mostrar_restaurantes_categoria(categoria);
        }
    }
    //SI NO LE PASAMOS NADA
    else{
        if (!tienes_ciudad) {
            sin_ciudad();
        }else{
            mostrar_restaurantes();
        }
        
    }
});
//si no tiene una ciudad registrada
function sin_ciudad(){
    mostrar_mensaje("sin_ciudad");
    const div_categorias = document.querySelector("#categorias");
    div_categorias.innerHTML = "";
}

//----------------------CATEGORIAS-----------------------------

async function mostrar_restaurantes_categoria(categoria){
    mostar_banner_categoria(categoria);
    console.log("voy a cargar los restaurantes de la categoria: "+categoria);
    
}

async function mostar_banner_categoria(categoria){
    console.log("voy a mostrar el banner de la categoria: "+categoria);
    let banner = document.querySelector("#banner_categoria");
    const BANNERS ={
        'tacos' : ["tacos.png","tacos"],
        'comida_rapida' : ["fast_food.png","Comida rapida"],                           
    }
    const DEFAULT_BANNER = ["fondo.jpeg", "¡Gracias por la idea! pronto estará esta categoría"]; 
    const muestra = BANNERS[categoria] || DEFAULT_BANNER;
    const aver = BANNERS[categoria] ? BANNERS[categoria]: categoria_rara();
    const foto = muestra[0];
    const titulo1 = muestra[1];
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

function categoria_rara(){
    let banner = document.querySelector("#banner_categoria");
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

//------------TODOS LOS RESTUARANTES DE LA CIUDAD-----------
async function mostrar_restaurantes() {
    limpiar_contenedor();
    const datos = new FormData();
    const ciudad = mostrar_ubicacion().ciudad;
    datos.append("ciudad", ciudad);
    datos.append("accion", "obtener_restaurantes");
    const res = await enviar_datos(url, datos);
    titulo.innerHTML = `<h2>Todos los restaurantes de ${ciudad}</h2>`;
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
    contenido1.innerHTML = "";
}


//------------UN RESTAURANTE EN ESPECIFICO-----------
async function mostrar_restaurante(id){
    limpiar_contenedor();
    const datos = new FormData();
    datos.append("id", id);
    datos.append("accion","mostrar_restaurante");
    //SE BUSCA EL RESTAURANTE CON SU ID
    const res = await enviar_datos(url, datos);
    console.log(res);
    //SI SE ENCUENTRA EL RESTAURANTE SE IMPRIME
    if(!res.respuesta){
        imprime_restaurante(res);
        imprime_menu_config(res);
    }
    else{
        mostrar_mensaje("error");
    }
}

function imprime_restaurante(datos){
    let contenido1 = document.querySelector("#form_contenido1");
    const { id_restaurante, nombre, telefono, descripcion, fb, inst, descripcion_larga, horario, correo, cp, direccion, ciudad,foto} = datos;

    contenido1.innerHTML += `
    <div class="row">
        <!--Slider-->
        <div class="col-lg-6 col-md-6">
            <div class="product__details__pic">
                <!--Logo del restaurante-->
                <div class="product__details__pic__item">
                    <img class="product__details__pic__item--large"
                        src="../../src/img/restaurants/${foto}" alt="">
                </div>
                <!--Fin logo del restaurante-->

                <!--Imagenes del restaurante-->
                <div class="product__details__pic__slider owl-carousel">
                    <img data-imgbigurl="../../src/img/restaurants/1.jpg"
                        src="../../src/img/restaurants/1.jpg" alt="">
                    <img data-imgbigurl="../../src/img/restaurants/2.jpg"
                        src="../../src/img/restaurants/2.jpg" alt="">
                    <img data-imgbigurl="../../src/img/restaurants/3.jpg"
                        src="../../src/img/restaurants/3.jpg" alt="">
                    <img data-imgbigurl="../../src/img/restaurants/4.jpg"
                        src="../../src/img/restaurants/4.jpg" alt="">
                </div>
                <!--Fin imagenes del restaurante-->

            </div>
        </div>
        <!--Fin slider-->

        <!--Información del restaurante-->
        <div class="col-lg-6 col-md-6">
            <div class="product__details__text">
                <h1 id="nombre_restaurante">${nombre}</h1>
                <!--Area de Calificación-->
                <div class="product__details__rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <span>(18 reviews)</span>
                </div>
                <!--Fin area de calificación-->

                <p id="descripcion_larga">${descripcion_larga}</p>
                    
                <div class="row mx-auto">
                    <a id="facebook" href="${fb}" class="fa fa-facebook btn site-btn mx-auto ml-2"></a>
                    <a id="instagram" href="${inst}" class="fa fa-instagram btn site-btn mx-auto ml-2"></a>
                    <a id="favorito" href="#" class="fa fa-heart btn site-btn mx-auto ml-2"></a>
                </div>
                <br>
                
            </div>
        </div>
        <!--Fin información del restaurante-->
    </div>

    <br><br>
    <!--Redes Sociales-->
    <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_phone"></span>
                    <h4>${telefono}</h4>
                    <p id="telefono">+01-3-8888-6868</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_pin_alt"></span>
                    <h4>${direccion}</h4>
                    <p id="direccion">60-49 Road 11378 New York</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_clock_alt"></span>
                    <h4>${horario}</h4>
                    <p id="horarios">10:00 am to 23:00 pm</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_mail_alt"></span>
                    <h4>${correo}</h4>
                    <p id="correo">hello@colorlib.com</p>
                </div>
            </div>
        </div>
    <!--Fin redes sociales-->
            `;
}


function imprime_menu_config(datos){
    let div_config = document.querySelector("#form_segundo_contenido");
    const { id_restaurante, nombre, telefono, descripcion, descripcion_larga, horario, correo, cp, direccion, ciudad} = datos;
    div_config.innerHTML+=`
            <div class="row">
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="true">Promociones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab" aria-selected="false">Galeria</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab" aria-selected="false">Menús y platillos</a>
                        </li>
                    </ul>
                    
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel"></div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel"></div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel"></div>
                    </div>
                </div>
            </div>
            
        </div>
        <br>
    `;
    //Imprime cada una de las configuraciones 
    config_promociones();
    config_galeria();
    config_menu();
}

function config_promociones(datos){
    //aqui va tu codigo para obtener las promociones
    let div_promociones = document.querySelector("#tabs-1");
    div_promociones.innerHTML+=`
    <div class="product__details__tab__desc">
            <h3>Promociones</h3>
            <div class="card-columns mt-3 ">
                
                <div class="card">
                    <img class="card-img-top" src="../../src/img/banner/banner-1.jpg" alt="Card image cap">
                    <div class="card-img-overlay">
                        <h4 class="card-title">Restaurante</h4>
                    </div>
                    <div class="card-body">
                        <h6>Nombre de la Promoción</h6>
                        <p class="card-text">Descripción de la promocion... <br>
                        Chelas 2x1 xdxd <br>
                        De Lunes a Jueves <br>
                        Con Horario de 12:00 a 16:00</p>
                    </div>
                </div>

            </div>
            
            <div class="col-md-3 col-sm-6 col-lg-4  mt-3">
                <div class="card">
                    <div class="card-body text-center">
                        <p><strong>Agregar</strong></p>
                        <a href="agregar_promocion.php" class="fa fa-plus btm btn site-btn mx-auto"></a>
                    </div>
                </div>
            </div>
        </div>
    `
}

function config_galeria(datos){
    let div_galeria = document.querySelector("#tabs-2");
    div_galeria.innerHTML+=`
        
        <div class="product__details__tab__desc">
                <h3>Fotos</h3>
                
                <div class="row mt-3">
                    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                        <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(73).jpg" class="w-100 shadow-1-strong rounded mb-4" alt="" />

                        <img src="https://mdbootstrap.com/img/Photos/Vertical/mountain1.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="" />
                    </div>

                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <img src="https://mdbootstrap.com/img/Photos/Vertical/mountain2.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="" />

                        <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(73).jpg" class="w-100 shadow-1-strong rounded mb-4" alt="" />
                    </div>

                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(18).jpg" class="w-100 shadow-1-strong rounded mb-4" alt="" />

                        <img src="https://mdbootstrap.com/img/Photos/Vertical/mountain3.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="" />
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6 col-lg-4 ">
                    <div class="card">
                        <div class="card-body text-center">
                            <p><strong>Agregar o editar</strong></p>
                            <span class="fa fa-plus btm btn site-btn mx-auto"></span>
                        </div>
                    </div>
                </div>
            </div>
    `;
}

function config_menu(datos){
    let div_menu = document.querySelector("#tabs-3");
    div_menu.innerHTML+=`
        
        <div class="product__details__tab__desc">
                <h3>Agrega tu menú en forma de texto!</h3>
                <br>
                <div id="editor">
                    <p>Agrega tu delicioso menú!</p>
                    <p>Agrega tu propio diseño!</p>
                    <p>Rico menú! <strong> $20.00</strong> <em>
                            <-Empieza a agregar tus deliciosos platillos</em>
                    </p>
                    <p><strong>(borra el texto anterior para empezar a escribir tu menú)</strong>...</p>
                    <p><br></p>
                </div>
                <br>
                <div>
                    <button type="button" value="contenido" onclick="jssave()" class="btn btn-warning">Guardar Menu!</button>
                </div>
                <br>

                <h3>O si prefieres agrega imagenes de tu menú!</h3>

                <div class="row mt-3">
                    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                        <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(73).jpg" class="w-100 shadow-1-strong rounded mb-4" alt="" />
                    </div>
                    <div class="col-md-3 col-sm-6 col-lg-4 ">
                        <div class="card">
                            <div class="card-body text-center">

                                <form action="../../inc/peticiones/admin/upload.php" method="post" enctype="multipart/form-data">
                                    Select image to upload:
                                    <input type="file" name="fileToUpload" id="fileToUpload">
                                    <input type="submit" value="Subir" name="submit">
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    `;
}