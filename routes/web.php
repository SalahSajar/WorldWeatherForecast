<?php

use Illuminate\Http\Request;
use Illuminate\Http\Client\Pool;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
// use Stevebauman\Location\Facades\Location;

use Illuminate\Support\Carbon;



$saved_recentLocations__MANAGER = function($template_available_data) {
    $currentLocation_latitude = $template_available_data["latitude"];
    $currentLocation_longitude = $template_available_data["longitude"];
    $currentLocation_country = $template_available_data["country"];
    $currentLocation_city = $template_available_data["city"];
    $currentLocation_weatherIcon = $template_available_data["weather_icon"];
    $currentLocation_temp = $template_available_data["temp"];
    
    if(!session()->exists("recent_locations__LIST") || !is_array(session("recent_locations__LIST"))){
        session(["recent_locations__LIST" => []]);
    }
    
    $recent_locations__LIST = session("recent_locations__LIST");

    $savedLocation = array_filter($recent_locations__LIST , function($recent_location) use ($currentLocation_latitude, $currentLocation_longitude,$currentLocation_country,$currentLocation_city){
        if(($recent_location["lat"] == $currentLocation_latitude && $recent_location["lon"] == $currentLocation_longitude) || 
            (strtolower($recent_location["country"]) == strtolower($currentLocation_country) && strtolower($recent_location["city"]) == strtolower($currentLocation_city))){
            return $recent_location;
        }
    });


    if(count($savedLocation) > 0){
        $updated_savedLocations__LIST = array_map(function ($recent_location) use ($currentLocation_temp, $currentLocation_latitude, $currentLocation_longitude, $currentLocation_country, $currentLocation_city){
            if(($recent_location["lat"] == $currentLocation_latitude && $recent_location["lon"] == $currentLocation_longitude) || 
                (strtolower($recent_location["country"]) == strtolower($currentLocation_country) && strtolower($recent_location["city"]) == strtolower($currentLocation_city))){
                
                $recent_location["temp"] = $currentLocation_temp;
            }
            return $recent_location;
        }, session("recent_locations__LIST"));

        session(["recent_locations__LIST"=>$updated_savedLocations__LIST]);
    } else{

        $saved_location_obj = [
            "lat"=>$currentLocation_latitude,
            "lon"=>$currentLocation_longitude,
            "country"=>$currentLocation_country,
            "city"=>$currentLocation_city,
            "temp"=>$currentLocation_temp,
            "weather_icon"=>$currentLocation_weatherIcon
        ];

        $recent_locations__LIST = session("recent_locations__LIST");

        $recent_locations__LIST[] = $saved_location_obj;

        if(count($recent_locations__LIST) > 4) array_shift($recent_locations__LIST);

        session(["recent_locations__LIST" => $recent_locations__LIST]);
    }

    return session("recent_locations__LIST");
};

$currentUserLocation__HANDLER = function ($request){
    $currentUser__IpAddr = $request->ip() == "::1" ? '162.159.24.227' : $request->ip();

    $ip = $request->ip();

    $currentUserLocation__REQ = Http::get("http://ip-api.com/json/{$currentUser__IpAddr}");

    $currentUserLocation__INFOS = $currentUserLocation__REQ->json();

    return $currentUserLocation__INFOS;
};



Route::get('/', function (Request $request) use ($currentUserLocation__HANDLER) {
    $OPENWEATHER_API_KEY = env('OPENWEATHER_API_KEY');
    
    $currentUserLocation = $currentUserLocation__HANDLER($request);

    if(!session()->exists("recent_locations__LIST") || !is_array(session("recent_locations__LIST"))){
        session(["recent_locations__LIST" => []]);
    }

    $template_available_data = [
        "currentUserCountry"=> $currentUserLocation["country"],
        "currentUserCity"=> $currentUserLocation["city"],
        "currentUserLatitude"=> $currentUserLocation["lat"],
        "currentUserLongitude"=> $currentUserLocation["lon"],
        "recentWatchedLocations"=>session("recent_locations__LIST")
    ];
    
    $currentLocation_forecast__REQUEST = Http::get("http://api.openweathermap.org/data/2.5/forecast?lat={$template_available_data['currentUserLatitude']}&lon={$template_available_data['currentUserLongitude']}&appid={$OPENWEATHER_API_KEY}&units=metric");
    $currentLocation_forecast__DATA = $currentLocation_forecast__REQUEST->json();

    $template_available_data["currentLocation_forecast"] = $currentLocation_forecast__DATA;

    return view('home', $template_available_data);
});



Route::get("/current/{country}/{city}", function($country, $city) use ($saved_recentLocations__MANAGER){
    $WEATHERAPI_API_KEY = env('WEATHERAPI_API_KEY');

    $Location_currentweatherANDastronomy_Requests = Http::pool(fn (Pool $pool)=> [
        $pool->as("currentWeather")->get("http://api.weatherapi.com/v1/current.json?key={$WEATHERAPI_API_KEY}&q={$city},{$country}"),
        $pool->as("currentAstronomy")->get("http://api.weatherapi.com/v1/astronomy.json?key={$WEATHERAPI_API_KEY}&q={$city},{$country}"),
    ]);

    $currentLocation_weatherANDastronomy = [
        "Location_currentWeather"=> [
            "ok"=>$Location_currentweatherANDastronomy_Requests["currentWeather"]->ok(),
            "data"=> $Location_currentweatherANDastronomy_Requests["currentWeather"]->json(),
        ],
        "Location_currentAstronomy"=> [
            "ok"=>$Location_currentweatherANDastronomy_Requests["currentAstronomy"]->ok(),
            "data"=> $Location_currentweatherANDastronomy_Requests["currentAstronomy"]->json(),
        ],
    ];

    
    $template_available_data = [
        "country"=>$currentLocation_weatherANDastronomy["Location_currentWeather"]['data']['location']['country'],
        "city"=>$currentLocation_weatherANDastronomy["Location_currentWeather"]['data']['location']['name'],
        "location_currentWeather"=>$currentLocation_weatherANDastronomy["Location_currentWeather"],
        "Location_currentAstronomy"=>$currentLocation_weatherANDastronomy["Location_currentAstronomy"],
        "currentUserLatitude"=>$currentLocation_weatherANDastronomy["Location_currentWeather"]['data']['location']['lat'],
        "currentUserLongitude"=>$currentLocation_weatherANDastronomy["Location_currentWeather"]['data']['location']['lon'],
    ];

    $template_available_data["recentWatchedLocations"] = $saved_recentLocations__MANAGER([
        "country" => $template_available_data["country"],
        "city" => $template_available_data["city"],
        "latitude"=>$template_available_data["currentUserLatitude"],
        "longitude"=>$template_available_data["currentUserLongitude"],
        "weather_icon"=>$template_available_data["location_currentWeather"]["data"]["current"]["condition"]["icon"],
        "temp"=>$template_available_data["location_currentWeather"]["data"]["current"]["temp_c"]
    ]);

    return view("current", $template_available_data);
});



Route::get("/hourly/{country}/{city}", function($country, $city) use ($saved_recentLocations__MANAGER){
    $WEATHERAPI_API_KEY = env('WEATHERAPI_API_KEY');

    $Location_weatherForecast_Request = Http::get("http://api.weatherapi.com/v1/forecast.json?key={$WEATHERAPI_API_KEY}&q={$city},{$country}");

    $location_weatherForecast = $Location_weatherForecast_Request->json();

    $location_hourlyForecast = $location_weatherForecast["forecast"]["forecastday"][0]["hour"];

    $currentDate = strtotime(Carbon::now());

    $location_futureHourlyForecast = array_filter($location_hourlyForecast, fn ($location_hourForecast) => ($location_hourForecast["time_epoch"] - $currentDate) >= 0 && $location_hourForecast);

    $template_available_data = [
        "country" => $location_weatherForecast["location"]["country"],
        "city" => $location_weatherForecast["location"]["name"],
        "weatherForecast_hours" => $location_futureHourlyForecast,
        "location_currentWeather"=> $location_weatherForecast["current"],
        "currentUserLatitude"=>$location_weatherForecast["location"]['lat'],
        "currentUserLongitude"=>$location_weatherForecast["location"]['lon'],
    ];

    $template_available_data["recentWatchedLocations"] = $saved_recentLocations__MANAGER([
        "country" => $template_available_data["country"],
        "city" => $template_available_data["city"],
        "latitude"=>$template_available_data["currentUserLatitude"],
        "longitude"=>$template_available_data["currentUserLongitude"],
        "weather_icon"=>$template_available_data["location_currentWeather"]["condition"]["icon"],
        "temp"=>$template_available_data["location_currentWeather"]["temp_c"]
    ]);

    return view("hourly", $template_available_data);
});



Route::get("/daily/{country}/{city}", function($country, $city) use ($saved_recentLocations__MANAGER){
    $WEATHERAPI_API_KEY = env('WEATHERAPI_API_KEY');

    $Location_weatherForecast_Request = Http::get("http://api.weatherapi.com/v1/forecast.json?key={$WEATHERAPI_API_KEY}&q={$city},{$country}&days=3");

    $location_weatherForecast = $Location_weatherForecast_Request->json();

    $location_weatherForecast_days = $location_weatherForecast["forecast"]["forecastday"];


    $template_available_data = [
        "country" => $country,
        "city" => $city,
        "weatherForecast_days" => $location_weatherForecast_days,
        "location_currentWeather" => $location_weatherForecast["current"],
        "currentUserLatitude"=>$location_weatherForecast["location"]["lat"],
        "currentUserLongitude"=>$location_weatherForecast["location"]["lon"],
    ];

    $template_available_data["recentWatchedLocations"] = $saved_recentLocations__MANAGER([
        "country" => $template_available_data["country"],
        "city" => $template_available_data["city"],
        "latitude"=>$template_available_data["currentUserLatitude"],
        "longitude"=>$template_available_data["currentUserLongitude"],
        "weather_icon"=>$template_available_data["location_currentWeather"]["condition"]["icon"],
        "temp"=>$template_available_data["location_currentWeather"]["temp_c"]
    ]);

    return view("daily", $template_available_data);
});


Route::get("/weatherRadar", function(Request $request) use ($currentUserLocation__HANDLER) {
    // $currentUser__IpAddr = $request->ip() == "::1" ? '162.159.24.227' : $request->ip();
    
    $currentUserLocation = $currentUserLocation__HANDLER($request);

    $latitude = $currentUserLocation["lat"];
    $longitude = $currentUserLocation["lon"];

    $template_available_data = [
        "country" => $currentUserLocation["country"],
        "city" => $currentUserLocation["city"],
        "latitude" => $currentUserLocation["lat"],
        "longitude" => $currentUserLocation["lon"],
    ];
    return view("radar", $template_available_data);
});