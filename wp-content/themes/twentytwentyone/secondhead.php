<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content">
		<?php
		/* translators: Hidden accessibility text. */
		esc_html_e( 'Skip to content', 'twentytwentyone' );
		?>
	</a>

	<?php get_template_part( 'template-parts/header/site-header' ); ?>

	<div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">


<div class="container">
  <form method='POST' id="my-form" >

    <div class="form-group">
      <label for="pwd">Name:</label>
      <input type="text" class="form-control" placeholder="Enter Name" id="user_name" name="names" required>
    </div>

    <div class="form-group">
      <label for="email">Email address:</label>
      <input type="email" class="form-control" placeholder="Enter email" id="user_email" name="email" required>
    </div>

    <div class="form-group">
      <label for="password">password:</label>
      <input type="password" class="form-control" placeholder="Enter password" id="user_password" name="password" required>
    </div>

    <div class="form-group">
      <label for="password">re-enter password:</label>
      <input type="password" class="form-control" placeholder="Enter password" name="re_enter_password" required>
    </div>
    <button type="submit" name='insert' class="btn btn-primary">Submit</button>
  </form>

</div>

<script>

// jQuery(document).ready(function($) {
//   const URL_ENDPOINT = 'http://192.168.1.3:3000';
//     // Make an AJAX request to fetch data from the API
//     $('#my-form').submit(function(event) {


//     const apiEndpoint = URL_ENDPOINT + '/insert_userdata';

// // Replace this with your data to send to the API
// const dataToSend = {
//     name: $('#user_name').val(),
//     email: $('#user_email').val(),
//     password: $('#user_password').val(),
// };

//     $.ajax({
//         url: 'http://192.168.1.3:3000/emailcheck',
//         method: 'post',
//         dataType: 'json',
//         data: dataToSend,
//         success: function(response) {
//             // Handle the API response data here
//             console.log("posted");
//             alert("record inserted");
//         },
//         error: function(xhr, status, error) {
//             console.error('Error:', error);
//             alert("record re-inserted");
//         }
//     });
//   });

// });



jQuery(document).ready(function($) {
            $("#my-form").submit(function (e) {
              // alert("record ");
                // e.preventDefault();
                const email = $("#user_email").val();
                // alert("record ");

                // console.log(email);

                // Send a GET request to your WordPress API endpoint
                $.ajax({
                    url: "http://192.168.1.3:3000/emailcheck",
                    data: { email: email },
                    method: "GET",
                    dataType: 'json',
                    success: function (response) {
                        if (response.exists) {
                            $("#message").text("Email already exists.");
                            alert("record exist");
                        } else {
                            // Proceed with registration or desired action
                            $("#message").text("Email is valid and new.");
                            alert("record inserted");
                            // You can make another API call to register the email here.
                        }
                    },
                    error: function () {
                        $("#message").text("Error checking email.");
                        alert("err");
                    },
                });
            });
        });
</script>

<p id="message"></p>





<?php

// if clicked on submit buton
// if (isset($_POST['insert'])) {

//   global $wpdb;

//   // get all form fields value store in php values
//   $email = $_POST['email'];
//   $name = $_POST['names'];
//   $password = $_POST['password'];
//   $re_enter_password = $_POST['re_enter_password'];

//   if ($password != $re_enter_password) {
//     echo '<script> alert("password miss match") </script>';
//   } else {
//     $querystr = "SELECT COUNT(*) FROM `wordpress_form` WHERE email = '" . $email . "'";
//     $pageposts = $wpdb->get_var($querystr);

//     $count_result = intval($pageposts);
//     if ($count_result > 0) {
//       echo '<script> alert("record already exist") </script>';
//     } else {
//       // insert the value into table
//       $sql = $wpdb->insert(
//         'wordpress_form',
//         array(
//           'name' => $name,
//           'email' => $email,
//           'password' => ($password)
//         )
//       );
//       // success message
//       if ($sql == true) {
//         echo '<script> alert("logged in") </script>';
//       } else {
//         echo '<script> alert("Not Inserted") </script>';
//       }
//     }
//   }
// }