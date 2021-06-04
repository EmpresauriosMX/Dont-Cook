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
 /*console.log(ubicacion.length);
  if (ubicacion.length === 0) {
    
    window.location = "../login/login.php";
  }*/
}

export function iniciar_sesion(){
  
}

export async function existe_cuenta() {
  const url = "../../inc/peticiones/admin/funciones.php";
  const datos = new FormData();
  datos.append("accion","verifica_cuenta");
  
  const res = await enviar_datos(url, datos);
  console.log(res); 
  const cuenta = res.cuenta_existente;
  return cuenta;
}
