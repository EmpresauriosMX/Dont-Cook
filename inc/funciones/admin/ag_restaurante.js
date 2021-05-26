import {enviar_datos} from "../../funciones_generales.js";

const url = "../../inc/peticiones/admin/funciones.php";
    
    //Documento del formulario
    const listado_restaurante = document.querySelector("#form_agregar_restaurante");



    document.addEventListener("DOMContentLoaded",() =>{

        listado_restaurante.addEventListener("submit",registro_restaurante)
        
    });

    function registro_restaurante(e){
        //e.preventDefault();
        const datos = new FormData();
        
        //VARIABLES
        const nombre = document.querySelector("#nombre").value;
        const desc_corta = document.querySelector("#desc_corta").value;
        const desc_larga = document.querySelector("#desc_larga").value;
        const estado = document.querySelector("#estado").value;
        const municipio = document.querySelector("#municipio").value;
        const ciudad = document.querySelector("#ciudad").value;
        const cp = document.querySelector("#cp").value;
        const telefono = document.querySelector("#telefono").value;
        const email = document.querySelector("#email").value;
        const acc = document.querySelector("#acc").value;

        console.log(nombre, desc_corta, desc_larga, estado, municipio, ciudad, cp, telefono, email);
        
        datos.append("nombre", nombre);
        datos.append("desc_corta", desc_corta);
        datos.append("desc_larga", desc_larga);
        datos.append("estado",estado);
        datos.append("municipio", municipio);
        datos.append("ciudad",ciudad);
        datos.append("telefono",telefono);
        datos.append("cp",cp);
        datos.append("email",email);
        
        datos.append("accion","registrar_restaurante");
    
        enviar_datos(url,datos).then((re) => console.log(re));

        alert('EL RESTAURANTE SE REGISTRO CORRECTAMENTE');

    }