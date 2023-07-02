<header class="weatherForecast--HEADER">
    <div class="weatherForecast_header--CONTENT">
        <div class="weatherForecast_header--UPPER-PART-BLOCK main_forecast_spacing">
            <h1 title="World Weather Forecast" role="logo">
                <a href="/">
                    <img src="{{ asset('assets/logos/WWF [M-T-Logo].png') }}" alt="World weather forecast">
                </a>
            </h1>

            <div class="weather_location_search--BLOCK" id="weather_location_search--BLOCK">
                <div class="weather_location_search--CONTENT">
                    <div class="weather_location_search_input--CONTAINER">
                        <div class="weather_location_search_input--BLOCK">
                            <span class="weather_location_search_input--ICON-WRAPPER">
                                <img src="{{ asset('assets/icons/search.png') }}" alt="search icon">
                            </span>
                            <input type="text" class="md__fontSize weather_location_search--INPUT"
                                id="weather_location_search--INPUT" placeholder="Search" name="weather_location"
                                onfocus="openLocationSearch_dropdown__HANDLER()" />
                        </div>
                    </div>

                    <div data-visible="false" id="weather_locations_search--DROPDOWN-BLOCK"
                        class="weather_locations_search--DROPDOWN-BLOCK">
                        <div data-searchresultsblockisvisible="false"
                            class="weather_locations_search--DROPDOWN-BLOCK-CONTENT">
                            <div class="default_currentANDrecent_locations--BLOCK">
                                <ul class="default_currentANDrecent_locations--RESULTS-LIST">
                                    <li class="default_current_location--RESULT-ITEM">
                                        <div class="default_current_location--RESULT-ITEM-CONTENT">
                                            <span
                                                class="default_current_location--RESULT-ITEM-HEADER-EL sm__fontSize">Current</span>

                                            <a href="/current/{{ $country }}/{{ $city }}"
                                                class="currentANDrecentLocations--ITEM-LINK">
                                                <div class="currentANDrecentLocations--ITEM-LEFTSIDE-BLOCK">
                                                    <h5 class="md__fontSize">{{ $country }}</h5>
                                                    <h6 class="sm__fontSize">{{ $city }}</h6>
                                                </div>

                                                <div class="currentANDrecentLocations--ITEM-RIGHTSIDE-BLOCK">
                                                    <span class="currentANDrecentLocations--ITEM-ICON-WRAPPER">
                                                        <img src="http://cdn.weatherapi.com/weather/64x64/day/116.png"
                                                            alt="Weather Icon">
                                                    </span>
                                                    <span
                                                        class="currentANDrecentLocations-ITEM-TEMP-EL xlg__fontSize">{{ (int) $locationCurrentWeather['temp_c'] }}°</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>

                                    <div class="recent_viewed_locations--LIST-CONTAINER">
                                        <li class="recent_viewed_locations--LIST-HEADER sm__fontSize">RECENT</li>

                                        {{-- <li class="recent_viewed_location--ITEM">
                                            <a href="/" class="currentANDrecentLocations--ITEM-LINK">
                                                <div class="currentANDrecentLocations--ITEM-LEFTSIDE-BLOCK">
                                                    <h5 class="md__fontSize">Casablanca</h5>
                                                    <h6 class="sm__fontSize">morocco</h6>
                                                </div>

                                                <div class="currentANDrecentLocations--ITEM-RIGHTSIDE-BLOCK">
                                                    <span class="currentANDrecentLocations--ITEM-ICON-WRAPPER">
                                                        <img src="http://cdn.weatherapi.com/weather/64x64/day/116.png"
                                                            alt="Weather Icon">
                                                    </span>
                                                    <span
                                                        class="currentANDrecentLocations-ITEM-TEMP-EL xlg__fontSize">28°</span>
                                                </div>
                                            </a>
                                        </li> --}}

                                        @foreach ($recentWatchedLocations as $recentWatchedLocation)
                                            <li class="recent_viewed_location--ITEM">
                                                <a href="/current/{{ $recentWatchedLocation['country'] }}/{{ $recentWatchedLocation['city'] }}"
                                                    class="currentANDrecentLocations--ITEM-LINK">
                                                    <div class="currentANDrecentLocations--ITEM-LEFTSIDE-BLOCK">
                                                        <h5 class="md__fontSize">{{ $recentWatchedLocation['city'] }}
                                                        </h5>
                                                        <h6 class="sm__fontSize">
                                                            {{ $recentWatchedLocation['country'] }}</h6>
                                                    </div>

                                                    <div class="currentANDrecentLocations--ITEM-RIGHTSIDE-BLOCK">
                                                        <span class="currentANDrecentLocations--ITEM-ICON-WRAPPER">
                                                            <img src="{{ $recentWatchedLocation['weather_icon'] }}"
                                                                alt="Weather Icon">
                                                        </span>
                                                        <span
                                                            class="currentANDrecentLocations-ITEM-TEMP-EL xlg__fontSize">{{ (int) $recentWatchedLocation['temp'] }}°</span>
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach
                                    </div>
                                </ul>
                            </div>
                            <div class="locations_search--RESULTS-BLOCK">
                                <ul class="weather_locations_search--RESULTS-LIST">
                                    <li>
                                        <a href="/current/{{ $country }}/{{ $city }}"
                                            class="weather_locations_search--LIST-ITEM weather_locations_search--LIST-HEADER">
                                            <span class="weather_locations_search_results--ITEM-ICON-CONTAINER">
                                                <img src="{{ asset('assets/icons/location.png') }}"
                                                    alt="location icon" />
                                            </span>
                                            <span class="weather_locations_search_results--ITEM-TYPO md__fontSize">use
                                                your
                                                current location</span>
                                        </a>
                                    </li>
                                    <div id="locations_search_options--CONTAINER">
                                        {{-- <li>
                                            <a href="/current/morroco/rabat" class="weather_locations_search--LIST-ITEM">
                                                <span
                                                    class="weather_locations_search_results--ITEM-TYPO md__fontSize">rabat,
                                                    morocco</span>
                                            </a>
                                        </li> --}}
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="weatherForecast_header--LOWER-PART-BLOCK main_forecast_spacing">
            <nav class="weatherForecast_header--LOWER-PART-CONTENT">
                <ul class="weatherForecast_header--FORECAST-TYPES-LIST">
                    <li>
                        <a href="/current/{{ $country }}/{{ $city }}" class="md__fontSize">current</a>
                    </li>
                    <li>
                        <a href="/hourly/{{ $country }}/{{ $city }}" class="md__fontSize">hourly</a>
                    </li>
                    <li>
                        <a href="/daily/{{ $country }}/{{ $city }}" class="md__fontSize">daily</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
