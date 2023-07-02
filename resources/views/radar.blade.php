<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Weather Radar</title>

    <link rel="stylesheet" href="{{ asset('css/globals.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/pages/radar.css') }}" />

    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"></script>
    <script src="https://api.windy.com/assets/map-forecast/libBoot.js"></script>
</head>

<body>

    <div class="container">
        <div class="weatherRadar--CONTENT">

            <nav class="simpleHeader_navbar--EL ">
                <div class="simpleHeader_navbar--CONTENT main_forecast_spacing">
                    <h1 title="World Weather Forecast" role="logo">
                        <a href="/">
                            <img src="{{ asset('assets/logos/WWF [M-T-Logo].png') }}" alt="World weather forecast">
                        </a>
                    </h1>

                    <ul class="simpleHeader_navbar_links--LIST">
                        <li>
                            <a href="/current/{{ $country }}/{{ $city }}"
                                class="simpleHeader_navbar--LINK md__fontSize">Current</a>
                        </li>
                        <li>
                            <a href="/hourly/{{ $country }}/{{ $city }}"
                                class="simpleHeader_navbar--LINK md__fontSize">Hourly</a>
                        </li>
                        <li>
                            <a href="/daily/{{ $country }}/{{ $city }}"
                                class="simpleHeader_navbar--LINK md__fontSize">Daily</a>
                        </li>
                        <li>
                            <a href="/weatherRabar" class="simpleHeader_navbar--LINK md__fontSize">Radar & Map</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="weatherRadar--CONTAINER">
                <x-weatherForecastRadar :currentUserLatitude="$latitude" :currentUserLongitude="$longitude" />
            </div>
        </div>
    </div>
</body>

</html>
