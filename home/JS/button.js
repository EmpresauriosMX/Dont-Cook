$(document).ready(function(){
  //alert("hola");
  //Quita la clase de visibilidad a la descripcion escondida
  
  $('.post1 .escondido[category="item1"]').addClass('activarSty');
  $('.escondido[category="item1"]').addClass('activarSty');
  $('.escondido').addClass(".activarSty");
  
});
    
function abajo(id){
  //alert("entro");
  //document.getElementById("modificable").style.height = "400px";
  if (document.getElementById(id).style.height == "365px") {
      document.getElementById(id).style.height = "400px";
      document.getElementById(id).style.grid.row.end = "span 4";
      $(id).addClass('activarSty');
     /* $('.post1 .escondido[category="item1"]').addClass('activarSty');
      $('.escondido[category="item1"]').addClass('activarSty');
      $('.escondido').addClass(".activarSty");*/
    } else {
      document.getElementById(id).style.height = "365px";
    }
} 

/*document.getElementById("button1").style.color = "blue";

/*function changeText(id) {
    id.style.height= 33;
  }

  function changeText(id) {
    id.innerHTML = "Ooops!";
  }

  function displayDate() {
    document.getElementById("titulo").style.height= 33;
    
  }

  function modificar() {
      if (document.getElementById("modificable").style.width == 200) {
      document.getElementById("modificable").style.width = 100;
      document.getElementById("modificable").style.height = 100;
      } else {
      document.getElementById("modificable").style.width = 200;
      document.getElementById("modificable").style.height = 200;
      }
    }
*/

  
 