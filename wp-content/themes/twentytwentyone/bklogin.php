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
        e.preventDefault();

        // Prevent the form from submitting traditionally

        // Get the email and password from the form
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
            data: dataToSend, // Convert to JSON format
            contentType: 'application/json',
            success: function(response) {
              // Handle the API response
              const jwtToken = response.token;

              // console.log(jwtToken);


//               function checkCookie() {
//   let username = getCookie(jwtToken);
//   // console.log(username);
//   if (username != "") {
//    alert("Welcome again " + response.email);
//   } else {
//     username = prompt("Please enter your name:", "");
//     if (username != "" && username != null) {
//       setCookie("username", username, 365);
//     }
//   }
// }



            // let addCookie=()=>{
            // $.cookie("geeksforgeeks", 
            // "It is the data of the cookie");
            // $("p").text("cookie added");
            // }
            
      


// document.cookie = "dinesh";

document.cookie = "username=John Doe";

console.log(document.cookie);

              


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

      //           $(function () {
      //    $("#alertWindow").dialog();
      // });

                // window.location.href = 'http://localhost:8888/wordpress/formdashboard/';

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