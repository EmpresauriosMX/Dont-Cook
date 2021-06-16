    import {enviar_datos, existe_cuenta, mostrar_mensaje} from "../funciones_generales.js";
  //VARIABLE A LA CUAL SE ENCUENTRAN LAS PETICIONES
    const url = "../../inc/peticiones/admin/funciones.php";

  //VARIABLE GLOBAL PARA SABER SI TIENE UNA CUENTA
  var cuenta_activa = false;

// ----------------SE CARGA AL INICIAR--------------
document.addEventListener("DOMContentLoaded", () => {
    mostrarServicios();
});

//FUNCIONES QUE SE DEBEN DE CARGAR AL INICIO
async function mostrarServicios(){
    cuenta_activa =  await existe_cuenta();
    //VALIDACION DE UN LOG ANTERIOR
    if (cuenta_activa){
        //EXISTE UNA CUENTA
        console.log("existe una cuenta");
        //AL EXISTIR UNA CUENTA SE VALIDA SI HAY RESTAURANTES
        cargar_restaurantes();
    }
    else{
        //NO EXISTE UNA CUENTA
        //mostrar el mensaje de no existe una cuenta 
        let mensaje = "sin_cuenta";
        mostrar_mensaje(mensaje);
        console.log("no existe una cuenta");
    }
}

    //CARGA LOS RESTAURANTES O EN
    async function cargar_restaurantes(){
        //e.preventDefault();
        const datos = new FormData();
        console.log("ahora puedo buscar restaurantes");
        datos.append("accion","busca_restaurantes");
        const res = await enviar_datos(url, datos);
        console.log(res);
        //SI NO CUENTA CON RESTAURANTES
        if(res.respuesta == "sin_restaurantes"){
            let mensaje = "sin_restaurante";
            mostrar_mensaje(mensaje);
        }
        //SI CUENTA CON RESTAURANTES
        else{
            let div_restaurantes = document.querySelector("#restaurantes");
            res.forEach(respuesta => {
                const { id_restaurante, nombre, descripcion, foto} = respuesta;
                div_restaurantes.innerHTML += `
                <div class="blog-card col-md-12 col-sm-12 col-xs-12 col-lg-5 mx-auto">
                    <div class="meta">
                        <div class="photo" style="background-image: url(../../src/img/restaurantes/${foto}"></div>
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
                            <a href="restaurante_ver.php?r=${id_restaurante}" class="btn btn-outline-secondary btn-sm">
                                <span class="fa fa-eye" ></span> Visitar
                            </a>
                        </div>
                    </div>
                </div>
                `;
            });
            div_restaurantes.innerHTML += `
                <div class="row mx-auto mt-3">
                    <div class="col-md-3 ">
                        <a href="agregar_restaurante.php" class="btn btn-sm primary-btn  "> Agregar restaurante</a>
                    </div> 
                </div>
            `;
        }
    }


