const cozumel = 20.5000055664534;
const cozumel_2 = -86.94734507925112; //estado inicial del mapa
const cancun = 21.16487721828054;
const cancun_2 = -86.84923622113666;
const puerto = 20.5080875074496;
const puerto_2 = -87.23254496420383;

const p_c    = L.marker([20.484027730650677, -86.95238698520322]).bindPopup('This is Denver, CO.');
const p_c1    = L.marker([20.48341101298483, -86.95212038322828]).bindPopup('This is Denver, CO.');
const p_c2    = L.marker([20.49397374191328, -86.94729358546024]).bindPopup('This is Denver, CO.');
const p_c3    = L.marker([20.49581621209855, -86.9547473773008]).bindPopup('This is Denver, CO.');
const p_c4    = L.marker([20.496082883576054, -86.93836456398587]).bindPopup('This is Denver, CO.');
const p_c5    = L.marker([20.491248852818842, -86.92428556037355]).bindPopup('This is Denver, CO.');
const p_c6    = L.marker([20.488252196473198, -86.96817716789751]).bindPopup('This is Denver, CO.');
const p_c7    = L.marker([20.479607967283112, -86.96190930105733]).bindPopup('This is Denver, CO.');
const p_c8    = L.marker([20.493607934712298, -86.94863520455326]).bindPopup('This is Denver, CO.');
const p_c9    = L.marker([20.497277379095852, -86.9552948130701]).bindPopup('This is Denver, CO.');

c_c    = L.marker([21.161365165513008, -86.82443545970155]).bindPopup('This is Denver, CO.');
c_c1    = L.marker([21.170664542919233, -86.83391512465208]).bindPopup('This is Denver, CO.');
c_c2    = L.marker([21.150113285830095, -86.84548770264361]).bindPopup('This is Denver, CO.');
c_c3    = L.marker([21.20256847736797, -86.8791590638036]).bindPopup('This is Denver, CO.');
c_c4    = L.marker([21.150091654540848, -86.84529252667264]).bindPopup('This is Denver, CO.');
c_c5    = L.marker([21.14886275210036, -86.82040345588261]).bindPopup('This is Denver, CO.');
c_c6    = L.marker([21.16265318271007, -86.80964259292999]).bindPopup('This is Denver, CO.');
c_c7    = L.marker([21.153409995388863, -86.86349932944111]).bindPopup('This is Denver, CO.');
c_c8    = L.marker([21.14908657254112, -86.87742854879622]).bindPopup('This is Denver, CO.');
c_c9    = L.marker([21.146529059662548, -86.88036661137572]).bindPopup('This is Denver, CO.');

pc_c    = L.marker([20.51786807357488, -87.23265045180304]).bindPopup('This is Denver, CO.');
pc_c1    = L.marker([20.514882461379838, -87.23331252650918]).bindPopup('This is Denver, CO.');
pc_c2    = L.marker([20.51298226090083, -87.22762271290871]).bindPopup('This is Denver, CO.');
pc_c3    = L.marker([20.513542414166967, -87.23067880526868]).bindPopup('This is Denver, CO.');
pc_c4    = L.marker([20.51253654191003, -87.2270186407562]).bindPopup('This is Denver, CO.');
pc_c5    = L.marker([20.511541259085817, -87.23186179704975]).bindPopup('This is Denver, CO.');
pc_c6    = L.marker([20.510956934457788, -87.23379355610051]).bindPopup('This is Denver, CO.');
pc_c7    = L.marker([20.513006821424657, -87.23365317254597]).bindPopup('This is Denver, CO.');
pc_c8    = L.marker([20.513204124261545, -87.23201499592061]).bindPopup('This is Denver, CO.');
pc_c9    = L.marker([20.52015093996098, -87.23813337362355]).bindPopup('This is Denver, CO.');
/*
const  restaurantes_CO = L.layerGroup([p_c, p_c1, p_c2, p_c3,p_c4,p_c5,p_c6,p_c7,p_c8,p_c9]);
const restaurantes_CA = L.layerGroup([c_c, c_c1, c_c2, c_c3,c_c4,c_c5,c_c6,c_c7,c_c8,c_c9]);
const restaurantes_PU = L.layerGroup([pc_c, pc_c1, pc_c2, pc_c3,pc_c4,pc_c5,pc_c6,pc_c7,pc_c8,pc_c9]);*/

let restaurantes_actuales = L.layerGroup([p_c, p_c1, p_c2, p_c3,p_c4,p_c5,p_c6,p_c7,p_c8,p_c9]);

var map = L.map("mapid",{
  layers: [restaurantes_actuales]
}).fitWorld(); //inicializacion del mapa



const ubicacion_inicial =() =>{
    const ciudad = document.querySelector("#ciudades").value;
    map.removeLayer(restaurantes_actuales);
    const [ubicacion_x, ubicacion_y,restaurantes] = buscar_coordenadas(ciudad);
    busqueda_gps(ubicacion_x, ubicacion_y);
      map.addLayer(restaurantes);
}

const buscar_coordenadas = (lugar) => {
  let left = 0,
    right = 0;
  switch (lugar) {
    case "cozumel":
      left = cozumel;
      right = cozumel_2;
      restaurantes_actuales = L.layerGroup([p_c, p_c1, p_c2, p_c3,p_c4,p_c5,p_c6,p_c7,p_c8,p_c9]);
      break;
    case "cancun":
      left = cancun;
      right = cancun_2;
      restaurantes_actuales = L.layerGroup([c_c, c_c1, c_c2, c_c3,c_c4,c_c5,c_c6,c_c7,c_c8,c_c9]);
      break;
    case "puerto":
      left = puerto;
      right = puerto_2;
      restaurantes_actuales = L.layerGroup([pc_c, pc_c1, pc_c2, pc_c3,pc_c4,pc_c5,pc_c6,pc_c7,pc_c8,pc_c9]);
      break;

    default:
      alert("nada");
      break;
  }
  return [left, right,restaurantes_actuales];
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
    console.log(e.latlng);
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
  map.removeLayer(restaurantes_actuales);
  const [ubicacion_x, ubicacion_y,restaurantes] = buscar_coordenadas(ciudad);
  map.addLayer(restaurantes);
  map.setView([ubicacion_x, ubicacion_y], 15);
};

ubicacion_inicial();