<x-layouts.mainLayout>
    <div class="home--CONTAINER">
        <x-homeHeader :recentWatchedLocations="$recentWatchedLocations" :currentUserCountry="$currentUserCountry" :currentUserCity="$currentUserCity" />

        <main class="main_sections_spacing">
            @if ($currentLocation_forecast['cnt'] > 0 && $currentLocation_forecast['cod'] == 200)
                <section class="current_location_weather_forecast--SECTION">
                    <div class="section--CONTENT secondary_forecast_spacing">
                        <h2 class="lg__fontSize section--HEADER">{{ $currentUserCity }}, {{ $currentUserCountry }}</h2>

                        <div class="currentLocation_weatherForecast--BLOCK">
                            <div class="currentLocation_weatherForecast--CONTENT">
                                @foreach ($currentLocation_forecast['list'] as $currentLocation_forecast__ITEM)
                                    <?php
                                    $weatherForecast__HOUR = date('H a', strtotime($currentLocation_forecast__ITEM['dt_txt']));
                                    $weatherForecast__DAY = date('D', strtotime($currentLocation_forecast__ITEM['dt_txt']));
                                    ?>

                                    <div class="currentLocation_weatherForecast--COLUMN">
                                        <div class="currentLocation_weatherForecast--COLUMN-CONTENT">
                                            <div class="currentLocation_weatherForecast--COLUMN-HEADER">
                                                <div class="currentLocation_weatherForecast--TIME-DATE--CONTAINER">
                                                    <span
                                                        class="currentLocation_weatherForecast--TIME sm__fontSize">{{ $weatherForecast__HOUR }}</span>
                                                    <span
                                                        class="currentLocation_weatherForecast--DAY sm__fontSize">{{ $weatherForecast__DAY }}</span>
                                                </div>
                                                <div class="currentLocation_weatherForecast--ICON-TEMP--CONTAINER">
                                                    <div class="currentLocation_weatherForecast--ICON-WRAPPER">
                                                        <img src="https://openweathermap.org/img/wn/{{ $currentLocation_forecast__ITEM['weather'][0]['icon'] }}.png"
                                                            alt="light rain">
                                                    </div>
                                                    <h4 class="md__fontSize">
                                                        {{ (int) $currentLocation_forecast__ITEM['main']['temp'] }}°c
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="currentLocation_weatherForecast--COLUMN-FOOTER">
                                                <div class="currentLocation_weatherForecast--WEATHER-DETAILS-BLOCK">
                                                    <div title="Clouds Cover"
                                                        class="currentLocation_weatherForecast--WEATHER-DETAIL-CONTAINER">
                                                        <div
                                                            class="currentLocation_weatherForecast--WEATHER-DETAIL-CONTENT">
                                                            <div
                                                                class="currentLocation_weatherForecast--WEATHER-DETAIL-ICON-WRAPPER">
                                                                <img src="{{ asset('assets/icons/clouds.png') }}"
                                                                    alt="cloud cover">
                                                            </div>
                                                            <span
                                                                class="currentLocation_weatherForecast--WEATHER-DETAIL-EL sm__fontSize">{{ (int) $currentLocation_forecast__ITEM['clouds']['all'] }}%</span>
                                                        </div>
                                                    </div>
                                                    <div title="Humidity"
                                                        class="currentLocation_weatherForecast--WEATHER-DETAIL-CONTAINER">
                                                        <div
                                                            class="currentLocation_weatherForecast--WEATHER-DETAIL-CONTENT">
                                                            <div
                                                                class="currentLocation_weatherForecast--WEATHER-DETAIL-ICON-WRAPPER">
                                                                <img src="{{ asset('assets/icons/humidity.png') }}"
                                                                    alt="humidity">
                                                            </div>
                                                            <span
                                                                class="currentLocation_weatherForecast--WEATHER-DETAIL-EL sm__fontSize">
                                                                {{ (int) $currentLocation_forecast__ITEM['main']['humidity'] }}%
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div title="Wind Speed"
                                                        class="currentLocation_weatherForecast--WEATHER-DETAIL-CONTAINER">
                                                        <div
                                                            class="currentLocation_weatherForecast--WEATHER-DETAIL-CONTENT">
                                                            <div
                                                                class="currentLocation_weatherForecast--WEATHER-DETAIL-ICON-WRAPPER">
                                                                <img src="{{ asset('assets/icons/wind.png') }}"
                                                                    alt="wind chance">
                                                            </div>
                                                            <span
                                                                class="currentLocation_weatherForecast--WEATHER-DETAIL-EL sm__fontSize">{{ (int) $currentLocation_forecast__ITEM['wind']['speed'] }}
                                                                km/h</span>

                                                            <span class="wind_direction--EL">
                                                                <i class="wind_direcion--ICON"
                                                                    style="transform:rotate({{ $currentLocation_forecast__ITEM['wind']['deg'] }}deg)"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            @endif

            <section class="current_location_weather_map--SECTION">
                <div class="section--CONTENT secondary_forecast_spacing">
                    <h2 class="lg__fontSize section--HEADER">WEATHER RADAR</h2>

                    <div class="section--BODY">
                        <x-weatherForecastRadar :currentUserLatitude="$currentUserLatitude" :currentUserLongitude="$currentUserLongitude" />
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script src="{{ asset('js/home.js') }}"></script>
</x-layouts.mainLayout>
