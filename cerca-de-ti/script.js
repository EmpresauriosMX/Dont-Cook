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

    //ICONOS
    var icon_restaurante = 'IMG/icon.png';
    var icon_pizza = 'IMG/pizza.png';
    var icon_pollo = 'IMG/pollo.png';
    var icon_rapido = 'IMG/rapida.png';
    var icon_bares = 'IMG/bares.png';
    var iconoMar;

    // Funcion que agrega un nuevo marcador en base a sus valores.
    function agregar_marcador(propiedades ,icono)
    {   
        switch(icono){
            case 'restaurante':
                iconoMar = icon_restaurante; break;
            case 'pizza': 
                iconoMar = icon_pizza; break;
            case 'pollo':
                iconoMar = icon_pollo; break;
            case 'rapida':  
                iconoMar = icon_rapido; break;
            case 'bares':
                iconoMar =icon_bares; break;
            default :
                iconoMar = 'IMG/icon.png';
        }

        var marker = new google.maps.Marker({
            position: propiedades.coords,
            map: map,
            title: "RESTAURANTE",
            animation: google.maps.Animation.BOUNCE,
            icon: iconoMar
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
    var etiquetas_restaurantes = [
        {
            eleganzza: 
                "<h3>Eleganzza</h3>\
                <p>Comida mexicana</p>\
                <p></p>\
                <img src='../restaurantes/Eleganzza/img/elelogo.jpg' alt='img' width='200px'><br>"
        },
        {
            ambrosia:
                "<h3>Ambrosía</h3>\
                <p></p>\
                <p>Restaurante, cafeteria</p>\
                <img src='../restaurantes//Ambrosía/img/amlogo.jpg' alt='img' width='200px'><br>"          
        },
        {
            bait_Lajam:
                "<h3>Bait Lajam</h3>\
                <p></p>\
                <p>Comida arabe</p>\
                <img src='../restaurantes/BaitLajam/img/lalogo2.png' alt='img' width='200px'><br>" 
        },
        {
            yepez:
            "<h3>Yepez</h3>\
            <p></p>\
            <p>Desayunos,comidas y cenas</p>\
            <img src='../restaurantes/Yepez/img/yepez.png' alt='img' width='200px'><br>" 
        },
        {
            la_selva:
            "<h3>La selva</h3>\
            <p></p>\
            <p>Comida regional</p>\
            <img src='../restaurantes/LaSelva/img/sellogo.jpg' alt='img' width='200px'><br>" 
        }
    ]

    // Array con cada uno de los marcadores de restaurantes
    var marcadores_restaurantes = 
    [
        //eleganzza
        {
            coords: { lat: 20.6906411, lng: -88.2000389},
            content: etiquetas_restaurantes[0].eleganzza
        },
        //Ambrosia
        {
            coords: { lat: 20.689633, lng: -88.1988336},
            content: etiquetas_restaurantes[1].ambrosia
        },
        //Bait Lajam
        {
            coords: { lat: 20.6987164, lng: -88.2029344},
            content: etiquetas_restaurantes[2].bait_Lajam
        },
        //Yepez
        {
            coords: { lat: 20.6814191, lng: -88.1880452},
            content: etiquetas_restaurantes[3].yepez
        },
        //La selva
        {
            coords: {lat: 20.6961904, lng: -88.2027456},
            content: etiquetas_restaurantes[4].la_selva
        }

    ];

    var etiquetas_pizza = [
        {
            Oasis: 
                "<h3>Oasis</h3>\
                <p>Pizzas</p>\
                <p></p>\
                <img src='../restaurantes/Oasis/img/oasislogo.gif' alt='img' width='200px'><br>"
        }
    ]

    // Array con cada uno de los marcadores de pizzerias
    var marcadores_pizza = 
    [
        //eleganzza
        {
            coords: { lat: 20.6860908, lng: -88.1981081},
            content: etiquetas_pizza[0].Oasis
        }
    ];

    //comida rapida
    //etiquetas de comida rapida
    var etiquetas_rapida = [
        {
            d_volada: 
                "<h3>D'volada</h3>\
                <p>comida rapida</p>\
                <p></p>\
                <img src='../restaurantes/Oasis/img/oasislogo.gif' alt='img' width='200px'><br>"
        }
    ]
    var marcadores_rapida = 
    [
        //eleganzza
        {
            coords: {lat: 20.6907672, lng: -88.2056933},
            content: etiquetas_rapida[0].d_volada
        }
    ];


    

    // Se añade cada marcador al mapa de restaurantes
    for(var i = 0; i < marcadores_restaurantes.length; i++)
    {
        agregar_marcador( marcadores_restaurantes[i],'restaurantes');
    }

    // Se añade cada marcador al mapa de pizzas
    for(var i = 0; i < marcadores_pizza.length; i++)
    {
        agregar_marcador( marcadores_pizza[i],'pizza');
    }

    // Se añade cada marcador al mapa de comida rapida
    for(var i = 0; i < marcadores_rapida.length; i++)
    {
        agregar_marcador( marcadores_rapida[i],'rapida');
    }
}