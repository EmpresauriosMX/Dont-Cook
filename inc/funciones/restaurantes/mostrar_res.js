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

    const text_nombre_restaurante = document.querySelector("#nombre_restaurante");
    const text_descripcion_larga = document.querySelector("#descripcion_larga");
    const img_restaurante = document.querySelector("#img_restaurante");
    const facebook = document.querySelector("#facebook");
    const texto_telefono = document.querySelector("#telefono");
    const texto_direccion = document.querySelector("#direccion");
    const texto_correo = document.querySelector("#correo");
  
    text_nombre_restaurante.innerHTML = `${nombre}`;
  
    text_descripcion_larga.innerHTML = `${descripcion_larga}`;
  
    texto_telefono.innerHTML = `${telefono}`;
  
    texto_direccion.innerHTML = `${ciudad}, ${direccion}, ${cp}`;
  
    texto_correo.innerHTML = `${correo}`;
  
    img_restaurante.setAttribute("src", `../../src/img/restaurantes/${foto}`);
    facebook.setAttribute("href", `${fb}`);
    imprime_restaurante_categorias();
    imprime_restaurante_dias();
}

async function imprime_restaurante_categorias(){
    const text_categorias = document.querySelector("#categorias");
    const datos = new FormData();
    datos.append("id", id_restaurante)
    datos.append("accion", "obtener_categorias_restaurante_especifico");
    const res = await enviar_datos(url,datos);
    res.forEach((categoria) => text_categorias.innerHTML += `${categoria.nombre} /`);
}

async function imprime_restaurante_dias(){
    const text_dias = document.querySelector("#dias");
    const texto_horarios = document.querySelector("#horarios");

    const datos = new FormData();
    datos.append("id", id_restaurante)
    datos.append("accion", "obtener_horario_restaurante_especifico");
    const res = await enviar_datos(url,datos);
    console.log(res)
    res.forEach((dias) =>{ 
        const {dia,hora_inicio,hora_fin} = dias;
         const apuerta_formato_12h = moment(hora_inicio, "hh:mm").format("h:mm a");
         const cierre_formato_12h = moment(hora_fin, "hh:mm").format("h:mm a");
        const dia_semana = moment(dia, "d").format("dddd");


         text_dias.innerHTML += `${dia_semana} /`;
         texto_horarios.innerHTML = `${apuerta_formato_12h} - ${cierre_formato_12h}`;

});
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