import {mostrar_ubicacion, enviar_datos, mostrar_mensaje} from "../funciones_generales.js";
const url = "../../inc/peticiones/restaurantes/funciones.php";
var id_restaurante = "";
var ID_RESTAURANTE_P = "";
//CON ESTO OBTENEMOS EL ID DEL RESTAURANTE POR LA URL
document.addEventListener("DOMContentLoaded", () => {
    const parametrosURL = new URLSearchParams(window.location.search);
    let restaurante = parametrosURL.get("r");
    //SI LE PASAMOS UN RESTAURANTE LO BUSCARA
    if (restaurante) {
        //LE PASAMOS EL ID DE RESUTAURANTE
        id_restaurante = restaurante;
        ID_RESTAURANTE_P = restaurante;
        mostrar_restaurante(restaurante);
    }
    //SI NO LE PASAMOS NADA CARGARA UN MENSAJE DE ERROR
    else{
        mostrar_mensaje("error");
    }
});


//------------UN RESTAURANTE EN ESPECIFICO-----------
async function mostrar_restaurante(id){
    //limpiar_contenedor();
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
                        src="../../src/img/restaurantes/${foto}" alt="">
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
                <!--Area de Calificación
                <div class="product__details__rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <span>(18 reviews)</span>
                </div>
                Fin area de calificación-->

                <p id="descripcion_larga">${descripcion_larga}</p>
                    
                <div class="row mx-auto">
                    <a id="facebook" href="${fb}" class="fa fa-facebook btn site-btn mx-auto ml-2"></a>
                    <a id="instagram" href="${inst}" class="fa fa-instagram btn site-btn mx-auto ml-2"></a>
                    <!--<a id="favorito" href="#" class="fa fa-heart btn site-btn mx-auto ml-2"></a>-->
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
                <h4>Telefono</h4>
                <p id="telefono">${telefono}</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 text-center">
            <div class="contact__widget">
                <span class="icon_pin_alt"></span>
                <h4>Dirección</h4>
                <p id="direccion">${ciudad}, ${direccion}</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 text-center">
            <div class="contact__widget">
                <span class="icon_clock_alt"></span>
                <h4>Horario</h4>
                <p id="horarios">De -- a --</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 text-center">
            <div class="contact__widget">
                <span class="icon_mail_alt"></span>
                <h4>Correo</h4>
                <p id="correo">${correo}</p>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 text-center">
            <div class="contact__widget">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
                <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
            </svg>
                <h4>Días habiles</h4>
                <p id="dias">Lunes/Martes/Miercoles</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 text-center">
            <div class="contact__widget">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
                <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z"/>
            </svg>
                <h4>Disponibilidad</h4>
                <p id="dias">Abierto/Cerrado</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 text-center">
            <div class="contact__widget">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
            </svg>
                <h4>Categorias</h4>
                <p id="dias">Cat1/Cat2</p>
            </div>
        </div>
    
    </div>
    <!--Fin redes sociales-->
    `;
}


function imprime_menu_config(datos){
    let div_config = document.querySelector("#contenido2");
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
    //config_promociones();
    apartado_promociones();
    config_galeria();
    config_menu();
}

async function apartado_promociones(){

    var div_promociones = document.querySelector("#tabs-1");
    div_promociones.innerHTML+=`
        <div class="product__details__tab__desc">
            <div id="promos" class="card-columns mt-3 ">

            </div>
        </div>
    `;
    config_promociones();

}


async function config_promociones(){

    //aqui va tu codigo para obtener las promociones
    const datos = new FormData();
    var id = ID_RESTAURANTE_P;
    datos.append("id", ID_RESTAURANTE_P);
    datos.append("accion","ver_promo");
    //SE BUSCA EL RESTAURANTE CON SU ID
    const res = await enviar_datos(url, datos);
    console.log (res);
    var promociones = document.querySelector("#promos");

    //apartado_promociones();

    

    res.forEach(promocion => {
        
        const { id_restaurante, id_promocion, descripcion, Dias, Nombre, fecha, fecha_f, horario, imagen} = promocion;
        console.log (promocion);
        console.log (Dias);
        var cadenadias = Dias;
        var coma = ",";
        var arrayDeCadenas = "";

        function dividirCadena(cadenaADividir,separador) {
            arrayDeCadenas = cadenaADividir.split(separador);
    
            for (var i=0; i < arrayDeCadenas.length; i++) {
                console.log ("arrayDeCadenas[" +i + "]" + "= "+ arrayDeCadenas[i] + "<br>");
            }
            
            if(arrayDeCadenas[0] == 1){arrayDeCadenas[0] = "Lunes";}
            if(arrayDeCadenas[1] == 2){arrayDeCadenas[1] = "Martes";}
            if(arrayDeCadenas[2] == 3){arrayDeCadenas[2] = "Miercoles";}
            if(arrayDeCadenas[3] == 4){arrayDeCadenas[3] = "Jueves";}
            if(arrayDeCadenas[4] == 5){arrayDeCadenas[4] = "Viernes";}
            if(arrayDeCadenas[5] == 6){arrayDeCadenas[5] = "Sabado";}
            if(arrayDeCadenas[6] == 7){arrayDeCadenas[6] = "Domingo";}
            if(arrayDeCadenas[7] == 8){arrayDeCadenas[7] = "Todos";}
            
        }
        dividirCadena(cadenadias, coma);
        console.log(arrayDeCadenas);

        

        promociones.innerHTML+=`
            
                <div class="card" style="width: 23rem;">
                    <img class="card-img-top" src="../../src/img/promos/${imagen}" alt="Card image cap">
                    <div class="card-img-overlay">
                        <h3 class="card-title">${Nombre}</h3>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">${Nombre}</h5>
                        <p class="card-text">${descripcion}</p>
                        <h6 class="h6">Disponible los días: 
                            <p>${arrayDeCadenas[0]}/${arrayDeCadenas[1]}/${arrayDeCadenas[2]}/${arrayDeCadenas[3]}/${arrayDeCadenas[4]}/${arrayDeCadenas[5]}/${arrayDeCadenas[6]}/${arrayDeCadenas[7]}</p>
                        </h6>
                        <h6 class="h6">Horario de disponibilidad: <p>${horario}</p></h6>
                        <h6 class="h6">Fecha de inicio: <p>${fecha}</p></h6>
                        <h6 class="h6">Fecha de vencimiento: <p>${fecha_f}</p></h6>
                    </div>
                    
                </div>
                

    `;
    });

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

async function config_menu(){
    let div_menu = document.querySelector("#tabs-3");

    const datos = new FormData();
    datos.append("id",id_restaurante);
    datos.append("accion","obtener_menu");
    
    const res = await enviar_datos(url,datos);
    console.log(res); 

res.forEach(element => {
    div_menu.innerHTML+=`
    <div class="product__details__tab__desc">
            <div id="editor">
               ${element.descripcion}
            </div>

            <h4>imagen del menu</h4>

            <div class="row mt-3">
                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">

                    <img src="../../src/img/menus/${element.imagen}" class="w-100 shadow-1-strong rounded mb-4" alt="" />
                </div>
          

            </div>
        </div>
`;
});

}