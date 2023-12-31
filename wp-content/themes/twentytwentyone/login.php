<?php

/**
 * Template Name: loginform
 */

get_header();
?>


<div class="container">
  <form method='POST'  id="form-login">

    <div class="form-group">
      <label for="email">Email address:</label>
      <input type="email" class="form-control" placeholder="Enter email" id="login_email" name="email" required>
    </div>

    <div class="form-group">
      <label for="password">password:</label>
      <input type="password" class="form-control" placeholder="Enter password" id="login_password" name="password" required>
    </div>

    <button type="submit" name='insert' class="btn btn-primary">login</button>
  </form>

</div>

<!-- <div id = "alertWindow" title = "Alert Box">
   </div> -->


<!-- <script src="/wp-content/themes/twentytwentyone/assets/js/form1.js"></script> -->

<script>
  jQuery(document).ready(function($) {
    $('#form-login').submit(function(e) {
        // e.preventDefault();

        const dataToSend = {

          email: $('#login_email').val(),
          password: $('#login_password').val()
        };


        console.log(dataToSend);
        console.log('Form submitted');


        // Send a POST request to your API endpoint
        $.ajax({
            url: 'http://192.168.1.2:3000/logged_in', // Replace with your API URL
            type: 'POST',
            dataType: 'json',
            data: JSON.stringify(dataToSend), // Convert to JSON format
            contentType: 'application/json',
            success: function(response) {
              // Handle the API response
              const jwtToken = response.token;

              const user_email=response.email;

              console.log(user_email);

    // Define the cookie name and value
    var cookieName = "token";
    var cookieValue = jwtToken;

    // Set the cookie with an expiration date (e.g., one hour from now)
    var expirationDate = new Date();
    expirationDate.setHours(expirationDate.getHours() + 1);
    // Create the cookie string
    var cookieString = cookieName + "=" + cookieValue + "; expires=" + expirationDate.toUTCString() + "; path=/";

    // Set the cookie
    document.cookie = cookieString;

    var cookieName_email = "user_email";
    var cookieValue_email = user_email;


    // // Create the cookie string
    var cookieString_email = cookieName_email + "=" + cookieValue_email + "; expires=" + expirationDate.toUTCString() + "; path=/";

    // // Set the cookie
    document.cookie = cookieString_email;

            var headers = {
              'Authorization': jwtToken // Replace with your access token
              // 'Custom-Header': 'CustomHeaderValue' // Replace with any custom headers you need
            };

            // alart(headers);

            // Set the token in the Authorization header for future requests
            $.ajax({
              url: 'http://192.168.1.2:3000/verify_token', // Replace with your API URL
              type: 'GET',
              headers: headers,
              dataType: 'json',
              contentType: 'application/json',


              success: function(response) {
                alert(response.message);

                window.location.href = 'http://localhost:8888/wordpress/user-dashboard/';
                

              },
              error: function(xhr, status, err) {
                console.error('Error:', err);
                alert('Api failed.', err);
                alert(response.message);
              }

            });

          },
          error: function(xhr, status, err) {
            console.error('Error:', err);
            alert('Authentication failed. Please check your credentials.', err);
          }
        });
    });
  });
</script>

<?php
get_footer();
?>