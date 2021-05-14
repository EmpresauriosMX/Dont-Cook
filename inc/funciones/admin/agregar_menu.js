//Initialize Quill editor
var quill = new Quill('#editor', {
    theme: 'snow'
  });

  function jssave(){

   let contenido = quill.container.firstChild.innerHTML;
    fetch("../../peticiones/admin/consultas.php?contenido=" + contenido);
    alert("El menú se a guardado chido");

  }