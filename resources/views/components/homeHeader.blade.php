<header class="homeHeader--BLOCK">
    <div class="homeHeader--CONTENT main_sections_spacing">
        <nav class="simpleHeader_navbar--EL">
            <div class="simpleHeader_navbar--CONTENT">
                <h1 title="World Weather Forecast" role="logo">
                    <a href="/">
                        <img src="{{ asset('/assets/logos/WWF [M-T-Logo].png') }}" alt="World weather forecast">
                    </a>
                </h1>

                <ul class="simpleHeader_navbar_links--LIST">
                    <li>
                        <a href="/current/{{ $currentUserCountry }}/{{ $currentUserCity }}"
                            class="simpleHeader_navbar--LINK md__fontSize">Current</a>
                    </li>
                    <li>
                        <a href="/hourly/{{ $currentUserCountry }}/{{ $currentUserCity }}"
                            class="simpleHeader_navbar--LINK md__fontSize">Hourly</a>
                    </li>
                    <li>
                        <a href="/daily/{{ $currentUserCountry }}/{{ $currentUserCity }}"
                            class="simpleHeader_navbar--LINK md__fontSize">Daily</a>
                    </li>
                    <li>
                        <a href="/weatherRadar" class="simpleHeader_navbar--LINK md__fontSize">Radar & Map</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="weatherLocation_search__recentLocations--BLOCK">
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
                        <div class="weather_locations_search--DROPDOWN-BLOCK-CONTENT">
                            <ul class="weather_locations_search--RESULTS-LIST">
                                <li>
                                    <a href="/current/{{ $currentUserCountry }}/{{ $currentUserCity }}"
                                        class="weather_locations_search--LIST-ITEM weather_locations_search--LIST-HEADER">
                                        <span class="weather_locations_search_results--ITEM-ICON-CONTAINER">
                                            <img src="{{ asset('assets/icons/location.png') }}" alt="location icon" />
                                        </span>
                                        <span class="weather_locations_search_results--ITEM-TYPO md__fontSize">use your
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

            @if (count($recentWatchedLocations))
                <div class="weather_location_recentLocations--BLOCK">
                    <div class="weather_location_recentLocations--CONTENT">
                        <span class="weather_location_recentLocations--HEADER sm__fontSize">RECENT LOCATIONS</span>

                        <div class="recent_locations--CONTAINER">
                            <div class="recent_locations--CONTAINER-CONTENT">
                                @foreach ($recentWatchedLocations as $recentWatchedLocation)
                                    <a href="/current/{{ $recentWatchedLocation['country'] }}/{{ $recentWatchedLocation['city'] }}"
                                        class="recent_location--CARD">
                                        <div class="recent_location_card--CONTENT">
                                            <div class="recent_location_card--HEADER">
                                                <h5 class="lg__fontSize">{{ $recentWatchedLocation['city'] }}</h5>
                                                <h6 class="sm__fontSize">{{ $recentWatchedLocation['country'] }}</h6>
                                            </div>
                                            <div class="recent_location_temperature--BLOCK">
                                                <div class="recent_location_temperature_icon--WRAPPER">

                                                </div>
                                                <span class="recent_location_temperature--EL xxlg__fontSize">
                                                    {{ (int) $recentWatchedLocation['temp'] }}°<mark
                                                        class="temperature_unit--EL md__fontSize">C</mark>
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </div>
</header>
