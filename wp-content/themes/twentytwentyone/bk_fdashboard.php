<?php

/**
 * Template Name: fdashboard
 */

get_header();
?>


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





<script>


console.log(document.cookie);
jQuery(document).ready(function($) {
    // URL of the API you want to fetch data from
    var apiUrl = 'http://192.168.1.2:3000/fetch_userlist';

    // Function to create the action buttons
    function createActionButtons(itemId) {
        return '<button class="update-btn" data-id="' + itemId + '">Update</button>' +
               '<button class="delete-btn" data-id="' + itemId + '">Delete</button>';
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

            // // Add event handlers for update and delete buttons
            // $('.update-btn').on('click', function() {
            //     var itemId = $(this).data('ddkdmo');
            //     // Implement the update logic using the API
            //     // You can open a modal or use a form for updating data.
            // });

            $('.delete-btn').on('click', function() {
                var itemId = $(this).data('id');

                // Implement the delete logic using the API
                if (confirm('Are you sure you want to delete this item?')) {
                    $.ajax({
                        url: 'http://192.168.1.2:3000/delete_userdata'+ '/' + itemId,
                        method: 'DELETE',
                        success: function() {
                            // Remove the row from the table on successful deletion
                            $(this).closest('tr').remove();
                            alert('Item deleted successfully.');
                            window.location.href = 'http://localhost:8888/wordpress/fdashboard/'; 
                        },
                        error: function() {
                            alert('Failed to delete the item.');
                        }
                    });
                }
            });
        },
        error: function() {
            console.log('Failed to fetch data from the API.');
        }
    });
});


</script>