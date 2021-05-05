 const nombre_archivo = () =>{
    const rutaAbsoluta = self.location.href;
    const posicionUltimaBarra = rutaAbsoluta.lastIndexOf("/");
    const rutaRelativa = rutaAbsoluta.substring(
      posicionUltimaBarra + "/".length,
      rutaAbsoluta.length
    );
    return rutaRelativa;
 };

 router(nombre_archivo())


function router(ruta) { //aqui se indicaran las rutas 
  switch (ruta) {
    case "admin.html":
      console.log("estas en el apartado de admin xd");
      break;
    case "home.html":
      console.log("estas en el apartado del home xd");
      break;
    case "lugares.html":
      console.log("estas en el apartado de los lugares xd");
      break;
    case "componentes.html":
      console.log("estas en el apartado de los componentes xd");
      break;
    default:
        console.log("error");
      break;
  }
}

document.querySelector("#si_paso").addEventListener("click", alerta)

function alerta(){
    window.location = '../lugares/lugares.html';
    console.log("si paso la alerta que se dice");
}

