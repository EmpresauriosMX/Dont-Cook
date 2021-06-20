import {enviar_datos,mostrar_ubicacion} from "../funciones_generales.js";
import {Ubicacion,select_ciudad,obj} from "../ubicacion.js";

const url = "../../inc/peticiones/admin/funciones.php";
    
    //Documento del formulario
    const listado_restaurante = document.querySelector("#form_agregar_restaurante");



    document.addEventListener("DOMContentLoaded",() =>{

        const ubicacion = new Ubicacion();
        ubicacion.buscar();
        select_ciudad.addEventListener("change", ubicacion.obtener);
        listado_restaurante.addEventListener("submit",registro_restaurante);
       console.log(mostrar_ubicacion());
    });

    function registro_restaurante(e){
        e.preventDefault();
        const datos = new FormData();
        
        //VARIABLE
        const nombre = document.querySelector("#nombre").value;
        const desc_corta = document.querySelector("#desc_corta").value;
        const desc_larga = document.querySelector("#desc_larga").value;
        const ciudad = obj.ciudad;
        const direccion = document.querySelector("#direccion").value;
        const cp = document.querySelector("#cp").value;
        const telefono = document.querySelector("#telefono").value;
        const email = document.querySelector("#email").value;
        const horarios = document.querySelector("#horarios").value;
        const acc = document.querySelector("#acc").value;
        const facebook = document.querySelector("#facebook").value;
        const instagram = document.querySelector("#instagram").value
        const imagen = document.querySelector("#imagen");
        


        datos.append("nombre", nombre);
        datos.append("desc_corta", desc_corta);
        datos.append("desc_larga", desc_larga);
        datos.append("ciudad",ciudad);
        datos.append("direccion",direccion);
        datos.append("cp",cp);
        datos.append("telefono",telefono);
        datos.append("email",email);
        datos.append("horarios",horarios);
        datos.append("face",facebook);
        datos.append("insta", instagram)
        datos.append("imagen",imagen.files[0]);

       datos.append("accion","registrar_restaurante");
        enviar_datos(url,datos).then((re) => console.log(re));
        alert('EL RESTAURANTE SE REGISTRO CORRECTAMENTE');
        
        

        

    }