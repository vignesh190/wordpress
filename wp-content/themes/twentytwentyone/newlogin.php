<?php

/**
 * Template Name: login
 */

get_header();
?>


<div class="container">
  <form method='POST' id="form-login" action="/wp-content/themes/twentytwentyone/formdashboard.php">

    <div class="form-group">
      <label for="email">Email address:</label>
      <input type="email" class="form-control" placeholder="Enter email" id="login_email" name="email" required>
    </div>

    <div class="form-group">
      <label for="password">password:</label>
      <input type="password" class="form-control" placeholder="Enter password" id="login_password" name="password" required>
    </div>


    <button type="submit" name='insert' class="btn btn-primary" onclick="addCookie()">login</button>
  </form>
 <!-- <p></p> -->
</div>

<div id = "alertWindow" title = "Alert Box">
   </div>

  


<!-- <script src="/wp-content/themes/twentytwentyone/assets/js/form1.js"></script> -->

<script>
  jQuery(document).ready(function($) {
    $('#form-login').submit(function(e) {


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




    // Define the cookie name and value
    var cookieName = "token";
    var cookieValue = "token";

    // Set the cookie with an expiration date (e.g., one hour from now)
    var expirationDate = new Date();
    expirationDate.setHours(expirationDate.getHours() + 1);

    // Set the cookie
    $.cookie(cookieName, cookieValue, { expires: expirationDate, path: '/' });



              console.log({
                "jwtToken":jwtToken
              });

              verify(jwtToken);

          },
          error: function(xhr, status, err) {
            console.error('Error:', err);
            alert('Authentication failed. Please check your credentials.', err);
          }
        });
    });

    function verify(jwtToken){
          var headers = {
              'Authorization': jwtToken // Replace with your access token
              // 'Custom-Header': 'CustomHeaderValue' // Replace with any custom headers you need
            };

            // Set the token in the Authorization header for future requests
            $.ajax({
              url: 'http://192.168.1.2:3000/verify_token', // Replace with your API URL
              type: 'GET',
              headers: headers,
              dataType: 'json',
              contentType: 'application/json',


              success: function(response) {
                alert(response.message);



                window.location.href = 'http://localhost:8888/wordpress/formdashboard/';

              },
              error: function(xhr, status, err) {
                console.log({
                  xhr_1:xhr,
                  status_1:status,
                  err_1:err
                } );
                // alert('Api failed.', err);
              }

            });
    }
  });





</script>

<?php
get_footer();
?>