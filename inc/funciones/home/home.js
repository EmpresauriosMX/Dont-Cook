import { enviar_datos, mostrar_ubicacion } from "../funciones_generales.js";
import {Ubicacion,select_ciudad,btn_confirmar_ciudad} from "../ubicacion.js";


document.addEventListener("DOMContentLoaded", () => {
  const ubicacion = new Ubicacion();
  console.log(ubicacion);
  select_ciudad.addEventListener("change", ubicacion.obtener);
  btn_confirmar_ciudad.addEventListener("click", ubicacion.guardar);
  ubicacion.buscar();
  alert(mostrar_ubicacion().ciudad);
});

export function ejemplo() {
  console.log("des la funcion de ubicacion que esta en el home");
}


/* obtener la ubicacion por gps y coompararlo con otras coordenadas
navigator.geolocation.getCurrentPosition(haz_algo,veremos);

function haz_algo(position) {
 const latitude = position.coords.latitude;
 const longitude = position.coords.longitude;
 const latitude_otro = 20.496082883576054;
 const longitude_otro =  -86.93836456398587;
 console.log(`esta la latitud : ${latitude}
              esta es la longitud : ${longitude}`);
 calculo_distania (latitude,longitude,latitude_otro,longitude_otro)
}

function veremos() {
  output.innerHTML = "Unable to retrieve your location";
};

function calculo_distania(lat1,lng1 ,lat2,lng2) {
  let R = 6378137;
  let dLat = degreesToRadians(lat2 - lat1);
  let dLong = degreesToRadians(lng2 - lng1);
  let a = Math.sin(dLat / 2)
          *
          Math.sin(dLat / 2)
          +
          Math.cos(degreesToRadians(lat1))
          *
          Math.cos(degreesToRadians(lat1))
          *
          Math.sin(dLong / 2)
          *
          Math.sin(dLong / 2);

  let c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
  let distance = R * c;
  console.log(`esta es la distancia entre los 2 puntos ${distance * 0.001}`);
}

function degreesToRadians(degrees){
  return degrees * Math.PI / 180;
}*/