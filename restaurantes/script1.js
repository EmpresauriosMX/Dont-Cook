$(document).ready(function(){
    //alert("hola");
});

function ocultar_aparecer(id ,id2){
  //alert("entro");
  //si el elemnto esta oculto entonces lo muestra
  if (document.getElementById(id).style.display == "none"){
    //cambia el estado del display a grid 
    document.getElementById(id).style.display = "grid";
    //cambia el display del segundo id ocultandolo
    document.getElementById(id2).style.display = "none";
  }
  else{
    document.getElementById(id).style.display = "grid";
    //cambia el display del segundo id ocultandolo
    document.getElementById(id2).style.display = "none";
  }
}

function ocultarGaleria(id){
    alert("entro"); 
    document.getElementById(id).style.display = "grid";
    //$('#galeria').addClass('activar');    
}

 /* function abajo(id){
    //alert("entro");
    //document.getElementById("modificable").style.height = "400px";
    if (document.getElementById(id).style.height == "365px") {
        $('.post1 .escondido[category="item1"]').addClass('activarSty');
        document.getElementById(id).style.height = "400px";
        document.getElementById(id).style.grid.row.end = "span 4";
        //$('.escondido[category="item1"]').addClass('activarSty');
        
      } else {
        $('.post1 .escondido[category="item1"]').removeClass('activarSty');
        document.getElementById(id).style.height = "365px";
      }
  } 
  
  function acordeon(item){
    //funcion que llama al query que agrega o quita la clase css para el boton ver más
    $('.post1 .escondido[category="item1"]').addClass('activarSty');
  
  }
    
   */