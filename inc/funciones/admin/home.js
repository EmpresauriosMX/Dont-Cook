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
                const { id_restaurante, nombre, descripcion} = respuesta;
                div_restaurantes.innerHTML += `
                    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg" data-setbg="">
                            <img src="../../inc/funciones/restaurantes/product-5.jpg">
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
            div_restaurantes.innerHTML += `
                <div class="row">
                    <div class="col-md-3">
                        <a href="agregar_restaurante.php" class="btn btn-sm primary-btn  "> Agregar restaurante</a>
                    </div> 
                </div>
            `;
        }
    }


