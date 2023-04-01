import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import axios from "axios";
import.meta.glob(["../img/**"]);

/* AUTOCOMPLETE ***********************************************************/

/* search text */
const SearchImput_Element = document.getElementById("search_input");
console.log(SearchImput_Element);
/* options li to chose*/
const suggestions_List = document.querySelectorAll(".suggestion-list-items");
console.log(suggestions_List);

const latitude_Element = document.getElementById("lat");
const longitude_Element = document.getElementById("lon");

//resp.data.result di getSuggestion
let suggestionAddressList = [];

SearchImput_Element.addEventListener("input", getSuggestions);
suggestions_List.forEach((suggestion_Element) => {
    suggestion_Element.addEventListener("click", selectSuggestion);
});

function getSuggestions(e) {
    latitude_Element.value = null;
    longitude_Element.value = null;

    console.log("IMPUT- getSuggestions");
    /* valore */

    let querySearchText = e.target.value;
    console.log(querySearchText);

    if (e.target.value.length > 0) {
        console.log("parte chiamata axios");
        /*    lAYuyhutioeCVRvHVSZgBC8wf8CPcO0E */

        let queryURL =
            "https://api.tomtom.com/search/2/geocode/" +
            querySearchText +
            ".json?storeResult=false&limit=5&countrySet=IT&view=Unified&key=lAYuyhutioeCVRvHVSZgBC8wf8CPcO0E";

        console.log(queryURL);
        // problema di cors qua vado a fantasia
        axios
            .get(queryURL)
            .then((resp) => {
                console.log(resp);
                suggestionAddressList = resp.data.results;
                console.log("AXIOS OK resp=", suggestionAddressList);

                suggestions_List.forEach(function callback(
                    listItem_Element,
                    index
                ) {
                    //per ogni li in ul "suggestions_list innero i dati se esistenti e rendo visibile"
                    if (suggestionAddressList[index]) {
                        listItem_Element.classList.remove("d-none");
                        listItem_Element.innerHTML =
                            suggestionAddressList[index].address
                                .freeformAddress +
                            ", " +
                            suggestionAddressList[index].address.country;
                    } else {
                        listItem_Element.classList.add("d-none");
                    }
                });
            })
            .then(function (resp) {
                console.log(resp);
            })
            .catch((error) => {
                console.log(error);
            });
    }
}

function selectSuggestion(e) {
    console.log("CLICK- selectSuggestions");
    console.log(e.target);
    console.log(e.target.innerText);
    SearchImput_Element.value = e.target.innerText;
    suggestionAddressList.forEach((suggestion) => {
        if (
            suggestion.address.freeformAddress +
                ", " +
                suggestion.address.country ===
            SearchImput_Element.value
        ) {
            console.log("scelta=", suggestion);
            latitude_Element.value = suggestion.position.lat;
            longitude_Element.value = suggestion.position.lon;
            console.log(latitude_Element, longitude_Element);
        }
        suggestionAddressList = [];

        suggestions_List.forEach((listItem_Element) => {
            listItem_Element.innerText = "";
            listItem_Element.classList.add("d-none");
        });
    });
    /*   selectded_Element.value = e.target.innerText; */
}
function createElementFromObject(tagEl, classes) {
    const created_El = document.createElement(tagEl);
    created_El.classList.add(...classes);
    return created_El;
}
