<?php

/**
 * Template Name: login
 */

get_header();
?>


<div class="container">
  <form method='POST' id="form-login" >

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
            url: 'http://192.168.1.5:3000/logged_in', // Replace with your API URL
            type: 'POST',
            dataType: 'json',
            data: JSON.stringify(dataToSend), // Convert to JSON format
            contentType: 'application/json',
            success: function(response) {
                // Handle the API response
                const jwtToken = response.token;
                
                // Set the token in the Authorization header for future requests
                $.ajaxSetup({
                    headers: {
                        'Authorization': 'Bearer ' + jwtToken
                    }
                });
                // alert("success");
                // alert(response.token);
                // Redirect to a protected page or perform other actions
                window.location.href = 'http://your-wordpress-site.com/dashboard'; // Replace with your desired URL
                // window.location.href = '<?php echo esc_url(home_url('/')); ?>'; 
            },
            error: function(xhr, status, err) {
                console.error('Error:', err);
                alert('Authentication failed. Please check your credentials.',err);
            }
        });
    });
});


</script>

<?php
get_footer();
?>









----------------------------------------



<?php

/**
 * Template Name: login
 */

get_header();
?>


<div class="container">
  <form method='POST' id="form-login" >

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
            url: 'http://192.168.1.5:3000/logged_in', // Replace with your API URL
            type: 'POST',
            dataType: 'json',
            data: JSON.stringify(dataToSend), // Convert to JSON format
            contentType: 'application/json',
            success: function(response) {
                // Handle the API response
                const jwtToken = response.token;

                setcookie('authToken', jwtToken, time() + 3600, '/', '', false, true);

                
                // Set the token in the Authorization header for future requests
               
                  jQuery(document).ready(function($) {
    // Check if the token cookie exists
    var tokenCookie = getCookie('authToken'); // Function to retrieve a cookie value

    

    if (tokenCookie) {
        // Send an AJAX request to verify the token
        $.ajax({
            url: 'https://example.com/verify-token', // Replace with your verification endpoint
            type: 'POST',
            headers: { 'Authorization': 'Bearer ' + tokenCookie },
            dataType: 'json',
            success: function(response) {
                if (response.valid) {
                    // Token is valid, redirect to the next page
                    window.location.href = 'https://example.com/next-page'; // Replace with the destination URL
                } else {
                    // Token is invalid, handle accordingly (e.g., redirect to login or show an error)
                    window.location.href = 'https://example.com/login'; // Redirect to login page
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                // Handle the error, e.g., show an error message
            }
        });
    } else {
        // Token cookie is not found, handle accordingly (e.g., redirect to login or show an error)
        window.location.href = 'https://example.com/login'; // Redirect to login page
    }

    // Function to retrieve a cookie value by name
    function getCookie(name) {
        var value = "; " + document.cookie;
        var parts = value.split("; " + name + "=");
        if (parts.length == 2) return parts.pop().split(";").shift();
    }
})
               
                // alert("success");
                // alert(response.token);
                // Redirect to a protected page or perform other actions
                // window.location.href = 'http://your-wordpress-site.com/dashboard'; // Replace with your desired URL
               
            },
            error: function(xhr, status, err) {
                console.error('Error:', err);
                alert('Authentication failed. Please check your credentials.',err);
            }
        });
    });
});


</script>

<?php
get_footer();
?>