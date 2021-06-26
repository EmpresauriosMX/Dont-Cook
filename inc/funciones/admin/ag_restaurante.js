import {enviar_datos,mostrar_ubicacion} from "../funciones_generales.js";
import {Ubicacion,select_ciudad,obj} from "../ubicacion.js";

const url = "../../inc/peticiones/admin/funciones.php";
    

const fechas = [
    {
        "hora_inicio" : '22:03',
        "hora_fin" :"11:21",
        "id_dia" : 1.
    },
    {
        "hora_inicio" : '14:51',
        "hora_fin" :"21:22",
        "id_dia" : 2.
    },
    {
        "hora_inicio" : '02:03',
        "hora_fin" :"03:11",
        "id_dia" : 3.
    },
    {
        "hora_inicio" : '14:28',
        "hora_fin" :"17:46",
        "id_dia" : 4.
    },
    {
        "hora_inicio" : '23:11',
        "hora_fin" :"11:11",
        "id_dia" : 5.
    },
    {
        "hora_inicio" : '00:03',
        "hora_fin" :"13:05",
        "id_dia" : 7.
    },
]
    //Documento del formulario
    const listado_restaurante = document.querySelector("#form_agregar_restaurante");
    const lista_dias = document.querySelector("#lista_lista");


    document.addEventListener("DOMContentLoaded",() =>{

        const ubicacion = new Ubicacion();
        ubicacion.buscar();
        select_ciudad.addEventListener("change", ubicacion.obtener);
        listado_restaurante.addEventListener("submit",registro_restaurante);
        lista_dias.addEventListener("change", ejemplo);
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
//        const horarios = document.querySelector("#horarios").value;
        const acc = document.querySelector("#acc").value;
        const facebook = document.querySelector("#facebook").value;
        const instagram = document.querySelector("#instagram").value
        const imagen = document.querySelector("#imagen");
        const array_horarios = JSON.stringify(fechas);

console.log(array_horarios);
        datos.append("nombre", nombre);
        datos.append("desc_corta", desc_corta);
        datos.append("desc_larga", desc_larga);
        datos.append("ciudad",ciudad);
        datos.append("direccion",direccion);
        datos.append("cp",cp);
        datos.append("telefono",telefono);
        datos.append("email",email);
  //      datos.append("horarios",horarios);
        datos.append("face",facebook);
        datos.append("insta", instagram)
        datos.append("imagen",imagen.files[0]);
        datos.append("horarios", array_horarios);
        const horario_abrir = document.querySelector('#horario_abrir').value;
        const horario_cerrar = document.querySelector('#horario_cerrar').value;

        console.log(horario_cerrar);
        console.log(horario_abrir);

       datos.append("accion","registrar_restaurante");
        enviar_datos(url,datos).then((re) => console.log(re));
    }


    function ejemplo(e) {
        console.log(e.target);
        console.log(e.target.checked);
    }