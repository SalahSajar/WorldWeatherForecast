<section class="location_currentWeather--SECTION secondary_forecast_spacing location_weatherForecast--SECTION">
    <div class="location_currentWeather--CONTENT location_weatherForecast--SECTION-CONTENT">
        <header class="location_currentWeather--HEADER location_weatherForecast--HEADER">
            <h2 class="lg__fontSize">current weather</h2>
        </header>

        <div class="location_currentWeather--INFOS-BLOCK">
            <div class="location_currentWeather_infos--CONTENT">
                <div class="location_currentWeather_infos--LEFT-SIDE">
                    <div class="location_currentWeather_infos_leftside--CONTENT-WRAPPER">
                        <div class="location_currentWeather--TEMP-INFOS-BLOCK">
                            <span class="location_currentWeather--ICON-WRAPPER">
                                <img src="{{ $locationCurrentWeather['data']['current']['condition']['icon'] }}"
                                    alt="Partly cloudy">
                            </span>

                            <div class="location_currentWeather--TEMPERATURE-BLOCK">
                                <h3 class="location_currentWeather--TEMPERATURE xxxlg__fontSize">
                                    {{ (int) $locationCurrentWeather['data']['current']['temp_c'] }}°
                                </h3>
                            </div>
                        </div>
                        <h4 class="location_currentWeather--CONDITION-DESC-EL lg__fontSize">
                            {{ $locationCurrentWeather['data']['current']['condition']['text'] }}</h4>
                        <span class="location_currentWeather--TEMP-FEELSLIKE-EL md__fontSize">feels like:
                            {{ (int) $locationCurrentWeather['data']['current']['feelslike_c'] }}°C</span>
                    </div>
                </div>
                <div class="location_currentWeather_infos--RIGHT-SIDE">
                    <div class="location_currentWeather_infos_rightside--CONTENT-WRAPPER">
                        <ul class="location_currentWeather_infos--LIST">
                            <li class="location_currentWeather_info--LIST-ITEM">
                                <div class="location_currentWeather_info--ITEM-CONTENT">
                                    <h5 class="location_currentWeather_info--HEADER-EL md__fontSize">Wind
                                        Speed</h5>
                                    <span class="location_currentWeather_info--BODY md__fontSize">
                                        {{ $locationCurrentWeather['data']['current']['wind_dir'] }}
                                        {{ $locationCurrentWeather['data']['current']['wind_kph'] }}
                                        km/h</span>
                                </div>
                            </li>
                            <li class="location_currentWeather_info--LIST-ITEM">
                                <div class="location_currentWeather_info--ITEM-CONTENT">
                                    <h5 class="location_currentWeather_info--HEADER-EL md__fontSize">wind
                                        gust</h5>
                                    <span class="location_currentWeather_info--BODY md__fontSize">
                                        {{ $locationCurrentWeather['data']['current']['gust_kph'] }}
                                        km/h</span>
                                </div>
                            </li>
                            <li class="location_currentWeather_info--LIST-ITEM">
                                <div class="location_currentWeather_info--ITEM-CONTENT">
                                    <h5 class="location_currentWeather_info--HEADER-EL md__fontSize">cloud
                                        cover</h5>
                                    <span
                                        class="location_currentWeather_info--BODY md__fontSize">{{ $locationCurrentWeather['data']['current']['cloud'] }}%</span>
                                </div>
                            </li>
                            <li class="location_currentWeather_info--LIST-ITEM">
                                <div class="location_currentWeather_info--ITEM-CONTENT">
                                    <h5 class="location_currentWeather_info--HEADER-EL md__fontSize">
                                        humidity</h5>
                                    <span
                                        class="location_currentWeather_info--BODY md__fontSize">{{ $locationCurrentWeather['data']['current']['humidity'] }}%</span>
                                </div>
                            </li>
                            <li class="location_currentWeather_info--LIST-ITEM">
                                <div class="location_currentWeather_info--ITEM-CONTENT">
                                    <h5 class="location_currentWeather_info--HEADER-EL md__fontSize">UV
                                        Index</h5>
                                    <span class="location_currentWeather_info--BODY md__fontSize">
                                        {{ (int) $locationCurrentWeather['data']['current']['uv'] }}

                                        @if ($locationCurrentWeather['data']['current']['uv'] <= 2)
                                            low
                                        @elseif($locationCurrentWeather['data']['current']['uv'] > 2 && $locationCurrentWeather['data']['current']['uv'] <= 5)
                                            moderate
                                        @elseif($locationCurrentWeather['data']['current']['uv'] > 5 && $locationCurrentWeather['data']['current']['uv'] <= 7)
                                            high
                                        @elseif($locationCurrentWeather['data']['current']['uv'] > 7 && $locationCurrentWeather['data']['current']['uv'] <= 10)
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
        </div>
    </div>
</section>
