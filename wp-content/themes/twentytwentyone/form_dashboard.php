<?php

/**
 * Template Name: user_dashboard
 */

get_header();
?>
<div id="logout">
<button  id="logoutButton"  >Log Out</button>
</div>

<p id="demo"></p>
<table id="apiDataTable">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th> <!-- New column for update and delete buttons -->
        </tr>
    </thead>
    <tbody>
        <!-- Data from the API will be inserted here -->
    </tbody>
</table>

<!-- Update modal -->
<div id="updateModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <form id="updateForm">
            <input type="text" id="updateName" name="name" placeholder="Name">
            <input type="password" id="updatePassword" name="password" placeholder="Password">
            <button type="submit" id="submitUpdate">Update</button>
        </form>
    </div>
</div>
<button id="openUpdateModal" style="display:none;">Open Update Modal</button>


<script>
// import swal from 'sweetalert';

// Function to get the value of a cookie by its name
function getCookieValue(cookieName) {
    var name = cookieName + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var cookieArray = decodedCookie.split(';');
    for (var i = 0; i < cookieArray.length; i++) {
        var cookie = cookieArray[i];
        while (cookie.charAt(0) === ' ') {
            cookie = cookie.substring(1);
        }
        if (cookie.indexOf(name) === 0) {
            return cookie.substring(name.length, cookie.length);
        }
    }
    return "";
}

// Specify the name of the cookie you want to retrieve
var cookieNameToRetrieve = "token";

// Get the value of the specified cookie
var cookieValue = getCookieValue(cookieNameToRetrieve);

var cookietoretrieveemail = "user_email";

var cookieValue_email = getCookieValue(cookietoretrieveemail);

document.getElementById("demo").innerHTML = "welcome"+" "+cookieValue_email ;

console.log(cookieValue_email);

// Use the cookie value as needed
if (cookieValue !== "") {
    console.log("Cookie Value: " + cookieValue);
    // Do something with the cookie value here

    jQuery(document).ready(function($) {
        var headers = {
              'Authorization': cookieValue // Replace with your access token
              // 'Custom-Header': 'CustomHeaderValue' // Replace with any custom headers you need
            };

            function verifyToken() {
    return new Promise(function(resolve, reject) {
        $.ajax({
            url: 'http://192.168.1.2:3000/verify_token',
            type: 'GET',
            headers: headers,
            dataType: 'json',
            contentType: 'application/json',
            success: function(response) {
                // API call was successful
                resolve(true);
            },
            error: function(xhr, status, err) {
                // API call failed
                console.error('Error:', err);
                reject(false);
                alert("please login");
                window.location.href = 'http://localhost:8888/wordpress/log-in/';
            }
        });
    });
}

verifyToken()
    .then(function(success) {
        if (success) {
            // The API call was successful (true)
            console.log('Token verification succeeded');
                var apiUrl = 'http://192.168.1.2:3000/fetch_userlist';

// Function to create the action buttons
function createActionButtons(itemId) {
    return '<button class="" data-id="' + itemId + '">Update</button>' +
           '<button class="" data-id="' + itemId + '">Delete</button>';
}

// Make an AJAX request to fetch the data
$.ajax({
    url: apiUrl,
    method: 'GET',
    dataType: 'json',
    success: function(data) {
        var tableBody = $('#apiDataTable tbody');

        $.each(data.message, function(index, item) {
            var row = '<tr>' +
                '<td>' + item.name + '</td>' +
                '<td>' + item.email + '</td>' +
                '<td>' + createActionButtons(item.email) + '</td>' +
                '</tr>';
            tableBody.append(row);
        })

        // Add event handlers for update and delete buttons
        $('.update-btn').on('click', function() {

            verifyToken()
    .then(function(success) {
        if (success) {

            var itemId = $(this).data('id');

            // jQuery(document).ready(function($) {
// URL of the API you want to fetch data from and update data
var apiUrl1 = 'http://192.168.1.2:3000/update_userdata';

// Function to open the update modal and populate it with data
function openUpdateModal(itemId) {
    var modal = $('#updateModal');
    var form = $('#updateForm');

console.log(data);
    $('#updateName').val(data.message.name);
            $('#updatePassword').val(data.message.password);
            modal.css('display', 'block');

    // Handle the form submission for updating data
    form.on('submit', function(event) {
        event.preventDefault();

        var updatedData = {
            name: $('#updateName').val(),
            password: $('#updatePassword').val()
            // Add more fields as needed
        };

        // Send a PUT or PATCH request to update the data
        $.ajax({
            url: apiUrl1 + '/' + itemId,
            method: 'PUT', // or 'PATCH' depending on your API
            dataType: 'json',
            data: updatedData,
            success: function() {
                alert('Data updated successfully.');
                modal.css('display', 'none');
                window.location.href = 'http://localhost:8888/wordpress/user-dashboard/';
                // You may want to refresh the table or update the row with the updated data
            },
            error: function() {
                alert('Failed to update data.');
            }
        });
    });

    
}


// Event listener for the update button
$('.update-btn').on('click', function() {
    var itemId = $(this).data('id');
    openUpdateModal(itemId);
});

// Close the update modal when the user clicks the close button (X)
$('.close').on('click', function() {
    $('#updateModal').css('display', 'none');
});

} else {
            // The API call failed (false)
            console.log('Token verification failed');
            // Handle the error here
        }
    });

        });

        $('.delete-btn').on('click', function() {

            var itemId = $(this).data('id');

            verifyToken()
    .then(function(success) {
        if (success) {

            // Implement the delete logic using the API
            if (confirm('Are you sure you want to delete this item?')) {
                console.log(itemId);
                $.ajax({
                    url: 'http://192.168.1.2:3000/delete_userdata'+ '/' + itemId,
                    method: 'DELETE',
                    success: function() {
                        // Remove the row from the table on successful deletion
                        $(this).closest('tr').remove();
//                         var delete_cookie = function(name) {
//     document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
// };
// delete_cookie('token');
                        alert('Item deleted successfully.');
                        
                        window.location.href = 'http://localhost:8888/wordpress/user-dashboard/'; 
                        // delete_cookie('token');
                    },
                    error: function() {
                        alert('Failed to delete the item.');
                    }
                });
            }


        } else {
            // The API call failed (false)
            console.log('Token verification failed');
            // Handle the error here
        }
    });
        });
    },
    error: function() {
        console.log('Failed to fetch data from the API.');
        
    }
});
            } else {
            // The API call failed (false)
            console.log('Token verification failed');
            window.location.href = 'http://localhost:8888/wordpress/log-in/';
            // Handle the error here
        }
    });
  });

} else {
    console.log("Cookie not found or has expired.");
    alert("please login");
    window.location.href = 'http://localhost:8888/wordpress/log-in/';
}


function deleteCookie_email(cookieName_email) {

    document.cookie = cookieName_email + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";

}

function deleteCookie(cookieName) {

    if (confirm('Are you sure you want to logout?')) {
        document.cookie = cookieName + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        deleteCookie_email('user_email');
        window.location.href = 'http://localhost:8888/wordpress/log-in/';
        
    }
    
}

// Example: Delete a cookie named "token" when the "Logout" button is clicked
document.getElementById('logoutButton').addEventListener('click', function() {
    deleteCookie('token');
    // Optionally, you can redirect the user to a logout page or another location.
    // window.location.href = '/logout'; 
    
});



</script>