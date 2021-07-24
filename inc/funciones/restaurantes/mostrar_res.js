import {mostrar_ubicacion, enviar_datos, mostrar_mensaje} from "../funciones_generales.js";
const div_mostrar = document.querySelector("#mostrar");
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
        const div_error = document.querySelector("#mensaje");
        let contenido1 = document.querySelector("#form_contenido1");
        contenido1.innerHTML = "";
        mostrar_mensaje("error", div_error);
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
    const { id_restaurante, nombre, telefono, descripcion, facebook, instagram, descripcion_larga, horario, correo, cp, direccion, ciudad,foto} = datos;

    //espacio donde seran puesto los datos
    const text_nombre_restaurante = document.querySelector("#nombre_restaurante");
    const text_descripcion_larga = document.querySelector("#descripcion_larga");
    const text_descripcion_corta = document.querySelector("#descripcion_corta");
    const img_restaurante = document.querySelector("#img_restaurante");
    const text_facebook = document.querySelector("#facebook");
    const text_instagram = document.querySelector("#instagram");
    const texto_telefono = document.querySelector("#telefono");
    const texto_telefono_movil = document.querySelector("#telefono_movil");
    const texto_direccion = document.querySelector("#direccion");
    const texto_correo = document.querySelector("#correo");

    const contenido_telefono = document.querySelector("#contenido_telefono");
    const contenido_direccion = document.querySelector("#contenido_direccion");
    
    const contenido_correo = document.querySelector("#contenido_correo");
    
    
    
    //validando campos vacios
    if(telefono == null){
        contenido_telefono.innerHTML = "";
        $(contenido_telefono).removeClass();
    }
    else{texto_telefono.innerHTML = `${telefono}`;
        texto_telefono_movil.innerHTML = `llamar a: ${telefono}`;
        texto_telefono_movil.setAttribute("href", `tel:${telefono}`);
    }

    if(direccion == null){
        contenido_direccion.innerHTML = "";
        $(contenido_direccion).removeClass();
    }
    else{
        texto_direccion.innerHTML = `${ciudad}, ${direccion}, ${cp}`;
    }
    
    if(correo == null){
        contenido_correo.innerHTML = "";
        $(contenido_correo).removeClass();
    }
    else{
        texto_correo.innerHTML = `${correo}`;
    }
    
    if(facebook == null || facebook == ""){
        text_facebook.innerHTML = "";
        console.log(facebook);
    }
    else{
        text_facebook.setAttribute("href", `${facebook}`);
    }
    
    if(instagram == null || instagram == ""){
        text_instagram.innerHTML = "";
    }
    else{
        text_instagram.setAttribute("href", `${instagram}`);
    }

    text_nombre_restaurante.innerHTML = `${nombre}`;
    text_descripcion_larga.innerHTML = `${descripcion_larga}`;
    text_descripcion_corta.innerHTML = `${descripcion}`;

    let imagen_real = foto
    if(imagen_real == null){
        imagen_real = "fondo.png"
    }
    img_restaurante.setAttribute("src", `../../src/img/restaurantes/${imagen_real}`);
    
    imprime_restaurante_categorias();
    imprime_restaurante_dias();
}

async function imprime_restaurante_categorias(){
    const text_categorias = document.querySelector("#categorias");
    const contenido_categorias = document.querySelector("#contenido_categorias");
    const datos = new FormData();
    datos.append("id", id_restaurante)
    datos.append("accion", "obtener_categorias_restaurante_especifico");
    const res = await enviar_datos(url,datos);
    if(res.length > 0){
        //console.log(res);
        res.forEach((categoria) => text_categorias.innerHTML += `${categoria.nombre} -`);
    }
    else{   
        //console.log(res);
        contenido_categorias.innerHTML = "";
        $(contenido_categorias).removeClass();
    }
    
}

async function imprime_restaurante_dias(){
    const text_dias = document.querySelector("#dias");
    const texto_horarios = document.querySelector("#horarios");
    const contenido_horario = document.querySelector("#contenido_horario");
    const contenido_dias = document.querySelector("#contenido_dias");

    const datos = new FormData();
    datos.append("id", id_restaurante)
    datos.append("accion", "obtener_horario_restaurante_especifico");
    const res = await enviar_datos(url,datos);
    //console.log(res)
    if(res.length > 0){
        res.forEach((dias) =>{ 
            const {dia,hora_inicio,hora_fin} = dias;
            const apuerta_formato_12h = moment(hora_inicio, "hh:mm").format("h:mm a");
            const cierre_formato_12h = moment(hora_fin, "hh:mm").format("h:mm a");
            const dia_semana = moment(dia, "d").format("dddd");
            text_dias.innerHTML += `${dia_semana} - `;
            texto_horarios.innerHTML = `${apuerta_formato_12h} - ${cierre_formato_12h}`;
        });
    }
    else{
        contenido_horario.innerHTML = "";
        $(contenido_horario).removeClass()   
        contenido_dias.innerHTML = "";
        $(contenido_dias).removeClass();
    }
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
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab" aria-selected="false">Menús y platillos</a>
                        </li>
                    </ul>
                    
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div id="btn-promo" class="mt-3"> </div>
                            <div id="contenido_promociones">
                            <div class="product__details__tab__desc">
                                    <div id="promos" class="card-columns mt-3 ">
                                    </div>
                                </div></div>
                        </div>

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
    //apartado_promociones();
    //config_galeria();
    config_menu();
}


async function config_promociones(){
    var btn_promo = document.querySelector("#btn-promo");
    var promociones = document.querySelector("#promos");  
    //aqui va tu codigo para obtener las promociones
    const datos = new FormData();
    var id = ID_RESTAURANTE_P;
    datos.append("id", ID_RESTAURANTE_P);
    datos.append("accion","ver_promo");
    //SE BUSCA EL RESTAURANTE CON SU ID
    //aqui esta la funcion de ver restaurante
    const url2 = "../../inc/peticiones/admin/funciones.php";
    const res = await enviar_datos(url2, datos);
    if(res.sin_promo != true){
        let clase_activo = "btn-info";
        //let clase_inactivo ="btn-light disabled";
        let clase_l = "btn-light disabled";
        let clase_m = "btn-light disabled";
        let clase_mi = "btn-light disabled";
        let clase_j = "btn-light disabled";
        let clase_v = "btn-light disabled";
        let clase_s = "btn-light disabled";
        let clase_d = "btn-light disabled";

        res.forEach((element) => {
            let clase_l = "btn-light disabled";
            let clase_m = "btn-light disabled";
            let clase_mi = "btn-light disabled";
            let clase_j = "btn-light disabled";
            let clase_v = "btn-light disabled";
            let clase_s = "btn-light disabled";
            let clase_d = "btn-light disabled";
            console.log(element);
            const {nombre_res,Nombre,descripcion,fecha,fecha_f,horario,id_promocion,id_restaurante,imagen, lunes, martes, miercoles, jueves, viernes, sabado, domingo} = element;
            //console.log(lunes, martes, miercoles, jueves, viernes, sabado, domingo);
            if(lunes == 1){ clase_l = clase_activo }
            if(martes == 1){ clase_m = clase_activo }
            if(miercoles == 1){ clase_mi = clase_activo }
            if(jueves == 1){ clase_j = clase_activo }
            if(viernes == 1){ clase_v = clase_activo }
            if(sabado == 1){ clase_s = clase_activo }
            if(domingo == 1){ clase_d = clase_activo }
            promociones.innerHTML += `
            <div class="card">
                <div class="card-header border-secondary">
                    <a href="../restaurantes/restaurante_especifico.php?r=${id_restaurante}"><h3 class="card-title">${nombre_res}</h3> </a>
                </div>
                <img class="card-img-top" src="../../src/img/promos/${imagen}" alt="Card image cap">
                
                <div class="card-body">
                    <h5>${Nombre}</h5>
                    <small class="card-text"> ${descripcion}</small>
                    <br>
                    <small> 
                        Con Horario <i>${horario}</i>. <br>
                        Valido: <i>${fecha}</i> a <i>${fecha_f}</i>
                    </small>
                    <br>
                    <label>Disponible: </label><br>
                    <label class="btn btn-circle ${clase_l}">L</label>
                    <label class="btn btn-circle ${clase_m}">M</label>
                    <label class="btn btn-circle ${clase_mi}">M</label>
                    <label class="btn btn-circle ${clase_j}">J</label>
                    <label class="btn btn-circle ${clase_v}">V</label>
                    <label class="btn btn-circle ${clase_s}">S</label>
                    <label class="btn btn-circle ${clase_d}">D</label>
                </div>
            </div>
                
                
            `;
        });
    }
    else{
        console.log("sin promos");
        mostrar_mensaje("sin_promociones" ,btn_promo);
        
    }
    //console.log (res);
    
    //console.log(id);
    
    
}


function btn_agregar_promo(id){
    var div_promociones = document.querySelector("#contenido_promociones"); 
    div_promociones.innerHTML+=`
        <div class="row justify-content-center mt-3">
            <div class="col-md-3 mt-3">
                <a href="agregar_promocion.php?r=${id}" class="btn btn-sm primary-btn"> Agregar promoción</a>
            </div> 
        </div>
        `;
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
    if(res.sin_menu != true){
        res.forEach(element => {
            div_menu.innerHTML+=`
            <div class="product__details__tab__desc">
                    <h4>Menú</h4>
                    <div id="editor">
                       ${element.descripcion}
                    </div>
        
                    <h4>Imagen del menú</h4>
        
                    <div class="row mt-3">
                        <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
        
                            <img src="../../src/img/menus/${element.imagen}" class="w-100 shadow-1-strong rounded mb-4" alt="" />
                        </div>
                  
        
                    </div>
                </div>
        `;
        });
    } 
    else{
        mostrar_mensaje("sin_menu", div_menu)
    }


}