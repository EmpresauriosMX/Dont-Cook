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