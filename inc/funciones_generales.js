export async function enviar_datos(url, datos) {
  try {
    const res = await fetch(url, { method: "POST", body: datos });
    const data = await res.json();
    return data;
  } catch (error) {
    console.log(error);
  }
}

export function mostrar_ubicacion() {
  return JSON.parse(localStorage.getItem("ubicacion")) || [];
}

export function existe_cuenta(){
  const url = "../../inc/peticiones/admin/funciones.php";
  const datos = new FormData();
  datos.append("accion","verifica_cuenta");
  let respuesta = enviar_datos(url,datos).then(res => res);
  console.log("respuesta: " + respuesta);
  return respuesta;
  /*if(re.cuenta_existente){
      //EXISTE UNA CUENTA
      console.log("existe una cuenta");
      cargar_restaurantes();
  }
  else{
      //NO EXISTE UNA CUENTA
      //mostrar el mensaje de no existe una cuenta 
      let mensaje = "sin_cuenta";
      mostrar_mensaje(mensaje);
      console.log("no existe una cuenta");
  }*/

}