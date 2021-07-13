import {mostrar_ubicacion, enviar_datos, mostrar_mensaje} from "../funciones_generales.js";
const url = "../../inc/peticiones/admin/funciones.php";
var id_restaurante = "";
var ID_RESTAURANTE_P = "";
var enviar_menu = document.querySelector("#enviar_el_menu");
var quill = new Quill('#editor', {
    theme: 'snow'
});

//CON ESTO OBTENEMOS EL ID DEL RESTAURANTE POR LA URL
document.addEventListener("DOMContentLoaded", () => {
    const parametrosURL = new URLSearchParams(window.location.search);
    let restaurante = parametrosURL.get("r");
    enviar_menu.addEventListener("click",jssave);
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

async function mostrar_restaurante(id){
    const datos = new FormData();
    datos.append("id", id);
    datos.append("accion","info_restaurantes");
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

function imprime_restaurante(datos) {
  let contenido1 = document.querySelector("#form_contenido_restaurante");
  const { id, nombre, telefono, descripcion, descripcion_larga,horario, correo, cp, direccion, ciudad, foto, fb} = datos;

  const text_nombre_restaurante = document.querySelector("#nombre_restaurante");
  const text_descripcion_larga = document.querySelector("#descripcion_larga");
  const img_restaurante = document.querySelector("#img_restaurante");
  const facebook = document.querySelector("#facebook");
  const enlace_editar_restaurante = document.querySelector("#editar");
  const texto_telefono = document.querySelector("#telefono");
  const texto_direccion = document.querySelector("#direccion");
  const texto_horarios = document.querySelector("#horarios");
  const texto_correo = document.querySelector("#correo");

  text_nombre_restaurante.innerHTML = `${nombre}`;

  text_descripcion_larga.innerHTML = `${descripcion_larga}`;

  texto_telefono.innerHTML = `${telefono}`;

  texto_direccion.innerHTML = `${direccion}`;

  texto_horarios.innerHTML = `${horario}`;

  texto_correo.innerHTML = `${correo}`;

  img_restaurante.setAttribute("src", `../../src/img/restaurantes/${foto}`);
  facebook.setAttribute("href", `${fb}`);
  enlace_editar_restaurante.setAttribute("href",`editar_restaurante.php?r=${id}`);
}


function imprime_menu_config(datos){
    let div_config = document.querySelector("#form_segundo_contenido");
    const { id_restaurante, nombre, telefono, descripcion, descripcion_larga, horario, correo, cp, direccion, ciudad} = datos;
    //Imprime cada una de las configuraciones 
    config_promociones();
    config_galeria();
    config_menu();
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
    var div_promociones = document.querySelector("#tabs-1");

    res.forEach(promocion => {
        
        const { id_restaurante, id_promocion, descripcion, Dias, Nombre, fecha, horario, foto} = promocion;
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


        div_promociones.innerHTML+=`
            <div class="product__details__tab__desc">
                <div class="card-columns mt-3 ">
                
                    <div class="card">
                        <img class="card-img-top" src="${foto}" alt="Card image cap">
                        <div class="card-img-overlay">
                            <h4 class="card-title">${Nombre}</h4>
                        </div>
                        <div class="card-body">
                            <h6>${Nombre}</h6>
                            <p class="card-text">${descripcion}<br>
                            Disponible los dias: ${arrayDeCadenas[0]} ${arrayDeCadenas[1]} ${arrayDeCadenas[2]} 
                            ${arrayDeCadenas[3]} ${arrayDeCadenas[4]} ${arrayDeCadenas[5]} ${arrayDeCadenas[6]} ${arrayDeCadenas[7]}<br>
                            Con Horario de ${horario}<br>
                            Fecha de disponibilidad ${fecha}</p>
                        </div>
                    </div>

                </div>
            
            </div>
        `
    });
    console.log(id);
    div_promociones.innerHTML+=`
        <div class="row justify-content-center mt-3">
            <div class="col-md-3 mt-3">
                <a href="agregar_promocion.php?r=${id}" class="btn btn-sm primary-btn  "> Agregar promoción</a>
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

function config_menu(datos){
    let div_menu = document.querySelector("#tabs-3");

}



async function jssave() {
    let contenido = quill.container.firstChild.innerHTML;
    console.log(contenido);
    console.log(id_restaurante);
    const datos = new FormData();
    datos.append("texto", contenido);
    datos.append("id", id_restaurante);
    datos.append("accion", "subir_menu");
    const url = "../../inc/peticiones/admin/funciones.php";
    try {
        const res = await fetch(url, { method: "POST", body: datos });
        const data = await res.json();
        console.log(data);
    } catch (error) {
        console.log(error);
    }
}