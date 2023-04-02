/*
 * The document ready function which runs automatically after the HTML page is loaded.
 */

// Get the search button and input field
const searchButton = document.getElementById('search-button');
const searchInput = document.getElementById('search-input');

// Add event listener to search button
searchButton.addEventListener('click', () => {
    // Get the search term entered by the user
    const searchTerm = searchInput.value;

    // Send the search term to the server using AJAX
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `search.php?term=${searchTerm}`, true);
    xhr.onload = function() {
        if (this.status === 200) {
            // Update the container with the search results
            const container = document.getElementById('story-container');
            container.innerHTML = this.responseText;
        }
    }
    xhr.send();
});



$(function () {
    //set up the click handler of the search button.
    // $("#searchButton").click(function () {
    //     searchFoundItems();
    // }

    $("#keyword").keyup(function () {
        searchFoundItems();
    }
    
    );

    //populate the table after the page is loaded.
    searchFoundItems();
} //end document ready function
);


/*
 *Function to handle search button.
 */
function searchFoundItems() {
    var keyword = $("#keyword").val();    //get value of keyword text field
    populateTable(keyword);             //populate table
} //end function

/*
Function to populate table using Ajax.
 */
function populateTable(keyword) {
    var url = "experience_json.php";              //request URL
    var data = { "keyword": keyword };   //request parameters as a map

    //send Ajax request
    $.getJSON(url,
        data,
        function (result) {
            $("#stories tbody").empty();   //remove all children first
            for (var index in result)       //iterate through the reply (in JSON)
            {
                var found = result[index];      //get a single found items from result array
                var htmlCode = "<tr>";          //compose HTML of a row
                // htmlCode += "<td>" + found["title"] + "</td>";   //compose cells
                htmlCode += "<td><a href='" + found["url"] + "'>" + found["title"] + "</a></td>"; //compose cells

                htmlCode += "<td>" + found["location"] + "</td>";
                htmlCode += "<td>" + found["category"] + "</td>";
                htmlCode += "<td>" + found["description"] + "</td>";
                // htmlCode += "<td>" + found["image"] + "</td>";
                htmlCode += "<td><img id='target' height='150' width='150' src='" + found["image"] + "' /></td>";
                // htmlCode += "<td>" + found["item_type"] + "</td>";
                // htmlCode += "<td>" + found["item_color"] + "</td>";
                // htmlCode += "<td>" + found["item_description"] + "</td>";
                // htmlCode += "<td>" + found["date_lost"] + "</td>";
                // htmlCode += "<td>" + found["date_found"] + "</td>";
                htmlCode += "</tr>";
                $("#stories tbody").append(htmlCode);      //add a child to table body
            }
        } //end callback function
    ); //end function call
} //end function
