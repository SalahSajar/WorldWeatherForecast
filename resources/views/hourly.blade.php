<x-layouts.forecastLayout :country="$country" :city="$city" :locationCurrentWeather="$location_currentWeather" :recentWatchedLocations="$recentWatchedLocations">

    @foreach ($weatherForecast_hours as $weatherForecast_hour)
        <?php $weatherForecast__HOUR = date('H a', strtotime($weatherForecast_hour['time'])); ?>

        <section data-expanded="{{ $loop->first ? 'true' : 'false' }}"
            class="location_weatherForecast--SECTION location_hourlyWeatherForecast--SECTION secondary_forecast_spacing">
            <div class="location_weatherForecast--CONTENT location_hourlyWeatherForecast--SECTION-CONTENT">
                <header class="location_weatherForecast--HEADER location_hourlyWeatherForecast--HEADER">
                    <div class="location_weatherForecast_header--CONTENT location_hourlyWeatherForecast_header--CONTENT">
                        <h3
                            class="location_weatherForecast_header--HOUR-EL location_hourlyWeatherForecast--HOUR-EL lg__fontSize">
                            {{ $weatherForecast__HOUR }}
                        </h3>

                        <div
                            class="location_weatherForecast--TEMP-INFOS-BLOCK location_hourlyWeatherForecast--TEMP-INFOS-BLOCK">
                            <div
                                class="location_weatherForecast--TEMP-INFOS-MAIN-BLOCK location_hourlyWeatherForecast--TEMP-INFOS-MAIN-BLOCK">
                                <span
                                    class="location_weatherForecast--ICON-WRAPPER location_hourlyWeatherForecast--ICON-WRAPPER">
                                    <img src="{{ $weatherForecast_hour['condition']['icon'] }}"
                                        alt="{{ $weatherForecast_hour['condition']['text'] }}">
                                </span>

                                <div
                                    class="location_weatherForecast--TEMPERATURE-BLOCK location_hourlyWeatherForecast--TEMPERATURE-BLOCK">
                                    <h3
                                        class="location_weatherForecast--TEMPERATURE location_hourlyWeatherForecast--TEMPERATURE xxlg__fontSize">
                                        {{ (int) $weatherForecast_hour['temp_c'] }}°</h3>
                                </div>
                            </div>
                            <h4 class="lg__fontSize">{{ $weatherForecast_hour['condition']['text'] }}</h4>
                            <span
                                class="location_weatherForecast--TEMPERATURE-FEELSLIKE-EL location_hourlyWeatherForecast--TEMPERATURE-FEELSLIKE-EL">Feels
                                like
                                {{ (int) $weatherForecast_hour['feelslike_c'] }}°c</span>
                        </div>

                        <div class="location_weatherForecast--RIGHT-BLOCK location_hourlyWeatherForecast--RIGHT-BLOCK">
                            <div
                                class="location_weatherForecast_leftBlock--CONTENT location_hourlyWeatherForecast_leftBlock--CONTENT">
                                <div
                                    class="location_weatherForecast--WEATHERCHANCE-BLOCK location_hourlyWeatherForecast--WEATHERCHANCE-BLOCK">
                                    <div
                                        class="location_weatherForecast--RAINCHANCE-BLOCK location_hourlyWeatherForecast--RAINCHANCE-BLOCK">
                                        <span
                                            class="location_weatherForecast--WEATHERCHANCE-ICON-CONTAINER location_hourlyWeatherForecast--WEATHERCHANCE-ICON-CONTAINER">
                                            <img src="{{ asset('assets/icons/rain.png') }}" alt="raining chance" />
                                        </span>
                                        <span
                                            class="location_weatherForecast--WEATHERCHANCE-EL location_hourlyWeatherForecast--WEATHERCHANCE-EL md__fontSize">{{ $weatherForecast_hour['chance_of_rain'] }}%</span>
                                    </div>
                                    <div
                                        class="location_weatherForecast--SNOWCHANCE-BLOCK location_hourlyWeatherForecast--SNOWCHANCE-BLOCK">
                                        <span
                                            class="location_weatherForecast--WEATHERCHANCE-ICON-CONTAINER location_hourlyWeatherForecast--WEATHERCHANCE-ICON-CONTAINER">
                                            <img src="{{ asset('assets/icons/snow.png') }}" alt="snowing chance" />
                                        </span>
                                        <span
                                            class="location_weatherForecast--WEATHERCHANCE-EL location_hourlyWeatherForecast--WEATHERCHANCE-EL md__fontSize">{{ $weatherForecast_hour['chance_of_snow'] }}%</span>
                                    </div>
                                </div>
                                <span
                                    class="location_weatherForecast--DROPDOWN-ICON-CONTAINER location_hourlyWeatherForecast--DROPDOWN-ICON-CONTAINER">
                                    <img src="{{ asset('assets/icons/down-arrow.png') }}" alt="down arrow" />
                                </span>
                            </div>
                        </div>

                    </div>
                </header>

                <div class="location_weatherForecast--BODY location_hourlyWeatherForecast--BODY">
                    <div class="location_weatherForecast_body--CONTENT location_hourlyWeatherForecast_body--CONTENT">
                        <ul class="location_weatherForecast_infos--LIST location_hourlyWeatherForecast_infos--LIST">
                            <li
                                class="location_weatherForecast_info--LIST-ITEM location_hourlyWeatherForecast_info--LIST-ITEM">
                                <div
                                    class="location_weatherForecast_info--ITEM-CONTENT location_hourlyWeatherForecast_info--ITEM-CONTENT">
                                    <h5
                                        class="location_weatherForecast_info--HEADER-EL location_hourlyWeatherForecast_info--HEADER-EL md__fontSize">
                                        Wind Speed
                                    </h5>
                                    <span
                                        class="location_weatherForecast_info--BODY location_hourlyWeatherForecast_info--BODY md__fontSize">
                                        {{ $weatherForecast_hour['wind_dir'] }}
                                        {{ $weatherForecast_hour['wind_kph'] }}
                                        km/h</span>
                                </div>
                            </li>
                            <li
                                class="location_weatherForecast_info--LIST-ITEM location_hourlyWeatherForecast_info--LIST-ITEM">
                                <div
                                    class="location_weatherForecast_info--ITEM-CONTENT location_hourlyWeatherForecast_info--ITEM-CONTENT">
                                    <h5
                                        class="location_weatherForecast_info--HEADER-EL location_hourlyWeatherForecast_info--HEADER-EL md__fontSize">
                                        wind
                                        gust</h5>
                                    <span
                                        class="location_weatherForecast_info--BODY location_hourlyWeatherForecast_info--BODY md__fontSize">{{ $weatherForecast_hour['gust_kph'] }}
                                        km/h</span>
                                </div>
                            </li>
                            <li
                                class="location_weatherForecast_info--LIST-ITEM location_hourlyWeatherForecast_info--LIST-ITEM">
                                <div
                                    class="location_weatherForecast_info--ITEM-CONTENT location_hourlyWeatherForecast_info--ITEM-CONTENT">
                                    <h5
                                        class="location_weatherForecast_info--HEADER-EL location_hourlyWeatherForecast_info--HEADER-EL md__fontSize">
                                        cloud
                                        cover</h5>
                                    <span
                                        class="location_weatherForecast_info--BODY location_hourlyWeatherForecast_info--BODY md__fontSize">{{ $weatherForecast_hour['cloud'] }}%</span>
                                </div>
                            </li>
                            <li
                                class="location_weatherForecast_info--LIST-ITEM location_hourlyWeatherForecast_info--LIST-ITEM">
                                <div
                                    class="location_weatherForecast_info--ITEM-CONTENT location_hourlyWeatherForecast_info--ITEM-CONTENT">
                                    <h5
                                        class="location_weatherForecast_info--HEADER-EL location_hourlyWeatherForecast_info--HEADER-EL md__fontSize">
                                        humidity</h5>
                                    <span
                                        class="location_weatherForecast_info--BODY location_hourlyWeatherForecast_info--BODY md__fontSize">{{ $weatherForecast_hour['humidity'] }}%</span>
                                </div>
                            </li>
                            <li
                                class="location_weatherForecast_info--LIST-ITEM location_hourlyWeatherForecast_info--LIST-ITEM">
                                <div
                                    class="location_weatherForecast_info--ITEM-CONTENT location_hourlyWeatherForecast_info--ITEM-CONTENT">
                                    <h5
                                        class="location_weatherForecast_info--HEADER-EL location_hourlyWeatherForecast_info--HEADER-EL md__fontSize">
                                        pressure
                                    </h5>
                                    <span
                                        class="location_weatherForecast_info--BODY location_hourlyWeatherForecast_info--BODY md__fontSize">
                                        {{ $weatherForecast_hour['pressure_mb'] }} mb
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
