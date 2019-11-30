//SCRIP QUE SE EJECUTA AL INICIAR EL DOCUMENTO
//ES NECESARIO PARA EL FILTRADO DE LAS PROMOCIONES
$(document).ready(function(){
  //llama a la funcion que muestra la promocion del dia correspondiente
  promocion_del_dia();
});
//FIN DE SCRIPT INICIAL

function promocion_del_dia() {
   //OBTIENE EL DIA 
   var x = new Date();
   console.log(x.getDay());
   //EL DIA ES  GUARDADO EN VAR EN TIPO INT
   switch(x.getDay()){
     //CASO DOMIINGO
     case 0:
       //llama a funcion que muestra la promocion del dia requerido
         muestraPromociones('domingo',1);break;
     case 1:
       //LUNES
       console.log('lunes');
       muestraPromociones('lunes',1);break;
     case 2:
       //MARTES
       console.log('martes');
       muestraPromociones('martes',1);break;
     case 3:
       //MIERCOLES
       console.log('miercoles');
       muestraPromociones('miercoles',1); break; 
     case 4:
       //JUEVES
       console.log('jueves');  
       muestraPromociones('jueves',1);break;
     case 5:
       //VIERNES
       muestraPromociones('viernes',1);break;
     case 6:
       //SABADO
       console.log('sabado');
       muestraPromociones('sabado',1);break;
       
     }
     
}

//variable del estado del boton, comienza con 0
var indice = 0;

//funcion llamada por el boton que mostrara o ocultara las
//promociones segun el estado del boton
function muestra_promociones(id) {
  if (indice==0){
    //muestra todas las promociones
    //muestra oculta todos con mensaje de uno mostrara todas las promociones
    document.getElementById(id).value = "Ver menos";
    
    muestra_oculta_todos(1);
    indice = 1;
    
  }
  else{
    //muestra oculta todos con mensaje de cero ocultara todas las promociones
    muestra_oculta_todos(0);
    //cambio del estado del boton
    indice = 0;
    //llamado a la promocion del dia 
    promocion_del_dia();
    document.getElementById(id).value = "Ver todas las promociones";
  }
}

//funcion que mostrara o ocultara todas las promociones segun el dia que se le mande por mensaje
function muestraPromociones(dia,aparece_oculta) {
  //si el mensaje aparece oculta es true mostrara las promociones
  if (aparece_oculta){
      var aparece = "block";
  }
  //si el mensaje es false lo ocultara
  else{
      var aparece = "none";
  }
  //obtiene las promociones con la clase dia que es pasado en el mensaje
    var x = document.getElementsByClassName(dia);
    var i;
  //muestra o oculta todo el array del dia
    for (i = 0; i < x.length; i++){
      x[i].style.display = aparece;
    //aparece es el estado que toma valor de block o none
    }
}

//si el mensaje dado en esta funcion es true lo muestra y si es false lo oculta
function muestra_oculta_todos(aparece_oculta) {
  muestraPromociones('lunes',aparece_oculta );
  muestraPromociones('martes', aparece_oculta);
  muestraPromociones('miercoles', aparece_oculta);
  muestraPromociones('jueves', aparece_oculta);
  muestraPromociones('viernes', aparece_oculta);
  muestraPromociones('sabado', aparece_oculta);
  muestraPromociones('domingo', aparece_oculta);
}


//Funciones que hacen que baje el cuadro de descripcion y aparezca informacion adicional
// ABAJO 1
function abajo1(id){
  //obtiene el valor de la altura del cuadro, su estado natural es 365px
  if (document.getElementById(id).style.height == "365px") {
      //se agrega como estilos el activar estilos que hace visible la informacion
      document.getElementById(id).style.height = "400px";
      document.getElementById(id).style.grid.row.end = "span 4";
      $('#desc1').addClass('activarSty');
    } else {
      $('#desc1').removeClass('activarSty');
      document.getElementById(id).style.height = "365px";
    }
}
// ABAJO 2
function abajouno(id){
  if (document.getElementById(id).style.height == "365px") {
      document.getElementById(id).style.height = "400px";
      //document.getElementById(id).style.grid.row.end = "span 4";
      $('#desc2').addClass('activarSty');
    } else {
      $('#desc2').removeClass('activarSty');
      document.getElementById(id).style.height = "365px";
    }
} 

// ABAJO 3
function abajo3(id){
  if (document.getElementById(id).style.height == "365px") {
      $('#desc3').addClass('activarSty');
      document.getElementById(id).style.height = "400px";
      document.getElementById(id).style.grid.row.end = "span 4";
    } else {
      $('#desc3').removeClass('activarSty');
      document.getElementById(id).style.height = "365px";
    }
}
// ABAJO 4
function abajo4(id){
  if (document.getElementById(id).style.height == "365px") {
      $('#desc4').addClass('activarSty');
      document.getElementById(id).style.height = "400px";
      document.getElementById(id).style.grid.row.end = "span 4";
    } else {
      $('#desc4').removeClass('activarSty');
      document.getElementById(id).style.height = "365px";
    }
}  
// ABAJO 5
function abajo5(id){
  if (document.getElementById(id).style.height == "365px") {
      $('#desc5').addClass('activarSty');
      document.getElementById(id).style.height = "400px";
      document.getElementById(id).style.grid.row.end = "span 4";
    } else {
      $('#desc5').removeClass('activarSty');
      document.getElementById(id).style.height = "365px";
    }
}
// ABAJO 6
function abajo6(id){
  if (document.getElementById(id).style.height == "365px") {
      $('#desc6').addClass('activarSty');
      document.getElementById(id).style.height = "400px";
      document.getElementById(id).style.grid.row.end = "span 4";
    } else {
      $('#desc6').removeClass('activarSty');
      document.getElementById(id).style.height = "365px";
    }
}
// ABAJO 7
function abajo7(id){
  if (document.getElementById(id).style.height == "365px") {
      $('#desc7').addClass('activarSty');
      document.getElementById(id).style.height = "400px";
      document.getElementById(id).style.grid.row.end = "span 4";
    } else {
      $('#desc7').removeClass('activarSty');
      document.getElementById(id).style.height = "365px";
    }
}
// ABAJO 8
function abajo8(id){
  if (document.getElementById(id).style.height == "365px") {
      $('#desc8').addClass('activarSty');
      document.getElementById(id).style.height = "400px";
      document.getElementById(id).style.grid.row.end = "span 4";
    } else {
      $('#desc8').removeClass('activarSty');
      document.getElementById(id).style.height = "365px";
    }
}
// ABAJO 9
function abajo9(id){
  if (document.getElementById(id).style.height == "365px") {
      $('#desc9').addClass('activarSty');
      document.getElementById(id).style.height = "400px";
      document.getElementById(id).style.grid.row.end = "span 4";
    } else {
      $('#desc9').removeClass('activarSty');
      document.getElementById(id).style.height = "365px";
    }
}
// ABAJO 10
function abajo10(id){
  if (document.getElementById(id).style.height == "365px") {
      $('#desc10').addClass('activarSty');
      document.getElementById(id).style.height = "400px";
      document.getElementById(id).style.grid.row.end = "span 4";
    } else {
      $('#desc10').removeClass('activarSty');
      document.getElementById(id).style.height = "365px";
    }
}
// ABAJO 11
function abajo11(id){
  if (document.getElementById(id).style.height == "365px") {
      $('#desc11').addClass('activarSty');
      document.getElementById(id).style.height = "400px";
      document.getElementById(id).style.grid.row.end = "span 4";
    } else {
      $('#desc11').removeClass('activarSty');
      document.getElementById(id).style.height = "365px";
    }
}
// ABAJO 12
function abajo12(id){
  if (document.getElementById(id).style.height == "365px") {
      $('#desc12').addClass('activarSty');
      document.getElementById(id).style.height = "400px";
      document.getElementById(id).style.grid.row.end = "span 4";
    } else {
      $('#desc12').removeClass('activarSty');
      document.getElementById(id).style.height = "365px";
    }
}
// ABAJO 13
function abajo13(id){
  if (document.getElementById(id).style.height == "365px") {
      $('#desc13').addClass('activarSty');
      document.getElementById(id).style.height = "400px";
      document.getElementById(id).style.grid.row.end = "span 4";
    } else {
      $('#desc13').removeClass('activarSty');
      document.getElementById(id).style.height = "365px";
    }
}
// ABAJO 14
function abajo14(id){
  if (document.getElementById(id).style.height == "365px") {
      $('#desc14').addClass('activarSty');
      document.getElementById(id).style.height = "400px";
      document.getElementById(id).style.grid.row.end = "span 4";
    } else {
      $('#desc14').removeClass('activarSty');
      document.getElementById(id).style.height = "365px";
    }
}
// ABAJO 15
function abajo15(id){
  if (document.getElementById(id).style.height == "365px") {
      $('#desc15').addClass('activarSty');
      document.getElementById(id).style.height = "400px";
      document.getElementById(id).style.grid.row.end = "span 4";
    } else {
      $('#desc15').removeClass('activarSty');
      document.getElementById(id).style.height = "365px";
    }
}
// ABAJO 16
function abajo16(id){
  if (document.getElementById(id).style.height == "365px") {
      $('#desc16').addClass('activarSty');
      document.getElementById(id).style.height = "400px";
      document.getElementById(id).style.grid.row.end = "span 4";
    } else {
      $('#desc16').removeClass('activarSty');
      document.getElementById(id).style.height = "365px";
    }
}
// ABAJO 17
function abajo17(id){
  if (document.getElementById(id).style.height == "365px") {
      $('#desc17').addClass('activarSty');
      document.getElementById(id).style.height = "400px";
      document.getElementById(id).style.grid.row.end = "span 4";
    } else {
      $('#desc17').removeClass('activarSty');
      document.getElementById(id).style.height = "365px";
    }
}

// ABAJO 18
function abajo18(id){
  if (document.getElementById(id).style.height == "365px") {
      $('#desc18').addClass('activarSty');
      document.getElementById(id).style.height = "400px";
      document.getElementById(id).style.grid.row.end = "span 4";
    } else {
      $('#desc18').removeClass('activarSty');
      document.getElementById(id).style.height = "365px";
    }
}

// ABAJO 19
function abajo19(id){
  if (document.getElementById(id).style.height == "365px") {
      $('#desc19').addClass('activarSty');
      document.getElementById(id).style.height = "400px";
      document.getElementById(id).style.grid.row.end = "span 4";
    } else {
      $('#desc19').removeClass('activarSty');
      document.getElementById(id).style.height = "365px";
    }
}

// ABAJO 20
function abajo20(id){
  if (document.getElementById(id).style.height == "365px") {
      $('#desc20').addClass('activarSty');
      document.getElementById(id).style.height = "400px";
      document.getElementById(id).style.grid.row.end = "span 4";
    } else {
      $('#desc20').removeClass('activarSty');
      document.getElementById(id).style.height = "365px";
    }
}


