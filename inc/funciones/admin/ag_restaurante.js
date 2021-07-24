import { enviar_datos, mostrar_ubicacion } from "../funciones_generales.js";
import { Ubicacion, select_ciudad, obj } from "../ubicacion.js";


const url = "../../inc/peticiones/admin/funciones.php";

const fechas = [];
const categorias = [];
//Documento del formulario
const listado_restaurante = document.querySelector("#form_agregar_restaurante");
const lista_dias = document.querySelector("#lista_lista");

const select_categorias  = document.querySelector("#cbx_categoria");
const btn_categoria = document.querySelector("#boton_agregar_categoria");
const contenedor_categorias = document.querySelector( "#contenedor_categorias" );

let imagen_a_enviar = document.querySelector("#imagen"); //input
let imagen_previa = document.querySelector("#img_previa");


document.addEventListener("DOMContentLoaded", () => {
  const ubicacion = new Ubicacion();
  ubicacion.buscar();
  select_ciudad.addEventListener("change", ubicacion.obtener);
  listado_restaurante.addEventListener("submit", registro_restaurante);
  lista_dias.addEventListener("change", agregar_dia);
  btn_categoria.addEventListener("click", valor_select_categorias);
  contenedor_categorias.addEventListener("click", eliminar_categoria);
  imagen_a_enviar.addEventListener("change",mostrar_imagen_seleccionada);

  obtener_categorias();
 // displayTime();

});

function registro_restaurante(e) {
  e.preventDefault();
  const datos = new FormData();

  const dias_validos = preparar_dias_a_enviar();

  //VARIABLE
  const nombre = document.querySelector("#nombre").value;
  const desc_corta = document.querySelector("#desc_corta").value;
  const desc_larga = document.querySelector("#desc_larga").value;
  const ciudad = obj.ciudad;
  const direccion = document.querySelector("#direccion").value;
  const cp = document.querySelector("#cp").value;
  const telefono = document.querySelector("#telefono").value;
  const email = document.querySelector("#email").value;
  const acc = document.querySelector("#acc").checked;
  const facebook = document.querySelector("#facebook").value;
  const instagram = document.querySelector("#instagram").value;
  const imagen = document.querySelector("#imagen");
  const array_horarios = JSON.stringify(dias_validos);
  const array_categorias  = JSON.stringify(categorias);

  const servicio_domicilio = acc ? 1 : 0;

  //envio de variables
  datos.append("nombre", nombre);
  datos.append("desc_corta", desc_corta);
  datos.append("desc_larga", desc_larga);
  datos.append("ciudad", ciudad);
  datos.append("direccion", direccion);
  datos.append("cp", cp);
  datos.append("telefono", telefono);
  datos.append("email", email);
  datos.append("servicio", servicio_domicilio);
  datos.append("face", facebook);
  datos.append("insta", instagram);
  datos.append("imagen", imagen.files[0]);
  datos.append("horarios", array_horarios);
  datos.append("categorias", array_categorias);

  datos.append("accion", "registrar_restaurante");
  alert("Restaurante Guardado Éxitosamente");
  enviar_datos(url, datos).then((res) =>window.location = `restaurante_ver.php?r=${res.nuevo_id}`);

}//window.location = `editar_restaurante.php?r=${res}`



function agregar_dia(e) {
  // console.log(e.target);
  const id = e.target.id; // id del input;
  const is_day = fechas.findIndex((Element) => Element.id_dia == id);

  if (is_day != -1) {
    fechas[is_day].estado = e.target.checked; // true or false
  } else {
    fechas.push({
      id_dia: id,
      estado: true,
    });
  }
  console.table(fechas);
}

function preparar_dias_a_enviar() {
  const horario_abrir = document.querySelector("#horario_abrir").value;
  const horario_cerrar = document.querySelector("#horario_cerrar").value;

  const cambio = fechas.forEach((fecha) => {
    fecha.hora_inicio = horario_abrir;
    fecha.hora_fin = horario_cerrar;
  });

  return fechas.filter((elem) => elem.estado == true);
}

//categorias
async function obtener_categorias() {
  const datos = new FormData();
  datos.append("accion", "obtener_categorias");

  const res = await enviar_datos(url, datos);
  //console.log(res);
  res.forEach((e) => {
    select_categorias.innerHTML += `<option value=${e.id} name="ciudad">${e.nombre}</option>  `;
  });
}


function valor_select_categorias() {
 
    const opcion_id = select_categorias.value;
    var opcion_texto = select_categorias.options[select_categorias.selectedIndex].text;
   categorias.push({ id:parseInt(opcion_id), nombre: opcion_texto } );
   //console.log(categorias);

   categorias_html();
}

function categorias_html() {
  const contenedor_categorias = document.querySelector( "#contenedor_categorias" );
  contenedor_categorias.innerHTML  = "";
  categorias.forEach((categoria) => {
    contenedor_categorias.innerHTML += `
    <div class="col">
    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
        <small>${categoria.nombre}</small>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="${categoria.id}">
            <span class="fa fa-trash" aria-hidden="true" id ="${categoria.id}"></span>
        </button>
    </div>
</div>`;
  });
}


function eliminar_categoria (e){
  if (e.target.classList.contains('fa-trash') || e.target.classList.contains('close') ) {
    const id = e.target.id;
    const is_categoria = categorias.findIndex((Element) => Element.id == id);
  //console.log(is_categoria);
  //console.log(id);
      if (is_categoria != -1) {
        categorias.splice(is_categoria,1)
      } 
      //console.log(categorias);
    }
}

function mostrar_imagen_seleccionada() {
    const files = imagen_a_enviar.files[0];
    if (files) {
      const fileReader = new FileReader();
      fileReader.readAsDataURL(files);
      fileReader.addEventListener("load", function () {
        imagen_previa.src = this.result;
      });    
    }
}