<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'World Weather Forecast' }}</title>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/globals.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layouts/forecastLayout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/locationCurrentWeatherSection.css') }}">

    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"></script>
    <script src="https://api.windy.com/assets/map-forecast/libBoot.js"></script>

    {{-- Javascripts --}}
    <script src="{{ asset('js/weatherForecast.js') }}" defer></script>

    @yield('head')
</head>

<body>
    <div class="container">
        <x-forecastHeader :recentWatchedLocations="$recentWatchedLocations" :country="$country" :city="$city" :locationCurrentWeather="$locationCurrentWeather" />

        <main class="location_weather_forecast--BLOCK main_forecast_spacing">
            <div class="location_weather_forecast--CONTENT">
                {{ $slot }}
            </div>
        </main>
    </div>

    <footer class="page--FOOTER secondary_sections_spacing">
        <div class="pageFooter--CONTENT">
            <center>
                <span class="md__fontSize"><mark class="copyright--SYMBOL lg__fontSize">&copy;</mark> All Rights
                    Reserved.
                    World
                    Weather Forecast is made with love
                    &#10084;</span>
            </center>
        </div>
    </footer>
</body>

</html>
