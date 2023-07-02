<div id="windy" class="windy_weatherForecast_radar--BLOCK">
    <input type="hidden" id="latitude" name="latitude" value="{{ $currentUserLatitude }}" />
    <input type="hidden" id="longitude" name="longitude" value="{{ $currentUserLongitude }}" />
</div>

<script>
    const latitude = (document.querySelector("#windy #latitude"))?.value;
    const longitude = (document.querySelector("#windy #longitude"))?.value;

    const options = {
        // Required: API key
        key: 'UlArFRNLc1iLvTu6Agkhu2RHB8RabyeM', // REPLACE WITH YOUR KEY !!!

        // Put additional console output
        verbose: true,

        // Optional: Initial state of the map
        lat: latitude,
        lon: longitude,
        zoom: 3,
    };

    // Initialize Windy API
    windyInit(options)
</script>
