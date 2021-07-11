import { enviar_datos } from "../funciones_generales.js";
const url = "../../inc/peticiones/home/funciones.php";

//AQUI CARGA SI TIENE UNA CIUDAD REGISTRADA O NO
document.addEventListener("DOMContentLoaded", () => {
    mostrar_categorias();
});

async function mostrar_categorias(){
    const datos = new FormData();
    datos.append("accion","busca_categorias");
    const res = await enviar_datos(url, datos);
    const {id, nombre} = res;
    imprime_categorias(res);
}

function imprime_categorias(categorias){
    const div_categorias = document.querySelector("#categorias_list");
    if (div_categorias){
        categorias.forEach(categoria => {
            const {id, nombre} = categoria;
            div_categorias.innerHTML += `
                <li><a href="../restaurantes/restaurantes.php?c=${nombre}">${nombre}</a></li>
            `; 
        }); 
    }
}