/*
 * The document ready function which runs automatically after the HTML page is loaded.
 */
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

//on edit click button listener
$(document).on('click', '.edit-btn', function() {
    var storyId = $(this).data('storyid');
    window.location.href = 'edit.php?storyid=' + storyId;
  });


//delete function
function deleteEntry(storyId) {
    $.ajax({
        url: "delete.php",
        method: "POST",
        data: { story_id: storyId },
        success: function (response) {
            // Handle the response from the server
            // For example, you can remove the row from the table:
            $('#experiencetable').find('tr[data-storyid="' + storyId + '"]').remove();
        },
        error: function () {
            alert("Failed to delete entry");
        }
    });
}


function deleteEntry(storyId) {
    $.ajax({
        url: "delete.php",
        method: "POST",
        data: { story_id: storyId },
        success: function (response) {
            // Handle the response from the server
            // For example, you can remove the row from the table:
            $('#experiencetable').find('tr[data-storyid="' + storyId + '"]').remove();
            //refresh the page to update the content
            location.reload();
        },
        error: function () {
            alert("Failed to delete entry");
        }
    });
}

function viewEntry(storyId) {
    $.ajax({
        url: "readstory.php",
        method: "POST",
        data: { story_id: storyId },
        success: function (response) {
            // Handle the response from the server
            // For example, you can remove the row from the table:
            $('#experiencetable').find('tr[data-storyid="' + storyId + '"]').remove();
            //refresh the page to update the content
            location.reload();
        },
        error: function () {
            alert("Failed to delete entry");
        }
    });
}


function editEntry(storyId) {
    $.ajax({
        url: "edit.php",
        method: "POST",
        data: { story_id: storyId },
        success: function (response) {
            // Handle the response from the server
            // For example, you can remove the row from the table:
            $('#experiencetable').find('tr[data-storyid="' + storyId + '"]').remove();
            //refresh the page to update the content
            location.reload();
        },
        error: function () {
            alert("Failed to delete entry");
        }
    });
}

// Loop through the data and append rows to the table
for (var i = 0; i < data.length; i++) {
    var found = data[i];
    var row = $("<tr data-storyid='" + found["story_id"] + "'></tr>");
    row.append("<td>" + found["item_name"] + "</td>");
    row.append("<td>" + found["item_description"] + "</td>");
    row.append("<td>" + found["item_quantity"] + "</td>");
    row.append("<td>" + found["item_price"] + "</td>");
    row.append("<td>" + "<button class='btn btn-primary edit-btn' type='button' data-storyid='" + found["story_id"] + "'>Edit</button>" + "</td>");
    $('#experiencetable').append(row);
  }
  
  // Handle the click event for the Edit button
  $(document).on("click", ".edit-btn", function() {
    var storyId = $(this).data("storyid");
    $.ajax({
      url: "edit.php",
      method: "POST",
      data: { story_id: storyId },
      success: function(response) {
        // Handle the response from the server
        // For example, you can display a form with the fields to edit the entry
        $('#edit-form').html(response);
        // Show the form
        $('#edit-modal').modal('show');
      },
      error: function() {
        alert("Failed to load edit form");
      }
    });
  });


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
    var url = "my_profile_json.php";              //request URL
    var data = { "keyword": keyword };   //request parameters as a map

    //send Ajax request
    $.getJSON(url,
        data,
        function (result) {
            $("#my_profile tbody").empty();   //remove all children first
            for (var index in result)       //iterate through the reply (in JSON)
            {
                var found = result[index];
                // var storyid = found["story_id"];                     //get a single found items from result array
                var htmlCode = "<tr>";                        //compose HTML of a row
                htmlCode += "<td>" + found["story_id"] + "</td>";   //compose cells
                // htmlCode += "<td>" + found["title"] + "</td>";
                htmlCode += "<td><a class='col-md-12' href='readstory.php?story_id=" + found["story_id"] + "'>" + found["title"] + "</a></td>";

                
                htmlCode += "<td>" + found["location"] + "</td>";
                htmlCode += "<td>" + found["description"] + "</td>";
                htmlCode += "<td>" + found["category"] + "</td>";
                htmlCode += "<td>" + found["userid"] + "</td>";
                htmlCode += "<td>" + found["date_added"] + "</td>";

                htmlCode += "<td>" + "<button  class='btn btn-primary edit-btn col-md-12' type='button' data-storyid='" + found["story_id"] + "'>Edit Story</button></td>";

                htmlCode += "<td>" + "<button class='btn btn btn-danger col-md-12' type='button' onclick='deleteEntry(" + found["story_id"] + ")'>Delete Story</button></td>";

                //Reference  https://www.phpzag.com/build-content-management-system-with-php-mysql/

                // htmlCode += "<td><button class='btn btn-primary edit-btn col-md-12' type='button' data-storyid='" + found["story_id"] + "'>Edit</button></td>";



                htmlCode += "<td><img id='target' height='100' width='100' src='" + found["image"] + "' /></td>";
                htmlCode += "</tr>";
                $("#my_profile tbody").append(htmlCode);      //add a child to table body
            }
        } //end callback function
    ); //end function call
} //end function

