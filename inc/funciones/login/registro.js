const registro = document.querySelector("#form_registro");
const url = "inc/peticiones/login/funciones.php";

document.addEventListener("DOMContentLoaded",() =>{
    registro.addEventListener("submit",registro_usuario);
});

function registro_usuario(e){
    e.preventDefault();
    const nombres = document.querySelector("#nombres").value;
    const apellidos = document.querySelector("#apellidos").value;
    const correo = document.querySelector("#correo").value;
    const usuario = document.querySelector("#usuario").value;
    const contrasenia1 = document.querySelector("#contrasenia1").value;
    const contrasenia2 = document.querySelector("#contrasenia2").value;

    if(contrasenia1 == contrasenia2){
        const datos = new FormData();
        datos.append("accion","registrar_usuario");
    }
    alert(nombres);
    //console.log(acc);
}

