<x-layouts.forecastLayout :country="$country" :city="$city" :locationCurrentWeather="$location_currentWeather" :recentWatchedLocations="$recentWatchedLocations">

    @foreach ($weatherForecast_days as $weatherForecast_day)
        <?php
        $weatherForecast__DATE = date('m/d', strtotime($weatherForecast_day['date']));
        $weatherForecast__DAY = date('D', strtotime($weatherForecast_day['date']));
        ?>

        <section data-expanded="{{ $loop->first ? 'true' : 'false' }}"
            class="location_weatherForecast--SECTION location_dailyWeatherForecast--SECTION secondary_forecast_spacing">
            <div class="location_weatherForecast--CONTENT location_dailyWeatherForecast--SECTION-CONTENT">
                <header class="location_weatherForecast--HEADER location_dailyWeatherForecast--HEADER">
                    <div class="location_weatherForecast_header--CONTENT location_dailyWeatherForecast_header--CONTENT">
                        <div class="location_weatherForecast--DATE-BLOCK">
                            <span
                                class="location_weatherForecast--DAY-EL md__fontSize">{{ $weatherForecast__DAY }}</span>
                            <h3
                                class="location_weatherForecast_header--HOUR-EL location_dailyWeatherForecast--HOUR-EL lg__fontSize">
                                {{ $weatherForecast__DATE }}
                            </h3>
                        </div>

                        <div
                            class="location_weatherForecast--TEMP-INFOS-BLOCK location_dailyWeatherForecast--TEMP-INFOS-BLOCK">
                            <div
                                class="location_weatherForecast--TEMP-INFOS-MAIN-BLOCK location_dailyWeatherForecast--TEMP-INFOS-MAIN-BLOCK">
                                <span
                                    class="location_weatherForecast--ICON-WRAPPER location_dailyWeatherForecast--ICON-WRAPPER">
                                    <img src='{{ $weatherForecast_day['day']['condition']['icon'] }}'
                                        alt="{{ $weatherForecast_day['day']['condition']['text'] }}">
                                </span>

                                <div
                                    class="location_weatherForecast--TEMPERATURE-BLOCK location_dailyWeatherForecast--TEMPERATURE-BLOCK">
                                    <h3
                                        class="location_weatherForecast--TEMPERATURE location_dailyWeatherForecast--TEMPERATURE xxlg__fontSize">
                                        {{ (int) $weatherForecast_day['day']['maxtemp_c'] }}°<span
                                            class="location_weatherForecast--MIN-TEMPERATURE lg__fontSize">/{{ (int) $weatherForecast_day['day']['mintemp_c'] }}°</span>
                                    </h3>
                                </div>
                            </div>
                            <h4 class="lg__fontSize">{{ $weatherForecast_day['day']['condition']['text'] }}</h4>
                            <span
                                class="location_weatherForecast--TEMPERATURE-FEELSLIKE-EL location_dailyWeatherForecast--TEMPERATURE-FEELSLIKE-EL">average
                                temperature
                                {{ (int) $weatherForecast_day['day']['avgtemp_c'] }}°c</span>
                        </div>

                        <div class="location_weatherForecast--RIGHT-BLOCK location_dailyWeatherForecast--RIGHT-BLOCK">
                            <div
                                class="location_weatherForecast_leftBlock--CONTENT location_dailyWeatherForecast_leftBlock--CONTENT">
                                <div
                                    class="location_weatherForecast--WEATHERCHANCE-BLOCK location_dailyWeatherForecast--WEATHERCHANCE-BLOCK">
                                    <div
                                        class="location_weatherForecast--RAINCHANCE-BLOCK location_dailyWeatherForecast--RAINCHANCE-BLOCK">
                                        <span
                                            class="location_weatherForecast--WEATHERCHANCE-ICON-CONTAINER location_dailyWeatherForecast--WEATHERCHANCE-ICON-CONTAINER">
                                            <img src="{{ asset('assets/icons/rain.png') }}" alt="raining chance" />
                                        </span>
                                        <span
                                            class="location_weatherForecast--WEATHERCHANCE-EL location_dailyWeatherForecast--WEATHERCHANCE-EL md__fontSize">{{ $weatherForecast_day['day']['daily_chance_of_rain'] }}%</span>
                                    </div>
                                    <div
                                        class="location_weatherForecast--SNOWCHANCE-BLOCK location_dailyWeatherForecast--SNOWCHANCE-BLOCK">
                                        <span
                                            class="location_weatherForecast--WEATHERCHANCE-ICON-CONTAINER location_dailyWeatherForecast--WEATHERCHANCE-ICON-CONTAINER">
                                            <img src="{{ asset('assets/icons/snow.png') }}" alt="snowing chance" />
                                        </span>
                                        <span
                                            class="location_weatherForecast--WEATHERCHANCE-EL location_dailyWeatherForecast--WEATHERCHANCE-EL md__fontSize">{{ $weatherForecast_day['day']['daily_chance_of_snow'] }}%</span>
                                    </div>
                                </div>
                                <span
                                    class="location_weatherForecast--DROPDOWN-ICON-CONTAINER location_dailyWeatherForecast--DROPDOWN-ICON-CONTAINER">
                                    <img src="{{ asset('assets/icons/down-arrow.png') }}" alt="down arrow" />
                                </span>
                            </div>
                        </div>

                    </div>
                </header>

                <div class="location_weatherForecast--BODY location_dailyWeatherForecast--BODY">
                    <div class="location_weatherForecast_body--CONTENT location_dailyWeatherForecast_body--CONTENT">
                        <ul class="location_weatherForecast_infos--LIST location_dailyWeatherForecast_infos--LIST">
                            <li
                                class="location_weatherForecast_info--LIST-ITEM location_dailyWeatherForecast_info--LIST-ITEM">
                                <div
                                    class="location_weatherForecast_info--ITEM-CONTENT location_dailyWeatherForecast_info--ITEM-CONTENT">
                                    <h5
                                        class="location_weatherForecast_info--HEADER-EL location_dailyWeatherForecast_info--HEADER-EL md__fontSize">
                                        Wind Speed
                                    </h5>
                                    <span
                                        class="location_weatherForecast_info--BODY location_dailyWeatherForecast_info--BODY md__fontSize">
                                        {{ $weatherForecast_day['day']['maxwind_kph'] }}
                                        km/h</span>
                                </div>
                            </li>
                            <li
                                class="location_weatherForecast_info--LIST-ITEM location_dailyWeatherForecast_info--LIST-ITEM">
                                <div
                                    class="location_weatherForecast_info--ITEM-CONTENT location_dailyWeatherForecast_info--ITEM-CONTENT">
                                    <h5
                                        class="location_weatherForecast_info--HEADER-EL location_dailyWeatherForecast_info--HEADER-EL md__fontSize">
                                        humidity</h5>
                                    <span
                                        class="location_weatherForecast_info--BODY location_dailyWeatherForecast_info--BODY md__fontSize">{{ $weatherForecast_day['day']['avghumidity'] }}%</span>
                                </div>
                            </li>
                            <li
                                class="location_weatherForecast_info--LIST-ITEM location_dailyWeatherForecast_info--LIST-ITEM">
                                <div
                                    class="location_weatherForecast_info--ITEM-CONTENT location_dailyWeatherForecast_info--ITEM-CONTENT">
                                    <h5
                                        class="location_weatherForecast_info--HEADER-EL location_dailyWeatherForecast_info--HEADER-EL md__fontSize">
                                        pressure
                                    </h5>
                                    <span
                                        class="location_weatherForecast_info--BODY location_dailyWeatherForecast_info--BODY md__fontSize">
                                        {{ $weatherForecast_day['hour'][0]['pressure_mb'] }} mb
                                    </span>
                                </div>
                            </li>
                            <li
                                class="location_weatherForecast_info--LIST-ITEM location_dailyWeatherForecast_info--LIST-ITEM">
                                <div
                                    class="location_weatherForecast_info--ITEM-CONTENT location_dailyWeatherForecast_info--ITEM-CONTENT">
                                    <h5
                                        class="location_weatherForecast_info--HEADER-EL location_dailyWeatherForecast_info--HEADER-EL md__fontSize">
                                        UV index
                                    </h5>
                                    <span
                                        class="location_weatherForecast_info--BODY location_dailyWeatherForecast_info--BODY md__fontSize">
                                        {{ $weatherForecast_day['day']['uv'] }}

                                        @if ($weatherForecast_day['day']['uv'] <= 2)
                                            low
                                        @elseif($weatherForecast_day['day']['uv'] > 2 && $weatherForecast_day['day']['uv'] <= 5)
                                            moderate
                                        @elseif($weatherForecast_day['day']['uv'] > 5 && $weatherForecast_day['day']['uv'] <= 7)
                                            high
                                        @elseif($weatherForecast_day['day']['uv'] > 7 && $weatherForecast_day['day']['uv'] <= 10)
                                            very high
                                        @else
                                            extreme
                                        @endif
                                    </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
</x-layouts.forecastLayout>
