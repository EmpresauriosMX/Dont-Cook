const cozumel = 20.5000055664534;
const cozumel_2 = -86.94734507925112; //estado inicial del mapa
const cancun = 21.16487721828054;
const cancun_2 = -86.84923622113666;
const puerto = 20.5080875074496;
const puerto_2 = -87.23254496420383;

var map = L.map("mapid").fitWorld(); //inicializacion del mapa

const ubicacion_inicial =() =>{
    const ciudad = document.querySelector("#ciudades").value;
    const [ubicacion_x, ubicacion_y] = buscar_coordenadas(ciudad);
    busqueda_gps(ubicacion_x, ubicacion_y);
}

const buscar_coordenadas = (lugar) => {
  let left = 0,
    right = 0;
  switch (lugar) {
    case "cozumel":
      left = cozumel;
      right = cozumel_2;
      break;
    case "cancun":
      left = cancun;
      right = cancun_2;
      break;
    case "puerto":
      left = puerto;
      right = puerto_2;
      break;

    default:
      alert("nada");
      break;
  }

  return [left, right];
};

const busqueda_gps = (x, y) => {

  L.tileLayer( //pintado del mapa inicial
    "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw",
    {
      maxZoom: 18,
      attribution:
        'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      id: "mapbox/streets-v11",
      tileSize: 512,
      zoomOffset: -1,
    }
  ).addTo(map);

  function onLocationFound(e) {
    var radius = e.accuracy / 2;

    L.marker(e.latlng)
      .addTo(map)
      .bindPopup("You are within " + radius + " meters from this point")
      .openPopup();

    L.circle(e.latlng, radius).addTo(map);
  }

  function onLocationError(e) {
    // alert(e.messege);
    map.setView([x, y], 15);
  }

  map.on("locationfound", onLocationFound);
  map.on("locationerror", onLocationError);

  map.locate({ setView: true, maxZoom: 15 }); //ponerle un retraso
};


const asignar_nueva_ciudad = () => {
  const ciudad = document.querySelector("#ciudades").value;
  const [ubicacion_x, ubicacion_y] = buscar_coordenadas(ciudad);
  map.setView([ubicacion_x, ubicacion_y], 15);
};

ubicacion_inicial();