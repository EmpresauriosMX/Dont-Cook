import {mostrar_ubicacion, enviar_datos} from "../funciones_generales.js";
//import {Ubicacion,btn_confirmar_ciudad, select_ciudad,obj} from "../ubicacion.js";

const url = "../../inc/peticiones/admin/funciones.php";

//Documentos
//const contenido1 = document.querySelector("#form_contenido_restaurante");


document.addEventListener("DOMContentLoaded",() =>{
    mostrar_restaurante();
    //const ubicacion = new Ubicacion();
    //ubicacion.buscar();
    //select_ciudad.addEventListener("change", ubicacion.obtener);
    //btn_confirmar_ciudad.addEventListener("click", mostrar_restaurante);
    //console.log(mostrar_ubicacion());
});

async function mostrar_restaurante(){

    //limpiar_contenedor();
    //e.preventDefault();
    const datos = new FormData();

    const ciudad = mostrar_ubicacion().ciudad;
    datos.append("ciudad", ciudad)
    
    datos.append("accion","info_restaurantes");
    const res = await enviar_datos(url, datos);
    console.log(res);

        let contenido1 = document.querySelector("#form_contenido_restaurante");
        res.forEach(respuesta => {
            const { id_restaurante, nombre, telefono, descripcion, descripcion_larga, horario, correo, cp, direccion, ciudad} = respuesta;
            contenido1.innerHTML += `
            <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img id="img_restaurante" class="product__details__pic__item--large" src="../../src/img/restaurants/pikalogodarkmode.png" alt="">
                    </div>

                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h1 id="nombre_restaurante">${nombre}</h1>

                    <p id="descripcion_larga">${descripcion_larga}</p>
                    <div class="row mx-auto">
                        <a id="facebook" href="#" class="fa fa-facebook btn site-btn mx-auto ml-2"></a>
                        <a id="instagram" href="#" class="fa fa-instagram btn site-btn mx-auto ml-2"></a>
                        <a id="favorito" href="#" class="fa fa-heart btn site-btn mx-auto ml-2"></a>
                        <a id="editar" href="agregar_restaurante.php" class="fa fa-edit btm btn site-btn mx-auto ml-2"></a>
                    </div>
                    <br>

                </div>
            </div>

        </div>



        <br><br>
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
                    <p id="direccion">${direccion}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_clock_alt"></span>
                    <h4>Horarios</h4>
                    <p id="horarios">${horario}</p>
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
            `;
        });
            
        
        let contenido2 = document.querySelector("#form_segundo_contenido");
        contenido2.innerHTML+=`
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

                        
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h3>Promociones</h3>
                                <div class="card-columns mt-3">
                                    
                                    <div class="card ">
                                        <img class="card-img-top" src="../../src/img/banner/banner-1.jpg" alt="Card image cap">
                                        <div class="card-img-overlay">
                                            <h4 id="nombre_restaurante" class="card-title">Restaurante</h4>
                                        </div>
                                        <div class="card-body">
                                            <h6 id="nombre_promocion">Nombre de la Promoción</h6>
                                            <p id="descripcion_promocion" class="card-text">Descripción de la promocion... <br>
                                                Chelas 2x1 xdxd <br>
                                                De Lunes a Jueves <br>
                                                Con Horario de 12:00 a 16:00</p>
                                        </div>
                                        <div class="card-footer">
                                            <button class="btn btn-dark btn-sm "> <span class="fa fa-edit"></span></button>
                                            <button class="btn btn-dark btn-sm "> <span class="fa fa-trash"></span></button>
                                        </div>
                                    </div>

                                </div>
                                
                                <div class="col-md-3 col-sm-6 col-lg-4 ">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <p><strong>Agregar</strong></p>
                                            <a href="agregar_promocion.php" class="fa fa-plus btm btn site-btn mx-auto"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
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
                        </div>
                        

                        
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
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
                        </div>
                        

                    </div>
                    
                </div>
            </div>
            
        </div>
        <br>
        `;

}

/*
function limpiar_contenedor() {
    contenido1.innerHTML ="";
}*/