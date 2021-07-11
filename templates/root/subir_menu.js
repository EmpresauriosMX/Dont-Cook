var quill = new Quill('#editor', {
    theme: 'snow'
});

async function jssave() {

    let contenido = quill.container.firstChild.innerHTML;

    const datos = new FormData();
    datos.append('texto', contenido);
    const url = 'subir_menu_php.php';
    try {
        const res = await fetch(url, { method: "POST", body: datos });
        const data = await res.json();
        console.log(data);
      } catch (error) {
        console.log(error);
      }
    // fetch("../../inc/peticiones/admin/menu.php?contenido=" + contenido);
    //alert("El menú se a guardado");

}