export async function enviar_datos(url, datos) {
  try {
    const res = await fetch(url, { method: "POST", body: datos });
    const data = await res.json();
    return data;
  } catch (error) {
    console.log(error);
  }
}
