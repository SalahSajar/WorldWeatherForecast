const env = {
    WEATHERAPI_API_KEY: "73c7a769848e4ff0b6d144601200411",
}

const locationSearch__BLOCK = document.querySelector("#weather_location_search--BLOCK");
const locationsSearch__DROPDOWN_BLOCK = document.querySelector("#weather_locations_search--DROPDOWN-BLOCK");
const locationSearch__INPUT = document.querySelector("#weather_location_search--INPUT");
const locations_search_options__CONTAINER = document.querySelector("#locations_search_options--CONTAINER");
let timeoutId;

const openLocationSearch_dropdown__HANDLER = () => {
    locationsSearch__DROPDOWN_BLOCK.dataset.visible = true;
}

const displayLocationsSearchResults__HANDLER = (data) => {
    locations_search_options__CONTAINER.innerHTML = "";

    if(data.length){
        data.forEach(locationSearchResult => {
            const location_option__LI = document.createElement("li");
    
            const location_option__A_LINK = document.createElement("a");
            location_option__A_LINK.className = `weather_locations_search--LIST-ITEM`;
            location_option__A_LINK.href = `/current/${locationSearchResult.country}/${locationSearchResult.name}`;
            
            const location_option__SPAN = document.createElement("span");
            location_option__SPAN.className = "weather_locations_search_results--ITEM-TYPO md__fontSize";
            location_option__SPAN.innerText = `${locationSearchResult.country}, ${locationSearchResult.name}`;
    
            location_option__LI.appendChild(location_option__A_LINK);
            location_option__A_LINK.appendChild(location_option__SPAN);
    
            locations_search_options__CONTAINER.appendChild(location_option__LI);
        });
    }
}

const fetchSearchedCountries__HANDLER = async (query)=>{
    const res = await fetch(`http://api.weatherapi.com/v1/search.json?key=${env.WEATHERAPI_API_KEY}&q=${query}`);

    const data = await res.json();

    displayLocationsSearchResults__HANDLER(data);
}

locationSearch__INPUT?.addEventListener("keyup", async (evt) => {
    const locationSearchInput__VALUE = evt.currentTarget.value;

    clearTimeout(timeoutId);

    timeoutId = setTimeout(function() {
        if(locationSearchInput__VALUE.length){
            fetchSearchedCountries__HANDLER(locationSearchInput__VALUE);
        }
    }, 500);
});

document.addEventListener("click" , evt => {
    const clicked_elm = evt.target;

    if(!locationSearch__BLOCK.contains(clicked_elm)){
        locationsSearch__DROPDOWN_BLOCK.dataset.visible = false;
    }
})
