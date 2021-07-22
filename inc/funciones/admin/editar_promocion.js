import {mostrar_ubicacion, enviar_datos, mostrar_mensaje, mostrar_alert} from "../funciones_generales.js";
const url = "../../inc/peticiones/admin/funciones.php";
const btn = document.querySelector("#btn");
var id_restaurante = "";
//CON ESTO OBTENEMOS EL ID DEL RESTAURANTE POR LA URL
document.addEventListener("DOMContentLoaded", () => {
    const parametrosURL = new URLSearchParams(window.location.search);
    let restaurante = parametrosURL.get("r");
    //SI LE PASAMOS UN RESTAURANTE LO BUSCARA
    if (restaurante) {
        //LE PASAMOS EL ID DE RESUTAURANTE
        id_restaurante = restaurante;
        mostrar_promocion(restaurante);
        btn.addEventListener("click", promociones);
    }
    //SI NO LE PASAMOS NADA CARGARA UN MENSAJE DE ERROR
    else{
        mostrar_mensaje("error");
        let contenido1 = document.querySelector("#demo-form");
        contenido1.innerHTML = "";
    }
    console.log (restaurante);
});

async function mostrar_promocion(restaurante){
  //aqui va tu codigo para obtener las promociones
  const datos = new FormData();
  var id = restaurante;
  datos.append("id", id);
  datos.append("accion","ver_promo_especifico");
  //SE BUSCA EL RESTAURANTE CON SU ID
  const res = await enviar_datos(url, datos);
  console.log (res);

  res.forEach((element) => {
      console.log(element);
      const {nombre_res,Nombre,descripcion,fecha,fecha_f,horario,id_promocion,id_restaurante,imagen, lunes, martes, miercoles, jueves, viernes, sabado, domingo} = element;
      if(lunes == 1){ clase_l = clase_activo }
      if(martes == 1){ clase_m = clase_activo }
      if(miercoles == 1){ clase_mi = clase_activo }
      if(jueves == 1){ clase_j = clase_activo }
      if(viernes == 1){ clase_v = clase_activo }
      if(sabado == 1){ clase_s = clase_activo }
      if(domingo == 1){ clase_d = clase_activo }
      promociones.innerHTML += `
          <div class="card border-0">
              
              <div class="card-body">
              <div class="card">
                  <img class="card-img-top" src="../../src/img/promos/${imagen}" alt="Card image cap">
                  <div class="card-img-overlay">
                      <a href="restaurante_especifico.php?r=${id_restaurante}"><h3 class="card-title">${nombre_res}</h3> </a>
                  </div>
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
                      <a href=editar_promocion.php?r=${id_restaurante}" class="btn btn-dark mt-1">
                          <i class="fa fa-edit"></i>
                      </a>
                      <a href="#" class="btn btn-danger mt-1">
                          <i class="fa fa-trash"></i>
                      </a>
              </div>
          </div>
          
          
      `;
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


$(document).on('change','#lunes' ,function(e) {
  const lunes = document.querySelector("#id_lunes").value;
  if(this.checked) $('#id_lunes').val(this.value);
  else $('#id_lunes').val("");
  console.log (lunes);
});
$(document).on('change','#martes' ,function(e) {
  const martes = document.querySelector("#id_martes").value;
  if(this.checked) $('#id_martes').val(this.value);
  else $('#id_martes').val("");
  console.log (martes);
});
$(document).on('change','#miercoles' ,function(e) {
  const miercoles = document.querySelector("#id_miercoles").value;
  if(this.checked) $('#id_miercoles').val(this.value);
  else $('#id_miercoles').val("");
  console.log (miercoles);
});
$(document).on('change','#jueves' ,function(e) {
  const jueves = document.querySelector("#id_jueves").value;
  if(this.checked) $('#id_jueves').val(this.value);
  else $('#id_jueves').val("");
  console.log (jueves);
});
$(document).on('change','#viernes' ,function(e) {
  const viernes = document.querySelector("#id_viernes").value;
  if(this.checked) $('#id_viernes').val(this.value);
  else $('#id_viernes').val("");
  console.log (viernes);
});
$(document).on('change','#sabado' ,function(e) {
  const sabado = document.querySelector("#id_sabado").value;
  if(this.checked) $('#id_sabado').val(this.value);
  else $('#id_sabado').val("");
  console.log (sabado);
});
$(document).on('change','#domingo' ,function(e) {
  const domingo = document.querySelector("#id_domingo").value;
  if(this.checked) $('#id_domingo').val(this.value);
  else $('#id_domingo').val("");
  console.log (domingo);
});
$(document).on('change','#todos' ,function(e) {
  const todos = document.querySelector("#id_todos").value;
  if(this.checked) $('#id_todos').val(this.value);
  else $('#id_todos').val("");
  console.log (todos);
});


async function promociones (e){
  e.preventDefault();
  const nombre = document.querySelector("#fullname").value;
  const foto = document.querySelector("#formFile");
  const lunes = document.querySelector("#id_lunes").value;
  const martes = document.querySelector("#id_martes").value;
  const miercoles = document.querySelector("#id_miercoles").value;
  const jueves = document.querySelector("#id_jueves").value;
  const viernes = document.querySelector("#id_viernes").value;
  const sabado = document.querySelector("#id_sabado").value;
  const domingo = document.querySelector("#id_domingo").value;
  //const todos = document.querySelector("#id_todos").value;
  const diai = document.querySelector("#reservation-time1").value;
  const diaf = document.querySelector("#reservation-time2").value;
  const inicio = document.querySelector("#horario_inicio").value;
  const fin = document.querySelector("#horario_conclusion").value;
  const message = document.querySelector("#message").value;
  const id_res = id_restaurante;

  const datos = new FormData();

  datos.append("accion","agregar_promo");
  datos.append("nombre",nombre);
  datos.append("foto", foto.files[0]);
  datos.append("lunes",lunes);
  datos.append("martes",martes);
  datos.append("miercoles",miercoles);
  datos.append("jueves",jueves);
  datos.append("viernes",viernes);
  datos.append("sabado",sabado);
  datos.append("domingo",domingo);
  //datos.append("todos",todos);
  datos.append("diai",diai);
  datos.append("diaf",diaf);
  datos.append("inicio",inicio);
  datos.append("fin",fin);
  datos.append("message",message);
  datos.append("id_res",id_res);

  const res = await enviar_datos(url, datos);
  console.log(res);
  //console.log(foto.file[0]);
  mostrar_alert("success","La promoción se ha guardado exitosamente");
  alert("Promoción Guardada Éxitosamente!");
}
