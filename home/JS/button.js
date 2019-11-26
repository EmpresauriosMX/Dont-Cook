$(document).ready(function(){
  //alert("hola");

  var x = new Date();
  console.log(x.getDay());

  switch(x.getDay()){
    case 0:
      document.getElementById('modificable16').style.display = 'block';
      document.getElementById('modificable17').style.display = 'block';
      break;
    case 1:
      console.log('lunes');
      //var x = getElementsByClassName('lunes');
      /*var i;
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "block";
      }*/
      document.getElementById('modificable8').style.display = 'block';
      document.getElementById('modificable9').style.display = 'block';
      break;
    case 3:
      console.log('martes');
      document.getElementById('modificable10').style.display = 'block';
      document.getElementById('modificable11').style.display = 'block';
      document.getElementById('modificable12').style.display = 'block';
      break;
    case 4:
      console.log('miercoles');
      document.getElementById('modificable13').style.display = 'block';
      break;      
    case 5:
      console.log('jueves');
      document.getElementById('modificable14').style.display = 'block';
      break;   
    case 6:
      console.log('viernes');
      
      break;  
    case 7:
      console.log('sabado');
      document.getElementById('modificable15').style.display = 'block';
      break;  
    }

});
/*
function abajo(id , item){
  
  var categ = $(this).attr('category');
  console.log(categ);

  if (document.getElementById(id).style.height == "365px") {
     // $(' .escondido[category="item1"]').addClass('activarSty');
      document.getElementById(id).style.height = "400px";
      document.getElementById(id).style.grid.row.end = "span 4";
      //$('.escondido[category="item1"]').addClass('activarSty');
      $(item).addClass('activarSty');
      
    } else {
      //$(' .escondido[category="item1"]').removeClass('activarSty');
      document.getElementById(id).style.height = "365px";
      $(item).removeClass('activarSty');
    }

    //acordeon(item,id);
} 
function acordeon(item, id){
  //funcion que llama al query que agrega o quita la clase css para el boton ver más
  //var categ = $(this).attr('category');
  //console.log(categ);

  if (document.getElementById(id).style.height == "365px") {
      $(item).addClass('activarSty');

    } else {
      $(item).removeClass('activarSty');

    }
}
*/

/* ----EL QUE FUNCIONA xd

function abajo(id){
  
  if (document.getElementById(id).style.height == "365px") {
      $('.post1 .escondido[category="item1"]').addClass('activarSty');
      document.getElementById(id).style.height = "400px";
      document.getElementById(id).style.grid.row.end = "span 4";
      //$('.escondido[category="item1"]').addClass('activarSty');
      
    } else {
      $('.post1 .escondido[category="item1"]').removeClass('activarSty');
      document.getElementById(id).style.height = "365px";
    }
} -----------------------*/

// ABAJO 1
function abajo1(id){
  if (document.getElementById(id).style.height == "365px") {
      $('#desc1').addClass('activarSty');
      document.getElementById(id).style.height = "400px";
      document.getElementById(id).style.grid.row.end = "span 4";
    } else {
      $('#desc1').removeClass('activarSty');
      document.getElementById(id).style.height = "365px";
    }
} 
// ABAJO 2
function abajouno(id){
  if (document.getElementById(id).style.height == "365px") {
      $('#desc2').addClass('activarSty');
      document.getElementById(id).style.height = "400px";
      document.getElementById(id).style.grid.row.end = "span 4";
    } else {
      $('#desc2').removeClass('activarSty');
      document.getElementById(id).style.height = "365px";
    }
} 

/*function abajo2(id){
  if (document.getElementById(id).style.height == "365px") {
      //$('#desc2').addClass('activarSty');
      document.getElementById(id).style.height = "400px";
      document.getElementById(id).style.grid.row.end = "span 4";
    } else {
      //$('#desc2').removeClass('activarSty');
      document.getElementById(id).style.height = "365px";
    }
} */
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




/*
function abajo(id){
  
  if (document.getElementById(id).style.height == "365px") {
      document.getElementById(id).style.height = "400px";
      //document.getElementById(id).style.grid.row.end = "span 4";
      //$('.escondido[category="item1"]').addClass('activarSty');
      
    } else {
      
      document.getElementById(id).style.height = "365px";
    }
} 
*/
/*ITEM 1
function acordeon1(){
  if (document.getElementById(id).style.height == "365px") {
    $('.escondido[category="item1"]').addClass('activarSty');    
    
  } else {
    $('.escondido[category="item1"]').removeClass('activarSty');
  }
}

//ITEM 2
function acordeon2(){
  if (document.getElementById(id).style.height == "365px") {
    $('.escondido[category="item2"]').addClass('activarSty');    
  
  } else {
    $('.escondido[category="item2"]').removeClass('activarSty');
  }
}*/
