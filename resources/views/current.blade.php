<x-layouts.forecastLayout :country="$country" :city="$city" :locationCurrentWeather="$location_currentWeather['data']['current']" :recentWatchedLocations="$recentWatchedLocations">
    @section('head')
        <link rel="stylesheet" href="{{ asset('css/pages/currentWeatherForecast.css') }}" />
    @endsection

    <x-locationCurrentWeather_section :locationCurrentWeather="$location_currentWeather" />

    <section
        class="location_weatherForecast--SECTION location_currentWeather--SECTION location_currentWeather_sunrise_sunset--SECTION secondary_forecast_spacing">
        <div class="location_currentWeather--CONTENT location_weatherForecast--SECTION-CONTENT">
            <header class="location_currentWeather--HEADER location_weatherForecast--HEADER">
                <h2 class="lg__fontSize">SUNRISE / SUNSET</h2>
            </header>

            <div class="location_currentWeather_sunrise_sunset--BODY">
                <div class="location_currentWeather_sunrise_sunset--CONTENT">
                    <ul class="location_currentWeather_sunrise--LIST location_currentWeather_sunrise_sunset--LIST">
                        <li class="location_currentWeather_sunrise_sunset--LIST-ITEM">
                            <div class="location_currentWeather_sunrise_sunset--ITEM-CONTENT">
                                <span class="location_currentWeather_sunrise_sunset--ICON-CONTAINER">
                                    <img src="{{ asset('assets/icons/sun.png') }}" alt="sunrise time">
                                </span>
                            </div>
                        </li>
                        <li class="location_currentWeather_sunrise_sunset--LIST-ITEM">
                            <div class="location_currentWeather_sunrise_sunset--ITEM-CONTENT">
                                <h4 class="md__fontSize">sunrise</h4>
                                <span
                                    class="md__fontSize">{{ $Location_currentAstronomy['data']['astronomy']['astro']['sunrise'] }}</span>
                            </div>
                        </li>
                        <li class="location_currentWeather_sunrise_sunset--LIST-ITEM">
                            <div class="location_currentWeather_sunrise_sunset--ITEM-CONTENT">
                                <h4 class="md__fontSize">sunset</h4>
                                <span
                                    class="md__fontSize">{{ $Location_currentAstronomy['data']['astronomy']['astro']['sunset'] }}</span>
                            </div>
                        </li>
                    </ul>
                    <div class="location_currentWeather_sunrise_sunset--SPERATER"></div>
                    <ul class="location_currentWeather_sunrise--LIST location_currentWeather_sunrise_sunset--LIST">
                        <li class="location_currentWeather_sunrise_sunset--LIST-ITEM">
                            <div class="location_currentWeather_sunrise_sunset--ITEM-CONTENT">
                                <span class="location_currentWeather_sunrise_sunset--ICON-CONTAINER">
                                    <img src="{{ asset('assets/icons/moon.png') }}" alt="sunset time">
                                </span>
                            </div>
                        </li>
                        <li class="location_currentWeather_sunrise_sunset--LIST-ITEM">
                            <div class="location_currentWeather_sunrise_sunset--ITEM-CONTENT">
                                <h4 class="md__fontSize">moonrise</h4>
                                <span
                                    class="md__fontSize">{{ $Location_currentAstronomy['data']['astronomy']['astro']['moonrise'] }}</span>
                            </div>
                        </li>
                        <li class="location_currentWeather_sunrise_sunset--LIST-ITEM">
                            <div class="location_currentWeather_sunrise_sunset--ITEM-CONTENT">
                                <h4 class="md__fontSize">moonset</h4>
                                <span
                                    class="md__fontSize">{{ $Location_currentAstronomy['data']['astronomy']['astro']['moonset'] }}</span>
                            </div>
                        </li>
                        <li class="location_currentWeather_sunrise_sunset--LIST-ITEM">
                            <div class="location_currentWeather_sunrise_sunset--ITEM-CONTENT">
                                <h4 class="md__fontSize">moon phase</h4>
                                <span
                                    class="md__fontSize">{{ $Location_currentAstronomy['data']['astronomy']['astro']['moon_phase'] }}</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="location_weatherForecast--SECTION location_currentWeather--SECTION secondary_forecast_spacing">
        <div class="location_currentWeather--CONTENT location_weatherForecast--SECTION-CONTENT">
            <header class="location_currentWeather--HEADER location_weatherForecast--HEADER">
                <h2 class="lg__fontSize">Weather radar</h2>
            </header>

            <div class="currentLocation_weatherForecastRadar--CONTAINER">
                <x-weatherForecastRadar :currentUserLatitude="$currentUserLatitude" :currentUserLongitude="$currentUserLongitude" />
            </div>
        </div>
    </section>

</x-layouts.forecastLayout>
