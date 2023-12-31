<?php

/**
 * Template Name: form
 */

get_header();
?>


<div class="container">
  <form method='POST'>

    <div class="form-group">
      <label for="pwd">Name:</label>
      <input type="text" class="form-control" placeholder="Enter Name" name="names" required>
    </div>

    <div class="form-group">
      <label for="email">Email address:</label>
      <input type="email" class="form-control" placeholder="Enter email" name="email" required>
    </div>

    <div class="form-group">
      <label for="password">password:</label>
      <input type="password" class="form-control" placeholder="Enter password" name="password" required>
    </div>

    <div class="form-group">
      <label for="password">re-enter password:</label>
      <input type="password" class="form-control" placeholder="Enter password" name="re_enter_password" required>
    </div>
    <button type="submit" name='insert' class="btn btn-primary">Submit</button>
  </form>

</div>

<script>
  // const express = require("express");
  // const app = express(); 
  // const cors = reruire("cors");

  // app.use(cors());
jQuery(document).ready(function($) {
    // Make an AJAX request to fetch data from the API
    $.ajax({
        url: 'http://192.168.1.3:3000/fetch_userlist',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            // Process the API data and display it on the page
            if (data) {

              var apiresult = JSON.parse(JSON.stringify(data));
              console.log(apiresult[0]);
                // Replace '#api-data-container' with the HTML element where you want to display the data
                // var apiresult = JSON.parse(JSON.stringify(data));
               $('#api-data-container').html('API Data: ' + apiresult[0].name);
            } else {
                $('#api-data-container').html('No data available.');
            }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching API data:', error);
            $('#api-data-container').html('Error fetching API data.');
        }
    });
});
</script>

<div id="api-data-container"></div>




<?php

// if clicked on submit buton
if (isset($_POST['insert'])) {

  global $wpdb;

  // get all form fields value store in php values
  $email = $_POST['email'];
  $name = $_POST['names'];
  $password = $_POST['password'];
  $re_enter_password = $_POST['re_enter_password'];

  if ($password != $re_enter_password) {
    echo '<script> alert("password miss match") </script>';
  } else {
    $querystr = "SELECT COUNT(*) FROM `wordpress_form` WHERE email = '" . $email . "'";
    $pageposts = $wpdb->get_var($querystr);

    $count_result = intval($pageposts);
    if ($count_result > 0) {
      echo '<script> alert("record already exist") </script>';
    } else {
      // insert the value into table
      $sql = $wpdb->insert(
        'wordpress_form',
        array(
          'name' => $name,
          'email' => $email,
          'password' => ($password)
        )
      );
      // success message
      if ($sql == true) {
        echo '<script> alert("logged in") </script>';
      } else {
        echo '<script> alert("Not Inserted") </script>';
      }
    }
  }
}

// function enqueue_jquery() {
//   wp_enqueue_script('jquery');
// }
// add_action('wp_enqueue_scripts', 'enqueue_jquery');



get_footer();
?>