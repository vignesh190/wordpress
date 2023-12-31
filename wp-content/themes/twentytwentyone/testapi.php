<?php
/**
 * Template Name: user_dashboard_1
 */
get_header();
?>

<table id="apiDataTable">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
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
// Define API endpoints
const apiBaseUrl = 'http://192.168.1.2:3000';
const verifyTokenUrl = `${apiBaseUrl}/verify_token`;
const fetchUserListUrl = `${apiBaseUrl}/fetch_userlist`;
const updateUserUrl = `${apiBaseUrl}/update_userdata`;
const deleteUserUrl = `${apiBaseUrl}/delete_userdata`;

// Function to get the value of a cookie by its name
function getCookieValue(cookieName) {
    // ... Your existing code for retrieving the cookie value
}

// Function to make an AJAX GET request
function fetchData(url, headers, successCallback, errorCallback) {
    $.ajax({
        url: url,
        type: 'GET',
        headers: headers,
        dataType: 'json',
        contentType: 'application/json',
        success: successCallback,
        error: errorCallback
    });
}

// Function to create action buttons
function createActionButtons(itemId) {
    return `<button class="update-btn" data-id="${itemId}">Update</button>` +
           `<button class="delete-btn" data-id="${itemId}">Delete</button>`;
}

// Function to open the update modal and populate it with data
function openUpdateModal(data) {
    const modal = $('#updateModal');
    const form = $('#updateForm');

    $('#updateName').val(data.name);
    $('#updatePassword').val(data.password);
    modal.css('display', 'block');

    // Handle the form submission for updating data
    form.on('submit', function(event) {
        event.preventDefault();

        const updatedData = {
            name: $('#updateName').val(),
            password: $('#updatePassword').val()
        };

        // Send a PUT request to update the data
        $.ajax({
            url: updateUserUrl + '/' + data.email,
            method: 'PUT',
            dataType: 'json',
            data: updatedData,
            success: function() {
                alert('Data updated successfully.');
                modal.css('display', 'none');
                location.reload(); // Refresh the page
            },
            error: function() {
                alert('Failed to update data.');
            }
        });
    });
}

$(document).ready(function() {
    const cookieNameToRetrieve = "token";
    const cookieValue = getCookieValue(cookieNameToRetrieve);

    if (cookieValue) {
        const headers = {
            'Authorization': cookieValue
        };

        // Verify the token
        fetchData(verifyTokenUrl, headers, function(response) {
            console.log('Token verification successful');
            // Fetch user data and populate the table
            fetchData(fetchUserListUrl, headers, function(data) {
                const tableBody = $('#apiDataTable tbody');

                data.message.forEach(item => {
                    const row = '<tr>' +
                        `<td>${item.name}</td>` +
                        `<td>${item.email}</td>` +
                        `<td>${createActionButtons(item.email)}</td>` +
                        '</tr>';
                    tableBody.append(row);
                });

                // Add event handlers for update and delete buttons
                $('.update-btn').on('click', function() {
                    const itemId = $(this).data('id');
                    const user = data.message.find(item => item.email === itemId);
                    openUpdateModal(user);
                });

                $('.delete-btn').on('click', function() {
                    const itemId = $(this).data('id');
                    // Implement the delete logic
                    if (confirm('Are you sure you want to delete this item?')) {
                        // Send a DELETE request to remove the user
                        $.ajax({
                            url: deleteUserUrl + '/' + itemId,
                            method: 'DELETE',
                            success: function() {
                                alert('Item deleted successfully.');
                                location.reload();
                            },
                            error: function() {
                                alert('Failed to delete the item.');
                            }
                        });
                    }
                });
            }, function() {
                console.log('Failed to fetch user data from the API.');
            });
        }, function(xhr, status, err) {
            console.error('Token verification error:', err);
            alert('Logged out');
            window.location.href = 'http://localhost:8888/wordpress/log-in/';
        });
    } else {
        console.log('Cookie not found or has expired.');
    }
});
</script>
