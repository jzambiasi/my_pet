<!DOCTYPE html>
<html>
<head>
    <title>Localizador de Pet Shops</title>
    <!-- Inclua a API do Google Maps com sua chave -->
    <script src="https://maps.googleapis.com/maps/api/js?key=SUA_CHAVE_DA_API&libraries=places"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        h1 {
            margin: 0;
        }

        #map {
            width: 100%;
            height: 400px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Localizador de Pet Shops</h1>
    </header>

    <div id="map"></div>

    <script>
        // Função de inicialização do mapa
        function initMap() {
            // Coordenadas do centro do mapa (pode ser a localização do usuário)
            var center = { lat: -23.550520, lng: -46.633308 }; // Exemplo: São Paulo

            // Opções do mapa
            var mapOptions = {
                center: center,
                zoom: 12 // Nível de zoom
            };

            // Crie um mapa na div com o id "map"
            var map = new google.maps.Map(document.getElementById('map'), mapOptions);

            // Crie um serviço de lugares para buscar pet shops
            var service = new google.maps.places.PlacesService(map);

            // Defina o raio de busca em metros (10 km)
            var radius = 10000;

            // Crie uma solicitação para buscar pet shops
            var request = {
                location: center,
                radius: radius,
                type: ['pet_store'] // Tipo de lugar que estamos procurando
            };

            // Faça a solicitação para encontrar pet shops
            service.nearbySearch(request, function(results, status) {
                if (status === google.maps.places.PlacesServiceStatus.OK) {
                    for (var i = 0; i < results.length; i++) {
                        // Crie um marcador para cada pet shop encontrado
                        var marker = new google.maps.Marker({
                            position: results[i].geometry.location,
                            map: map,
                            title: results[i].name
                        });
                    }
                }
            });
        }

        // Chame a função de inicialização do mapa após o carregamento da página
        google.maps.event.addDomListener(window, 'load', initMap);
    </script>
</body>
</html>
