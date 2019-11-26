function initMap()
{
    // Posicion inicial: centro de Zacatecas.
    var latitud = 20.690361;
    var longitud = -88.201560;

    // Objeto que ontiene la latitud y longitud indicadas.
    var mi_lat_y_lng = { lat: latitud, lng: longitud };

    // Objeto que guarda las opciones.
    var opciones = 
    {
        // Centro el mapa con las coordenadas indicadas.
        center: mi_lat_y_lng,
        // Inicialmente se mostrara el pais.
        zoom: 15,
        // Color de fondo del mapa.
        //backgroundColor: "rgba(130, 224, 170, 1)"
    };

    // Se crea un nuevo objeto que cargue el mapa en el contenedor map con las opciones previamente declaradas.
    var map = new google.maps.Map( document.getElementById('map'), opciones );

    /* ============== Geololocalizar al adoptante ============== */

    // Si el navegador acepta la geolocalizacion.
    if(navigator.geolocation)
    {
        // Se obtiene la ubicacion con el siguiente metodo.
        navigator.geolocation.getCurrentPosition(
            // Argumento 1: Success. Funcion anonima.
            function(position)
            {
                // Variable que asigna valores a latitud y longitud.
                var pos_actual = 
                {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                }

                // Se modifica el centro del mapa.
                map.setCenter(pos_actual);
                // Se modifica el zoom, para ahora ver desde la ciudad ubicada.
                map.setZoom(15);

                // Se crea un marcador para la ubicacion
                var mi_ubicacion = new google.maps.Marker({
                    position: pos_actual,
                    map: map,
                    title: "Mi ubicación",
                    animation: google.maps.Animation.DROP
                });
            },
            // Argumento 2: Error. Funcion anonima.
            function()
            {
                alert("Para encontrar los restaurantes mas cercanos en base su ubicacion por favor recargue la pagina y acepte el permiso");
            }
        );
    }
    else
    {
        alert("Lo sentimos su navagador no soporta la geolocalización");
    }

    /* ============== Colocar marcadores de centros de adopcion ============== */

    // Funcion que agrega un nuevo marcador en base a sus valores.
    function agregar_marcador(propiedades)
    {
        var marker = new google.maps.Marker({
            position: propiedades.coords,
            map: map,
            title: "Centro de adopción",
            animation: google.maps.Animation.BOUNCE,
            icon: 'IMG/icon.jpeg'
        })

        // Si el marcador pasado contiene informacion para ser mostrada.
        if(propiedades.content)
        {
            // Se crea un nuevo objeto que es el recuadro de informacion.
            var recuadro_informacion = new google.maps.InfoWindow({
                content: propiedades.content
            })

            // Cuando el marcador sea pulsado se mostrara el recuadro de informacion.
            marker.addListener('click', 
                // Funcion anonima.
                function()
                {
                    // El recuadro de informacion de visualiza.
                    recuadro_informacion.open(map, marker);

                    // Si la animacion del marcador es diferente de nula, es decir esta animado.
                    if(marker.getAnimation() != null)
                    {
                        marker.setAnimation(null);
                    }
                }
            );
        }
    }

    // Array con etiquetas html de cada marcador para mostrar como informacion.
    var etiquetas = [
        {
            tierra_de_animales: 
                "<h3>Tierra de Animales</h3>\
                <p>Leona Vicario</p>\
                <p>Leona Vicario, Q.R. 77535 </p>\
                <form method='POST' action='../../centro_de_adopcion/mascotas.php'>\
                <input type='text' value='1' name='id_sucursal' id='id_sucursal' HIDDEN/>\
                <br><input type='submit' value='Ir al centro de adopcion' class='btn btn-primary btn-xs btn-block' /><br>\
                </form>\
                <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-mlADLFGgp2cVcCMjDSHP7PxNeZ0xfgD8pZaDkmOv1a9L8RH4nw' alt='img' width='200px'><br>"
        },
        {
            luum:
                "<h3>Luum Balicheo</h3>\
                <p>Avenida Kohunlich</p>\
                <p>251 Mz 13 Lote 28, Sm 50</p>\
                <p>Cancún, Q.R. 77533 </p>\
                <form method='POST' action='../../centro_de_adopcion/mascotas.php'>\
                <input type='text' value='2' name='id_sucursal' id='id_sucursal' HIDDEN/>\
                <br><input type='submit' value='Ir al centro de adopcion' class='btn btn-primary btn-xs btn-block' /><br>\
                </form>\
                <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-mlADLFGgp2cVcCMjDSHP7PxNeZ0xfgD8pZaDkmOv1a9L8RH4nw' alt='img' width='200px'>"
        }
    ]

    // Array con cada uno de los marcadores de centros de adopcion.
    var marcadores = 
    [
        {
            coords: { lat: 21.01822850610167, lng: -87.1388781},
            content: etiquetas[0].tierra_de_animales
        },
        {
            coords: { lat: 21.145828406142304, lng: -86.84871550000003},
            content: etiquetas[1].luum
        }
    ];

    // Se añade cada marcador al mapa.
    for(var i = 0; i < marcadores.length; i++)
    {
        agregar_marcador( marcadores[i] );
    }

}